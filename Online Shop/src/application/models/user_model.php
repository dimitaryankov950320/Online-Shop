<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class User_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function login($username, $password)
    {
        $this->db->select('id, username, password');
        $this->db->from('users');
        $this->db->where('username', $username);
        $this->db->where('password', MD5($password));
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            $query = $query->result();
            return $query;
        } else {
            return false;
        }
    }

    public function add_user($data)
    {
        $this->db->insert('users', $data);
        return true;
    }

    public function getAllUsers()
    {
        $this->db->select('id, username, email,gender');
        $this->db->from('users');
        $query = $this->db->get();
        $query = $query->result_array();
        return $query;
    }

}

?>