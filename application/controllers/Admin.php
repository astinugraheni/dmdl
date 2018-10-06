<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

  public function __construct(){
    parent::__construct() ;
    $this->load->model('user_login_model') ;
    $this->load->model('general_model');
    $this->load->model('admin_model');
    $this->load->model('team_model');
    $this->load->model('region_model');

    if($this->user_login_model->check_logged() == false)
      redirect('/') ;
  }

  public function index(){
    $id = $this->session->userdata('logged_in')['id_user'];
    $data = array(
      'page' => 'dashboard/admin/index',
      'admin' =>$this->admin_model->get_admin(),
      'volunteer' =>$this->team_model->get_all_volunteer(),
      'intern' =>$this->team_model->get_all_intern(),
      'region' =>$this->region_model->get_all_region()
    );
    $this->load->view('home',$data);
  }
}
?>
