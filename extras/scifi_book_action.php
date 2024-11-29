<?php
require "../controllers/bookcontroller.php";
session_start();

if (isset($_POST['update_book'])) {
    $genre = $_POST['genre'];
    $quantity = $_POST['quantity'];

   
    $updateBookResult = get_scifi_books_controller($genre);

    if ($updateBookResult !== false) {
        header("Location: ../view/admin_books.php?success=Book updated successfully");
    } else {
        echo "Error: Unable to update book.";
    }
} else {
    echo "Failed to update book.";
}

