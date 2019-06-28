<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Template {

    protected $_CI;

    function __construct() {
        $this->_CI = &get_instance();
    }

    function display($template, $data = null) {
        $data['_content'] = $this->_CI->load->view($template, $data, true);
        $data['_header'] = $this->_CI->load->view('template/header', $data, true);
        $data['_sidebar_admin'] = $this->_CI->load->view('template/sidebar_admin', $data, true);
        $data['_sidebar_klien'] = $this->_CI->load->view('template/sidebar_klien', $data, true);
        $this->_CI->load->view('template/template', $data);
    }

}
