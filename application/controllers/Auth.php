<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Login';
        $this->load->view('templates/auth_header', $data);
        $this->load->view('auth/viewLogin');
        $this->load->view('templates/auth_footer');
    }

    public function registrasi() {
        $data['title'] = 'Registrasi';
        $this->load->view('templates/auth_header', $data);
        $this->load->view('auth/viewRegistrasi');
        $this->load->view('templates/auth_footer');
    }
}