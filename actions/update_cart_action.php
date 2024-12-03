<?php
require "../controllers/cart_controller.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $book_id= $_POST['book_id'];
    $userID= $_SESSION['user_id'];
    $quantity= $_POST['quantity'];
}

$updateBookResult = updateCart_ctr($book_id, $quantity);
if ($updateBookResult!==false){
    header("Location:../view/cart.php");
 }else {
    echo "Error:Form not submitted.";
 } 