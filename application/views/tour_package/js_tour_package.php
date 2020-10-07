
<script src="<?php echo $base_url ?>public/js/form-validation-script_add_menu.js"></script>
<!--dynamic table initialization -->
<script src="<?php echo $base_url ?>public/js/dynamic_table_init_menu.js"></script>
<script>
    function deleteMenu(menu_id){
        $("#delete_menu_id").val(menu_id);
        $("#myModalDelete").modal();
    }

    function editMenu(menu_id){

        $.ajax({
            type: "Post",
            url: "<?php echo site_url('add_menu/getMenuData');  ?>",
            data: {'menu_id':menu_id} ,
            success: function(data) {
                var ob=JSON.parse(data);
                var menu_id=ob[0].menu_id;
                var menu_name=ob[0].menu_name;
                console.log(data);
                $("#edit_menu_id").val(menu_id);
                $("#edit_menu_name").val(menu_name);

            }
        });

        $("#myModalEdit").modal();
    }

</script>

</body>
</html>
