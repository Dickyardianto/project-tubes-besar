<?php

class Petani_model extends CI_model
{
    public function getAllSayuran()
    {
        return $this->db->get('sayuran')->result_array();
    }

    public function hapusDataSayur($id)
    {

        $this->db->delete('sayuran', ['id' => $id]);
    }

    public function getSayurById($id)
    {
        return $this->db->get_where('sayuran', ['id' => $id])->row_array();
    }
}