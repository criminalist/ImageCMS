<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * Image CMS
 *
 * Класс слежения за ценой
 */
class Pricespy extends MY_Controller {

    public $product;
    public $isInSpy;

    public function __construct() {
        parent::__construct();
        $this->load->module('core');
    }

    private static function sendNotificationByEmail($email, $name, $hash) {
        $CI = &get_instance();
        $CI->load->library('email');

        $CI->email->from("noreplay@$_SERVER[HTTP_HOST]");
        $CI->email->to($email);
        $CI->email->set_mailtype('html');
        $CI->email->subject('Изминение цены');
        $CI->email->message("Цена на $name за которым вы следите на сайте $_SERVER[HTTP_HOST] изменилась.<br>
                <a href='" . site_url('pricespy') . "' title='Посмотреть список слежения'>Посмотреть список слежения</a><br>
                <a href='" . site_url("pricespy/$hash") . "' title='Отписатся от слежения'>Отписатся от слежения</a><br>");
        $CI->email->send();
    }

    public static function adminAutoload() {
        parent::adminAutoload();

        \CMSFactory\Events::create()->onShopProductUpdate()->setListener('priceUpdate');
        \CMSFactory\Events::create()->onShopProductDelete()->setListener('priceDelete');
    }

    public function index() {
        if ($this->dx_auth->is_logged_in()) {
            \CMSFactory\assetManager::create()
                    ->registerScript('spy');
            $this->renderUserSpys();
        }
        else
            $this->core->error_404();
    }

    public function priceDelete($product) {
        if (!$product)
            return;

        $CI = &get_instance();

        $product = $product[model];
        $ids = array();
        foreach ($product as $key => $p)
            $ids[$key] = $p->id;

        $CI->db->where_in('productId', $ids);
        $CI->db->delete('mod_price_spy');
    }

    public function priceUpdate($product) {
        if (!$product)
            return;

        $CI = &get_instance();

        $spys = $CI->db
                ->from('mod_price_spy')
                ->join('shop_product_variants', 'mod_price_spy.productVariantId=shop_product_variants.id')
                ->join('users', 'mod_price_spy.userId=users.id')
                ->join('shop_products_i18n', 'shop_products_i18n.id=mod_price_spy.productId')
                ->where('mod_price_spy.productId', $product[productId])
                ->get()
                ->result();

        foreach ($spys as $spy) {
            if ($spy->price != $spy->productPrice) {

                $CI->db->set('productPrice', $spy->price);
                $CI->db->where('productVariantId', $spy->productVariantId);
                $CI->db->update('mod_price_spy');

                self::sendNotificationByEmail($spy->email, $spy->name, $spy->hash);
            }
        }
    }

    public function spy($id, $varId) {
        $product = $this->db
                ->where('id', $varId)
                ->get('shop_product_variants')
                ->row();

        $this->db
                ->set('userId', $this->dx_auth->get_user_id())
                ->set('productId', $id)
                ->set('productVariantId', $varId)
                ->set('productPrice', $product->price)
                ->set('oldProductPrice', $product->price)
                ->set('hash', random_string('unique', 15))
                ->insert('mod_price_spy');

        echo json_encode(array(
            'answer' => 'sucesfull',
        ));
    }

    public function unSpy($hash) {
        $this->db->delete('mod_price_spy', array('hash' => $hash));

        echo json_encode(array(
            'answer' => 'sucesfull',
        ));
    }

    public function init($model) {
        if ($this->dx_auth->is_logged_in()) {
            if (!$model instanceof SProducts) {
                foreach ($model as $key => $m) {
                    $id[$key] = $m->getid();
                    $varId[$key] = $m->firstVariant->getid();
                }
            } else {
                $id = $model->getid();
                $varId = $model->firstVariant->getid();
            }
            
            $products = $this->db
                    ->where_in('productVariantId', $varId)
                    ->where('userId', $this->dx_auth->get_user_id())
                    ->get('mod_price_spy')
                    ->result_array();

            foreach ($products as $p)
                $this->isInSpy[$p[productVariantId]] = $p;

            \CMSFactory\assetManager::create()
                    ->registerScript('spy');
        }
    }

    public function renderButton($id, $varId) {
        if ($this->dx_auth->is_logged_in()) {

            $data = array(
                'Id' => $id,
                'varId' => $varId,
            );

            if ($this->isInSpy[$varId] == '')
                \CMSFactory\assetManager::create()
                        ->setData('data', $data)
                        ->setData('value', 'Уведомить о снижении цены')
                        ->setData('class', 'btn')
                        ->render('button', true);
            else
                \CMSFactory\assetManager::create()
                        ->setData('data', $data)
                        ->setData('value', 'Уже в слежении')
                        ->setData('class', 'btn inSpy')
                        ->render('button', true);
        }
    }

    private function renderUserSpys() {
        $products = $this->db
                ->where('userId', $this->dx_auth->get_user_id())
                ->join('shop_product_variants', 'shop_product_variants.id=mod_price_spy.productVariantId')
                ->join('shop_products_i18n', 'shop_products_i18n.id=mod_price_spy.productId')
                ->join('shop_products', 'shop_products.id=mod_price_spy.productId')
                ->get('mod_price_spy')
                ->result_array();

        \CMSFactory\assetManager::create()
                ->setData('products', $products)
                ->render('spys');
    }

    public function _install() {
        $this->load->dbforge();
        ($this->dx_auth->is_admin()) OR exit;
        $fields = array(
            'id' => array(
                'type' => 'INT',
                'auto_increment' => TRUE),
            'userId' => array(
                'type' => 'VARCHAR',
                'constraint' => '30',
                'null' => TRUE),
            'productId' => array(
                'type' => 'VARCHAR',
                'constraint' => '30',
                'null' => TRUE),
            'productVariantId' => array(
                'type' => 'VARCHAR',
                'constraint' => '30',
                'null' => TRUE),
            'productPrice' => array(
                'type' => 'VARCHAR',
                'constraint' => '30',
                'null' => TRUE),
            'oldProductPrice' => array(
                'type' => 'VARCHAR',
                'constraint' => '30',
                'null' => TRUE),
            'hash' => array(
                'type' => 'VARCHAR',
                'constraint' => '30',
                'null' => TRUE)
        );

        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('mod_price_spy');

        $this->db->where('name', 'pricespy');
        $this->db->update('components', array(
            'enabled' => 1,
            'autoload' => 1));
    }

    public function _deinstall() {
        $this->load->dbforge();
        ($this->dx_auth->is_admin()) OR exit;
        $this->dbforge->drop_table('mod_price_spy');
    }

}

/* End of file pricespy.php */