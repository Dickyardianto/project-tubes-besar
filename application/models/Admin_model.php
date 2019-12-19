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

    public function getDataPembeli()
    {

        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('role_id', 2);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function hapusDataPembeli($id)
    {
        $this->db->delete('user', ['id' => $id]);
    }
}