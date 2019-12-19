<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('petani_model', 'petani');
        $this->load->model('Home_model', 'home');
        $this->load->library('cart');
    }

    public function detailSayur($id)
    {
        $data['title'] = 'Belanja sayur hemat hanya disini';
        // $data['sayuran'] = $this->db->get('sayuran')->row_array();
        $data['sayuran'] = $this->home->getSayurById($id);
        $data['tampilSayur'] = $this->petani->getAllSayuran();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templatesHome/header', $data);
        $this->load->view('home/viewDetailSayur', $data);
        $this->load->view('templatesHome/footer');
    }

    public function addCart()
    {
        $data = array(
            'id'      => 'sku_123ABC',
            'qty'     => 1,
            'price'   => 39.95,
            'name'    => 'T-Shirt',
            'coupon'         => 'XMAS-50OFF'
        );

        $this->cart->insert($data);
    }

    public function beliSayur()
    {
        $data['title'] = 'Belanja sayur hemat hanya disini';
        // $data['sayuran'] = $this->db->get('sayuran')->row_array();
        // $data['sayuran'] = $this->home->getSayurById($id);
        $data['tampilSayur'] = $this->petani->getAllSayuran();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templatesHome/header', $data);
        $this->load->view('transaksi/index', $data);
        $this->load->view('templatesHome/footer');
    }
}