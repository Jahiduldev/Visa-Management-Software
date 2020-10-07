<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Add_User_Permission extends CI_Controller {
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
            $data['active_sub_menu'] = 'Add User Permission';
            $data['user_role_data']=  $this->common_model->getData('user_role');
            $store=$this->session->flashdata('data_name');
            if($store !=''):
                $data['role_id']=$this->session->flashdata('data_name');
            else:
                $data['role_id']=$this->session->userdata('role_id');
            endif;

            $this->load->view('common/header',$data);
            $this->load->view('add_user_permission/add_user_permission',$data);
            $this->load->view('common/footer',$data);
            $this->load->view('common/js',$data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');
        else:
            redirect('home');
        endif;
    }

    public function addUserPermission() {
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
            $role_id=  $this->input->post('select_role');
            $allPost = $this->input->post();
            $queryPermissionDelete = $this->db->query("DELETE FROM permission WHERE role_id='$role_id'");


            foreach ($allPost as $key => $sub_menu_id):
                if($key=='select_role')
                    continue;
                $querySubMenu = $this->db->query("SELECT * FROM subs_menu WHERE sub_menu_id='$sub_menu_id'");
                foreach ($querySubMenu->result() as  $rowsubmenu):
                    $menu_id=$rowsubmenu->menu_id;
                endforeach;
                $relation_id=  date('Ymd').rand(100000,999999);
                $queryPermissionInsert = $this->db->query("INSERT INTO permission VALUES('NULL','$relation_id','$role_id','$menu_id','$sub_menu_id',2)");


            endforeach;

            $this->session->set_flashdata('data_name', $role_id);
            redirect('add_user_permission');
        else:
            redirect('home');
        endif;
    }

    public function getUserPermission() {
        $role_id=$this->input->post('role_id');
        $queryMenu = $this->db->query("SELECT * FROM menu");
        foreach ($queryMenu->result() as  $rowmenu):
            $menu_id =$rowmenu->menu_id;
            $querySubMenu = $this->db->query("SELECT * FROM subs_menu WHERE menu_id='$menu_id'");
            if($querySubMenu->num_rows()):

                echo '<div class="form-group">
    <label for="inputSuccess" class="col-sm-2 control-label col-lg-2">'. $rowmenu->menu_name.'</label>
    <div class="col-lg-10">';

                foreach ($querySubMenu->result() as  $rowsubmenu):
                    $sub_menu_id = $rowsubmenu->sub_menu_id;
                    $sub_menu_name = $rowsubmenu->sub_menu_name;
                    $queryPermission = $this->db->query("SELECT * FROM permission WHERE sub_menu_id='$sub_menu_id' AND role_id='$role_id'");

                    if($queryPermission->num_rows()):

                        echo '<div class="checkbox">
            <label>
                <input type="checkbox" value="'.$sub_menu_id.'" id="sub_menu'. $sub_menu_id.'" name="sub_menu'. $sub_menu_id.'" checked>
                                        '. $sub_menu_name.'
            </label>
        </div>';
                    else:
                        echo '<div class="checkbox">
            <label>
                <input type="checkbox" value="'. $sub_menu_id.'" id="sub_menu'. $sub_menu_id.'" name="sub_menu'. $sub_menu_id.'">
                                        '.$sub_menu_name.'
            </label>
        </div>';

                    endif;
                endforeach;

                echo  '</div>
</div>';

            endif;
        endforeach;
    }



}
?>
