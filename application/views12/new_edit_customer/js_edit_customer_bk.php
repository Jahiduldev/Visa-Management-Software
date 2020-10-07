
<script src="<?php echo $base_url ?>public/js/form-validation-script_add_sub_menu.js"></script>
<!--dynamic table initialization -->
<script src="<?php echo $base_url ?>public/js/dynamic_table_init_subs_menu.js"></script>
<script>

  


	 function editModal(id) {

        $.ajax({
            type: "Post",
            url: "<?php echo site_url('view_customer/getData'); ?>",
            data: {'id': id},
            success: function (data) {
                var ob = JSON.parse(data);
                var edit_id = ob[0].id;
                var name = ob[0].name;
                var passport_no = ob[0].passport_no;
                var basic_id_number = ob[0].basic_id_number;
                var basic_visa_number = ob[0].basic_visa_number;
                var basic_fingering = ob[0].basic_fingering;
                var reference_name = ob[0].reference_name;
                var broker_name = ob[0].broker_name;
                var broker_mobile_number = ob[0].broker_mobile_number;
                var reference_mobile_number = ob[0].reference_mobile_number;
                var okala_sponsor_name = ob[0].okala_sponsor_name;
                var basic_passport_type = ob[0].basic_passport_type;
                var basic_receive_site = ob[0].basic_receive_site;
                var basic_note = ob[0].basic_note;
                var passport_preview = ob[0].passport_preview;


                console.log(data);
                $("#edit_id").val(edit_id);
				 $("#edit_id_print").val(edit_id);
                $("#edit_name").val(name);
                $("#edit_passport_no").val(passport_no);
                $("#edit_id_number").val(basic_id_number);
                $("#edit_visa_number").val(basic_visa_number);
                $("#edit_fingering_type").val(basic_fingering);
                $("#edit_reference_name").val(reference_name);
                $("#edit_broker_name").val(broker_name);
                $("#edit_broker_mobile_number").val(broker_mobile_number);
                $("#edit_reference_mobile_number").val(reference_mobile_number);
                $("#edit_sponsor_name").val(okala_sponsor_name);
                $("#edit_passport_type").val(basic_passport_type);
                $("#edit_passport_side").val(basic_receive_site);
                $("#edit_description").val(basic_note);

                $("#pp").attr("src", "<?= $base_url . 'public/uploads/' ?>" + passport_preview);






            }
        });


        $("#myModalEdit").modal();
    }
	
	
	
	
	
     function deleteSubMenu(sub_menu_id){
        $("#delete_sub_menu_id").val(sub_menu_id);
        $("#myModalDelete").modal();
    }


</script>

</body>
</html>
