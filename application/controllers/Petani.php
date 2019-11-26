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

    public function tambahSayuran2()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->library('upload');
        $nmfile = "file_" . time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path']      = './assets/img/gambar-sayur/'; //path folder
        $config['allowed_types']    = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size']         = '3072'; //maksimal besar file 3M
        $config['max_width']        = '5000'; //lebar maksimal 5000 px
        $config['max_height']       = '5000'; //tinggi maksimal 5000px
        $config['file_name']        = $nmfile; //nama yang terupload nantinya

        $this->upload->initialize($config);
        if ($_FILES["gambar"]["name"]) {
            if ($this->upload->do_upload('gambar')) {
                $gbr = $this->upload->data();
                $data = array(
                    'jenis_sayur' => htmlspecialchars($this->input->post('jenis-sayur', true)),
                    'nama_sayur' => htmlspecialchars($this->input->post('nama-sayur', true)),
                    'deskripsi' => htmlspecialchars($this->input->post('deskripsi', true)),
                    'harga' => htmlspecialchars($this->input->post('harga', true)),
                    'tanggal_rilis' => htmlspecialchars($this->input->post('tanggal-rilis', true)),
                    'id_petani' => 1,
                    'gambar_sayur' => $gbr['file_name']
                );

                $this->db->insert('sayuran', $data); // akses model untuk menyimpan ke database

                $config2['image_library'] = 'gd2';
                $config2['source_image'] = $this->upload->upload_path . $this->upload->file_name;
                $config2['new_image'] = './assets/img/gambar-sayur/'; // folder tempat menyimpan hasil resize
                $config2['maintain_ratio'] = TRUE;
                $config2['width'] = 100; //lebar setelah resize menjadi 100px
                $config2['height'] = 100; //panjang setelah resize menjadi 100px
                $this->load->library('image_lib', $config2);

                //pesan yang muncul jika resize error dimasukkan pada session flashdata
                if (!$this->image_lib->resize()) {
                    $this->session->set_flashdata('error', $this->image_lib->display_errors('', ''));
                }

                //pesan yang muncul jika berhasil diupload pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\">
                        <div class=\"alert alert-info\" id=\"alert\">Data Berhasil Ditambahkan !!
                        </div>
                    </div>");
                redirect('petani/tampilSayuran'); //jika berhasil maka akan ditampilkan view upload
            } else {
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\">
                    <div class=\"alert alert-danger\" id=\"alert\">Data Gagal Ditambahkan !!
                    </div>
                </div>");
                redirect('Petani/tampilSayuran'); //jika gagal maka akan ditampilkan form upload
            }
        }
    }








    // public function tambahSayuran()
    // {
    //     $this->form_validation->set_rules('jenis-sayur', 'Jenis sayur', 'required|trim');
    //     $this->form_validation->set_rules('nama-sayur', 'Nama sayur', 'required|trim');
    //     $this->form_validation->set_rules('deskripsi', 'Deskripsi sayur', 'required|trim');
    //     $this->form_validation->set_rules('harga', 'Harga sayur', 'required|trim');
    //     $this->form_validation->set_rules('tanggal-rilis', 'Tanggal rilis', 'required');
    //     $this->form_validation->set_rules('gambar', 'Gambar', 'required');

    //     $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    //     if ($this->form_validation->run() == false) {
    //         $this->load->view('templates/header', $data);
    //         $this->load->view('templates/sidebar', $data);
    //         $this->load->view('templates/topbar', $data);
    //         $this->load->view('petani/viewSayuran', $data);
    //         $this->load->view('templates/footer');
    //     } else {
    //         $data = [
    //             'jenis_sayur' => htmlspecialchars($this->input->post('jenis-sayur', true)),
    //             'nama_sayur' => htmlspecialchars($this->input->post('nama-sayur', true)),
    //             'deskripsi' => htmlspecialchars($this->input->post('deskripsi', true)),
    //             'harga' => htmlspecialchars($this->input->post('harga', true)),
    //             'tanggal_rilis' => htmlspecialchars($this->input->post('tanggal-rilis', true)),
    //             'id_petani' => 1,
    //             'gambar_sayur' => $this->_uploadGambar()
    //         ];
    //         // Input ke db_pecal di tabel user
    //         $this->db->insert('sayuran', $data);
    //         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation ! your account has been created. Please Login');
    //         // Meredirect ke controller
    //     }
    //     redirect('petani/tampilSayuran');
    // }


}