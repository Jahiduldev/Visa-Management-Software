<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class View_visa_form extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('common_model');
    }

    public function index() {

          if (in_array($this->session->userdata('role_id'), array(1, 2, 3,4,5,6,7,8,9,10))):
            $data['base_url'] = $this->config->item('base_url');
            $data['active_menu'] = 'Visa Form';
            $data['active_sub_menu'] = 'View Visa Form';


          //  $data['emp_info'] = $this->common_model->getData('emp_info');
         //   $this->load->view('view_visa_form/view_visa_form', $data);
            
              $this->load->view('common/header_ssp', $data);
            $this->load->view('view_visa_form/view_visa_form', $data);
            $this->load->view('common/footer', $data);
            $this->load->view('common/js_ssp', $data);
            $this->load->view('view_visa_form/js_view_visa_form', $data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');

        else:
            redirect('home');
        endif;
    }

    public function print_form($id ) {
         if (in_array($this->session->userdata('role_id'), array(1, 2, 3,4,5,6,7,8,9,10))):
              $data['base_url'] = $this->config->item('base_url');
            


          

        $table_name = 'emp_info';
        $data['emp_info'] = $this->common_model->getDataWhere($table_name,"id", $id);
            $this->load->view('print_visa_form/print_visa_form', $data);
            
          

        else:
            redirect('home');
        endif;
        
    }
    
    public function getData() {

        $data['base_url'] = $this->config->item('base_url');
        $id = mysql_real_escape_string($this->input->post('id'));

        $table_name = 'emp_info';
        $result = $this->common_model->getDataWhere($table_name, "id", $id);
        echo json_encode($result);
    }

     public function getTableData() {

        $table = 'emp_info';
        $primaryKey = 'id';
        $columns = array(
            array('db' => 'saudi_emp_name_eng', 'dt' => 0, 'field' => 'saudi_emp_name_eng'),
            array('db' => 'visa_no_eng', 'dt' => 1, 'field' => 'visa_no_eng'),
            array('db' => 'full_name_eng', 'dt' => 2, 'field' => 'full_name_eng'),
            array('db' => 'pas_no_eng', 'dt' => 3, 'field' => 'pas_no_eng'),
            array('db' => 'prof_eng', 'dt' => 4, 'field' => 'prof_eng'),
            array('db' => 'add_religion', 'dt' => 5, 'field' => 'add_religion'),
           
           
            array('db' => 'id', 'dt' => 6, 'field' => 'id', 'formatter' => function ($rowvalue, $row) {
                    return '<a  href="#">
      <button class="btn btn-primary btn-xs" onclick="editModal(' . $rowvalue . ')"><i class="fa fa-pencil"> Edit</i></button></a>
        <a href="'. site_url("view_visa_form/print_form/".$rowvalue).'">  <button class="btn btn-primary btn-xs" ><i class="fa fa-eye"> View</i></button>
	  
	  </a>';
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
        // $joinQuery = "FROM `{$table}` AS `c`  JOIN `base_service_master` AS `m` ON (`c`.`ci_id` = `m`.`ref_client_id`) JOIN `base_areas` AS `a` ON (`a`.`a_id` = `c`.`ref_area_id`)";
        //$joinQuery="";
        
       //$extraCondition = "`enzaz_mufa_number`!=''";

        echo json_encode(
                SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
        );
    }

}

?>
