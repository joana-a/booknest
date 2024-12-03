<?php
require_once("../settings/db_class.php");

class wishlist_class extends db_connection {
    public function addToWishlist($userId, $bookId) {
        $ndb = new db_connection();
        $userId = mysqli_real_escape_string($ndb->db_conn(), $userId);
        $bookId = mysqli_real_escape_string($ndb->db_conn(), $bookId);
    
        // $sql = "SELECT * FROM `wishlist` WHERE `book_id` = '$bookId' AND `user_id` = '$userId'";
        // $result = $this->db_fetch_one($sql);

        $sqlInsert = "INSERT INTO `wishlist` (`user_id`, `book_id`)
        VALUES ('$userId','$bookId')";
        return $this->db_query($sqlInsert);
        }
     

    
    public function viewWishlist($userId){
        $ndb = new db_connection();
        $sql= "SELECT books.title, books.price, books.image, books.book_condition, wishlist.book_id
        FROM wishlist
        JOIN books ON wishlist.book_id = books.book_id  WHERE user_id = $userId ";
        
        return $this->db_fetch_all($sql); 

    }

    public function deleteWishlist($bookId) {
        $bookId = mysqli_real_escape_string($this->db_conn(), $bookId);
        $sql = "DELETE FROM wishlist WHERE book_id = '$bookId'";
        return $this->db_query($sql);
    }
}
