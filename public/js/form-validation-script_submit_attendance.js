var Script = function () {

    $().ready(function() {

        $("#addUserForm").validate({
            rules: {              
                  att_type: {
                    required: true
                  
                },
                  userfile: {
                    required: true
                   
                }
              				
            },
                 messages: {            
            att_type: {
                    required: "Please select a attendance type"
                  
                },
                   userfile: {
                    required: "Please select a file"
                  
                }
              				
            }
        });
 
    });

}();