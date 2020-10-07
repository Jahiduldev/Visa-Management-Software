<?php

class Test extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('common_model');
    }

    public function index() {
        if (in_array($this->session->userdata('role_id'), array(1,2))):
            $data['base_url'] = $this->config->item('base_url');
            $data['active_menu'] = 'Corporate Profile';
            $data['active_sub_menu'] = 'Test';

            $this->load->view('test/header',$data);
            $this->load->view('test/test',$data);
            $this->load->view('common/footer',$data);
            $this->load->view('test/js_test',$data);
        else:
            redirect('home');
        endif;
    }

    public function getTableData() {


        $table = 'successfull_officers';
        $primaryKey = 'id';
        $columns = array(
                array('db' => 'army_id', 'dt' => 0),
                array('db' => 'army_no', 'dt' => 1),
                array('db' => 'rank', 'dt' => 2),
                array('db' => 'name_of_army_pers', 'dt' => 3),
                array('db' => 'course', 'dt' => 4),
                array('db' => 'commision_dt', 'dt' => 5),
                array('db' => 'contact_no', 'dt' => 6),
                array('db' => 'docus_recvd', 'dt' => 7),
                array('db' => 'Required_Amount', 'dt' => 8),
                array('db' => 'amnt_recvd', 'dt' => 9),
                array('db' => 'id', 'dt' => 10,'formatter' => function ($rowvalue, $row) {
                            return '<a  href="'. site_url("add_success_officer/editOfficer/".$rowvalue).'">
      <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a><a href="#">
         <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button></a>';
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
        echo json_encode(
        SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
        );


    }



}
?>
