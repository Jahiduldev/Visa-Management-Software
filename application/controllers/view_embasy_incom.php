<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class View_embasy_incom extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('common_model');
    }

    public function index() {

        if (in_array($this->session->userdata('role_id'), array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17))):
            $data['base_url'] = $this->config->item('base_url');
            $data['active_menu'] = 'Embasy Info';
            $data['active_sub_menu'] = 'Incomplete';

            $this->load->view('common/header_ssp', $data);
            $this->load->view('view_embasy_ssp/view_embasy_ssp', $data);
            $this->load->view('common/footer', $data);
            $this->load->view('common/js_ssp', $data);
            $this->load->view('view_embasy_ssp/js_view_embasy_ssp', $data);
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
            $edit_embasy_file = mysql_real_escape_string($this->input->post('edit_embasy_file'));
            $edit_embasy_status = mysql_real_escape_string($this->input->post('edit_embasy_status'));
            $edit_embasy_date = mysql_real_escape_string($this->input->post('edit_embasy_date'));
            $date_new = date_create($edit_embasy_date);
            date_add($date_new, date_interval_create_from_date_string("89 days"));
            $edit_embasy_expire_date = date_format($date_new, "Y-m-d");

         
            $edit_embasy_office = mysql_real_escape_string($this->input->post('edit_embasy_office'));
            $edit_embasy_note = mysql_real_escape_string($this->input->post('edit_embasy_note'));
            $date_time = date('Y-m-d H:i:s');


            $config['overwrite'] = false;
            $config['upload_path'] = './public/uploads';
            $config['allowed_types'] = '*';   //'gif|jpg|png|mp4|ogg|webm|mov|mpeg|avi';
            $config['max_size'] = '60000';
            $config['max_width'] = '';
            $config['max_height'] = '';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            $data['upload_data'] = '';
            $date_time = date('Y-m-d H:i:s');
            
            if (!$this->upload->do_upload('edit_embasy_file12')) :
                $error = $this->upload->display_errors();
                $data['upload_data'] = $error;
                
               
                $fileName = '';

                $data = array(
                    'embassy_visa_stamping_status' => $edit_embasy_status,
                    'embassy_date' => $edit_embasy_date,
                    'embasy_expire_date' => $edit_embasy_expire_date,
                    'embasy_office' => $edit_embasy_office,
					'embassy_file_upload' => $fileName,
					'embassy_file_upload' => $edit_embasy_file,
                    'embassy_note' => $edit_embasy_note
                );
            else:
                $upload_data = $this->upload->data();
                $data['upload_data'] = $upload_data;
                
                $fileName = $upload_data['file_name'];

                $data = array(
                    'embassy_file_upload' => $edit_embasy_file,
                    'embassy_visa_stamping_status' => $edit_embasy_status,
                    'embassy_date' => $edit_embasy_date,
                    'embasy_expire_date' => $edit_embasy_expire_date,
                    'embasy_office' => $edit_embasy_office,
                    'embassy_note' => $edit_embasy_note
                );
            endif;




            $table_name = 'passport_makings';
            $insert_result = $this->common_model->updateData($table_name, $data, "id", $edit_id);
         

            
            
            if ($insert_result):
                if ($edit_embasy_status == "Complete") {
                    $result = $this->common_model->getDataWhere($table_name, "id", $edit_id);
                    if (count($result) > 0) {
                        foreach ($result as $row) {


                            $passport_no = $row->passport_no;
                            $broker_name_all = $row->broker_name;
                            $reference_name_all = $row->reference_name;

                            $broker_name_all_arr = explode("-", $broker_name_all);
                            $broker_id = $broker_name_all_arr[1];

                            $reference_name_all_arr = explode("-", $reference_name_all);
                            $reference_id = $reference_name_all_arr[1];


                            /* reference  */
                            if ($reference_id != "") {
                                $result_ref = $this->common_model->getDataWhere('reference_table', 'id', $reference_id);
                                if (count($result_ref) > 0) {
                                    foreach ($result_ref as $row_ref) {
                                        $reference_name = $row_ref->reference_name;
                                        $reference_mobile = $row_ref->reference_mobile;
                                        $reference_mobile_1 = $row_ref->reference_mobile_1;
                                        $reference_mobile_2 = $row_ref->reference_mobile_2;




                                        if ($reference_mobile != "") {
                                            if (strlen($reference_mobile) == 11) {
                                                $reference_mobile = "88" . $reference_mobile;

                                                $sms = "YOUR VISA IS STAMPING .(PP NO : $passport_no )(REF MOB :  $reference_mobile).SO PLEASE COLLECT YOUR PASSPORT COPY FROM ALSMANI. ADDRESS: NOTUN BAZAR (100FT ROAD) BARIDHARA";
                                                $url = "http://221.120.98.162/mmslbulksms/ew_remote.php";
                                                $data = "user=alsmani&pass=alsmani2233&mobile=$reference_mobile&text=" . urlencode($sms);   //8801727843280
                                                $all = $url . '?' . $data;
                                                //$reply = file_get_contents($all);

                                                $record = array(
                                                    'reference_name' => $reference_id,
                                                    'reference_mobile' => $reference_mobile,
                                                    'date_time' => $date_time
                                                );

                                                /*if ($reply == 200) {
                                                    $this->common_model->insertData('embassy_sms_log', $record);
                                                }*/
                                            }
                                        }


                                        if ($reference_mobile_1 != "") {
                                            if (strlen($reference_mobile_1) == 11) {
                                                $reference_mobile_1 = "88" . $reference_mobile_1;

                                                $sms = "YOUR VISA IS STAMPING .(PP NO : $passport_no )(REF MOB :  $reference_mobile_1).SO PLEASE COLLECT YOUR PASSPORT COPY FROM ALSMANI. ADDRESS: NOTUN BAZAR (100FT ROAD) BARIDHARA";
                                                $url = "http://221.120.98.162/mmslbulksms/ew_remote.php";
                                                $data = "user=alsmani&pass=alsmani2233&mobile=$reference_mobile_1&text=" . urlencode($sms);   //8801727843280
                                                $all = $url . '?' . $data;
                                                //$reply = file_get_contents($all);

                                                $record = array(
                                                    'reference_name' => $reference_id,
                                                    'reference_mobile' => $reference_mobile_1,
                                                    'date_time' => $date_time
                                                );

                                               /* if ($reply == 200) {
                                                    $this->common_model->insertData('embassy_sms_log', $record);
                                                }*/
                                            }
                                        }


                                        if ($reference_mobile_2 != "") {
                                            if (strlen($reference_mobile_2) == 11) {
                                                $reference_mobile_2 = "88" . $reference_mobile_2;

                                                $sms = "YOUR VISA IS STAMPING .(PP NO : $passport_no )(REF MOB :  $reference_mobile_2).SO PLEASE COLLECT YOUR PASSPORT COPY FROM ALSMANI. ADDRESS: NOTUN BAZAR (100FT ROAD) BARIDHARA";
                                                $url = "http://221.120.98.162/mmslbulksms/ew_remote.php";
                                                $data = "user=alsmani&pass=alsmani2233&mobile=$reference_mobile_2&text=" . urlencode($sms);   //8801727843280
                                                $all = $url . '?' . $data;
                                                //$reply = file_get_contents($all);


                                                $record = array(
                                                    'reference_name' => $reference_id,
                                                    'reference_mobile' => $reference_mobile_2,
                                                    'date_time' => $date_time
                                                );

                                                /*if ($reply == 200) {
                                                    $this->common_model->insertData('embassy_sms_log', $record);
                                                }*/
                                            }
                                        }
                                    }
                                }
                            }
                            /* end reference  */


                            /* broker  */
                            if ($broker_id != "") {
                                $result_bro = $this->common_model->getDataWhere('broker_table', 'id', $broker_id);
                                if (count($result_bro) > 0) {
                                    foreach ($result_bro as $row_bro) {
                                        $broker_name = $row_bro->broker_name;
                                        $broker_mobile = $row_bro->broker_mobile;
                                        $broker_mobile_1 = $row_bro->broker_mobile_1;
                                        $broker_mobile_2 = $row_bro->broker_mobile_2;





                                        if ($broker_mobile != "") {
                                            if (strlen($broker_mobile) == 11) {
                                                $broker_mobile = "88" . $broker_mobile;

                                                $sms = "YOUR VISA IS STAMPING .(PP NO : $passport_no )(BROK MOB : $broker_mobile).SO PLEASE COLLECT YOUR PASSPORT COPY FROM ALSMANI. ADDRESS: NOTUN BAZAR (100FT ROAD) BARIDHARA";
                                                $url = "http://221.120.98.162/mmslbulksms/ew_remote.php";
                                                $data = "user=alsmani&pass=alsmani2233&mobile=$broker_mobile&text=" . urlencode($sms);   //8801727843280
                                                $all = $url . '?' . $data;
                                                //$reply = file_get_contents($all);

                                                $record = array(
                                                    'broker_name' => $broker_id,
                                                    'broker_mobile' => $broker_mobile,
                                                    'date_time' => $date_time
                                                );

                                                /*if ($reply == 200) {
                                                    $this->common_model->insertData('embassy_sms_log', $record);
                                                }*/
                                            }
                                        }

                                        if ($broker_mobile_1 != "") {
                                            if (strlen($broker_mobile_1) == 11) {
                                                $broker_mobile_1 = "88" . $broker_mobile_1;

                                                $sms = "YOUR VISA IS STAMPING .(PP NO : $passport_no )(BROK MOB : $broker_mobile_1).SO PLEASE COLLECT YOUR PASSPORT COPY FROM ALSMANI. ADDRESS: NOTUN BAZAR (100FT ROAD) BARIDHARA";
                                                $url = "http://221.120.98.162/mmslbulksms/ew_remote.php";
                                                $data = "user=alsmani&pass=alsmani2233&mobile=$broker_mobile_1&text=" . urlencode($sms);   //8801727843280
                                                $all = $url . '?' . $data;
                                                //$reply = file_get_contents($all);

                                                $record = array(
                                                    'broker_name' => $broker_id,
                                                    'broker_mobile' => $broker_mobile_1,
                                                    'date_time' => $date_time
                                                );

                                                /*if ($reply == 200) {
                                                    $this->common_model->insertData('embassy_sms_log', $record);
                                                }*/
                                            }
                                        }



                                        if ($broker_mobile_2 != "") {
                                            if (strlen($broker_mobile_2) == 11) {
                                                $broker_mobile_2 = "88" . $broker_mobile_2;

                                                $sms = "YOUR VISA IS STAMPING .(PP NO : $passport_no )(BROK MOB : $broker_mobile_2).SO PLEASE COLLECT YOUR PASSPORT COPY FROM ALSMANI. ADDRESS: NOTUN BAZAR (100FT ROAD) BARIDHARA";
                                                $url = "http://221.120.98.162/mmslbulksms/ew_remote.php";
                                                $data = "user=alsmani&pass=alsmani2233&mobile=$broker_mobile_2&text=" . urlencode($sms);   //8801727843280
                                                $all = $url . '?' . $data;
                                                //$reply = file_get_contents($all);

                                                $record = array(
                                                    'broker_name' => $broker_id,
                                                    'broker_mobile' => $broker_mobile_2,
                                                    'date_time' => $date_time
                                                );

                                                /*if ($reply == 200) {
                                                    $this->common_model->insertData('embassy_sms_log', $record);
                                                }*/
                                            }
                                        }
                                    }
                                }
                            }
                            /* end broker  */
                        }
                    }
                }


                $this->session->set_userdata('msg_title', 'Success');
                $this->session->set_userdata('msg_body', 'Successfull');
            else:
                $this->session->set_userdata('msg_title', 'Error');
                $this->session->set_userdata('msg_body', 'Failed');
            endif;
            redirect('view_embasy_incom');
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
            redirect('view_embasy_incom');
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
            array('db' => 'embassy_file_upload', 'dt' => 2, 'field' => 'embassy_file_upload'),
            array('db' => 'embassy_visa_stamping_status', 'dt' => 3, 'field' => 'embassy_visa_stamping_status'),
            array('db' => 'embassy_date', 'dt' => 4, 'field' => 'embassy_date'),
            array('db' => 'embasy_expire_date', 'dt' => 5, 'field' => 'embasy_expire_date'),
           
            array('db' => 'id', 'dt' => 6, 'field' => 'id', 'formatter' => function ($rowvalue, $row) {
                    return '<a  href="#">
      <button class="btn btn-primary btn-xs" onclick="addModal(' . $rowvalue . ')"><i class="fa fa-pencil"> Visa</i></button></a>
	  
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
        $extraCondition = "( `embassy_visa_stamping_status` IS NULL)";
        // $extraCondition = "`enzaz_mufa_number`!=''";

        echo json_encode(
                SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns, '', $extraCondition)
        );
    }

}

?>
