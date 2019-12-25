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
        $data['titleSidebar'] = 'Petani';
        $data['icon'] = '<i class="fas fa-book-reader"></i>';
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
        $data['titleSidebar'] = 'Petani';
        $data['icon'] = '<i class="fas fa-book-reader"></i>';
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
        $data['titleSidebar'] = 'Petani';
        $data['icon'] = '<i class="fas fa-book-reader"></i>';

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
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '8048';
                $config['upload_path'] = './assets/img/gambar-sayur/';
                $config['file_name'] = $namafile;

                $this->upload->initialize($config);

                if ($this->upload->do_upload('gambar')) {
                    $new_image = $this->upload->data();
                    $id_petani = $data['user']['id'];
                    $data = [
                        'jenis_sayur' => htmlspecialchars($this->input->post('jenis-sayur', true)),
                        'nama_sayur' => htmlspecialchars($this->input->post('nama-sayur', true)),
                        'deskripsi' => htmlspecialchars($this->input->post('deskripsi', true)),
                        'harga' => htmlspecialchars($this->input->post('harga', true)),
                        'tanggal_rilis' => time(),
                        'id_petani' => $id_petani,
                        'gambar_sayur' => $new_image['file_name'],
                        'satuan' => $this->input->post('satuan')
                    ];
                    $this->db->insert('sayuran', $data);
                } else {
                    // echo $this->upload->display_errors();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Periksa ukuran gambar !');
                    // redirect('petani/tampilSayuran');
                    redirect('petani/tampilSayuran');
                }
            }
            $this->session->set_flashdata('message', 'Ditambahkan');
            // redirect('petani/tampilSayuran');
            redirect('petani/tampilSayuran');
        }
    }


    public function hapusSayur($id)
    {
        $this->petani->hapusDataSayur($id);
        $this->session->set_flashdata('message', 'Di hapus');
        redirect('petani/tampilSayuran');
    }

    public function upload_gambar()
    {
        $namafile = "file_" . time();
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']     = '3048';
        $config['upload_path'] = './assets/img/gambar-sayur/';
        $config['file_name'] = $namafile;

        $this->upload->initialize($config);
    }



    public function ubahSayur($id)
    {

        // $this->form_validation->set_rules('jenis-sayur', 'Jenis sayur', 'required|trim');
        $this->form_validation->set_rules('nama-sayur', 'Nama sayur', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi sayur', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga sayur', 'required|trim');

        $data['title'] = 'Ubah Sayuran';
        $data['titleSidebar'] = 'Petani';
        $data['icon'] = '<i class="fas fa-book-reader"></i>';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sayur'] = $this->petani->getSayurById($id);

        $data['satuan'] = [
            'Kg',
            'Ons'
        ];

        $data['kategori'] = [
            'Sayur Buah',
            'Sayur Daun',
            'Sayur Batang',
            'Sayur Akar'
        ];



        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('petani/viewUbahSayur', $data);
            $this->load->view('templates/footer');
        } else {
            $id_petani = $data['user']['id'];
            $jenis_sayur = $this->input->post('jenis-sayur');
            $nama_sayur = htmlspecialchars($this->input->post('nama-sayur', true));
            $deskripsi = htmlspecialchars($this->input->post('deskripsi', true));
            $harga = htmlspecialchars($this->input->post('harga', true));
            $tanggal_rilis = time();
            $id_petaniS = $id_petani;
            $satuan = $this->input->post('satuan');

            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['gambar']['name'];

            if ($upload_image) {
                $this->upload_gambar();

                if ($this->upload->do_upload('gambar')) {
                    $old_image = $data['sayur']['gambar_sayur'];
                    if ($old_image != 'sayur.jpg') {
                        unlink(FCPATH . 'assets/img/gambar-sayur/' . $old_image);
                    }
                    $new_image = $this->upload->data();
                    $this->db->set('gambar_sayur', $new_image['file_name']);
                } else {
                    // echo $this->upload->display_errors();
                    $this->session->set_flashdata('message', "<div class='alert alert-danger' role='alert'>Gambar tidak sesuai format : </br> gif\jpg\jpeg\png </br>max size: 8 Mb</div>");
                    redirect('petani/tampilSayuran');
                }
            }

            $this->db->set('jenis_sayur', $jenis_sayur);
            $this->db->set('nama_sayur', $nama_sayur);
            $this->db->set('deskripsi', $deskripsi);
            $this->db->set('harga', $harga);
            $this->db->set('tanggal_rilis', $tanggal_rilis);
            $this->db->set('id_petani', $id_petaniS);
            $this->db->set('satuan', $satuan);
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('sayuran');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diubah</div>');
            redirect('petani/tampilSayuran');
        }

        // Akhir coba

        // $upload_image = $_FILES['gambar']['name'];
        // if ($upload_image == '') {
        //     $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gambar tidak boleh kosong');
        //     // redirect('petani/tampilSayuran');
        //     redirect('petani/tampilSayuran');
        // }
        // if ($upload_image) {
        //     $this->upload_gambar();

        //     if ($this->upload->do_upload('gambar')) {
        //         $old_image = $data['sayur']['gambar_sayur'];
        //         if ($old_image != 'sayur.jpg') {
        //             unlink(FCPATH . 'assets/img/gambar-sayur/' . $old_image);
        //         }

        //         $new_image = $this->upload->data();
        //         $id_petani = $data['user']['id'];

        //         $data = [
        //             'jenis_sayur' => htmlspecialchars($this->input->post('jenis-sayur', true)),
        //             'nama_sayur' => htmlspecialchars($this->input->post('nama-sayur', true)),
        //             'deskripsi' => htmlspecialchars($this->input->post('deskripsi', true)),
        //             'harga' => htmlspecialchars($this->input->post('harga', true)),
        //             'tanggal_rilis' => time(),
        //             'id_petani' => $id_petani,
        //             'gambar_sayur' => $new_image['file_name'],
        //             'satuan' => $this->input->post('satuan')
        //         ];

        //         $this->db->where('id', $this->input->post('id'));
        //         $this->db->update("sayuran", $data);
        //     } else {
        //         echo $this->upload->display_errors();
        //     }
        // }
        // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil diubah');
        // // redirect('petani/tampilSayuran');
        // redirect('petani/tampilSayuran');
        // // echo "Berhasil";
    }

    public function editProfile()
    {
        $data['title'] = 'Edit profile';
        $data['titleSidebar'] = 'Petani';
        $data['icon'] = '<i class="fas fa-book-reader"></i>';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('name', 'Full name', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('petani/viewEditProfile', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $namafile = "file_" . time();
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '8192'; // in kb
                $config['upload_path'] = './assets/img/profile/';
                $config['file_name'] = $namafile;
                $this->upload->initialize($config);
                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data();
                    $this->db->set('image', $new_image['file_name']);
                } else {
                    // echo $this->upload->display_errors();
                    $this->session->set_flashdata('message', "<div class='alert alert-danger' role='alert'>Wrong image format! </br>Allowed format: gif\jpg\jpeg\png </br>max size: 8 Mb</div>");
                    redirect('petani/editProfile');
                }
            }
            $this->db->set('nama', $name);
            $this->db->where('email', $email);
            $this->db->update('user');
            $this->session->set_flashdata('message', 'Diubah');
            redirect('petani/editProfile');
        }
    }


    public function ubahPassword()
    {
        $data['title'] = 'Ubah password';
        $data['titleSidebar'] = 'Petani';
        $data['icon'] = '<i class="fas fa-book-reader"></i>';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('password_saat_ini', 'Password saat ini', 'required|trim');
        $this->form_validation->set_rules('password_baru1', 'Password baru', 'required|trim|min_length[6]|matches[password_baru2]');
        $this->form_validation->set_rules('password_baru2', 'Ulangi password baru', 'required|trim|min_length[6]|matches[password_baru1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('petani/viewUbahPassword', $data);
            $this->load->view('templates/footer');
        } else {
            $password_saat_ini = $this->input->post('password_saat_ini');
            $password_baru = $this->input->post('password_baru1');

            if (!password_verify($password_saat_ini, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah !</div>');
                redirect('petani/ubahPassword');
            } else {
                if ($password_saat_ini == $password_baru) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password baru tidak boleh sama dengan password saat ini !</div>');
                    redirect('petani/ubahPassword');
                } else {
                    $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil dirubah !</div>');
                    redirect('petani/ubahPassword');
                }
            }
        }
    }

    public function pesanMasuk()
    {
        $data['title'] = 'Pesan Masuk';
        $data['titleSidebar'] = 'Petani';
        $data['icon'] = '<i class="fas fa-book-reader"></i>';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            // $this->load->view('templateChat/headerChat', $data);
            redirect('chat', 'refresh');
    }


}