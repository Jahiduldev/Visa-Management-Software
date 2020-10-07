
<script>

    $(document).ready(function () {
        // alert("data");
        var oTable = $('#editable-sample').dataTable({
            "processing": true,
            "serverSide": true,
            "pagingType": "full_numbers",
            "ajax": '<?php echo site_url('passport_movement_notification/getTableData'); ?>',
            "aoColumns": [
                {"sClass": "center"},
                {"sClass": "center"},
                {"sClass": "center"},
                {"sClass": "center"},
                {"sClass": "center"},
                 {"sClass": "center"},
                {"sClass": "center"}
            ],
            "aaSorting": [[6, "desc"]]

        });
    });



    function addModal(id) {

        $.ajax({
            type: "Post",
            url: "<?php echo site_url('passport_movement_notification/getData'); ?>",
            data: {'id': id},
            success: function (data) {
                var ob = JSON.parse(data);
                var edit_id = ob[0].id;
                $("#edit_id").val(edit_id);
            }
        });


        $("#addModal").modal();
    }



    function rejectModal(id) {

        $.ajax({
            type: "Post",
            url: "<?php echo site_url('passport_movement_notification/getData'); ?>",
            data: {'id': id},
            success: function (data) {
                var ob = JSON.parse(data);
                var edit_id = ob[0].id;
                $("#edit_id2").val(edit_id);
            }
        });


        $("#rejectModal").modal();
    }


</script>


</body>
</html>
