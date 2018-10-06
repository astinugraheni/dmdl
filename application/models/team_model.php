<?php
if(!defined('BASEPATH')) exit('No direct script allowed');

class team_model extends CI_Model {
  public function __construct(){
    parent::__construct() ;
  }

  public function get_division(){
    $this->db->select('division.id_division, division.name AS division');
    $this->db->from('division');
    $this->db->where('division.status', 'active');

    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

//--------------------------------GET DATA TEAM--------------------------------//
  //Suppporting Team
  public function get_all_st()
  {
    $this->db->select('supporting_team.*, division.id_division, division.name AS division');
    $this->db->from('supporting_team');
    $this->db->join('division ', 'supporting_team.id_division = division.id_division');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  //Intern
  public function get_all_intern()
  {
    $this->db->select('intern.*, region.id_region, region.region, batch.id_batch, batch.batch');
    $this->db->from('intern');
    $this->db->join('region ', 'intern.id_region = region.id_region');
    $this->db->join('batch ', 'intern.id_batch = batch.id_batch');
    $this->db->where('batch.status','active');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  //Intern
  public function get_all_volunteer()
  {
    $this->db->select('*');
    $this->db->from('volunteer');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }  

 //--------------------------------ADD DATA TEAM--------------------------------//
  //Supporting Team
  public function insert_st($name, $address, $dob, $email, $cp, $active_date, $status, $id_division){
    $data = array(
      'name' => $name,
      'address' => $address,
      'dob' => $dob,
      'email' => $email,
      'cp' => $cp,
      'active_date' => $active_date,
      'status' => 'active',
      'id_division' => $id_division
      );
    $input = $this->db-> insert('supporting_team', $data);
    return $input ;
  }
  
  //Intern
  public function insert_intern($name, $address, $dob, $email, $cp, $active_date, $status, $id_batch, $id_region){
    $data = array(
      'name' => $name,
      'address' => $address,
      'dob' => $dob,
      'email' => $email,
      'cp' => $cp,
      'active_date' => $active_date,
      'status' => 'active',
      'id_batch' => $id_batch,
      'id_region' => $id_region
      );
    $input = $this->db-> insert('intern', $data);
    return $input ;
  }  

  //Volunteer
  public function insert_volunteer($name, $address, $dob, $email, $cp, $status){
    $data = array(
      'name' => $name,
      'address' => $address,
      'dob' => $dob,
      'email' => $email,
      'cp' => $cp,
      'status' => 'active'
      );
    $input = $this->db-> insert('volunteer', $data);
    return $input ;
  }  

//--------------------------------UPDATE  DATA TEAM--------------------------------//
  //Supporting Team
  public function update_st($data, $id_st){
    $this->db->where('id_st', $id_st);
    $this->db->update('supporting_team', $data);
    return true;
  }

  //Intern
  public function update_intern($data, $id_intern){
    $this->db->where('id_intern', $id_intern);
    $this->db->update('intern', $data);
    return true;
  }

  //Volunteer
  public function update_volunteer($data, $id_volunteer){
    $this->db->where('id_volunteer', $id_volunteer);
    $this->db->update('volunteer', $data);
    return true;
  }

//--------------------------------UPDATE STATUS TEAM--------------------------------//
  //Supporting Team 
  public function is_st($id_st){
    $this->db->select('*');
    $this->db->from('supporting_team') ;
    $this->db->where('id_st', $id_st) ;
    $query = $this->db->get() ;

    if($query->num_rows() == 1)
      return true ;

    return false ;
  }

  public function update_status_st($status, $id_st){
    $data = array(
      'status' => $status
    ) ;
    $this->db->where("id_st = ".$id_st) ;
    $query = $this->db->update('supporting_team', $data) ;

    return $query ? $query : false ;
  } 

  //Intern
  public function is_intern($id_intern){
    $this->db->select('*');
    $this->db->from('intern') ;
    $this->db->where('id_intern', $id_intern) ;
    $query = $this->db->get() ;

    if($query->num_rows() == 1)
      return true ;

    return false ;
  }

  public function update_status_intern($status, $id_intern){
    $data = array(
      'status' => $status
    ) ;
    $this->db->where("id_intern = ".$id_intern) ;
    $query = $this->db->update('intern', $data) ;

    return $query ? $query : false ;
  } 

  //Volunteer
  public function is_volunteer($id_volunteer){
    $this->db->select('*');
    $this->db->from('volunteer') ;
    $this->db->where('id_volunteer', $id_volunteer) ;
    $query = $this->db->get() ;

    if($query->num_rows() == 1)
      return true ;

    return false ;
  }

  public function update_status_volunteer($status, $id_volunteer){
    $data = array(
      'status' => $status
    ) ;
    $this->db->where("id_volunteer = ".$id_volunteer) ;
    $query = $this->db->update('volunteer', $data) ;

    return $query ? $query : false ;
  } 

//--------------------------------PROFILE TEAM--------------------------------//
  //Supporting Team
  public function get_st_id($id){
    $this->db->select('supporting_team.*, division.id_division, division.name AS division');
    $this->db->from('supporting_team');
    $this->db->join('division ', 'supporting_team.id_division = division.id_division');
    $this->db->where('supporting_team.id_st', $id) ;
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }  

  //Intern
  public function get_intern_id($id){
    $this->db->select('intern.*, region.id_region, region.region, batch.id_batch, batch.batch');
    $this->db->from('intern');
    $this->db->join('region ', 'region.id_region = intern.id_region');
    $this->db->join('batch ', 'batch.id_batch = intern.id_batch');
    $this->db->where('intern.id_intern', $id) ;
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }  
  
  //Volunteer
  public function get_volunteer_id($id){
    $this->db->select('volunteer.*, event.id_event, event.event as event, volunteer_event.*');
    $this->db->from('volunteer');
    $this->db->join('volunteer_event', 'volunteer_event.id_volunteer = volunteer.id_volunteer', 'left');
    $this->db->join('event', 'volunteer_event.id_event = event.id_event', 'left');
    $this->db->where('volunteer.id_volunteer', $id) ;
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }  
}