<?php

class Add_employee extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('common_model');
    }

    public function index() {
        if (in_array($this->session->userdata('role_id'), array(1, 2))):
            $data['base_url'] = $this->config->item('base_url');
            $data['active_menu'] = 'HR';
            $data['active_sub_menu'] = 'Add Employee';

           
            $table_name = 'status';
            $data['get_status_data'] = $this->common_model->getData($table_name);
            $this->load->view('common/header', $data);
            $this->load->view('add_employee/add_employee', $data);
            $this->load->view('common/footer', $data);
            $this->load->view('common/js', $data);
            $this->load->view('add_employee/js_add_employee', $data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');
        else:
            redirect('home');
        endif;
    }

    public function addEmployeeData() {
        if (in_array($this->session->userdata('role_id'), array(1, 2))):
            $data['base_url'] = $this->config->item('base_url');
            date_default_timezone_set("Asia/Kuala_Lumpur");

            $emp_id = mysql_real_escape_string($this->input->post('employee_id'));
            $emp_name = mysql_real_escape_string($this->input->post('employee_name'));
            $date_birth = mysql_real_escape_string($this->input->post('date_birth'));
            

            $department = mysql_real_escape_string($this->input->post('department'));
            $designation = mysql_real_escape_string($this->input->post('designation'));
            $gross_salary = mysql_real_escape_string($this->input->post('gross_salary'));
            $reporting_to = mysql_real_escape_string($this->input->post('reporting_to'));

            $appointed_date = mysql_real_escape_string($this->input->post('appointed_date'));
            $joining_date = mysql_real_escape_string($this->input->post('joining_date'));
            $prohibition_period = mysql_real_escape_string($this->input->post('prohibition_period'));
            $user_name = mysql_real_escape_string($this->input->post('user_name'));

            $password = mysql_real_escape_string($this->input->post('password'));
            $gender = mysql_real_escape_string($this->input->post('gender'));
            $marital_status = mysql_real_escape_string($this->input->post('marital_status'));
            $religion = mysql_real_escape_string($this->input->post('religion'));


            $mobile_number = mysql_real_escape_string($this->input->post('mobile_number'));
            $email = mysql_real_escape_string($this->input->post('email'));
            $father_name = mysql_real_escape_string($this->input->post('father_name'));
            $mother_name = mysql_real_escape_string($this->input->post('mother_name'));

            $emergency_contact = mysql_real_escape_string($this->input->post('emergency_contact'));
            $present_address = mysql_real_escape_string($this->input->post('present_address'));
            $permanent_address = mysql_real_escape_string($this->input->post('permanent_address'));
            $status = mysql_real_escape_string($this->input->post('status'));

            $date = date('Y-m-d');

            $config['overwrite'] = false;
            $config['upload_path'] = './public/uploads/employee';
            $config['allowed_types'] = 'gif|jpg|png';   //'gif|jpg|png|mp4|ogg|webm|mov|mpeg|avi';
            $config['max_size'] = '60000';
            $config['max_width'] = '';
            $config['max_height'] = '';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('photo')) :
                $error = $this->upload->display_errors();
                $data['upload_data'] = $error;
                $photo = '';
            else:
                $upload_data = $this->upload->data();
                $data['upload_data'] = $upload_data;
                $photo = $upload_data['file_name'];

                $config['image_library'] = 'gd2';
                $config['source_image'] = './public/uploads/employee/' . $photo;
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['width'] = 1024;
                $config['height'] = 768;

                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

            endif;



            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('signature')) :
                $error = $this->upload->display_errors();
                $data['upload_data'] = $error;
                $signature = '';
            else:
                $upload_data = $this->upload->data();
                $data['upload_data'] = $upload_data;
                $signature = $upload_data['file_name'];

                $config['image_library'] = 'gd2';
                $config['source_image'] = './public/uploads/employee/' . $signature;
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['width'] = 1024;
                $config['height'] = 768;

                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

            endif;



            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('cv')) :
                $error = $this->upload->display_errors();
               $data['upload_data'] = $error;
              
                $cv = '';
            else:
                $upload_data = $this->upload->data();
                $data['upload_data'] = $upload_data;
                $cv = $upload_data['file_name'];

                $config['image_library'] = 'gd2';
                $config['source_image'] = './public/uploads/employee/' . $cv;
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['width'] = 1024;
                $config['height'] = 768;

                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

            endif;




            $data_company = array(
                'emp_id' => $emp_id,
                'emp_name' => $emp_name,
                'date_birth' => $date_birth,              
                'department' => $department,
                'designation' => $designation,
                'gross_salary' => $gross_salary,
                'reporting_to' => $reporting_to,
                'appointed_date' => $appointed_date,
                'joining_date' => $joining_date,
                'prohibition_period' => $prohibition_period,
                'user_name' => $user_name,
                'password' => base64_encode(trim($password)),
                'gender' => $gender,
                'marital_status' => $marital_status,
                'religion' => $religion,
                'mobile_number' => $mobile_number,
                'email' => $email,
                'father_name' => $father_name,
                'mother_name' => $mother_name,
                'emergency_contact' => $emergency_contact,
                'photo_upload' => $photo,
                'signature_upload' => $signature,
                'present_address' => $present_address,
                'permanent_address' => $permanent_address,
                'cv_upload' => $cv,
                'date' => $date
            );


            $insert_last_id = $this->common_model->insertDataGetId('employee', $data_company);

            $data_user = array(
                'role_id' => 14,
                'relation_id' => $insert_last_id,
                'name' => $emp_name,
                'user_name' => $user_name,
                'password' => base64_encode(trim($password)),
                'phone' => $mobile_number,
                'email' => $email,
                'status' => $status,
                'date_time' => date('Y-m-d H:i:s')
            );

            $insert_result = $this->common_model->insertData('user', $data_user);


            if ($insert_result > 0):
                $this->session->set_userdata('msg_title', 'Success');
                $this->session->set_userdata('msg_body', 'Successfull');
            else:
                $this->session->set_userdata('msg_title', 'Error');
                $this->session->set_userdata('msg_body', 'Failed');
            endif;
            redirect('add_employee');
        else:
            redirect('home');
        endif;
    }

    public function getEmpCode() {

        $queryMenu = $this->db->query("SELECT * FROM employee ORDER BY ID DESC LIMIT 1");
        $result = $queryMenu->result();
        if (count($result) > 0):
            foreach ($result as $rowmenu):
                echo $emp_code = $rowmenu->emp_code;
            endforeach;
        else:
            echo "";
        endif;
    }

    public function getDepartment() {

        $data['base_url'] = $this->config->item('base_url');
        $com_id = mysql_real_escape_string($this->input->post('com_id'));

        $table_name = 'department';
        $result = $this->common_model->getDataWhere($table_name, "company_id", $com_id);
        echo '<option value="">Select Department</option>';
        if (count($result) > 0) {
            foreach ($result as $row):
                ?>
                <option value="<?= $row->id; ?>"><?= $row->department_name; ?></option>
                <?php
            endforeach;
        }
    }

    public function getDesignation() {

        $data['base_url'] = $this->config->item('base_url');
        $depart_id = mysql_real_escape_string($this->input->post('depart_id'));

        $table_name = 'designation';
        $result = $this->common_model->getDataWhere($table_name, "department_id", $depart_id);
        echo '<option value="">Select Designation</option>';
        if (count($result) > 0) {
            foreach ($result as $row):
                ?>
                <option value="<?= $row->id; ?>"><?= $row->designation; ?></option>
                <?php
            endforeach;
        }
    }

}
?>
