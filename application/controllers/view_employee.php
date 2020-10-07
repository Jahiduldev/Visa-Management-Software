<?php

class View_employee extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('common_model');
    }

    public function index() {
        if (in_array($this->session->userdata('role_id'), array(1, 2))):
            $data['base_url'] = $this->config->item('base_url');
            $data['active_menu'] = 'HR';
            $data['active_sub_menu'] = 'View Employee';

            $this->load->view('common/header_ssp', $data);
            $this->load->view('view_employee/view_employee', $data);
            $this->load->view('common/footer', $data);
            $this->load->view('common/js_ssp', $data);
            $this->load->view('view_employee/js_view_employee', $data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');
        else:
            redirect('home');
        endif;
    }

    public function getTableData() {


        $table = 'employee';
        $primaryKey = 'id';
        $columns = array(
            array('db' => 'emp_id', 'dt' => 0),
            array('db' => 'emp_name', 'dt' => 1),
            
            array('db' => 'department', 'dt' => 2),
            array('db' => 'designation', 'dt' => 3),
            array('db' => 'mobile_number', 'dt' => 4),
            array('db' => 'id', 'dt' => 5, 'formatter' => function ($rowvalue, $row) {
                    return '<a  href="' . site_url("view_employee/editEmployee/" . $rowvalue) . '">
      <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>';
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
        echo json_encode(
                SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
        );
    }

    public function editEmployee() {
        if (in_array($this->session->userdata('role_id'), array(1, 2, 3))):
            $data['base_url'] = $this->config->item('base_url');
            $data['active_menu'] = 'Corporate Profile';
            $data['active_sub_menu'] = 'View Employee';
            $id = $this->uri->segment(3);
            $res = $this->db->query("select * from employee where id=$id");
            $data['get_employee_data'] = $res->result();
            $table_name = 'status';
            $data['get_status_data'] = $this->common_model->getData($table_name);
           
            $this->load->view('common/header', $data);
            $this->load->view('edit_employee/edit_employee', $data);
            $this->load->view('common/footer', $data);
            $this->load->view('edit_employee/js_edit_employee', $data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');

        else:
            redirect('home');
        endif;
    }

    public function editEmployeeData() {

        if (in_array($this->session->userdata('role_id'), array(1, 2, 3))):
            $data['base_url'] = $this->config->item('base_url');
            $id = mysql_real_escape_string($this->input->post('id'));
            $emp_name = mysql_real_escape_string($this->input->post('emp_name'));         
            $date_join = mysql_real_escape_string($this->input->post('date_join'));
            $phone = mysql_real_escape_string($this->input->post('phone'));
            $email = mysql_real_escape_string($this->input->post('email'));
            
           
          
            $date = date('Y-m-d');



            $config['overwrite'] = false;
            $config['upload_path'] = './public/uploads/employee';
            $config['allowed_types'] = 'gif|jpg|png';   //'gif|jpg|png|mp4|ogg|webm|mov|mpeg|avi';
            $config['max_size'] = '60000';
            $config['max_width'] = '';
            $config['max_height'] = '';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            $data['upload_data'] = '';

            if (!$this->upload->do_upload('userfile')) :
                $error = $this->upload->display_errors();
                $data['upload_data'] = $error;
                $fileName = '';
                $data1 = array(
                    'emp_name' => $emp_name,                  
                    'joining_date' => $date_join,
                   
                    'mobile_number' => $phone,
                    'email' => $email,                                  
                    'date' => $date
                );
            else:
                $upload_data = $this->upload->data();
                $data['upload_data'] = $upload_data;
                
                $fileName = $upload_data['file_name'];
                $data1 = array(
                    'emp_name' => $emp_name,                   
                    'joining_date' => $date_join,
                   
                    'mobile_number' => $phone,
                    'email' => $email,
                    'photo_upload' => $fileName,               
                    'date' => $date
                );
            endif;


            $table_name = 'employee';
            $insert_result_id = $this->common_model->updateData($table_name, $data1, 'id', $id);

            if ($insert_result_id > 0):

                $this->session->set_userdata('msg_title', 'Success');
                $this->session->set_userdata('msg_body', 'Successfull');
            else:
                $this->session->set_userdata('msg_title', 'Error');
                $this->session->set_userdata('msg_body', 'Failed');
            endif;
            redirect('view_employee');
        else:
            redirect('home');
        endif;
    }

}

?>
