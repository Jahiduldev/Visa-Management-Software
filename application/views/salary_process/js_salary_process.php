
<script src="<?php echo $base_url ?>public/js/form-validation-script_add_menu.js"></script>
<!--dynamic table initialization -->
<script src="<?php echo $base_url ?>public/js/dynamic_table_init_menu.js"></script>
<script>
    
    
      function submitForm(action) {
    var form = document.getElementById('MenuForm');
    form.action = action;
    form.submit();
  }
    
    
    
    function deleteMenu(menu_id){
        $("#delete_menu_id").val(menu_id);
        $("#myModalDelete").modal();
    }

    function editMenu(id){

        $.ajax({
            type: "Post",
            url: "<?php echo site_url('salary_add_type/getMenuData');  ?>",
            data: {'id':id} ,
            success: function(data) {
                var ob=JSON.parse(data);
                var id=ob[0].id;
                var type=ob[0].type;
              
                $("#edit_type_id").val(id);
                $("#edit_type_name").val(type);

            }
        });

        $("#myModalEdit").modal();
    }

</script>

</body>
</html>
