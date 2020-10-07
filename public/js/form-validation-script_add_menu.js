var Script = function () {

    $().ready(function() {

        $("#MenuForm").validate({
            rules: {              
                menu_name: {
                    required: true,
                    minlength: 2
                }        
            },
            messages: {            
               menu_name: {
                    required: "Please enter a menu name",
                    minlength: "Your menu name must consist of at least 2 characters"
                }            
            }
        });
 
    });

}();