<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Resend_password extends CI_Controller {
    private $id;
    public function __construct() {

        parent::__construct();
        $this->load->model('common_model');

    }

    public function index() {

        $data['base_url'] = $this->config->item('base_url');
        $data['active_menu'] = 'Dashboard';
        $data['active_sub_menu'] = 'Dashboard';
        $this->load->view('common/header_fresh',$data);
        $this->load->view('resend_password/index',$data);
        $this->load->view('common/footer',$data);
        $this->load->view('common/js',$data);
        $this->load->view('resend_password/js',$data);
        $this->session->unset_userdata('msg_title');
        $this->session->unset_userdata('msg_body');

    }


    public function get_user_id() {

        $data['base_url'] = $this->config->item('base_url');
        $email_add = trim(mysql_real_escape_string($this->input->post('email_add')));

        $table_name='user';
        $column_name='email';
        $column_value=$email_add;
        $result_user_id = $this->common_model->getDataWhere($table_name,$column_name,$column_value);


        $rand_num=rand(50000,90000);
        if(count($result_user_id)) :

            $idval = $result_user_id[0]->user_id;

        else:
            $this->session->set_userdata('msg_title', 'Error');
            $this->session->set_userdata('msg_body', 'Sorry,Your mail id not found');
            redirect('resend_password');
        endif;

        include_once 'excelclass/class.smtp.php';
        include_once 'excelclass/class.phpmailer.php';
        // $from="here.cms@gmail.com";
        $to = $email_add;
        $subject = "Bl TopUp Change Password Mail";
        $message="<html>
            <body>
            please Click this link to change your password.
            http://221.120.96.33/bl_topup/user_new_password/get_new_password/".rtrim(base64_encode($idval),'=')."/". $rand_num."
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
        //$mail->Send();

        //Send mail
        if($mail->Send()):
            //   echo "Success";
            $this->session->set_userdata('msg_title', 'Success');
            $this->session->set_userdata('msg_body', 'SuccessFully password reset activation mail send in your mail inbox.please check your mail inbox.');
        else:

            //  echo $this->email->print_debugger();
            $this->session->set_userdata('msg_title', 'Error');
            $this->session->set_userdata('msg_body', 'Sorry,mail not send');
        endif;


        redirect('resend_password');


    }


}
?>
