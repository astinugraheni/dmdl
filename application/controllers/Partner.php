<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Partner extends CI_Controller {

  public function __construct(){
    parent::__construct() ;
    $this->load->model('partner_model') ;
    $this->load->model('user_login_model') ;

    if($this->user_login_model->check_logged() == false)
      redirect('/') ;
  }

//-------------------------------------VIEW DATA PARTNER-------------------------------------//
  //Influencer
  public function all_influencer(){
    if($this->session->userdata('logged_in')){
      $session_data = $this->session->userdata('logged_in');  
    }
    
    $data = array(
      'page' => 'dashboard/admin/influencer',
      'result' => $this->partner_model->get_influencer()
    );
    $this->load->view('home',$data);
  }

  //Mentor
  public function all_mentor(){
    if($this->session->userdata('logged_in')){
      $session_data = $this->session->userdata('logged_in');  
    }
    
    $data = array(
      'page' => 'dashboard/admin/mentor',
      'result' => $this->partner_model->get_mentor()
    );
    $this->load->view('home',$data);
  }

  //Media Partner
  public function all_medpart(){
    if($this->session->userdata('logged_in')){
      $session_data = $this->session->userdata('logged_in');  
    }
    
    $data = array(
      'page' => 'dashboard/admin/medpart',
      'result' => $this->partner_model->get_medpart()
    );
    $this->load->view('home',$data);
  }

  //Sponsor
  public function all_sponsor(){
    if($this->session->userdata('logged_in')){
      $session_data = $this->session->userdata('logged_in');  
    }
    
    $data = array(
      'page' => 'dashboard/admin/sponsor',
      'result' => $this->partner_model->get_sponsor()
    );
    $this->load->view('home',$data);
  }
//-------------------------------------ADD DATA PARTNER-------------------------------------//
  //Add Influencer
  public function add_influencer(){
    $data = array(
      'page' => 'dashboard/admin/influencer'
    );

    if($this->input->post('submit')){
      $this->form_validation->set_rules('name', 'Name', 'required|trim') ;
      $this->form_validation->set_rules('address', 'Address', 'required') ;
      $this->form_validation->set_rules('cp', 'Contact Person', 'required');      
      $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[influencer.email]') ;
      $this->form_validation->set_rules('desc', 'Description', 'required');

      if($this->form_validation->run() == FALSE){
        $this->session->set_flashdata('errormsg', 'Oops! Check Your Data Again.') ;
        redirect('/Partner/all_influencer') ;
        }else{
          $name = $this->input->post('name');
          $address = $this->input->post('address');
          $cp = $this->input->post('cp');
          $email = $this->input->post('email');
          $desc = $this->input->post('desc');
          
        if($this->partner_model->insert_influencer($name, $address, $cp, $email, $desc)){
          redirect('/Partner/all_influencer') ;
        }else{
          $this->load->view('home', $data) ;
        }
      }
    }
  }

//Add Mentor
  public function add_mentor(){
    $data = array(
      'page' => 'dashboard/admin/mentor'
    );

    if($this->input->post('submit')){
      $this->form_validation->set_rules('name', 'Name', 'required|trim') ;
      $this->form_validation->set_rules('address', 'Address', 'required') ;
      $this->form_validation->set_rules('cp', 'Contact Person', 'required');      
      $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[mentor.email]') ;
      $this->form_validation->set_rules('desc', 'Description', 'required');

      if($this->form_validation->run() == FALSE){
        $this->session->set_flashdata('errormsg', 'Oops! Check Your Data Again.') ;
        redirect('/Partner/all_mentor') ;
        }else{
          $name = $this->input->post('name');
          $address = $this->input->post('address');
          $cp = $this->input->post('cp');
          $email = $this->input->post('email');
          $desc = $this->input->post('desc');
          
        if($this->partner_model->insert_mentor($name, $address, $cp, $email, $desc)){
          redirect('/Partner/all_mentor') ;
        }else{
          $this->load->view('home', $data) ;
        }
      }
    }
  }

//Add Media Partner
  public function add_medpart(){
    $data = array(
      'page' => 'dashboard/admin/medpart'
    );

    if($this->input->post('submit')){
      $this->form_validation->set_rules('name', 'Name', 'required|trim') ;
      $this->form_validation->set_rules('address', 'Address', 'required') ;
      $this->form_validation->set_rules('cp', 'Contact Person', 'required');      
      $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[medpart.email]') ;
      $this->form_validation->set_rules('type', 'Type', 'required');

      if($this->form_validation->run() == FALSE){
        $this->session->set_flashdata('errormsg', 'Oops! Check Your Data Again.') ;
        redirect('Partner/all_medpart') ;
        }else{
          $name = $this->input->post('name');
          $address = $this->input->post('address');
          $cp = $this->input->post('cp');
          $email = $this->input->post('email');
          $type = $this->input->post('type');
          
        if($this->partner_model->insert_medpart($name, $address, $cp, $email, $type)){
          redirect('Partner/all_medpart') ;
        }else{
          $this->load->view('home', $data) ;
        }
      }
    }
  }

//Add Sponsor
  public function add_sponsor(){
    $data = array(
      'page' => 'dashboard/admin/sponsor'
    );

    if($this->input->post('submit')){
      $this->form_validation->set_rules('name', 'Name', 'required|trim') ;
      $this->form_validation->set_rules('address', 'Address', 'required') ;
      $this->form_validation->set_rules('cp', 'Contact Person', 'required');      
      $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[sponsor.email]') ;
      $this->form_validation->set_rules('desc', 'Description', 'required');

      if($this->form_validation->run() == FALSE){
        $this->session->set_flashdata('errormsg', 'Oops! Check Your Data Again.') ;
        redirect('/Partner/all_sponsor') ;
        }else{
          $name = $this->input->post('name');
          $address = $this->input->post('address');
          $cp = $this->input->post('cp');
          $email = $this->input->post('email');
          $desc = $this->input->post('desc');
          
        if($this->partner_model->insert_sponsor($name, $address, $cp, $email, $desc)){
          redirect('/Partner/all_sponsor') ;
        }else{
          $this->load->view('home', $data) ;
        }
      }
    }
  }

//-------------------------------------EDIT DATA PARTNER-------------------------------------//
  //Edit Data Influencer
  public function edit_influencer(){
    $id_influencer = $this->input->post('id_influencer');
    $data = array(
      'page' => 'dashboard/admin/influencer',
      'result' => $this->partner_model->get_influencer()
    );

    $this->form_validation->set_rules('name', 'Name', 'required|trim') ;
    $this->form_validation->set_rules('address', 'Address', 'required') ;
    $this->form_validation->set_rules('cp', 'Contact Person', 'required');      
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[supporting_team.email]') ;
    $this->form_validation->set_rules('desc', 'Description', 'required');
      
    if($this->form_validation->run() == FALSE){
      $this->session->set_flashdata('errormsg', 'Oops! Check Your Data Again.') ;
      $this->load->view('home', $data) ;
      }else{
        $name = $this->input->post('name');
        $address = $this->input->post('address');
        $cp = $this->input->post('cp');
        $email = $this->input->post('email');
        $desc = $this->input->post('desc');
        $data = array(
          "name" => $name,
          "address" => $address,
          "cp" => $cp,
          "email" => $email,
          "desc" => $desc
        );

        $result = $this->partner_model->update_influencer($data, $id_influencer);
        if($result == TRUE){
          $this->session->set_flashdata('success', 'Data updated successfully');
        }else{
          $this->session->set_flashdata('error', 'Data update failed');
        } 
      }
        redirect('Partner/all_influencer');
    }  

  //Edit Data Mentor
  public function edit_mentor(){
    $id_mentor = $this->input->post('id_mentor');
    $data = array(
      'page' => 'dashboard/admin/mentor',
      'result' => $this->partner_model->get_mentor()
    );

    $this->form_validation->set_rules('name', 'Name', 'required|trim') ;
    $this->form_validation->set_rules('address', 'Address', 'required') ;
    $this->form_validation->set_rules('cp', 'Contact Person', 'required');      
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[supporting_team.email]') ;
    $this->form_validation->set_rules('desc', 'Description', 'required');
      
    if($this->form_validation->run() == FALSE){
      $this->session->set_flashdata('errormsg', 'Oops! Check Your Data Again.') ;
      $this->load->view('home', $data) ;
      }else{
        $name = $this->input->post('name');
        $address = $this->input->post('address');
        $cp = $this->input->post('cp');
        $email = $this->input->post('email');
        $desc = $this->input->post('desc');
        $data = array(
          "name" => $name,
          "address" => $address,
          "cp" => $cp,
          "email" => $email,
          "desc" => $desc
        );

        $result = $this->partner_model->update_mentor($data, $id_mentor);
        if($result == TRUE){
          $this->session->set_flashdata('success', 'Data updated successfully');
        }else{
          $this->session->set_flashdata('error', 'Data update failed');
        } 
      }
        redirect('Partner/all_mentor');
    }  

  //Edit Data Media Partner
  public function edit_medpart(){
    $id_medpart = $this->input->post('id_medpart');
    $data = array(
      'page' => 'dashboard/admin/medpart',
      'result' => $this->partner_model->get_medpart()
    );

    $this->form_validation->set_rules('name', 'Name', 'required|trim') ;
    $this->form_validation->set_rules('address', 'Address', 'required') ;
    $this->form_validation->set_rules('cp', 'Contact Person', 'required');      
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[supporting_team.email]') ;
    $this->form_validation->set_rules('type', 'Type', 'required');
      
    if($this->form_validation->run() == FALSE){
      $this->session->set_flashdata('errormsg', 'Oops! Check Your Data Again.') ;
      $this->load->view('home', $data) ;
      }else{
        $name = $this->input->post('name');
        $address = $this->input->post('address');
        $cp = $this->input->post('cp');
        $email = $this->input->post('email');
        $type = $this->input->post('type');
        $data = array(
          "name" => $name,
          "address" => $address,
          "cp" => $cp,
          "email" => $email,
          "type" => $type
        );

        $result = $this->partner_model->update_medpart($data, $id_medpart);
        if($result == TRUE){
          $this->session->set_flashdata('success', 'Data updated successfully');
        }else{
          $this->session->set_flashdata('error', 'Data update failed');
        } 
      }
        redirect('Partner/all_medpart');
    }      

  //Edit Data Sponsor
  public function edit_sponsor(){
    $id_sponsor = $this->input->post('id_sponsor');
    $data = array(
      'page' => 'dashboard/admin/sponsor',
      'result' => $this->partner_model->get_sponsor()
    );

    $this->form_validation->set_rules('name', 'Name', 'required|trim') ;
    $this->form_validation->set_rules('address', 'Address', 'required') ;
    $this->form_validation->set_rules('cp', 'Contact Person', 'required');      
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[supporting_team.email]') ;
    $this->form_validation->set_rules('desc', 'Description', 'required');
      
    if($this->form_validation->run() == FALSE){
      $this->session->set_flashdata('errormsg', 'Oops! Check Your Data Again.') ;
      $this->load->view('home', $data) ;
      }else{
        $name = $this->input->post('name');
        $address = $this->input->post('address');
        $cp = $this->input->post('cp');
        $email = $this->input->post('email');
        $desc = $this->input->post('desc');
        $data = array(
          "name" => $name,
          "address" => $address,
          "cp" => $cp,
          "email" => $email,
          "desc" => $desc
        );

        $result = $this->partner_model->update_sponsor($data, $id_sponsor);
        if($result == TRUE){
          $this->session->set_flashdata('success', 'Data updated successfully');
        }else{
          $this->session->set_flashdata('error', 'Data update failed');
        } 
      }
        redirect('Partner/all_sponsor');
  }
}
?>
