
<script>

    $(document).ready(function () {
        // alert("data");
        var oTable = $('#editable-sample').dataTable({
            "processing": true,
            "serverSide": true,
            "pagingType": "full_numbers",
            "ajax": '<?php echo site_url('view_okala_incom/getTableData'); ?>',
            "aoColumns": [
                {"sClass": "center"},
                {"sClass": "center"},
                {"sClass": "center"}
            
         
       
             
            ],
            "aaSorting": [[2, "desc"]]

        });
    });



    function addModal(id) {

        $.ajax({
            type: "Post",
            url: "<?php echo site_url('view_okala_incom/getData'); ?>",
            data: {'id': id},
            success: function (data) {
                var ob = JSON.parse(data);
                var edit_id = ob[0].id;
                var name = ob[0].name;
                var passport_no = ob[0].passport_no;
                var okala_sponsor_name = ob[0].okala_sponsor_name;
                var okala_office = ob[0].okala_office;
                var okala_status = ob[0].okala_status;
                var okala_note = ob[0].okala_note;
                


                console.log(data);
                $("#edit_id").val(edit_id);
                $("#edit_name").val(name);
                $("#edit_passport_no").val(passport_no);
                $("#edit_okala_sponsor_name").val(okala_sponsor_name);
                $("#edit_okala_office").val(okala_office);
                $("#edit_okala_status").val(okala_status);
                $("#edit_okala_note").val(okala_note);
               
               




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
