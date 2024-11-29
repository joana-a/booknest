<?php

require_once '../controllers/bookcontroller.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['delete_book'])) {
        $bookId = $_POST['book_id'] ?? '';

        if (!empty($bookId)) { 
            $deleteBook = delete_book_controller($bookId);
            if ($deleteBook !== false) {
                header('Location: ../view/admin_books.php');
                exit; 
            } else {
                echo 'Error deleting book. Try again.';
            }
        } else {
            echo 'Book ID is missing.';
        }
    }
}


