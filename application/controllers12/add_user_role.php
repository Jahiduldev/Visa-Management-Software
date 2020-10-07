<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Add_User_Role extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('user_role_model');
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
            $data['active_menu'] = 'Administrator';
            $data['active_sub_menu'] = 'Add User Role';
            $table_name='user_role';
            $data['get_role_data'] = $this->user_role_model->getData($table_name);
            $this->load->view('common/header',$data);
            $this->load->view('add_user_role/add_user_role',$data);
            $this->load->view('common/footer',$data);
            $this->load->view('common/js',$data);
            $this->load->view('add_user_role/js_add_user_role',$data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');
        else:
            redirect('home');
        endif;
    }

    public function addUserRole() {
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
            $role_name = mysql_real_escape_string($this->input->post('role_name'));
            $relation_id=  date('Ymd').rand(100000,999999);
            $data = array(
                    'relation_id' => $relation_id,
                    'role_name' => $role_name,
                    'ack' => 2
            );
            $table_name='user_role';
            $insert_check = $this->common_model->insertData($table_name, $data);


            if($insert_check):
                $this->session->set_userdata('msg_title', 'Success');
                $this->session->set_userdata('msg_body','Successfull');
            else:
                $this->session->set_userdata('msg_title', 'Error');
                $this->session->set_userdata('msg_body','Failed' );
            endif;

            redirect('add_user_role');
        else:
            redirect('home');
        endif;
    }

    public function editRole() {
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
            $role_id = mysql_real_escape_string($this->input->post('edit_role_id'));
            $role_name = mysql_real_escape_string($this->input->post('edit_role_name'));
            $data = array(
                    'role_name' => $role_name,
					'ack' => 2
            );
            $table_name='user_role';
            $insert_result = $this->common_model->updateData($table_name, $data,"role_id",$role_id);

            if($insert_result):
                $this->session->set_userdata('msg_title', 'Success');
                $this->session->set_userdata('msg_body','Successfull');
            else:
                $this->session->set_userdata('msg_title', 'Error');
                $this->session->set_userdata('msg_body','Failed' );
            endif;
            redirect('add_user_role');
        else:
            redirect('home');
        endif;
    }
	public function deleteUserRole() {
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
            $delete_role_id = mysql_real_escape_string($this->input->post('delete_role_id'));


            $table_name='user_role';
            $column_name='role_id';
            $column_value=$delete_role_id;
            $insert_result = $this->common_model->deleteData($table_name,$column_name,$column_value);


            if($insert_result):
                $this->session->set_userdata('msg_title', 'Success');
                $this->session->set_userdata('msg_body','Successfull' );
            else:
                $this->session->set_userdata('msg_title', 'Error');
                $this->session->set_userdata('msg_body','Failed' );
            endif;
            redirect('add_user_role');
        else:
            redirect('home');
        endif;
    }
   
    public function getMenuData() {

        $data['base_url'] = $this->config->item('base_url');
        $role_id = mysql_real_escape_string($this->input->post('role_id'));

        $table_name='user_role';
        $result = $this->common_model->getDataWhere($table_name,"role_id",$role_id);
        echo json_encode($result);


    }
}
?>
