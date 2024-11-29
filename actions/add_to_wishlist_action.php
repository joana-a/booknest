<?php
 require "../controllers/wishlist_controller.php";

 session_start();

 if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $book_id= $_POST['book_id'];
    $userID= $_SESSION['user_id'];
    $quantity= 1;
 }

 $addWishlistResult = addtoWishlist_ctr($userID,  $book_id, $quantity);
 if ($addWishlistResult!==false){
    header("Location:../view/wishlist.php");
 }else {
    echo "Error:Form not submitted.";
 }
 
//  if ($addWishlistResult !== false) {
//    echo "<script>alert('Item added to wishlist successfully!');</script>";
// } else {
//    echo "<script>alert('Error: Form not submitted.');</script>";
// }
