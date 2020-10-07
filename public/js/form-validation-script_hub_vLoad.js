var Script = function () {

    $().ready(function() {

        $("#HubForm").validate({
            
            rules: {        
                add_deposit_amount: {
                    required: true,
                    number: true
                },
                add_hub: "required",
                add_hub_bank: "required"
               
         
            },
            messages: {
            
                add_deposit_amount: {
                    required: "Please enter your deposit amount",
                    number: "Please enter only number"
                },        
                add_hub: "Please select a hub",
                add_hub_bank: "Please select a Hub bank"
            
            }
        });

   
    });


}();