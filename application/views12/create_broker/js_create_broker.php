
<script src="<?php echo $base_url ?>public/js/form-validation-script_add_sub_menu.js"></script>
<!--dynamic table initialization -->
<script src="<?php echo $base_url ?>public/js/dynamic_table_init_reference.js"></script>
<script>

    function editBroker(id) {

        $.ajax({
            type: "Post",
            url: "<?php echo site_url('create_broker/getBrokerData'); ?>",
            data: {'id': id},
            success: function (data) {
                var ob = JSON.parse(data);
                var broker_name = ob[0].broker_name;
                var broker_id = ob[0].broker_id;
                var broker_mobile = ob[0].broker_mobile;
				var broker_mobile_1 = ob[0].broker_mobile_1;
				var broker_mobile_2 = ob[0].broker_mobile_2;

                console.log(data);
                $("#edit_id").val(id);
                $("#edit_broker_name").val(broker_name);
                $("#edit_broker_id").val(broker_id);
                $("#edit_broker_mobile_number").val(broker_mobile);
				$("#edit_broker_mobile_number_1").val(broker_mobile_1);
				$("#edit_broker_mobile_number_2").val(broker_mobile_2);

            }
        });


        $("#myModalEdit").modal();
    }


    function deleteReference(id) {
        $("#delete_id").val(id);
        $("#myModalDelete").modal();
    }


</script>

</body>
</html>
