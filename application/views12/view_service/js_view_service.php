

<!--dynamic table initialization -->
<script src="<?php echo $base_url ?>public/js/dynamic_table_init_view_service.js"></script>
<script src="<?php echo $base_url ?>public/js/form-validation-script_common.js"></script>
<script>


    function editUser(){

        $("#myModalEdit").modal();
    }

</script>

<script>


    function editModal(id){

        $.ajax({
            type: "Post",
            url: "<?php echo site_url('create_models/getData');  ?>",
            data: {'id':id} ,
            success: function(data) {
                var ob=JSON.parse(data);
                var id=ob[0].id;
                var model_code=ob[0].model_code;
                var model_name=ob[0].model_name;
                var model_description=ob[0].model_description;
                var is_active=ob[0].is_active;
                console.log(data);
                $("#edit_id").val(id);
                $("#edit_model_code").val(model_code);
                $("#edit_model_name").val(model_name);
                $("#edit_description").val(model_description);
                $("#edit_status").val(is_active);


            }
        });


        $("#myModalEdit").modal();
    }
    function deleteModal(id){
        $("#delete_id").val(id);
        $("#myModalDelete").modal();
    }

</script>



</body>
</html>
