<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Passport_movement_notification extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('common_model');
    }

    public function index() {
        $per_role_arr=array();
        $url = $this->uri->segment(1);
        $table_name='subs_menu';
        $column_name='url';
        $column_value=$url;
        $get_url_data= $this->common_model->getDataWhere($table_name,$column_name,$column_value);
        foreach($get_url_data as $row):
            $sub_menu_id=$row->sub_menu_id;
            $get_role_data= $this->common_model->getDataWhere('permission','sub_menu_id',$sub_menu_id);
            foreach( $get_role_data as $row2):
                $role_id=$row2->role_id;
                array_push($per_role_arr,$role_id);
            endforeach;
        endforeach;


        if (in_array($this->session->userdata('role_id'), $per_role_arr)):
            $data['base_url'] = $this->config->item('base_url');
            $data['active_menu'] = 'Request Panel';
            $data['active_sub_menu'] = 'Passport Mov. Notification';

            $this->load->view('common/header_ssp', $data);
            $this->load->view('passport_movement_notification_ssp/passport_movement_notification_ssp', $data);
            $this->load->view('common/footer', $data);
            $this->load->view('common/js_ssp', $data);
            $this->load->view('passport_movement_notification_ssp/js_passport_movement_notification_ssp', $data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');
        else:
            redirect('home');
        endif;
    }

    public function editModel() {
        $per_role_arr=array();
        $url = $this->uri->segment(1);
        $table_name='subs_menu';
        $column_name='url';
        $column_value=$url;
        $get_url_data= $this->common_model->getDataWhere($table_name,$column_name,$column_value);
        foreach($get_url_data as $row):
            $sub_menu_id=$row->sub_menu_id;
            $get_role_data= $this->common_model->getDataWhere('permission','sub_menu_id',$sub_menu_id);
            foreach( $get_role_data as $row2):
                $role_id=$row2->role_id;
                array_push($per_role_arr,$role_id);
            endforeach;
        endforeach;

        if (in_array($this->session->userdata('role_id'), $per_role_arr)):
            $data['base_url'] = $this->config->item('base_url');

            $edit_id = mysql_real_escape_string($this->input->post('edit_id'));
            $edit_name = mysql_real_escape_string($this->input->post('edit_name'));
            $edit_passport_no = mysql_real_escape_string($this->input->post('edit_passport_no'));
            $edit_passport_side = mysql_real_escape_string($this->input->post('edit_passport_side'));
            $change_passport_side = mysql_real_escape_string($this->input->post('change_passport_side'));







            $data = array(
                    'passport_name' => $edit_name,
                    'passport_number' => $edit_passport_no,
                    'passport_side' => $edit_passport_side,
                    'request_passport_side' => $change_passport_side,
                    'status' => 2,
            );

            $table_name = 'passport_side_status';
            $insert_result = $this->common_model->insertData($table_name, $data);


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

    public function passwordApproved() {
        $per_role_arr=array();
        $url = $this->uri->segment(1);
        $table_name='subs_menu';
        $column_name='url';
        $column_value=$url;
        $get_url_data= $this->common_model->getDataWhere($table_name,$column_name,$column_value);
        foreach($get_url_data as $row):
            $sub_menu_id=$row->sub_menu_id;
            $get_role_data= $this->common_model->getDataWhere('permission','sub_menu_id',$sub_menu_id);
            foreach( $get_role_data as $row2):
                $role_id=$row2->role_id;
                array_push($per_role_arr,$role_id);
            endforeach;
        endforeach;

        if (in_array($this->session->userdata('role_id'), $per_role_arr)):
            $data['base_url'] = $this->config->item('base_url');

            $edit_id = mysql_real_escape_string($this->input->post('edit_id'));
            $edit_password = mysql_real_escape_string($this->input->post('edit_password'));

            $table_name = 'user';
            $result = $this->common_model->getDataWhere2($table_name, 'role_id',10,'password',base64_encode($edit_password));
            if(count($result)==1):

                $table_name = 'passport_side_status';
                $result2 = $this->common_model->getDataWhere($table_name, 'id',$edit_id);
                foreach($result2 as $row2):
                    $passport_number=  $row2->passport_number;
                    $passport_name=  $row2->passport_name;

                endforeach;
               
                
                $sms="Change Passport side Request Passport Name $passport_name and Passport Number $passport_number has been approved by Abu Mohammad. http://alsmani-international.com/alsmani/passport_user_info/bySms/".$edit_id;

                $data = array(
                        'status' => 1,
                        'smsbox' =>$sms
                );

                $table_name = 'passport_side_status';
                $insert_result = $this->common_model->updateData($table_name, $data,'id',$edit_id);



                $url = "http://221.120.98.162/mmslbulksms/ew_remote.php";               
                $data = "user=alsmani&pass=alsmani2233&mobile=8801616160079&text=".urlencode($sms);   //8801727843280
                $all = $url.'?'.$data;
                $reply=file_get_contents($all);

                $data = array(
                        'basic_receive_site' =>'Outside'
                );
                $table_name = 'passport_makings';
                $insert_result = $this->common_model->updateData($table_name, $data,'passport_no',$passport_number);


                if ($insert_result):
                    $this->session->set_userdata('msg_title', 'Success');
                    $this->session->set_userdata('msg_body', 'Successfull');
                else:
                    $this->session->set_userdata('msg_title', 'Error');
                    $this->session->set_userdata('msg_body', 'Failed');
                endif;
                redirect('passport_movement_notification');
            else:
                $this->session->set_userdata('msg_title', 'Error');
                $this->session->set_userdata('msg_body', 'Password not match');
                redirect('passport_movement_notification');
            endif;
        else:

            redirect('home');
        endif;
    }


    public function passwordRejected() {
        $per_role_arr=array();
        $url = $this->uri->segment(1);
        $table_name='subs_menu';
        $column_name='url';
        $column_value=$url;
        $get_url_data= $this->common_model->getDataWhere($table_name,$column_name,$column_value);
        foreach($get_url_data as $row):
            $sub_menu_id=$row->sub_menu_id;
            $get_role_data= $this->common_model->getDataWhere('permission','sub_menu_id',$sub_menu_id);
            foreach( $get_role_data as $row2):
                $role_id=$row2->role_id;
                array_push($per_role_arr,$role_id);
            endforeach;
        endforeach;

        if (in_array($this->session->userdata('role_id'), $per_role_arr)):
            $data['base_url'] = $this->config->item('base_url');

            $edit_id = mysql_real_escape_string($this->input->post('edit_id2'));
            $edit_password = mysql_real_escape_string($this->input->post('edit_password'));

            $table_name = 'user';
            $result = $this->common_model->getDataWhere2($table_name, 'role_id',10,'password',base64_encode($edit_password));
            if(count($result)==1):

                $table_name = 'passport_side_status';
                $result2 = $this->common_model->getDataWhere($table_name, 'id',$edit_id);
                foreach($result2 as $row2):
                    $passport_number=  $row2->passport_number;
                    $passport_name=  $row2->passport_name;

                endforeach;
                $sms="Change Passport side Request Passport Name $passport_name and Passport Number $passport_number has been rejected by Abu Mohammad. http://alsmani-international.com/alsmani/passport_user_info/bySms/".$edit_id;

                $data = array(
                        'status' => 3,
                        'smsbox' =>$sms
                );

                $table_name = 'passport_side_status';
                $insert_result = $this->common_model->updateData($table_name, $data,'id',$edit_id);


                $url = "http://221.120.98.162/mmslbulksms/ew_remote.php";               
                $data = "user=alsmani&pass=alsmani2233&mobile=8801616160079&text=".urlencode($sms);   //8801616160079
                $all = $url.'?'.$data;
                $reply=file_get_contents($all);



                $data = array(
                        'basic_receive_site' =>'Outside'
                );
                $table_name = 'passport_makings';
                $insert_result = $this->common_model->updateData($table_name, $data,'passport_no',$passport_number);




                if ($insert_result):
                    $this->session->set_userdata('msg_title', 'Success');
                    $this->session->set_userdata('msg_body', 'Successfull');
                else:
                    $this->session->set_userdata('msg_title', 'Error');
                    $this->session->set_userdata('msg_body', 'Failed');
                endif;
                redirect('passport_movement_notification');
            else:
                $this->session->set_userdata('msg_title', 'Error');
                $this->session->set_userdata('msg_body', 'Password not match');
                redirect('passport_movement_notification');
            endif;
        else:

            redirect('home');
        endif;
    }



    public function deleteModel() {
        $per_role_arr=array();
        $url = $this->uri->segment(1);
        $table_name='subs_menu';
        $column_name='url';
        $column_value=$url;
        $get_url_data= $this->common_model->getDataWhere($table_name,$column_name,$column_value);
        foreach($get_url_data as $row):
            $sub_menu_id=$row->sub_menu_id;
            $get_role_data= $this->common_model->getDataWhere('permission','sub_menu_id',$sub_menu_id);
            foreach( $get_role_data as $row2):
                $role_id=$row2->role_id;
                array_push($per_role_arr,$role_id);
            endforeach;
        endforeach;


        if (in_array($this->session->userdata('role_id'), $per_role_arr)):
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

        $table_name = 'passport_side_status';
        $result = $this->common_model->getDataWhere($table_name, "id", $id);
        echo json_encode($result);
    }

    public function getTableData() {

        $table = 'passport_side_status';
        $primaryKey = 'id';
        $columns = array(
                array('db' => 'passport_name', 'dt' => 0, 'field' => 'passport_name'),
                array('db' => 'passport_number', 'dt' => 1, 'field' => 'passport_number'),
                array('db' => 'passport_side', 'dt' => 2, 'field' => 'passport_side'),
                array('db' => 'request_passport_side', 'dt' => 3, 'field' => 'request_passport_side'),
                array('db' => 'note', 'dt' => 4, 'field' => 'note'),
                array('db' => 'id', 'dt' => 5, 'field' => 'id', 'formatter' => function ($rowvalue, $row) {
                            return '<a  href="#">
      <button class="btn btn-primary btn-xs" onclick="addModal(' . $rowvalue . ')"><i class="fa fa-pencil">Approved</i></button></a>
         ';
                        }),
                        
                        
                   array('db' => 'id', 'dt' => 6, 'field' => 'id', 'formatter' => function ($rowvalue, $row) {
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
