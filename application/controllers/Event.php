<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event extends CI_Controller {
  public function __construct(){
    parent::__construct();
    $this->load->model('user_login_model') ;
    $this->load->model('event_model');
    $this->load->model('region_model');
    $this->load->model('batch_model');
    $this->load->model('general_model');
    if($this->user_login_model->check_logged() == false)
      redirect('/') ;
  }

  public function index(){
    if($this->session->userdata('logged_in')){
      $session_data = $this->session->userdata('logged_in');
    }
    $data = array(
      'page' => 'dashboard/admin/event',
      'result' => $this->event_model->get_event(),
      'region' => $this->region_model->get_all_region(),
      'batch' => $this->batch_model->get_batch(),
      'general' => $this->general_model
    );
    $this->load->view('home',$data);
  }

  //ADD EVENT
  public function add_event(){
    $data = array(
      'page' => 'dashboard/admin/event'
    ) ;

    $this->load->library('form_validation');

    if($this->input->post('submit')){
      $this->load->library('form_validation');      
      $this->form_validation->set_rules('event','Event','required');
      $this->form_validation->set_rules('date_begin','Date Begin','required');
      $this->form_validation->set_rules('date_end','Date End','required');
      $this->form_validation->set_rules('desc','Descrption','required');
      $this->form_validation->set_rules('id_region','Event','required');
      $this->form_validation->set_rules('id_batch','Batch','required');
      if($this->form_validation->run() == FALSE){
        $this->load->view('home', $data) ;
      }else{
        $event = $this->input->post('event');
        $date_begin = $this->input->post('date_begin');
        $date_end = $this->input->post('date_end');
        $desc = $this->input->post('desc');
        $id_region = $this->input->post('id_region');
        $id_batch = $this->input->post('id_batch');

        $check_event = $this->event_model->check_event($event);

        if(!empty($check_event)){
        $this->session->set_flashdata('error', 'Sorry, data already exist. Please check out your input again :)');
        redirect('Event');
        }else{
          $result = $this->event_model->insert_event($event, $date_begin, $date_end, $desc, $id_region, $id_batch);
          if(result == TRUE){
            $this->session->set_flashdata('success', 'Data added successfully');
            redirect('Event') ;
          }else{
            $this->session->set_flashdata('error', 'Data adding failed');
            $this->load->view('home', $data) ;
          }
        }
      }
    }else{
       redirect('Event') ;
    }
  }

  //EDIT BATCH
  public function edit_event() {
    $id_event = $this->input->post('id_event');
    
    $this->load->library('form_validation');
    $this->form_validation->set_rules('event','Event','required');
    $this->form_validation->set_rules('date_begin','Date Begin','required');
    $this->form_validation->set_rules('date_end','Date End','required');
    $this->form_validation->set_rules('desc','Descrption','required');
    $this->form_validation->set_rules('id_region','Event','required');
    $this->form_validation->set_rules('id_batch','Batch','required');

    if($this->form_validation->run() == FALSE){
      redirect('Event');
    }else{
      $event = $this->input->post('event');
      $date_begin = $this->input->post('date_begin');
      $date_end = $this->input->post('date_end');
      $desc = $this->input->post('desc');
      $id_region = $this->input->post('id_region');
      $id_batch = $this->input->post('id_batch');

      if($date_end >= $date_begin){
        $event_info =  array(
          "event"=>$event,
          "date_begin"=>$date_begin,
          "date_end"=>$date_end,
          "desc"=>$desc,
          "id_region"=>$id_region,
          "id_batch"=>$id_batch
        );
      
      $result = $this->event_model->update_event($event_info, $id_event);
      }if($result == TRUE){
        $this->session->set_flashdata('success', 'Yeay, event is successfully updated!');
      }else{
        $this->session->set_flashdata('error', 'Oops, update data is failed. Check your data again');
      } 
      redirect('Event');
    }
  }
}
?>

