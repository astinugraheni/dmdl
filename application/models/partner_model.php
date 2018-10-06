<?php
if(!defined('BASEPATH')) exit('No direct script allowed');

class partner_model extends CI_Model {
  public function __construct(){
    parent::__construct() ;
  }

//--------------------------------GET DATA PARTNER--------------------------------//
  //Influencer
  public function get_influencer(){
    $this->db->select('*');
    $this->db->from('influencer');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  //Mentor
  public function get_mentor(){
    $this->db->select('*');
    $this->db->from('mentor');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  //MEDPART
  public function get_medpart(){
    $this->db->select('*');
    $this->db->from('medpart');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }
  //SPONSOR
  public function get_sponsor(){
    $this->db->select('*');
    $this->db->from('sponsor');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }  

 //--------------------------------ADD DATA PARTNER--------------------------------//
  //Influencer
  public function insert_influencer($name, $address, $cp, $email, $desc){
    $data = array(
      'name' => $name,
      'address' => $address,
      'cp' => $cp,
      'email' => $email,
      'desc' => $desc
      );
    $input = $this->db-> insert('influencer', $data);
    return $input ;
  }
  
  //Mentor
  public function insert_mentor($name, $address, $cp, $email, $desc){
    $data = array(
      'name' => $name,
      'address' => $address,
      'cp' => $cp,
      'email' => $email,
      'desc' => $desc
      );
    $input = $this->db-> insert('mentor', $data);
    return $input ;
  }

  //Medpart
  public function insert_medpart($name, $address, $cp, $email, $type){
    $data = array(
      'name' => $name,
      'address' => $address,
      'cp' => $cp,
      'email' => $email,
      'type' => $type
      );
    $input = $this->db-> insert('medpart', $data);
    return $input ;
  }  

  //Sponsor
  public function insert_sponsor($name, $address, $cp, $email, $desc){
    $data = array(
      'name' => $name,
      'address' => $address,
      'cp' => $cp,
      'email' => $email,
      'desc' => $desc
      );
    $input = $this->db-> insert('sponsor', $data);
    return $input ;
  }
//--------------------------------UPDATE  DATA PARTNER--------------------------------//
  //Influencer
  public function update_influencer($data, $id_influencer){
    $this->db->where('id_influencer', $id_influencer);
    $this->db->update('influencer', $data);
    return true;
  }

  //Mentor
  public function update_mentor($data, $id_mentor){
    $this->db->where('id_mentor', $id_mentor);
    $this->db->update('mentor', $data);
    return true;
  }

  //Medpart
  public function update_medpart($data, $id_medpart){
    $this->db->where('id_medpart', $id_medpart);
    $this->db->update('medpart', $data);
    return true;
  }

  //Sponsor
  public function update_sponsor($data, $id_sponsor){
    $this->db->where('id_sponsor', $id_sponsor);
    $this->db->update('sponsor', $data);
    return true;
  } 
}