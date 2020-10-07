<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class View_credit_management extends CI_Controller {
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

        if (in_array($this->session->userdata('role_id'), $per_role_arr)):
            $data['base_url'] = $this->config->item('base_url');
            $data['active_menu'] = 'Operation';
            $data['active_sub_menu'] = 'View Credit Management';

            $this->load->view('common/header_ssp',$data);
            $this->load->view('view_credit_management/view_credit_management',$data);
            $this->load->view('common/footer',$data);
            $this->load->view('common/js_ssp',$data);
            $this->load->view('view_credit_management/js_view_credit_management',$data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');
        else:
            redirect('home');
        endif;
    }


    public function getTableData() {


        $table = 'credit_management';
        $primaryKey = 'id';
        $columns = array(
                array('db' => '`u`.`user_name`', 'dt' => 0,'field' =>'user_name'),
                array('db' => '`c`.`amount`', 'dt' => 1,'field' =>'amount'),
                array('db' => '`c`.`joining_date`', 'dt' => 2,'field' =>'joining_date'),
                array('db' => '`c`.`id`', 'dt' => 3,'field' =>'id','formatter' => function ($rowvalue, $row) {
                            return '<a  href="'. site_url("view_credit_management/editCreditManagement/".$rowvalue).'">
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
        $joinQuery = "FROM `{$table}` AS `c`  JOIN `user` AS `u` ON (`c`.`user_id` = `u`.`user_id`)";
        //$extraCondition = "`id_client`=".$ID_CLIENT_VALUE;

        echo json_encode(
        SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns,$joinQuery)
        );


    }


    public function editCreditManagement() {

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
            $data['active_menu'] = 'Operation';
            $data['active_sub_menu'] = 'View Credit Management';
            $id = $this->uri->segment(3);

            $table_name1='credit_management';
            $table_name2='user';
            $column_name1='user_id';
            $column_name2='user_id';
            $column_name3='id';
            $column_value=$id;
            $data['get_credit_management_data'] = $this->common_model->joinDataWhere($table_name1,$table_name2,$column_name1,$column_name2, $column_name3, $column_value);

            $table_name='user';
            $column_name='role_id';
            $column_value='3';
            $data['get_user_data'] = $this->common_model->getDataWhere($table_name,$column_name,$column_value);

            $table_name='status';
            $data['get_status_data'] = $this->common_model->getData($table_name);
            $this->load->view('common/header',$data);
            $this->load->view('edit_credit_management/edit_credit_management',$data);
            $this->load->view('common/footer',$data);
            $this->load->view('common/js',$data);
            $this->load->view('edit_credit_management/js_credit_management',$data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');

        else:
            redirect('home');
        endif;
    }

    public function editCreditManagementData() {

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
            date_default_timezone_set("Asia/Dhaka");
             $edit_id = mysql_real_escape_string($this->input->post('edit_id'));
            $user = mysql_real_escape_string($this->input->post('user'));
            $amount = mysql_real_escape_string($this->input->post('amount'));
            $date_join = mysql_real_escape_string($this->input->post('date_join'));
         //   $status = mysql_real_escape_string($this->input->post('status'));
            $date_time = date('Y-m-d H:i:s');



            $data = array(
                    'user_id' => $user,
                    'amount' => $amount,
                    'joining_date' => $date_join,
                    'ack' => 2					
            );


            $insert_result=   $this->common_model->updateData('credit_management',$data,'id',$edit_id);

            if($insert_result):
                $this->session->set_userdata('msg_title', 'Success');
                $this->session->set_userdata('msg_body','Successfull' );

            else:
                $this->session->set_userdata('msg_title', 'Error');
                $this->session->set_userdata('msg_body','Failed' );
            endif;
            redirect('view_credit_management');
        else:
            redirect('home');
        endif;
    }


}
?>
