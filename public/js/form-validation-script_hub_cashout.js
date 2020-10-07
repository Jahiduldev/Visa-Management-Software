var Script = function () {

    $().ready(function() {

        $("#HubForm").validate({
            
            rules: {        
                add_cash_amount: {
                    required: true,
                    number: true
                },
                add_hub: "required",
                add_agent_wallet:{
                    required: true,
                    digits: true
                },
               add_transaction: "required"
         
            },
            messages: {
            
                add_cash_amount: {
                    required: "Please enter your cash amount",
                    number: "Please enter only number"
                },        
                add_hub: "Please select a hub",
                add_agent_wallet: {
                    required: "Please enter your agent wallet",
                    digits: "Please enter only digits"
                },
                add_transaction: "Please enter your transaction id"
            
            }
        });

   
    });


}();