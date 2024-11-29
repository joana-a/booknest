<?php
require_once '../controllers/reviewcontroller.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $book_id = $_POST['book_id'] ?? null;
    $user_id = $_POST['user_id'] ?? null;
    $rating = $_POST['rating'] ?? null;
    $comment = $_POST['comment'] ?? null;

    if ($book_id && $user_id && $rating && $comment) {
        $result = add_review_controller($book_id, $user_id, $rating, $comment);
        if ($result) {
            header('Location: ../view/reviews.php');
        } else {
            echo "Failed to add review.";
        }
    } else {
        echo "All fields are required!";
    }
}
?>
