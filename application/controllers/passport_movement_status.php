<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Passport_movement_status extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('common_model');
    }

    public function index() {

        if (in_array($this->session->userdata('role_id'), array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10))):
            $data['base_url'] = $this->config->item('base_url');
            $data['active_menu'] = 'Request Panel';
            $data['active_sub_menu'] = 'Passport Movement Status';

            $this->load->view('common/header_ssp', $data);
            $this->load->view('passport_movement_status_ssp/passport_movement_status_ssp', $data);
            $this->load->view('common/footer', $data);
            $this->load->view('common/js_ssp', $data);
            $this->load->view('passport_movement_status_ssp/js_passport_movement_status_ssp', $data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');
        else:
            redirect('home');
        endif;
    }

    public function editModel() {


        if (in_array($this->session->userdata('role_id'), array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10))):
            $data['base_url'] = $this->config->item('base_url');

            $edit_id = mysql_real_escape_string($this->input->post('edit_id'));
            $edit_name = mysql_real_escape_string($this->input->post('edit_name'));
            $edit_passport_no = mysql_real_escape_string($this->input->post('edit_passport_no'));
            $edit_passport_side = mysql_real_escape_string($this->input->post('edit_passport_side'));
            $change_passport_side = mysql_real_escape_string($this->input->post('change_passport_side'));







            $data = array(
                'passport_name' => $edit_name,
                'passport_number' => $edit_passport_no,
                'passport_side' => $edit_passport_side,
                'request_passport_side' => $change_passport_side,
                'status' => 2,
            );

            $table_name = 'passport_side_status';
            $insert_result = $this->common_model->insertData($table_name, $data);


            if ($insert_result):
                $this->session->set_userdata('msg_title', 'Success');
                $this->session->set_userdata('msg_body', 'Successfull');
            else:
                $this->session->set_userdata('msg_title', 'Error');
                $this->session->set_userdata('msg_body', 'Failed');
            endif;
            redirect('passport_movement_order');
        else:

            redirect('home');
        endif;
    }

    public function passwordApproved() {


        if (in_array($this->session->userdata('role_id'), array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10))):
            $data['base_url'] = $this->config->item('base_url');

            $edit_id = mysql_real_escape_string($this->input->post('edit_id'));
            $edit_password = mysql_real_escape_string($this->input->post('edit_password'));

            $table_name = 'passport_side_status';
            $result = $this->common_model->getDataWhere($table_name, 'id', $edit_id);
            foreach ($result as $row):
                $row->id;
                $passport_name = $row->passport_name;
                $passport_number = $row->passport_number;
                $passport_side = $row->passport_side;
                $request_passport_side = $row->request_passport_side;

            endforeach;
            exit;

            $data = array(
                'passport_name' => $edit_name,
                'passport_number' => $edit_passport_no,
                'passport_side' => $edit_passport_side,
                'request_passport_side' => $change_passport_side,
                'status' => 1,
            );

            $table_name = 'passport_side_status';
            $insert_result = $this->common_model->insertData($table_name, $data);


            if ($insert_result):
                $this->session->set_userdata('msg_title', 'Success');
                $this->session->set_userdata('msg_body', 'Successfull');
            else:
                $this->session->set_userdata('msg_title', 'Error');
                $this->session->set_userdata('msg_body', 'Failed');
            endif;
            redirect('passport_movement_order');
        else:

            redirect('home');
        endif;
    }

    public function deleteModel() {

        if (in_array($this->session->userdata('role_id'), array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10))):
            $data['base_url'] = $this->config->item('base_url');
            $delete_id = mysql_real_escape_string($this->input->post('delete_id'));


            $table_name = 'passport_makings';
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
            redirect('passport_movement_order');
        else:
            redirect('home');
        endif;
    }

    public function getData() {

        $data['base_url'] = $this->config->item('base_url');
        $id = mysql_real_escape_string($this->input->post('id'));

        $table_name = 'passport_side_status';
        $result = $this->common_model->getDataWhere($table_name, "id", $id);
        echo json_encode($result);
    }

    public function getTableData() {

        $table = 'passport_side_status';
        $primaryKey = 'id';
        $columns = array(
        array('db' => 'passport_name', 'dt' => 0, 'field' => 'passport_name'),
        array('db' => 'passport_number', 'dt' => 1, 'field' => 'passport_number'),
        array('db' => 'passport_side', 'dt' => 2, 'field' => 'passport_side'),
        array('db' => 'note', 'dt' => 3, 'field' => 'note'),
        array('db' => 'smsbox', 'dt' => 4, 'field' => 'smsbox'),
		
        array('db' => 'status', 'dt' => 5, 'field' => 'status', 'formatter' => function ($rowvalue, $row) {
        if($rowvalue==2){
        $status = "Pending";
        } else if($rowvalue==1){
        $status = "Approved";
        } else if($rowvalue==3){
        $status = "Rejected";
        } else{
        $status = "";
        }
        return $status;
        }),
		 array('db' => 'date_time', 'dt' => 6, 'field' => 'date_time'),
        array('db' => 'id', 'dt' => 7, 'field' => 'id', 'formatter' => function ($rowvalue, $row) {

        if($row[5]==2){
        $status = "Not Done";
        } else{
        $status = "Done";
        }

        return $status;
        })
        );
		

        $this->load->database();
        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db' => $this->db->database,
            'host' => $this->db->hostname
        );
        $this->load->library('SSP');
        // $joinQuery = "FROM `{$table}` AS `c`  JOIN `base_service_master` AS `m` ON (`c`.`ci_id` = `m`.`ref_client_id`) JOIN `base_areas` AS `a` ON (`a`.`a_id` = `c`.`ref_area_id`)";
        // $extraCondition = "`enzaz_mufa_number`!=''";

        echo json_encode(
                SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
        );
    }

}

?>
