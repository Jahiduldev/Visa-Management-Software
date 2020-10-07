<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class View_customer_out_today extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('common_model');
    }

    public function index() {

        if (in_array($this->session->userdata('role_id'), array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17))):
            $data['base_url'] = $this->config->item('base_url');
            $data['active_menu'] = 'Passport Receive';
            $data['active_sub_menu'] = 'View All';
			
			 $table_name = 'reference_table';
            $data['get_reference_data'] = $this->common_model->getData($table_name);

            $this->load->view('common/header_ssp', $data);
            $this->load->view('view_customer_ssp_out_today/view_customer', $data);
            $this->load->view('common/footer', $data);
            $this->load->view('common/js_ssp', $data);
            $this->load->view('view_customer_ssp_out_today/js_view_customer', $data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');
        else:
            redirect('home');
        endif;
    }
    
     public function basicToday() {

        if (in_array($this->session->userdata('role_id'), array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17))):
            $data['base_url'] = $this->config->item('base_url');
            $data['active_menu'] = 'Passport Receive';
            $data['active_sub_menu'] = 'View All';
			
			 $table_name = 'reference_table';
            $data['get_reference_data'] = $this->common_model->getData($table_name);

            $this->load->view('common/header_ssp', $data);
            $this->load->view('view_customer_ssp_out_today/view_customer', $data);
            $this->load->view('common/footer', $data);
            $this->load->view('common/js_ssp', $data);
            $this->load->view('view_customer_ssp_out_today/js_view_customer', $data);
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
            $edit_id_number = mysql_real_escape_string($this->input->post('edit_id_number'));
            $edit_visa_number = mysql_real_escape_string($this->input->post('edit_visa_number'));
            $edit_fingering_type = mysql_real_escape_string($this->input->post('edit_fingering_type'));
            $edit_reference_name = mysql_real_escape_string($this->input->post('edit_reference_name'));
            $edit_broker_name = mysql_real_escape_string($this->input->post('edit_broker_name'));
            $edit_sponsor_name = mysql_real_escape_string($this->input->post('edit_sponsor_name'));
            $edit_passport_type = mysql_real_escape_string($this->input->post('edit_passport_type'));
            $edit_passport_side = mysql_real_escape_string($this->input->post('edit_passport_side'));
            $edit_description = mysql_real_escape_string($this->input->post('edit_description'));

            $edit_medical_name = mysql_real_escape_string($this->input->post('edit_medical_name'));
            $edit_file = mysql_real_escape_string($this->input->post('edit_file'));
            $edit_submitted_date = mysql_real_escape_string($this->input->post('edit_submitted_date'));
            $edit_receive_date = mysql_real_escape_string($this->input->post('edit_receive_date'));
            $edit_expire_date = mysql_real_escape_string($this->input->post('edit_expire_date'));
            $edit_entry_date = mysql_real_escape_string($this->input->post('edit_entry_date'));
            $edit_fitcard_note = mysql_real_escape_string($this->input->post('edit_fitcard_note'));

            $edit_mufa_number = mysql_real_escape_string($this->input->post('edit_mufa_number'));
            $edit_remufa_number = mysql_real_escape_string($this->input->post('edit_remufa_number'));
            $edit_mufa_fee = mysql_real_escape_string($this->input->post('edit_mufa_fee'));
            $edit_enjaz_visa_fee = mysql_real_escape_string($this->input->post('edit_enjaz_visa_fee'));
            $edit_enjaz_health_fee = mysql_real_escape_string($this->input->post('edit_enjaz_health_fee'));
            $edit_enjaz_file = mysql_real_escape_string($this->input->post('edit_enjaz_file'));
            $edit_enjaz_date = mysql_real_escape_string($this->input->post('edit_enjaz_date'));
            $edit_enjaz_note = mysql_real_escape_string($this->input->post('edit_enjaz_note'));
            $edit_enjaz_entry_date = mysql_real_escape_string($this->input->post('edit_enjaz_entry_date'));

            $edit_embasy_status = mysql_real_escape_string($this->input->post('edit_embasy_status'));
            $edit_embasy_file = mysql_real_escape_string($this->input->post('edit_embasy_file'));
            $edit_embasy_date = mysql_real_escape_string($this->input->post('edit_embasy_date'));
            $edit_embasy_note = mysql_real_escape_string($this->input->post('edit_embasy_note'));
            $edit_embasy_entry_date = mysql_real_escape_string($this->input->post('edit_embasy_entry_date'));

            $edit_price = mysql_real_escape_string($this->input->post('edit_price'));
            $edit_ticket_number = mysql_real_escape_string($this->input->post('edit_ticket_number'));
            $edit_ticket_location = mysql_real_escape_string($this->input->post('edit_ticket_location'));
            $edit_flying_date = mysql_real_escape_string($this->input->post('edit_flying_date'));
            $edit_flying_time = mysql_real_escape_string($this->input->post('edit_flying_time'));
            $edit_ticket_purchase_date = mysql_real_escape_string($this->input->post('edit_ticket_purchase_date'));
            $edit_ticket_note = mysql_real_escape_string($this->input->post('edit_ticket_note'));
            $edit_ticket_entry_date = mysql_real_escape_string($this->input->post('edit_ticket_entry_date'));

            $data = array(
                    'name' => $edit_name,
                    'passport_no' => $edit_passport_no,
                    'basic_id_number' => $edit_id_number,
                    'basic_visa_number' => $edit_visa_number,
                    'basic_fingering' => $edit_fingering_type,
                    'reference_name' => $edit_reference_name,
                    'broker_name' => $edit_broker_name,
                    'okala_sponsor_name' => $edit_sponsor_name,
                    'basic_passport_type' => $edit_passport_type,
                    'basic_receive_site' => $edit_passport_side,
                    'basic_note' => $edit_description,
                    'fit_receive_medical_name' => $edit_medical_name,
                    'fit_receive_file_upload' => $edit_file,
                    'fit_receive_submitted_date' => $edit_submitted_date,
                    'fit_receive_receive_date' => $edit_receive_date,
                    'fit_receive_expire_date' => $edit_expire_date,
                    'fit_receive_entry_date' => $edit_entry_date,
                    'fit_receive_note' => $edit_fitcard_note,
                    'enzaz_mufa_number' => $edit_mufa_number,
                    'enzaz_re_mufa_number' => $edit_remufa_number,
                    'enzaz_mufa_fee' => $edit_mufa_fee,
                    'enzaz_visa_fee' => $edit_enjaz_visa_fee,
                    'enzaz_health_fee' => $edit_enjaz_health_fee,
                    'enzaz_file_upload' => $edit_enjaz_file,
                    'enzaz_date' => $edit_enjaz_date,
                    'enzaz_note' => $edit_enjaz_note,
                    'enzaz_entry_date' => $edit_enjaz_entry_date,
                    'embassy_visa_stamping_status' => $edit_embasy_status,
                    'embassy_file_upload' => $edit_embasy_file,
                    'embassy_date' => $edit_embasy_date,
                    'embassy_note' => $edit_embasy_note,
                    'embassy_entry_date' => $edit_embasy_entry_date,
                    'ticket_price_in_taka_and_dollar' => $edit_price,
                    'ticket_number' => $edit_ticket_number,
                    'ticket_location' => $edit_ticket_location,
                    'ticket_flying_date' => $edit_flying_date,
                    'ticket_flying_time' => $edit_flying_time,
                    'ticket_ticket_purchase_date' => $edit_ticket_purchase_date,
                    'ticket_note' => $edit_ticket_note,
                    'ticket_entry_date' => $edit_ticket_entry_date
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
            redirect('view_customer');
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
                array('db' => 'id', 'dt' => 0, 'field' => 'id', 'formatter' => function ($rowvalue, $row) {
                            return '<input type="checkbox" id="' . $rowvalue . '" name="' . $rowvalue . '" value="' . $rowvalue . '">';
                        }) ,
                array('db' => 'name', 'dt' => 1, 'field' => 'name'),
                array('db' => 'passport_no', 'dt' => 2, 'field' => 'passport_no'),
                array('db' => 'basic_id_number', 'dt' => 3, 'field' => 'basic_id_number'),
                array('db' => 'basic_visa_number', 'dt' => 4, 'field' => 'basic_visa_number'),
                array('db' => 'reference_name', 'dt' => 5, 'field' => 'reference_name'),
                array('db' => 'broker_name', 'dt' => 6, 'field' => 'broker_name'),
                array('db' => 'broker_mobile_number', 'dt' => 7, 'field' => 'broker_mobile_number'),
                array('db' => 'reference_mobile_number', 'dt' => 8, 'field' => 'reference_mobile_number'),
                array('db' => 'okala_sponsor_name', 'dt' => 9, 'field' => 'okala_sponsor_name'),
                array('db' => 'basic_passport_type', 'dt' => 10, 'field' => 'basic_passport_type'),
                array('db' => 'basic_receive_site', 'dt' => 11, 'field' => 'basic_receive_site'),
                array('db' => 'basic_note', 'dt' => 12, 'field' => 'basic_note'),
                array('db' => 'id', 'dt' => 13, 'field' => 'id', 'formatter' => function ($rowvalue, $row) {
                            return '<a  href="#">
      <button class="btn btn-primary btn-xs" type="button" onclick="editModal(' . $rowvalue . ')"><i class="fa fa-pencil"></i></button></a><a  href="#">
   
	  
	  </a>';
                        })



                /*   $columns = array(
                  array('db' => 'client_code', 'dt' => 0,'field' =>'client_code','as' => 'a' ),
                  array('db' => 'client_code', 'dt' => 1,'field' =>'install_date','as' => 'b'),
                  array('db' => 'client_code', 'dt' => 2,'field' =>'client_name','as' => 'c'),
                  array('db' => 'client_code', 'dt' => 3,'field' =>'client_phone','as' => 'd'),
                  array('db' => 'client_code', 'dt' => 4,'field' =>'ref_sale_by','as' => 'e'),
                  array('db' => 'client_code', 'dt' => 5,'field' =>'is_active','as' => 'f'),
                  array('db' => 'client_code', 'dt' => 6,'field' =>'is_active','as' => 'g'),
                  array('db' => 'id', 'dt' => 7,'field' =>'id','formatter' => function ($rowvalue, $row) {
                  return '<a  href="'. site_url("view_credit_management/editCreditManagement/".$rowvalue).'">
                  <button class="btn btn-danger btn-xs"><i class="fa fa-pencil"></i></button></a>';
                  }) */
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
        //$extraCondition = "`id_client`=".$ID_CLIENT_VALUE;

        echo json_encode(
        SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
        );
    }




    public function getTableDataGender() {

        $table = 'passport_makings';
        $primaryKey = 'id';
        $columns = array(
                array('db' => 'id', 'dt' => 0, 'field' => 'id', 'formatter' => function ($rowvalue, $row) {
                            return '<input type="checkbox" id="chk' . $rowvalue . '" name="chk' . $rowvalue . '" value="' . $rowvalue . '">';
                        }) ,
                array('db' => 'name', 'dt' => 1, 'field' => 'name'),
                array('db' => 'passport_no', 'dt' => 2, 'field' => 'passport_no'),
                array('db' => 'basic_id_number', 'dt' => 3, 'field' => 'basic_id_number'),
                array('db' => 'basic_visa_number', 'dt' => 4, 'field' => 'basic_visa_number'),
                array('db' => 'reference_name', 'dt' => 5, 'field' => 'reference_name'),
                array('db' => 'broker_name', 'dt' => 6, 'field' => 'broker_name'),
                array('db' => 'broker_mobile_number', 'dt' => 7, 'field' => 'broker_mobile_number'),
                array('db' => 'reference_mobile_number', 'dt' => 8, 'field' => 'reference_mobile_number'),
                array('db' => 'okala_sponsor_name', 'dt' => 9, 'field' => 'okala_sponsor_name'),
                array('db' => 'basic_passport_type', 'dt' => 10, 'field' => 'basic_passport_type'),
                array('db' => 'basic_receive_site', 'dt' => 11, 'field' => 'basic_receive_site'),
                array('db' => 'basic_note', 'dt' => 12, 'field' => 'basic_note'),
                array('db' => 'id', 'dt' => 13, 'field' => 'id', 'formatter' => function ($rowvalue, $row) {

                            return '<a  href="#">
      <button class="btn btn-primary btn-xs" onclick="editModal(' . $rowvalue . ')"><i class="fa fa-pencil"></i></button></a>';
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
        $joinQuery = "";
        $extraCondition = "basic_passport_type='".$_GET['gid']."'";

        echo json_encode(
        SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns,$joinQuery, $extraCondition)
        );


    }

    public function print_page() {
        if (in_array($this->session->userdata('role_id'), array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17))):
            $data['base_url'] = $this->config->item('base_url');
            $gender_type=  $this->input->post('gender_type');
            $passport_type=  $this->input->post('passport_type');

            $in_arr="";
            foreach ( $_POST as $key => $value ) {
                if($key=='gender_type' || $key=='passport_type' || $key=='editable-sample_length')
                    continue;
                $in_arr .= $value.",";

            }
            
            if($in_arr=="") {
                $data['print_data']=array();
            }else {
                $in_arr=  rtrim($in_arr,',');
                if($gender_type !="" and $passport_type !=""):
                    $result=  $this->db->query("select * from passport_makings where id in ($in_arr) and basic_passport_type='$gender_type' and basic_receive_site='$passport_type' order by id desc");
                elseif($gender_type !=""):
                    $result=  $this->db->query("select * from passport_makings where id in ($in_arr) and basic_passport_type='$gender_type' order by id desc ");
                elseif($passport_type !=""):
                    $result=  $this->db->query("select * from passport_makings where id in ($in_arr) and  basic_receive_site='$passport_type' order by id desc");
                else:
                    $result=  $this->db->query("select * from passport_makings where id in ($in_arr)  order by id desc");
                endif;

                $data['print_data']=$result->result();
            }

            $this->load->view('view_customer_print/view_customer_print',$data);
        else:

            redirect('home');
        endif;

    }
	
	public function print_basic_page() {
        if (in_array($this->session->userdata('role_id'), array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17))):
            $data['base_url'] = $this->config->item('base_url');
            
  $edit_id_print=  $this->input->post('edit_id_print');
          
            
          
                    $result=  $this->db->query("select * from passport_makings where id=' $edit_id_print'");
             

                $data['print_data']=$result->result();
            

            $this->load->view('view_basic_print/view_basic_print',$data);
        else:

            redirect('home');
        endif;

    }




    public function getTableDataPassport() {

        $table = 'passport_makings';
        $primaryKey = 'id';
        $columns = array(
                array('db' => 'id', 'dt' => 0, 'field' => 'id', 'formatter' => function ($rowvalue, $row) {
                            return '  <div class="form-group"><input type="checkbox" id="' . $rowvalue . '" name="' . $rowvalue . '" value="' . $rowvalue . '"></div>';
                        }) ,
                array('db' => 'name', 'dt' => 1, 'field' => 'name'),
                array('db' => 'passport_no', 'dt' => 2, 'field' => 'passport_no'),
                array('db' => 'basic_id_number', 'dt' => 3, 'field' => 'basic_id_number'),
                array('db' => 'basic_visa_number', 'dt' => 4, 'field' => 'basic_visa_number'),
                array('db' => 'reference_name', 'dt' => 5, 'field' => 'reference_name'),
                array('db' => 'broker_name', 'dt' => 6, 'field' => 'broker_name'),
                array('db' => 'broker_mobile_number', 'dt' => 7, 'field' => 'broker_mobile_number'),
                array('db' => 'reference_mobile_number', 'dt' => 8, 'field' => 'reference_mobile_number'),
                array('db' => 'okala_sponsor_name', 'dt' => 9, 'field' => 'okala_sponsor_name'),
                array('db' => 'basic_passport_type', 'dt' => 10, 'field' => 'basic_passport_type'),
                array('db' => 'basic_receive_site', 'dt' => 11, 'field' => 'basic_receive_site'),
                array('db' => 'basic_note', 'dt' => 12, 'field' => 'basic_note'),
                array('db' => 'id', 'dt' => 13, 'field' => 'id', 'formatter' => function ($rowvalue, $row) {

                            return '<a  href="#">
      <button class="btn btn-primary btn-xs" onclick="editModal(' . $rowvalue . ')"><i class="fa fa-pencil"></i></button></a>';
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
        $joinQuery = "";
        $extraCondition = "basic_receive_site='".$_GET['gid']."'";

        echo json_encode(
        SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns,$joinQuery, $extraCondition)
        );


    }






public function getTableDataToday() {

        $table = 'passport_makings';
        $primaryKey = 'id';
        $columns = array(
                array('db' => 'id', 'dt' => 0, 'field' => 'id', 'formatter' => function ($rowvalue, $row) {
                            return '<input type="checkbox" id="chk' . $rowvalue . '" name="chk' . $rowvalue . '" value="' . $rowvalue . '">';
                        }) ,
                array('db' => 'name', 'dt' => 1, 'field' => 'name'),
                array('db' => 'passport_no', 'dt' => 2, 'field' => 'passport_no'),
                array('db' => 'basic_id_number', 'dt' => 3, 'field' => 'basic_id_number'),
                array('db' => 'basic_visa_number', 'dt' => 4, 'field' => 'basic_visa_number'),
                array('db' => 'reference_name', 'dt' => 5, 'field' => 'reference_name'),
                array('db' => 'broker_name', 'dt' => 6, 'field' => 'broker_name'),
                array('db' => 'broker_mobile_number', 'dt' => 7, 'field' => 'broker_mobile_number'),
                array('db' => 'reference_mobile_number', 'dt' => 8, 'field' => 'reference_mobile_number'),
                array('db' => 'okala_sponsor_name', 'dt' => 9, 'field' => 'okala_sponsor_name'),
                array('db' => 'basic_passport_type', 'dt' => 10, 'field' => 'basic_passport_type'),
                array('db' => 'basic_receive_site', 'dt' => 11, 'field' => 'basic_receive_site'),
                array('db' => 'basic_note', 'dt' => 12, 'field' => 'basic_note'),
                array('db' => 'id', 'dt' => 13, 'field' => 'id', 'formatter' => function ($rowvalue, $row) {

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
        $joinQuery = "";
         $date = date('Y-m-d');
        $extraCondition = "`basic_receive_site` = 'Outside' and `basic_entry_date` Like '$date%'";

        echo json_encode(
        SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns,$joinQuery, $extraCondition)
        );


    }
}
?>
