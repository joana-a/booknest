<?php
require_once("../settings/db_class.php");

class cart_class extends db_connection {
    public function addToCart($userId, $bookId, $quantity) {
        $ndb = new db_connection();
        $userId = mysqli_real_escape_string($ndb->db_conn(), $userId);
        $bookId = mysqli_real_escape_string($ndb->db_conn(), $bookId);
        $quantity = mysqli_real_escape_string($ndb->db_conn(), $quantity);
    
        $sql = "SELECT * FROM `cart` WHERE `book_id` = '$bookId' AND `user_id` = '$userId'";
        $result = $this->db_fetch_one($sql);

        if ($result) {
            $newQuantity = $result['quantity'] + $quantity;
            $sqlUpdate = "UPDATE `cart` SET `quantity` = '$newQuantity' 
            WHERE `book_id` = '$bookId' AND `user_id` = '$userId'";
            return $this->db_query($sqlUpdate);
        } else {
            $sqlInsert = "INSERT INTO `cart` (`user_id`, `book_id`, `quantity`)
            VALUES ('$userId','$bookId', '$quantity')";
            return $this->db_query($sqlInsert);
        }
    } 

    public function updateCart($bookId, $quantity) {
        $ndb = new db_connection();
        $bookId = mysqli_real_escape_string($ndb->db_conn(), $bookId);
        $quantity = mysqli_real_escape_string($ndb->db_conn(), $quantity);
        
        $sql = "UPDATE `cart` SET `quantity` = '$quantity' WHERE `book_id` = '$bookId'";
        return $this->db_query($sql);
    }
 
    public function viewCart($userId){
        $ndb = new db_connection();
        $sql= "SELECT books.title, books.price, books.image, books.book_condition, cart.quantity, cart.book_id
        FROM cart
        JOIN books ON cart.book_id = books.book_id  WHERE user_id = $userId ";
        
        return $this->db_fetch_all($sql); 

    }

    public function deleteCart($bookId) {
        $bookId = mysqli_real_escape_string($this->db_conn(), $bookId);
        $sql = "DELETE FROM cart WHERE book_id = '$bookId'";
        return $this->db_query($sql);
    }
}
