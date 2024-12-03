<?php
require_once '../controllers/cart_controller.php';

session_start(); 

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    
    $userId = $_SESSION['user_id'] ?? ''; 

    if (!empty($userId)) {
        $clearCart = clearUserCart_ctr($userId);

        if ($clearCart !== false) {
            header('Location: ../view/success.php');
            exit;
        } else {
            echo 'Error clearing cart. Try again.';
        }
    } else {
        echo 'User ID is missing or user not logged in.';
    }
} else {
    echo 'Invalid request method. Please use GET.';
}
?>
