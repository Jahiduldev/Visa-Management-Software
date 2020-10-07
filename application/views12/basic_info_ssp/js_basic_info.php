
<script>

    $(document).ready(function() {
       // alert("data");
        var oTable = $('#editable-sample').dataTable({
            "processing": true,
            "serverSide": true,
            "pagingType": "full_numbers",
            "ajax": '<?php echo site_url('basic_info/getTableData'); ?>',
            "aoColumns": [
                {"sClass": "center"},
                {"sClass": "center"},
                         
                
            ],
            "aaSorting": [[ 2, "desc" ]]

        });
    });

	
	
	    function editModal(id){

        $.ajax({
            type: "Post",
            url: "<?php echo site_url('view_customer/getData');  ?>",
            data: {'id':id} ,
            success: function(data) {
                var ob=JSON.parse(data);
                var edit_id=ob[0].id;
                var name=ob[0].name;
                var passport_no=ob[0].passport_no;
                var basic_id_number=ob[0].basic_id_number;
                var basic_visa_number=ob[0].basic_visa_number;
				var basic_fingering=ob[0].basic_fingering;
				var reference_name=ob[0].reference_name;
				var broker_name=ob[0].broker_name;
				var okala_sponsor_name=ob[0].okala_sponsor_name;
				var basic_passport_type=ob[0].basic_passport_type;
				var basic_note=ob[0].basic_note;
				var passport_preview=ob[0].passport_preview;
				
				var fit_receive_medical_name=ob[0].fit_receive_medical_name;
                var fit_receive_file_upload=ob[0].fit_receive_file_upload;
                var fit_receive_submitted_date=ob[0].fit_receive_submitted_date;
                var fit_receive_receive_date=ob[0].fit_receive_receive_date;
				var fit_receive_expire_date=ob[0].fit_receive_expire_date;
				var fit_receive_entry_date=ob[0].fit_receive_entry_date;
				var fit_receive_note=ob[0].fit_receive_note;
				
				var enzaz_mufa_number=ob[0].enzaz_mufa_number;
                var enzaz_re_mufa_number=ob[0].enzaz_re_mufa_number;
                var enzaz_mufa_fee=ob[0].enzaz_mufa_fee;
                var enzaz_visa_fee=ob[0].enzaz_visa_fee;
				var enzaz_health_fee=ob[0].enzaz_health_fee;
				var enzaz_file_upload=ob[0].enzaz_file_upload;
				var enzaz_date=ob[0].enzaz_date;
				var enzaz_note=ob[0].enzaz_note;
				var enzaz_entry_date=ob[0].enzaz_entry_date;
				
				var embassy_visa_stamping_status=ob[0].embassy_visa_stamping_status;
                var embassy_file_upload=ob[0].embassy_file_upload;
                var embassy_date=ob[0].embassy_date;
                var embassy_note=ob[0].embassy_note;
				var embassy_entry_date=ob[0].embassy_entry_date;
				
				var ticket_price_in_taka_and_dollar=ob[0].ticket_price_in_taka_and_dollar;
                var ticket_number=ob[0].ticket_number;
                var ticket_location=ob[0].ticket_location;
                var ticket_flying_date=ob[0].ticket_flying_date;
				var ticket_flying_time=ob[0].ticket_flying_time;
				var ticket_ticket_purchase_date=ob[0].ticket_ticket_purchase_date;
				var ticket_note=ob[0].ticket_note;
				var ticket_entry_date=ob[0].ticket_entry_date;
				
				
                console.log(data);
                $("#edit_id").val(edit_id);
                $("#edit_name").val(name);
                $("#edit_passport_no").val(passport_no);
                $("#edit_id_number").val(basic_id_number);
                $("#edit_visa_number").val(basic_visa_number);
				$("#edit_fingering_type").val(basic_fingering);
                $("#edit_reference_name").val(reference_name);
                $("#edit_broker_name").val(broker_name);
				$("#edit_sponsor_name").val(okala_sponsor_name);
				$("#edit_passport_type").val(basic_passport_type);
                $("#edit_description").val(basic_note);
							
				$("#pp").attr("src", "<?=$base_url.'public/uploads/'?>"+passport_preview);
				
				$("#edit_medical_name").val(fit_receive_medical_name);
                $("#edit_file").val(fit_receive_file_upload);
                $("#edit_submitted_date").val(fit_receive_submitted_date);
                $("#edit_receive_date").val(fit_receive_receive_date);
				$("#edit_expire_date").val(fit_receive_expire_date);
                $("#edit_entry_date").val(fit_receive_entry_date);
                $("#edit_fitcard_note").val(fit_receive_note);
				
				$("#pp2").attr("src", "<?=$base_url.'public/uploads/'?>"+fit_receive_file_upload);
				
				$("#edit_mufa_number").val(enzaz_mufa_number);
                $("#edit_remufa_number").val(enzaz_re_mufa_number);
                $("#edit_mufa_fee").val(enzaz_mufa_fee);
                $("#edit_enjaz_visa_fee").val(enzaz_visa_fee);
				$("#edit_enjaz_health_fee").val(enzaz_health_fee);
                $("#edit_enjaz_file").val(enzaz_file_upload);
				
				$("#pp3").attr("src", "<?=$base_url.'public/uploads/'?>"+enzaz_file_upload);
                $("#edit_enjaz_date").val(enzaz_date);
				$("#edit_enjaz_note").val(enzaz_note);
                $("#edit_enjaz_entry_date").val(enzaz_entry_date);
				
				$("#edit_embasy_status").val(embassy_visa_stamping_status);
                $("#edit_embasy_file").val(embassy_file_upload);
				
				$("#pp4").attr("src", "<?=$base_url.'public/uploads/'?>"+embassy_file_upload);
                $("#edit_embasy_date").val(embassy_date);
                $("#edit_embasy_note").val(embassy_note);
				$("#edit_embasy_entry_date").val(embassy_entry_date);
				
				$("#edit_price").val(ticket_price_in_taka_and_dollar);
                $("#edit_ticket_number").val(ticket_number);
                $("#edit_ticket_location").val(ticket_location);
                $("#edit_flying_date").val(ticket_flying_date);
				$("#edit_flying_time").val(ticket_flying_time);
                $("#edit_ticket_purchase_date").val(ticket_ticket_purchase_date);
                $("#edit_ticket_note").val(ticket_note);
				$("#edit_ticket_entry_date").val(ticket_entry_date);
				
               


            }
        });


        $("#myModalEdit").modal();
    }
    function deleteModal(id){
        $("#delete_id").val(id);
        $("#myModalDelete").modal();
    }
	
	
// Get the modal
//var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
//var img = document.getElementById('pp');
//var modalImg = document.getElementById("img01");
//var captionText = document.getElementById("caption");
//img.onclick = function(){
   // modal.style.display = "block";
    //modalImg.src = this.src;
   // captionText.innerHTML = this.alt;
//}

// Get the <span> element that closes the modal
//var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
//span.onclick = function() { 
   //modal.style.display = "none";
//}
	

	
	
</script>


</body>
</html>
