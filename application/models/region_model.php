<?php
if(!defined('BASEPATH')) exit('No direct script allowed');

class region_model extends CI_Model {
  public function __construct(){
    parent::__construct() ;
  }

  public function get_all_region(){
    $this->db->select('*');
    $this->db->from('region');

    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }
  
  public function insert_region($region,$desc, $status){
    $data = array(
      'region' => $region,
      'desc' => $desc,
      'status' => 'active'
      );
    $input = $this->db-> insert('region', $data);
    return $input ;
  }

  //pengecekan region
  public function check_region($region){
    $this->db->select("region");
    $this->db->from("region");
    $this->db->where("region",$region);

    $query = $this->db->get();
    return $query->result();
  }    

  public function update_region($data, $id_region){
    $this->db->where('id_region', $id_region);
    $this->db->update('region', $data);
    return true;
  }
}