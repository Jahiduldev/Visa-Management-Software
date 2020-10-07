var Script = function () {

    $().ready(function() {

        $("#HubForm").validate({
            
            rules: {        
                add_deposit_amount: {
                    required: true,
                    number: true
                },
                add_deposit_type: "required",
                add_maxis_bank: "required",
                add_dc_number:"required"
         
            },
            messages: {
            
                add_deposit_amount: {
                    required: "Please enter your deposit amount",
                    number: "Please enter only number"
                },        
                add_deposit_type: "Please select a deposit type",
                add_maxis_bank: "Please select a maxis bank",
                add_dc_number: "Please enter your dc number"
            }
        });

   
    });


}();