<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Add_Subs_menu extends CI_Controller {
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
            $data['active_sub_menu'] = 'Add Sub Menu';

            $table_name='subs_menu';
            $data['get_sub_menu_data'] = $this->common_model->getData($table_name);
            $table_name='menu';
            $data['get_role_data'] = $this->common_model->getData($table_name);
            $this->load->view('common/header',$data);
            $this->load->view('add_subs_menu/add_subs_menu',$data);
            $this->load->view('common/footer',$data);
            $this->load->view('common/js',$data);
            $this->load->view('add_subs_menu/js_add_subs_menu',$data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');
        else:
            redirect('home');
        endif;
    }

    public function addSubsMenu() {
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
            $menu_id = mysql_real_escape_string($this->input->post('select_menu'));

            $sub_menu_name = mysql_real_escape_string($this->input->post('sub_menu_name'));
            $url = mysql_real_escape_string($this->input->post('url'));
            $relation_id=  date('Ymd').rand(100000,999999);
            $data = array(
                    'relation_id' => $relation_id,
                    'menu_id' => $menu_id,
                    'sub_menu_name' => $sub_menu_name,
                    'url' => $url,
                    'ack' => 2
            );
            $table_name='subs_menu';
            $insert_result = $this->common_model->insertData($table_name, $data);


            if($insert_result):
                $this->session->set_userdata('msg_title', 'Success');
                $this->session->set_userdata('msg_body','Successfull');
            else:
                $this->session->set_userdata('msg_title', 'Error');
                $this->session->set_userdata('msg_body','Failed' );
            endif;
            redirect('add_subs_menu');
        else:
            redirect('home');
        endif;
    }


    public function getSubMenuData() {

        $data['base_url'] = $this->config->item('base_url');
        $sub_menu_id = mysql_real_escape_string($this->input->post('sub_menu_id'));

        $table_name='subs_menu';
        $result = $this->common_model->getDataWhere($table_name,"sub_menu_id",$sub_menu_id);
        echo json_encode($result);


    }

    public function editSubMenu() {
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
            $sub_menu_id = mysql_real_escape_string($this->input->post('edit_menu_id'));
            $sub_menu_name = mysql_real_escape_string($this->input->post('edit_menu_name'));
            $data = array(
                    'sub_menu_name' => $sub_menu_name,
					'ack' => 2
            );
            $table_name='subs_menu';
            $insert_result = $this->common_model->updateData($table_name, $data,"sub_menu_id",$sub_menu_id);

            if($insert_result):
                $this->session->set_userdata('msg_title', 'Success');
                $this->session->set_userdata('msg_body','Successfull');
            else:
                $this->session->set_userdata('msg_title', 'Error');
                $this->session->set_userdata('msg_body','Failed' );
            endif;
            redirect('add_subs_menu');
        else:
            redirect('home');
        endif;
    }
	public function deleteSubMenu() {
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
            $delete_sub_menu_id = mysql_real_escape_string($this->input->post('delete_sub_menu_id'));


            $table_name='subs_menu';
            $column_name='sub_menu_id';
            $column_value=$delete_sub_menu_id;
            $insert_result = $this->common_model->deleteData($table_name,$column_name,$column_value);


            if($insert_result):
                $this->session->set_userdata('msg_title', 'Success');
                $this->session->set_userdata('msg_body','Successfull' );
            else:
                $this->session->set_userdata('msg_title', 'Error');
                $this->session->set_userdata('msg_body','Failed' );
            endif;
            redirect('add_subs_menu');
        else:
            redirect('home');
        endif;
    }


}
?>
