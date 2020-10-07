<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Detail_report_advance_search extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('common_model');
    }

    public function index() {

        if (in_array($this->session->userdata('role_id'), array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17))):
            $data['base_url'] = $this->config->item('base_url');
            $data['active_menu'] = 'Report';
            $data['active_sub_menu'] = 'Details Report Advance Search';

          $data['passport_makings_data']  =$this->common_model->getData('passport_makings');


            $this->load->view('common/header', $data);
            $this->load->view('detail_report_advance_search/view_advance_search', $data);
            $this->load->view('common/footer', $data);
            $this->load->view('common/js_search', $data);
            $this->load->view('detail_report_advance_search/js_view_advance_search', $data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');
        else:
            redirect('home');
        endif;
    }
    
    
    
     public function print_page() {
        if (in_array($this->session->userdata('role_id'), array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17))):
            $data['base_url'] = $this->config->item('base_url');
           

           

            $in_arr = "";
            foreach ($_POST as $key => $value) {
                if ( $key == 'example_length' || $key=='chkall')
                    continue;
                $in_arr .= $value . ",";
            }
            
           

            if ($in_arr == "") {
                $data['print_data'] = array();
            } else {
                $in_arr = rtrim($in_arr, ',');
               
                    $result = $this->db->query("select * from passport_makings where id in ($in_arr)  order by id desc");
               

                $data['print_data'] = $result->result();
            }

            $this->load->view('view_details_report_print/view_details_report_print', $data);
        else:

            redirect('home');
        endif;
    }

    

}

?>
