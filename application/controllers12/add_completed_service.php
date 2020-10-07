<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Add_completed_service extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('common_model');
    }

    public function index() {



        if (in_array($this->session->userdata('role_id'), array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17))):
            $data['base_url'] = $this->config->item('base_url');
            $data['active_menu'] = 'Manipulation';
            $data['active_sub_menu'] = 'Add Completed Service';
            $table_name='base_service_custom';
            $column_name='service_status';
            $column_value=0;
            $data['get_base_service_custom_data'] = $this->common_model->getDataWhere($table_name,$column_name,$column_value);
            
            $this->load->view('common/header',$data);
            $this->load->view('add_completed_service/add_completed_service',$data);
            $this->load->view('common/footer',$data);
            $this->load->view('common/js',$data);
            $this->load->view('add_completed_service/js_add_completed_service',$data);
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
            $data['active_sub_menu'] = 'Add Completed Service';
            $customer_code= mysql_real_escape_string($this->input->post('customer_code'));
            $client_id=-1;
            $res_clients= $this->db->query("select * from base_clients where client_code='$customer_code'");
            if($res_clients->num_rows()>0):
                foreach ($res_clients->result() as $row1) :
                    $client_id=$row1->id;
                endforeach;
            endif;

            $table_name='base_service_details';
            $column_name='ref_client_id';
            $column_value=$client_id;


            $data['get_base_service_details_data'] = $this->common_model->getDataWhere($table_name,$column_name,$column_value);

            $this->load->view('common/header',$data);
            $this->load->view('add_completed_service/add_completed_service',$data);
            $this->load->view('common/footer',$data);
            $this->load->view('common/js',$data);
            $this->load->view('add_completed_service/js_add_completed_service',$data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');
        else:
            redirect('home');
        endif;
    }

    public function addCompletedService() {

        if (in_array($this->session->userdata('role_id'), array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17))):
            $data['base_url'] = $this->config->item('base_url');

            $req_id= mysql_real_escape_string($this->input->post('req_id'));
          
            $add_notes = mysql_real_escape_string($this->input->post('add_notes'));
            $filter_change = mysql_real_escape_string($this->input->post('filter_change'));

            


            $data = array(
                 
                    'service_status'=>1,
                    'note_text' => $add_notes,
                    'added_time' => date('Y-m-d H:i:s')

            );

            $table_name='base_service_custom';
            $insert_result = $this->common_model->updateData($table_name,$data,'cu_id',$req_id);


            if($insert_result):
                $this->session->set_userdata('msg_title', 'Success');
                $this->session->set_userdata('msg_body','Successfull');
            else:
                $this->session->set_userdata('msg_title', 'Error');
                $this->session->set_userdata('msg_body','Failed' );
            endif;
            redirect('add_completed_service');
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
