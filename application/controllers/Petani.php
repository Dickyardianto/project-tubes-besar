<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petani extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('petani_model', 'petani');
        $this->load->library('form_validation');
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // echo 'Selamat datang ' . $data['user']['name'];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('petani/index', $data);
        $this->load->view('templates/footer');
    }

    public function tampilSayuran()
    {
        $data['title'] = 'Data Sayuran';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sayuran'] = $this->petani->getAllSayuran();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('petani/viewSayuran', $data);
        $this->load->view('templates/footer');
    }


    public function tambahSayuran()
    {
        $this->form_validation->set_rules('jenis-sayur', 'Jenis sayur', 'required|trim');
        $this->form_validation->set_rules('nama-sayur', 'Nama sayur', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi sayur', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga sayur', 'required|trim');
        // $this->form_validation->set_rules('tanggal-rilis', 'Tanggal rilis', 'required');


        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Data Sayuran';

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('petani/viewSayuran', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_image = $_FILES['gambar']['name'];
            if ($upload_image) {
                $namafile = "file_" . time();
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '3048';
                $config['upload_path'] = './assets/img/gambar-sayur/';
                $config['file_name'] = $namafile;

                $this->upload->initialize($config);

                if ($this->upload->do_upload('gambar')) {
                    // $old_image = $data['user']['gambar_sayur'];
                    // if ($old_image != 'sayur.jpg') {
                    //     unlink(FCPATH . 'assets/img/gambar-sayur/' . $old_image);
                    // }
                    $new_image = $this->upload->data();
                    $id_petani = $data['user']['id'];
                    $data = [
                        'jenis_sayur' => htmlspecialchars($this->input->post('jenis-sayur', true)),
                        'nama_sayur' => htmlspecialchars($this->input->post('nama-sayur', true)),
                        'deskripsi' => htmlspecialchars($this->input->post('deskripsi', true)),
                        'harga' => htmlspecialchars($this->input->post('harga', true)),
                        'tanggal_rilis' => time(),
                        'id_petani' => $id_petani,
                        'gambar_sayur' => $new_image['file_name']
                    ];
                    $this->db->insert('sayuran', $data);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil ditambahkan');
            // redirect('petani/tampilSayuran');
            redirect('petani/tampilSayuran');
        }
    }


    public function hapusSayur($id)
    {
        $this->petani->hapusDataSayur($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data berhasil dihapus</div>');
        redirect('petani/tampilSayuran');
    }
}