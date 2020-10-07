var Script = function () {

    $().ready(function() {

        $("#addShopForm").validate({
            rules: {              
                user: {
                    required: true                
                },
                amount: {
                    required: true                 
                },
                date_join: {
                    required: true
                 
                },
                status: {
                    required: true
                  
                }				
            },
            messages: {
                user: {
                    required: "Please select a user"
                   
                }, 
                amount: {
                    required: "Please enter a amount"
                  
                },
                date_join: {
                    required: "Please enter a joining date"
                  
                },
             
                status: {
                    required: "Please select a status"
                  
                }				
            }
        });
 
    });

}();