
<script>

    $(document).ready(function () {
        // alert("data");
        var oTable = $('#editable-sample').dataTable({
            "processing": true,
            "serverSide": true,
            "pagingType": "full_numbers",
            "ajax": '<?php echo site_url('view_embasy_incom/getTableData'); ?>',
            "aoColumns": [
                {"sClass": "center"},
                {"sClass": "center"},
                {"sClass": "center"},
                {"sClass": "center"},
                {"sClass": "center"},
                {"sClass": "center"},
                {"sClass": "center"}
          
            ],
            "aaSorting": [[6, "desc"]]

        });
    });



    function addModal(id) {

        $.ajax({
            type: "Post",
            url: "<?php echo site_url('view_embasy_incom/getData'); ?>",
            data: {'id': id},
            success: function (data) {
                var ob = JSON.parse(data);
                var edit_id = ob[0].id;
                var name = ob[0].name;
                var passport_no = ob[0].passport_no;
                var embassy_file_upload = ob[0].embassy_file_upload;
                var embassy_visa_stamping_status = ob[0].embassy_visa_stamping_status;
                var embassy_date = ob[0].embassy_date;
                var embasy_expire_date = ob[0].embasy_expire_date;
                var embasy_office = ob[0].embasy_office;
                var embassy_note = ob[0].embassy_note;
                


                console.log(data);
                $("#edit_id").val(edit_id);
                $("#edit_name").val(name);
                $("#edit_passport_no").val(passport_no);
                $("#edit_embasy_file").val(embassy_file_upload);
                $("#edit_embasy_status").val(embassy_visa_stamping_status);
            //    $("#edit_embasy_date").val(embassy_date);
                $("#edit_embasy_expire_date").val(embasy_expire_date);
                $("#edit_embasy_office").val(embasy_office);
                $("#edit_embasy_note").val(embassy_note);
                
               
               




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
