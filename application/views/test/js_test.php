<!--ssp datatable-->
<script  type="text/javascript"  src="<?php echo $base_url ?>public/assets/data-table-ssp/jquery.ssp.js"></script>
<script  type="text/javascript"  src="<?php echo $base_url ?>public/assets/data-table-ssp/jquery.ssp.dataTables.js"></script>

<!-- js placed at the end of the document so the pages load faster -->
<!--<script src="<?php //echo $base_url ?>public/js/jquery.js"></script>-->
<script src="<?php echo $base_url ?>public/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="<?php echo $base_url ?>public/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="<?php echo $base_url ?>public/js/jquery.scrollTo.min.js"></script>
<script src="<?php echo $base_url ?>public/js/jquery.nicescroll.js" type="text/javascript"></script>

<script type="text/javascript" language="javascript" src="<?php echo $base_url ?>public/assets/advanced-datatable/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo $base_url ?>public/assets/data-tables/DT_bootstrap.js"></script>
<script src="<?php echo $base_url ?>public/js/respond.min.js" ></script>

<!--datetime picker-->
<!--<script type="text/javascript" src="<?php //echo $base_url ?>public/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>-->
<!--this page  script only-->
<!--<script src="<?php //echo $base_url ?>public/js/advanced-form-components.js"></script>-->

<!--right slidebar-->
<script src="<?php echo $base_url ?>public/js/slidebars.min.js"></script>
<!--dynamic table initialization -->
<script src="<?php echo $base_url ?>public/js/dynamic_table_init_menu.js"></script>
<!--toastr-->
<script src="<?php echo $base_url ?>public/assets/toastr-master/toastr.js"></script>
<!--common script for all pages-->
<script src="<?php echo $base_url ?>public/js/common-scripts.js"></script>

<!--script for this page-->
<script type="text/javascript" src="<?php echo $base_url ?>public/js/jquery.validate.min.js"></script>
<script src="<?php echo $base_url ?>public/js/form-validation-script_add_menu.js"></script>


<script>

    $(document).ready(function() {
        var oTable = $('#editable-sample').dataTable({
            "processing": true,
            "serverSide": true,
            "pagingType": "full_numbers",
            "ajax": '<?php echo site_url('test/getTableData'); ?>',
            "aoColumns": [
                {"sClass": "center"},
                {"sClass": "center"},
                {"sClass": "center"},
                {"sClass": "center"},
                {"sClass": "center"},
                {"sClass": "center"},
                {"sClass": "center"},
                {"sClass": "center"},
                {"sClass": "center"},
                {"sClass": "center"},
                 {"sClass": "center"}
            ],
            "aaSorting": [[ 0, "desc" ]]

        });
    });



</script>

</body>
</html>
