<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Create_broker extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('common_model');
    }

    public function index() {
        $per_role_arr = array();
        $url = $this->uri->segment(1);
        $table_name = 'subs_menu';
        $column_name = 'url';
        $column_value = $url;
        $get_url_data = $this->common_model->getDataWhere($table_name, $column_name, $column_value);
        foreach ($get_url_data as $row):
            $sub_menu_id = $row->sub_menu_id;
            $get_role_data = $this->common_model->getDataWhere('permission', 'sub_menu_id', $sub_menu_id);
            foreach ($get_role_data as $row2):
                $role_id = $row2->role_id;
                array_push($per_role_arr, $role_id);
            endforeach;
        endforeach;

        if (in_array($this->session->userdata('role_id'), $per_role_arr)):
            $data['base_url'] = $this->config->item('base_url');
            $data['active_menu'] = 'Accounts';
            $data['active_sub_menu'] = 'Create Broker';

            $result = $this->db->query("select * from broker_table order by 	id desc limit 1");
            if ($result->num_rows() > 0):
                foreach ($result->result() as $row) :
                    $id = $row->id;
                    $data['last_row'] = $id + 1;
                endforeach;
            else:
                $data['last_row'] = 1;
            endif;

            $table_name = 'broker_table';
            $data['get_broker_data'] = $this->common_model->getData($table_name);



            $this->load->view('common/header', $data);
            $this->load->view('create_broker/create_broker', $data);
            $this->load->view('common/footer', $data);
            $this->load->view('common/js', $data);
            $this->load->view('create_broker/js_create_broker', $data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');
        else:
            redirect('home');
        endif;
    }

    public function addBroker() {

        if (in_array($this->session->userdata('role_id'), array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17))):
            $data['base_url'] = $this->config->item('base_url');


            $add_broker_name = mysql_real_escape_string(trim($this->input->post('add_broker_name')));
            $add_broker_id = mysql_real_escape_string($this->input->post('add_broker_id'));
            $add_broker_mobile_number = mysql_real_escape_string($this->input->post('add_broker_mobile_number'));
			$add_broker_mobile_number_1 = mysql_real_escape_string($this->input->post('add_broker_mobile_number_1'));
			$add_broker_mobile_number_2 = mysql_real_escape_string($this->input->post('add_broker_mobile_number_2'));
            $add_date = mysql_real_escape_string($this->input->post('add_date'));





            date_default_timezone_set("Asia/Dhaka");
            $date = date('Y-m-d');
            $data = array(
                'broker_name' => $add_broker_name,
                'broker_id' => $add_broker_id,
                'broker_mobile' => $add_broker_mobile_number,
				'broker_mobile_1' => $add_broker_mobile_number_1,
				'broker_mobile_2' => $add_broker_mobile_number_2,
                'date' => $date,
            );

            $table_name = 'broker_table';
            $insert_result = $this->common_model->insertData($table_name, $data);


            if ($insert_result):
                $this->session->set_userdata('msg_title', 'Success');
                $this->session->set_userdata('msg_body', 'Successfull');
            else:
                $this->session->set_userdata('msg_title', 'Error');
                $this->session->set_userdata('msg_body', 'Failed');
            endif;
            redirect('create_broker');
        else:

            redirect('home');
        endif;
    }

    public function getBrokerData() {

        $data['base_url'] = $this->config->item('base_url');
        $id = mysql_real_escape_string($this->input->post('id'));

        $table_name = 'broker_table';
        $result = $this->common_model->getDataWhere($table_name, "id", $id);
        echo json_encode($result);
    }

    public function editBroker() {


        if (in_array($this->session->userdata('role_id'), array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17))):
            $data['base_url'] = $this->config->item('base_url');

            $edit_id = mysql_real_escape_string($this->input->post('edit_id'));

            $edit_broker_name = mysql_real_escape_string($this->input->post('edit_broker_name'));
            $edit_broker_id = mysql_real_escape_string($this->input->post('edit_broker_id'));
            $edit_broker_mobile_number = mysql_real_escape_string($this->input->post('edit_broker_mobile_number'));
			$edit_broker_mobile_number_1 = mysql_real_escape_string($this->input->post('edit_broker_mobile_number_1'));
			$edit_broker_mobile_number_2 = mysql_real_escape_string($this->input->post('edit_broker_mobile_number_2'));





            $data = array(
                'broker_name' => $edit_broker_name,
                'broker_id' => $edit_broker_id,
                'broker_mobile' => $edit_broker_mobile_number,
				'broker_mobile_1' => $edit_broker_mobile_number_1,
				'broker_mobile_2' => $edit_broker_mobile_number_2
            );

            $table_name = 'broker_table';
            $insert_result = $this->common_model->updateData($table_name, $data, "id", $edit_id);


            if ($insert_result):
                $this->session->set_userdata('msg_title', 'Success');
                $this->session->set_userdata('msg_body', 'Successfull');
            else:
                $this->session->set_userdata('msg_title', 'Error');
                $this->session->set_userdata('msg_body', 'Failed');
            endif;
            redirect('create_broker');
        else:

            redirect('home');
        endif;
    }

    public function deleteBroker() {

        if (in_array($this->session->userdata('role_id'), array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17))):
            $data['base_url'] = $this->config->item('base_url');
            $delete_id = mysql_real_escape_string($this->input->post('delete_id'));


            $table_name = 'broker_table';
            $column_name = 'id';
            $column_value = $delete_id;
            $insert_result = $this->common_model->deleteData($table_name, $column_name, $column_value);


            if ($insert_result):
                $this->session->set_userdata('msg_title', 'Success');
                $this->session->set_userdata('msg_body', 'Successfull');
            else:
                $this->session->set_userdata('msg_title', 'Error');
                $this->session->set_userdata('msg_body', 'Failed');
            endif;
            redirect('create_broker');
        else:
            redirect('home');
        endif;
    }

}

?>
