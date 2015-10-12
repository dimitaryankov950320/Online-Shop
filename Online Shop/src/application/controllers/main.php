<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start();

class Main extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model("Get_model");
    }

    public function index()
    {
        $this->home();
    }

    public function home()
    {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['id'] = $session_data['id'];
            $this->load->helper(array('form'));
            $data['results'] = $this->Get_model->getAllRecords("home");
            $this->load->view("/inc/logout", $data);
            $this->load->view("/inc/site_header", $data);
            $this->load->view("/inc/site_nav", $data);
            $this->load->view("/inc/content_home");
            $this->load->view('/inc/site_footer', $data);
        } else {
            redirect('/main/visitor', 'refresh');
        }
    }

    public function visitor()
    {
        $data['results'] = $this->Get_model->getAllRecords("home");
        $this->load->view("/inc/login", $data);
        $this->load->view("/inc/site_header", $data);
        $this->load->view("/inc/site_nav", $data);
        $this->load->view("/inc/content_home");
        $this->load->view("/inc/site_footer", $data);
    }

}

?>
