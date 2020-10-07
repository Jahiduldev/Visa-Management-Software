<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Salary_process extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('common_model');
    }

    public function index() {
        $per_role_arr = array();
        $url = $this->uri->segment(1);
        $table_name = 'subs_menu';
        $column_name = 'url';
        $column_value = $url;
        $get_url_data = $this->common_model->getDataWhere($table_name, $column_name, $column_value);
        foreach ($get_url_data as $row):
            $sub_menu_id = $row->sub_menu_id;
            $get_role_data = $this->common_model->getDataWhere('permission', 'sub_menu_id', $sub_menu_id);
            foreach ($get_role_data as $row2):
                $role_id = $row2->role_id;
                array_push($per_role_arr, $role_id);
            endforeach;
        endforeach;

        if (in_array($this->session->userdata('role_id'), $per_role_arr)):
            $data['base_url'] = $this->config->item('base_url');
            $data['active_menu'] = 'Pay Roll';
            $data['active_sub_menu'] = 'Salary Process';

            $this->load->view('common/header', $data);
            $this->load->view('salary_process/salary_process', $data);
            $this->load->view('common/footer', $data);
            $this->load->view('common/js', $data);
            $this->load->view('salary_process/js_salary_process', $data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');
        else:
            redirect('home');
        endif;
    }

    public function salaryProcess() {
        $per_role_arr = array();
        $url = $this->uri->segment(1);
        $table_name = 'subs_menu';
        $column_name = 'url';
        $column_value = $url;
        $get_url_data = $this->common_model->getDataWhere($table_name, $column_name, $column_value);
        foreach ($get_url_data as $row):
            $sub_menu_id = $row->sub_menu_id;
            $get_role_data = $this->common_model->getDataWhere('permission', 'sub_menu_id', $sub_menu_id);
            foreach ($get_role_data as $row2):
                $role_id = $row2->role_id;
                array_push($per_role_arr, $role_id);
            endforeach;
        endforeach;
        if (in_array($this->session->userdata('role_id'), $per_role_arr)):
            $data['base_url'] = $this->config->item('base_url');



            $date_from = mysql_real_escape_string($this->input->post('date_from'));
            $date_to = mysql_real_escape_string($this->input->post('date_to'));
            $data['date_from'] = $date_from;
            $data['date_to'] = $date_to;
            $table_name = 'employee';
            $data['get_employee_data'] = $this->common_model->getData($table_name, $data);


            $this->load->view('common/header', $data);
            $this->load->view('salary_process/salary_process', $data);
            $this->load->view('common/footer', $data);
            $this->load->view('common/js', $data);
            $this->load->view('salary_process/js_salary_process', $data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');
        else:
            redirect('home');
        endif;
    }

    public function salarySave() {
        $per_role_arr = array();
        $url = $this->uri->segment(1);
        $table_name = 'subs_menu';
        $column_name = 'url';
        $column_value = $url;
        $get_url_data = $this->common_model->getDataWhere($table_name, $column_name, $column_value);
        foreach ($get_url_data as $row):
            $sub_menu_id = $row->sub_menu_id;
            $get_role_data = $this->common_model->getDataWhere('permission', 'sub_menu_id', $sub_menu_id);
            foreach ($get_role_data as $row2):
                $role_id = $row2->role_id;
                array_push($per_role_arr, $role_id);
            endforeach;
        endforeach;
        if (in_array($this->session->userdata('role_id'), $per_role_arr)):
            $data['base_url'] = $this->config->item('base_url');

            $date_from = mysql_real_escape_string($this->input->post('date_from'));
            $date_to = mysql_real_escape_string($this->input->post('date_to'));
            $data['date_from'] = $date_from;
            $data['date_to'] = $date_to;
            $table_name = 'employee';
            $get_employee_data = $this->common_model->getData($table_name, $data);

            $date_all = explode("-", $date_to);
            $year = $date_all[0];
            $month = $date_all[1];
            $salary_month = $year . "-" . $month . "-28";
            foreach ($get_employee_data as $row) :
                $id = $row->id;
                $emp_id = $row->emp_id;
                $emp_name = $row->emp_name;
                $gross_salary = $row->gross_salary;


                $salary_add = "";
                $query_salary_add = $this->db->query("select * from employee_salary_add where emp_id='$id' and (`date` between '$date_from' and '$date_to')");
                $result_salary_add = $query_salary_add->result();
                foreach ($result_salary_add as $row_add):
                    $salary_add = $salary_add . "-" . $row_add->id;
                endforeach;


                $salary_deduct = "";
                $query_salary_deduct = $this->db->query("select * from employee_salary_deduct where emp_id='$id' and (`date` between '$date_from' and '$date_to')");
                $result_salary_deduct = $query_salary_deduct->result();
                foreach ($result_salary_deduct as $row_deduct):
                    $salary_deduct = $salary_deduct . "-" . $row_deduct->id;
                endforeach;

                $data = array(
                    'emp_id' => $id,
                    'gross_salary' => $gross_salary,
                    'salary_add' => ltrim($salary_add, '-'),
                    'salary_deduct' => ltrim($salary_deduct, '-'),
                    'salary_month' => $salary_month,
                    'process_date' => date("Y-m-d")
                );
                $table_name = 'salary_process';


                $salary_res = $this->common_model->getDataWhere2($table_name, 'emp_id', $id, 'salary_month', $salary_month);
                if (count($salary_res) > 0):
                else:
                    $insert_id = $this->common_model->insertDataGetId($table_name, $data);

                    $data2 = array(
                        'table_id' => $insert_id,
                        'table_type' => 1,
                        'transaction_type' => 2,
                        'date' => $salary_month,
                        'default_date' => date("Y-m-d")
                    );

                    $this->common_model->insertData('master_detail', $data2);
                endif;


            endforeach;

            $this->session->set_userdata('msg_title', 'Success');
            $this->session->set_userdata('msg_body', 'Successfull');
            redirect('salary_process');
        else:
            redirect('home');
        endif;
    }

    public function editMenu() {
        $per_role_arr = array();
        $url = $this->uri->segment(1);
        $table_name = 'subs_menu';
        $column_name = 'url';
        $column_value = $url;
        $get_url_data = $this->common_model->getDataWhere($table_name, $column_name, $column_value);
        foreach ($get_url_data as $row):
            $sub_menu_id = $row->sub_menu_id;
            $get_role_data = $this->common_model->getDataWhere('permission', 'sub_menu_id', $sub_menu_id);
            foreach ($get_role_data as $row2):
                $role_id = $row2->role_id;
                array_push($per_role_arr, $role_id);
            endforeach;
        endforeach;

        if (in_array($this->session->userdata('role_id'), $per_role_arr)):
            $data['base_url'] = $this->config->item('base_url');
            $id = mysql_real_escape_string($this->input->post('edit_type_id'));
            $type = mysql_real_escape_string($this->input->post('edit_type_name'));

            $data = array(
                'type' => $type,
                'date' => date('Y-m-d')
            );
            $table_name = 'salary_add_type';
            $insert_result = $this->common_model->updateData($table_name, $data, "id", $id);

            if ($insert_result):
                $this->session->set_userdata('msg_title', 'Success');
                $this->session->set_userdata('msg_body', 'Successfull');
            else:
                $this->session->set_userdata('msg_title', 'Error');
                $this->session->set_userdata('msg_body', 'Failed');
            endif;
            redirect('salary_add_type');
        else:
            redirect('home');
        endif;
    }

    public function getMenuData() {

        $data['base_url'] = $this->config->item('base_url');
        $id = mysql_real_escape_string($this->input->post('id'));

        $table_name = 'salary_add_type';
        $result = $this->common_model->getDataWhere($table_name, "id", $id);
        echo json_encode($result);
    }

    public function deleteMenu() {
        $per_role_arr = array();
        $url = $this->uri->segment(1);
        $table_name = 'subs_menu';
        $column_name = 'url';
        $column_value = $url;
        $get_url_data = $this->common_model->getDataWhere($table_name, $column_name, $column_value);
        foreach ($get_url_data as $row):
            $sub_menu_id = $row->sub_menu_id;
            $get_role_data = $this->common_model->getDataWhere('permission', 'sub_menu_id', $sub_menu_id);
            foreach ($get_role_data as $row2):
                $role_id = $row2->role_id;
                array_push($per_role_arr, $role_id);
            endforeach;
        endforeach;
        if (in_array($this->session->userdata('role_id'), $per_role_arr)):
            $data['base_url'] = $this->config->item('base_url');
            $delete_menu_id = mysql_real_escape_string($this->input->post('delete_menu_id'));


            $table_name = 'menu';
            $column_name = 'menu_id';
            $column_value = $delete_menu_id;
            $insert_result = $this->common_model->deleteData($table_name, $column_name, $column_value);


            if ($insert_result):
                $this->session->set_userdata('msg_title', 'Success');
                $this->session->set_userdata('msg_body', 'Successfull');
            else:
                $this->session->set_userdata('msg_title', 'Error');
                $this->session->set_userdata('msg_body', 'Failed');
            endif;
            redirect('add_menu');
        else:
            redirect('home');
        endif;
    }

}

?>
