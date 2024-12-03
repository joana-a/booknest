<?php

session_start(); 

include '../settings/db_class.php';

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

if (!isset($_SESSION['user_id'])) {
   header('location:../login/login.php');
   exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="../css/style copy.css">
   <link rel="stylesheet" href="../css/stylee.css">

</head>
<body>
   
<?php include '../view/header.php'; ?>

<div class="heading">
   <h3>thank you!</h3>
  
</div>

<section class="about">

   <div class="flex">

      

      <div class="content">
         
         <h1>Thank you for purchasing from BookNest!</h1>
        <p>Your payment was successful and your cart has been cleared</p>
        <a href="cart.php" class="btn">Back to Cart</a>
        <a href="home.php" class="btn">Continue Shopping</a>      </div>

   </div>

</section>
