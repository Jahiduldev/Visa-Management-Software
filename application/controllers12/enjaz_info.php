<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Enjaz_info extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('common_model');
    }

    public function index() {



        if (in_array($this->session->userdata('role_id'), array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17))):
            $data['base_url'] = $this->config->item('base_url');
            $data['active_menu'] = 'Passport Receive';
            $data['active_sub_menu'] = 'Enjaz Info';

            $data['base_clients_data'] = array();
            $this->load->view('common/header',$data);
            $this->load->view('enjaz_info/enjaz_info',$data);
            $this->load->view('common/footer',$data);
            $this->load->view('common/js',$data);
            $this->load->view('enjaz_info/js_enjaz_info',$data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');
        else:
            redirect('home');
        endif;
    }

    public function getServiceSearch() {

        if (in_array($this->session->userdata('role_id'), array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17))):
            $data['base_url'] = $this->config->item('base_url');
            $data['active_menu'] = 'Manipulation';
            $data['active_sub_menu'] = 'Add Service';
            $customer_code= mysql_real_escape_string($this->input->post('customer_code'));
         
            $res_clients= $this->db->query("select * from passport_makings where client_code='$customer_code'");
         $data['base_clients_data']=$res_clients->result();

          

            $this->load->view('common/header',$data);
            $this->load->view('add_service/add_service',$data);
            $this->load->view('common/footer',$data);
            $this->load->view('common/js',$data);
            $this->load->view('add_service/js_add_service',$data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');
        else:
            redirect('home');
        endif;
    }

    public function addReqService() {

        if (in_array($this->session->userdata('role_id'), array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17))):
            $data['base_url'] = $this->config->item('base_url');

            $client_id= mysql_real_escape_string($this->input->post('client_id'));
            $add_customer_code= mysql_real_escape_string($this->input->post('add_customer_code'));
            $add_mobile_number = mysql_real_escape_string($this->input->post('add_mobile_number'));
            $add_service_priority = mysql_real_escape_string($this->input->post('add_service_priority'));
            $add_request_date = mysql_real_escape_string($this->input->post('add_request_date'));
            $add_service_description = mysql_real_escape_string($this->input->post('add_service_description'));


            $data = array(
                    'ref_client_id' => $client_id,
                    'request_date' => $add_request_date,
                    'service_description' => $add_service_description,
                    'service_status' => 0,
                    'is_active' => 1,
                    'service_priority' => $add_service_priority,
                    'added_time' => date('Y-m-d H:i:s')

            );

            $table_name='base_service_custom';
            $insert_result = $this->common_model->insertData($table_name,$data);


            if($insert_result):
                $this->session->set_userdata('msg_title', 'Success');
                $this->session->set_userdata('msg_body','Successfull');
            else:
                $this->session->set_userdata('msg_title', 'Error');
                $this->session->set_userdata('msg_body','Failed' );
            endif;
            redirect('add_service');
        else:

            redirect('home');
        endif;
    }



    public function getData1() {

        $data['base_url'] = $this->config->item('base_url');
        $user_id = mysql_real_escape_string($this->input->post('user_id'));

        $table_name='base_clients';
        $result = $this->common_model->getDataWhere($table_name,"ci_id",$user_id);
        echo json_encode($result);


    }
}
?>
