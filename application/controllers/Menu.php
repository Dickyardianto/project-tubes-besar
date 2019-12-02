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
        $data['title'] = 'Menu management';
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


    public function subMenu()
    {
        $data['title'] = 'Submenu Management';
        $data['titleSidebar'] = 'Admin';
        $data['icon'] = '<i class="fas fa-user-cog"></i>';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // echo 'Selamat datang ' . $data['user']['name'];

        $this->load->model('Menu_model', 'menu');

        $data['subMenu'] = $this->menu->getSubmenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'Url', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/viewSubMenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Submenu baru berhasil ditambah </div>');
            // Meredirect ke controller Auth/method index
            redirect('menu/subMenu');
        }
    }


    public function deleteSubMenu($id)
    {
        $this->menu->hapusDataSubMenu($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Submenu berhasil dihapus</div>');
        redirect('menu/subMenu');
    }


    public function ubahSubMenu($id)
    {
        $data['title'] = 'Ubah SubMenu Management';
        $data['titleSidebar'] = 'Admin';
        $data['icon'] = '<i class="fas fa-user-cog"></i>';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['submenu'] = $this->menu->getSubMenuById($id);
        $data['menu'] = $this->db->get('user_menu')->result();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/viewUbahSubMenu', $data);
            $this->load->view('templates/footer');
        } else {
            $this->menu->ubahSubMenuManagement();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Submenu berhasil diubah </div>');
            redirect('menu/subMenu');
        }
    }
}