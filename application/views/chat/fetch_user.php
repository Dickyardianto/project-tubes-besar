<?php

$obj = $this->db->select('*');
$obj = $this->db->from('user');
$obj = $this->db-where('id !=', $this->session->userdata('id'));
$query = $obj->get();
$result = $query->result_array();

$output = '
<table class="table table-bordered table-striped">
 <tr>
  <td>Username</td>
  <td>Status</td>
  <td>Action</td>
 </tr>
';

foreach($result as $row)
{
 $output .= '
 <tr>
  <td>'.$row['username'].'</td>
  <td></td>
  <td><button type="button" class="btn btn-info btn-xs start_chat" data-touserid="'.$row['user_id'].'" data-tousername="'.$row['username'].'">Start Chat</button></td>
 </tr>
 ';
}

$output .= '</table>';

echo $output;

?>