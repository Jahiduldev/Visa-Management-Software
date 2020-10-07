var Script = function () {

    $().ready(function() {

        $("#addUserForm").validate({
            rules: {              
                add_role: {
                    required: true
                  
                },
                add_company_name: {
                    required: true
                  
                },
                add_full_name: {
                    required: true,
                    
                },
				 add_user_name: {
                    required: true,
                    
                },
				add_password: {
                    required: true,
                    minlength: 6
                },
				add_phone: {
                    required: true,
                    
                },
				add_email: {
                    required: true,
                    
                },
				
				add_status: {
                    required: true,
                    
                },
                
                			
            },


            messages: {

                
                add_role: {
                    required: "Please select role name"
                 
                }, 
                add_company_name: {
                    required: "Please enter company name"
                   
                },
				 
                add_full_name: {
                    required: "Please enter full name"
                   
                },
				add_user_name: {
                    required: "Please enter user name"
                   
                },
                add_password: {
                    required: "Please enter 6 characters password",
                    minlength: "Password must consist of at least 6 characters"
                },
				add_phone: {
                    required: "Please enter phone number"
                   
                },
				add_email: {
                    required: "Please enter valid email address"
                   
                },
				
				add_status: {
                    required: "Please select a status"
                  
                }
                				
            }
        });
 
    });

}();