<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Team extends CI_Controller {

  public function __construct(){
    parent::__construct() ;
    $this->load->model('team_model') ;
    $this->load->model('batch_model') ;
    $this->load->model('event_model') ;
    $this->load->model('region_model') ;
    $this->load->model('user_login_model') ;
    $this->load->model('general_model');
    $this->load->model('admin_model');

    if($this->user_login_model->check_logged() == false)
      redirect('/') ;
  }

//-------------------------------------VIEW DATA TEAM-------------------------------------//
  //Supporting Team
  public function all_st(){
    if($this->session->userdata('logged_in')){
      $session_data = $this->session->userdata('logged_in');  
    }
    
    $data = array(
      'page' => 'dashboard/admin/all_st',
      'result' => $this->team_model->get_all_st(),
      'division' => $this->team_model->get_division(),
      'general' => $this->general_model
    );
    $this->load->view('home',$data);
  }

  //Internship
  public function all_intern(){
    if($this->session->userdata('logged_in')){
      $session_data = $this->session->userdata('logged_in');  
    }
    
    $data = array(
      'page' => 'dashboard/admin/all_intern',
      'result' => $this->team_model->get_all_intern(),
      'batch' => $this->batch_model->get_batch(),
      'region' => $this->region_model->get_all_region(),
      'general' => $this->general_model
    );
    $this->load->view('home',$data);
  }

  //Internship
  public function all_volunteer(){
    if($this->session->userdata('logged_in')){
      $session_data = $this->session->userdata('logged_in');  
    }
    
    $data = array(
      'page' => 'dashboard/admin/all_volunteer',
      'result' => $this->team_model->get_all_volunteer(),
      'batch' => $this->batch_model->get_batch(),
      'general' => $this->general_model
    );
    $this->load->view('home',$data);
  }

//-------------------------------------ADD DATA TEAM-------------------------------------//
  //Add Data Supporting Team
  public function add_st(){
    $data = array(
      'page' => 'dashboard/admin/all_st'
    );

    if($this->input->post('submit')){
      $this->form_validation->set_rules('name', 'Name', 'required|trim') ;
      $this->form_validation->set_rules('address', 'Address', 'required') ;
      $this->form_validation->set_rules('dob', 'Date of Birth', 'required') ;
      $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[supporting_team.email]') ;
      $this->form_validation->set_rules('cp', 'Contact Person', 'required');
      $this->form_validation->set_rules('active_date', 'Active Date', 'required');
      $this->form_validation->set_rules('status', 'Status');
      $this->form_validation->set_rules('id_division', 'Division', 'required');

      if($this->form_validation->run() == FALSE){
        $this->session->set_flashdata('errormsg', 'Oops! Check Your Data Again.') ;
        redirect('/Team/all_st') ;
        }else{
          $name = $this->input->post('name');
          $address = $this->input->post('address');
          $dob = $this->input->post('dob');
          $email = $this->input->post('email');
          $cp = $this->input->post('cp');
          $active_date = $this->input->post('active_date');
          $status = $this->input->post('status');
          $id_division = $this->input->post('id_division');
          
        if($this->team_model->insert_st($name, $address, $dob, $email, $cp, $active_date, $status, $id_division)){
          redirect('/team/all_st') ;
        }else{
          $this->load->view('home', $data) ;
        }
      }
    }
  }

  //Add Data Intern
  public function add_intern(){
    $data = array(
      'page' => 'dashboard/admin/all_intern'
    );

    if($this->input->post('submit')){
      $this->form_validation->set_rules('name', 'Name', 'required|trim') ;
      $this->form_validation->set_rules('address', 'Address', 'required') ;
      $this->form_validation->set_rules('dob', 'Date of Birth', 'required') ;
      $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[intern.email]') ;
      $this->form_validation->set_rules('cp', 'Contact Person', 'required');
      $this->form_validation->set_rules('active_date', 'Active Date', 'required');
      $this->form_validation->set_rules('status', 'Status');
      $this->form_validation->set_rules('id_batch', 'Batch', 'required');
      $this->form_validation->set_rules('id_region', 'Region', 'required');

      if($this->form_validation->run() == FALSE){
        $this->session->set_flashdata('errormsg', 'Oops! Check Your Data Again.') ;
        redirect('/Team/all_intern') ;
        }else{
          $name = $this->input->post('name');
          $address = $this->input->post('address');
          $dob = $this->input->post('dob');
          $email = $this->input->post('email');
          $cp = $this->input->post('cp');
          $active_date = $this->input->post('active_date');
          $status = $this->input->post('status');
          $id_batch = $this->input->post('id_batch');
          $id_region = $this->input->post('id_region');
          
        if($this->team_model->insert_intern($name, $address, $dob, $email, $cp, $active_date, $status, $id_batch, $id_region)){
          redirect('/Team/all_intern') ;
        }else{
          $this->load->view('home', $data) ;
        }
      }
    }
  }

  //Add Data Volunteer
  public function add_volunteer(){
    $data = array(
      'page' => 'dashboard/admin/all_volunteer'
    );

    if($this->input->post('submit')){
      $this->form_validation->set_rules('name', 'Name', 'required|trim') ;
      $this->form_validation->set_rules('address', 'Address', 'required') ;
      $this->form_validation->set_rules('dob', 'Date of Birth', 'required') ;
      $this->form_validation->set_rules('email', 'Email', 'required') ;
      $this->form_validation->set_rules('cp', 'Contact Person', 'required');
      $this->form_validation->set_rules('status', 'Status');

      if($this->form_validation->run() == FALSE){
        $this->session->set_flashdata('errormsg', 'Oops! Check Your Data Again.') ;
        redirect('/Team/all_volunteer') ;
        }else{
          $name = $this->input->post('name');
          $address = $this->input->post('address');
          $dob = $this->input->post('dob');
          $email = $this->input->post('email');
          $cp = $this->input->post('cp');
          $status = $this->input->post('status');
          
        if($this->team_model->insert_volunteer($name, $address, $dob, $email, $cp, $status)){
          redirect('/Team/all_volunteer') ;
        }else{
          $this->load->view('home', $data) ;
        }
      }
    }
  }

 //Add Data Volunteer Event
  public function add_volunteer_event(){
    $data = array(
      'page' => 'dashboard/admin/profile_volunteer'
    );

    if($this->input->post('submit')){
      $this->form_validation->set_rules('id_volunteer', 'required') ;
      $this->form_validation->set_rules('id_event', 'Event', 'required');
      $this->form_validation->set_rules('desc', 'Status', 'required');

      if($this->form_validation->run() == FALSE){
        $this->session->set_flashdata('errormsg', 'Oops! Check Your Data Again.') ;
        redirect('/Team/profile_volunteer') ;
        }else{
          $id_volunteer = $this->input->post('id_volunteer');
          $id_event = $this->input->post('id_event');
          $desc = $this->input->post('desc');
          
        if($this->team_model->insert_volunteer_event($id_volunteer, $id_event, $desc)){
          redirect('/Team/profile_volunteer') ;
        }else{
          $this->load->view('home', $data) ;
        }
      }
    }
  }


//-------------------------------------EDIT DATA TEAM-------------------------------------//
  //Edit Data ST
  public function edit_st(){
    $id_st = $this->input->post('id_st');
    $data = array(
      'page' => 'dashboard/admin/all_st',
      'result' => $this->team_model->get_all_st()
    );

    $this->form_validation->set_rules('name', 'Name', 'required') ;
    $this->form_validation->set_rules('address', 'Address', 'required') ;
    $this->form_validation->set_rules('dob', 'Date of Birth', 'required') ;
    $this->form_validation->set_rules('email', 'Email', 'required') ;
    $this->form_validation->set_rules('cp', 'Contact Person', 'required');
    $this->form_validation->set_rules('active_date', 'Active Date', 'required');
    $this->form_validation->set_rules('id_division', 'Division', 'required');

      
    if($this->form_validation->run() == FALSE){
      $this->session->set_flashdata('errormsg', 'Oops! Check Your Data Again.') ;
      $this->load->view('home', $data) ;
      }else{
        $name = $this->input->post('name');
        $address = $this->input->post('address');
        $dob = $this->input->post('dob');
        $email = $this->input->post('email');
        $cp = $this->input->post('cp');
        $active_date = $this->input->post('active_date');
        $id_division = $this->input->post('id_division');
        $data = array(
          "name" => $name,
          "address" => $address,
          "dob" => $dob,
          "email" => $email,
          "cp" => $cp,
          "active_date" => $active_date,
          "id_division" => $id_division
        );

        $result = $this->team_model->update_st($data, $id_st);
        if($result == TRUE){
          $this->session->set_flashdata('success', 'Data updated successfully');
        }else{
          $this->session->set_flashdata('error', 'Data update failed');
        } 
      }
        redirect('Team/all_st');
    }  

  //Edit Data Internship
  public function edit_intern(){
    $id_intern = $this->input->post('id_intern');
    $data = array(
      'page' => 'dashboard/admin/all_intern',
      'result' => $this->team_model->get_all_intern()
    );

      $this->form_validation->set_rules('name', 'Name', 'required') ;
      $this->form_validation->set_rules('address', 'Address', 'required') ;
      $this->form_validation->set_rules('dob', 'Date of Birth', 'required') ;
      $this->form_validation->set_rules('email', 'Email', 'required') ;
      $this->form_validation->set_rules('cp', 'Contact Person', 'required');
      $this->form_validation->set_rules('active_date', 'Active Date', 'required');
      $this->form_validation->set_rules('status', 'Status');
      $this->form_validation->set_rules('id_batch', 'Batch', 'required');
      $this->form_validation->set_rules('id_region', 'Region', 'required');
      
    if($this->form_validation->run() == FALSE){
      $this->session->set_flashdata('errormsg', 'Oops! Check Your Data Again.') ;
      $this->load->view('home', $data) ;
      }else{
        $name = $this->input->post('name');
        $address = $this->input->post('address');
        $dob = $this->input->post('dob');
        $email = $this->input->post('email');
        $cp = $this->input->post('cp');
        $active_date = $this->input->post('active_date');
        $id_batch = $this->input->post('id_batch');
        $id_region = $this->input->post('id_region');
        $data = array(
          "name" => $name,
          "address" => $address,
          "dob" => $dob,
          "email" => $email,
          "cp" => $cp,
          "active_date" => $active_date,
          "id_batch" => $id_batch,
          "id_region" => $id_region
        );

        $result = $this->team_model->update_intern($data, $id_intern);
        if($result == TRUE){
          $this->session->set_flashdata('success', 'Data updated successfully');
        }else{
          $this->session->set_flashdata('error', 'Data update failed');
        } 
      }
      redirect('Team/all_intern');
  } 

  //Edit Data Internship
  public function edit_volunteer(){
    $id_volunteer = $this->input->post('id_volunteer');
    $data = array(
      'page' => 'dashboard/admin/all_volunteer',
      'result' => $this->team_model->get_all_volunteer()
    );

      $this->form_validation->set_rules('name', 'Name', 'required|trim') ;
      $this->form_validation->set_rules('address', 'Address', 'required') ;
      $this->form_validation->set_rules('dob', 'Date of Birth', 'required') ;
      $this->form_validation->set_rules('email', 'Email', 'required') ;
      $this->form_validation->set_rules('cp', 'Contact Person', 'required');
      $this->form_validation->set_rules('status', 'Status');
      
    if($this->form_validation->run() == FALSE){
      $this->session->set_flashdata('errormsg', 'Oops! Check Your Data Again.') ;
      $this->load->view('home', $data) ;
      }else{
        $name = $this->input->post('name');
        $address = $this->input->post('address');
        $dob = $this->input->post('dob');
        $email = $this->input->post('email');
        $cp = $this->input->post('cp');
        $data = array(
          "name" => $name,
          "address" => $address,
          "dob" => $dob,
          "email" => $email,
          "cp" => $cp
        );

        $result = $this->team_model->update_volunteer($data, $id_volunteer);
        if($result == TRUE){
          $this->session->set_flashdata('success', 'Data updated successfully');
        }else{
          $this->session->set_flashdata('error', 'Data update failed');
        } 
      }
        redirect('Team/all_volunteer');
    }      

//-------------------------------------EDIT STATUS TEAM-------------------------------------//
  //Supporting Team
  public function status_st($status, $id_st){
    if($this->team_model->is_st($id_st)){
      if($this->team_model->update_status_st($status, $id_st)){
        redirect('/Team/all_st') ;
      }else{
        $this->session->set_flashdata('msgfailed', 'Failed to change status.') ;
        redirect('/Team/all_st') ;
      }
    }else{
      $this->session->set_flashdata('msgfailed', 'No staff found.') ;
        redirect('/Team/all_st') ;
    }
  }

  //Intern
  public function status_intern($status, $id_intern){
    if($this->team_model->is_intern($id_intern)){
      if($this->team_model->update_status_intern($status, $id_intern)){
        redirect('/Team/all_intern') ;
      }else{
        $this->session->set_flashdata('msgfailed', 'Failed to change status.') ;
        redirect('/Team/all_intern') ;
      }
    }else{
      $this->session->set_flashdata('msgfailed', 'No staff found.') ;
        redirect('/Team/all_intern') ;
    }
  }  

  //Volunteer
  public function status_volunteer($status, $id_volunteer){
    if($this->team_model->is_volunteer($id_volunteer)){
      if($this->team_model->update_status_volunteer($status, $id_volunteer)){
        redirect('/Team/all_volunteer') ;
      }else{
        $this->session->set_flashdata('msgfailed', 'Failed to change status.') ;
        redirect('/Team/all_volunteer') ;
      }
    }else{
      $this->session->set_flashdata('msgfailed', 'No staff found.') ;
        redirect('/Team/all_volunteer') ;
    }
  }

//-------------------------------------VIEW PROFILE DATA TEAM-------------------------------------//
  //View Supporting Team Profile
  public function profile_st($id){
    $data = array(
      'page' => 'dashboard/admin/profile_st',
      'result' => $this->team_model->get_st_id($id),
      'general' => $this->general_model
    ) ;
    $this->load->view('home', $data) ;
  }  
  
  //View Intern Team
  public function profile_intern($id){
    $data = array(
      'page' => 'dashboard/admin/profile_intern',
      'result' => $this->team_model->get_intern_id($id),
      'general' => $this->general_model
    ) ;
    $this->load->view('home', $data) ;
  }  
  
  //View Volunteer Team
  public function profile_volunteer($id){
    $data = array(
      'page' => 'dashboard/admin/profile_volunteer',
      'result' => $this->team_model->get_volunteer_id($id),
      'event' => $this->event_model->get_event(),
      'general' => $this->general_model
    ) ;
    $this->load->view('home', $data) ;
  }  
}
?>
