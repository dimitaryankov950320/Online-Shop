<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!class_exists('Native_session')) {
    require_once(APPPATH . 'libraries/Native_session' . EXT);
}
ini_set('session.use_only_cookies', 1);
$obj = & get_instance();
$obj->session = new Native_session();
$obj->ci_is_loaded[] = 'session';

class About extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Get_model");
    }

    public function index()
    {
        $this->about();
    }

    public function about()
    {
        $data['results'] = $this->Get_model->getAllRecords("about");
        $this->load->view("/inc/login");
        $this->load->view("/inc/site_header", $data);
        $this->load->view("/inc/site_nav", $data);
        $this->load->view("/inc/content_about", $data);
        $this->load->view("/inc/site_footer", $data);
    }

}
