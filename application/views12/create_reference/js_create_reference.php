
<script src="<?php echo $base_url ?>public/js/form-validation-script_add_sub_menu.js"></script>
<!--dynamic table initialization -->
<script src="<?php echo $base_url ?>public/js/dynamic_table_init_reference.js"></script>
<script>

    function editReference(id){

        $.ajax({
            type: "Post",
            url: "<?php echo site_url('create_reference/getReferenceData');  ?>",
            data: {'id':id} ,
            success: function(data) {
                var ob=JSON.parse(data);
                var reference_name=ob[0].reference_name;
                var reference_id=ob[0].reference_id;
                var reference_mobile=ob[0].reference_mobile;
				 var reference_mobile_1=ob[0].reference_mobile_1;
				  var reference_mobile_2=ob[0].reference_mobile_2;

                console.log(data);
                $("#edit_id").val(id);
                $("#edit_reference_name").val(reference_name);
                $("#edit_reference_id").val(reference_id);
                $("#edit_reference_mobile_number").val(reference_mobile);
				 $("#edit_reference_mobile_number_1").val(reference_mobile_1);
				  $("#edit_reference_mobile_number_2").val(reference_mobile_2);
            }
        });


        $("#myModalEdit").modal();
    }


    function deleteReference(id){
        $("#delete_id").val(id);
        $("#myModalDelete").modal();
    }

    function relationReference(id){
        $("#relation_id").val(id);

        $.ajax({
            type: "Post",
            url: "<?php echo site_url('create_reference/getReferenceData');  ?>",
            data: {'id':id} ,
            success: function(data) {
                var ob=JSON.parse(data);
                var reference_name=ob[0].reference_name;
                var reference_id=ob[0].reference_id;
                var reference_mobile=ob[0].reference_mobile;


                $("#relation_reference_name").val(reference_name);
                $("#relation_reference_id").val(reference_id);
                $("#relation_reference_mobile_number").val(reference_mobile);

            }
        });

        $("#myModalRelation").modal();
    }


    function relationReferenceSearch(){

        var reference_name= $("#reference_name").val();

        $.ajax({
            type: "Post",
            url: "<?php echo site_url('create_reference/getReferenceSearchData');  ?>",
            data: {'reference_name':reference_name} ,
            success: function(data) {
               
                $("#referenceTable").html(data);

            }
        });


    }



</script>

</body>
</html>
