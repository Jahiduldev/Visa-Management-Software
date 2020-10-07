<?php

class Excel extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('common_model');
        //    $this->load->library('ExportXLS');
    }

    public function index() {
        if (in_array($this->session->userdata('role_id'), array(1,2))):
            $data['base_url'] = $this->config->item('base_url');
            include_once 'excelclass/export-xls.class.php';
            $filename = 'excel_report.xls';
            $xls = new ExportXLS($filename);

            $header[] = "Id";
            $header[] = "No";
            $header[] = "Rank";
            $header[] = "Name";
            $header[] = "Course";
            $header[] = "Cm Date";
            $header[] = "Mobile";
            $header[] = "Docus Received";
            $header[] = "Required Amount";
            $header[] = "Amount Received";
            $header[] = "Amount Due";
            $header[] = "Interest";
            $header[] = "Group No";

            $header[] = "Email";
            $header[] = "NOK Name";
            $header[] = "Unmsn";
            $header[] = "Plotinfo";
            $header[] = "Remarks";
            $xls->addHeader($header);

            $sql_get_data ="select * from successfull_officers";
            $results = mysql_query($sql_get_data);
            while($sql_get_data_result = mysql_fetch_array($results))   // Date Filter
            {
                #add eader as an array
                $k = 0;
                $user_data[$k++] = $sql_get_data_result['army_id'];
                $user_data[$k++] = $sql_get_data_result['army_no'];
                $user_data[$k++] = $sql_get_data_result['rank'];
                $user_data[$k++] = $sql_get_data_result['name_of_army_pers'];
                $user_data[$k++] = $sql_get_data_result['course'];
                $user_data[$k++] = $sql_get_data_result['commision_dt'];
                $user_data[$k++] = $sql_get_data_result['contact_no'];
                $user_data[$k++] = $sql_get_data_result['docus_recvd'];
                $user_data[$k++] = $sql_get_data_result['Required_Amount'];
                $user_data[$k++] = $sql_get_data_result['amnt_recvd'];
                $user_data[$k++] = $sql_get_data_result['amount_due'];
                $user_data[$k++] = $sql_get_data_result['interest'];
                $user_data[$k++] = $sql_get_data_result['group_no'];
                $user_data[$k++] = $sql_get_data_result['email'];
                $user_data[$k++] = $sql_get_data_result['name_of_NOK'];
                $user_data[$k++] = $sql_get_data_result['unmsn'];
                $user_data[$k++] = $sql_get_data_result['plotinfo'];
                $user_data[$k++] = $sql_get_data_result['remarks'];

                $xls->addRow($user_data);
            }

            $xls->sendFile();

        else:
            redirect('home');
        endif;
    }





}
?>
