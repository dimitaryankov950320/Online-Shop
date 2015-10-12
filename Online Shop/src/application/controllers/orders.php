<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Orders extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('cart_model');
        $this->load->model("Get_model");
        $this->load->model('billing_model');
        $this->load->model('Order_model');
        $this->load->model('/services/vat_calculator');
        $this->load->model('/services/profit');
    }

    public function place_orders()
    {
        $data['results'] = $this->Get_model->getAllRecords("cart");
        $this->load->view("/inc/login", $data);
        $this->load->view('/inc/site_header', $data);
        $this->load->view("/inc/site_nav", $data);
        $this->load->view("/bills/billing_view");
        $this->load->view("/inc/site_footer", $data);
    }

    function save_order()
    {
        $user_data = $this->getUserDataFromPost();

        $id = $this->billing_model->insert_customer($user_data);
        $order = array(
            'user_id' => $id,
            'first_name' => $user_data['first_name'],
            'last_name' => $user_data['last_name'],
            'address' => $user_data['address'],
            'total' => $this->input->post('total')
        );
        $order_id = $this->billing_model->insert_order($order);
        $products = $this->cart->contents();
        $vat_value = $this->vat_calculator->calculate_vat($products);
        foreach ($products as $product) {
            $total = ($product['price'] * $product['qty']);
            $grand_total = ($total + $vat_value);
            $relation = array(
                'order_id' => $order_id,
                'product_id' => $product['id'],
                'product_price' => $product['price'],
                'quantity' => $product['qty'],
                'price_without_vat' => $total,
                'vat' => $vat_value,
                'total' => $grand_total,
            );
            $this->billing_model->insert_order_detail($relation);
        }
        redirect('orders/successOrders');
    }

    public function successOrders()
    {
        $data['results'] = $this->Get_model->getAllRecords("home");
        $data['products'] = $this->cart_model->retrieve_products();
        $data['content'] = 'cart/products';
        $this->load->view("/inc/login", $data);
        $this->load->view("/inc/site_header", $data);
        $this->load->view("/inc/site_nav", $data);
        $this->load->view('/bills/billing_success');
        $this->load->view("/inc/site_footer", $data);
    }

    public function getUserDataFromPost()
    {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $username = $session_data['username'];
        } else {
            $username = 'visitor';
        }
        $data = array(
            'username' => $username,
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'address' => $this->input->post('address'),
        );

        return $data;
    }

    public function view_orders($user_id)
    {
        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $data['id'] = $session_data['id'];
        $data['results'] = $this->Get_model->getAllRecords("home");
        $data['orders'] = $this->cart_model->getAllOrdersId($user_id);
        $this->load->view("/inc/logout", $data);
        $this->load->view("/inc/site_header", $data);
        $this->load->view("/inc/site_nav", $data);
        $this->load->view('/bills/view_orders', $data);
        $this->load->view('/inc/site_footer', $data);
    }

    public function view_all_orders()
    {
        $data['orders'] = $this->Order_model->getAllOrders();
        $data['profit'] = $this->profit->calculateOrderProfit($data['orders']);
        $this->load->view('/admin/view_orders', $data);
    }

    public function getProfit()
    {
        $data = $this->input->post();
        $orders = $data['orders'];

        $sum = 0;
        try {
            foreach ($orders as $id) {
                $order = $this->order_model->getSingleOrder($id);
                $profit = $this->profit->calcOrderProfit($order);
                $sum += $profit;
            }
            echo json_encode(array("success" => true, "profit" => $sum));
        } catch (Exception $ex) {
            echo json_encode(array("success" => false, "error" => $ex->getMessage()));
        }
    }

}
