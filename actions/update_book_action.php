<?php
require "../controllers/bookcontroller.php";
session_start();

if (isset($_POST['update_book'])) {
    $bookId = $_POST['book_id'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $bookcondition = $_POST['book_condition'];

   
    $updateBookResult = updateBook_ctr($bookId,  $quantity, $price, $bookcondition);

    if ($updateBookResult !== false) {
        header("Location: ../view/admin_books.php?success=Book updated successfully");
    } else {
        echo "Error: Unable to update book.";
    }
} else {
    echo "Failed to update book.";
}

