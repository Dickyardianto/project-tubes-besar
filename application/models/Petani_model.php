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

    public function getBySayurBuah()
    {
        $query = "SELECT *
        FROM `sayuran`
        WHERE `sayuran`.`jenis_sayur` = 'Sayur Buah'
          ";
        return $this->db->query($query)->result_array();
    }

    public function getBySayurDaun()
    {
        $query = "SELECT *
        FROM `sayuran`
        WHERE `sayuran`.`jenis_sayur` = 'Sayur Daun'
          ";
        return $this->db->query($query)->result_array();
    }

    public function getBySayurBatang()
    {
        $query = "SELECT *
        FROM `sayuran`
        WHERE `sayuran`.`jenis_sayur` = 'Sayur Batang'
          ";
        return $this->db->query($query)->result_array();
    }

    public function getBySayurAkar()
    {
        $query = "SELECT *
        FROM `sayuran`
        WHERE `sayuran`.`jenis_sayur` = 'Sayur Akar'
          ";
        return $this->db->query($query)->result_array();
    }
}