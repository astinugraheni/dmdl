<?php
if(!defined('BASEPATH')) exit('No direct script allowed');

class admin_model extends CI_Model {
    public function __construct(){
      parent::__construct() ;
    }

  public function get_admin(){
      $this->db->select('user.id_user, user.name, user.email');
      $this->db->from('user');

      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }    

}