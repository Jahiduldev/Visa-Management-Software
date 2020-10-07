
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
                var mobile_number = ob[0].mobile_number;
                var visa_type = ob[0].visa_type;
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
                var police_clearance = ob[0].police_clearance;
                var training = ob[0].training;
                var passport_owner = ob[0].passport_owner;
                 var man_power = ob[0].man_power;


                console.log(data);
                $("#edit_id").val(edit_id);
                $("#edit_id_print").val(edit_id);
                $("#edit_name").val(name);
                $("#edit_passport_no").val(passport_no);
                $("#edit_id_number").val(basic_id_number);
                $("#edit_visa_number").val(basic_visa_number);
                $("#edit_mobile_number").val(mobile_number);
                $("#edit_visa_type").val(visa_type);
                $("#edit_fingering_type").val(basic_fingering);
                $("#edit_reference_name").val(reference_name);
                $("#edit_broker_name").val(broker_name);
                $("#edit_broker_mobile_number").val(broker_mobile_number);
                $("#edit_reference_mobile_number").val(reference_mobile_number);
                $("#edit_sponsor_name").val(okala_sponsor_name);
                $("#edit_manpower").val(man_power);
                $("#edit_passport_type").val(basic_passport_type);
                $("#edit_passport_side").val(basic_receive_site);
                $("#edit_description").val(basic_note);

                $("#pp").attr("src", "<?= $base_url . 'public/uploads/' ?>" + passport_preview);
                 $("#pp1").attr("src", "<?= $base_url . 'public/uploads/' ?>" + police_clearance);
                  $("#pp2").attr("src", "<?= $base_url . 'public/uploads/' ?>" + training);
                   $("#pp3").attr("src", "<?= $base_url . 'public/uploads/' ?>" + passport_owner);






            }
        });


        $("#myModalEdit").modal();
    }


    $(function () {
        var m = $("#edit_reference_name").val();
        var b = $("#edit_broker_name").val();

        Show_Ref_Mobile_number(m);
        Show_Brok_Mobile_number(b);



    });


    function Show_Ref_Mobile_number(reference_all) {

        var reference_all_arr = reference_all.split("-");
        var reference_name = reference_all_arr[0];
        $.ajax({
            type: "Post",
            url: "<?php echo site_url('view_customer/getRefMobileNumber'); ?>",
            data: {'reference_name': reference_name},
            success: function (data) {
                var ob = JSON.parse(data);
                var reference_mobile = ob[0].reference_mobile;


                $("#edit_reference_mobile_number").val(reference_mobile);



            }
        });


    }

    function Show_Brok_Mobile_number(broker_all) {
        var broker_all_arr = broker_all.split("-");
        var broker_name = broker_all_arr[0];

        $.ajax({
            type: "Post",
            url: "<?php echo site_url('view_customer/getBrokMobileNumber'); ?>",
            data: {'broker_name': broker_name},
            success: function (data) {
                var ob = JSON.parse(data);
                var broker_mobile = ob[0].broker_mobile;


                $("#edit_broker_mobile_number").val(broker_mobile);



            }
        });


    }





    function deleteSubMenu(sub_menu_id) {
        $("#delete_sub_menu_id").val(sub_menu_id);
        $("#myModalDelete").modal();
    }


</script>

</body>
</html>
