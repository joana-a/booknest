var paymentForm = document.getElementById('paymentForm');

paymentForm.addEventListener('submit', payWithPaystack, false);

function payWithPaystack(e) {
    e.preventDefault(); // Prevent form submission to handle payment

    var handler = PaystackPop.setup({
        key: 'pk_test_15c67791faa96af87001072f755e2145781251bb', // Replace with your public key
        email: document.getElementById('email-address').value,
        amount: document.getElementById('amount').value * 100, // Convert amount to the smallest currency unit (GHS)
        currency: 'GHS', // Currency (Ghana Cedi, can be changed if needed)
        ref: "" + Math.floor(Math.random() * 1000000000 + 1), // Generate a random reference
        callback: function(response) {
            // If payment is successful, verify the transaction on the server side
            $.ajax({
                url: "../actions/checkout_action.php?reference=" + response.reference, // Use reference in the URL for transaction verification
                method: "GET", // GET method is fine for retrieving data
                success: function (response) {
                    // Redirect the user to the success page after payment is verified
                    window.location.href = "../view/success.php";
                },
                error: function(xhr, status, error) {
                    // Handle any errors during AJAX request
                    alert("Payment verification failed. Please try again.");
                }
            });
        },
        onClose: function() {
            // Handle if the user closes the payment window before completing the transaction
            alert('Transaction was not completed, window closed.');
        }
    });

    // Open the Paystack payment iframe
    handler.openIframe();
}
