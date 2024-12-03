<?php
require_once '../controllers/cart_controller.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Get the payment reference from Paystack callback
    $reference = $_GET['reference'];

    // Initialize cURL for Paystack transaction verification
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.paystack.co/transaction/verify/$reference", 
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,  
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer sk_test_6068653fadcc3e0f0d1389e50c722de8993a13ad", // Paystack secret key
            "Cache-Control: no-cache",
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        $response_data = json_decode($response, true);

        if ($response_data['status'] == 'success') {
            // Payment was successful, clear the user's cart
            $userId = $_SESSION['user_id']; // Get the logged-in user ID
            $clearCart = clearUserCart_ctr($userId); // Clear cart

            if ($clearCart !== false) {
                header("Location: ../view/success.php"); // Redirect to success page
                exit();
            } else {
                echo 'Error clearing cart. Try again.';
            }
        } else {
            echo "Payment verification failed. Please try again.";
        }
    }
}
?>
