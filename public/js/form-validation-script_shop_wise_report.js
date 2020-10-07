var Script = function () {

    $().ready(function() {

        $("#RoleForm").validate({
            rules: {              
                select_shop: {
                    required: true                 
                },
                date_from: {
                    required: true
                },
                date_to: {
                    required: true
                }
            },
            messages: {            
                select_shop: {
                    required: "Please select a shop"
                 
                },
                date_from: {
                    required: "Please enter a from date"

                } ,
                date_to: {
                    required: "Please enter a to date"

                }
            }
        });
 
    });

}();