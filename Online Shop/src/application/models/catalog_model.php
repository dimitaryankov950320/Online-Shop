<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Catalog_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function record_count()
    {
        return $this->db->count_all("catalogue");
    }

    public function fetch_products($limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get("catalogue");
        if ($query->num_rows() > 0) {
           return false;
        }
        $query = $query->result();
        return $query;
    }
//мисля,че така трябва да стане с exception но не съм сигурен
//    public function fetch_products($limit, $start)
//    {
//        $this->db->limit($limit, $start);
//        $query = $this->db->get("catalogue");
//        try{
//		$query = $query->result();
//        	return $query;      
//        }catch (Exception $ex) if ($query->num_rows() > 0) {
//          echo $ex->getMessage();
//       }       
//    }
    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('catalogue');
        $this->db->limit(20);
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get();
        $res = $query->result();
        return $res;
    }

    public function get($id)
    {
        $query = $this->db->getwhere('catalogue', array('id' => $id));
        $res = $query->row_array();
        return $res;
    }

    public function save($data)
    {
        $this->db->insert('catalogue', $data);
    }

    public function update($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('catalogue', $data);
    }

    public function getData($id)
    {
        $query = $this->db->get_where("catalogue", array("id" => $id));
        $res = $query->result();
        if (count($res) != 1) {
            throw new Exception("Invalid id '$id'");
        }
        return $res;
    }
    public function delete_item($id)
    {
	$this->db->delete('catalogue', array('id' => $id));
    }
}
