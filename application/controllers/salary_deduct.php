<?php

class Salary_deduct extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('common_model');
    }

    public function index() {
        if (in_array($this->session->userdata('role_id'), array(1, 2))):
            $data['base_url'] = $this->config->item('base_url');
            $data['active_menu'] = 'Pay Roll';
            $data['active_sub_menu'] = 'Salary Deduct';


            $table_name = 'salary_deduct_type';
            $data['get_salary_deduct_type_data'] = $this->common_model->getData($table_name);
            $this->load->view('common/header', $data);
            $this->load->view('salary_deduct/salary_deduct', $data);
            $this->load->view('common/footer', $data);
            $this->load->view('common/js', $data);
            $this->load->view('salary_deduct/js_salary_deduct', $data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');
        else:
            redirect('home');
        endif;
    }

    public function addSalaryDeduct() {
        if (in_array($this->session->userdata('role_id'), array(1, 2))):
            $data['base_url'] = $this->config->item('base_url');

            $emp_id = mysql_real_escape_string($this->input->post('id'));
            $deduct_type = mysql_real_escape_string($this->input->post('deduct_type'));          
            $amount = mysql_real_escape_string($this->input->post('amount'));
            $note = mysql_real_escape_string($this->input->post('note'));
            $deduct_date = mysql_real_escape_string($this->input->post('deduct_date'));

            $data_company = array(
                'emp_id' => $emp_id,
                'deduct_type' => $deduct_type,
                'amount' => $amount,
                'note' => $note,              
                'date' => $deduct_date
            );


            $insert_result = $this->common_model->insertData('employee_salary_deduct', $data_company);


            if ($insert_result > 0):
                $this->session->set_userdata('msg_title', 'Success');
                $this->session->set_userdata('msg_body', 'Successfull');
            else:
                $this->session->set_userdata('msg_title', 'Error');
                $this->session->set_userdata('msg_body', 'Failed');
            endif;
            redirect('salary_deduct');
        else:
            redirect('home');
        endif;
    }

    public function getEmployeeInfo() {

        $data['base_url'] = $this->config->item('base_url');
        $emp_id = mysql_real_escape_string($this->input->post('emp_id'));

        $table_name = 'employee';
        $result = $this->common_model->getDataWhere($table_name, "emp_id", $emp_id);
        if (count($result) > 0):
            echo json_encode($result);
        else:
            echo "not matched";
        endif;
    }

}

?>
