
<!--dynamic table initialization -->
<script src="<?php echo $base_url ?>public/js/dynamic_table_init_subs_menu.js"></script>
<!--common script for all pages-->
<script src="<?php echo $base_url ?>public/js/form-validation-script_add_sub_menu.js"></script>


<script>

    $(document).ready(function () {
        //alert("data");
        var oTable = $('#editable-sample').dataTable({
            "processing": true,
            "serverSide": true,
            "pagingType": "full_numbers",
            "ajax": '<?php echo site_url('view_employee/getTableData'); ?>',
            "aoColumns": [
                {"sClass": "center"},
                {"sClass": "center"},
                {"sClass": "center"},
                {"sClass": "center"},
                {"sClass": "center"},
              
                {"sClass": "center"}
            ],
            "aaSorting": [[5, "desc"]],
       /*     "aoColumnDefs": [
                {
                    // "bSearchable": false,
                    "bVisible": false,
                    "aTargets": [5]

                },
                {
                    // "bSearchable": false,
                    "bVisible": false,
                    "aTargets": [1]

                },
                {
                    // "bSearchable": false,
                    "bVisible": false,
                    "aTargets": [2]

                }

            ] */

        });
    });

</script>



</body>
</html>
