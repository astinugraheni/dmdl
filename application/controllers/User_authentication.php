<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user_authentication extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('user_login_model');
        $this->load->model('user_model');
        }

    // Validate the user, if user has been logged in redirect to other controller
    // if user has'nt logged in, redirect to login page
    public function index() {
        $user_data = $this->session->userdata('logged_in');
        if ($user_data['id_user_role']=='1') {
          redirect('Admin') ;
        } if ($user_data['id_user_role']=='2') {
          redirect('volunteer') ;
        }elseif ($user_data['id_user_role']=='3') {
          redirect('Staff') ;  
        }elseif ($user_data['id_user_role']=='4') {
          redirect('Staff') ;     
        }else{
          $this->load->view('auth/login');
        }
    }

    // Check for user login process
    public function user_login_process() {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            redirect('/');
        } else {
            $data = array(
                'email' => $this->input->post('email'),
                'password' => md5($this->input->post('password'))
            );
            $result = $this->user_login_model->login($data);
            if ($result == TRUE) {
                $email = $this->input->post('email');
                $result = $this->user_login_model->read_user_information($email);
                // echo var_dump($result);
                if ($result) {
                    $session_data = array(
                    'id_user' => $result[0]->id_user,
                    'email' => $result[0]->email,
                    'id_user_role' => $result[0]->id_user_role,
                    'user_role' => $result[0]->user_role,
                    'name' => $result[0]->name 
                    );
                    // Add user data in session
                    if($result[0]->id_user_role == '2'){
                        $this->session->set_userdata('logged_in', $session_data);
                    }else{
                        if($this->user_model->is_active_user($result[0]->id_user)){
                            $this->session->set_userdata('logged_in', $session_data);
                        }else{
                            $this->session->set_flashdata('auth', 'Your account is not found.') ;
                        }
                    }
                    redirect('/');
                } else {
                    $this->session->set_flashdata('auth', 'Sorry, some technical issue.') ;
                    redirect('/') ;
                }
            } else {
                $this->session->set_flashdata('auth', 'Invalid Username or Password') ;
                redirect('/') ;
            }
        }
    }

    // Logout from admin page
    public function logout() {

        // Removing session data
        $sess_array = array(
            'username' => ''
        );
        $this->session->unset_userdata('logged_in', $sess_array);
        $data['message_display'] = 'Successfully Logout';
        //$this->load->view('login_form', $data);
        $this->load->view('auth/login',$data);
        redirect('/');
    }
}

?>
