<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Catalog extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model("catalog_model");
        $this->load->model("Get_model");
    }

    public function index()
    {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['id'] = $session_data['id'];
            $this->load->view("/inc/logout", $data);
            $this->cat_view();
        } else {
            $this->load->view("/inc/login");
            $this->cat_view();
        }
    }

    public function cat_view()
    {
        $config = array();
        $config["base_url"] = base_url() . "index.php/catalogue/index";
        $config["total_rows"] = $this->catalog_model->record_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data["links"] = $this->pagination->create_links();
        $data["products"] = $this->catalog_model->fetch_products($config["per_page"], $page);
        $data['results'] = $this->Get_model->getAllRecords("catalogue");
        $this->load->view("/inc/site_header", $data);
        $this->load->view("/inc/site_nav");
        $this->load->view("/prod/table_products", $data);
        $this->load->view("/inc/site_footer", $data);
    }

    public function single_product($id)
    {
        try {
            $data['results'] = $this->Get_model->getAllRecords("catalogue");
            $data['product'] = $this->catalog_model->getData($id);
            if ($this->session->userdata('logged_in')) {
                $session_data = $this->session->userdata('logged_in');
                $data['username'] = $session_data['username'];
                $data['id'] = $session_data['id'];
                $this->load->view("/inc/logout", $data);
            } else {
                $this->load->view("/inc/login");
            }
            $this->load->view("/inc/site_header", $data);
            $this->load->view("/inc/site_nav", $data);
            $this->load->view('/prod/single_product_view', $data);
            $this->load->view("/inc/site_footer", $data);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

}
