var Script = function () {

    $().ready(function() {

        $("#SubMenuForm").validate({
            rules: {
                select_menu: "required",
                sub_menu_name: {
                    required: true,
                    minlength: 2
                },
                 url: {
                    required: true,
                    minlength: 2
                }
            },
            messages: {
                select_menu: "Please select a menu",
                sub_menu_name: {
                    required: "Please enter a sub menu name",
                    minlength: "Your sub menu name must consist of at least 2 characters"
                },
                url:{
                    required: "Please enter a url",
                    minlength: "Your url must consist of at least 2 characters"
                }
            }
        });
 
    });

}();