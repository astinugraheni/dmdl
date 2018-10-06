<?php
if(!defined('BASEPATH')) exit('No direct script allowed');

class event_model extends CI_Model {
  public function __construct(){
    parent::__construct() ;
  }

  public function get_event(){
    $this->db->select('event.*, region.id_region, region.region, batch.id_batch, batch.batch');
    $this->db->from('event');
    $this->db->join('region', 'region.id_region = event.id_region');
    $this->db->join('batch', 'batch.id_batch = event.id_batch');

    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function insert_event($event, $date_begin, $date_end, $desc, $id_region, $id_batch){
    $data = array(
      'event' => $event,
      'date_begin' => $date_begin,
      'date_end' => $date_end,
      'desc' => $desc,
      'id_region' => $id_region,
      'id_batch' => $id_batch
      );
    $input = $this->db-> insert('event', $data);
    return $input ;
  }

  public function check_event($event){
    $this->db->select("event");
    $this->db->from("event");
    $this->db->where("event",$event);

    $query = $this->db->get();
    return $query->result();
  } 

  public function update_event($event_info, $id_event){
    $this->db->where('id_event', $id_event);
    $this->db->update('event', $event_info);
    return true;
  }  
}