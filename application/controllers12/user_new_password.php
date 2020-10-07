<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_new_password extends CI_Controller {
    private  $mmslEmail;
    public function __construct() {

        parent::__construct();
        $this->load->model('common_model');
        $this->load->helper('url');
    }

    public function index() {

        $data['base_url'] = $this->config->item('base_url');
        $data['active_menu'] = 'Dashboard';
        $data['active_sub_menu'] = 'Dashboard';
        $data['id'] = mysql_real_escape_string($this->input->get('id'));
        $data['ran'] = mysql_real_escape_string($this->input->get('ran'));
        $this->load->view('user_new_password/header_fresh',$data);
        $this->load->view('user_new_password/index',$data);
        $this->load->view('common/footer',$data);
        $this->load->view('user_new_password/js',$data);
        $this->session->unset_userdata('msg_title');
        $this->session->unset_userdata('msg_body');


    }

    public function get_new_password() {
        $data['base_url'] = $this->config->item('base_url');
        $data['active_menu'] = 'Dashboard';
        $data['active_sub_menu'] = 'Dashboard';
        $id=$this->uri->segment(3);
        $data['ran']=$this->uri->segment(4);
        $data['id'] =  base64_decode($id . str_repeat('=', strlen($id) % 4));
        $this->load->view('common/header',$data);
        $this->load->view('user_new_password/index',$data);
        $this->load->view('common/footer',$data);
        $this->load->view('common/js',$data);
        $this->session->unset_userdata('msg_title');
        $this->session->unset_userdata('msg_body');
    }

    public function set_new_password() {
        $id = mysql_real_escape_string($this->input->post('id'));
        $ran = mysql_real_escape_string($this->input->post('ran'));
        $new_password = mysql_real_escape_string($this->input->post('new_password'));
        $lenstring = strlen($new_password);

        $table_name='user';
        $column_name='user_id';
        $column_value=$id;
        $result_email_id = $this->common_model->getDataWhere($table_name,$column_name,$column_value);
        foreach ($result_email_id as $row) :
            $this->mmslEmail=$row->email;

        endforeach;


        if (!ctype_alpha($new_password) && !ctype_digit($new_password)) :
        // echo "The string $new_password consists of all letters or digits.\n";

        else :
            $this->session->set_userdata('msg_title', 'Error');
            $this->session->set_userdata('msg_body', 'New password must contain alphabet and numbers.');

            redirect('user_new_password?id='.$id.'&ran='.$ran);
        //   echo "The string $new_password does not consist of all letters or digits.\n";
        endif;

        $data_array = array(
                'password'=>base64_encode($new_password),
                'status'=>1

        );
        $result = $this->common_model->updateData('user',$data_array,'user_id',$id);

        if($result):
            include_once 'excelclass/class.smtp.php';
            include_once 'excelclass/class.phpmailer.php';
            //$from="here.cms@gmail.com";
            $to = $this->mmslEmail;
            $subject = "Bl TopUp New Password Mail";
            $message="<html>
            <body>
             Your Bl TopUp new password is : <br>".$new_password."
            </body>
            </html>";


            $email_arr= explode("@",$to );

            if($email_arr[1]=="mmservices.com.bd") {
                $mail = new PHPMailer(); // create a new object
                $mail->IsSMTP(); // enable SMTP
                $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
                $mail->SMTPAuth = true; // authentication enabled
                $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
                $mail->Host = "geo.websitewelcome.com";
                $mail->Port = 465; // or 587
                $mail->IsHTML(true);
                $mail->Username = "test@mmservices.com.bd";
                $mail->Password = "abcd123ABCD";
                $mail->SetFrom("cubespizzammsl@gmail.com");
                $mail->Subject = $subject;
                $mail->Body = $message;
                $mail->AddAddress($to);
            }else {
                $mail = new PHPMailer(); // create a new object
                $mail->IsSMTP(); // enable SMTP
                $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
                $mail->SMTPAuth = true; // authentication enabled
                $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
                $mail->Host = "smtp.gmail.com";
                $mail->Port = 465; // or 587
                $mail->IsHTML(true);
                $mail->Username = "cubespizzammsl@gmail.com";
                $mail->Password = "mmsl123456";
                $mail->SetFrom("asad@gmail.com");
                $mail->Subject = $subject;
                $mail->Body = $message;
                $mail->AddAddress($to);
            }



            $mail->Send();
            $this->session->set_userdata('msg_title', 'Success');
            $this->session->set_userdata('msg_body', 'SuccessFully passwprd changed And new password send to your mail inbox');
        else:
            $this->session->set_userdata('msg_title', 'Error');
            $this->session->set_userdata('msg_body', 'Sorry, Failed');
        endif;

        redirect('home');
    }





}
?>
