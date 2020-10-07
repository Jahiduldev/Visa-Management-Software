var Script = function () {

    $().ready(function() {

        $("#addUserForm").validate({
            rules: {              
                emp_full_name: {
                    required: true
                  
                },
                emp_user_name: {
                    required: true
                  
                },
				 emp_password: {
                    required: true,
                    minlength: 6
                },
                  date_time_join: {
                    required: true
                   
                },
                 shop: {
                    required: true
                  
                },
               phone: {
                    required: true,
                    minlength: 11
                },
                 email: {
                    required: true
                  
                },
             
                status: {
                    required: true                 
                }				
            },
                 messages: {            
               emp_full_name: {
                    required: "Please enter a employee full name"
                 
                }, 
               emp_user_name: {
                    required: "Please enter a employee user name"
                   
                },
                 emp_password: {
                    required: "Please enter a employee password",
                    minlength: "Employee password must consist of at least 6 characters"
                },
                   date_time_join: {
                    required: "Please enter a joining date"
                  
                },
                   shop: {
                    required: "Please select a shop"
                  
                },
                phone: {
                    required: "Please enter a phone number",
                    minlength: "Phone number code must consist of at least 11 characters"
                },
                 email: {
                    required: "Please enter a email id"
                   
                },
             
                status: {
                    required: "Please select a status"
                  
                }				
            }
        });
 
    });

}();