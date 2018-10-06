<?php 
  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class Region extends CI_Controller{
    public function __construct(){
      parent::__construct() ;
      $this->load->model('user_login_model') ;
      $this->load->model('region_model') ;

      if($this->user_login_model->check_logged() == false) redirect('/') ;  
    }

    public function index(){
      if($this->session->userdata('logged_in')){
        $session_data = $this->session->userdata('logged_in'); 
      }
    
      $data = array(
        'page' => 'dashboard/admin/region',
        'result' => $this->region_model->get_all_region()
      );
      $this->load->view('home',$data);
    }

    
//Add Program
    public function add_region(){
      $data = array(
        'page' => 'dashboard/admin/region'
      ) ;

      $this->load->library('form_validation');

      if($this->input->post('submit')){
        $this->form_validation->set_rules('region', 'Name', 'required') ;
        $this->form_validation->set_rules('desc', 'Desc', 'required') ;
        $this->form_validation->set_rules('status', 'Status');

        if($this->form_validation->run() == FALSE){
          $this->load->view('home', $data) ;
        }else{
          $region = $this->input->post('region') ;
          $desc = $this->input->post('desc') ;
          $status = $this->input->post('status') ;

          $check_region = $this->region_model->check_region($region);

          if(!empty($check_region)){
          $this->session->set_flashdata('error', 'Sorry, data already exist. Please check out your input again :)');
          redirect('Region');
          }else{
            $result = $this->region_model->insert_region($region, $desc, $status);
            if(result == TRUE){
              $this->session->set_flashdata('success', 'Data added successfully');
              redirect('Region') ;
            }else{
              $this->session->set_flashdata('error', 'Data adding failed');
              $this->load->view('home', $data) ;
            }
          }
        }
      }else{
         redirect('Region') ;
      }
    }

//EDIT DATA PROGRAM

//EDIT DATA PROGRAM
    public function edit_region(){
      $id_region = $this->input->post('id_region');
      
      $this->load->library('form_validation');
      $this->form_validation->set_rules('region', 'Name', 'required') ;
      $this->form_validation->set_rules('desc', 'Desc', 'required') ;
      $this->form_validation->set_rules('status', 'Status', 'required') ;
        
      if($this->form_validation->run() == FALSE){
        $this->load->view('home', $data) ;
        }else{
          $region = $this->input->post('region');
          $desc = $this->input->post('desc');
          $status = $this->input->post('status');

        $data = array(
            "region" => $region,
            "desc" => $desc,
            "status" => $status
          );
          
          $result = $this->region_model->update_region($data, $id_region);
          if($result == TRUE){
            $this->session->set_flashdata('success', 'Data updated successfully');
          }else{
            $this->session->set_flashdata('error', 'Data update failed');
          } 
          redirect('Region');
      }
    }
}
?>