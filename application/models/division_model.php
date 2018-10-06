<?php
if(!defined('BASEPATH')) exit('No direct script allowed');

class division_model extends CI_Model {
  public function __construct(){
    parent::__construct() ;
  }

  public function get_all_division(){
    $this->db->select('*');
    $this->db->from('division');

    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }
  
  public function insert_division($name,$desc, $status){
    $data = array(
      'name' => $name,
      'desc' => $desc,
      'status' => $status
      );
    $input = $this->db-> insert('division', $data);
    return $input ;
  }

  //pengecekan division
  public function check_division($name){
    $this->db->select("name");
    $this->db->from("division");
    $this->db->where("name",$name);

    $query = $this->db->get();
    return $query->result();
  }    

  public function update_division($data, $id_division){
    $this->db->where('id_division', $id_division);
    $this->db->update('division', $data);
    return true;
  }
}