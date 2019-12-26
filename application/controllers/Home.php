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
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templatesHome/header', $data);
        $this->load->view('home/viewHome', $data);
        $this->load->view('templatesHome/footer');
    }

    function fetch()
    {
        $output = '';
        $query = '';
        // $this->load->model('ajaxsearch_model');
        if ($this->input->post('query')) {
            $query = $this->input->post('query');
        }
        $data = $this->home->fetch_data($query);
        $output .= '
        <div class="container">
            <div class="row ">
        ';
        if (!$this->session->userdata('email')) {
            if ($data->num_rows() > 0) {
                foreach ($data->result() as $row) {
                    $output .= '
                    <div class="col-sm-2 textStyle">
                        <a class="coba" href="' . base_url('auth') . '">
                            <div class="card mb-3 coba">
                                <img src="' . base_url('assets/img/gambar-sayur') . "/" . $row->gambar_sayur . '"
                                    class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <p class="card-text">' . $row->deskripsi . ' </p>
                                            <p style="color: #d71149;">Rp.  ' . number_format($row->harga) . ' (/' . $row->satuan . ') 
                                            </p>
                                            <p class="card-text"><small class="text-muted">ditambahkan pada
                                            ' . date('d F Y', $row->tanggal_rilis) . '</small></p>		
                                        </div>
                            </div>
                        </a>
                    </div>
                    
                    ';
                }
            } else {
                $output .= '
                        <div class="container">
                            <div class="row">
                                <div class="col-5">
                                    <div class="alert alert-dark">
                                        <h4>Data Tidak ditemukan</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                ';
            }
            $output .= '
                        </div>
                    </div>
            ';
            echo $output;
        } else {
            if ($data->num_rows() > 0) {
                foreach ($data->result() as $row) {
                    $output .= '
                    <div class="col-sm-2 textStyle">
                        <a href="' . base_url('transaksi/detailSayur/') . $row->id . '">
                            <div class="card mb-3">
                                <img src="' . base_url('assets/img/gambar-sayur') . "/" . $row->gambar_sayur . '"
                                    class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <p class="card-text">' . $row->deskripsi . ' </p>
                                            <p style="color: #d71149;">Rp.  ' . number_format($row->harga) . ' (/' . $row->satuan . ') 
                                            </p>
                                            <p class="card-text"><small class="text-muted">ditambahkan pada
                                            ' . date('d F Y', $row->tanggal_rilis) . '</small></p>		
                                        </div>
                            </div>
                        </a>
                    </div>
                    
                    ';
                }
            } else {
                $output .= '
                        <div class="container">
                            <div class="row">
                                <div class="col-5">
                                    <div class="alert alert-dark">
                                        <h4>Data Tidak ditemukan</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                ';
            }
            $output .= '
                        </div>
                    </div>
            ';
            echo $output;
        }
    }

    public function tambahChat($teman)
    {
        $output = `ada`;
        return $output;
    }
}