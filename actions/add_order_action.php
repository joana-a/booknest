<?php
require "../controllers/order_controller.php";
require "../controllers/cart_controller.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customer_id = $_SESSION['user_id'];
    $cart_items = viewCart_ctr($customer_id); 

    if (!empty($cart_items)) {
        $total_amount = 0;
        foreach ($cart_items as $item) {
            $total_amount += $item['quantity'] * $item['price'];
        }

        // Add order
        $addOrderResult = add_order_controller($customer_id, $total_amount);

        if ($addOrderResult) {
            $order_id = $addOrderResult; 
            
            // Add order details
            foreach ($cart_items as $item) {
                add_order_details_controller($order_id, $item['book_id'], $item['quantity'], $item['price']);
            }

            header("Location: ../view/checkout.php");
            exit;
        } else {
            echo "Error: Order could not be placed.";
        }
    } else {
        echo "Cart is empty!";
    }
} else {
    echo "Invalid request method.";
}
