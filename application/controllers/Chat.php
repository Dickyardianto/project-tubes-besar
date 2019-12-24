<?php

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

        if (!isset($this->session->userdata['logged_in']) || $this->session->userdata['logged_in'] === false) {
            redirect('Auth');
        }

        $this->user = $this->db->get_where('user', array('id' => $this->session->userdata['user_id']), 1)->row();
    }

    public function index()
    {
        $query = $this->db->query("SELECT role_id FROM user WHERE 'role_id' = 3 ");
        $row = $query->row(); 
        if((isset($this->user->role_id)) == 3){
           $this->indexPetani();
        } else{
            $this->indexPembeli();
        }
    }

    public function indexPetani()
    {
        $data['title'] = 'Pesan Masuk';
        $data['titleSidebar'] = 'Petani';
        $data['icon'] = '<i class="fas fa-book-reader"></i>';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $teman = $this->db->where('id !=', $this->user->id)->get('user');

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            // $this->load->view('templateChat/headerChat', $data);
            $this->load->view('chat/chat_dashboard', array(
                'teman' => $teman
            ));
    }

    public function indexPembeli()
    {
        $data['title'] = 'Pesan Masuk';
        $data['titleSidebar'] = 'Pembeli';
        $data['icon'] = '<i class="fas fa-book-reader"></i>';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $teman = $this->db->where('id !=', $this->user->id)->get('user');

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            // $this->load->view('templateChat/headerChat', $data);
            $this->load->view('chat/chat_dashboard', array(
                'teman' => $teman
            ));
    }

    public function getChats()
    {
        header('Content-Type: application/json');
        if ($this->input->is_ajax_request()) {
            // Find friend
            $friend = $this->db->get_where('user', array('id' => $this->input->post('chatWith')), 1)->row();

            // Get Chats
            $chats = $this->db
                ->select('chat.*, user.nama')
                ->from('chat')
                ->join('user', 'chat.send_by = user.id')
                ->where('(send_by = '. $this->user->id .' AND send_to = '. $friend->id .')')
                ->or_where('(send_to = '. $this->user->id .' AND send_by = '. $friend->id .')')
                ->order_by('chat.time', 'desc')
                ->limit(100)
                ->get()
                ->result();

            $result = array(
                'name' => $friend->nama,
                'chats' => $chats
            );
            echo json_encode($result);
        }
    }

    public function sendMessage()
    {
        $this->db->insert('chat', array(
            'message' => htmlentities($this->input->post('message', true)),
            'send_to' => $this->input->post('chatWith'),
            'send_by' => $this->user->id
        ));
    }
}