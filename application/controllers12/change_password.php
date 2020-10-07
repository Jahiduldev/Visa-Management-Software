<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Change_password extends CI_Controller {

    public function __construct() {
    
        parent::__construct();
         $this->load->model('common_model');

    }

    public function index() {
      

       if (in_array($this->session->userdata('role_id'), array(1,2,3))):
            $data['base_url'] = $this->config->item('base_url');
            $data['active_menu'] = 'Dashboard';
            $data['active_sub_menu'] = 'Dashboard';
            $this->load->view('common/header_fresh',$data);
            $this->load->view('change_password/index',$data);
            $this->load->view('common/footer',$data);
            $this->load->view('common/js',$data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');
        else:
            redirect('home');
        endif;

    }


}
?>
