<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class View_fitcard_com extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('common_model');
    }

    public function index() {

        if (in_array($this->session->userdata('role_id'), array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17))):
            $data['base_url'] = $this->config->item('base_url');
            $data['active_menu'] = 'Passport Receive';
            $data['active_sub_menu'] = 'Fitcard complete';

            $this->load->view('common/header_ssp', $data);
            $this->load->view('view_fitcard_ssp_com/view_fitcard_ssp_com', $data);
            $this->load->view('common/footer', $data);
            $this->load->view('common/js_ssp', $data);
            $this->load->view('view_fitcard_ssp_com/js_view_fitcard_ssp_com', $data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');
        else:
            redirect('home');
        endif;
    }

    public function getExpire() {

        if (in_array($this->session->userdata('role_id'), array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17))):
            $data['base_url'] = $this->config->item('base_url');
            $data['active_menu'] = 'Passport Receive';
            $data['active_sub_menu'] = 'Fitcard complete';

            $this->load->view('common/header_ssp', $data);
            $this->load->view('view_fitcard_ssp_com_expire/view_fitcard_ssp_com', $data);
            $this->load->view('common/footer', $data);
            $this->load->view('common/js_ssp', $data);
            $this->load->view('view_fitcard_ssp_com_expire/js_view_fitcard_ssp_com', $data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');
        else:
            redirect('home');
        endif;
    }
    
    
    
    public function fitcardToday() {

        if (in_array($this->session->userdata('role_id'), array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17))):
            $data['base_url'] = $this->config->item('base_url');
            $data['active_menu'] = 'Passport Receive';
            $data['active_sub_menu'] = 'Fitcard complete';

            $this->load->view('common/header_ssp', $data);
            $this->load->view('view_fitcard_ssp_com_today/view_fitcard_ssp_com_today', $data);
            $this->load->view('common/footer', $data);
            $this->load->view('common/js_ssp', $data);
            $this->load->view('view_fitcard_ssp_com_today/js_view_fitcard_ssp_com_today', $data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');
        else:
            redirect('home');
        endif;
    }

    public function editModel() {


        if (in_array($this->session->userdata('role_id'), array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17))):
            $data['base_url'] = $this->config->item('base_url');

            $edit_id = mysql_real_escape_string($this->input->post('edit_id'));

            $edit_name = mysql_real_escape_string($this->input->post('edit_name'));
            $edit_passport_no = mysql_real_escape_string($this->input->post('edit_passport_no'));
            $edit_receive_date = mysql_real_escape_string($this->input->post('edit_receive_date'));
            $edit_expire_date = mysql_real_escape_string($this->input->post('edit_expire_date'));
            $edit_fitcard_note = mysql_real_escape_string($this->input->post('edit_fitcard_note'));



            $data = array(
                'fit_receive_receive_date' => $edit_receive_date,
                'fit_receive_expire_date' => $edit_expire_date,
                'fit_receive_note' => $edit_fitcard_note
            );

            $table_name = 'passport_makings';
            $insert_result = $this->common_model->updateData($table_name, $data, "id", $edit_id);


            if ($insert_result):
                $this->session->set_userdata('msg_title', 'Success');
                $this->session->set_userdata('msg_body', 'Successfull');
            else:
                $this->session->set_userdata('msg_title', 'Error');
                $this->session->set_userdata('msg_body', 'Failed');
            endif;
            redirect('view_fitcard_com');
        else:

            redirect('home');
        endif;
    }

    public function deleteModel() {

        if (in_array($this->session->userdata('role_id'), array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17))):
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
            redirect('view_fitcard_com');
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
            array('db' => 'fit_receive_receive_date', 'dt' => 2, 'field' => 'fit_receive_receive_date'),
            array('db' => 'fit_receive_expire_date', 'dt' => 3, 'field' => 'fit_receive_expire_date'),
            array('db' => 'id', 'dt' => 4, 'field' => 'id', 'formatter' => function ($rowvalue, $row) {
                    $val1 = date_diff(date_create(date('Y-m-d')), date_create($row[3]))->format("%R%a");
                    if ($val1 > 20) {
                        $val2 = "<p style='color:green;'>$val1</p>";
                    } else {
                        $val2 = "<p style='color:red;'>$val1</p>";
                    }
                    return '' . $val2 . '';
                }),
            array('db' => 'fit_receive_note', 'dt' => 5, 'field' => 'fit_receive_note'),
            array('db' => 'id', 'dt' => 6, 'field' => 'id', 'formatter' => function ($rowvalue, $row) {
                    return '<a  href="#">
      <button class="btn btn-primary btn-xs" onclick="editModal(' . $rowvalue . ')"><i class="fa fa-pencil"> Edit</i></button></a>
	  
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

        $extraCondition = "`fit_receive_receive_date`!=''";

        echo json_encode(
                SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns, '', $extraCondition)
        );
    }

    public function getTableDataExpire() {

        $table = 'passport_makings';
        $primaryKey = 'id';
        $columns = array(
            array('db' => 'name', 'dt' => 0, 'field' => 'name'),
            array('db' => 'passport_no', 'dt' => 1, 'field' => 'passport_no'),
            array('db' => 'fit_receive_receive_date', 'dt' => 2, 'field' => 'fit_receive_receive_date'),
            array('db' => 'fit_receive_expire_date', 'dt' => 3, 'field' => 'fit_receive_expire_date'),
            array('db' => 'id', 'dt' => 4, 'field' => 'id', 'formatter' => function ($rowvalue, $row) {
                    $val1 = date_diff(date_create(date('Y-m-d')), date_create($row[3]))->format("%R%a");
                    if ($val1 > 20) {
                        $val2 = "<p style='color:green;'>$val1</p>";
                    } else {
                        $val2 = "<p style='color:red;'>$val1</p>";
                    }
                    return '' . $val2 . '';
                }),
            array('db' => 'fit_receive_note', 'dt' => 5, 'field' => 'fit_receive_note'),
            array('db' => 'id', 'dt' => 6, 'field' => 'id', 'formatter' => function ($rowvalue, $row) {
                    return 'Read Only';
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

        $extraCondition = "(`embassy_visa_stamping_status`!='Complete' || `embassy_visa_stamping_status` IS NULL) and `fit_receive_receive_date`!='' and (DATEDIFF(`fit_receive_expire_date`,CURDATE()))<=20";

        echo json_encode(
                SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns, '', $extraCondition)
        );
    }

    public function getTableDataToday() {

        $table = 'passport_makings';
        $primaryKey = 'id';
        $columns = array(
            array('db' => 'name', 'dt' => 0, 'field' => 'name'),
            array('db' => 'passport_no', 'dt' => 1, 'field' => 'passport_no'),
            array('db' => 'fit_receive_receive_date', 'dt' => 2, 'field' => 'fit_receive_receive_date'),
            array('db' => 'fit_receive_expire_date', 'dt' => 3, 'field' => 'fit_receive_expire_date'),
            array('db' => 'id', 'dt' => 4, 'field' => 'id', 'formatter' => function ($rowvalue, $row) {
                    $val1 = date_diff(date_create(date('Y-m-d')), date_create($row[3]))->format("%R%a");
                    return '' . $val1 . '';
                }),
            array('db' => 'fit_receive_note', 'dt' => 5, 'field' => 'fit_receive_note'),
            array('db' => 'id', 'dt' => 6, 'field' => 'id', 'formatter' => function ($rowvalue, $row) {
                    return '<a  href="#">
      <button class="btn btn-primary btn-xs" onclick="editModal(' . $rowvalue . ')"><i class="fa fa-pencil"> Edit</i></button></a>
	  
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
        $date = date('Y-m-d');
        $extraCondition = "`fit_receive_receive_date`!='' and `fit_receive_receive_date` Like '$date%' ";

        echo json_encode(
                SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns, '', $extraCondition)
        );
    }

}

?>
