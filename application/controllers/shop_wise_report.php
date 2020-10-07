<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Shop_wise_report extends CI_Controller {
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

            $data['active_menu'] = 'Report';
            $data['active_sub_menu'] = 'Credit Management';

            $table_name='user';
            $column_name='role_id';
            $column_value='3';
            $data['get_user_data'] = $this->common_model->getDataWhere($table_name,$column_name,$column_value);

            $role_id=  $this->session->userdata('role_id');
            if($role_id == 3):
                $data['select_user'] = $this->session->userdata('user_id');
            else:
                $data['select_user'] ='all';
            endif;

            $date = date('Y-m-d');
            $data['date_from'] = $date.' 00:00:00';
            $data['date_to'] = $date.' 23:59:59';
            // $data['date_from'] = $date;
            // $data['date_to'] = $date;

            $this->load->view('common/header',$data);
            $this->load->view('shop_wise_report/shop_wise_report',$data);
            $this->load->view('common/footer',$data);
            $this->load->view('common/js',$data);
            $this->load->view('shop_wise_report/js_shop_wise_report',$data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');
        else:
            redirect('home');
        endif;
    }

    public function getReport() {
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
            $data['active_menu'] = 'Report';
            $data['active_sub_menu'] = 'TopUp Report';

            $table_name='user';
            $column_name='role_id';
            $column_value='3';
            $data['get_user_data'] = $this->common_model->getDataWhere($table_name,$column_name,$column_value);

            $role_id=  $this->session->userdata('role_id');
            if($role_id == 3):
                $data['select_user'] = $this->session->userdata('user_id');
            else:
                $data['select_user'] = mysql_real_escape_string($this->input->post('user'));
            endif;

            $date_from=  mysql_real_escape_string($this->input->post('date_from'));
            $df_len= strlen($date_from);
            if($df_len == 10):
                $data['date_from'] = mysql_real_escape_string($this->input->post('date_from')).' 00:00:00';
            else:
                $data['date_from'] = mysql_real_escape_string($this->input->post('date_from'));

            endif;

            $date_to=  mysql_real_escape_string($this->input->post('date_to'));
            $dt_len= strlen($date_to);
            if($dt_len == 10):
                $data['date_to'] = mysql_real_escape_string($this->input->post('date_to')).' 23:59:59';
            else:
                $data['date_to'] = mysql_real_escape_string($this->input->post('date_to'));
            endif;

            $this->load->view('common/header',$data);
            $this->load->view('shop_wise_report/shop_wise_report',$data);
            $this->load->view('common/footer',$data);
            $this->load->view('common/js',$data);
            $this->load->view('shop_wise_report/js_shop_wise_report',$data);

        else:
            redirect('home');
        endif;
    }


   

}
?>
