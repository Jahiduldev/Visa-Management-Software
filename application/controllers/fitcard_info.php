<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Fitcard_info extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('common_model');
    }

    public function index() {

        if (in_array($this->session->userdata('role_id'), array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17))):
            $data['base_url'] = $this->config->item('base_url');
            $data['active_menu'] = 'Passport Receive';
            $data['active_sub_menu'] = 'Fitcard Info';
          

            $this->load->view('common/header',$data);
            $this->load->view('fitcard_info/fitcard_info',$data);
            $this->load->view('common/footer',$data);
            $this->load->view('common/js',$data);
            $this->load->view('fitcard_info/js_fitcard_info',$data);
            $this->session->unset_userdata('msg_title');
            $this->session->unset_userdata('msg_body');
        else:
            redirect('home');
        endif;
    }

    public function addPassport() {

        if (in_array($this->session->userdata('role_id'), array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17))):
            $data['base_url'] = $this->config->item('base_url');


            $add_passport_holder_name= mysql_real_escape_string($this->input->post('add_passport_holder_name'));
            $add_passport_no = mysql_real_escape_string($this->input->post('add_passport_no'));
            $add_id_number = mysql_real_escape_string($this->input->post('add_id_number'));
            $add_visa_number = mysql_real_escape_string($this->input->post('add_visa_number'));
			$add_fingering_type= mysql_real_escape_string($this->input->post('add_fingering_type'));
            $add_reference_name = mysql_real_escape_string($this->input->post('add_reference_name'));
            $add_broker_name = mysql_real_escape_string($this->input->post('add_broker_name'));
            $add_broker_mobile_number = mysql_real_escape_string($this->input->post('add_broker_mobile_number'));
			$add_reference_mobile_number= mysql_real_escape_string($this->input->post('add_reference_mobile_number'));
            $add_sponsor_name = mysql_real_escape_string($this->input->post('add_sponsor_name'));
            $passportpreview = mysql_real_escape_string($this->input->post('passportpreview'));
			$add_passport_type = mysql_real_escape_string($this->input->post('add_passport_type'));
			$add_description = mysql_real_escape_string($this->input->post('add_description'));
				
			$add_medical_name = mysql_real_escape_string($this->input->post('add_medical_name'));
			$add_file = mysql_real_escape_string($this->input->post('add_file'));
			$submitted_date= mysql_real_escape_string($this->input->post('submitted_date'));
			$receive_date = mysql_real_escape_string($this->input->post('receive_date'));
			$expire_date = mysql_real_escape_string($this->input->post('expire_date'));
			$entry_date = mysql_real_escape_string($this->input->post('entry_date'));
			$add_fitcard_note = mysql_real_escape_string($this->input->post('add_fitcard_note'));
			
			$add_mufa_number = mysql_real_escape_string($this->input->post('add_mufa_number'));
			$add_remufa_number = mysql_real_escape_string($this->input->post('add_remufa_number'));
			$add_mufa_fee= mysql_real_escape_string($this->input->post('add_mufa_fee'));
			$add_enjaz_visa_fee = mysql_real_escape_string($this->input->post('add_enjaz_visa_fee'));
			$add_enjaz_health_fee = mysql_real_escape_string($this->input->post('add_enjaz_health_fee'));
			$add_enjaz_file = mysql_real_escape_string($this->input->post('add_enjaz_file'));
			$enjaz_date = mysql_real_escape_string($this->input->post('enjaz_date'));
			$add_enjaz_note = mysql_real_escape_string($this->input->post('add_enjaz_note'));
			$enjaz_entry_date = mysql_real_escape_string($this->input->post('enjaz_entry_date'));
			
			$add_embasy_status = mysql_real_escape_string($this->input->post('add_embasy_status'));
			$add_embasy_file = mysql_real_escape_string($this->input->post('add_embasy_file'));
			$embasy_date= mysql_real_escape_string($this->input->post('embasy_date'));
			$add_embasy_note = mysql_real_escape_string($this->input->post('add_embasy_note'));
			$embasy_entry_date = mysql_real_escape_string($this->input->post('embasy_entry_date'));
			
			$add_price = mysql_real_escape_string($this->input->post('add_price'));
			$add_ticket_number = mysql_real_escape_string($this->input->post('add_ticket_number'));
			$add_ticket_location= mysql_real_escape_string($this->input->post('add_ticket_location'));
			$flying_date = mysql_real_escape_string($this->input->post('flying_date'));
			$add_flying_time = mysql_real_escape_string($this->input->post('add_flying_time'));
			$ticket_purchase_date = mysql_real_escape_string($this->input->post('ticket_purchase_date'));
			$add_ticket_note = mysql_real_escape_string($this->input->post('add_ticket_note'));
			$ticket_entry_date = mysql_real_escape_string($this->input->post('ticket_entry_date'));
			
				
			 $config['overwrite'] = false;
            $config['upload_path'] = './public/uploads';
            $config['allowed_types'] ='gif|jpg|png';   //'gif|jpg|png|mp4|ogg|webm|mov|mpeg|avi';
            $config['max_size'] = '60000';
            $config['max_width'] = '';
            $config['max_height'] = '';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            $data['upload_data'] = '';
            $date_time = date('Y-m-d H:i:s');
            if (!$this->upload->do_upload('passportpreview')) :
                $error = $this->upload->display_errors();
                $data['upload_data']=$error;
              $fileName= '';
              
           
            else:
                $upload_data = $this->upload->data();
                $data['upload_data']=$upload_data;
                $fileName= $upload_data['file_name'];
            endif;	
			

			
			

          if (!$this->upload->do_upload('add_file')) :
                $error = $this->upload->display_errors();
                $data['upload_data']=$error;
                $fileName2= $upload_data['file_name'];
              
           
            else:
                $upload_data = $this->upload->data();
                $data['upload_data']=$upload_data;
                $fileName2= $upload_data['file_name'];
            endif;				
				
				
				
		  if (!$this->upload->do_upload('add_enjaz_file')) :
                $error = $this->upload->display_errors();
                $data['upload_data']=$error;
                $fileName3= $upload_data['file_name'];
              
           
            else:
                $upload_data = $this->upload->data();
                $data['upload_data']=$upload_data;
                $fileName3= $upload_data['file_name'];
            endif;	


  if (!$this->upload->do_upload('add_embasy_file')) :
                $error = $this->upload->display_errors();
                $data['upload_data']=$error;
                $fileName4= $upload_data['file_name'];
              
           
            else:
                $upload_data = $this->upload->data();
                $data['upload_data']=$upload_data;
                $fileName4= $upload_data['file_name'];
            endif;			
			
               date_default_timezone_set("Asia/Dhaka");
               $date_time = date('Y-m-d H:i:s');
               $data = array(
                     'name' => $add_passport_holder_name,
                     'passport_no' => $add_passport_no,
                     'basic_id_number' => $add_id_number,
					 'basic_visa_number' => $add_visa_number,
                     'basic_fingering' => $add_fingering_type,
                     'reference_name' => $add_reference_name,
					 'broker_name' => $add_broker_name,
                     'broker_mobile_number' => $add_broker_mobile_number,
                     'reference_mobile_number' => $add_reference_mobile_number,
					 'okala_sponsor_name' => $add_sponsor_name,
                     'passport_preview' => $fileName,
                     'basic_passport_type' => $add_passport_type,
                     'basic_entry_date' => $date_time,
					 'basic_note' => $add_description,
					 
					 'fit_receive_medical_name' => $add_medical_name,
                     'fit_receive_file_upload' => $fileName2,
					 'fit_receive_submitted_date' => $submitted_date,
                     'fit_receive_receive_date' => $receive_date,
                     'fit_receive_expire_date' => $expire_date,
                     'fit_receive_entry_date' => $entry_date,
					 'fit_receive_note' => $add_fitcard_note,
					 
					 'enzaz_mufa_number' => $add_mufa_number,
                     'enzaz_re_mufa_number' => $add_remufa_number,
					 'enzaz_mufa_fee' => $add_mufa_fee,
                     'enzaz_visa_fee' => $add_enjaz_visa_fee,
                     'enzaz_health_fee' => $add_enjaz_health_fee,
                     'enzaz_file_upload' => $fileName3,
					 'enzaz_date' => $enjaz_date,
					 'enzaz_note' => $add_enjaz_note,
					 'enzaz_entry_date' => $enjaz_entry_date,
					 
					 'embassy_visa_stamping_status' => $add_embasy_status,
                     'embassy_file_upload' => $fileName4,
					 'embassy_date' => $embasy_date,
                     'embassy_note' => $add_embasy_note,
                     'embassy_entry_date' => $embasy_entry_date,
					 
					 'ticket_price_in_taka_and_dollar' => $add_price,
                     'ticket_number' => $add_ticket_number,
					 'ticket_location' => $add_ticket_location,
                     'ticket_flying_date' => $flying_date,
                     'ticket_flying_time' => $add_flying_time,
                     'ticket_ticket_purchase_date' => $ticket_purchase_date,
					 'ticket_note' => $add_ticket_note,
					 'ticket_entry_date' => $ticket_entry_date
                  

            );

            $table_name='passport_makings';
            $insert_result = $this->common_model->insertData($table_name,$data);


            if($insert_result):
                $this->session->set_userdata('msg_title', 'Success');
                $this->session->set_userdata('msg_body','Successfull');
            else:
                $this->session->set_userdata('msg_title', 'Error');
                $this->session->set_userdata('msg_body','Failed' );
            endif;
            redirect('create_new');
        else:

            redirect('home');
        endif;
    }


   
    public function getData() {

        $data['base_url'] = $this->config->item('base_url');
        $id = mysql_real_escape_string($this->input->post('id'));

        $table_name='base_models';
        $result = $this->common_model->getDataWhere($table_name,"id",$id);
        echo json_encode($result);


    }
}
?>
