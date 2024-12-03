<?php
require_once("../settings/db_class.php");

class bookReviewClass extends db_connection {
    // Add a review
    public function addReview($book_id, $user_id, $rating, $comment) {
        $book_id = mysqli_real_escape_string($this->db_conn(), $book_id);
        $user_id = mysqli_real_escape_string($this->db_conn(), $user_id);
        $rating = mysqli_real_escape_string($this->db_conn(), $rating);
        $comment = mysqli_real_escape_string($this->db_conn(), $comment);
        
        $sql = "INSERT INTO reviews (book_id, user_id, rating, comment) 
                VALUES ('$book_id', '$user_id', '$rating', '$comment')";
        return $this->db_query($sql);
    }

    // Fetch reviews for a specific book
    public function getReviewsByBook($book_id) {
        $book_id = mysqli_real_escape_string($this->db_conn(), $book_id);
        $sql = "SELECT r.*, u.username 
                FROM reviews r 
                JOIN users u ON r.user_id = u.user_id 
                WHERE r.book_id = '$book_id'
                ORDER BY r.created_at DESC";
        return $this->db_fetch_all($sql);
    }

    public function viewAllReviews() {
        $sql = "SELECT 
                    r.review_id, r.book_id, r.user_id, r.rating, r.comment, r.created_at,
                    b.title AS book_title, b.image AS book_image,
                    u.username AS user_name
                FROM 
                    reviews r
                JOIN 
                    books b ON r.book_id = b.book_id
                JOIN 
                    users u ON r.user_id = u.user_id
                ORDER BY 
                    r.created_at DESC";
        
        return $this->db_fetch_all($sql); 
    }
    
}

