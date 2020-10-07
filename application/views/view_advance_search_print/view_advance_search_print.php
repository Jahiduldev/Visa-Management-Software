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


                    ?>
                <tr>
                    <td ><?=$reference_name?></td>
                    <td ><?=$broker_name?></td>
                    <td ><?=$passport_no?></td>
                    <td ><?=$name?></td>
                    <td ><?=$basic_id_number?></td>
                    <td ><?=$basic_visa_number?></td>
                    <td ><?=$okala_sponsor_name?></td>
                </tr>
                <?php
                endforeach;
                ?>
            </table>
        </div>

    </body>
</html>