var paymentForm = document.getElementById('paymentForm');

paymentForm.addEventListener('submit', payWithPaystack, false);

function payWithPaystack(e) {
    e.preventDefault();

    // Paystack payment handler
    var handler = PaystackPop.setup({
        //Paystack public key 
        key: 'pk_test_15c67791faa96af87001072f755e2145781251bb',
        
        email: document.getElementById('email-address').value,
        
        amount: parseFloat(document.getElementById('amount').value) * 100,
        
        currency: 'GHS',
        
        // Generate a unique reference for this transaction
        ref: 'REF_' + Math.floor(Math.random() * 1000000000 + 1) + '_' + Date.now(),
        
        // Callback function that runs after Paystack payment is completed
        callback: function(response) {
            document.body.style.cursor = 'wait';
            
            $.ajax({
                url: "../actions/checkout_action.php",
                method: "POST",
                data: {
                    reference: response.reference,
                    action: 'verify_payment'
                },
                success: function(serverResponse) {
                    try {
                        // Parse the JSON response from server
                        const result = JSON.parse(serverResponse);
                        
                        if (result.status === 'success') {
                            window.location.href = "../view/success.php";
                        } else {
                            alert("Payment verification failed: " + result.message);
                            document.body.style.cursor = 'default';
                        }
                    } catch (e) {
                        // case where server response isn't valid JSON
                        alert("Invalid server response");
                        document.body.style.cursor = 'default';
                    }
                },
                error: function(xhr, status, error) {
                    alert("Payment verification failed. Please try again.");
                    document.body.style.cursor = 'default';
                }
            });
        },
        
        
    });
    handler.openIframe();
}