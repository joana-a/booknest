<?php

require_once '../controllers/cart_controller.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['delete_item'])) {
        $bookId = $_POST['book_id'] ?? '';

        if (!empty($bookId)) { 
            $deleteCart = deleteCart_ctr($bookId);
            if ($deleteCart !== false) {
                header('Location: ../view/cart.php');
                exit; 
            } else {
                echo 'Error deleting item from cart. Try again.';
            }
        } else {
            echo 'Book ID is missing.';
        }
    }
} 


