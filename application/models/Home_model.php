<?php

class Home_model extends CI_model
{
    public function getSayurById($id)
    {
        return $this->db->get_where('sayuran', ['id' => $id])->row_array();
    }
}