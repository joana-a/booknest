 <?php
 require "../controllers/cart_controller.php";

 session_start();

 if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $book_id= $_POST['book_id'];
    $userID= $_SESSION['user_id'];
    $quantity= 1;
 }

 $addBookResult = addtoCart_ctr($userID,  $book_id, $quantity);
 if ($addBookResult!==false){
    header("Location:../view/home.php");
 }else {
    echo "Error:Form not submitted.";
 } 