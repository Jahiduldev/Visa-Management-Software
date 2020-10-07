<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Enjaz_status extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('common_model');
    }

    public function index() {

        if (in_array($this->session->userdata('role_id'), array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17))):
            $data['base_url'] = $this->config->item('base_url');
            $data['active_menu'] = 'Request Panel';
            $data['active_sub_menu'] = 'Enjaz status';

            $this->load->view('common/header_ssp', $data);
            $this->load->view('enjaz_status_ssp/enjaz_status_ssp', $data);
            $this->load->view('common/footer', $data);
            $this->load->view('common/js_ssp', $data);
            $this->load->view('enjaz_status_ssp/js_enjaz_status_ssp', $data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');
        else:
            redirect('home');
        endif;
    }

  
   public function print_page() {
        if (in_array($this->session->userdata('role_id'), array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17))):
            $data['base_url'] = $this->config->item('base_url');
          //  $gender_type = $this->input->post('gender_type');
          //  $passport_type = $this->input->post('passport_type');

            $in_arr = "";
            foreach ($_POST as $key => $value) {
            if($key=='editable-sample_length')
            continue;
                $in_arr .= $value . ",";
            }


            if ($in_arr == "") {
                $data['print_data'] = array();
            } else {
                $in_arr = rtrim($in_arr, ',');
               
                    $result = $this->db->query("select * from enjaz_table where id in ($in_arr)  order by id desc");
              

                $data['print_data'] = $result->result();
            }

            $this->load->view('view_enjaz_status_print/view_enjaz_status_print', $data);
        else:

            redirect('home');
        endif;
    }
  
  
  
  

    public function getTableData() {

        $table = 'enjaz_table';
        $primaryKey = 'id';
        $columns = array(
        array('db' => 'id', 'dt' => 0, 'field' => 'id', 'formatter' => function ($rowvalue, $row) {
                    return '<input type="checkbox" id="' . $rowvalue . '" name="' . $rowvalue . '" value="' . $rowvalue . '">';
                }),
            array('db' => 'passport_name', 'dt' => 1, 'field' => 'passport_name'),
            array('db' => 'passport_number', 'dt' => 2, 'field' => 'passport_number'),
            array('db' => 'en_note', 'dt' => 3, 'field' => 'en_note'),
            array('db' => 'smsbox', 'dt' => 4, 'field' => 'smsbox'),
            array('db' => 'status', 'dt' => 5, 'field' => 'status', 'formatter' => function ($rowvalue, $row) {
            if($rowvalue==2){
                $status="Pending";
            }else if($rowvalue==1){
                 $status="Approved";
            }else if($rowvalue==3){
                 $status="Rejected";
            }else{
                $status="";
            }
                    return $status;
                    }),
					array('db' => 'date_time', 'dt' => 6, 'field' => 'date_time'),
            array('db' => 'id', 'dt' => 7, 'field' => 'id', 'formatter' => function ($rowvalue, $row) {
               
                 if($row[5]==2){
                $status="Not Done";
            }else{
                $status="Done";
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
