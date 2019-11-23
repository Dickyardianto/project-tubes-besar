<?php

class Petani_model extends CI_model
{
    public function getAllSayuran()
    {
        return $this->db->get('sayuran')->result_array();
    }
}