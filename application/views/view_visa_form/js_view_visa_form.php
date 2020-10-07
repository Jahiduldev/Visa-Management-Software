
<script>

    $(document).ready(function () {
        // alert("data");
        var oTable = $('#editable-sample').dataTable({
            "processing": true,
            "serverSide": true,
            "pagingType": "full_numbers",
            "ajax": '<?php echo site_url('view_visa_form/getTableData'); ?>',
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
            url: "<?php echo site_url('view_visa_form/getData'); ?>",
            data: {'id': id},
            success: function (data) {
                var ob = JSON.parse(data);
                var edit_id = ob[0].id;
                var saudi_emp_name_eng = ob[0].saudi_emp_name_eng;
                var visa_no_eng = ob[0].visa_no_eng;
                var full_name_eng = ob[0].full_name_eng;
                var pas_no_eng = ob[0].pas_no_eng;
                var prof_eng = ob[0].prof_eng;
                var add_religion = ob[0].add_religion;

                console.log(data);
                $("#edit_id").val(edit_id);
                $("#edit_saudi_emp_name").val(saudi_emp_name_eng);
                $("#edit_visa_no").val(visa_no_eng);
                $("#edit_full_name").val(full_name_eng);
                $("#edit_passport_no").val(pas_no_eng);
                $("#edit_prof").val(prof_eng);
                $("#edit_religion").val(add_religion);

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
