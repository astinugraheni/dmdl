<?php
  $userdata = $this->session->userdata('logged_in');

  if($userdata['id_user_role'] == '1')
    $this->load->view('dashboard/admin/sidebar') ;
  elseif($userdata['id_user_role'] == '2')
    $this->load->view('dashboard/volunteer/sidebar') ;
?>
