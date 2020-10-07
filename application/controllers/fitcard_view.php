<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Fitcard_view extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('common_model');
    }

    public function index() {

        if (in_array($this->session->userdata('role_id'), array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17))):
            $data['base_url'] = $this->config->item('base_url');
           $data['active_menu'] = 'Passport Receive';
            $data['active_sub_menu'] = 'Fitcard View';

            $this->load->view('common/header_ssp',$data);
            $this->load->view('fitcard_view/fitcard_view',$data);
            $this->load->view('common/footer',$data);
            $this->load->view('common/js_ssp',$data);
            $this->load->view('fitcard_view/js_fitcard_view',$data);
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
            $edit_description = mysql_real_escape_string($this->input->post('edit_description'));
           
            $data = array(
                     'name' => $edit_name,
                    'passport_no' => $edit_passport_no,
                    'basic_id_number' => $edit_id_number,
					'basic_visa_number' => $edit_visa_number,
                    'basic_fingering' => $edit_fingering_type,
                    'reference_name' => $edit_reference_name,
					'broker_name' => $edit_broker_name,
					'okala_sponsor_name' => $edit_sponsor_name,
					 'basic_note' => $edit_description

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
			   array('db' => 'basic_id_number', 'dt' => 2,'field' =>'basic_id_number'),
                array('db' => 'fit_receive_medical_name', 'dt' => 3,'field' =>'fit_receive_medical_name'),
                array('db' => 'fit_receive_file_upload', 'dt' => 4,'field' =>'fit_receive_file_upload'),
				array('db' => 'fit_receive_submitted_date', 'dt' => 5,'field' =>'fit_receive_submitted_date'),
				array('db' => 'fit_receive_receive_date', 'dt' => 6,'field' =>'fit_receive_receive_date'),
               array('db' => 'fit_receive_expire_date', 'dt' => 7,'field' =>'fit_receive_expire_date'),
				array('db' => 'fit_receive_note', 'dt' => 8,'field' =>'fit_receive_note'),
               array('db' => 'fit_receive_entry_date', 'dt' => 9,'field' =>'fit_receive_entry_date'),	
               array('db' => 'id', 'dt' => 10,'field' =>'id','formatter' => function ($rowvalue, $row) {			   
			   $val1 = date_diff(date_create(date('Y-m-d')),date_create($row[7]))->format("%a");
			   if($val1>11)
			   {
			   $val2 = "<p style='color:green;'>$val1</p>";
			   }
			   else{
			   $val2 = "<p style='color:red;'>$val1</p>";
			   }
           return ''.$val2.'';
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
