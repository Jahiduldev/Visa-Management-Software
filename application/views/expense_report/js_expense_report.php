
<script src="<?php echo $base_url ?>public/js/form-validation-script_add_menu.js"></script>
<!--dynamic table initialization -->
<script src="<?php echo $base_url ?>public/js/dynamic_table_init_menu.js"></script>
<script>
    function deleteMenu(menu_id) {
        $("#delete_menu_id").val(menu_id);
        $("#myModalDelete").modal();
    }

    function editMenu(id) {

        $.ajax({
            type: "Post",
            url: "<?php echo site_url('expense_report/getMenuData'); ?>",
            data: {'id': id},
            success: function (data) {
                var ob = JSON.parse(data);
                var id = ob[0].id;
                var expense_type = ob[0].expense_type;
                var amount = ob[0].amount;
                var note = ob[0].note;

                $("#edit_type_id").val(id);
                
                $("#edit_exp_type_name").val(expense_type);
                $("#edit_amount").val(amount);
                $("#edit_note").val(note);

            }
        });

        $("#myModalEdit").modal();
    }

</script>

</body>
</html>
