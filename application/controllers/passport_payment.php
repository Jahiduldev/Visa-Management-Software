<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Passport_payment extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('common_model');
    }

    public function index() {

        if (in_array($this->session->userdata('role_id'), array(1,2,3,4,5,6,7,8,9,10,12))):
            $data['base_url'] = $this->config->item('base_url');
            $data['active_menu'] = 'Accounts';
            $data['active_sub_menu'] = 'Passport Payment';

            $this->load->view('common/header_ssp', $data);
            $this->load->view('passport_payment/passport_payment', $data);
            $this->load->view('common/footer', $data);
            $this->load->view('common/js_ssp', $data);
            $this->load->view('passport_payment/js_passport_payment', $data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');
        else:
            redirect('home');
        endif;
    }

    public function addPayment() {


        if (in_array($this->session->userdata('role_id'), array(1, 2, 3,4,5,6,7,8,9,10))):
            $data['base_url'] = $this->config->item('base_url');

            $edit_id = mysql_real_escape_string($this->input->post('edit_id'));
            $edit_passport_no = mysql_real_escape_string($this->input->post('edit_passport_no'));          
            $edit_contact_amount = mysql_real_escape_string($this->input->post('edit_contact_amount'));
            $edit_payment_amount = mysql_real_escape_string($this->input->post('edit_payment_amount'));
          

		  $data = array(
                
                'passport_no' =>$edit_passport_no,              
                'contact_amount' => $edit_contact_amount,
                'payment' => $edit_payment_amount,
				'date_time' => date('Y-m-d H:i:s')
               
            );

            $table_name = 'passport_payment';
            $insert_result = $this->common_model->insertData($table_name, $data);
		  
           $getData= $this->common_model->getDataWhere('passport_payment','passport_no',$edit_passport_no);
        $payment_total=0;
	   if(sizeof($getData)>0):
	   foreach($getData as $row):
	  $payment= $row->payment;
	  $payment_total +=$payment;
	   endforeach;	   
	  endif;
	   
	   
            $data = array(
                
                'contact_amount' => $edit_contact_amount,              
                'total_payment' => $payment_total
              
               
            );

            $table_name = 'passport_makings';
            $update_result = $this->common_model->updateData($table_name, $data, "id", $edit_id);


            if ($insert_result):
                $this->session->set_userdata('msg_title', 'Success');
                $this->session->set_userdata('msg_body', 'Successfull');
            else:
                $this->session->set_userdata('msg_title', 'Error');
                $this->session->set_userdata('msg_body', 'Failed');
            endif;
            redirect('passport_payment');
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
	
	 public function getDetails($passport_no) {
            if (in_array($this->session->userdata('role_id'), array(1,2,3,4,5,6,7,8,9,10))):
            $data['base_url'] = $this->config->item('base_url');
            $data['active_menu'] = 'Accounts';
            $data['active_sub_menu'] = 'Passport Payment';
			
		 $table_name = 'passport_makings';
       $data['passport_amount_data']  = $this->common_model->getDataWhere($table_name, "passport_no", $passport_no);	
			
	   $table_name = 'passport_payment';
       $data['passport_detail_data']  = $this->common_model->getDataWhere($table_name, "passport_no", $passport_no);
		
		
       $this->load->view('common/header', $data);
            $this->load->view('payment_detail/payment_detail', $data);
            $this->load->view('common/footer', $data);
            $this->load->view('common/js', $data);
            $this->load->view('payment_detail/js_payment_detail', $data);
			
			 else:
            redirect('home');
        endif;
    }


    public function getTableData() {

        $table = 'passport_makings';
        $primaryKey = 'id';
        $columns = array(
            array('db' => 'name', 'dt' => 0, 'field' => 'name'),
            array('db' => 'passport_no', 'dt' => 1, 'field' => 'passport_no'),
            array('db' => 'reference_name', 'dt' => 2, 'field' => 'reference_name'),
            array('db' => 'contact_amount', 'dt' => 3, 'field' => 'contact_amount'),
            array('db' => 'total_payment', 'dt' => 4, 'field' => 'total_payment'),
			  array('db' => 'id', 'dt' => 5, 'field' => 'id', 'formatter' => function ($rowvalue, $row) {
                    return $row[3]-$row[4];
                }),
            array('db' => 'id', 'dt' => 6, 'field' => 'id', 'formatter' => function ($rowvalue, $row) {
                    return '<button class="btn btn-info btn-xs" onclick="addModal(' . $rowvalue . ')">Payment</button>&nbsp<a  href="'. site_url("passport_payment/getDetails/".$row[1]).'">
      <button class="btn btn-primary btn-xs" >Detail</button></a>
	  
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
       
        // $extraCondition = "`enzaz_mufa_number`IS NULL";
      

        echo json_encode(
                SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
        );
    }

}

?>
