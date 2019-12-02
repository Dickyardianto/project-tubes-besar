<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{

    public function hapusDataMenuManagement($id)
    {
        // $this->db->where('id', $id);
        $this->db->delete('user_menu', ['id' => $id]);
    }

    public function getMenuById($id)
    {
        return $this->db->get_where('user_menu', ['id' => $id])->row_array();
    }

    public function ubahMenuManagement()
    {
        $data = [
            "menu" => $this->input->post('menu', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user_menu', $data);
    }
}