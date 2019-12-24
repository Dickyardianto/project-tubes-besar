<?php

class Home_model extends CI_model
{
    public function getSayurById($id)
    {
        return $this->db->get_where('sayuran', ['id' => $id])->row_array();
    }

    function fetch_data($query)
    {
        $this->db->select("*");
        $this->db->from("sayuran");
        if ($query != '') {
            $this->db->like('jenis_sayur', $query);
            $this->db->or_like('nama_sayur', $query);
            $this->db->or_like('deskripsi', $query);
            $this->db->or_like('harga', $query);
            // $this->db->or_like('Country', $query);
        }
        $this->db->order_by('id', 'DESC');
        return $this->db->get();
    }
}