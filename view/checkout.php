<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Checkout</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="../css/stylee.css">
</head>
<body>
   
<?php 
require '../controllers/order_controller.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../view/login.php");
    exit();
}

$customer_id = $_SESSION['user_id'];
 
$totalAmount = 0;
$orderData = viewOrder_ctr($customer_id); 
if (!empty($orderData)) {
    foreach ($orderData as $order) {
        $totalAmount += $order['total_amount'];
    }
}
include 'header.php'; 
?> 

<div class="heading">
   <h3>Checkout</h3>
   <p><a href="../view/home.php">Home</a> / Checkout</p>
</div>

<section class="checkout">

   <form id="paymentForm" method= "post">
      <h3>Place Your Order</h3>
      <div class="flex">
         <div class="inputBox">
            <span>Your Name:</span>
            <input type="text" name="name" required placeholder="Enter your name">
         </div>
         <div class="inputBox">
            <span>Amount:</span>
            <input type="number" name="amount" value="<?php echo $totalAmount; ?>" readonly id="amount">
         </div>
         <div class="inputBox">
            <span>Your Email:</span>
            <input type="email" name="email" required placeholder="Enter your email" id="email-address">
         </div>
      </div>
      <input type="submit" value="Order Now" class="btn" name="order_btn">
   </form>

</section>

<script src="https://js.paystack.co/v2/inline.js"> </script>
<script src="../js/pay.js"></script>
</body>
</html>
