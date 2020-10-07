

<!--dynamic table initialization -->
<script src="<?php echo $base_url ?>public/js/dynamic_table_init_view_complete_service.js"></script>
<script src="<?php echo $base_url ?>public/js/form-validation-script_common.js"></script>
<script>


    function editUser(){

        $("#myModalEdit").modal();
    }

</script>

<script>


    function addModal(req_id){


        $("#req_id").val(req_id);
        $("#myModalADD").modal();
    }
    function deleteUser(user_id){
        $("#delete_user_id").val(user_id);
        $("#myModalDelete").modal();
    }

</script>



</body>
</html>
