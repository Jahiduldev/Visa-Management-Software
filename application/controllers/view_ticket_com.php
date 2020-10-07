<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class View_ticket_com extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('common_model');
    }

    public function index() {

        if (in_array($this->session->userdata('role_id'), array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17))):
            $data['base_url'] = $this->config->item('base_url');
            $data['active_menu'] = 'Embasy Info';
            $data['active_sub_menu'] = 'Complete';

            $this->load->view('common/header_ssp', $data);
            $this->load->view('view_embasy_ssp_com/view_embasy_ssp_com', $data);
            $this->load->view('common/footer', $data);
            $this->load->view('common/js_ssp', $data);
            $this->load->view('view_embasy_ssp_com/js_view_embasy_ssp_com', $data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');
        else:
            redirect('home');
        endif;
    }
    
      public function getExpire() {

        if (in_array($this->session->userdata('role_id'), array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17))):
            $data['base_url'] = $this->config->item('base_url');
            $data['active_menu'] = 'Embasy Info';
            $data['active_sub_menu'] = 'Complete';

            $this->load->view('common/header_ssp', $data);
            $this->load->view('view_embasy_ssp_com_expire/view_embasy_ssp_com', $data);
            $this->load->view('common/footer', $data);
            $this->load->view('common/js_ssp', $data);
            $this->load->view('view_embasy_ssp_com_expire/js_view_embasy_ssp_com', $data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');
        else:
            redirect('home');
        endif;
    } 
    
    
    
    
     public function ticketToday() {

        if (in_array($this->session->userdata('role_id'), array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17))):
            $data['base_url'] = $this->config->item('base_url');
            $data['active_menu'] = 'Embasy Info';
            $data['active_sub_menu'] = 'Complete';

            $this->load->view('common/header_ssp', $data);
            $this->load->view('view_ticket_ssp_com_today/view_ticket_ssp_com', $data);
            $this->load->view('common/footer', $data);
            $this->load->view('common/js_ssp', $data);
            $this->load->view('view_ticket_ssp_com_today/js_view_ticket_ssp_com', $data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');
        else:
            redirect('home');
        endif;
    }

    public function editModel() {


        if (in_array($this->session->userdata('role_id'), array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17))):
            $data['base_url'] = $this->config->item('base_url');

            $edit_id = mysql_real_escape_string($this->input->post('edit_id'));
         //   $edit_embasy_file = mysql_real_escape_string($this->input->post('edit_embasy_file'));
            $edit_embasy_status = mysql_real_escape_string($this->input->post('edit_embasy_status'));
            $edit_embasy_date = mysql_real_escape_string($this->input->post('edit_embasy_date'));
            $date_new = date_create($edit_embasy_date);
            date_add($date_new, date_interval_create_from_date_string("89 days"));
            $edit_embasy_expire_date = date_format($date_new, "Y-m-d");
           // $edit_embasy_expire_date = mysql_real_escape_string($this->input->post('edit_embasy_expire_date'));
            $edit_embasy_office = mysql_real_escape_string($this->input->post('edit_embasy_office'));
            $edit_embasy_note = mysql_real_escape_string($this->input->post('edit_embasy_note'));
          


            $config['overwrite'] = false;
            $config['upload_path'] = './public/uploads';
            $config['allowed_types'] = '*';   //'gif|jpg|png|mp4|ogg|webm|mov|mpeg|avi';
            $config['max_size'] = '60000';
            $config['max_width'] = '';
            $config['max_height'] = '';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            $data['upload_data'] = '';
            $date_time = date('Y-m-d H:i:s');
            if (!$this->upload->do_upload('edit_embasy_file')) :
                $error = $this->upload->display_errors();
                $data['upload_data'] = $error;
                $fileName = '';
               $data = array(

               
                'embassy_visa_stamping_status' => $edit_embasy_status,
                'embassy_date' => $edit_embasy_date,
                'embasy_expire_date' => $edit_embasy_expire_date,
                'embasy_office' => $edit_embasy_office,
                'embassy_note' => $edit_embasy_note
            );

            else:
                $upload_data = $this->upload->data();
                $data['upload_data'] = $upload_data;
                $fileName = $upload_data['file_name'];
                
                     $data = array(

                'embassy_file_upload' => $fileName,
                'embassy_visa_stamping_status' => $edit_embasy_status,
                'embassy_date' => $edit_embasy_date,
                'embasy_expire_date' => $edit_embasy_expire_date,
                'embasy_office' => $edit_embasy_office,
                'embassy_note' => $edit_embasy_note
            );
                
                
                
            endif;





            
         

            $table_name = 'passport_makings';
            $insert_result = $this->common_model->updateData($table_name, $data, "id", $edit_id);


            if ($insert_result):
                $this->session->set_userdata('msg_title', 'Success');
                $this->session->set_userdata('msg_body', 'Successfull');
            else:
                $this->session->set_userdata('msg_title', 'Error');
                $this->session->set_userdata('msg_body', 'Failed');
            endif;
            redirect('view_embasy_com');
        else:

            redirect('home');
        endif;
    }

    public function deleteModel() {

        if (in_array($this->session->userdata('role_id'), array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17))):
            $data['base_url'] = $this->config->item('base_url');
            $delete_id = mysql_real_escape_string($this->input->post('delete_id'));


            $table_name = 'passport_makings';
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
            redirect('view_customer');
        else:
            redirect('home');
        endif;
    }

    public function getData() {

        $data['base_url'] = $this->config->item('base_url');
        $id = mysql_real_escape_string($this->input->post('id'));

        $table_name = 'passport_makings';
        $result = $this->common_model->getDataWhere($table_name, "id", $id);
        echo json_encode($result);
    }

    public function getTableData() {

        $table = 'passport_makings';
        $primaryKey = 'id';
        $columns = array(
            array('db' => 'name', 'dt' => 0, 'field' => 'name'),
            array('db' => 'passport_no', 'dt' => 1, 'field' => 'passport_no'),
            array('db' => 'embassy_file_upload', 'dt' => 2, 'field' => 'embassy_file_upload','formatter' => function ($rowvalue, $row) {
                    return '<a href="./public/uploads/'.$rowvalue.'" target="_blank">Download</a>';
                }),
             array('db' => 'embassy_visa_stamping_status', 'dt' => 3, 'field' => 'embassy_visa_stamping_status'),
            array('db' => 'embassy_date', 'dt' => 4, 'field' => 'embassy_date'),
            array('db' => 'embasy_expire_date', 'dt' => 5, 'field' => 'embasy_expire_date'),
			
			
			
			    array('db' => 'id', 'dt' => 6,'field' =>'id','formatter' => function ($rowvalue, $row) {			   
			   $val1 = date_diff(date_create(date('Y-m-d')),date_create($row[5]))->format("%R%a");
			    return ''.$val1.'';
				}),
			
			
            array('db' => 'embasy_office', 'dt' => 7, 'field' => 'embasy_office'),
            array('db' => 'embassy_note', 'dt' => 8, 'field' => 'embassy_note'),
            array('db' => 'id', 'dt' => 9, 'field' => 'id', 'formatter' => function ($rowvalue, $row) {
                    return '<a  href="#">
      <button class="btn btn-primary btn-xs" onclick="editModal(' . $rowvalue . ')"><i class="fa fa-pencil"> Edit</i></button></a>
	  
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
        $joinQuery="";
        
       $extraCondition = "`embassy_visa_stamping_status`='Complete'";

        echo json_encode(
                SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns,'',$extraCondition)
        );
    }


    
    public function getTableDataExpire() {
 
        $table = 'passport_makings';
        $primaryKey = 'id';
        $columns = array(
            array('db' => 'name', 'dt' => 0, 'field' => 'name'),
            array('db' => 'passport_no', 'dt' => 1, 'field' => 'passport_no'),
            array('db' => 'embassy_file_upload', 'dt' => 2, 'field' => 'embassy_file_upload','formatter' => function ($rowvalue, $row) {
                    return '<a href="../public/uploads/'.$rowvalue.'" target="_blank">Download</a>';
                }),
             array('db' => 'embassy_visa_stamping_status', 'dt' => 3, 'field' => 'embassy_visa_stamping_status'),
            array('db' => 'embassy_date', 'dt' => 4, 'field' => 'embassy_date'),
            array('db' => 'embasy_expire_date', 'dt' => 5, 'field' => 'embasy_expire_date'),
			
			
			
			    array('db' => 'id', 'dt' => 6,'field' =>'id','formatter' => function ($rowvalue, $row) {			   
			   $val1 = date_diff(date_create(date('Y-m-d')),date_create($row[5]))->format("%R%a");
			    return ''.$val1.'';
				}),
			
			
            array('db' => 'embasy_office', 'dt' => 7, 'field' => 'embasy_office'),
            array('db' => 'embassy_note', 'dt' => 8, 'field' => 'embassy_note'),
            array('db' => 'id', 'dt' => 9, 'field' => 'id', 'formatter' => function ($rowvalue, $row) {
                    return 'Read Only';
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
        $joinQuery="";
        
       $extraCondition = "`embassy_visa_stamping_status`='Complete' and (`basic_flight` !='Complete' || `basic_flight` is null ) and (DATEDIFF(`embasy_expire_date`,CURDATE()))<=20";

        echo json_encode(
                SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns,'',$extraCondition)
        );
    } 
    
    
    
    
    

 public function getTableDataToday() {

        $table = 'passport_makings';
        $primaryKey = 'id';
        $columns = array(
            array('db' => 'name', 'dt' => 0, 'field' => 'name'),
            array('db' => 'passport_no', 'dt' => 1, 'field' => 'passport_no'),
            array('db' => 'basic_flight', 'dt' => 2, 'field' => 'basic_flight'),
             array('db' => 'ticket_location', 'dt' => 3, 'field' => 'ticket_location'),
            array('db' => 'ticket_flying_date', 'dt' => 4, 'field' => 'ticket_flying_date'),
            array('db' => 'ticket_flying_time', 'dt' => 5, 'field' => 'ticket_flying_time'),
            array('db' => 'ticket_file_upload', 'dt' => 6, 'field' => 'ticket_file_upload','formatter' => function ($rowvalue, $row) {
                    return '<a href="../public/uploads/'.$rowvalue.'" target="_blank">Download</a>';
                }),
            array('db' => 'ticket_note', 'dt' => 7, 'field' => 'ticket_note'),
            array('db' => 'id', 'dt' => 8, 'field' => 'id', 'formatter' => function ($rowvalue, $row) {
                     return 'Read Only';
     
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
        $joinQuery="";
         $date = date('Y-m-d');
       $extraCondition = "`basic_flight`='Complete' and `ticket_entry_date` Like '$date%'  " ;

        echo json_encode(
                SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns,'',$extraCondition)
        );
    }

}

?>
