<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'SayurKeun';
        $this->load->view('templatesHome/header', $data);
        $this->load->view('home/viewHome');
        $this->load->view('templatesHome/footer');
    }
}