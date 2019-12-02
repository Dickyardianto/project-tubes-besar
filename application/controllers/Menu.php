<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Menu_model', 'menu');
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['titleSidebar'] = 'Admin';
        $data['icon'] = '<i class="fas fa-user-cog"></i>';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // echo 'Selamat datang ' . $data['user']['name'];
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu baru ditambahkan  </div>');
            // Meredirect ke controller Auth/method index
            redirect('menu');
        }
    }

    public function hapusMenu($id)
    {
        $this->menu->hapusDataMenuManagement($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Menu berhasil dihapus </div>');
        redirect('menu');
    }


    public function ubahMenuManagement($id)
    {
        $data['title'] = 'Ubah Menu Management';
        $data['titleSidebar'] = 'Admin';
        $data['icon'] = '<i class="fas fa-user-cog"></i>';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->menu->getMenuById($id);

        $this->form_validation->set_rules('menu', 'Menu', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/viewUbahMenuManagement', $data);
            $this->load->view('templates/footer');
        } else {
            $this->menu->ubahMenuManagement();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu berhasil diubah </div>');
            redirect('menu');
        }
    }
}