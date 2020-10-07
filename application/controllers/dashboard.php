<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('common_model');
    }

    public function index() {


        if (in_array($this->session->userdata('role_id'), array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17,18,19,20))):
            $data['base_url'] = $this->config->item('base_url');
            $data['active_menu'] = 'Dashboard';
            $data['active_sub_menu'] = 'Dashboard';



            $date = date('Y-m-d');

            $query_str = "select * from passport_makings where `basic_entry_date` Like '$date%' ";
            $result = $this->db->query($query_str);
            $data['passport'] = $result->num_rows();

            $query_str = "select * from passport_makings where `enzaz_mufa_number` != '' and `enzaz_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['enjaz'] = $result->num_rows();

            $query_str = "select * from passport_makings where `okala_status` = 'Receive' and `okala_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['okala'] = $result->num_rows();

            $query_str = "select * from passport_makings where  `fit_receive_receive_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['fitcard'] = $result->num_rows();

            $query_str = "select * from passport_makings where `embassy_visa_stamping_status` = 'Complete' and `embassy_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['embasy'] = $result->num_rows();


            $query_str = "select * from passport_makings where `basic_fingering` = 'Receive' and `fingering_receive_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['fingering'] = $result->num_rows();


            $query_str = "select * from passport_makings where `basic_receive_site` = 'Inside' and `basic_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['inside'] = $result->num_rows();


            $query_str = "select * from passport_makings where `basic_receive_site` = 'Outside' and `basic_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['outside'] = $result->num_rows();

			
			 $query_str = "select * from passport_makings where `manpower_status` = 'Receive' and `manpower_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['manpower'] = $result->num_rows();

			$query_str = "select * from passport_makings where `basic_flight` = 'Complete' and `ticket_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['ticket'] = $result->num_rows();
			
			
			$query_str = "select * from passport_makings where `is_cancel` = 'true' and `musaned_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['cancel'] = $result->num_rows();
			
			
            $table_name = 'reference_table';
            $data['get_reference_data'] = $this->common_model->getDataOrderBy($table_name, 'reference_name', 'asc');

            $table_name = 'broker_table';
            $data['get_broker_data'] = $this->common_model->getData($table_name);

            $query_str = "select * from passport_makings where `fit_receive_receive_date`!=''";
            $result = $this->db->query($query_str);
            $data['get_fit_receive_data'] = $result->result();


            $query_str = "select * from passport_makings where `embassy_visa_stamping_status`='Complete'";
            $result = $this->db->query($query_str);
            $data['get_embassy_visa_stamping_data'] = $result->result();

            $this->load->view('common/header', $data);
            $this->load->view('dashboard/index', $data);
            $this->load->view('common/js', $data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');
        else:
            redirect('home');
        endif;
    }

    public function editOkala() {


        if (in_array($this->session->userdata('role_id'), array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 14, 15, 16, 17))):
            $data['base_url'] = $this->config->item('base_url');


            $date = date('Y-m-d');

            $query_str = "select * from passport_makings where `basic_entry_date` Like '$date%' ";
            $result = $this->db->query($query_str);
            $data['passport'] = $result->num_rows();

            $query_str = "select * from passport_makings where `enzaz_mufa_number` != '' and `enzaz_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['enjaz'] = $result->num_rows();

            $query_str = "select * from passport_makings where `okala_status` = 'Receive' and `okala_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['okala'] = $result->num_rows();

            $query_str = "select * from passport_makings where  `fit_receive_receive_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['fitcard'] = $result->num_rows();

            $query_str = "select * from passport_makings where `embassy_visa_stamping_status` = 'Complete' and `embassy_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['embasy'] = $result->num_rows();


            $query_str = "select * from passport_makings where `basic_fingering` = 'Receive' and `fingering_receive_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['fingering'] = $result->num_rows();


            $query_str = "select * from passport_makings where `basic_receive_site` = 'Inside' and `basic_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['inside'] = $result->num_rows();


            $query_str = "select * from passport_makings where `basic_receive_site` = 'Outside' and `basic_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['outside'] = $result->num_rows();
			
			$query_str = "select * from passport_makings where `manpower_status` = 'Receive' and `manpower_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['manpower'] = $result->num_rows();
			
			$query_str = "select * from passport_makings where `basic_flight` = 'Complete' and `ticket_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['ticket'] = $result->num_rows();

			$query_str = "select * from passport_makings where `is_cancel` = 'true' and `musaned_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['cancel'] = $result->num_rows();
			
            $edit_id = mysql_real_escape_string($this->input->post('edit_id'));
            $edit_name = mysql_real_escape_string($this->input->post('edit_name'));
            $edit_okala_sponsor_name = mysql_real_escape_string($this->input->post('edit_okala_sponsor_name'));
            $edit_okala_office = mysql_real_escape_string($this->input->post('edit_okala_office'));
            $edit_okala_status = mysql_real_escape_string($this->input->post('edit_okala_status'));
            $edit_okala_note = mysql_real_escape_string($this->input->post('edit_okala_note'));


            $data_okala = array(
                'okala_sponsor_name' => $edit_okala_sponsor_name,
                'okala_office' => $edit_okala_office,
                'okala_status' => $edit_okala_status,
                'okala_note' => $edit_okala_note,
				'okala_entry_date'=>date('Y-m-d'),
                'enzaz_health_fee' => date('Y-m-d H:i:s')
            );

            $table_name = 'passport_makings';
            $insert_result = $this->common_model->updateData($table_name, $data_okala, "id", $edit_id);

            $passport_no = mysql_real_escape_string(trim($this->input->post('passport_no')));
            $data['passport_makings_data'] = $this->common_model->getDataWhere('passport_makings', 'passport_no', $passport_no);

            $table_name = 'reference_table';
            $data['get_reference_data'] = $this->common_model->getDataOrderBy($table_name, 'reference_name', 'asc');

            $table_name = 'broker_table';
            $data['get_broker_data'] = $this->common_model->getData($table_name);
            
             $query_str = "select * from passport_makings where `fit_receive_receive_date`!=''";
            $result = $this->db->query($query_str);
            $data['get_fit_receive_data'] = $result->result();


            $query_str = "select * from passport_makings where `embassy_visa_stamping_status`='Complete'";
            $result = $this->db->query($query_str);
            $data['get_embassy_visa_stamping_data'] = $result->result();
            
            

            if ($insert_result):
                $this->session->set_userdata('msg_title', 'Success');
                $this->session->set_userdata('msg_body', 'Successfull');
            else:
                $this->session->set_userdata('msg_title', 'Error');
                $this->session->set_userdata('msg_body', 'Failed');
            endif;

            $this->load->view('common/header', $data);
            $this->load->view('dashboard/index', $data);
            $this->load->view('common/js', $data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');

        else:

            redirect('home');
        endif;
    }
	
	
	

    public function editEnjaz() {


        if (in_array($this->session->userdata('role_id'), array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 14, 15, 16, 17))):
            $data['base_url'] = $this->config->item('base_url');


            $date = date('Y-m-d');

            $query_str = "select * from passport_makings where `basic_entry_date` Like '$date%' ";
            $result = $this->db->query($query_str);
            $data['passport'] = $result->num_rows();

            $query_str = "select * from passport_makings where `enzaz_mufa_number` != '' and `enzaz_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['enjaz'] = $result->num_rows();

            $query_str = "select * from passport_makings where `okala_status` = 'Receive' and `okala_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['okala'] = $result->num_rows();

            $query_str = "select * from passport_makings where  `fit_receive_receive_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['fitcard'] = $result->num_rows();

            $query_str = "select * from passport_makings where `embassy_visa_stamping_status` = 'Complete' and `embassy_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['embasy'] = $result->num_rows();


            $query_str = "select * from passport_makings where `basic_fingering` = 'Receive' and `fingering_receive_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['fingering'] = $result->num_rows();


            $query_str = "select * from passport_makings where `basic_receive_site` = 'Inside' and `basic_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['inside'] = $result->num_rows();


            $query_str = "select * from passport_makings where `basic_receive_site` = 'Outside' and `basic_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['outside'] = $result->num_rows();

			$query_str = "select * from passport_makings where `manpower_status` = 'Receive' and `manpower_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['manpower'] = $result->num_rows();
			
			$query_str = "select * from passport_makings where `is_cancel` = 'true' and `musaned_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['cancel'] = $result->num_rows();
			
			$query_str = "select * from passport_makings where `basic_flight` = 'Complete' and `ticket_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['ticket'] = $result->num_rows();
			
            $edit_id = mysql_real_escape_string($this->input->post('edit_id'));
            $edit_name = mysql_real_escape_string($this->input->post('edit_name'));
            $edit_passport_no = mysql_real_escape_string($this->input->post('edit_passport_no'));
            $edit_mufa_number = mysql_real_escape_string($this->input->post('edit_mufa_number'));
            $edit_enjaz_date = mysql_real_escape_string($this->input->post('edit_enjaz_date'));
            $edit_enjaz_note = mysql_real_escape_string($this->input->post('edit_enjaz_note'));


            $data_enjaz = array(
                'enzaz_mufa_number' => $edit_mufa_number,
                'enzaz_date' => $edit_enjaz_date,
                'enzaz_note' => $edit_enjaz_note,
                'enzaz_health_fee' => date('Y-m-d H:i:s')
            );

            $table_name = 'passport_makings';
            $insert_result = $this->common_model->updateData($table_name, $data_enjaz, "id", $edit_id);


            $data['passport_makings_data'] = $this->common_model->getDataWhere('passport_makings', 'passport_no', $edit_passport_no);

            $table_name = 'reference_table';
            $data['get_reference_data'] = $this->common_model->getDataOrderBy($table_name, 'reference_name', 'asc');

            $table_name = 'broker_table';
            $data['get_broker_data'] = $this->common_model->getData($table_name);
            
            
             $query_str = "select * from passport_makings where `fit_receive_receive_date`!=''";
            $result = $this->db->query($query_str);
            $data['get_fit_receive_data'] = $result->result();


            $query_str = "select * from passport_makings where `embassy_visa_stamping_status`='Complete'";
            $result = $this->db->query($query_str);
            $data['get_embassy_visa_stamping_data'] = $result->result();

            if ($insert_result):
                $this->session->set_userdata('msg_title', 'Success');
                $this->session->set_userdata('msg_body', 'Successfull');
            else:
                $this->session->set_userdata('msg_title', 'Error');
                $this->session->set_userdata('msg_body', 'Failed');
            endif;

            $this->load->view('common/header', $data);
            $this->load->view('dashboard/index', $data);
            $this->load->view('common/js', $data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');

        else:

            redirect('home');
        endif;
    }

    public function editFitcard() {


        if (in_array($this->session->userdata('role_id'), array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 14, 15, 16, 17))):
            $data['base_url'] = $this->config->item('base_url');


            $date = date('Y-m-d');

            $query_str = "select * from passport_makings where `basic_entry_date` Like '$date%' ";
            $result = $this->db->query($query_str);
            $data['passport'] = $result->num_rows();

            $query_str = "select * from passport_makings where `enzaz_mufa_number` != '' and `enzaz_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['enjaz'] = $result->num_rows();

            $query_str = "select * from passport_makings where `okala_status` = 'Receive' and `okala_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['okala'] = $result->num_rows();

            $query_str = "select * from passport_makings where  `fit_receive_receive_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['fitcard'] = $result->num_rows();

            $query_str = "select * from passport_makings where `embassy_visa_stamping_status` = 'Complete' and `embassy_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['embasy'] = $result->num_rows();


            $query_str = "select * from passport_makings where `basic_fingering` = 'Receive' and `fingering_receive_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['fingering'] = $result->num_rows();


            $query_str = "select * from passport_makings where `basic_receive_site` = 'Inside' and `basic_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['inside'] = $result->num_rows();


            $query_str = "select * from passport_makings where `basic_receive_site` = 'Outside' and `basic_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['outside'] = $result->num_rows();

			$query_str = "select * from passport_makings where `manpower_status` = 'Receive' and `manpower_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['manpower'] = $result->num_rows();
			
			$query_str = "select * from passport_makings where `basic_flight` = 'Complete' and `ticket_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['ticket'] = $result->num_rows();
			
			$query_str = "select * from passport_makings where `is_cancel` = 'true' and `musaned_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['cancel'] = $result->num_rows();
			
            $edit_id = mysql_real_escape_string($this->input->post('edit_id'));
            $edit_name = mysql_real_escape_string($this->input->post('edit_name'));
            $edit_passport_no = mysql_real_escape_string($this->input->post('edit_passport_no'));
            $edit_receive_date = mysql_real_escape_string($this->input->post('edit_receive_date'));
            $edit_expire_date = mysql_real_escape_string($this->input->post('edit_expire_date'));
            $edit_fitcard_note = mysql_real_escape_string($this->input->post('edit_fitcard_note'));


            $data_fitcard = array(
                'fit_receive_receive_date' => $edit_receive_date,
                'fit_receive_expire_date' => $edit_expire_date,
                'fit_receive_note' => $edit_fitcard_note,
                'enzaz_health_fee' => date('Y-m-d H:i:s')
            );


            $table_name = 'passport_makings';
            $insert_result = $this->common_model->updateData($table_name, $data_fitcard, "id", $edit_id);


            $data['passport_makings_data'] = $this->common_model->getDataWhere('passport_makings', 'passport_no', $edit_passport_no);

            $table_name = 'reference_table';
            $data['get_reference_data'] = $this->common_model->getDataOrderBy($table_name, 'reference_name', 'asc');

            $table_name = 'broker_table';
            $data['get_broker_data'] = $this->common_model->getData($table_name);
            
            
             $query_str = "select * from passport_makings where `fit_receive_receive_date`!=''";
            $result = $this->db->query($query_str);
            $data['get_fit_receive_data'] = $result->result();


            $query_str = "select * from passport_makings where `embassy_visa_stamping_status`='Complete'";
            $result = $this->db->query($query_str);
            $data['get_embassy_visa_stamping_data'] = $result->result();

            if ($insert_result):
                $this->session->set_userdata('msg_title', 'Success');
                $this->session->set_userdata('msg_body', 'Successfull');
            else:
                $this->session->set_userdata('msg_title', 'Error');
                $this->session->set_userdata('msg_body', 'Failed');
            endif;

            $this->load->view('common/header', $data);
            $this->load->view('dashboard/index', $data);
            $this->load->view('common/js', $data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');

        else:

            redirect('home');
        endif;
    }

    public function editEmbasy() {


        if (in_array($this->session->userdata('role_id'), array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 14, 15, 16, 17))):
            $data['base_url'] = $this->config->item('base_url');


            $date = date('Y-m-d');

            $query_str = "select * from passport_makings where `basic_entry_date` Like '$date%' ";
            $result = $this->db->query($query_str);
            $data['passport'] = $result->num_rows();

            $query_str = "select * from passport_makings where `enzaz_mufa_number` != '' and `enzaz_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['enjaz'] = $result->num_rows();

            $query_str = "select * from passport_makings where `okala_status` = 'Receive' and `okala_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['okala'] = $result->num_rows();

            $query_str = "select * from passport_makings where  `fit_receive_receive_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['fitcard'] = $result->num_rows();

            $query_str = "select * from passport_makings where `embassy_visa_stamping_status` = 'Complete' and `embassy_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['embasy'] = $result->num_rows();


            $query_str = "select * from passport_makings where `basic_fingering` = 'Receive' and `fingering_receive_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['fingering'] = $result->num_rows();


            $query_str = "select * from passport_makings where `basic_receive_site` = 'Inside' and `basic_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['inside'] = $result->num_rows();


            $query_str = "select * from passport_makings where `basic_receive_site` = 'Outside' and `basic_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['outside'] = $result->num_rows();

			$query_str = "select * from passport_makings where `manpower_status` = 'Receive' and `manpower_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['manpower'] = $result->num_rows();
			
			$query_str = "select * from passport_makings where `basic_flight` = 'Complete' and `ticket_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['ticket'] = $result->num_rows();
			
			$query_str = "select * from passport_makings where `is_cancel` = 'true' and `musaned_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['cancel'] = $result->num_rows();
			
			
            $edit_id = mysql_real_escape_string($this->input->post('edit_id'));
            $edit_name = mysql_real_escape_string($this->input->post('edit_name'));
            $edit_passport_no = mysql_real_escape_string($this->input->post('edit_passport_no'));
            $edit_embasy_status = mysql_real_escape_string($this->input->post('edit_embasy_status'));
            $edit_embasy_date = mysql_real_escape_string($this->input->post('edit_embasy_date'));
            
            $date_new = date_create($edit_embasy_date);
            date_add($date_new, date_interval_create_from_date_string("89 days"));
            $edit_embasy_expire_date = date_format($date_new, "Y-m-d");
            
            
            //$edit_embasy_expire_date = mysql_real_escape_string($this->input->post('edit_embasy_expire_date'));
            $edit_embasy_office = mysql_real_escape_string($this->input->post('edit_embasy_office'));
            $edit_embasy_note = mysql_real_escape_string($this->input->post('edit_embasy_note'));



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
            if (!$this->upload->do_upload('edit_embasy_file')) :
                $error = $this->upload->display_errors();
                $data['upload_data'] = $error;
                $fileName = '';
                $data_embasy = array(
                    'embassy_visa_stamping_status' => $edit_embasy_status,
                    'embassy_date' => $edit_embasy_date,
                    'embasy_expire_date' => $edit_embasy_expire_date,
                    'embasy_office' => $edit_embasy_office,
                    'embassy_note' => $edit_embasy_note,
                    'enzaz_health_fee' => date('Y-m-d H:i:s')
                );

            else:
                $upload_data = $this->upload->data();
                $data['upload_data'] = $upload_data;
                $fileName = $upload_data['file_name'];

                $data_embasy = array(
                    'embassy_file_upload' => $fileName,
                    'embassy_visa_stamping_status' => $edit_embasy_status,
                    'embassy_date' => $edit_embasy_date,
                    'embasy_expire_date' => $edit_embasy_expire_date,
                    'embasy_office' => $edit_embasy_office,
                    'embassy_note' => $edit_embasy_note,
                    'enzaz_health_fee' => date('Y-m-d H:i:s')
                );



            endif;

            $table_name = 'passport_makings';
            $insert_result = $this->common_model->updateData($table_name, $data_embasy, "id", $edit_id);


            $data['passport_makings_data'] = $this->common_model->getDataWhere('passport_makings', 'passport_no', $edit_passport_no);

            $table_name = 'reference_table';
            $data['get_reference_data'] = $this->common_model->getDataOrderBy($table_name, 'reference_name', 'asc');

            $table_name = 'broker_table';
            $data['get_broker_data'] = $this->common_model->getData($table_name);
            
            
             $query_str = "select * from passport_makings where `fit_receive_receive_date`!=''";
            $result = $this->db->query($query_str);
            $data['get_fit_receive_data'] = $result->result();


            $query_str = "select * from passport_makings where `embassy_visa_stamping_status`='Complete'";
            $result = $this->db->query($query_str);
            $data['get_embassy_visa_stamping_data'] = $result->result();

            if ($insert_result):
                $this->session->set_userdata('msg_title', 'Success');
                $this->session->set_userdata('msg_body', 'Successfull');
            else:
                $this->session->set_userdata('msg_title', 'Error');
                $this->session->set_userdata('msg_body', 'Failed');
            endif;

            $this->load->view('common/header', $data);
            $this->load->view('dashboard/index', $data);
            $this->load->view('common/js', $data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');

        else:

            redirect('home');
        endif;
    }
	
	
	 public function editManpower() {


        if (in_array($this->session->userdata('role_id'), array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 14, 15, 16, 17))):
            $data['base_url'] = $this->config->item('base_url');


            $date = date('Y-m-d');

            $query_str = "select * from passport_makings where `basic_entry_date` Like '$date%' ";
            $result = $this->db->query($query_str);
            $data['passport'] = $result->num_rows();

            $query_str = "select * from passport_makings where `enzaz_mufa_number` != '' and `enzaz_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['enjaz'] = $result->num_rows();

            $query_str = "select * from passport_makings where `okala_status` = 'Receive' and `okala_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['okala'] = $result->num_rows();

            $query_str = "select * from passport_makings where  `fit_receive_receive_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['fitcard'] = $result->num_rows();

            $query_str = "select * from passport_makings where `embassy_visa_stamping_status` = 'Complete' and `embassy_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['embasy'] = $result->num_rows();


            $query_str = "select * from passport_makings where `basic_fingering` = 'Receive' and `fingering_receive_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['fingering'] = $result->num_rows();


            $query_str = "select * from passport_makings where `basic_receive_site` = 'Inside' and `basic_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['inside'] = $result->num_rows();


            $query_str = "select * from passport_makings where `basic_receive_site` = 'Outside' and `basic_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['outside'] = $result->num_rows();

			
			$query_str = "select * from passport_makings where `manpower_status` = 'Receive' and `manpower_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['manpower'] = $result->num_rows();
			
			$query_str = "select * from passport_makings where `basic_flight` = 'Complete' and `ticket_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['ticket'] = $result->num_rows();
			
			$query_str = "select * from passport_makings where `is_cancel` = 'true' and `musaned_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['cancel'] = $result->num_rows();
			
			
            $edit_id = mysql_real_escape_string($this->input->post('edit_id'));
            $edit_name = mysql_real_escape_string($this->input->post('edit_name'));
            $edit_passport_no = mysql_real_escape_string($this->input->post('edit_passport_no'));
			
            $edit_manpower_status = mysql_real_escape_string($this->input->post('edit_manpower_status'));
            $edit_manpower_date = mysql_real_escape_string($this->input->post('edit_manpower_date'));                                            
            $edit_manpower_note = mysql_real_escape_string($this->input->post('edit_manpower_note'));
            $edit_manpower_office = mysql_real_escape_string($this->input->post('edit_manpower_office'));


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
            if (!$this->upload->do_upload('edit_manpower_file')) :
                $error = $this->upload->display_errors();
                $data['upload_data'] = $error;
                $fileName = '';
                $data_embasy = array(
                    'manpower_status' => $edit_manpower_status,
                    'manpower_date' => $edit_manpower_date,
					'manpower_office' => $edit_manpower_office, 
                    'manpower_note' => $edit_manpower_note,                   					
                    'manpower_entry_date' => date('Y-m-d'),
                    'enzaz_health_fee' => date('Y-m-d H:i:s')
                );

            else:
                $upload_data = $this->upload->data();
                $data['upload_data'] = $upload_data;
                $fileName = $upload_data['file_name'];

                $data_embasy = array(
                    'manpower_file_upload' => $fileName,
                    'manpower_status' => $edit_manpower_status,
                    'manpower_date' =>$edit_manpower_date,
					'manpower_office' => $edit_manpower_office, 
                    'manpower_note' => $edit_manpower_note,                  
                    'manpower_entry_date' => date('Y-m-d'),
                    'enzaz_health_fee' => date('Y-m-d H:i:s')
                );



            endif;

            $table_name = 'passport_makings';
            $insert_result = $this->common_model->updateData($table_name, $data_embasy, "id", $edit_id);


            $data['passport_makings_data'] = $this->common_model->getDataWhere('passport_makings', 'passport_no', $edit_passport_no);

            $table_name = 'reference_table';
            $data['get_reference_data'] = $this->common_model->getDataOrderBy($table_name, 'reference_name', 'asc');

            $table_name = 'broker_table';
            $data['get_broker_data'] = $this->common_model->getData($table_name);
            
            
             $query_str = "select * from passport_makings where `fit_receive_receive_date`!=''";
            $result = $this->db->query($query_str);
            $data['get_fit_receive_data'] = $result->result();


            $query_str = "select * from passport_makings where `embassy_visa_stamping_status`='Complete'";
            $result = $this->db->query($query_str);
            $data['get_embassy_visa_stamping_data'] = $result->result();

            if ($insert_result):
                $this->session->set_userdata('msg_title', 'Success');
                $this->session->set_userdata('msg_body', 'Successfull');
            else:
                $this->session->set_userdata('msg_title', 'Error');
                $this->session->set_userdata('msg_body', 'Failed');
            endif;

            $this->load->view('common/header', $data);
            $this->load->view('dashboard/index', $data);
            $this->load->view('common/js', $data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');

        else:

            redirect('home');
        endif;
    }
	
	
	
	
	 public function editTicket() {


        if (in_array($this->session->userdata('role_id'), array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 14, 15, 16, 17))):
            $data['base_url'] = $this->config->item('base_url');


            $date = date('Y-m-d');

            $query_str = "select * from passport_makings where `basic_entry_date` Like '$date%' ";
            $result = $this->db->query($query_str);
            $data['passport'] = $result->num_rows();

            $query_str = "select * from passport_makings where `enzaz_mufa_number` != '' and `enzaz_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['enjaz'] = $result->num_rows();

            $query_str = "select * from passport_makings where `okala_status` = 'Receive' and `okala_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['okala'] = $result->num_rows();

            $query_str = "select * from passport_makings where  `fit_receive_receive_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['fitcard'] = $result->num_rows();

            $query_str = "select * from passport_makings where `embassy_visa_stamping_status` = 'Complete' and `embassy_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['embasy'] = $result->num_rows();


            $query_str = "select * from passport_makings where `basic_fingering` = 'Receive' and `fingering_receive_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['fingering'] = $result->num_rows();


            $query_str = "select * from passport_makings where `basic_receive_site` = 'Inside' and `basic_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['inside'] = $result->num_rows();


            $query_str = "select * from passport_makings where `basic_receive_site` = 'Outside' and `basic_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['outside'] = $result->num_rows();

			$query_str = "select * from passport_makings where `manpower_status` = 'Receive' and `manpower_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['manpower'] = $result->num_rows();
			
			$query_str = "select * from passport_makings where `basic_flight` = 'Complete' and `ticket_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['ticket'] = $result->num_rows();
			
			
			$query_str = "select * from passport_makings where `is_cancel` = 'true' and `musaned_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['cancel'] = $result->num_rows();
			
			
            $edit_id = mysql_real_escape_string($this->input->post('edit_id'));
            $edit_name = mysql_real_escape_string($this->input->post('edit_name'));
            $edit_passport_no = mysql_real_escape_string($this->input->post('edit_passport_no'));
			
            $edit_ticket_number= mysql_real_escape_string($this->input->post('edit_ticket_number'));
            $edit_ticket_location = mysql_real_escape_string($this->input->post('edit_ticket_location'));                                            
            $edit_ticket_date = mysql_real_escape_string($this->input->post('edit_ticket_date'));
            $edit_ticket_time = mysql_real_escape_string($this->input->post('edit_ticket_time'));			
			$edit_ticket_note = mysql_real_escape_string($this->input->post('edit_ticket_note'));                                            
            $edit_basic_flight = mysql_real_escape_string($this->input->post('edit_basic_flight'));
            
			
			
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
            if (!$this->upload->do_upload('edit_ticket_file')) :
                $error = $this->upload->display_errors();
                $data['upload_data'] = $error;
                $fileName = '';
                $data_embasy = array(
                    'ticket_number' => $edit_ticket_number,
                    'ticket_location' => $edit_ticket_location,
					'ticket_flying_date' => $edit_ticket_date, 
                    'ticket_flying_time' => $edit_ticket_time, 
                    'ticket_note' => $edit_ticket_note,
 					'basic_flight' => $edit_basic_flight,
                    'ticket_entry_date' => date('Y-m-d'),
                    'enzaz_health_fee' => date('Y-m-d H:i:s')
                );

            else:
                $upload_data = $this->upload->data();
                $data['upload_data'] = $upload_data;
                $fileName = $upload_data['file_name'];

                $data_embasy = array(
                    'ticket_file_upload' => $fileName,
                    'ticket_number' => $edit_ticket_number,
                    'ticket_location' => $edit_ticket_location,
					'ticket_flying_date' => $edit_ticket_date, 
                    'ticket_flying_time' => $edit_ticket_time, 
                    'ticket_note' => $edit_ticket_note,
 					'basic_flight' => $edit_basic_flight,
                    'ticket_entry_date' => date('Y-m-d'),
                    'enzaz_health_fee' => date('Y-m-d H:i:s')
                );



            endif;

            $table_name = 'passport_makings';
            $insert_result = $this->common_model->updateData($table_name, $data_embasy, "id", $edit_id);


            $data['passport_makings_data'] = $this->common_model->getDataWhere('passport_makings', 'passport_no', $edit_passport_no);

            $table_name = 'reference_table';
            $data['get_reference_data'] = $this->common_model->getDataOrderBy($table_name, 'reference_name', 'asc');

            $table_name = 'broker_table';
            $data['get_broker_data'] = $this->common_model->getData($table_name);
            
            
             $query_str = "select * from passport_makings where `fit_receive_receive_date`!=''";
            $result = $this->db->query($query_str);
            $data['get_fit_receive_data'] = $result->result();


            $query_str = "select * from passport_makings where `embassy_visa_stamping_status`='Complete'";
            $result = $this->db->query($query_str);
            $data['get_embassy_visa_stamping_data'] = $result->result();

            if ($insert_result):
                $this->session->set_userdata('msg_title', 'Success');
                $this->session->set_userdata('msg_body', 'Successfull');
            else:
                $this->session->set_userdata('msg_title', 'Error');
                $this->session->set_userdata('msg_body', 'Failed');
            endif;

            $this->load->view('common/header', $data);
            $this->load->view('dashboard/index', $data);
            $this->load->view('common/js', $data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');

        else:

            redirect('home');
        endif;
    }
	
	
	
	
	
	 public function editPassportCancel() {


        if (in_array($this->session->userdata('role_id'), array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 14, 15, 16, 17))):
            $data['base_url'] = $this->config->item('base_url');


            $date = date('Y-m-d');

            $query_str = "select * from passport_makings where `basic_entry_date` Like '$date%' ";
            $result = $this->db->query($query_str);
            $data['passport'] = $result->num_rows();

            $query_str = "select * from passport_makings where `enzaz_mufa_number` != '' and `enzaz_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['enjaz'] = $result->num_rows();

            $query_str = "select * from passport_makings where `okala_status` = 'Receive' and `okala_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['okala'] = $result->num_rows();

            $query_str = "select * from passport_makings where  `fit_receive_receive_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['fitcard'] = $result->num_rows();

            $query_str = "select * from passport_makings where `embassy_visa_stamping_status` = 'Complete' and `embassy_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['embasy'] = $result->num_rows();


            $query_str = "select * from passport_makings where `basic_fingering` = 'Receive' and `fingering_receive_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['fingering'] = $result->num_rows();


            $query_str = "select * from passport_makings where `basic_receive_site` = 'Inside' and `basic_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['inside'] = $result->num_rows();


            $query_str = "select * from passport_makings where `basic_receive_site` = 'Outside' and `basic_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['outside'] = $result->num_rows();

			$query_str = "select * from passport_makings where `manpower_status` = 'Receive' and `manpower_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['manpower'] = $result->num_rows();
			
			$query_str = "select * from passport_makings where `basic_flight` = 'Complete' and `ticket_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['ticket'] = $result->num_rows();
			
			$query_str = "select * from passport_makings where `is_cancel` = 'true' and `musaned_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['cancel'] = $result->num_rows();
			
			
			
            $edit_id = mysql_real_escape_string($this->input->post('edit_id'));
            $edit_name = mysql_real_escape_string($this->input->post('edit_name'));
            $edit_passport_no = mysql_real_escape_string($this->input->post('edit_passport_no'));
			
            $edit_is_cancel= mysql_real_escape_string($this->input->post('edit_is_cancel'));
           
            

                $data_embasy = array(
                    'is_cancel' => $edit_is_cancel, 
					'musaned_entry_date'=>date('Y-m-d'),
                    'enzaz_health_fee' => date('Y-m-d H:i:s')
                );



          

            $table_name = 'passport_makings';
            $insert_result = $this->common_model->updateData($table_name, $data_embasy, "id", $edit_id);


            $data['passport_makings_data'] = $this->common_model->getDataWhere('passport_makings', 'passport_no', $edit_passport_no);

            $table_name = 'reference_table';
            $data['get_reference_data'] = $this->common_model->getDataOrderBy($table_name, 'reference_name', 'asc');

            $table_name = 'broker_table';
            $data['get_broker_data'] = $this->common_model->getData($table_name);
            
            
             $query_str = "select * from passport_makings where `fit_receive_receive_date`!=''";
            $result = $this->db->query($query_str);
            $data['get_fit_receive_data'] = $result->result();


            $query_str = "select * from passport_makings where `embassy_visa_stamping_status`='Complete'";
            $result = $this->db->query($query_str);
            $data['get_embassy_visa_stamping_data'] = $result->result();

            if ($insert_result):
                $this->session->set_userdata('msg_title', 'Success');
                $this->session->set_userdata('msg_body', 'Successfull');
            else:
                $this->session->set_userdata('msg_title', 'Error');
                $this->session->set_userdata('msg_body', 'Failed');
            endif;

            $this->load->view('common/header', $data);
            $this->load->view('dashboard/index', $data);
            $this->load->view('common/js', $data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');

        else:

            redirect('home');
        endif;
    }
	
	
	
	

    public function editBasic() {


        if (in_array($this->session->userdata('role_id'), array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 14, 15, 16, 17))):
            $data['base_url'] = $this->config->item('base_url');


            $date = date('Y-m-d');

            $query_str = "select * from passport_makings where `basic_entry_date` Like '$date%' ";
            $result = $this->db->query($query_str);
            $data['passport'] = $result->num_rows();

            $query_str = "select * from passport_makings where `enzaz_mufa_number` != '' and `enzaz_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['enjaz'] = $result->num_rows();

            $query_str = "select * from passport_makings where `okala_status` = 'Receive' and `okala_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['okala'] = $result->num_rows();

            $query_str = "select * from passport_makings where  `fit_receive_receive_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['fitcard'] = $result->num_rows();

            $query_str = "select * from passport_makings where `embassy_visa_stamping_status` = 'Complete' and `embassy_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['embasy'] = $result->num_rows();


            $query_str = "select * from passport_makings where `basic_fingering` = 'Receive' and `fingering_receive_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['fingering'] = $result->num_rows();


            $query_str = "select * from passport_makings where `basic_receive_site` = 'Inside' and `basic_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['inside'] = $result->num_rows();


            $query_str = "select * from passport_makings where `basic_receive_site` = 'Outside' and `basic_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['outside'] = $result->num_rows();

            $query_str = "select * from passport_makings where `manpower_status` = 'Receive' and `manpower_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['manpower'] = $result->num_rows();

			$query_str = "select * from passport_makings where `basic_flight` = 'Complete' and `ticket_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['ticket'] = $result->num_rows();

			$query_str = "select * from passport_makings where `is_cancel` = 'true' and `musaned_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['cancel'] = $result->num_rows();
			
			
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
            $edit_basic_flight = mysql_real_escape_string($this->input->post('edit_basic_flight'));

            $edit_broker_mobile_number = mysql_real_escape_string($this->input->post('edit_broker_mobile_number'));
            $edit_reference_mobile_number = mysql_real_escape_string($this->input->post('edit_reference_mobile_number'));


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
                $fileName = '';


            else:
                $upload_data = $this->upload->data();
                $data['upload_data'] = $upload_data;
                $fileName = $upload_data['file_name'];
            endif;




            if ($fileName == '') {
                $data2 = array(
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
                    'basic_receive_site' => $edit_passport_side,
                    'basic_note' => $edit_description,
                    'basic_flight' => $edit_basic_flight,
                    'enzaz_health_fee' => date('Y-m-d H:i:s')
                );
            } else {
                $data2 = array(
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
                    'basic_receive_site' => $edit_passport_side,
                    'basic_note' => $edit_description,
                    'passport_preview' => $fileName,
                    'basic_flight' => $edit_basic_flight,
                    'enzaz_health_fee' => date('Y-m-d H:i:s')
                );
            }







            $table_name = 'passport_makings';
            $insert_result = $this->common_model->updateData($table_name, $data2, "id", $edit_id);

            $data3 = array(
                'reference_mobile' => $edit_reference_mobile_number
            );

            $table_name = 'reference_table';
            $insert_result = $this->common_model->updateData($table_name, $data3, "reference_name", $edit_reference_name);
            $data4 = array(
                'broker_mobile' => $edit_broker_mobile_number
            );
            $table_name = 'broker_table';
            $insert_result = $this->common_model->updateData($table_name, $data4, "broker_name", $edit_broker_name);




            $passport_no = mysql_real_escape_string(trim($this->input->post('edit_passport_no')));
            $data['passport_makings_data'] = $this->common_model->getDataWhere('passport_makings', 'passport_no', $passport_no);

            $table_name = 'reference_table';
            $data['get_reference_data'] = $this->common_model->getDataOrderBy($table_name, 'reference_name', 'asc');

            $table_name = 'broker_table';
            $data['get_broker_data'] = $this->common_model->getData($table_name);


             $query_str = "select * from passport_makings where `fit_receive_receive_date`!=''";
            $result = $this->db->query($query_str);
            $data['get_fit_receive_data'] = $result->result();


            $query_str = "select * from passport_makings where `embassy_visa_stamping_status`='Complete'";
            $result = $this->db->query($query_str);
            $data['get_embassy_visa_stamping_data'] = $result->result();
            
            
            

            if ($insert_result):
                $this->session->set_userdata('msg_title', 'Success');
                $this->session->set_userdata('msg_body', 'Successfull');
            else:
                $this->session->set_userdata('msg_title', 'Error');
                $this->session->set_userdata('msg_body', 'Failed');
            endif;

            $this->load->view('common/header', $data);
            $this->load->view('dashboard/index', $data);
            $this->load->view('common/js', $data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');
        else:

            redirect('home');
        endif;
    }

    public function searchSingle() {


        if (in_array($this->session->userdata('role_id'), array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17))):
            $data['base_url'] = $this->config->item('base_url');
            $data['active_menu'] = 'Dashboard';
            $data['active_sub_menu'] = 'Dashboard';



            $date = date('Y-m-d');

            $query_str = "select * from passport_makings where `basic_entry_date` Like '$date%' ";
            $result = $this->db->query($query_str);
            $data['passport'] = $result->num_rows();

            $query_str = "select * from passport_makings where `enzaz_mufa_number` != '' and `enzaz_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['enjaz'] = $result->num_rows();

            $query_str = "select * from passport_makings where `okala_status` = 'Receive' and `okala_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['okala'] = $result->num_rows();

            $query_str = "select * from passport_makings where  `fit_receive_receive_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['fitcard'] = $result->num_rows();

            $query_str = "select * from passport_makings where `embassy_visa_stamping_status` = 'Complete' and `embassy_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['embasy'] = $result->num_rows();


            $query_str = "select * from passport_makings where `basic_fingering` = 'Receive' and `fingering_receive_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['fingering'] = $result->num_rows();


            $query_str = "select * from passport_makings where `basic_receive_site` = 'Inside' and `basic_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['inside'] = $result->num_rows();


            $query_str = "select * from passport_makings where `basic_receive_site` = 'Outside' and `basic_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['outside'] = $result->num_rows();

			
			$query_str = "select * from passport_makings where `manpower_status` = 'Receive' and `manpower_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['manpower'] = $result->num_rows();
			
			$query_str = "select * from passport_makings where `basic_flight` = 'Complete' and `ticket_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['ticket'] = $result->num_rows();
			
			$query_str = "select * from passport_makings where `is_cancel` = 'true' and `musaned_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['cancel'] = $result->num_rows();
			
			
            $table_name = 'reference_table';
            $data['get_reference_data'] = $this->common_model->getDataOrderBy($table_name, 'reference_name', 'asc');

            $table_name = 'broker_table';
            $data['get_broker_data'] = $this->common_model->getData($table_name);



            $passport_no = mysql_real_escape_string(trim($this->input->post('passport_no')));
            $data['passport_makings_data'] = $this->common_model->getDataWhere('passport_makings', 'passport_no', $passport_no);
            $data['print_id'] = $passport_no;


            
             $query_str = "select * from passport_makings where `fit_receive_receive_date`!=''";
            $result = $this->db->query($query_str);
            $data['get_fit_receive_data'] = $result->result();


            $query_str = "select * from passport_makings where `embassy_visa_stamping_status`='Complete'";
            $result = $this->db->query($query_str);
            $data['get_embassy_visa_stamping_data'] = $result->result();
            
            

            $this->load->view('common/header', $data);
            $this->load->view('dashboard/index', $data);
            $this->load->view('common/js', $data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');

        else:
            redirect('home');
        endif;
    }

    public function searchSinglePassword($passport_no) {


        if (in_array($this->session->userdata('role_id'), array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17))):
            $data['base_url'] = $this->config->item('base_url');
            $data['active_menu'] = 'Dashboard';
            $data['active_sub_menu'] = 'Dashboard';



            $date = date('Y-m-d');

            $query_str = "select * from passport_makings where `basic_entry_date` Like '$date%' ";
            $result = $this->db->query($query_str);
            $data['passport'] = $result->num_rows();

            $query_str = "select * from passport_makings where `enzaz_mufa_number` != '' and `enzaz_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['enjaz'] = $result->num_rows();

            $query_str = "select * from passport_makings where `okala_status` = 'Receive' and `okala_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['okala'] = $result->num_rows();

            $query_str = "select * from passport_makings where  `fit_receive_receive_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['fitcard'] = $result->num_rows();

            $query_str = "select * from passport_makings where `embassy_visa_stamping_status` = 'Complete' and `embassy_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['embasy'] = $result->num_rows();


            $query_str = "select * from passport_makings where `basic_fingering` = 'Receive' and `fingering_receive_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['fingering'] = $result->num_rows();


            $query_str = "select * from passport_makings where `basic_receive_site` = 'Inside' and `basic_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['inside'] = $result->num_rows();


            $query_str = "select * from passport_makings where `basic_receive_site` = 'Outside' and `basic_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['outside'] = $result->num_rows();

			$query_str = "select * from passport_makings where `manpower_status` = 'Receive' and `manpower_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['manpower'] = $result->num_rows();
			
			$query_str = "select * from passport_makings where `basic_flight` = 'Complete' and `ticket_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['ticket'] = $result->num_rows();
			
			$query_str = "select * from passport_makings where `is_cancel` = 'true' and `musaned_entry_date` Like '$date%'  ";
            $result = $this->db->query($query_str);
            $data['cancel'] = $result->num_rows();
			
			
            $table_name = 'reference_table';
            $data['get_reference_data'] = $this->common_model->getDataOrderBy($table_name, 'reference_name', 'asc');

            $table_name = 'broker_table';
            $data['get_broker_data'] = $this->common_model->getData($table_name);




            $data['passport_makings_data'] = $this->common_model->getDataWhere('passport_makings', 'passport_no', $passport_no);

 $query_str = "select * from passport_makings where `fit_receive_receive_date`!=''";
            $result = $this->db->query($query_str);
            $data['get_fit_receive_data'] = $result->result();


            $query_str = "select * from passport_makings where `embassy_visa_stamping_status`='Complete'";
            $result = $this->db->query($query_str);
            $data['get_embassy_visa_stamping_data'] = $result->result();


            $this->load->view('common/header', $data);
            $this->load->view('dashboard/index', $data);
            $this->load->view('common/js', $data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');

        else:
            redirect('home');
        endif;
    }

    public function search() {


        if (in_array($this->session->userdata('role_id'), array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17))):
            $data['base_url'] = $this->config->item('base_url');
            $data['active_menu'] = 'Dashboard';
            $data['active_sub_menu'] = 'Dashboard';

            $date_from = $this->input->post('date_from');
            $date_to = $this->input->post('date_to');

            $query_str = "select * from passport_makings where   date(`basic_entry_date`) between '$date_from' and '$date_to' ";

            $result = $this->db->query($query_str);
            $data['passport'] = $result->num_rows();

            $query_str = "select * from passport_makings where `enzaz_mufa_number` != '' and  date(`enzaz_date`) between '$date_from' and '$date_to'  ";
            $result = $this->db->query($query_str);
            $data['enjaz'] = $result->num_rows();

            $query_str = "select * from passport_makings where `okala_status` = 'Receive' and  date(`okala_entry_date`) between '$date_from' and '$date_to'  ";
            $result = $this->db->query($query_str);
            $data['okala'] = $result->num_rows();

            $query_str = "select * from passport_makings where   date(`fit_receive_receive_date`) between '$date_from' and '$date_to'   ";
            $result = $this->db->query($query_str);
            $data['fitcard'] = $result->num_rows();

            $query_str = "select * from passport_makings where `embassy_visa_stamping_status` = 'Complete' and   date(`embassy_date`) between '$date_from' and '$date_to'   ";
            $result = $this->db->query($query_str);
            $data['embasy'] = $result->num_rows();


            $query_str = "select * from passport_makings where `basic_fingering` = 'Receive' and  date(`fingering_receive_date`) between '$date_from' and '$date_to'   ";
            $result = $this->db->query($query_str);
            $data['fingering'] = $result->num_rows();


            $query_str = "select * from passport_makings where `basic_receive_site` = 'Inside' and  date(`basic_entry_date`) between '$date_from' and '$date_to' ";
            $result = $this->db->query($query_str);
            $data['inside'] = $result->num_rows();


            $query_str = "select * from passport_makings where `basic_receive_site` = 'Outside' and  date(`basic_entry_date`) between '$date_from' and '$date_to'  ";
            $result = $this->db->query($query_str);
            $data['outside'] = $result->num_rows();

			
			$query_str = "select * from passport_makings where `manpower_status` = 'Receive' and date(`manpower_entry_date`) between '$date_from' and '$date_to'  ";
            $result = $this->db->query($query_str);
            $data['manpower'] = $result->num_rows();

			$query_str = "select * from passport_makings where `basic_flight` = 'Complete' and  date(`ticket_entry_date`) between '$date_from' and '$date_to'  ";
            $result = $this->db->query($query_str);
            $data['ticket'] = $result->num_rows();
			
			$query_str = "select * from passport_makings where `is_cancel` = 'true' and  date(`musaned_entry_date`) between '$date_from' and '$date_to'  ";
            $result = $this->db->query($query_str);
            $data['cancel'] = $result->num_rows();
			
			
            $table_name = 'reference_table';
            $data['get_reference_data'] = $this->common_model->getDataOrderBy($table_name, 'reference_name', 'asc');

            $table_name = 'broker_table';
            $data['get_broker_data'] = $this->common_model->getData($table_name);

            
             $query_str = "select * from passport_makings where `fit_receive_receive_date`!=''";
            $result = $this->db->query($query_str);
            $data['get_fit_receive_data'] = $result->result();


            $query_str = "select * from passport_makings where `embassy_visa_stamping_status`='Complete'";
            $result = $this->db->query($query_str);
            $data['get_embassy_visa_stamping_data'] = $result->result();

            $this->load->view('common/header', $data);
            $this->load->view('dashboard/index', $data);
            $this->load->view('common/js', $data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');

        else:
            redirect('home');
        endif;
    }

    public function print_dashboard_all_page() {
        if (in_array($this->session->userdata('role_id'), array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 14, 15, 16, 17))):
            $data['base_url'] = $this->config->item('base_url');

             $edit_id_print = $this->input->post('edit_id_print');



            $result = $this->db->query("select * from passport_makings where passport_no='$edit_id_print'");


            $data['print_data'] = $result->result();


            $this->load->view('view_dashboard_print_all/view_dashboard_print_all', $data);
        else:

            redirect('home');
        endif;
    }

}

?>
