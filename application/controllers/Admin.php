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

    public function editProfile()
    {
        $data['title'] = 'Edit profile';
        $data['titleSidebar'] = 'Admin';
        $data['icon'] = '<i class="fas fa-user-cog"></i>';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('name', 'Full name', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/viewEditProfile', $data);
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
                    redirect('admin/editProfile');
                }
            }
            $this->db->set('nama', $name);
            $this->db->where('email', $email);
            $this->db->update('user');
            $this->session->set_flashdata('message', 'Di ubah');
            redirect('admin/editProfile');
        }
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

    public function hapusPetani($id)
    {
        $this->admin->hapusDataPetani($id);
        $this->session->set_flashdata('message', 'Dihapus');
        redirect('admin/dataPetani');
    }

    public function dataPembeli()
    {
        $data['title'] = 'Pembeli';
        $data['titleSidebar'] = 'Admin';
        $data['icon'] = '<i class="fas fa-user-cog"></i>';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['users'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result_array();
        $data['data'] = $this->admin->getDataPembeli();

        // echo 'Selamat datang ' . $data['user']['name'];
        // $data['menu'] = $this->db->get('user_menu')->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/viewDataPembeli', $data);
            $this->load->view('templates/footer');
        } else {
            // $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu baru ditambahkan  </div>');
            // // Meredirect ke controller Auth/method index
            // redirect('menu');
        }
    }

    public function hapusPembeli($id)
    {
        $this->admin->hapusDataPetani($id);
        $this->session->set_flashdata('message', 'Dihapus');
        redirect('admin/dataPembeli');
    }


    public function ubahPassword()
    {
        $data['title'] = 'Ubah Password';
        $data['titleSidebar'] = 'Admin';
        $data['icon'] = '<i class="fas fa-user-cog"></i>';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('password_saat_ini', 'Password saat ini', 'required|trim');
        $this->form_validation->set_rules('password_baru1', 'Password baru', 'required|trim|min_length[6]|matches[password_baru2]');
        $this->form_validation->set_rules('password_baru2', 'Ulangi password baru', 'required|trim|min_length[6]|matches[password_baru1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/viewUbahPassword', $data);
            $this->load->view('templates/footer');
        } else {
            $password_saat_ini = $this->input->post('password_saat_ini');
            $password_baru = $this->input->post('password_baru1');

            if (!password_verify($password_saat_ini, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah !</div>');
                redirect('admin/ubahPassword');
            } else {
                if ($password_saat_ini == $password_baru) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password baru tidak boleh sama dengan password saat ini !</div>');
                    redirect('admin/ubahPassword');
                } else {
                    $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil dirubah !</div>');
                    redirect('admin/ubahPassword');
                }
            }
        }
    }
}