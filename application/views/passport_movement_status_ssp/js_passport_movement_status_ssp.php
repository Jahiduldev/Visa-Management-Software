
<script>

    $(document).ready(function () {
        // alert("data");
        var oTable = $('#editable-sample').dataTable({
            "processing": true,
            "serverSide": true,
            "pagingType": "full_numbers",
            "ajax": '<?php echo site_url('passport_movement_status/getTableData'); ?>',
            "aoColumns": [
                {"sClass": "center"},
                {"sClass": "center"},
                {"sClass": "center"},
                {"sClass": "center"},
                {"sClass": "center"},
                {"sClass": "center"},
				{"sClass": "center"},
                {"sClass": "center"}
            ],
            "aaSorting": [[7, "desc"]]

        });
    });



    function addModal(id) {

        $.ajax({
            type: "Post",
            url: "<?php echo site_url('passport_movement_status/getData'); ?>",
            data: {'id': id},
            success: function (data) {
                var ob = JSON.parse(data);
                var edit_id = ob[0].id;





                console.log(data);
                $("#edit_id").val(edit_id);






            }
        });


        $("#addModal").modal();
    }
    function deleteModal(id) {
        $("#delete_id").val(id);
        $("#myModalDelete").modal();
    }


// Get the modal
//var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
//var img = document.getElementById('pp');
//var modalImg = document.getElementById("img01");
//var captionText = document.getElementById("caption");
//img.onclick = function(){
    // modal.style.display = "block";
    //modalImg.src = this.src;
    // captionText.innerHTML = this.alt;
//}

// Get the <span> element that closes the modal
//var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
//span.onclick = function() { 
    //modal.style.display = "none";
//}




</script>


</body>
</html>
