<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reference_report extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('common_model');
    }

    public function index() {

        if (in_array($this->session->userdata('role_id'), array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17))):
            $data['base_url'] = $this->config->item('base_url');
            $data['active_menu'] = 'Accounts';
            $data['active_sub_menu'] = 'Reference Report';

            $table_name = 'reference_payment';
            $data['reference_data'] = $this->common_model->getData($table_name);

            $table_name = 'reference_table';
            $data['reference_name'] = $this->common_model->getData($table_name);

            $this->load->view('common/header', $data);
            $this->load->view('reference_report/reference_report', $data);
            $this->load->view('common/footer', $data);
            $this->load->view('common/js', $data);
            $this->load->view('reference_report/js_reference_report', $data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');
        else:
            redirect('home');
        endif;
    }


    public function searchData() {

        if (in_array($this->session->userdata('role_id'), array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17))):
            $data['base_url'] = $this->config->item('base_url');
            $data['active_menu'] = 'Accounts';
            $data['active_sub_menu'] = 'Reference Report';

            $table_name = 'reference_table';
            $data['reference_name'] = $this->common_model->getData($table_name);

            $date_from=$this->input->post('date_from');
            $date_to=$this->input->post('date_to');
            $reference_id=$this->input->post('reference_name');



            if($reference_id!="" && $date_from!="" && $date_to!=""):
             $result= $this->db->query("select * from reference_payment where (date(`date_time`) between '$date_from' and '$date_to') and reference_id='$reference_id'");
                $data['reference_data'] = $result->result();

            elseif($date_from!="" && $date_to!=""):
                $result= $this->db->query("select * from reference_payment where date(`date_time`) between '$date_from' and '$date_to'");
                $data['reference_data'] = $result->result();
            elseif($reference_id!=""):
                $table_name = 'reference_payment';
                $data['reference_data'] = $this->common_model->getDataWhere($table_name,'reference_id',$reference_id);
            else:
                $table_name = 'reference_payment';
                $data['reference_data'] = $this->common_model->getData($table_name);
            endif;


            $this->load->view('common/header', $data);
            $this->load->view('reference_report/reference_report', $data);
            $this->load->view('common/footer', $data);
            $this->load->view('common/js', $data);
            $this->load->view('reference_report/js_reference_report', $data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');
        else:
            redirect('home');
        endif;
    }



}

?>
