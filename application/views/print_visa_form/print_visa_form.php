
<!DOCTYPE html>
<html  >
    <head >
	 <meta charset="utf-8">
        <title>Page Title</title>
        <style type="text/css">
            table {
                table-layout: fixed;
                width:100%;
                padding: 50px;
            }
            td {
                width: 50%;
                padding: 10px;
                font-size: 17px;
                font-weight: bold;
            }
            th {
                width: 100%;
                padding: 0px;
            }
			h3 {
    text-align: center;
}
  table.bottomBorder { 
    border-collapse: collapse; 
  }
  table.bottomBorder td, 
  table.bottomBorder th { 
    border-bottom: 1px solid black; 
    padding: 1px; 
    text-align: left;
  }
  
 

        </style>
		
		
    </head>
	
    <body  <?php if(isset($_REQUEST['print'])) echo'onload="window.print()"' ?>  bgcolor="#fff" >
        <?php
        foreach ($emp_info as $row) :
            $saudi_emp_name_eng = $row->saudi_emp_name_eng;
            $visa_no_eng = $row->visa_no_eng;
            $visa_date_eng = $row->visa_date_eng;
            $full_name_eng = $row->full_name_eng;
            $pas_no_eng = $row->pas_no_eng;
            $date_passport_issue = $row->date_passport_issue;
			$date_passport_exp= $row->date_passport_exp;
            $prof_eng = $row->prof_eng;
            $add_religion = $row->add_religion;
			$mother_name= $row->mother_name;
			$authorization= $row->authorization;
			$date_of_birth=$row->date_of_birth;
			$place_of_birth=$row->place_of_birth;
			$add_sex=$row->add_sex;
			$marital_status =$row->marital_status;
        endforeach;
        ?>
		<div>
		<form action=""><button type="submit" name="print" >print</button> </form>
		<table class="bottomBorder" >
		<div>
		<h3>ENJAZ NUMBER</h3>
		<h3>NEW:227696176</h3>
		<img align="left" src="<?=$base_url?>/visa alsmani/photo.jpg"  width="62" height="62">
		
	
		
		<h3></h3>
		
		<center><img src="<?=$base_url?>/visa alsmani/tree.jpg"  width="42" height="42"></center>
		
		<p style="text-align: right"><B>سفرة المملكة العربية السعودية
<br>القسم القنصلي</B><br>EMBASSY OF SAUDI ARABIA<br>CONSULAR SECTION
</p>

