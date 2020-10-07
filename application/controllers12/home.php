<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('home_model');
        $this->load->model('common_model');
    }

    public function index() {

        if (in_array($this->session->userdata('role_id'),array( 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20))):
        
            redirect('dashboard');
        else:
            $data['base_url'] = $this->config->item('base_url');
            $this->load->view('login/login', $data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');
        endif;
    }




    public function login() {

       $user_name = trim(mysql_real_escape_string($this->input->post('user_name')));
      $password = trim(mysql_real_escape_string($this->input->post('password')));







      $login_check = $this->home_model->loginCheck($user_name, base64_encode($password));
      
      

        if ($login_check->num_rows()):
            $user_id = $login_check->row()->user_id;
            $user_name = $login_check->row()->user_name;
            $role_id = $login_check->row()->role_id;
            $status = $login_check->row()->status;

            if($status ==2):
                $this->session->set_userdata('msg_title', 'Error');
                $this->session->set_userdata('msg_body', 'Sorry,You are not active employee.');
                redirect('home');

            endif;

            $this->session->set_userdata('user_id', $user_id);
            $this->session->set_userdata('user_name', $user_name);
            $this->session->set_userdata('role_id', $role_id);
          //  $this->session->set_userdata('emp_id', $emp_id);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');

         
            redirect('home');
        else:
            $this->session->set_userdata('msg_title', 'Error');
            $this->session->set_userdata('msg_body', 'Wrong Username Or Password');
            redirect('home');
        endif;

    }



    public function logout() {
        $this->session->unset_userdata('user_name');
        $this->session->unset_userdata('role_id');

        //   $this->session->sess_destroy();
        $this->session->set_userdata('msg_title', 'Success');
        $this->session->set_userdata('msg_body', 'Logout Successfully');

        redirect('home');
    }
}

