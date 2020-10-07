
<script src="<?php echo $base_url ?>public/js/form-validation-script_add_role.js"></script>
<!--dynamic table initialization -->
<script src="<?php echo $base_url ?>public/js/dynamic_table_init_user_role.js"></script>
<script>


       function editRole(){
	   
     $("#myModalEdit").modal();
    }

</script>

<script>


       function editRole(role_id){
	 
	        $.ajax({
                type: "Post",
                url: "<?php echo site_url('add_user_role/getMenuData');  ?>",
                data: {'role_id':role_id} ,
                success: function(data) {  
				var ob=JSON.parse(data);
				var role_id=ob[0].role_id;
				var role_name=ob[0].role_name;
				console.log(data);
				  $("#edit_role_id").val(role_id);
                  $("#edit_role_name").val(role_name);
                    
                }
            });
	   
	   
     $("#myModalEdit").modal();
    }
	 function deleteUserRole(role_id){
        $("#delete_role_id").val(role_id);
        $("#myModalDelete").modal();
    }

</script>


</body>
</html>
