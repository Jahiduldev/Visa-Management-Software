
<script>

    $(document).ready(function() {
        //alert("data");
        var oTable = $('#editable-sample').dataTable({
            "processing": true,
            "serverSide": true,
            "pagingType": "full_numbers",
            "ajax": '<?php echo site_url('view_credit_management/getTableData'); ?>',
            "aoColumns": [
                {"sClass": "center"},
                {"sClass": "center"},
                {"sClass": "center"},              
                {"sClass": "center"}
            ],
            "aaSorting": [[ 3, "desc" ]]

        });
    });

</script>


</body>
</html>
