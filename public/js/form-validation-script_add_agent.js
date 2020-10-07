var Script = function () {

    $().ready(function() {

        $("#addUserForm").validate({
            rules: {
                add_role:"required",
                add_full_name: {
                    required: true,
                    minlength: 5
                },
                add_user_name: {
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
                //                confirm_password: {
                //                    required: true,
                //                    minlength: 5,
                //                    equalTo: "#password"
                //                },
                add_email: {
                    required: false,
                    email: true
                  
                },
                //                topic: {
                //                    required: "#newsletter:checked",
                //                    minlength: 2
                //                },
                add_status: "required"
            },
            messages: {
                add_role: "Please select a role",
                add_full_name: {
                    required: "Please enter your fullname",
                    minlength: "Your fullname must consist of at least 2 characters"
                },
                add_user_name: {
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
                //                confirm_password: {
                //                    required: "Please provide a password",
                //                    minlength: "Your password must be at least 5 characters long",
                //                    equalTo: "Please enter the same password as above"
                //                },
                add_email: "Please enter a valid email address",
                
                add_status: "Please select a status"
            }
        });


    // propose username by combining first- and lastname
    /* $("#add_user_name").focus(function() {
            var add_full_name = $("#add_full_name").val();      
            if(add_full_name && !this.value) {
                this.value = add_full_name;
            }
        });*/
    
    });


}();