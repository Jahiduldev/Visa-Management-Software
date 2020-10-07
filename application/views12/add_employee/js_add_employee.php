
<!--dynamic table initialization -->
<script src="<?php echo $base_url ?>public/js/dynamic_table_init_officer.js"></script>
<!--script for this page-->
<script src="<?php echo $base_url ?>public/js/form-validation-script_add_employee.js"></script>
<script type="text/javascript">


    $(function () {
        $.ajax({
            type: "Post",
            url: "<?php echo site_url('add_employee/getEmpCode'); ?>",
            //   data: {'role_id':role_id,'action':'getPermission'} ,
            success: function (data) {
                //  alert(data);
                var cd = "0001";
                if (data != "") {
                    cd = (parseInt(data) + 1).toString();
                }
                var len = cd.length;
                if (len == 1) {
                    cd = "000" + cd;
                } else if (len == 2) {
                    cd = "00" + cd;
                } else if (len == 3) {
                    cd = "0" + cd;
                }
                $('#emp_code').val(cd);
            }
        });
    });


    function getDepartment(com_id) {

        $.ajax({
            type: "Post",
            url: "<?php echo site_url('add_employee/getDepartment'); ?>",
            data: {'com_id': com_id},
            success: function (data) {
                $("#department").html(data);
            }
        });
    }


function getDesignation(depart_id) {

        $.ajax({
            type: "Post",
            url: "<?php echo site_url('add_employee/getDesignation'); ?>",
            data: {'depart_id': depart_id},
            success: function (data) {
               
                $("#designation").html(data);
            }
        });
    }

</script>

</body>
</html>
