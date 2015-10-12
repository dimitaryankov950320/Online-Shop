<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cart_model extends CI_Model
{

    public function retrieve_products()
    {
        $query = $this->db->get('catalogue');
        $query = $query->result();
        return $query;
    }

    public function validate_add_cart_item($id, $cty)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('catalogue', 1);
        if ($query->num_rows > 0) {
            foreach ($query->result() as $row) {
                $data = array(
                    'id' => $id,
                    'qty' => $cty,
                    'price' => $row->price,
                    'name' => $row->name
                );
            }
            $this->cart->insert($data);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function validate_update_cart()
    {
        $total = $this->cart->total_items();
        $item = $this->input->post('rowid');
        $qty = $this->input->post('qty');

        for ($i = 0; $i < $total; $i++) {
            $data = array(
                'rowid' => $item[$i],
                'qty' => $qty[$i]
            );
            $this->cart->update($data);
        }
    }

    public function getAllOrdersId($id)
    {
        $this->db->select('o.first_name,c.name,l.product_id,l.product_price,l.quantity,l.price_without_vat,l.total');
        $this->db->where('o.user_id', $id);
        $this->db->from('orders o');
        $this->db->join('order_lines l', 'o.id = l.order_id', 'left');
        $this->db->join('catalogue c', 'l.product_id = c.id');
        $query = $this->db->get();
        $query = $query->result_array();
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
