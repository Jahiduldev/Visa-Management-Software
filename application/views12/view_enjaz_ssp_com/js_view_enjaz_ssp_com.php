
<script>

    $(document).ready(function () {
        // alert("data");
        var oTable = $('#editable-sample').dataTable({
            "processing": true,
            "serverSide": true,
            "pagingType": "full_numbers",
            "ajax": '<?php echo site_url('view_enjaz_com/getTableData'); ?>',
            "aoColumns": [
                {"sClass": "center"},
                {"sClass": "center"},
                {"sClass": "center"},
                {"sClass": "center"},
                {"sClass": "center"},
                {"sClass": "center"}
            ],
            "aaSorting": [[5, "desc"]]

        });
    });



    function editModal(id) {

        $.ajax({
            type: "Post",
            url: "<?php echo site_url('view_enjaz_com/getData'); ?>",
            data: {'id': id},
            success: function (data) {
                var ob = JSON.parse(data);
                var edit_id = ob[0].id;
                var name = ob[0].name;
                var passport_no = ob[0].passport_no;       
                var enzaz_mufa_number = ob[0].enzaz_mufa_number;            
                var enzaz_date = ob[0].enzaz_date;
                var enzaz_note = ob[0].enzaz_note;
               
                console.log(data);
                $("#edit_id").val(edit_id);
                $("#edit_name").val(name);
                $("#edit_passport_no").val(passport_no);              
                $("#edit_mufa_number").val(enzaz_mufa_number);            
                $("#edit_enjaz_date").val(enzaz_date);
                $("#edit_enjaz_note").val(enzaz_note);
        
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
