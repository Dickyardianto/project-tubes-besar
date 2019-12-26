<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Chat_model extends CI_model
{
    public function getTeman($pengguna)
    {
        $query_str = "SELECT DISTINCT user.nama, id, user.image FROM user JOIN chat ON chat.send_by = user.id OR chat.send_to = user.id  WHERE  (chat.send_to = $pengguna OR chat.send_by = $pengguna) AND user.id != $pengguna";
        // $query_str = "SELECT DISTINCT user.nama, id, user.image FROM user WHERE id != $pengguna ";
        return $this->db->query($query_str)->result();
    }

    public function sendMessage()
    {
        $this->db->insert('chat', array(
            'message' => htmlentities($this->input->post('message', true)),
            'send_to' => $this->input->post('chatWith'),
            'send_by' => $this->user->id
        ));
    }

    public function getChats($friend)
    {
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
        return $chats;
    }

    public function tambahChat($id)
    {
        $this->db->insert('chat', array(
            'send_to' => $id,
            'send_by' => $this->user->id
        ));
    }

}    