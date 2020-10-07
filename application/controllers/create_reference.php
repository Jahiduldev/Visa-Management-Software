<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Create_reference extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('common_model');
    }

    public function index() {
        $per_role_arr = array();
        $url = $this->uri->segment(1);
        $table_name = 'subs_menu';
        $column_name = 'url';
        $column_value = $url;
        $get_url_data = $this->common_model->getDataWhere($table_name, $column_name, $column_value);
        foreach ($get_url_data as $row):
            $sub_menu_id = $row->sub_menu_id;
            $get_role_data = $this->common_model->getDataWhere('permission', 'sub_menu_id', $sub_menu_id);
            foreach ($get_role_data as $row2):
                $role_id = $row2->role_id;
                array_push($per_role_arr, $role_id);
            endforeach;
        endforeach;

        if (in_array($this->session->userdata('role_id'), $per_role_arr)):
            $data['base_url'] = $this->config->item('base_url');
            $data['active_menu'] = 'Passport Receive';
            $data['active_sub_menu'] = 'Create Reference';

            $result = $this->db->query("select * from reference_table order by 	id desc limit 1");
            if ($result->num_rows() > 0):
                foreach ($result->result() as $row) :
                    $id = $row->id;
                    $data['last_row'] = $id + 1;
                endforeach;
            else:
                $data['last_row'] = 1;
            endif;

            $table_name = 'reference_table';
            $data['get_reference_data'] = $this->common_model->getData($table_name);



            $this->load->view('common/header', $data);
            $this->load->view('create_reference/create_reference', $data);
            $this->load->view('common/footer', $data);
            $this->load->view('common/js', $data);
            $this->load->view('create_reference/js_create_reference', $data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');
        else:
            redirect('home');
        endif;
    }

    public function addReference() {

        if (in_array($this->session->userdata('role_id'), array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17))):
            $data['base_url'] = $this->config->item('base_url');


            $add_reference_name = mysql_real_escape_string(trim($this->input->post('add_reference_name')));
            $add_reference_id = mysql_real_escape_string($this->input->post('add_reference_id'));
            $add_reference_mobile_number = mysql_real_escape_string($this->input->post('add_reference_mobile_number'));
            $add_reference_mobile_number_1 = mysql_real_escape_string($this->input->post('add_reference_mobile_number_1'));
            $add_reference_mobile_number_2 = mysql_real_escape_string($this->input->post('add_reference_mobile_number_2'));
            $add_date = mysql_real_escape_string($this->input->post('add_date'));





            date_default_timezone_set("Asia/Dhaka");
            $date = date('Y-m-d');
            $data = array(
                'reference_name' => $add_reference_name,
                'reference_id' => $add_reference_id,
                'reference_mobile' => $add_reference_mobile_number,
                'reference_mobile_1' => $add_reference_mobile_number_1,
                'reference_mobile_2' => $add_reference_mobile_number_2,
                'date' => $date,
            );

            $table_name = 'reference_table';

            $res = $this->common_model->getDataWhere($table_name, 'reference_name', $add_reference_name);
            if (count($res) > 0) {
                $this->session->set_userdata('msg_title', 'Error');
                $this->session->set_userdata('msg_body', 'Name Already exist');
                redirect('create_reference');
            }


            $insert_result = $this->common_model->insertData($table_name, $data);


            if ($insert_result):
                $this->session->set_userdata('msg_title', 'Success');
                $this->session->set_userdata('msg_body', 'Successfull');
            else:
                $this->session->set_userdata('msg_title', 'Error');
                $this->session->set_userdata('msg_body', 'Failed');
            endif;
            redirect('create_reference');
        else:

            redirect('home');
        endif;
    }

    public function getReferenceData() {

        $data['base_url'] = $this->config->item('base_url');
        $id = mysql_real_escape_string($this->input->post('id'));

        $table_name = 'reference_table';
        $result = $this->common_model->getDataWhere($table_name, "id", $id);
        echo json_encode($result);
    }

    public function getReferenceSearchData() {

        $data['base_url'] = $this->config->item('base_url');
        $reference_name = mysql_real_escape_string($this->input->post('reference_name'));

        $table_name = 'passport_makings';
        $result = $this->common_model->getDataWhere($table_name, "reference_name", $reference_name);

        if (count($result) == 0):
            $table_name = 'passport_makings';
            $result = $this->common_model->getDataWhere($table_name, "passport_no", $reference_name);
        endif;

        if (count($result) > 0):
            echo '<table style="width:100%" border="1">
        <tr>
        <th>SI</th>
        <th>Name</th>
        <th>Passport No</th>
        <th>Reference Name</th>
        </tr>';
            $counter = 0;
            foreach ($result as $row):
                $counter++;
                $name = $row->name;
                $passport_no = $row->passport_no;
                $reference_name = $row->reference_name;
                echo '<tr>
         <td>' . $counter . '</td>
        <td>' . $name . '</td>
        <td>' . $passport_no . '</td>
        <td>' . $reference_name . '</td>
        </tr>';
            endforeach;
            echo '</table>';

        endif;
    }

    public function editReference() {


        if (in_array($this->session->userdata('role_id'), array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17))):
            $data['base_url'] = $this->config->item('base_url');

            $edit_id = mysql_real_escape_string($this->input->post('edit_id'));

            $edit_reference_name = mysql_real_escape_string($this->input->post('edit_reference_name'));
            $edit_reference_id = mysql_real_escape_string($this->input->post('edit_reference_id'));
            $edit_reference_mobile_number = mysql_real_escape_string($this->input->post('edit_reference_mobile_number'));
            $edit_reference_mobile_number_1 = mysql_real_escape_string($this->input->post('edit_reference_mobile_number_1'));
            $edit_reference_mobile_number_2 = mysql_real_escape_string($this->input->post('edit_reference_mobile_number_2'));


            $data = array(
                'reference_name' => $edit_reference_name,
                'reference_id' => $edit_reference_id,
                'reference_mobile' => $edit_reference_mobile_number,
                'reference_mobile_1' => $edit_reference_mobile_number_1,
                'reference_mobile_2' => $edit_reference_mobile_number_2
            );

            $table_name = 'reference_table';
            $insert_result = $this->common_model->updateData($table_name, $data, "id", $edit_id);


            if ($insert_result):
                $this->session->set_userdata('msg_title', 'Success');
                $this->session->set_userdata('msg_body', 'Successfull');
            else:
                $this->session->set_userdata('msg_title', 'Error');
                $this->session->set_userdata('msg_body', 'Failed');
            endif;
            redirect('create_reference');
        else:

            redirect('home');
        endif;
    }

    public function editReferenceSearch() {


        if (in_array($this->session->userdata('role_id'), array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17))):
            $data['base_url'] = $this->config->item('base_url');

            $relation_id = mysql_real_escape_string($this->input->post('relation_id'));

            $relation_reference_name = mysql_real_escape_string($this->input->post('relation_reference_name'));
            $relation_reference_id = mysql_real_escape_string($this->input->post('relation_reference_id'));

            $reference_name = mysql_real_escape_string($this->input->post('reference_name'));

            $data = array(
                'reference_name' => $relation_reference_name . "-" . $relation_reference_id
            );

            $table_name = 'passport_makings';
            $insert_result = $this->common_model->updateData($table_name, $data, "reference_name", $reference_name);

            $table_name = 'passport_makings';
            $insert_result = $this->common_model->updateData($table_name, $data, "passport_no", $reference_name);


            if ($insert_result):
                $this->session->set_userdata('msg_title', 'Success');
                $this->session->set_userdata('msg_body', 'Successfull');
            else:
                $this->session->set_userdata('msg_title', 'Error');
                $this->session->set_userdata('msg_body', 'Failed');
            endif;
            redirect('create_reference');
        else:

            redirect('home');
        endif;
    }

    public function deleteReference() {

        if (in_array($this->session->userdata('role_id'), array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17))):
            $data['base_url'] = $this->config->item('base_url');
            $delete_id = mysql_real_escape_string($this->input->post('delete_id'));


            $table_name = 'reference_table';
            $column_name = 'id';
            $column_value = $delete_id;
            $insert_result = $this->common_model->deleteData($table_name, $column_name, $column_value);


            if ($insert_result):
                $this->session->set_userdata('msg_title', 'Success');
                $this->session->set_userdata('msg_body', 'Successfull');
            else:
                $this->session->set_userdata('msg_title', 'Error');
                $this->session->set_userdata('msg_body', 'Failed');
            endif;
            redirect('create_reference');
        else:
            redirect('home');
        endif;
    }

}

?>
