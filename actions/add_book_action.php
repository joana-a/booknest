<?php
require_once '../controllers/bookcontroller.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'] ?? '';
    $author = $_POST['author'] ?? '';
    $genre = $_POST['genre'] ?? '';
    $price = $_POST['price'] ?? '';
    $bookcondition = $_POST['bookcondition'] ?? '';
    $keywords = $_POST['keywords'] ?? '';
    $quantity = $_POST['quantity'] ?? '';

    if (isset($_FILES['image'])) {
        $image = $_FILES['image'];

        $addbook = add_book_controller($title, $author, $genre, $price, $bookcondition, $keywords, $image, $quantity);

        if ($addbook) {
            header('Location: ../view/admin_books.php'); 
            exit();
        } else {
            echo 'Error: Could not add the book. Please check your inputs.';
        }
    } else {
        echo 'Error: No image uploaded.';
    }
}