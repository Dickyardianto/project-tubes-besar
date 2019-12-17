<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembeli extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('petani_model', 'petani');
        is_logged_in_pembeli();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sayuran'] = $this->petani->getAllSayuran();
        $this->load->view('templatesHome/header', $data);
        $this->load->view('pembeli/index', $data);
        $this->load->view('templatesHome/footer');
    }
}