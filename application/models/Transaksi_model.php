<?php

class Transaksi_model extends CI_model
{

    public function tambah_pesanan($data)
    {
        $this->db->insert('data_pesanan', $data);
        $id = $this->db->insert_id();
        return (isset($id)) ? $id : FALSE;
    }

    public function tambah_data_order($data)
    {
        $this->db->insert('data_order', $data);
    }
}