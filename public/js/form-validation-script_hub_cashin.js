var Script = function () {

    $().ready(function() {

        $("#HubForm").validate({
            
            rules: {        
                add_cash_amount: {
                    required: true,
                    number: true
                },
             
                add_hub: "required",
                   add_transaction_type:"required",
                add_agent_wallet:{
                    required: true,
                    digits: true
                }
               
         
            },
            messages: {
            
                add_cash_amount: {
                    required: "Please enter your cash amount",
                    number: "Please enter only number"
                },
               
                add_hub: "Please select a hub",
                add_transaction_type: "Please select a transaction type",
                add_agent_wallet: {
                    required: "Please enter your agent wallet",
                    digits: "Please enter only digits"
                }
            
            }
        });

   
    });


}();