
<script>

    $(document).ready(function() {
       // alert("data");
        var oTable = $('#editable-sample').dataTable({
            "processing": true,
            "serverSide": true,
            "pagingType": "full_numbers",
            "ajax": '<?php echo site_url('fitcard_view/getTableData'); ?>',
            "aoColumns": [
                {"sClass": "center"},
                {"sClass": "center"},
                {"sClass": "center"},              
                {"sClass": "center"},
                 {"sClass": "center"},
                {"sClass": "center"},
				 {"sClass": "center"},
                {"sClass": "center"},
                {"sClass": "center"},
				 {"sClass": "center"},
				  {"sClass": "center"},
				  
				 
            ],
            "aaSorting": [[ 10, "desc" ]]

        });
    });

	
	
	    function editModal(id){

        $.ajax({
            type: "Post",
            url: "<?php echo site_url('fitcard_view/getData');  ?>",
            data: {'id':id} ,
            success: function(data) {
                var ob=JSON.parse(data);
                var id=ob[0].id;
                var name=ob[0].name;
                var passport_no=ob[0].passport_no;
                var basic_id_number=ob[0].basic_id_number;
                var basic_visa_number=ob[0].basic_visa_number;
				var basic_fingering=ob[0].basic_fingering;
				var reference_name=ob[0].reference_name;
				var broker_name=ob[0].broker_name;
				var okala_sponsor_name=ob[0].okala_sponsor_name;
				var basic_note=ob[0].basic_note;
				
                console.log(data);
                $("#edit_id").val(id);
                $("#edit_name").val(name);
                $("#edit_passport_no").val(passport_no);
                $("#edit_id_number").val(basic_id_number);
                $("#edit_visa_number").val(basic_visa_number);
				$("#edit_fingering_type").val(basic_fingering);
                $("#edit_reference_name").val(reference_name);
                $("#edit_broker_name").val(broker_name);
				$("#edit_sponsor_name").val(okala_sponsor_name);
                $("#edit_description").val(basic_note);
               


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
