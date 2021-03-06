<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Basic_info extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('common_model');
    }

    public function index() {

        if (in_array($this->session->userdata('role_id'), array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17))):
            $data['base_url'] = $this->config->item('base_url');
           $data['active_menu'] = 'Passport Receive';
            $data['active_sub_menu'] = 'Basic Info';

            $this->load->view('common/header_ssp',$data);
            $this->load->view('basic_info_ssp/basic_info',$data);
            $this->load->view('common/footer',$data);
            $this->load->view('common/js_ssp',$data);
            $this->load->view('basic_info_ssp/js_basic_info',$data);
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
		
            $edit_name= mysql_real_escape_string($this->input->post('edit_name'));
            $edit_passport_no = mysql_real_escape_string($this->input->post('edit_passport_no'));
            $edit_id_number = mysql_real_escape_string($this->input->post('edit_id_number'));
            $edit_visa_number = mysql_real_escape_string($this->input->post('edit_visa_number'));
			$edit_fingering_type = mysql_real_escape_string($this->input->post('edit_fingering_type'));
            $edit_reference_name = mysql_real_escape_string($this->input->post('edit_reference_name'));
            $edit_broker_name = mysql_real_escape_string($this->input->post('edit_broker_name'));
			$edit_sponsor_name = mysql_real_escape_string($this->input->post('edit_sponsor_name'));
			$edit_passport_type = mysql_real_escape_string($this->input->post('edit_passport_type'));
            $edit_description = mysql_real_escape_string($this->input->post('edit_description'));
			
			$edit_medical_name = mysql_real_escape_string($this->input->post('edit_medical_name'));
			$edit_file = mysql_real_escape_string($this->input->post('edit_file'));
			$edit_submitted_date= mysql_real_escape_string($this->input->post('edit_submitted_date'));
			$edit_receive_date = mysql_real_escape_string($this->input->post('edit_receive_date'));
			$edit_expire_date = mysql_real_escape_string($this->input->post('edit_expire_date'));
			$edit_entry_date = mysql_real_escape_string($this->input->post('edit_entry_date'));
			$edit_fitcard_note = mysql_real_escape_string($this->input->post('edit_fitcard_note'));
			
			$edit_mufa_number = mysql_real_escape_string($this->input->post('edit_mufa_number'));
			$edit_remufa_number = mysql_real_escape_string($this->input->post('edit_remufa_number'));
			$edit_mufa_fee= mysql_real_escape_string($this->input->post('edit_mufa_fee'));
			$edit_enjaz_visa_fee = mysql_real_escape_string($this->input->post('edit_enjaz_visa_fee'));
			$edit_enjaz_health_fee = mysql_real_escape_string($this->input->post('edit_enjaz_health_fee'));
			$edit_enjaz_file = mysql_real_escape_string($this->input->post('edit_enjaz_file'));
			$edit_enjaz_date = mysql_real_escape_string($this->input->post('edit_enjaz_date'));
			$edit_enjaz_note = mysql_real_escape_string($this->input->post('edit_enjaz_note'));
			$edit_enjaz_entry_date = mysql_real_escape_string($this->input->post('edit_enjaz_entry_date'));
			
			$edit_embasy_status = mysql_real_escape_string($this->input->post('edit_embasy_status'));
			$edit_embasy_file = mysql_real_escape_string($this->input->post('edit_embasy_file'));
			$edit_embasy_date= mysql_real_escape_string($this->input->post('edit_embasy_date'));
			$edit_embasy_note = mysql_real_escape_string($this->input->post('edit_embasy_note'));
			$edit_embasy_entry_date = mysql_real_escape_string($this->input->post('edit_embasy_entry_date'));
			
			$edit_price = mysql_real_escape_string($this->input->post('edit_price'));
			$edit_ticket_number = mysql_real_escape_string($this->input->post('edit_ticket_number'));
			$edit_ticket_location= mysql_real_escape_string($this->input->post('edit_ticket_location'));
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

            $table_name='passport_makings';
            $insert_result = $this->common_model->updateData($table_name,$data,"id",$edit_id);


            if($insert_result):
                $this->session->set_userdata('msg_title', 'Success');
                $this->session->set_userdata('msg_body','Successfull');
            else:
                $this->session->set_userdata('msg_title', 'Error');
                $this->session->set_userdata('msg_body','Failed' );
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


            $table_name='passport_makings';
            $column_name='id';
            $column_value=$delete_id;
            $insert_result = $this->common_model->deleteData($table_name,$column_name,$column_value);


            if($insert_result):
                $this->session->set_userdata('msg_title', 'Success');
                $this->session->set_userdata('msg_body','Successfull' );
            else:
                $this->session->set_userdata('msg_title', 'Error');
                $this->session->set_userdata('msg_body','Failed' );
            endif;
            redirect('view_customer');
        else:
            redirect('home');
        endif;
    }
    public function getData() {

        $data['base_url'] = $this->config->item('base_url');
        $id = mysql_real_escape_string($this->input->post('id'));

        $table_name='passport_makings';
        $result = $this->common_model->getDataWhere($table_name,"id",$id);
        echo json_encode($result);


    }


   






    public function getTableData() {

         $table = 'passport_makings';
		
        $primaryKey = 'id';
        $columns = array(
                array('db' => 'name', 'dt' => 0,'field' =>'name' ),
                array('db' => 'passport_no', 'dt' => 1,'field' =>'passport_no'),
                
				

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
                        })  */

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
}
?>
