var Script = function () {

    $().ready(function() {

        $("#addShopForm").validate({
            rules: {              
                shop_name: {
                    required: true,
                    minlength: 4
                },
                shop_address: {
                    required: true,
                    minlength: 4
                },
				   shop_code: {
                    required: true,
                    minlength: 2
                },
              
                   status: {
                    required: true
                  
                }				
            },
                 messages: {            
               shop_name: {
                    required: "Please enter a shop name",
                    minlength: "Your shop name must consist of at least 4 characters"
                }, 
               shop_address: {
                    required: "Please enter a shop address",
                    minlength: "Your shop address must consist of at least 4 characters"
                },
                 shop_code: {
                    required: "Please enter a shop code",
                    minlength: "Your shop code must consist of at least 2 characters"
                },
              
                   status: {
                    required: "Please select a status"
                  
                }				
            }
        });
 
    });

}();