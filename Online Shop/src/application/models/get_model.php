<?php

class Get_model extends CI_Model
{

    public function getAllRecords($page)
    {
        $query = $this->db->get_where("info", array("page" => $page));
        $query = $query->result();
        return $query;
    }

}

?>