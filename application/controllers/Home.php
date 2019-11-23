<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('petani_model', 'petani');
    }

    public function index()
    {
        $data['title'] = 'SayurKeun';
        $data['sayur'] = $this->db->get('sayuran')->row_array();
        // var_dump($data);
        // die;
        $this->load->view('templatesHome/header', $data);
        $this->load->view('home/viewHome', $data);
        $this->load->view('templatesHome/footer');
    }
}