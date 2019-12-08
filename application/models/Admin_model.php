<?php

class Admin_model extends CI_model
{
    public function getDataPetani()
    {

        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('role_id', 3);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function hapusDataPetani($id)
    {
        $this->db->delete('user', ['id' => $id]);
    }
}