<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Add_User extends CI_Controller {
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
            $data['active_menu'] = 'Administrator';
            $data['active_sub_menu'] = 'Add User';
            $table_name='user_role';
            $data['get_role_data'] = $this->common_model->getData($table_name);
            $table_name='user';
            $data['get_user_data'] = $this->common_model->getData($table_name);
            $table_name='status';
            $data['get_status_data'] = $this->common_model->getData($table_name);
            $this->load->view('common/header',$data);
            $this->load->view('add_user/add_user',$data);
            $this->load->view('common/footer',$data);
            $this->load->view('common/js',$data);
            $this->load->view('add_user/js_add_user',$data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');
        else:
            redirect('home');
        endif;
    }

    public function addUser() {
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
            $add_role = mysql_real_escape_string($this->input->post('add_role'));
            $add_company_name = mysql_real_escape_string($this->input->post('add_company_name'));
            $add_full_name = mysql_real_escape_string($this->input->post('add_full_name'));
            $add_user_name = mysql_real_escape_string($this->input->post('add_user_name'));
            $add_password = mysql_real_escape_string($this->input->post('add_password'));
            $add_phone = mysql_real_escape_string($this->input->post('add_phone'));
            $add_email = mysql_real_escape_string($this->input->post('add_email'));
            $add_address = mysql_real_escape_string($this->input->post('add_address'));
            $add_status = mysql_real_escape_string($this->input->post('add_status'));

          

              if (!ctype_alpha($add_password) && !ctype_digit($add_password)) :
                // echo "The string $new_password consists of all letters or digits.\n";
             else :
                $this->session->set_userdata('msg_title', 'Warning');
                $this->session->set_userdata('msg_body', 'New password must contain alphabet and numbers.');
                redirect('add_user');
            endif;


            $get_result=  $this->common_model->getDataWhere('user','email',$add_email);
            if(count($get_result)>0):
                $this->session->set_userdata('msg_title', 'Warning');
                $this->session->set_userdata('msg_body','Sorry,email id already used!' );
                redirect('add_user');
            endif;

            $get_result=  $this->common_model->getDataWhere('user','user_name',$add_user_name);
            if(count($get_result)>0):
                $this->session->set_userdata('msg_title', 'Warning');
                $this->session->set_userdata('msg_body','Sorry,username already used!' );
                redirect('add_user');
            endif;
            date_default_timezone_set("Asia/Dhaka");
            $relation_id=  date('Ymd').rand(100000,999999);
			$data = array(
                    'relation_id' => $relation_id,
					'role_id' => $add_role,
                    'company_name' => $add_company_name,
                    'name' => $add_full_name,
                    'user_name' => $add_user_name,
                    'password' => base64_encode($add_password),
                    'phone' => $add_phone,
                    'email' => $add_email,
                    'address' => $add_address,
                    'status' => $add_status,
                    'date_time' => date('Y-m-d H:i:s'),
					'ack' => 2
            );
            $table_name='user';
            $insert_result = $this->common_model->insertData($table_name, $data);
			
            if($insert_result):
                $this->session->set_userdata('msg_title', 'Success');
                $this->session->set_userdata('msg_body','Successfull' );
            else:
                $this->session->set_userdata('msg_title', 'Error');
                $this->session->set_userdata('msg_body','Failed' );
            endif;
            redirect('add_user');
        else:
            redirect('home');
        endif;
    }


    public function editUser() {
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
            $user_id = mysql_real_escape_string($this->input->post('edit_user_id'));
            $edit_company_name = mysql_real_escape_string($this->input->post('edit_company_name'));
            $edit_name = mysql_real_escape_string($this->input->post('edit_name'));
            $edit_phone = mysql_real_escape_string($this->input->post('edit_phone'));
            $edit_email = mysql_real_escape_string($this->input->post('edit_email'));
            $edit_address = mysql_real_escape_string($this->input->post('edit_address'));
            $edit_status = mysql_real_escape_string($this->input->post('edit_status'));
            $data = array(
                    'company_name' => $edit_company_name,
                    'name' => $edit_name,
                    'phone' => $edit_phone,
                    'email' => $edit_email,
                    'address' => $edit_address,
                    'status' => $edit_status,
					'ack' => 2
            );

            $table_name='user';
            $insert_result = $this->common_model->updateData($table_name,$data,"user_id",$user_id);
            

            if($insert_result):
                $this->session->set_userdata('msg_title', 'Success');
                $this->session->set_userdata('msg_body','Successfull');
            else:
              $this->session->set_userdata('msg_title', 'Error');
                $this->session->set_userdata('msg_body','Failed' );
            endif;
            redirect('add_user');
        else:

            redirect('home');
        endif;
    }
	public function deleteUser() {
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
            $delete_user_id = mysql_real_escape_string($this->input->post('delete_user_id'));


            $table_name='user';
            $column_name='user_id';
            $column_value=$delete_user_id;
            $insert_result = $this->common_model->deleteData($table_name,$column_name,$column_value);


            if($insert_result):
                $this->session->set_userdata('msg_title', 'Success');
                $this->session->set_userdata('msg_body','Successfull' );
            else:
                $this->session->set_userdata('msg_title', 'Error');
                $this->session->set_userdata('msg_body','Failed' );
            endif;
            redirect('add_user');
        else:
            redirect('home');
        endif;
    }
    public function getMenuData() {

        $data['base_url'] = $this->config->item('base_url');
        $user_id = mysql_real_escape_string($this->input->post('user_id'));

        $table_name='user';
        $result = $this->common_model->getDataWhere($table_name,"user_id",$user_id);
        echo json_encode($result);


    }
}
?>
