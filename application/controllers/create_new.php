<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Create_new extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('common_model');
    }

    public function index() {

        if (in_array($this->session->userdata('role_id'), array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17))):
            $data['base_url'] = $this->config->item('base_url');
            $data['active_menu'] = 'Passport Receive';
            $data['active_sub_menu'] = 'Create New';

           


            $table_name = 'reference_table';
            $data['get_reference_data'] = $this->common_model->getDataOrderBy($table_name,'reference_name','asc');
            
            $table_name = 'broker_table';
            $data['get_broker_data'] = $this->common_model->getData($table_name);
            $this->load->view('common/header', $data);
            $this->load->view('create_new/create_new', $data);
            $this->load->view('common/footer', $data);
            $this->load->view('common/js', $data);
            $this->load->view('create_new/js_create_new', $data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');
        else:
            redirect('home');
        endif;
    }

    public function addPassport() {

        if (in_array($this->session->userdata('role_id'), array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17))):
            $data['base_url'] = $this->config->item('base_url');


            $add_passport_holder_name = mysql_real_escape_string($this->input->post('add_passport_holder_name'));
            $add_mobile_number = mysql_real_escape_string($this->input->post('add_mobile_number'));
            $add_passport_no = mysql_real_escape_string(trim($this->input->post('add_passport_no')));
            $add_id_number = mysql_real_escape_string($this->input->post('add_id_number'));
            $add_visa_number = mysql_real_escape_string($this->input->post('add_visa_number'));
            $add_visa_type = mysql_real_escape_string($this->input->post('add_visa_type'));
            //$add_fingering_type= mysql_real_escape_string($this->input->post('add_fingering_type'));
            $add_reference_name = mysql_real_escape_string($this->input->post('add_reference_name'));
            $add_broker_name = mysql_real_escape_string($this->input->post('add_broker_name'));
            $add_broker_mobile_number = mysql_real_escape_string($this->input->post('add_broker_mobile_number'));
            $add_reference_mobile_number = mysql_real_escape_string($this->input->post('add_reference_mobile_number')); 
            $add_sponsor_name = mysql_real_escape_string($this->input->post('add_sponsor_name'));
            $police_clearance = mysql_real_escape_string($this->input->post('police_clearance'));
            $passport_owner = mysql_real_escape_string($this->input->post('passport_owner'));
			
			$passport_owner1 = mysql_real_escape_string($this->input->post('passport_owner1'));
			$passport_owner2 = mysql_real_escape_string($this->input->post('passport_owner2'));
			$passport_owner3 = mysql_real_escape_string($this->input->post('passport_owner3'));
			$passport_owner4 = mysql_real_escape_string($this->input->post('passport_owner4'));
			
            $training = mysql_real_escape_string($this->input->post('training'));
            $passportpreview = mysql_real_escape_string($this->input->post('passportpreview'));
             $add_manpower = mysql_real_escape_string($this->input->post('add_manpower'));
            $add_passport_type = mysql_real_escape_string($this->input->post('add_passport_type'));
            $add_passport_side = mysql_real_escape_string($this->input->post('add_passport_side'));
            $add_description = mysql_real_escape_string($this->input->post('add_description'));
			
			
			
			$dob = mysql_real_escape_string($this->input->post('dob'));
			$add_experience = mysql_real_escape_string($this->input->post('add_experience'));
            
			
			$cooking = mysql_real_escape_string($this->input->post('cooking'));
			$clerning = mysql_real_escape_string($this->input->post('clerning'));
			
			
			$baby = mysql_real_escape_string($this->input->post('baby'));
			$driving = mysql_real_escape_string($this->input->post('driving'));
			
			
			
			$post_apply = mysql_real_escape_string($this->input->post('post_apply'));
		
			
            
            $config['overwrite'] = false;
            $config['upload_path'] = './public/uploads';
            $config['allowed_types'] = 'gif|jpg|png';   //'gif|jpg|png|mp4|ogg|webm|mov|mpeg|avi';
            $config['max_size'] = '60000';
            $config['max_width'] = '';
            $config['max_height'] = '';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            $data['upload_data'] = '';
            $date_time = date('Y-m-d H:i:s');
            if (!$this->upload->do_upload('passportpreview')) :
                $error = $this->upload->display_errors();
                $data['upload_data'] = $error;
                $fileName1 = '';


            else:
                $upload_data = $this->upload->data();
            
                $data['upload_data'] = $upload_data;
                 $fileName1 = $upload_data['file_name'];
            endif;
            
            $data['upload_data'] = '';
            $date_time = date('Y-m-d H:i:s');
            if (!$this->upload->do_upload('police_clearance')) :
                $error = $this->upload->display_errors();
                $data['upload_data'] = $error;
                $file_name2 = '';


            else:
                $upload_data = $this->upload->data();
                $data['upload_data'] = $upload_data;
                $file_name2 = $upload_data['file_name'];
            endif;
            
            $data['upload_data'] = '';
            $date_time = date('Y-m-d H:i:s');
            if (!$this->upload->do_upload('training')) :
                $error = $this->upload->display_errors();
                $data['upload_data'] = $error;
                 $file_name3 = '';


            else:
                $upload_data = $this->upload->data();
                $data['upload_data'] = $upload_data;
                 $file_name3 = $upload_data['file_name'];
            endif;
            
            $data['upload_data'] = '';
            $date_time = date('Y-m-d H:i:s');
            if (!$this->upload->do_upload('passport_owner')) :
                $error = $this->upload->display_errors();
                $data['upload_data'] = $error;
                $file_name4 = '';


            else:
                $upload_data = $this->upload->data();
                $data['upload_data'] = $upload_data;
                $file_name4 = $upload_data['file_name'];
            endif;
			
			
			
			
			
			
		    $data['upload_data'] = '';
            $date_time = date('Y-m-d H:i:s');
            if (!$this->upload->do_upload('passport_owner1')) :
                $error = $this->upload->display_errors();
                $data['upload_data'] = $error;
                $file_name6 = '';


            else:
                $upload_data = $this->upload->data();
                $data['upload_data'] = $upload_data;
                $file_name6 = $upload_data['file_name'];
            endif;
			
			
			
			
				
		    $data['upload_data'] = '';
            $date_time = date('Y-m-d H:i:s');
            if (!$this->upload->do_upload('passport_owner2')) :
                $error = $this->upload->display_errors();
                $data['upload_data'] = $error;
                $file_name7 = '';


            else:
                $upload_data = $this->upload->data();
                $data['upload_data'] = $upload_data;
                $file_name7 = $upload_data['file_name'];
            endif;
			
			
			
			
			
			
				    $data['upload_data'] = '';
            $date_time = date('Y-m-d H:i:s');
            if (!$this->upload->do_upload('passport_owner3')) :
                $error = $this->upload->display_errors();
                $data['upload_data'] = $error;
                $file_name8 = '';


            else:
                $upload_data = $this->upload->data();
                $data['upload_data'] = $upload_data;
                $file_name8 = $upload_data['file_name'];
            endif;
			
			
			
			
			
			
			
				    $data['upload_data'] = '';
            $date_time = date('Y-m-d H:i:s');
            if (!$this->upload->do_upload('passport_owner4')) :
                $error = $this->upload->display_errors();
                $data['upload_data'] = $error;
                $file_name9 = '';


            else:
                $upload_data = $this->upload->data();
                $data['upload_data'] = $upload_data;
                $file_name9 = $upload_data['file_name'];
            endif;
			
			
			
			
			
			
			
			


            date_default_timezone_set("Asia/Dhaka");
            $date_time = date('Y-m-d H:i:s');
            $data = array(
                'name' => $add_passport_holder_name,
                'passport_no' => $add_passport_no,
                'mobile_number' => $add_mobile_number,
                'basic_id_number' => $add_id_number,
                'basic_visa_number' => $add_visa_number,
                'visa_type' => $add_visa_type,
                //'basic_fingering' => $add_fingering_type,
                'reference_name' => $add_reference_name,
                'broker_name' => $add_broker_name,
                'broker_mobile_number' => $add_broker_mobile_number,
                'reference_mobile_number' => $add_reference_mobile_number,
                'okala_sponsor_name' => $add_sponsor_name,
                'police_clearance' => $file_name2,
                'training' => $file_name3,
                'passport_owner' => $file_name4,
				'passport_owner1' => $file_name6,
				'passport_owner2' => $file_name7,
				'passport_owner3' => $file_name8,
				'passport_owner4' => $file_name9,
                'passport_preview' => $fileName1,
                'basic_passport_type' => $add_passport_type,
                'man_power' => $add_manpower,
                'basic_receive_site' => $add_passport_side,
                'basic_entry_date' => $date_time,
                'basic_note' => $add_description,
				
				
				
				
				
				
				
				
				'dob' => $dob,
                'add_experience' => $add_experience,
                'cooking' => $cooking,
                'clerning' => $clerning,
                'baby' => $baby,
                'driving' => $driving,
                'post_apply' => $post_apply,
                
                
            );

            $table_name = 'passport_makings';
            $insert_result = $this->common_model->insertData($table_name, $data);


            if ($insert_result):
                $this->session->set_userdata('msg_title', 'Success');
                $this->session->set_userdata('msg_body', 'Successfull');
            else:
                $this->session->set_userdata('msg_title', 'Error');
                $this->session->set_userdata('msg_body', 'Failed');
            endif;
            redirect('create_new');
        else:

            redirect('home');
        endif;
    }

     public function addBroker() {

        if (in_array($this->session->userdata('role_id'), array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17))):
            $data['base_url'] = $this->config->item('base_url');


            $add_broker_name = mysql_real_escape_string(trim($this->input->post('broker_name')));
            $add_broker_mobile_number = mysql_real_escape_string($this->input->post('broker_mobile'));
            $add_broker_mobile_number_1 = mysql_real_escape_string($this->input->post('broker_mobile_1'));
            $add_broker_mobile_number_2 = mysql_real_escape_string($this->input->post('broker_mobile_2'));
           
             $result = $this->db->query("select * from broker_table order by 	id desc limit 1");
            if ($result->num_rows() > 0):
                foreach ($result->result() as $row) :
                    $id = $row->id;
                    $last_row= $id + 1;
                endforeach;
            else:
                $last_row = 1;
            endif;
            $add_broker_id = $last_row;

          
            date_default_timezone_set("Asia/Dhaka");
            $date = date('Y-m-d');
            $data = array(
                'broker_name' => $add_broker_name,
                'broker_id' => $add_broker_id,
                'broker_mobile' => $add_broker_mobile_number,
                'broker_mobile_1' => $add_broker_mobile_number_1,
               'broker_mobile_2' => $add_broker_mobile_number_2,

                'date' => $date,
            );

            $table_name = 'broker_table';
            
             $res = $this->common_model->getDataWhere($table_name, 'broker_name',  $add_broker_name);
            if (count($res) > 0) {
                $this->session->set_userdata('msg_title', 'Error');
                $this->session->set_userdata('msg_body', 'Name Already exist');
                redirect('create_new');
            }
            $insert_result = $this->common_model->insertData($table_name, $data);


            if ($insert_result):
                $this->session->set_userdata('msg_title', 'Success');
                $this->session->set_userdata('msg_body', 'Successfull');
            else:
                $this->session->set_userdata('msg_title', 'Error');
                $this->session->set_userdata('msg_body', 'Failed');
            endif;
            redirect('create_new');
        else:

            redirect('home');
        endif;
    }
    
    public function addReference() {

        if (in_array($this->session->userdata('role_id'), array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17))):
            $data['base_url'] = $this->config->item('base_url');


            $add_reference_name = mysql_real_escape_string(trim($this->input->post('reference_name')));
            $add_reference_mobile_number = mysql_real_escape_string($this->input->post('reference_mobile'));
            $add_reference_mobile_number_1 = mysql_real_escape_string($this->input->post('reference_mobile_1'));
            $add_reference_mobile_number_2 = mysql_real_escape_string($this->input->post('reference_mobile_2'));
           
             $result = $this->db->query("select * from reference_table order by id desc limit 1");
            if ($result->num_rows() > 0):
                foreach ($result->result() as $row) :
                    $id = $row->id;
                    $last_row= $id + 1;
                endforeach;
            else:
                $last_row = 1;
            endif;
            $add_reference_id = $last_row;

          
            date_default_timezone_set("Asia/Dhaka");
            $date = date('Y-m-d');
            $data = array(
                'reference_name' => $add_reference_name,
                'reference_id' => $add_reference_id,
                'reference_mobile' => $add_reference_mobile_number,
                'reference_mobile_1' => $add_reference_mobile_number_1,
                'reference_mobile_2' => $add_reference_mobile_number_2,

                'date' => $date,
            );

            $table_name = 'reference_table';
            
             $res = $this->common_model->getDataWhere($table_name, 'reference_name',  $add_reference_name);
            if (count($res) > 0) {
                $this->session->set_userdata('msg_title', 'Error');
                $this->session->set_userdata('msg_body', 'Name Already exist');
                redirect('create_new');
            }
            $insert_result = $this->common_model->insertData($table_name, $data);


            if ($insert_result):
                $this->session->set_userdata('msg_title', 'Success');
                $this->session->set_userdata('msg_body', 'Successfull');
            else:
                $this->session->set_userdata('msg_title', 'Error');
                $this->session->set_userdata('msg_body', 'Failed');
            endif;
            redirect('create_new');
        else:

            redirect('home');
        endif;
    }

    public function getData() {

        $data['base_url'] = $this->config->item('base_url');
        $id = mysql_real_escape_string($this->input->post('id'));

        $table_name = 'base_models';
        $result = $this->common_model->getDataWhere($table_name, "id", $id);
        echo json_encode($result);
    }

    public function getRefMobileNumber() {

        $data['base_url'] = $this->config->item('base_url');
        $reference_name = mysql_real_escape_string($this->input->post('reference_name'));

        $table_name = 'reference_table';
        $result = $this->common_model->getDataWhere($table_name, "reference_name", $reference_name);
        echo json_encode($result);
    }

    public function getBrokMobileNumber() {

        $data['base_url'] = $this->config->item('base_url');
        $broker_name = mysql_real_escape_string($this->input->post('broker_name'));

        $table_name = 'broker_table';
        $result = $this->common_model->getDataWhere($table_name, "broker_name", $broker_name);
        echo json_encode($result);
    }

}

?>
