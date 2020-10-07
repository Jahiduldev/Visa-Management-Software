<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard_visa extends CI_Controller {


    public function __construct() {
        parent::__construct();
        $this->load->model('common_model');

    }

    public function index() {


        if (in_array($this->session->userdata('role_id'), array(1, 2, 3,4,5,6,7,8,9,10,12,13))):
            $data['base_url'] = $this->config->item('base_url');
            $data['active_menu'] = 'Dashboard';
            $data['active_sub_menu'] = 'Dashboard';

         
            $this->load->view('common/header',$data);
            $this->load->view('dashboard_visa/index',$data);
            $this->load->view('common/js',$data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');
         
        else:
            redirect('home');
        endif;

    }


}
?>
