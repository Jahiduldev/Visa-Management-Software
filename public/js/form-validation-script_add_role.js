var Script = function () {

    $().ready(function() {

        $("#RoleForm").validate({
            rules: {              
                role_name: {
                    required: true,
                    minlength: 2
                }        
            },
            messages: {            
               role_name: {
                    required: "Please enter a role name",
                    minlength: "Your role name must consist of at least 2 characters"
                }            
            }
        });
 
    });

}();