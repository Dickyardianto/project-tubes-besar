<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Chat extends CI_Controller
{
    public $user;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
        $this->load->helper(array('url', 'form'));
        $this->load->library('user_agent');
        $this->load->model('Chat_model', 'chatModel');

        if (!isset($this->session->userdata['logged_in']) || $this->session->userdata['logged_in'] === false) {
            redirect('Auth');
        }

        $this->user = $this->db->get_where('user', array('id' => $this->session->userdata['user_id']), 1)->row();
    }

    public function index()
    {

        if ($this->session->userdata('role_id') != 2) {
            $this->indexPetani($this->user->id);
        } else {
            $this->indexPembeli($this->user->id);
        }
    }

    public function indexPetani($pengguna)
    {
        $data['title'] = 'Pesan Masuk';
        $data['titleSidebar'] = 'Petani';
        $data['icon'] = '<i class="fas fa-book-reader"></i>';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $result = $this->chatModel->getTeman($pengguna);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view(
            'chat/chat_dashboard',
            array('result' => $result)
        );
        $this->load->view('templates/footer');
    }

    public function indexPembeli($pengguna)
    {
        $data['title'] = 'Pesan Masuk';
        $data['titleSidebar'] = 'Pembeli';
        $data['icon'] = '<i class="fas fa-book-reader"></i>';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);

        $result = $this->chatModel->getTeman($pengguna);

        $this->load->view(
            'chat/chat_dashboard',
            array('result' => $result)
        );
        $this->load->view('templates/footer');
    }

    public function getChats()
    {
        header('Content-Type: application/json');
        if ($this->input->is_ajax_request()) {

            // Find friend
            $friend = $this->db->get_where('user', array('id' => $this->input->post('chatWith')), 1)->row();

            // Get Chats
            $chats = $this->chatModel->getChats($friend);

            $result = array(
                'name' => $friend->nama,
                'chats' => $chats
            );
            echo json_encode($result);
        }
    }

    public function sendMessage()
    {
        $this->chatModel->sendMessage($id);
    }
}