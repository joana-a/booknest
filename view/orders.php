<?php
session_start();
if (isset($_SESSION['user_id'])) {
    $customer_id = $_SESSION['user_id'];
} else {
    $customer_id = null;  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>orders</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="../css/stylee.css">

</head>
<body>
   
<?php include '../view/header.php'; ?>

<div class="heading">
   <h3>your orders</h3>
   <p> <a href="../view/home.php">home</a> / orders </p>
</div>

<section class="placed-orders">
   <h1 class="title">Placed Orders</h1>
   <div class="box-container">
      <?php
      require_once '../controllers/order_controller.php';
      $orderItems = viewAllOrders_ctr($customer_id);

      if (!empty($orderItems)) {
         foreach ($orderItems as $item) { ?>
            <div class="box">
               <p>Placed on: <span><?php echo $item['created_at']; ?></span></p>
               <p>Total amount: <span>$<?php echo $item['total_amount']; ?></span></p>
               <p>Order status: 
                  <span style="color: <?php echo ($item['order_status'] == 'Completed') ? 'red' : 'green'; ?>;">
                     <?php echo $item['order_status']; ?>
                  </span>
               </p>
            </div>
         <?php }
      } else {
         echo '<p class="empty">No orders placed yet!</p>';
      }
      ?>
   </div>
</section>

<script src="../js/script.js"></script>

</body>
</html>