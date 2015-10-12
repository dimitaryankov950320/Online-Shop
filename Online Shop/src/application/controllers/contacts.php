<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start();

class Contacts extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Get_model");
    }

    public function index()
    {
        $this->contacts();
    }

    public function contacts()
    {
        $data['results'] = $this->Get_model->getAllRecords("contacts");
        $this->load->view("/inc/login");
        $this->load->view("/inc/site_header", $data);
        $this->load->view("/inc/site_nav", $data);
        $this->load->view("/inc/content_about", $data);
        $this->load->view("/inc/site_footer", $data);
    }

}
