<?php

class Indirect_income extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('common_model');
    }

    public function index() {
        if (in_array($this->session->userdata('role_id'), array(1, 2))):
            $data['base_url'] = $this->config->item('base_url');
            $data['active_menu'] = 'Accounts';
            $data['active_sub_menu'] = 'Indirect Income';


            $table_name = 'indirect_income_type';
            $data['get_indirect_income_type_data'] = $this->common_model->getData($table_name);
            $this->load->view('common/header', $data);
            $this->load->view('indirect_income/indirect_income', $data);
            $this->load->view('common/footer', $data);
            $this->load->view('common/js', $data);
            $this->load->view('indirect_income/js_indirect_income', $data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');
        else:
            redirect('home');
        endif;
    }

    public function addIndirectIncome() {
        if (in_array($this->session->userdata('role_id'), array(1, 2))):
            $data['base_url'] = $this->config->item('base_url');


            $income_type = mysql_real_escape_string($this->input->post('income_type'));
            $amount = mysql_real_escape_string($this->input->post('amount'));
            $note = mysql_real_escape_string($this->input->post('note'));
            $deduct_date = mysql_real_escape_string($this->input->post('deduct_date'));

            $data_company = array(
                'income_type' => $income_type,
                'amount' => $amount,
                'note' => $note,
                'date' => $deduct_date
            );


            $insert_result = $this->common_model->insertDataGetId('indirect_income', $data_company);

            $data2 = array(
                'table_id' => $insert_result,
                'table_type' => 3,
                'transaction_type' => 1,
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
            redirect('indirect_income');
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
