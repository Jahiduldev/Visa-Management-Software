<?php

class Add_User_Permission extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('common_model');

    }

    public function index() {
        if (in_array($this->session->userdata('role_id'), array(1,2))):
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
        else:
            redirect('home');
        endif;
    }

    public function addUserPermission() {
        if (in_array($this->session->userdata('role_id'), array(1,2))):
            $data['base_url'] = $this->config->item('base_url');
            $role_id=  $this->input->post('select_role');
            $allPost = $this->input->post();
            $queryPermissionDelete = $this->db->query("DELETE FROM permission WHERE role_id='$role_id'");
            foreach ( $allPost as $key => $sub_menu_id):
                if($key=='select_role')
                    continue;
                $querySubMenu = $this->db->query("SELECT * FROM subs_menu WHERE sub_menu_id='$sub_menu_id'");
                foreach ($querySubMenu->result() as  $rowsubmenu):
                    $menu_id=$rowsubmenu->menu_id;
                endforeach;
                $queryPermissionInsert = $this->db->query("INSERT INTO permission (role_id,menu_id,sub_menu_id) VALUES ('$role_id','$menu_id','$sub_menu_id')");
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
