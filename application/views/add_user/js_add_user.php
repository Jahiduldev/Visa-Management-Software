

<!--dynamic table initialization -->
<script src="<?php echo $base_url ?>public/js/dynamic_table_init_user.js"></script>
<script src="<?php echo $base_url ?>public/js/form-validation-script_add_user.js"></script>
<script>


    function editUser(){

        $("#myModalEdit").modal();
    }

</script>

<script>


    function editUser(user_id){

        $.ajax({
            type: "Post",
            url: "<?php echo site_url('add_user/getMenuData');  ?>",
            data: {'user_id':user_id} ,
            success: function(data) {
                var ob=JSON.parse(data);
                var user_id=ob[0].user_id;
                var company_name=ob[0].company_name;
                var name=ob[0].name;
                var phone=ob[0].phone;
                var email=ob[0].email;
                var address=ob[0].address;
                var status=ob[0].status;
                console.log(data);
                $("#edit_user_id").val(user_id);
                $("#edit_company_name").val(company_name);
                $("#edit_name").val(name);
                $("#edit_phone").val(phone);
                $("#edit_email").val(email);
                $("#edit_address").val(address);
                $("#edit_status").val(status);
            }
        });


        $("#myModalEdit").modal();
    }
	 function deleteUser(user_id){
        $("#delete_user_id").val(user_id);
        $("#myModalDelete").modal();
    }

</script>



</body>
</html>
