<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Image CMS
 * Admin Class
 * 
 * TODO:
 * check local ip; 
 *
 */
class Sys_info extends BaseAdminController {

    function __construct() {
        parent::__construct();
        $this->load->library('DX_Auth');
        admin_or_redirect();

        $this->load->library('lib_admin');
        $this->load->library('lib_category');
        $this->lib_admin->init_settings();
    }

    public function index() {

        if ($action == 'phpinfo') {
            ob_start();
            phpinfo();
            $contents = ob_get_contents();
            ob_end_clean();
            echo $contents;
            exit;
        }

        $folders = array(
            '/system/cache/' => FALSE,
            '/system/cache/templates_c/' => FALSE,
            '/uploads/' => FALSE,
            '/uploads/images' => FALSE,
            '/uploads/files' => FALSE,
            '/uploads/media' => FALSE,
            '/captcha/' => FALSE,
        );

        foreach ($folders as $k => $v) {
            $folders[$k] = is_really_writable(PUBPATH . $k);
        }

        $this->template->assign('folders', $folders);

        if ($this->db->dbdriver == 'mysql') {
            $this->load->helper('number');

            $sql = "SHOW TABLE STATUS FROM `" . $this->db->database . "`";
            $query = $this->db->query($sql)->result_array();

            // Get total DB size
            $total_size = 0;
            $total_rows = 0;
            foreach ($query as $k => $v) {
                $total_size += $v['Data_length'] + $v['Index_length'];
                $total_rows += $v['Rows'];
            }

            $sql = "SELECT VERSION()";
            $query = $this->db->query($sql);

            $version = $query->row_array();

            $this->template->add_array(array(
                'db_version' => $version['VERSION()'],
                'db_size' => byte_format($total_size),
                'db_rows' => $total_rows,
            ));
        }

        $this->template->show('sys_info', FALSE);
    }

}