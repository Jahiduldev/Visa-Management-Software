
<script>

    $(document).ready(function () {
        // alert("data");
        var oTable = $('#editable-sample').dataTable({
            "processing": true,
            "serverSide": true,
            "pagingType": "full_numbers",
            "ajax": '<?php echo site_url('passport_payment/getTableData'); ?>',
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
            url: "<?php echo site_url('passport_payment/getData'); ?>",
            data: {'id': id},
            success: function (data) {
                var ob = JSON.parse(data);
                var edit_id = ob[0].id;
                var name = ob[0].name;
                var passport_no = ob[0].passport_no;
                 var contact_amount = ob[0].contact_amount;


                console.log(data);
                $("#edit_id").val(edit_id);
                $("#edit_name").val(name);
                $("#edit_passport_no").val(passport_no);
				$("#edit_contact_amount").val(contact_amount);
               
               




            }
        });


        $("#addModal").modal();
    }
    function deleteModal(id) {
        $("#delete_id").val(id);
        $("#myModalDelete").modal();
    }






</script>


</body>
</html>
