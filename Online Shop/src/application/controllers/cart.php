<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cart extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('cart_model');
        $this->load->model("Get_model");
        $this->load->model('billing_model');
    }

    public function index()
    {
        $data['results'] = $this->Get_model->getAllRecords("home");
        $data['products'] = $this->cart_model->retrieve_products();
        $data['content'] = 'cart/products';
        $this->load->view("/inc/login", $data);
        $this->load->view("/inc/site_header", $data);
        $this->load->view("/inc/site_nav", $data);
        $this->load->view('/cart/index', $data);
        $this->load->view("/inc/site_footer", $data);
    }

    public function add_cart_item()
    {
        $id = $this->input->post('product_id');
        $cty = $this->input->post('quantity');
        if ($this->cart_model->validate_add_cart_item($id, $cty) == TRUE) {
            if ($this->input->post('ajax') != '1') {
                redirect('cart');
            } else {
                echo 'true';
            }
        }
    }

    public function show_cart()
    {
        $this->load->view('cart/cart');
    }

    public function update_cart()
    {
        $this->cart_model->validate_update_cart();
        redirect('cart');
    }

    public function empty_cart()
    {
        $this->cart->destroy();
        redirect('cart');
    }

}
