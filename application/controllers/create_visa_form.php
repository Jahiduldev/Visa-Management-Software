<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Create_visa_form extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('common_model');
    }

    public function index() {

        if (in_array($this->session->userdata('role_id'), array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17))):
            $data['base_url'] = $this->config->item('base_url');
            $data['active_menu'] = 'Visa Form';
            $data['active_sub_menu'] = 'Create Visa Form';


            $this->load->view('common/header', $data);
            $this->load->view('create_visa_form/create_visa_form', $data);
            $this->load->view('common/footer', $data);
            $this->load->view('common/js', $data);
            $this->load->view('create_visa_form/js_create_visa_form', $data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');
        else:
            redirect('home');
        endif;
    }

    public function addVisaApp() {

        if (in_array($this->session->userdata('role_id'), array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17))):
            $data['base_url'] = $this->config->item('base_url');
            $add_full_name = mysql_real_escape_string($this->input->post('add_full_name'));
            $add_mothers_name = mysql_real_escape_string($this->input->post('add_mothers_name'));
            $add_date_birth = mysql_real_escape_string($this->input->post('add_date_birth'));
            $add_place = mysql_real_escape_string($this->input->post('add_place'));            
            $add_profession = mysql_real_escape_string($this->input->post('add_profession'));
            $add_passport_issue_date = mysql_real_escape_string($this->input->post('add_passport_issue_date'));
            $add_passport_expiry_date = mysql_real_escape_string($this->input->post('add_passport_expiry_date'));
            $add_passport_no = mysql_real_escape_string($this->input->post('add_passport_no'));
            $add_saudi_emp_name_eng = mysql_real_escape_string($this->input->post('add_saudi_emp_name_eng'));
            $add_visa_no_eng= mysql_real_escape_string($this->input->post('add_visa_no_eng'));
            $add_visa_no_ara = mysql_real_escape_string($this->input->post('add_visa_no_ara'));
            $add_visa_date_eng= mysql_real_escape_string($this->input->post('add_visa_date_eng'));
            $add_visa_date_ara = mysql_real_escape_string($this->input->post('add_visa_date_ara'));
            $add_authorization_no= mysql_real_escape_string($this->input->post('add_authorization_no'));
            $add_visit_work_for = mysql_real_escape_string($this->input->post('add_visit_work_for'));



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


            date_default_timezone_set("Asia/Dhaka");
            $date_time = date('Y-m-d H:i:s');
            $data = array(
                'full_name_eng' => $add_full_name,
                'mother_name' => $add_mothers_name,
                'date_of_birth' => $add_date_birth,
                'place_of_birth' => $add_place,
                'saudi_emp_name_eng' => $add_saudi_emp_name_eng,
                'visa_no_eng' => $add_visa_no_eng,
                'visa_no_ara' => $add_visa_no_ara,
                'visa_date_eng' => $add_visa_date_eng,
                'visa_date_ara' => $add_visa_date_ara,
                'authorization' => $add_authorization_no,
                'visit_work_for' => $add_visit_work_for,
                'pas_no_eng' => $add_passport_no,
                'prof_eng' => $add_profession,
                'date_passport_issue' => $add_passport_issue_date,
                'date_passport_exp' => $add_passport_expiry_date,
            );

            $table_name = 'emp_info';
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

}

?>
