var Script = function () {

    $().ready(function() {

        $("#HubForm").validate({
            rules: {
               
                add_hub_name: {
                    required: true,
                    minlength: 5
                },
                add_hub_user_name: {
                    required: true,
                    minlength: 2
                },
                add_password: {
                    required: true,
                    minlength: 5
                },
                add_phone: {
                    required: true,
                    digits: true,
                    minlength: 11
                },
        
                add_email: {
                    required: false,
                    email: true
                  
                },
          
                add_status: "required"
            },
            messages: {
            
                add_hub_name: {
                    required: "Please enter your hubname",
                    minlength: "Your fullname must consist of at least 2 characters"
                },
                add_hub_user_name: {
                    required: "Please enter a username",
                    minlength: "Your username must consist of at least 2 characters"
                },
                add_password: {
                    required: "Please enter a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                add_phone: {
                    required: "Please enter a phone number",
                    digits:"Please enter only number",
                    minlength: "Your phone number must be at least 11 digit long"
                },
             
                add_email: "Please enter a valid email address",
                
                add_status: "Please select a status"
            }
        });


 
    
    });


}();