<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Alsylhet</title>

        <style type="text/css">

            #container{
                margin-top: 5%
            }
            table {
                table-layout: fixed;
                width:100%;
                border-collapse: collapse;
            }
            td{
                padding:8px;
            }
            #left {
                float: left;
                text-align: left;
                padding-right: 10px;
            }
            #right {
                float: right;
                text-align: right;
                padding-left: 10px;
            }
        </style>
    </head>
    <body onload="window.print()">
        <div id="container">
            <h1 style="text-align:center">Alsylhet</h1>
            <h4 style="text-align:left">All Information </h4>
            <table border="1">

                <?php
                foreach ($print_data as $row):
                    $ok_spon_name = $row->okala_sponsor_name;
                    $ok_office = $row->okala_office;
                    $ok_status = $row->okala_status;
                    $ok_note = $row->okala_note;

                    $name = $row->name;
                    $passport_number = $row->passport_no;
                    $mobile_number = $row->mobile_number;
                    $id_no = $row->basic_id_number;
                    $visa_no = $row->basic_visa_number;
                    $passport_preview = $row->passport_preview;
                    $police_clearance = $row->police_clearance;
                    $training = $row->training;
                    $fingering = $row->basic_fingering;
                    $reference_name = $row->reference_name;
                    $reference_mobile_number = $row->reference_mobile_number;
                    $broker_name = $row->broker_name;
                    $broker_mobile_number = $row->broker_mobile_number;
                    $sponsor_name = $row->okala_sponsor_name;
                    $gender = $row->basic_passport_type;
                    $passport_side = $row->basic_receive_site;
                    $basic_flight = $row->basic_flight;
                    $basic_note = $row->basic_note;


                    $enjaz_mufa_number = $row->enzaz_mufa_number;
                    $enjaz_date = $row->enzaz_date;
                    $enjaz_note = $row->enzaz_note;
                    
                    $embassy_file_upload = $row->embassy_file_upload;
                    $embassy_status = $row->embassy_visa_stamping_status;
                    $embassy_date = $row->embassy_date;
                    $embassy_expire_date = $row->embasy_expire_date;
                    $embassy_office = $row->embasy_office;
                    $embassy_note = $row->embassy_note;

                    $fitcard_receive_date = $row->fit_receive_receive_date;
                    $fitcard_expire_date = $row->fit_receive_expire_date;
                    $fitcard_note = $row->fit_receive_note;

                    $manpower_file_upload = $row->manpower_file_upload;
                    $manpower_status = $row->manpower_status;
                    $manpower_date = $row->manpower_date;
                    $manpower_office = $row->manpower_office;
                    $manpower_expire_date_count = date_diff(date_create(date('Y-m-d')), date_create($manpower_date))->format("%R%a");
                    $manpower_note = $row->manpower_note;
                    
                    $ticket_file_upload = $row->ticket_file_upload;
                    $ticket_number = $row->ticket_number;
                    $ticket_location = $row->ticket_location;
                    $ticket_flying_date = $row->ticket_flying_date;
                    $ticket_expire_date_count = date_diff(date_create(date('Y-m-d')), date_create($ticket_flying_date))->format("%R%a");
                    $ticket_note = $row->ticket_note;
                    $basic_flight = $row->basic_flight;
                endforeach;
                ?>
                <tr>
                    <td>Name</td>
                    <td ><?= $name ?></td>                   
                </tr>

                <tr>
                    <td>Passport Number </td>
                    <td ><?= $passport_number ?></td>                   
                </tr>
                
                <tr>
                    <td>Mobile Number </td>
                    <td ><?= $mobile_number ?></td>                   
                </tr>

                <tr>
                    <td>ID NO</td>
                    <td ><?= $id_no ?></td>                   
                </tr>

                <tr>
                    <td>VISA NO</td>
                    <td ><?= $visa_no ?></td>                   
                </tr>

                <tr>
                    <td>Fingering</td>
                    <td ><?= $fingering ?></td>                   
                </tr>

                <tr>
                    <td>Reference Name</td>
                    <td ><?= $reference_name ?></td>                   
                </tr>

                <tr>
                    <td>Reference Mobile Number</td>
                    <td ><?= $reference_mobile_number ?></td>                   
                </tr>

                <tr>
                    <td>BROKER NAME</td>
                    <td ><?= $broker_name ?></td>                   
                </tr>

                <tr>
                    <td>BROKER Mobile Number</td>
                    <td ><?= $broker_mobile_number ?></td>                   
                </tr>

                <tr>
                    <td>Sponsor Name</td>
                    <td ><?= $sponsor_name ?></td>                   
                </tr>
                
                 <tr>
                    <td>Police Clearance</td>
                    <td ><img id="pp" alt="avatar" src="<?= $base_url . 'public/uploads/' . $police_clearance ?>"width="150" height="100"><?= $police_clearance ?>
                    <a href="<?= $base_url . 'public/uploads/' . $police_clearance ?>" target="_blank"><button class="btn btn-success" type="button">Click View</button></a></td>                   
                </tr>
                
                 <tr>
                    <td>Training</td>
                    <td ><img id="pp" alt="avatar" src="<?= $base_url . 'public/uploads/' . $training ?>"width="150" height="100"><?= $training ?>
                    <a href="<?= $base_url . 'public/uploads/' . $training ?>" target="_blank"><button class="btn btn-success" type="button">Click View</button></a></td>                   
                </tr>

                <tr>
                    <td>Gender</td>
                    <td ><?= $gender ?></td>                   
                </tr>

                <tr>
                    <td>Passport Side</td>
                    <td ><?= $passport_side ?></td>                   
                </tr>

                <tr>
                    <td>Basic Flight</td>
                    <td ><?= $basic_flight ?></td>                   
                </tr>

                <tr>
                    <td>Passport Preview</td>
                    <td ><img id="pp" alt="avatar" src="<?= $base_url . 'public/uploads/' . $passport_preview ?>"width="150" height="100"><?= $passport_preview ?>
                    <a href="<?= $base_url . 'public/uploads/' . $passport_preview ?>" target="_blank"><button class="btn btn-success" type="button">Click View</button></a></td>                   
                </tr>

                <tr>
                    <td>Note</td>
                    <td ><?= $basic_note ?></td>                   
                </tr>

                <tr>
                    <td>Fitcard Receive Date</td>
                    <td ><?= $fitcard_receive_date ?></td>                   
                </tr>
                <tr>
                    <td>Fitcard Expire Date</td>
                    <td ><?= $fitcard_expire_date ?></td>                   
                </tr>

                <tr>
                    <td>Fitcard Note</td>
                    <td ><?= $fitcard_note ?></td>                   
                </tr>

                <tr>                
                    <td >Okala Sponsor Name</td>
                    <td ><?= $ok_spon_name ?></td> 				  
                </tr>
                <tr>
                    <td >Okala Office</td>
                    <td ><?= $ok_office ?></td>

                </tr>
                <tr>
                    <td>Okala Status</td>
                    <td ><?= $ok_status ?></td>                   
                </tr>
                <tr>
                    <td>Okala Note</td>
                    <td ><?= $ok_note ?></td>                   
                </tr>

                <tr>
                    <td>Enjaz Mufa Number</td>
                    <td ><?= $enjaz_mufa_number ?></td>                   
                </tr>
                <tr>
                    <td>Enjaz Date</td>
                    <td ><?= $enjaz_date ?></td>                   
                </tr>
                <tr>
                    <td>Enjaz Note </td>
                    <td ><?= $enjaz_note ?></td>                   
                </tr>
                
                <tr>
                    <td>Embassy File</td>
                    <td ><img id="pp" alt="avatar" src="<?= $base_url . 'public/uploads/' . $embassy_file_upload ?>"width="150" height="100"><?= $embassy_file_upload ?>
                    <a href="<?= $base_url . 'public/uploads/' . $embassy_file_upload ?>" target="_blank"><button class="btn btn-success" type="button">Click View</button></a></td></td>                   
                </tr>

                <tr>
                    <td>Embassy Status</td>
                    <td ><?= $embassy_status ?></td>                   
                </tr>
                <tr>
                    <td>Embassy Date</td>
                    <td ><?= $embassy_date ?></td>                   
                </tr>
                <tr>
                    <td>Embassy Expire Date</td>
                    <td ><?= $embassy_expire_date ?></td>                   
                </tr>
                <tr>
                    <td>Embassy Office</td>
                    <td ><?= $embassy_office ?></td>                   
                </tr>
                <tr>
                    <td>Embassy Note</td>
                    <td ><?= $embassy_note ?></td>                   
                </tr>

                <tr>
                    <td>Manpower File</td>
                    <td ><img id="pp" alt="avatar" src="<?= $base_url . 'public/uploads/' . $manpower_file_upload ?>"width="150" height="100"><?= $manpower_file_upload ?>
                    <a href="<?= $base_url . 'public/uploads/' . $manpower_file_upload ?>" target="_blank"><button class="btn btn-success" type="button">Click View</button></a></td></td>                   
                </tr>

                <tr>
                    <td>Manpower Status*</td>
                    <td ><?= $manpower_status ?></td>                   
                </tr>

                <tr>
                    <td>Manpower Date</td>
                    <td ><?= $manpower_date ?></td>                   
                </tr>
                
                <tr>
                    <td >Manpower Office</td>
                    <td ><?= $manpower_office ?></td>

                </tr>
                
                <tr>
                    <td >Manpower Remaining Date</td>
                    <td ><?= $manpower_expire_date_count ?></td>

                </tr>
                
                 <tr>
                    <td>Manpower Note</td>
                    <td ><?= $manpower_note ?></td>                   
                </tr>
                
                <tr>
                    <td>Ticket File</td>
                    <td ><img id="pp" alt="avatar" src="<?= $base_url . 'public/uploads/' . $ticket_file_upload ?>"width="150" height="100"><?= $ticket_file_upload ?>
                    <a href="<?= $base_url . 'public/uploads/' . $ticket_file_upload ?>" target="_blank"><button class="btn btn-success" type="button">Click View</button></a></td>                   
                </tr>
                
                 <tr>
                    <td>Ticket Number</td>
                    <td ><?= $ticket_number ?></td>                   
                </tr>
                
                <tr>
                    <td>Ticket Location</td>
                    <td ><?= $ticket_location ?></td>                   
                </tr>
                
                <tr>
                    <td>Flying Date</td>
                    <td ><?= $ticket_flying_date ?></td>                   
                </tr>
                
                <tr>
                    <td>Ticket Remaining Date</td>
                    <td ><?= $ticket_expire_date_count ?></td>                   
                </tr>
                
                 <tr>
                    <td>Ticket Note</td>
                    <td ><?= $ticket_note ?></td>                   
                </tr>

                 <tr>
                    <td>Basic Flight</td>
                    <td ><?= $basic_flight ?></td>                   
                </tr>


            </table>

        </div>
        <br><br><br><div id="left"><u>Approval Signature</u></div>
        <div id="right"><u>Receiver Signature</u></div>





    </body>
</html>