

<!--dynamic table initialization -->
<script src="<?php echo $base_url ?>public/js/dynamic_table_init_view_service.js"></script>
<script src="<?php echo $base_url ?>public/js/form-validation-script_common.js"></script>
<script>


    function editUser(){

        $("#myModalEdit").modal();
    }

</script>

<script>


    function addModal(user_id){

        $.ajax({
            type: "Post",
            url: "<?php echo site_url('add_service/getData1');  ?>",
            data: {'user_id':user_id} ,
            success: function(data) {
                var ob=JSON.parse(data);
                var client_id=ob[0].ci_id;
                var client_code=ob[0].client_code;
                var client_phone=ob[0].client_phone;

                $("#client_id").val(client_id);
                $("#add_customer_code").val(client_code);
                $("#add_mobile_number").val(client_phone);

            }
        });


        $("#myModalADD").modal();
    }
    function deleteUser(user_id){
        $("#delete_user_id").val(user_id);
        $("#myModalDelete").modal();
    }

</script>



</body>
</html>
