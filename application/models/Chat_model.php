<?php

class Chat_model extends CI_model
{
    public function getTeman($pengguna)
    {
        $query_str = "SELECT DISTINCT user.nama, id, user.image FROM user JOIN chat ON chat.send_by = user.id WHERE chat.send_to = $pengguna";
        $query_str = "SELECT DISTINCT user.nama, id, user.image FROM user JOIN chat ON chat.send_to = user.id WHERE chat.send_by = $pengguna";
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