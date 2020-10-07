<?php

class Indirect_expense extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('common_model');
    }

    public function index() {
        if (in_array($this->session->userdata('role_id'), array(1, 2))):
            $data['base_url'] = $this->config->item('base_url');
            $data['active_menu'] = 'Accounts';
            $data['active_sub_menu'] = 'Indirect Expense';


            $table_name = 'indirect_expense_type';
            $data['get_indirect_expense_type_data'] = $this->common_model->getData($table_name);
            $this->load->view('common/header', $data);
            $this->load->view('indirect_expense/indirect_expense', $data);
            $this->load->view('common/footer', $data);
            $this->load->view('common/js', $data);
            $this->load->view('indirect_expense/js_indirect_expense', $data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');
        else:
            redirect('home');
        endif;
    }

    public function addIndirectExpense() {
        if (in_array($this->session->userdata('role_id'), array(1, 2))):
            $data['base_url'] = $this->config->item('base_url');


            $expense_type = mysql_real_escape_string($this->input->post('expense_type'));
            $amount = mysql_real_escape_string($this->input->post('amount'));
            $note = mysql_real_escape_string($this->input->post('note'));
            $deduct_date = mysql_real_escape_string($this->input->post('deduct_date'));

            $data_company = array(
                'expense_type' => $expense_type,
                'amount' => $amount,
                'note' => $note,
                'date' => $deduct_date
            );


            $insert_result = $this->common_model->insertDataGetId('indirect_expense', $data_company);

            $data2 = array(
                'table_id' => $insert_result,
                'table_type' => 2,
                'transaction_type' => 2,
                 'date' => $deduct_date,
                'default_date' => date("Y-m-d")
            );

            $this->common_model->insertData('master_detail', $data2);
            
            if ($insert_result > 0):
                $this->session->set_userdata('msg_title', 'Success');
                $this->session->set_userdata('msg_body', 'Successfull');
            else:
                $this->session->set_userdata('msg_title', 'Error');
                $this->session->set_userdata('msg_body', 'Failed');
            endif;
            redirect('indirect_expense');
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
