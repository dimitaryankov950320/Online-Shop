<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->helper('form');
        $this->load->library('javascript');
        $this->load->library('javascript/jquery');
        $this->load->model('catalog_model');
    }

    public function index()
    {
        $data['query'] = $this->catalog_model->getAll();
        $this->load->view('/admin/manage_products', $data);
    }

    public function submit()
    {
        if ($this->input->post('ajax') == 1) {
            $data = $this->_get_data_from_post();
            if ($data['id']) {
                $this->catalog_model->update($data);
                $data['query'] = $this->catalog_model->getAll();
                $this->load->view('/admin/show', $data);
            } else {
                $this->catalog_model->save($data);
                $data['query'] = $this->catalog_model->getAll();
                $this->load->view('/admin/show', $data);
            }
        }
    }

    public function delete()
    {

        $id = $this->input->post('id');
        $this->catalog_model->delete($id);
        $data['query'] = $this->catalog_model->getAll();
        $this->load->view('/admin/show', $data);
    }

    public function single_prod($id)
    {

        $data['product'] = $this->catalog_model->get($id);
        $this->load->view('/admin/single_prod', $data);
    }

    function _get_data_from_post()
    {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $description = $this->input->post('description');
        $price = $this->input->post('price');
        $data = array(
            'id' => $id,
            'name' => $name,
            'description' => $description,
            'price' => $price
        );
        return $data;
    }

}
