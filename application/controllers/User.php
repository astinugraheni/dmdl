<?php 
  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class User extends CI_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->model('user_login_model') ;
      $this->load->model('staff_model') ;
      $this->load->model('volunteer_model') ;
      $this->load->model('user_model');
      $this->load->model('general_model') ;

      if($this->user_login_model->check_logged() == false) redirect('/') ;
    }

    public function index(){
      if($this->user_login_model->check_logged())
        redirect('/user/profile/'.$this->session->userdata('logged_in')['id_user']) ;
      else
        redirect('/') ;
    }

//View User Profile to Staff/ Volunteer
    public function profile($id){
      // redirect if there is no session or no user data
      $is_user = $this->user_login_model->is_user($id) ;
      if($this->user_login_model->check_logged() == false) redirect('/') ;
      elseif($is_user == false) 
        redirect('/user/profile/'.$this->session->userdata('logged_in')['id_user']) ;

      $data = array(
        'page' => intval($is_user[0]->id_user_role) == 2 ? 'dashboard/volunteer/profile' : 'dashboard/staff/profile', 
        'result' => intval($is_user[0]->id_user_role) == 2 ? $this->volunteer_model->get_user_id($id) : $this->staff_model->get_user_id($id),
        // 'program' => $this->volunteer_model->get_program(),
        'division' => $this->staff_model->get_divisions(),
        'team' => $this->volunteer_model->get_team(),
        'general' => $this->general_model
        ) ;
      $this->load->view('home', $data) ;
    }

//Edit Data Profile From Staff View
    public function edit($id){
      $is_user = $this->user_login_model->is_user($id) ;
      if($is_user == false) redirect('/user/profile/'.$this->session->userdata('logged_in')['id_user']) ;

      if($this->input->post('submit')){
        $this->form_validation->set_rules('name', 'Name', 'required|trim') ;
        $this->form_validation->set_rules('contact_person', 'Phone Number') ;
        $this->form_validation->set_rules('address', 'Address') ;
        $this->form_validation->set_rules('dob', 'Date of Birth') ;
        
        if($this->form_validation->run() == FALSE){
          $this->session->set_flashdata('errormsg', 'Oops! Make Sure Your Data is Complete.') ;
          redirect('/user/profile/'.$id) ;
        }else{
          $user_data = array(
            'email' => $this->input->post('email'),
            'name' => $this->input->post('name'),
          ) ;

          $staff_data = array(
            'contact_person' => $this->input->post('contact_person'),
            'address' => $this->input->post('address'),
            'dob' => $this->input->post('dob')
          ) ;

          if(!empty($this->input->post('password'))) 
            $user_data['password'] = md5($this->input->post('password')) ;

          $result = $this->user_login_model->update_user($id, $user_data, $staff_data);
            if($result == TRUE){
            $this->session->set_flashdata('success', 'Yeay! Data Updated Successfully.');
            }else{
            $this->session->set_flashdata('error', 'Oops! Sorry Data Update Failed.');
          } 
          redirect('/user/profile/'.$id) ;
          }
        }
      }

//Edit Data Volunteer From Volunteer View
    public function edit_volunteer($id){
      $is_user = $this->user_login_model->is_user($id) ;
      if($is_user == false) redirect('/user/profile/'.$this->session->userdata('logged_in')['id_user']) ;

      if($this->input->post('submit')){
        $this->form_validation->set_rules('name', 'Name', 'required|trim') ;
        $this->form_validation->set_rules('contact_person', 'Phone Number') ;
        $this->form_validation->set_rules('address', 'Address') ;
        $this->form_validation->set_rules('dob', 'Date of Birth') ;
        
        if($this->form_validation->run() == FALSE){
          $this->session->set_flashdata('errormsg', 'Oops! Make Sure Your Data is Complete.') ;
          redirect('/user/profile/'.$id) ;
        }else{
          $user_data = array(
            'email' => $this->input->post('email'),
            'name' => $this->input->post('name'),
          ) ;

          $volunteer_data = array(
            'contact_person' => $this->input->post('contact_person'),
            'address' => $this->input->post('address'),
            'dob' => $this->input->post('dob')
          ) ;

          if(!empty($this->input->post('password'))) 
            $user_data['password'] = md5($this->input->post('password')) ;

          $result = $this->user_login_model->update_volunteer($id, $user_data, $volunteer_data);
            if($result == TRUE){
            $this->session->set_flashdata('success', 'Yeay! Data Updated Successfully.');
            }else{
            $this->session->set_flashdata('error', 'Oops! Sorry Data Update Failed.');
          } 
          redirect('/user/profile/'.$id) ;
          }
        }
      }
}
?>