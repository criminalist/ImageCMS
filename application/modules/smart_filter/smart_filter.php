<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * Image CMS
 * Module Frame
 */
class Smart_filter extends \Category\BaseCategory {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        //parent::index();
        //parent::__CMSCore__();
        return true;
//
//
//        if ($this->input->is_ajax_request())
//        else
    }

    public function init() {
        return \CMSFactory\assetManager::create()
                        ->registerScript('jquery.ui-slider')
                        ->registerScript('filter')
                        ->render('main', true);
    }

    public function filter() {
        return \CMSFactory\assetManager::create()
                        ->setData($this->data)
                        ->render('filter', true);
    }

//    public function ()

    public function autoload() {
        
    }

    public function _install() {
        /** We recomend to use http://ellislab.com/codeigniter/user-guide/database/forge.html */
        /**
          $this->load->dbforge();

          $fields = array(
          'id' => array('type' => 'INT', 'constraint' => 11, 'auto_increment' => TRUE,),
          'name' => array('type' => 'VARCHAR', 'constraint' => 50,),
          'value' => array('type' => 'VARCHAR', 'constraint' => 100,)
          );

          $this->dbforge->add_key('id', TRUE);
          $this->dbforge->add_field($fields);
          $this->dbforge->create_table('mod_empty', TRUE);
         */
        /**
          $this->db->where('name', 'smart_filter')
          ->update('components', array('autoload' => '1', 'enabled' => '1'));
         */
    }

    public function _deinstall() {
        /**
          $this->load->dbforge();
          $this->dbforge->drop_table('mod_empty');
         *
         */
    }

}

/* End of file sample_module.php */
