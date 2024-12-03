<?php

require_once '../controllers/wishlist_controller.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['delete_wishitem'])) {
        $bookId = $_POST['book_id'] ?? '';

        if (!empty($bookId)) { 
            $deleteWishItem = deleteWishlist_ctr($bookId);
            if ($deleteWishItem !== false) {
                header('Location: ../view/wishlist.php');
                exit; 
            } else {
                echo 'Error deleting item from wishlist. Try again.';
            }
        } else {
            echo 'Book ID is missing.';
        }
    }
}


