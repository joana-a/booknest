<?php
require_once("../classes/reviewclass.php");

function add_review_controller($book_id, $user_id, $rating, $comment) {
    $review = new bookReviewClass();
    return $review->addReview($book_id, $user_id, $rating, $comment);
}

function get_reviews_controller($book_id) {
    $review = new bookReviewClass();
    return $review->getReviewsByBook($book_id);
}
function get_all_reviews_controller() {
    $reviewClass = new bookReviewClass();
    return $reviewClass->viewAllReviews();
}

