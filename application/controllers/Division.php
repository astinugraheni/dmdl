<?php 
  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class Division extends CI_Controller{
    public function __construct(){
      parent::__construct() ;
      $this->load->model('user_login_model') ;
      $this->load->model('division_model') ;

      if($this->user_login_model->check_logged() == false) redirect('/') ;  
    }

    public function index(){
      if($this->session->userdata('logged_in')){
        $session_data = $this->session->userdata('logged_in'); 
      }
    
      $data = array(
        'page' => 'dashboard/admin/division',
        'result' => $this->division_model->get_all_division()
      );
      $this->load->view('home',$data);
    }

    
//Add Program
    public function add_division(){
      $data = array(
        'page' => 'dashboard/admin/division'
      ) ;

      $this->load->library('form_validation');

      if($this->input->post('submit')){
        $this->form_validation->set_rules('name', 'Name', 'required') ;
        $this->form_validation->set_rules('desc', 'Desc', 'required') ;
        $this->form_validation->set_rules('status', 'Status');


        if($this->form_validation->run() == FALSE){
          $this->load->view('home', $data) ;
        }else{
          $name = $this->input->post('name') ;
          $desc = $this->input->post('desc') ;
          $status = $this->input->post('status') ;

          $check_division = $this->division_model->check_division($name);

          if(!empty($check_division)){
          $this->session->set_flashdata('error', 'Sorry, data already exist. Please check out your input again :)');
          redirect('Division');
          }else{
            $result = $this->division_model->insert_division($name, $desc, $status);
            if(result == TRUE){
              $this->session->set_flashdata('success', 'Data added successfully');
              redirect('Division') ;
            }else{
              $this->session->set_flashdata('error', 'Data adding failed');
              $this->load->view('home', $data) ;
            }
          }
        }
      }else{
         redirect('Division') ;
      }
    }

//EDIT DATA PROGRAM
    public function edit_division(){
      $id_division = $this->input->post('id_division');
      
      $this->load->library('form_validation');
      $this->form_validation->set_rules('name', 'Name', 'required') ;
      $this->form_validation->set_rules('desc', 'Desc', 'required') ;
      $this->form_validation->set_rules('status', 'Status', 'required') ;
        
      if($this->form_validation->run() == FALSE){
        $this->load->view('home', $data) ;
        }else{
          $name = $this->input->post('name');
          $desc = $this->input->post('desc');
          $status = $this->input->post('status');

        $data = array(
            "name" => $name,
            "desc" => $desc,
            "status" => $status
          );
          
          $result = $this->division_model->update_division($data, $id_division);
          if($result == TRUE){
            $this->session->set_flashdata('success', 'Data updated successfully');
          }else{
            $this->session->set_flashdata('error', 'Data update failed');
          } 
          redirect('Division');
      }
    }
}
?>