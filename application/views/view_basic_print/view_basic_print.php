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
            <h1 style="text-align:center">EXPLORER AIR INTERNATIONAL</h1>
             <h4 style="text-align:left">Basic Information</h4>
            <table border="1">
              
                <?php
               foreach ($print_data as $row):
                    $name=$row->name;
                    $passport_no=$row->passport_no;
                    $basic_id_number=$row->basic_id_number;
                    $basic_visa_number=$row->basic_visa_number;
                   
                    $basic_visa=$row->basic_visa; 
					 $basic_fingering=$row->basic_fingering; 
					  $reference_name=$row->reference_name; 
					   $broker_name=$row->broker_name; 
					   $broker_mobile_number=$row->broker_mobile_number; 
					  $reference_mobile_number=$row->reference_mobile_number; 
					   $broker_name=$row->broker_name;
					   $okala_sponsor_name=$row->okala_sponsor_name; 
					   $basic_receive_site=$row->basic_receive_site;
						$basic_flight=$row->basic_flight; 
					   $amount_of_money=$row->amount_of_money; 
						$basic_note=$row->basic_note; 
					   $basic_entry_date=$row->basic_entry_date;


                      $cooking=$row->cooking;
                      $clerning=$row->clerning;
                      $baby=$row->baby;
                      $driving=$row->driving;
                      $post_apply=$row->post_apply;
                      $visa_type=$row->visa_type;
                      $add_experience=$row->add_experience;
                      $basic_passport_type=$row->basic_passport_type;
                      $dob=$row->dob;
                      $mobile_number=$row->mobile_number;
                      $basic_visa_number=$row->basic_visa_number;
                      $passport_owner=$row->passport_owner;
                      







                    				   
					   
                   endforeach;

                    ?>
				 <tr>                
                   <td >Name</td>
                    <td ><?=$name?></td> 				  
                </tr>
                <tr>
                    <td >Passport No.</td>
                    <td ><?=$passport_no?></td>
                    
                </tr>





                  <tr class="test">
                    <td >Mobile Number</td>
                    <td ><?=$mobile_number?></td>                   
                 </tr>
              

				<!-- <tr>
                    <td >ID Number</td>
                    <td ><?=$basic_id_number?></td>                   
                </tr> -->
				<tr>
                    <td >Visa Number</td>
                    <td ><?=$basic_visa_number?></td>                   
                </tr>
                   <tr class="test">
                    <td >Visa Type</td>
                    <td ><?=$visa_type?></td>                   
                 </tr>

                 <tr class="test">
                    <td >Date of Birth</td>
                    <td ><?=$dob?></td>                   
                 </tr>
                 <tr class="test">
                    <td >Passenger Experience</td>
                    <td ><?=$add_experience?></td>                   
                 </tr>
				
				
				<tr>
                    <td >Agent Name</td>
                    <td ><?=$reference_name?></td>                   
                </tr>
				
			<!-- 
				<tr>
                    <td >Agent Mobile Number</td>
                    <td ><?=$reference_mobile_number?></td>                   
                </tr> -->

               <!--  <tr class="test">
                    <td >Sponsor Name</td>
                    <td ><?=$okala_sponsor_name?></td>                   
                 </tr> -->
                 <tr class="test">
                    <td >Gender</td>
                    <td ><?=$basic_passport_type?></td>                   
                 </tr>
                  <!-- <tr class="test">
                     <td >Passport Copy</td>
                        <td >
            
                              <img style="margin-left:42%" alt="avatar" src="<?= $base_url //. 'public/uploads/'.$passport_owner?>" width="150" height="150">                                     
                      </td> 
                 </tr> -->
                 <tr class="test">
                    <td >Cooking</td>
                    <td ><?=$cooking?></td>                   
                 </tr>
                 <tr class="test">
                    <td >Clerning</td>
                    <td ><?=$clerning?></td>                   
                 </tr>
                <tr class="test">
                    <td >Baby Sitting</td>
                    <td ><?=$baby?></td>                   
                 </tr>
                  <tr class="test">
                    <td >Driving</td>
                    <td ><?=$driving?></td>                   
                 </tr>
                 <tr class="test">
                    <td >Post Apply For</td>
                    <td ><?=$post_apply?></td>                   
                 </tr>
                
				
				
				
				<!-- 
				<tr>
                    <td >Amount Of Money</td>
                    <td ><?=$amount_of_money?></td>                   
                </tr> -->
				<tr>
                    <td >Note</td>
                    <td ><?=$basic_note?></td>                   
                </tr>
				<tr>
                    <td >Entry Date</td>
                    <td ><?=$basic_entry_date?></td>                   
                </tr>
              
            </table>
             
        </div>
    <br><br><br><div id="left"><u>Approval Signature</u></div>
    <div id="right"><u>Receiver Signature</u></div>
        
        
        
         

    </body>
</html>




