<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class View_enjaz_com extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('common_model');
    }

    public function index() {

        if (in_array($this->session->userdata('role_id'), array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17))):
            $data['base_url'] = $this->config->item('base_url');
            $data['active_menu'] = 'Enjaz Info';
            $data['active_sub_menu'] = 'Complete';

            $this->load->view('common/header_ssp', $data);
            $this->load->view('view_enjaz_ssp_com/view_enjaz_ssp_com', $data);
            $this->load->view('common/footer', $data);
            $this->load->view('common/js_ssp', $data);
            $this->load->view('view_enjaz_ssp_com/js_view_enjaz_ssp_com', $data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');
        else:
            redirect('home');
        endif;
    }

    
    public function enjazToday() {

        if (in_array($this->session->userdata('role_id'), array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17))):
            $data['base_url'] = $this->config->item('base_url');
            $data['active_menu'] = 'Enjaz Info';
            $data['active_sub_menu'] = 'Complete';

            $this->load->view('common/header_ssp', $data);
            $this->load->view('view_enjaz_ssp_com_today/view_enjaz_ssp_com', $data);
            $this->load->view('common/footer', $data);
            $this->load->view('common/js_ssp', $data);
            $this->load->view('view_enjaz_ssp_com_today/js_view_enjaz_ssp_com', $data);
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
           

            $edit_mufa_number = mysql_real_escape_string($this->input->post('edit_mufa_number'));
           
          
            $edit_enjaz_date = mysql_real_escape_string($this->input->post('edit_enjaz_date'));
            $edit_enjaz_note = mysql_real_escape_string($this->input->post('edit_enjaz_note'));
          

            
            $data = array(

                'enzaz_mufa_number' => $edit_mufa_number,              
                'enzaz_date' => $edit_enjaz_date,
                'enzaz_note' => $edit_enjaz_note
               
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
            redirect('view_enjaz_com');
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
            redirect('view_customer');
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
            array('db' => 'enzaz_mufa_number', 'dt' => 2, 'field' => 'enzaz_mufa_number'),
            array('db' => 'enzaz_date', 'dt' => 3, 'field' => 'enzaz_date'),
            array('db' => 'enzaz_note', 'dt' => 4, 'field' => 'enzaz_note'),
            array('db' => 'id', 'dt' => 5, 'field' => 'id', 'formatter' => function ($rowvalue, $row) {
                    return ' Checked';
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
        $joinQuery="";
        
       $extraCondition = "`enzaz_mufa_number`!=''";

        echo json_encode(
                SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns,'',$extraCondition)
        );
    }
    
    
    
   public function getTableDataToday() {

        $table = 'passport_makings';
        $primaryKey = 'id';
        $columns = array(
            array('db' => 'name', 'dt' => 0, 'field' => 'name'),
            array('db' => 'passport_no', 'dt' => 1, 'field' => 'passport_no'),
            array('db' => 'enzaz_mufa_number', 'dt' => 2, 'field' => 'enzaz_mufa_number'),
            array('db' => 'enzaz_date', 'dt' => 3, 'field' => 'enzaz_date'),
            array('db' => 'enzaz_note', 'dt' => 4, 'field' => 'enzaz_note'),
            array('db' => 'id', 'dt' => 5, 'field' => 'id', 'formatter' => function ($rowvalue, $row) {
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
        $joinQuery="";
        $date = date('Y-m-d');
       $extraCondition = "`enzaz_mufa_number`!=''  ";

        echo json_encode(
                SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns,'',$extraCondition)
        );
    }  
    

}

?>
