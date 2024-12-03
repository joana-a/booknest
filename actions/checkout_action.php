<?php
require_once '../controllers/cart_controller.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'verify_payment') {
    $reference = $_POST['reference'];
    

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
            // Paystack secret key
            "Authorization: Bearer sk_test_6068653fadcc3e0f0d1389e50c722de8993a13ad",
            "Cache-Control: no-cache",
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);

    if ($err) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Connection error: ' . $err
        ]);
        exit;
    }
    // Parse the JSON response from Paystack
    $response_data = json_decode($response, true);
    
    if ($response_data['status'] == true && $response_data['data']['status'] == 'success') {
        $userId = $_SESSION['user_id'];
        
        $clearCart = clearUserCart_ctr($userId);
        
        if ($clearCart !== false) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Payment verified and cart cleared successfully'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Payment successful but failed to clear cart'
            ]);
        }
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Payment verification failed'
        ]);
    }
    exit;
}
echo json_encode([
    'status' => 'error',
    'message' => 'Invalid request method or missing parameters'
]);
exit;
?>