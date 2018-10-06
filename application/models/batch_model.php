<?php
if(!defined('BASEPATH')) exit('No direct script allowed');

class batch_model extends CI_Model {
    public function __construct(){
      parent::__construct() ;
    }
//----------------------Batch Model----------------------//
  public function get_batch(){
    $this->db->select('*');
    $this->db->from('batch');

    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function insert_batch($batch_info){
    $this->db->trans_start();
      
    $this->db->insert('batch',$batch_info);
    $insert_id = $this->db->insert_id();
    
    $this->db->trans_complete();
    return $insert_id;
  }

  function activation_batch($activation, $id) {
    $this->db->where('id_batch', $id);
    $this->db->update('batch', $activation);
    
    return TRUE;
  }
  
  public function update_batch($batch_info, $id_batch){
    $this->db->where('id_batch', $id_batch);
    $this->db->update('batch', $batch_info);
    return true;
  }

  function edit_batch_status($status, $id_batch) {
    $where = "id_batch != ". $id_batch;
    $this->db->where($where);
    $this->db->update('batch', $status);
    
    return TRUE;
  }

  //pengecekan batch
  public function check_batch($batch){
    $this->db->select("batch");
    $this->db->from("batch");
    $this->db->where("batch",$batch);

    $query = $this->db->get();
    return $query->result();
  }
}