<?php
require_once "../classes/order_class.php";


function add_order_controller($user_id, $amount) {
    $newOrder = new order_class();
    return $newOrder->add_orders($user_id, $amount);

}

function add_order_details_controller($order_id, $book_id, $quantity, $price) {
    $newOrder = new order_class();
    return $newOrder->add_order_details($order_id, $book_id, $quantity, $price);

}

function viewOrder_ctr($userId){
    $newOrder = new order_class();
    return $newOrder->viewOrder($userId);
}

function viewAllOrders_ctr($userId){
    $newOrder = new order_class();
    return $newOrder->viewAllOrders($userId);
}


    

   