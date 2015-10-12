<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Billing_model extends CI_Model
{

    public function insert_customer($data)
    {

        $this->db->insert('user_details', $data);
        $id = $this->db->insert_id();
        return (isset($id)) ? $id : FALSE;
    }

    public function insert_order($order)
    {

        $this->db->insert('orders', $order);
        return $this->db->insert_id();
    }

    public function insert_order_detail($order_details)
    {
        $this->db->insert('order_lines', $order_details);
    }

}
?>

