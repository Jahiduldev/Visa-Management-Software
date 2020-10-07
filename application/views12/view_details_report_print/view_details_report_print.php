<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Alsmani</title>

        <style type="text/css">

            #container{
                margin-top: 5%
            }
            table {
                table-layout: fixed;
                width:100%;
                border-collapse: collapse;

            }

        </style>
    </head>
    <body onload="window.print()">
        <div id="container">
            <h1 style="text-align:center">Alsmani</h1>
             <h4 style="text-align:left">Passport</h4>
            <table border="1">
                <tr>
                    <th>Reference Name</th>
                    <th>Broker Name</th>
                    <th>Passport No</th>
                    <th>Name</th>
                    <th>ID Number</th>
                    <th>Visa Number</th>
                    <th>Sponsor Name</th>
                    
                     <th>Enjaz</th>
                     <th>Okala</th>
                     <th>Fitcard</th>
                     <th>Embasy</th>
                     <th>Fingering</th>
                     <th>Gender</th>
                     <th>Passport Side</th>
                </tr>
                <?php
                foreach ($print_data as $row):
                    $reference_name=$row->reference_name;
                    $broker_name=$row->broker_name;
                    $passport_no=$row->passport_no;
                    $name=$row->name;
                    $basic_id_number=$row->basic_id_number;
                    $basic_visa_number=$row->basic_visa_number;
                    $okala_sponsor_name=$row->okala_sponsor_name;

    $enzaz_mufa_number=$row->enzaz_mufa_number;
      if($enzaz_mufa_number=="" || $enzaz_mufa_number==NULL) {
                                $val2 = "<p style='color:red;'>Incomplete</p>";
                            }
                            else {
                                $val2 = "<p style='color:green;'>Complete</p>";
                            }
    
    $okala_status=$row->okala_status;
     if($okala_status=="Receive") {
                                $val4 = "<p style='color:green;'>Complete</p>";
                            }
                            else {
                                $val4 = "<p style='color:red;'>Incomplete</p>";
                            }
    
    $fit_receive_receive_date=$row->fit_receive_receive_date;
      if($fit_receive_receive_date=="" || $fit_receive_receive_date==NULL) {
                                $val6 = "<p style='color:red;'>Incomplete</p>";
                            }
                            else {
                                $val6 = "<p style='color:green;'>Complete</p>";
                            }
    
     $embassy_visa_stamping_status=$row->embassy_visa_stamping_status;
        if($embassy_visa_stamping_status !='Complete' || $embassy_visa_stamping_status==NULL) {
                                $val8 = "<p style='color:red;'>Incomplete</p>";
                            }
                            else {
                                $val8 = "<p style='color:green;'>Complete</p>";
                            }   
     $basic_fingering=$row->basic_fingering;
      if($basic_fingering=="Receive") {
                                $val10 = "<p style='color:green;'>Complete</p>";

                            }
                            else {
                                $val10 = "<p style='color:red;'>Incomplete</p>";
                            }
     
     $basic_passport_type=$row->basic_passport_type;
      $basic_receive_site=$row->basic_receive_site;
                    ?>
                <tr>
                    <td ><?=$reference_name?></td>
                    <td ><?=$broker_name?></td>
                    <td ><?=$passport_no?></td>
                    <td ><?=$name?></td>
                    <td ><?=$basic_id_number?></td>
                    <td ><?=$basic_visa_number?></td>
                    <td ><?=$okala_sponsor_name?></td>
                    
                    <td ><?=$val2?></td>
                    <td ><?=$val4?></td>
                    <td ><?=$val6?></td>
                    <td ><?=$val8?></td>
                    <td ><?=$val10?></td>
                    
                    <td ><?=$basic_passport_type?></td>
                    <td ><?=$basic_receive_site?></td>
                    
                </tr>
                <?php
                endforeach;
                ?>
            </table>
        </div>

    </body>
</html>