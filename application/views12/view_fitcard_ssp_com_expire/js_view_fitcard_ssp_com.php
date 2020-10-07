
<script>

    $(document).ready(function () {
        // alert("data");
        var oTable = $('#editable-sample').dataTable({
            "processing": true,
            "serverSide": true,
            "pagingType": "full_numbers",
            "ajax": '<?php echo site_url('view_fitcard_com/getTableDataExpire'); ?>',
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



    function editModal(id) {

        $.ajax({
            type: "Post",
            url: "<?php echo site_url('view_fitcard_com/getData'); ?>",
            data: {'id': id},
            success: function (data) {
                var ob = JSON.parse(data);
                var edit_id = ob[0].id;
                var name = ob[0].name;
                var passport_no = ob[0].passport_no;       
                var fit_receive_receive_date = ob[0].fit_receive_receive_date;            
                var fit_receive_expire_date = ob[0].fit_receive_expire_date;
                var fit_receive_note = ob[0].fit_receive_note;
               
                console.log(data);
                $("#edit_id").val(edit_id);
                $("#edit_name").val(name);
                $("#edit_passport_no").val(passport_no);              
                $("#edit_receive_date").val(fit_receive_receive_date);            
                $("#edit_expire_date").val(fit_receive_expire_date);
                $("#edit_fitcard_note").val(fit_receive_note);
        
            }
        });


        $("#myModalEdit").modal();
    }
    function deleteModal(id) {
        $("#delete_id").val(id);
        $("#myModalDelete").modal();
    }







</script>


</body>
</html>
