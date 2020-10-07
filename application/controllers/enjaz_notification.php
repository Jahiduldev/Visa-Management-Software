<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Enjaz_notification extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('common_model');
    }

    public function index() {

        if (in_array($this->session->userdata('role_id'), array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17))):
            $data['base_url'] = $this->config->item('base_url');
            $data['active_menu'] = 'Request Panel';
            $data['active_sub_menu'] = 'Enjaz notification';

            $this->load->view('common/header_ssp', $data);
            $this->load->view('enjaz_notification_ssp/enjaz_notification_ssp', $data);
            $this->load->view('common/footer', $data);
            $this->load->view('common/js_ssp', $data);
            $this->load->view('enjaz_notification_ssp/js_enjaz_notification_ssp', $data);
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
            $edit_en_note = mysql_real_escape_string($this->input->post('edit_en_note '));
            







            $data = array(
                    'passport_name' => $edit_name,
                    'passport_number' => $edit_passport_no,
                    'en_note' => $edit_en_note,
                    
                    'status' => 2,
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
            redirect('enjaz_notification');
        else:

            redirect('home');
        endif;
    }

    public function passwordApproved() {


        if (in_array($this->session->userdata('role_id'), array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17))):
            $data['base_url'] = $this->config->item('base_url');

         $edit_id = mysql_real_escape_string($this->input->post('edit_id'));
         
         
            $edit_password = mysql_real_escape_string($this->input->post('edit_password'));

            $table_name = 'user';
            $result = $this->common_model->getDataWhere2($table_name, 'role_id',10,'password',base64_encode($edit_password));
            if(count($result)==1):
              $table_name = 'enjaz_table';
              
                $result2 = $this->common_model->getDataWhere($table_name, 'id',$edit_id);
                foreach($result2 as $row2):
                    $passport_number=  $row2->passport_number;
                    $passport_name=  $row2->passport_name;

                endforeach;
             $sms="Enjaz Request Passport Name $passport_name and Passport Number $passport_number has been approved by Abu Mohammad. http://alsmani-international.com/alsmani/passport_user_info/bySmsEnjaz/".$edit_id;

                $data = array(
                        'status' => 1,
                        'smsbox' =>$sms
                );

                $table_name = 'enjaz_table';
                $insert_result = $this->common_model->updateData($table_name, $data,'id',$edit_id);
                 
                
                 $url = "http://221.120.98.162/mmslbulksms/ew_remote.php";               
                $data = "user=alsmani&pass=alsmani2233&mobile=8801616160079&text=".urlencode($sms);   //8801616160079
                $all = $url.'?'.$data;
                $reply=file_get_contents($all);


              

                if ($insert_result):
                    $this->session->set_userdata('msg_title', 'Success');
                    $this->session->set_userdata('msg_body', 'Successfull');
                else:
                    $this->session->set_userdata('msg_title', 'Error');
                    $this->session->set_userdata('msg_body', 'Failed');
                endif;
                redirect('enjaz_notification');
            else:
                $this->session->set_userdata('msg_title', 'Error');
                $this->session->set_userdata('msg_body', 'Password not match');
                redirect('enjaz_notification');
            endif;
        else:

            redirect('home');
        endif;
    }


    public function passwordRejected() {


        if (in_array($this->session->userdata('role_id'), array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17))):
            $data['base_url'] = $this->config->item('base_url');

            $edit_id = mysql_real_escape_string($this->input->post('edit_id2'));
            $edit_password = mysql_real_escape_string($this->input->post('edit_password'));

            $table_name = 'user';
            $result = $this->common_model->getDataWhere2($table_name, 'role_id',10,'password',base64_encode($edit_password));
            if(count($result)==1):
                 $table_name = 'enjaz_table';
                $result2 = $this->common_model->getDataWhere($table_name, 'id',$edit_id);
                foreach($result2 as $row2):
                    $passport_number=  $row2->passport_number;
                    $passport_name=  $row2->passport_name;

                endforeach;
                $sms="Enjaz Request Passport Name $passport_name and Passport Number $passport_number has been rejected by Abu Mohammad. http://alsmani-international.com/alsmani/passport_user_info/bySmsEnjaz/".$edit_id;

                $data = array(
                        'status' => 3,
                        'smsbox' =>$sms
                );

                $table_name = 'enjaz_table';
                $insert_result = $this->common_model->updateData($table_name, $data,'id',$edit_id);

                $url = "http://221.120.98.162/mmslbulksms/ew_remote.php";               
                $data = "user=alsmani&pass=alsmani2233&mobile=8801616160079&text=".urlencode($sms);   //8801616160079
                $all = $url.'?'.$data;
                $reply=file_get_contents($all);

               



                if ($insert_result):
                    $this->session->set_userdata('msg_title', 'Success');
                    $this->session->set_userdata('msg_body', 'Successfull');
                else:
                    $this->session->set_userdata('msg_title', 'Error');
                    $this->session->set_userdata('msg_body', 'Failed');
                endif;
                redirect('enjaz_notification');
            else:
                $this->session->set_userdata('msg_title', 'Error');
                $this->session->set_userdata('msg_body', 'Password not match');
                redirect('enjaz_notification');
            endif;
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
            redirect('passport_movement_order');
        else:
            redirect('home');
        endif;
    }

    public function getData() {

        $data['base_url'] = $this->config->item('base_url');
       $id = mysql_real_escape_string($this->input->post('id'));

        $table_name = 'enjaz_table';
        $result = $this->common_model->getDataWhere($table_name, "id", $id);
        echo json_encode($result);
    }

    public function getTableData() {

        $table = 'enjaz_table';
        $primaryKey = 'id';
        $columns = array(
                array('db' => 'passport_name', 'dt' => 0, 'field' => 'passport_name'),
                array('db' => 'passport_number', 'dt' => 1, 'field' => 'passport_number'),
                
                array('db' => 'en_note', 'dt' => 2, 'field' => 'en_note'),
                array('db' => 'id', 'dt' => 3, 'field' => 'id', 'formatter' => function ($rowvalue, $row) {
                            return '<a  href="#">
      <button class="btn btn-primary btn-xs" onclick="addModal(' . $rowvalue . ')"><i class="fa fa-pencil">Approved</i></button></a>
         ';
                        }),
                        
                        
                   array('db' => 'id', 'dt' => 4, 'field' => 'id', 'formatter' => function ($rowvalue, $row) {
                            return '
          <button class="btn btn-primary btn-xs" onclick="rejectModal(' . $rowvalue . ')"><i class="fa fa-pencil">Reject</i></button></a>
	 
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
        $extraCondition = "`status`='2'";
        // $extraCondition = "`enzaz_mufa_number`!=''";

        echo json_encode(
        SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns, '', $extraCondition)
        );
    }

}

?>
