<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reference_payment extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('common_model');
    }

    public function index() {

        if (in_array($this->session->userdata('role_id'), array(1,2,3,4,5,6,7,8,9,10,12))):
            $data['base_url'] = $this->config->item('base_url');
            $data['active_menu'] = 'Accounts';
            $data['active_sub_menu'] = 'Reference Payment';

            $table_name = 'reference_table';
            $data['reference_data'] = $this->common_model->getData($table_name);

            $this->load->view('common/header', $data);
            $this->load->view('reference_payment/reference_payment', $data);
            $this->load->view('common/footer', $data);
            $this->load->view('common/js', $data);
            $this->load->view('reference_payment/js_reference_payment', $data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');
        else:
            redirect('home');
        endif;
    }

    public function addPayment() {


        if (in_array($this->session->userdata('role_id'), array(1, 2, 3,4,5,6,7,8,9,10))):
            $data['base_url'] = $this->config->item('base_url');


            $reference_id = mysql_real_escape_string($this->input->post('reference_name'));
            $payment_type = mysql_real_escape_string($this->input->post('payment_type'));
            $payment_amount= mysql_real_escape_string($this->input->post('payment_amount'));
            $note= mysql_real_escape_string($this->input->post('note'));

            if($payment_type=='Payment'):
                $data = array(
                        'reference_id' =>$reference_id,
                        'payment' =>  $payment_amount,
                        'note' =>  $note,
                        'date_time' => date('Y-m-d H:i:s')
                );
            else:
                $data = array(
                        'reference_id' =>$reference_id,
                        'due' =>  $payment_amount,
                        'note' =>  $note,
                        'date_time' => date('Y-m-d H:i:s')

                );
            endif;

            $table_name = 'reference_payment';
            $insert_result = $this->common_model->insertData($table_name, $data);


            $result2=$this->db->query("select reference_id,sum(`payment`) as`payment`,sum(`due`) as`due`  from reference_payment where reference_id='$reference_id'");
            if($result2->num_rows>0):
                foreach($result2->result() as $row2):
                    $reference_id=  $row2->reference_id;
                    $payment=  $row2->payment;
                    $due= $row2->due;


                    $data = array(
                            'payment' =>  $payment,
                            'due' => $due

                    );
                    $table_name = 'reference_table';
                    $insert_result = $this->common_model->updateData($table_name, $data,'id',$reference_id);
                endforeach;
            endif;

            if ($insert_result):
                $this->session->set_userdata('msg_title', 'Success');
                $this->session->set_userdata('msg_body', 'Successfull');
            else:
                $this->session->set_userdata('msg_title', 'Error');
                $this->session->set_userdata('msg_body', 'Failed');
            endif;
            redirect('reference_payment');
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

    public function getDetails($passport_no) {
        if (in_array($this->session->userdata('role_id'), array(1,2,3,4,5,6,7,8,9,10))):
            $data['base_url'] = $this->config->item('base_url');
            $data['active_menu'] = 'Accounts';
            $data['active_sub_menu'] = 'Passport Payment';

            $table_name = 'passport_makings';
            $data['passport_amount_data']  = $this->common_model->getDataWhere($table_name, "passport_no", $passport_no);

            $table_name = 'passport_payment';
            $data['passport_detail_data']  = $this->common_model->getDataWhere($table_name, "passport_no", $passport_no);


            $this->load->view('common/header', $data);
            $this->load->view('payment_detail/payment_detail', $data);
            $this->load->view('common/footer', $data);
            $this->load->view('common/js', $data);
            $this->load->view('payment_detail/js_payment_detail', $data);

        else:
            redirect('home');
        endif;
    }




}

?>
