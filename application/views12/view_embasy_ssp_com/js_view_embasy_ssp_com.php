<script>

    $(document).ready(function () {
        // alert("data");
        var oTable = $('#editable-sample').dataTable({
            "processing": true,
            "serverSide": true,
            "pagingType": "full_numbers",
            "ajax": '<?php echo site_url('view_embasy_com/getTableData'); ?>',
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
            url: "<?php echo site_url('view_embasy_com/getData'); ?>",
            data: {'id': id},
            success: function (data) {
                var ob = JSON.parse(data);
                var edit_id = ob[0].id;
                var name = ob[0].name;
                var passport_no = ob[0].passport_no;
                var embassy_file_upload = ob[0].embassy_file_upload;
                var embassy_visa_stamping_status = ob[0].embassy_visa_stamping_status;
                var embassy_date = ob[0].embassy_date;
                var embasy_expire_date = ob[0].embasy_expire_date;
                var embasy_office = ob[0].embasy_office;
                var embassy_note = ob[0].embassy_note;

                var res = embassy_file_upload.split(".");
                var ex = res[1];

                $("#edit_id").val(edit_id);
                $("#edit_name").val(name);
                $("#edit_passport_no").val(passport_no);
                if (ex == "pdf") {
                    $("#linkpp2").attr("href", "<?= $base_url . 'public/uploads/' ?>" + embassy_file_upload);
                    $("#linkpp2").html(embassy_file_upload + "  <span style='color:red'>Click Download</span>");
                    $("#pp2").attr("src", "");
                } else {
                    $("#pp2").attr("src", "<?= $base_url . 'public/uploads/' ?>" + embassy_file_upload);
                    $("#linkpp2").html(" <span style='color:red'>Click View</span>");
                    $("#linkpp2").attr("href", "<?= $base_url . 'public/uploads/' ?>" + embassy_file_upload);

                }


                $("#edit_embasy_status").val(embassy_visa_stamping_status);
                $("#edit_embasy_date").val(embassy_date);
                $("#edit_embasy_expire_date").val(embasy_expire_date);
                $("#edit_enjaz_note").val(embasy_expire_date);
                $("#edit_embasy_office").val(embasy_office);
                $("#edit_embasy_note").val(embassy_note);

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
