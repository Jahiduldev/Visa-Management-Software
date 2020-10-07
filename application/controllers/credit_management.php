<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Credit_management extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('common_model');
    }

    public function index() {
        $per_role_arr=array();
        $url = $this->uri->segment(1);
        $table_name='subs_menu';
        $column_name='url';
        $column_value=$url;
        $get_url_data= $this->common_model->getDataWhere($table_name,$column_name,$column_value);
        foreach($get_url_data as $row):
            $sub_menu_id=$row->sub_menu_id;
            $get_role_data= $this->common_model->getDataWhere('permission','sub_menu_id',$sub_menu_id);
            foreach( $get_role_data as $row2):
                $role_id=$row2->role_id;
                array_push($per_role_arr,$role_id);
            endforeach;
        endforeach;

        if (in_array($this->session->userdata('role_id'),$per_role_arr)):
            $data['base_url'] = $this->config->item('base_url');
            $data['active_menu'] = 'Operation';
            $data['active_sub_menu'] = 'Credit Management';

            $table_name='status';
            $data['get_status_data'] = $this->common_model->getData($table_name);
            $table_name='user';
            $column_name='role_id';
            $column_value='3';
            $data['get_user_data'] = $this->common_model->getDataWhere($table_name,$column_name,$column_value);
            $this->load->view('common/header',$data);
            $this->load->view('credit_management/credit_management',$data);
            $this->load->view('common/footer',$data);
            $this->load->view('common/js',$data);
            $this->load->view('credit_management/js_credit_management',$data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');
        else:
            redirect('home');
        endif;
    }

    public function addCreditData() {
        $per_role_arr=array();
        $url = $this->uri->segment(1);
        $table_name='subs_menu';
        $column_name='url';
        $column_value=$url;
        $get_url_data= $this->common_model->getDataWhere($table_name,$column_name,$column_value);
        foreach($get_url_data as $row):
            $sub_menu_id=$row->sub_menu_id;
            $get_role_data= $this->common_model->getDataWhere('permission','sub_menu_id',$sub_menu_id);
            foreach( $get_role_data as $row2):
                $role_id=$row2->role_id;
                array_push($per_role_arr,$role_id);
            endforeach;
        endforeach;


        if (in_array($this->session->userdata('role_id'), $per_role_arr)):
            $data['base_url'] = $this->config->item('base_url');
            // date_default_timezone_set("Asia/Kuala_Lumpur");
            date_default_timezone_set("Asia/Dhaka");
            $user = mysql_real_escape_string($this->input->post('user'));
            $amount = mysql_real_escape_string($this->input->post('amount'));
            $date_join = mysql_real_escape_string($this->input->post('date_join'));
            //$status = mysql_real_escape_string($this->input->post('status'));
            $date_time = date('Y-m-d H:i:s');


            $relation_id=  date('Ymd').rand(100000,999999);
            $data = array(
                    'relation_id' => $relation_id,
                    'user_id' => $user,
                    'amount' => $amount,
                    'joining_date' => $date_join,
                    'status' => 1,
                    'ack' => 1,
                    'date_time' => $date_time,
                    'ack' => 2
            );


            $insert_result=   $this->common_model->insertData('credit_management',$data);





            if($insert_result):
                $this->session->set_userdata('msg_title', 'Success');
                $this->session->set_userdata('msg_body','Successfull' );

            else:
                $this->session->set_userdata('msg_title', 'Error');
                $this->session->set_userdata('msg_body','Failed' );
            endif;
            redirect('credit_management');
        else:
            redirect('home');
        endif;
    }





}
?>
