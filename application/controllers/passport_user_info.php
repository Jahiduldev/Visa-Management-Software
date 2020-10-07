<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class passport_user_info extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('common_model');
    }

    public function index() {

        if (in_array($this->session->userdata('role_id'), array(1, 2, 3,4,5,6,7,8,9,10))):
            $data['base_url'] = $this->config->item('base_url');
           $data['active_menu'] = 'Report';
            $data['active_sub_menu'] = 'Details Report';

            $this->load->view('common/header_ssp',$data);
            $this->load->view('details_report_ssp/details_report',$data);
            $this->load->view('common/footer',$data);
            $this->load->view('common/js_ssp',$data);
            $this->load->view('details_report_ssp/js_details_report',$data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');
        else:
            redirect('home');
        endif;
    }



   public function byPassport() {

       
            $data['base_url'] = $this->config->item('base_url');
           $data['active_menu'] = 'Report';
            $data['active_sub_menu'] = 'Details Report';

			
            $data['passport_number'] = mysql_real_escape_string($this->input->post('passport_number'));
            $this->load->view('common/header_ssp',$data);
            $this->load->view('passport_report_ssp/passport_report',$data);
            $this->load->view('common/footer',$data);
            $this->load->view('common/js_ssp',$data);
            $this->load->view('passport_report_ssp/js_passport_report',$data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');
       
    }
    
    public function bySms($id) {

       
            $data['base_url'] = $this->config->item('base_url');
            $data['active_menu'] = 'Report';
            $data['active_sub_menu'] = 'Details Report';

			
            $data['id'] =$id ;
            
            $this->load->view('common/header_ssp',$data);
            $this->load->view('passport_movement_status_ssp_sms/passport_movement_status_ssp',$data);
            $this->load->view('common/footer',$data);
            $this->load->view('common/js_ssp',$data);
            $this->load->view('passport_movement_status_ssp_sms/js_passport_movement_status_ssp',$data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');
       
    }
    
    
     public function bySmsEnjaz($id) {

       
            $data['base_url'] = $this->config->item('base_url');
            $data['active_menu'] = 'Report';
            $data['active_sub_menu'] = 'Details Report';

			
            $data['id'] =$id ;
            
            $this->load->view('common/header_ssp',$data);
            $this->load->view('enjaz_status_ssp_sms/enjaz_status_ssp',$data);
            $this->load->view('common/footer',$data);
            $this->load->view('common/js_ssp',$data);
            $this->load->view('enjaz_status_ssp_sms/js_enjaz_status_ssp',$data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');
       
    }
    


    public function editModel() {


        if (in_array($this->session->userdata('role_id'), array(1, 2, 3,4,5,6,7,8,9,10))):
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
					 'broker_mobile_number' => $edit_broker_mobile_number,
					 'reference_mobile_number' => $edit_reference_mobile_number,
					 'okala_sponsor_name' => $edit_sponsor_name,
					 'basic_passport_type' => $edit_passport_type,
					 'basic_note' => $edit_description,
					 
					 'enzaz_mufa_number' => $edit_mufa_number,
					 'enzaz_date' => $edit_enjaz_date,
					 'enzaz_note' => $edit_enjaz_note,
					 
					 'okala_sponsor_name' => $edit_okala_sponsor_name,
					 'okala_office' => $edit_okala_office,
					 'okala_status' => $edit_okala_status,
					 'okala_note' => $edit_okala_note,
					 
					 
                     
					
                     'fit_receive_receive_date' => $edit_receive_date,
                     'fit_receive_expire_date' => $edit_expire_date,
					 'fit_receive_note' => $edit_fitcard_note,
					 
					 
					 
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

        if (in_array($this->session->userdata('role_id'), array(1, 2, 3,4,5,6,7,8,9,10))):
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
				array('db' => 'enzaz_mufa_number', 'dt' => 2,'field' =>'enzaz_mufa_number','formatter' => function ($rowvalue, $row) {			   
					$val1 = $row[2];
				   if($val1=="" || $val1==NULL)
				   {
				   $val2 = "<p style='color:red;'>Incomplete</p>";
				   }
					else{
				   $val2 = "<p style='color:green;'>Complete</p>";
				   }
					return ''.$val2.'';
					}) ,
				
				array('db' => 'okala_status', 'dt' => 3,'field' =>'okala_status','formatter' => function ($rowvalue, $row) {			   
					$val3 = $row[3];
				   if($val3=="Receive")
				   {
				   $val4 = "<p style='color:green;'>Complete</p>";
				   }
					else{
				   $val4 = "<p style='color:red;'>Incomplete</p>";
				   }
					return ''.$val4.'';
					}) ,
                               
                   array('db' => 'fit_receive_receive_date', 'dt' => 4,'field' =>'fit_receive_receive_date','formatter' => function ($rowvalue, $row) {			   
					$val5 = $row[4];
				   if($val5=="" || $val5==NULL)
				   {
				   $val6 = "<p style='color:red;'>Incomplete</p>";
				   }
					else{
				   $val6 = "<p style='color:green;'>Complete</p>";
				   }
					return ''.$val6.'';
					}) ,
					
					array('db' => 'embassy_file_upload', 'dt' => 5,'field' =>'embassy_file_upload','formatter' => function ($rowvalue, $row) {			   
					$val7 = $row[5];
				   if($val7=="" || $val7==NULL)
				   {
				   $val8 = "<p style='color:red;'>Incomplete</p>";
				   }
					else{
				   $val8 = "<p style='color:green;'>Complete</p>";
				   }
					return ''.$val8.'';
					}) ,
					
					array('db' => 'basic_fingering', 'dt' => 6,'field' =>'basic_fingering','formatter' => function ($rowvalue, $row) {			   
					$val9 = $row[6];
				   if($val9=="Receive")
				   {
				   $val10 = "<p style='color:green;'>Complete</p>";
				  
				   }
					else{
				  $val10 = "<p style='color:red;'>Incomplete</p>";
				   }
					return ''.$val10.'';
					}) ,
				
				 array('db' => 'basic_passport_type', 'dt' => 7, 'field' => 'basic_passport_type'),
             array('db' => 'basic_receive_site', 'dt' => 8, 'field' => 'basic_receive_site'),
				
				
	
				array('db' => 'id', 'dt' => 9,'field' =>'id','formatter' => function ($rowvalue, $row) {
                            return '<a  href="#">
      <button class="btn btn-primary btn-xs" onclick="editModal('.$rowvalue.')"><i class="fa fa-pencil"></i></button></a><a  href="#">
      
	  
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
        //$extraCondition = "`id_client`=".$ID_CLIENT_VALUE;
//echo json_encode(SSP::pluck($columns, 'db'));

        echo json_encode(
        SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
        );
    }
	
	
	
	
	
	 public function getTableDataGender() {

        $table = 'passport_makings';
        $primaryKey = 'id';
        $columns = array(
		
		
                array('db' => 'name', 'dt' => 0,'field' =>'name' ),
                array('db' => 'passport_no', 'dt' => 1,'field' =>'passport_no'),
				array('db' => 'enzaz_mufa_number', 'dt' => 2,'field' =>'enzaz_mufa_number','formatter' => function ($rowvalue, $row) {			   
					$val1 = $row[2];
				   if($val1=="" || $val1==NULL)
				   {
				   $val2 = "<p style='color:red;'>Incomplete</p>";
				   }
					else{
				   $val2 = "<p style='color:green;'>Complete</p>";
				   }
					return ''.$val2.'';
					}) ,
				
				array('db' => 'okala_status', 'dt' => 3,'field' =>'okala_status','formatter' => function ($rowvalue, $row) {			   
					$val3 = $row[3];
				   if($val3=="Receive")
				   {
				   $val4 = "<p style='color:green;'>Complete</p>";
				   }
					else{
				   $val4 = "<p style='color:red;'>Incomplete</p>";
				   }
					return ''.$val4.'';
					}) ,
                               
                   array('db' => 'fit_receive_receive_date', 'dt' => 4,'field' =>'fit_receive_receive_date','formatter' => function ($rowvalue, $row) {			   
					$val5 = $row[4];
				   if($val5=="" || $val5==NULL)
				   {
				   $val6 = "<p style='color:red;'>Incomplete</p>";
				   }
					else{
				   $val6 = "<p style='color:green;'>Complete</p>";
				   }
					return ''.$val6.'';
					}) ,
					
					array('db' => 'embassy_file_upload', 'dt' => 5,'field' =>'embassy_file_upload','formatter' => function ($rowvalue, $row) {			   
					$val7 = $row[5];
				   if($val7=="" || $val7==NULL)
				   {
				   $val8 = "<p style='color:red;'>Incomplete</p>";
				   }
					else{
				   $val8 = "<p style='color:green;'>Complete</p>";
				   }
					return ''.$val8.'';
					}) ,
					
					array('db' => 'basic_fingering', 'dt' => 6,'field' =>'basic_fingering','formatter' => function ($rowvalue, $row) {			   
					$val9 = $row[6];
				   if($val9=="Receive")
				   {
				   $val10 = "<p style='color:green;'>Complete</p>";
				  
				   }
					else{
				  $val10 = "<p style='color:red;'>Incomplete</p>";
				   }
					return ''.$val10.'';
					}) ,
				
				 array('db' => 'basic_passport_type', 'dt' => 7, 'field' => 'basic_passport_type'),
             array('db' => 'basic_receive_site', 'dt' => 8, 'field' => 'basic_receive_site'),
				
				
	
				array('db' => 'id', 'dt' => 9,'field' =>'id','formatter' => function ($rowvalue, $row) {
                            return '<a  href="#">
      <button class="btn btn-primary btn-xs" onclick="editModal('.$rowvalue.')"><i class="fa fa-pencil"></i></button></a><a  href="#">
      
	  
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
        $extraCondition = "basic_passport_type='".$_GET['gid']."'";

        echo json_encode(
        SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns,$joinQuery,$extraCondition)
        );
    }
	
	
	
	
	
	 public function getTableDataPassport() {

        $table = 'passport_makings';
        $primaryKey = 'id';
        $columns = array(
		
		
                array('db' => 'name', 'dt' => 0,'field' =>'name' ),
                array('db' => 'passport_no', 'dt' => 1,'field' =>'passport_no'),
				array('db' => 'enzaz_mufa_number', 'dt' => 2,'field' =>'enzaz_mufa_number','formatter' => function ($rowvalue, $row) {			   
					$val1 = $row[2];
				   if($val1=="" || $val1==NULL)
				   {
				   $val2 = "<p style='color:red;'>Incomplete</p>";
				   }
					else{
				   $val2 = "<p style='color:green;'>Complete</p>";
				   }
					return ''.$val2.'';
					}) ,
				
				array('db' => 'okala_status', 'dt' => 3,'field' =>'okala_status','formatter' => function ($rowvalue, $row) {			   
					$val3 = $row[3];
				   if($val3=="Receive")
				   {
				   $val4 = "<p style='color:green;'>Complete</p>";
				   }
					else{
				   $val4 = "<p style='color:red;'>Incomplete</p>";
				   }
					return ''.$val4.'';
					}) ,
                               
                   array('db' => 'fit_receive_receive_date', 'dt' => 4,'field' =>'fit_receive_receive_date','formatter' => function ($rowvalue, $row) {			   
					$val5 = $row[4];
				   if($val5=="" || $val5==NULL)
				   {
				   $val6 = "<p style='color:red;'>Incomplete</p>";
				   }
					else{
				   $val6 = "<p style='color:green;'>Complete</p>";
				   }
					return ''.$val6.'';
					}) ,
					
					array('db' => 'embassy_file_upload', 'dt' => 5,'field' =>'embassy_file_upload','formatter' => function ($rowvalue, $row) {			   
					$val7 = $row[5];
				   if($val7=="" || $val7==NULL)
				   {
				   $val8 = "<p style='color:red;'>Incomplete</p>";
				   }
					else{
				   $val8 = "<p style='color:green;'>Complete</p>";
				   }
					return ''.$val8.'';
					}) ,
					
					array('db' => 'basic_fingering', 'dt' => 6,'field' =>'basic_fingering','formatter' => function ($rowvalue, $row) {			   
					$val9 = $row[6];
				   if($val9=="Receive")
				   {
				   $val10 = "<p style='color:green;'>Complete</p>";
				  
				   }
					else{
				  $val10 = "<p style='color:red;'>Incomplete</p>";
				   }
					return ''.$val10.'';
					}) ,
				
				 array('db' => 'basic_passport_type', 'dt' => 7, 'field' => 'basic_passport_type'),
             array('db' => 'basic_receive_site', 'dt' => 8, 'field' => 'basic_receive_site'),
				
				
	
				array('db' => 'id', 'dt' => 9,'field' =>'id','formatter' => function ($rowvalue, $row) {
                            return '<a  href="#">
      <button class="btn btn-primary btn-xs" onclick="editModal('.$rowvalue.')"><i class="fa fa-pencil"></i></button></a><a  href="#">
      
	  
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
        $extraCondition = "basic_receive_site='".$_GET['gid']."'";

        echo json_encode(
        SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns,$joinQuery,$extraCondition)
        );
    }
	
	

 public function getTableDataByPassport() {

        $table = 'passport_makings';
        $primaryKey = 'id';
        $columns = array(
		
		
                array('db' => 'name', 'dt' => 0,'field' =>'name' ),
                array('db' => 'passport_no', 'dt' => 1,'field' =>'passport_no'),
				array('db' => 'mobile_number', 'dt' => 2,'field' =>'mobile_number'),
				array('db' => 'fingering_send_date', 'dt' => 3,'field' =>'fingering_send_date'),
			
			
			
			
     
				
				
	
				array('db' => 'id', 'dt' => 4,'field' =>'id','formatter' => function ($rowvalue, $row) {
                            return '<a  href="#">
      <button class="btn btn-primary btn-xs" onclick="editModal('.$rowvalue.')"><i class="fa fa-pencil"></i></button></a><a  href="#">
      
	  
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
        $extraCondition = "passport_no='".$_GET['gid']."'";

        echo json_encode(
        SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns,$joinQuery,$extraCondition)
        );
    }

	
	
	
	 public function getTableDataSms() {

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
         $extraCondition = "`id` =".$_GET['id'];

        echo json_encode(
                SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns,"",$extraCondition)
        );
    }
	
	
	
	public function getTableDataSmsEnjaz() {

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
     
         $extraCondition = "`id` =".$_GET['id'];

        echo json_encode(
                SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns,'',$extraCondition)
        );
    }
	
	
}
?>
