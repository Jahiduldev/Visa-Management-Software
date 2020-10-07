
<script src="<?php echo $base_url ?>public/js/form-validation-script_add_sub_menu.js"></script>
<!--dynamic table initialization -->
<script src="<?php echo $base_url ?>public/js/dynamic_table_init_subs_menu.js"></script>
<script>

    function editSubMenu(sub_menu_id){

        $.ajax({
            type: "Post",
            url: "<?php echo site_url('add_subs_menu/getSubMenuData');  ?>",
            data: {'sub_menu_id':sub_menu_id} ,
            success: function(data) {
                var ob=JSON.parse(data);
                var sub_menu_id=ob[0].sub_menu_id;
                var sub_menu_name=ob[0].sub_menu_name;
                console.log(data);
                $("#edit_menu_id").val(sub_menu_id);
                $("#edit_menu_name").val(sub_menu_name);

            }
        });


        $("#myModalEdit").modal();
    }


     function deleteSubMenu(sub_menu_id){
        $("#delete_sub_menu_id").val(sub_menu_id);
        $("#myModalDelete").modal();
    }


</script>

</body>
</html>
