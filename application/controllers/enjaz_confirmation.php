<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Enjaz_confirmation extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('common_model');
    }

    public function index() {

        if (in_array($this->session->userdata('role_id'), array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17))):
            $data['base_url'] = $this->config->item('base_url');
            $data['active_menu'] = 'Request Panel';
            $data['active_sub_menu'] = 'Enjaz confirmation';

            $this->load->view('common/header_ssp', $data);
            $this->load->view('view_enjaz_confirmation_ssp/view_enjaz_confirmation_ssp', $data);
            $this->load->view('common/footer', $data);
            $this->load->view('common/js_ssp', $data);
            $this->load->view('view_enjaz_confirmation_ssp/js_view_enjaz_confirmation_ssp', $data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');
        else:
            redirect('home');
        endif;
    }

    public function editModel() {


        if (in_array($this->session->userdata('role_id'), array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17))):
            $data['base_url'] = $this->config->item('base_url');

            $edit_id = mysql_real_escape_string($this->input->post('edit_id'));
            $edit_name = mysql_real_escape_string($this->input->post('edit_name'));
            $edit_passport_no = mysql_real_escape_string($this->input->post('edit_passport_no'));
            $edit_en_note = mysql_real_escape_string($this->input->post('edit_en_note'));
          




            $data = array(
			
                    'passport_name' => $edit_name,
                    'passport_number' => $edit_passport_no,
                    'en_note' => $edit_en_note,
                    'status' => 2,
					'date_time' =>date('Y-m-d H:i:s')
            );

            $table_name = 'enjaz_table';
            $insert_result = $this->common_model->insertData($table_name, $data);


            if ($insert_result):
                $this->session->set_userdata('msg_title', 'Success');
                $this->session->set_userdata('msg_body', 'Successfull');
            else:
                $this->session->set_userdata('msg_title', 'Error');
                $this->session->set_userdata('msg_body', 'Failed');
            endif;
            redirect('enjaz_confirmation');
        else:

            redirect('home');
        endif;
    }

    public function deleteModel() {

        if (in_array($this->session->userdata('role_id'), array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17))):
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
            redirect('enjaz_confirmation');
        else:
            redirect('home');
        endif;
    }

    public function getData() {

        $data['base_url'] = $this->config->item('base_url');
        $id = mysql_real_escape_string($this->input->post('id'));

        $table_name = 'passport_makings';
        $result = $this->common_model->getDataWhere($table_name, "id", $id);
        echo json_encode($result);
    }

    public function getTableData() {

        $table = 'passport_makings';
        $primaryKey = 'id';
        $columns = array(
                array('db' => 'name', 'dt' => 0, 'field' => 'name'),
                array('db' => 'passport_no', 'dt' => 1, 'field' => 'passport_no'),
                array('db' => 'enzaz_note', 'dt' => 2, 'field' => 'enzaz_note'),
                array('db' => 'id', 'dt' => 3, 'field' => 'id', 'formatter' => function ($rowvalue, $row) {
                            return '<a  href="#">
      <button class="btn btn-primary btn-xs" onclick="addModal(' . $rowvalue . ')"><i class="fa fa-pencil"> Request</i></button></a>
	  
	  </a>';
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
        $joinQuery = "";
       
        // $extraCondition = "`basic_receive_site` = 'Inside'";

        echo json_encode(
        SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns,$joinQuery)
        );
    }

}

?>
