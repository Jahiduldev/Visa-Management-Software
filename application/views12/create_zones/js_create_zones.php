

<!--dynamic table initialization -->
<script src="<?php echo $base_url ?>public/js/dynamic_table_init_zone.js"></script>
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
            url: "<?php echo site_url('create_zones/getData');  ?>",
            data: {'id':id} ,
            success: function(data) {
                var ob=JSON.parse(data);
                var id=ob[0].id;
                var area_name=ob[0].area_name;
                var area_description=ob[0].area_description;
                var is_active=ob[0].is_active;
                console.log(data);
                $("#edit_id").val(id);
                $("#edit_zone_name").val(area_name);
                $("#edit_description").val(area_description);
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
