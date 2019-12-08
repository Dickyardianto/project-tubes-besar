<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Admin_model', 'admin');
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['titleSidebar'] = 'Admin';
        $data['icon'] = '<i class="fas fa-user-cog"></i>';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // echo 'Selamat datang ' . $data['user']['name'];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }



    public function dataPetani()
    {
        $data['title'] = 'Petani';
        $data['titleSidebar'] = 'Admin';
        $data['icon'] = '<i class="fas fa-user-cog"></i>';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['users'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result_array();
        $data['data'] = $this->admin->getDataPetani();

        // echo 'Selamat datang ' . $data['user']['name'];
        // $data['menu'] = $this->db->get('user_menu')->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/viewDataPetani', $data);
            $this->load->view('templates/footer');
        } else {
            // $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu baru ditambahkan  </div>');
            // // Meredirect ke controller Auth/method index
            // redirect('menu');
        }
    }
}