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

        $sql = "SELECT 
                    o.order_id, 
                    o.total_amount, 
                    o.order_status, 
                    o.created_at, 
                    oi.book_id, 
                    oi.quantity, 
                    oi.price
                FROM 
                     orders o
                JOIN 
                    order_items oi 
                ON 
                    o.order_id = oi.order_id
                WHERE 
                    o.user_id = '$userId'";

        return $this->db_fetch_all($sql);
    }


}
  