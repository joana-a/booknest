<?php
require_once("../settings/db_class.php");

class order_class extends db_connection {


    public function add_orders($user_id, $amount)

    {
        $ndb= new db_connection();
        $user_id= mysqli_real_escape_string($ndb->db_conn(), $user_id);
        $amount = mysqli_real_escape_string($this->db_conn(), $amount);

        $sql = "INSERT INTO orders (user_id, total_amount)
                VALUES ('$user_id', '$amount')"; 
        
                return $this->db_query($sql);
    }

    public function add_order_details($order_id, $book_id, $quantity, $price)

    {
        $ndb= new db_connection();
        $order_id= mysqli_real_escape_string($ndb->db_conn(), $order_id);
        $book_id = mysqli_real_escape_string($this->db_conn(), $book_id);
        $quantity= mysqli_real_escape_string($ndb->db_conn(), $quantity);
        $price = mysqli_real_escape_string($this->db_conn(), $price);

        $sql = "INSERT INTO order_items (order_id, book_id, quantity, price)
                VALUES ('$order_id', '$book_id', '$quantity', '$price')"; 
        
                return $this->db_query($sql);
    }


    public function viewOrder($userId) {
        $userId = mysqli_real_escape_string($this->db_conn(), $userId);

        $sql = "SELECT o.order_id, o.total_amount, o.created_at, o.order_status 
                    FROM orders o 
                    WHERE o.user_id = '$userId' 
                    ORDER BY o.order_id DESC LIMIT 1" ;


        return $this->db_fetch_all($sql);
    }

    public function viewAllOrders($userId) {
        $userId = mysqli_real_escape_string($this->db_conn(), $userId);

        $sql = "SELECT o.order_id, o.total_amount, o.created_at, o.order_status 
                    FROM orders o 
                    WHERE o.user_id = '$userId' 
                    ORDER BY o.order_id DESC" ;


        return $this->db_fetch_all($sql);
    }


}
  