</h3>
		
		</div>
		
		 
            <tr >

				   <td colspan="2" style="text-align: left">Full name</td>
			 
				
				  <td style="text-align: left"><?= $full_name_eng ?></td>
		
				  <td colspan="2" style="text-align: right">السم الكامل</td>
				 
            </tr>
			
			
		
            <tr>

                <td colspan="2" style="text-align: left">Mother's name</td>
				  <td style="text-align: left"><?= $mother_name ?></td>
				  <td colspan="2" style="text-align: right">اسم الولادة:</td>
            </tr>
			
			<tr>

                <td colspan="2" style="text-align: left">Date of birth</td>
				  <td style="text-align: left"><?= $date_of_birth ?> &nbsp&nbsp&nbsp تاريخ الولادة &nbsp&nbsp&nbsp Place of birth:<?= $place_of_birth ?> &nbsp&nbsp&nbsp <?= $date_of_birth ?></td>
				   <td colspan="2" style="text-align: right"> محل الولادة</td>
				 
				 
            </tr>
			
			<tr>

                <td colspan="2" style="text-align: left">Previous nationality</td>
				  <td style="text-align: left"> الجنسية السابقة&nbsp&nbsp&nbsp Present nationality:BANGLADESHI&nbsp&nbsp&nbsp </td>
				   <td colspan="2" style="text-align: right"> الجنسية الحالية</td>
				 
				 
            </tr>
			<tr>

                <td colspan="2" style="text-align: left">Sex</td>
				  <td style="text-align: left"><?= $add_sex ?> الجنس &nbsp&nbsp&nbsp Marital Status:&nbsp&nbsp&nbsp  <?= $marital_status ?> </td>
				   <td colspan="2" style="text-align: right"> الحالة الاجتما عية</td>
				 
				 
            </tr>
			
			<tr>

                <td colspan="2" style="text-align: left">Sect</td>
				  <td style="text-align: left">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp المذهب &nbsp&nbsp&nbsp Relegion:&nbsp&nbsp&nbsp  <?= $add_religion ?> </td>
				   <td colspan="2" style="text-align: right"> الديـانة</td>
				 
				 
            </tr>
			
			<tr>

                <td colspan="2" style="text-align: left">Place of issue</td>
				  <td style="text-align: left">مصدرة &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Qualification &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  المؤهل العلمي &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Profession: <?= $prof_eng ?> </td>
				  <td colspan="2" style="text-align: right"> المهنة</td>
				 
				 
            </tr>
            <tr>

                <td  colspan="2" style="text-align: left">Home address and telephone No.:</td>
				 <td style="text-align: left"></td>
				  <td colspan="2" style="text-align: right">
				  عنوان المنزل ورقم التلفون</td>
 
            </tr>
			
			
				<tr>
					<td  colspan="2" style="text-align: left"></td>
					 <td style="text-align: left"></td>
					  <td colspan="2" style="text-align: right">
					  </td> 
				</tr>
			
			
				<tr>

                <td  colspan="2" style="text-align: left">Business address and telephone No</td>
				 <td style="text-align: left">FATEMA OVERSEAS R.L 1205</td>
				  <td colspan="2" style="text-align: right">
				 </td>
 
                </tr>
				<tr>
					<td  colspan="5" style="text-align:center;">HOUSE # H 81, BIR UTTAM ZIAUR RAHMAN ROAD, BANANI C/A, DHAKA-1213, BANGLADESH TEL. 880-2-9857702, FAX +88-02-9857702</td>	  
				</tr>
			<tr>
					
					<td  colspan="1">
					Purpose of travel:
					</td>
					<td colspan="3">
					<table>
					<tr>
					<td style="border:1px solid #000;width:20px;text-align:center; " >
					عمل<br/>
					Work

					</td>
					<td style="border:1px solid #000;width:25px;text-align:center;">
					مرور<br/>
					Transit

					</td>
					<td style="border:1px solid #000;width:20px;text-align:center;">
					زيارة<br/>
					Visit
					</td>
					<td style="border:1px solid #000;width:25px;text-align:center;">
					عمرة<br/>
					Umrah

					</td>
					<td style="border:1px solid #000; width:45px;text-align:center;">
					للاقامة<br/>
					Residence

					</td>
					<td style="border:1px solid #000;width:20px;text-align:center;">
					حج<br/>
					Hajj

					</td>
					<td style="border:1px solid #000; width:50px;text-align:center;">
					دبلوماسية<br/>
					Diplomacy
					</td>
					</tr>
					</table>
					
					</td>
					 <td  colspan="1">
					 الغاية من السفر:
					</td>
					  
				</tr>
				
				
			
            <tr>

                <td colspan="2" style="text-align: left">محل الاصدار<br>Place of issue:</td>
				
				<td colspan="2" style="text-align: left">تاريخ الاصدار<br>Date Of Passport issue:<?= $date_passport_issue ?> </td>
				 <td colspan="2" style="text-align: right">رقم الجواز<br>Passport No.:<?= $pas_no_eng ?></td> 
				 
            </tr>
			
			

            <tr>
				<td colspan="3" style="text-align: left">Date Of Passport expiry:<?= $date_passport_exp ?>  </td>
                <td colspan="3" style="text-align: right">تاريخ انتهاء صلاحية جواز السفر</td> 				
            </tr>
			
			<tr>
                <td colspan="2" style="text-align: left">مدة الاقامة بالمملكة<br>Duration of stay in the Kingdom:</td>
				<td colspan="2" style="text-align: left">تاريخ الوصول<br>Date of arrival:</td>
                <td colspan="2" style="text-align: left">تاريخ المغادرة<br>Date of departure:</td>				
            </tr>
			
			<tr>
                <td colspan="1" style="text-align: left">تاريخ<br>Mode of Payment: </td>
				<td colspan="1" style="text-align: left">ايصال رقم<br>(&nbsp&nbsp)Free:</td>
                <td colspan="1" style="text-align: left">(&nbsp&nbsp)تاريخ<br>(&nbsp&nbsp)Cash:</td>
				
				
				<td colspan="1" style="text-align: left">(&nbsp&nbsp)بشيك رقم:<br>(&nbsp&nbsp)Cheque No:</td>
				<td colspan="1" style="text-align: left">نقدا<br>(&nbsp&nbsp)Date: (&nbsp&nbsp)مجاملة<br>No:</td>
               			
            </tr>
			<tr>
				<td colspan="3" style="text-align: left">Relationship: </td>
                <td colspan="3" style="text-align: right">اسم المحرم: </td> 				
            </tr>
			<tr>
				<td colspan="1.5" style="text-align: left">Destination:</td>
                <td colspan="1.5" style="text-align: left">جهة الوصول بالمماكة </td>
				<td colspan="1.5" style="text-align: right">Carrier's name:</td>
                <td colspan="2" style="text-align: right">اسم الشركة الناقلة </td> 		 				
            </tr>
			
			<tr>
				<td colspan="2.5" style="text-align: left">Dependents traveling in the same passport:</td>
                <td colspan="3" style="text-align: right">ايضاحات تخص افراد العائلة (المضافين) علي  نفس جواز السفر</td>
			</tr>
			
			<tr>
			<td colspan="6" >
			<table border = "1">
			<tr>
			<td>
			نوع الصلة
			</td>
			<td>
			تاريخ الميلاد
			</td>
			<td>
			التنــــــــــس 
			</td>
			<td>
			اسم بـالكـــــــامل
			</td>
			
			</tr>
			<tr>
			<td>
			Relationship
			</td>
			<td>
			Date of birth
			</td>
			<td>
			Sex
			</td>
			<td>
			Full name
			</td>
            </tr>
			<tr>
			<td>
			&nbsp
			</td>
			<td>
			&nbsp
			</td>
			<td>
			&nbsp
			</td>
			<td>
			&nbsp
			</td>
			
			</tr>
			<tr>
			<td>
			GROUP: 
			</td>
			<td>
			&nbsp
			</td>
			<td>
			&nbsp
			</td>
			<td>
			&nbsp
			</td>
			
			</tr>
			<tr>
			<td>
			&nbsp
			</td>
			<td>
			&nbsp
			</td>
			<td>
			&nbsp
			</td>
			<td>
			&nbsp
			</td>
			
			</tr>
			<tr>
			<td>
			&nbsp
			</td>
			<td>
			&nbsp
			</td>
			<td>
			&nbsp
			</td>
			<td>
			&nbsp
			</td>
			</tr>
			
			
			</table>
			</td>
	
			</tr>
			<tr>
				<td colspan="2.5" style="text-align: left">Name and address of company or individual in the kingdom:</td>
                <td colspan="3" style="text-align: right">اسم وعنوان الشركة او اسم الشخس وعنوان بالمملكة</td>
			</tr>
			
				<tr>
					<td  colspan="5" style="text-align:left;">MOHAMMED NASSER FOUNDATION THE THEBAN GENERAL CONTRACTING</td>	  
				</tr>
				<tr>
				<td colspan="3" style="text-align: left">The undersigned hereby certify that all the information I have provided are correct:<br>I will abide by the laws of the Kingdom during the period of my residence in it.<br>Date:&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbspالتريخ &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				Signature:&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp التوفيع  &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
				Name&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  <?= $full_name_eng ?> &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp السم</td>    
				</td>
				
                
			<td colspan="3" style="text-align: right">انا الموقع ادناه اقر بان كل المعلومات التي دونها صحيصه.<br>وساكون ملتزما بقوانين المملكة اثناء فترة وجودي بها</td>
			
			</tr>
			<tr>
				<td colspan="2.5" style="text-align: left"><u>For official use only:</u><br>Date:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp Authorization:<?= $authorization ?> 
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbspرقم الامر المعتمد عليه اعطاء التاشيرة:
				</td>
                <td colspan="3" style="text-align: right"><u>للاستعمال الرسمي فقط</u></td>
			</tr>
			<tr>
				<td colspan="2.5" style="text-align: left">Visit/Work for:</td>
				<td colspan="2.5" style="text-align: left">مؤسسة محمد ناصر ال ذيبان للمقاولات العامة</td>
                <td colspan="3" style="text-align: right">الزيارة – العمل لدي</td>
			</tr>
            
            
          <tr>
                <td colspan="1" style="text-align: left">Date :</td>
                <td colspan="1" style="text-align: left"><?= $visa_date_eng ?> تاريخ</td>
				<td colspan="1" style="text-align: right">Visa No.</td>
                <td colspan="2" style="text-align: right"> تاريخ</td>

            </tr>

          <tr>
                <td colspan="5" style="text-align: left">FEE COLLECTED:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp المبلع المحصل
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp Type 
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp	نوعها:	
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp	Duration:	
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp

				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp				:مدتها </td>
                

            </tr>
			 <tr>
                <td colspan="2" style="text-align: left">رشيس القسم القنصلي</td>
             
                <td colspan="3" style="text-align: right"> مدقق البيانات</td>

            </tr>
			<tr>
			
                <td colspan="5" style="text-align: center"><img align="left" src="<?=$base_url?>/visa alsmani/ms.jpg"  width="1200" height="62"></td>
             
              

            </tr>

          


        </table >
        
		
		
		
		
		
		
		
		
		
	
		
		
		<table>
            <tr>

                <td colspan="2" style="text-align: left">TO</td>
            </tr>
            <tr>

                <td colspan="2" style="text-align: left">HIS EXCELLENCY THE CHIEF OF CONSULATE SECTION</td>
            </tr>
            <tr>

                <td colspan="2" style="text-align: left">ROYAL EMBASSY OF SAUDI ARABIA</td>
            </tr>
            <tr>

                <td colspan="2" style="text-align: left">DHAKA, BANGLADESH</td>
            </tr>

            <tr>

                <td colspan="2" style="text-align: left ;padding-top:35px;">EXCELLENCY</td>
            </tr>

            <tr>

                <td colspan="2"><p style="text-align:justify;padding-top:35px;"><font size="4">WITH DUE RESPECT WE ARE SUBMITTING ONE PASSPORT FOR WORK VISA WITH ALL NECESSARY DOCUMENTS AND PARTICULARS MENTIONED AS BELOW KNOWING ALL INSTRUCTIONS AND REGULATIONS OF CONSULATE SECTION.</font></p></td>
            </tr>
            <tr style="">
                <td style="text-align: left;padding-top:35px; "><font size="4">NAME OF THE EMPLOYMENT IN SAUDI ARABIA  :</font></td>
                <td style="text-align: left;padding-top:35px;"><font size="4"><?= $saudi_emp_name_eng ?></font></td>

            </tr>
            <tr>
                <td style="text-align: left;padding-top:35px;"><font size="4">VISA NO AND DATE :</font></td>
                <td style="text-align: left;padding-top:35px;"><font size="4"><?= $visa_no_eng ?> <?= $visa_date_eng ?></font></td>

            </tr>

            <tr>
                <td style="text-align: left;padding-top:35px;"><font size="4">FULL NAME OF THE EMPLOYEE:</font></td>
                <td style="text-align: left;padding-top:35px;"><font size="4"><?= $full_name_eng ?></font></td>

            </tr>

            <tr>
                <td style="text-align: left;padding-top:35px;"><font size="4">PASSPORT NO. AND DATE:</font></td>
                <td style="text-align: left;padding-top:35px;"><font size="4"><?= $pas_no_eng ?> <?= $date_passport_issue ?></font></td>

            </tr>

            <tr>
                <td style="text-align: left;padding-top:35px;"><font size="4">PROFESSION:</font></td>
                <td style="text-align: left;padding-top:35px;"><font size="4"><?= $prof_eng ?></font></td>

            </tr>
            
             <tr>
                <td style="text-align: left;padding-top:35px;"><font size="4">RELIGION:</font></td>
                <td style="text-align: left;padding-top:35px;"><font size="4"><?= $add_religion ?></font></td>

            </tr>


            <tr>
                <td colspan="2"><p style="text-align: justify ;padding-top:35px;"><font size="4">WE DO HEREBY CONFIRM AND DECLARE THAT RELIGION STATED IN THE VISA FORM AND FORWARDING LETTER IS FULLY CORRECT WE ALSO UNDERTAKE THE RESPONSIBILITY TO CANCEL THE VISA AND TO STOP FUNCTIONING WITH OUR OFFICE IF THE STATEMENT IS FOUND INCORRECT.</font></p></td>
            </tr>
            <tr>

                <td colspan="2"><p style="text-align: justify ;padding-top:35px;"><font size="4">WE THEREFORE REQUEST YOUR EXCELLENCY TO KINDLY ISSUE WORK VISA OUT OF________VISAS AND OBLIGE THEREBY.</font></p></td>
            </tr>
            <tr>

                <td colspan="2" style="text-align: right ;padding-top:35px;" ><font size="4">YOURS FAITHFULLY,</font></td>
            </tr>



        </table >

		<div style="height:400px;">
		</div>
        
        
       
        
        <table>
            <tr>

                <td colspan="2" style="text-align: left">EMPLOYMENT CONTRACT</td>  <td colspan="2" style="text-align: right">:عقد التوظيف</td>
            </tr>
           <tr>
                <td style="text-align: left">1st Party  :</td>
                <td style="text-align: left"><?= $saudi_emp_name_eng ?></td>
                <td colspan="2" style="text-align: right">:الطرف الأول</td>

           </tr>
            <tr>
                <td style="text-align: left">2nd Party  :</td>
                <td style="text-align: left"><?= $full_name_eng ?></td>
                <td colspan="2" style="text-align: right">:الطرف الثاني</td>

           </tr>
		   <tr>
                <td style="text-align: left">Nationality  :</td>
                <td style="text-align: left">BANGLADESHI</td>
                <td colspan="2" style="text-align: right">:الصفة القومية</td>
           </tr>
            <tr>
                <td style="text-align: left">Passport No :</td>
                <td style="text-align: left"><?= $pas_no_eng ?></td>
                <td colspan="2" style="text-align: right">:رقم جواز السفر</td>

            </tr>
		   
            <tr>
                <td style="text-align: left">Profession :</td>
                <td style="text-align: left"><?= $prof_eng  ?></td>
                <td colspan="2" style="text-align: right">:مهنة</td>

            </tr>

            <tr>

                <td colspan="2"><p style="text-align:justify;">1. That the 1st party shall pay to the 2nd party a monthly salary of 800SR. plus overtime accordingly to Saudi Labor Law.</p></td> <td colspan="2" style="text-align: right">إن الطرف الاول يدفع الطرف الثاني راتب شهري800 ريال سعودي بالاضافة حست القانون العامل اممــلكــة العربيــة السعوديــة </td>
            </tr>
            <tr>

                <td colspan="2"><p style="text-align:justify;">2. That the 1st party should provide 2nd partys free medical, free single accommodation and free food facilities during the period of contract in the kingdom of Saudi Arabia</p></td> <td colspan="2" style="text-align: right">يلتزم الطرف الامل الطلب السكن الاطرف الثاني مجانا خلال مدة المملكــــة العربيــة السعوديـــة </td>
            </tr>
            <tr>

                <td colspan="2"><p style="text-align:justify;">3. That the 1st party shall provide free transportation from resident to the work site</p></td> <td colspan="2" style="text-align: right">يلتزم ىالطرف الاول النقل للطرف الثاني من السكن الي محل العمل مجانا </td>
            </tr>

            <tr>

                <td colspan="2"><p style="text-align:justify;">4. He period of contract is of 2(two) years </p></td> <td colspan="2" style="text-align: right">ان مدة العقد سنتان  </td>
            </tr>

            <tr>

                <td colspan="2"><p style="text-align:justify;">5. That the 1st party shall bear the passage cost from Dhaka to K.S.A and back to Dhaka for joining the service and the return ticket would provide after completion this agreement</p></td> <td colspan="2" style="text-align: right">حيث الطرف الاول يدفع نصف قمة التذكرة خطوط الجوية للطرف الثاني من كتمندووالي المملكـــة المباشرة العمل وتنكريــــــة العودة الي كتمندو وبعد انتهاأ مدة </td>
            </tr>

           <tr>

                <td colspan="2"><p style="text-align:justify;">6. Daily working hours shall be 8 hours. </p></td> <td colspan="2" style="text-align: right">ساعات العمل يكون (8) ساعات يوميا </td>
            </tr>
            
             <tr>

                <td colspan="2"><p style="text-align:justify;">7. That this agreement shall come in effect from the date of the 2nd party in the Kingdom of Saudi Arabia.</p></td> <td colspan="2" style="text-align: right">حيث ان هذا العقد يعتبر بعد وصول الطرف الثاني في المملكـــة العربيــــة السعوديــــة </td>
            </tr>


           <tr>

                <td colspan="2"><p style="text-align:justify;">8. That the 2nd party should undertake to abide by the instruction and rules enforces in the Kingdom of Saudi Arabia.</p></td> <td colspan="2" style="text-align: right">حيث ان الطرف الثاني ليجمع التعليمات والقرارتالساري المفعول في المملكــــــة العربيـــــة السعودـــــة </td>
            </tr>

               <tr>

                <td colspan="2"><p style="text-align:justify;">9. That the any other terms and conditions not mentioned in the demand letter shall be following as per Saudi Labour Laws.</p></td> <td colspan="2" style="text-align: right">حيث ان اي شرط لم يذكر فثي ورقة الطلب يعمل حسب القانون العامل المملكــــــة العربيــــة السعوديــــة  </td>
            </tr>
           <tr>

                <td colspan="2"><p style="text-align:justify;"><u>Signature of the First Party</u></p></td> <td colspan="2" style="text-align: right"><u>توقيع الطرف الاول</u></td>
            </tr>
			
			 <tr>

                <td colspan="2"><p style="text-align:justify;"><u>Signature of the Second Party</u></p></td> <td colspan="2" style="text-align: right"><u>توفيع الطرف الثاني</u></td>
            </tr>



        </table>
		
        

    </body>

</html>













