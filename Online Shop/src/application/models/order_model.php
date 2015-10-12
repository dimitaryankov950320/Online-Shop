<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Order_model extends CI_Model
{

    public function getSingleOrder($id)
    {
        $this->db->select('product_price, quantity, purchased_price');
        $this->db->from('order_lines');
        $this->db->where('order_id', $id);
        $query = $this->db->get();
        $query = $query->row_array();
        if (count($query) < 1) {
            throw new Exception("Invalid order_id!");
        }
        return $query;
    }

    public function getAllOrders()
    {
        $this->db->select('o.first_name,c.name,l.product_id,o.id,l.purchased_price,l.product_price,l.profit,l.quantity,l.price_without_vat,l.total');
        $this->db->from('orders o');
        $this->db->join('order_lines l', 'o.id = l.order_id', 'left');
        $this->db->join('catalogue c', 'l.product_id = c.id');
        $query = $this->db->get();
        $query = $query->result_array();
        return $query;
    }

}
