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
             <h4 style="text-align:left">Enjaz Permission</h4>
            <table border="1">
                <tr>
                   
                                        <th>Name</th>
                                        <th>Passport No</th>
                                        <th>Note</th>
                                        <th>SMS</th>
                                        <th>Status</th>
					<th>Enjaz Req. Date</th>
                                        <th>Action</th>
                </tr>
                <?php
                foreach ($print_data as $row):
                    $passport_name=$row->passport_name;
                    $passport_number=$row->passport_number;
                    $en_note=$row->en_note;
                    $date_time=$row->date_time;
                    $smsbox=$row->smsbox;
                    $status=$row->status;
                   
 if($status==2){
                $status1="Pending";
            }else if($status==1){
                 $status1="Approved";
            }else if($status==3){
                 $status1="Rejected";
            }else{
                $status1="";
            }


   if($status==2){
                $status2="Not Done";
            }else{
                $status2="Done";
            }

                    ?>
                <tr>
                    <td ><?= $passport_name?></td>
                    <td ><?=$passport_number?></td>
                    <td ><?=$en_note?></td>
                    <td ><?=$smsbox?></td>
                    <td ><?=$status1?></td>
                    <td ><?=$date_time?></td>
                    <td ><?=$status2?></td>
                </tr>
                <?php
                endforeach;
                ?>
            </table>
        </div>

    </body>
</html>