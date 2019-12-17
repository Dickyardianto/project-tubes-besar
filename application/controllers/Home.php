<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('petani_model', 'petani');
        $this->load->model('Home_model', 'home');
    }

    public function index()
    {
        $data['title'] = 'Niaga Sayur';
        // $data['sayur'] = $this->db->get('sayuran')->row_array();
        $data['sayuran'] = $this->petani->getAllSayuran();
        $data['sayuranBuahSorting'] = $this->petani->getBySayurBuah();
        $data['sayuranDaunSorting'] = $this->petani->getBySayurDaun();
        $data['sayuranBatangSorting'] = $this->petani->getBySayurBatang();
        $data['sayuranAkarSorting'] = $this->petani->getBySayurAkar();
        $this->load->view('templatesHome/header', $data);
        $this->load->view('home/viewHome', $data);
        $this->load->view('templatesHome/footer');
    }

    public function detailSayur($id)
    {
        $data['title'] = 'Belanja sayur hemat hanya disini';
        // $data['sayuran'] = $this->db->get('sayuran')->row_array();
        $data['sayuran'] = $this->home->getSayurById($id);
        $data['tampilSayur'] = $this->petani->getAllSayuran();
        $this->load->view('templatesHome/header', $data);
        $this->load->view('home/viewDetailSayur', $data);
        $this->load->view('templatesHome/footer');
    }
}