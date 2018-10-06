<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Batch extends CI_Controller {
  public function __construct(){
    parent::__construct();
    $this->load->model('user_login_model') ;
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
      'page' => 'dashboard/admin/batch',
      'result' => $this->batch_model->get_batch(),
      'general' => $this->general_model
    );
    $this->load->view('home',$data);
  }

  //ADD BATCH
  public function add_batch(){
    $this->load->library('form_validation');      
    $this->form_validation->set_rules('batch','Batch','required');
    $this->form_validation->set_rules('date_begin','Date Begin','required');
    $this->form_validation->set_rules('date_end','Date End','required');

    if($this->form_validation->run() == FALSE){
      redirect('Batch');
    }else{
      $batch = $this->input->post('batch');
      $date_begin = $this->input->post('date_begin');
      $date_end = $this->input->post('date_end');

      $check_batch = $this->batch_model->check_batch($batch);

      if(!empty($check_batch)){
        $this->session->set_flashdata('error','Batch name is already there, check your data again');
      }else{
      if($date_end >= $date_begin){
      $batch_info =  array(
        "batch"=>$batch,
        "date_begin"=>$date_begin,
        "date_end"=>$date_end
      );

      $result = $this->batch_model->insert_batch($batch_info);
      $status_batch = array(
        "status"=>"inactive",
      );

      $result = $this->batch_model->edit_batch_status($status_batch, $result);
      }if($result > 0){
        $this->session->set_flashdata('success', 'Yeay, batch is successfully made!');
      }else{
        $this->session->set_flashdata('error', 'Oops, data adding is failed. Check your data again');
      }
    }
    redirect('Batch');
    }
  }
  

  //EDIT BATCH
  function edit_batch() {
    $id_batch = $this->input->post('id_batch');
    
    $this->load->library('form_validation');
    $this->form_validation->set_rules('batch','Batch','required');
    $this->form_validation->set_rules('date_begin','Date Begin','required');
    $this->form_validation->set_rules('date_end','Date End','required');

    if($this->form_validation->run() == FALSE){
      redirect('Batch');
    }else{
      $batch = $this->input->post('batch');
      $date_begin = $this->input->post('date_begin');
      $date_end = $this->input->post('date_end');

      if($date_end >= $date_begin){
        $batch_info =  array(
          "batch"=>$batch,
          "date_begin"=>$date_begin,
          "date_end"=>$date_end
        );
      
      $result = $this->batch_model->update_batch($batch_info, $id_batch);
      }if($result == TRUE){
        $this->session->set_flashdata('success', 'Yeay, batch is successfully updated!');
      }else{
        $this->session->set_flashdata('error', 'Oops, update data is failed. Check your data again');
      } 
      redirect('Batch');
    }
  }

  //BATCH ACTIVATION
  function batch_activation($id) {          
    $activation =  array("status"=>"active");
    
    $result = $this->batch_model->activation_batch($activation, $id);
    $status_batch =  array("status"=>"Inactive");
  
    $result = $this->batch_model->edit_batch_status($status_batch, $id);
  
    if($result == TRUE){
      $this->session->set_flashdata('success', 'Yeay! Successfully Done the Activation');
    }else{
      $this->session->set_flashdata('error', 'Sorry, the Activation Failed');
    } 

    redirect('Batch');
  }
}
?>

