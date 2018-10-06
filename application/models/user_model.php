<?php
if(!defined('BASEPATH')) exit('No direct script allowed');

class user_model extends CI_Model {
    public function __construct(){
      parent::__construct() ;
    }
    
     public function is_active_user($id_user){
        $this->db->select('*') ;
        $this->db->from('user') ;
        $this->db->where('id_user', $id_user) ;
        $this->db->where('status', 'active') ;
        $query = $this->db->get() ;

        if($query->num_rows() == 1) 
            return true ;

        return false ;
    }
}