<?php
session_start(); 

include '../settings/db_class.php';
$db = new db_connection();
 
$mysqli = $db->db_conn();

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

if (!isset($_SESSION['user_id'])) {
   header('location:../login/login.php');
   exit();
}

if(isset($_POST['update_order'])){
   $order_update_id = $_POST['order_id'];
   $update_payment = $_POST['update_payment']; 
   mysqli_query($mysqli, "UPDATE `orders` SET order_status = '$update_payment' WHERE order_id = '$order_update_id'") or die('query failed');
   $message = 'payment status has been updated!';
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($mysqli, "DELETE FROM `orders` WHERE order_id = '$delete_id'") or die('query failed');
   header('location: ../view/admin_orders.php');
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

   <link rel="stylesheet" href="../css/admin.css">

</head>
<body>
   
<?php include '../view/admin_header.php'; ?>

<section class="orders">

   <h1 class="title">placed orders</h1>

   <div class="box-container">
      <?php
      $select_orders = mysqli_query($mysqli, "SELECT orders.*, users.username, users.pno, users.email FROM `orders` INNER JOIN `users` ON orders.user_id = users.user_id") or die('query failed');
      if(mysqli_num_rows($select_orders) > 0){
         while($fetch_orders = mysqli_fetch_assoc($select_orders)){
      ?>
      <div class="box">
         <p> user name : <span><?php echo $fetch_orders['username']; ?></span> </p>
         <p> user number : <span><?php echo $fetch_orders['pno']; ?></span> </p>
         <p> user email : <span><?php echo $fetch_orders['email']; ?></span> </p>
         <p> placed on : <span><?php echo $fetch_orders['created_at']; ?></span> </p>

         <p> total price : <span>$<?php echo $fetch_orders['total_amount']; ?>/-</span> </p>
         <form action="" method="post">
            <input type="hidden" name="order_id" value="<?php echo $fetch_orders['order_id']; ?>">
            <p>payment status: </p>
            <select name="update_payment">
               <option value="" selected disabled><?php echo $fetch_orders['order_status']; ?></option>
               <option value="pending">pending</option>
               <option value="completed">completed</option>
            </select>
            <input type="submit" value="update" name="update_order" class="option-btn">
            <a href="../view/admin_orders.php?delete=<?php echo $fetch_orders['order_id']; ?>" onclick="return confirm('delete this order?');" class="delete-btn">delete</a>
         </form>
      </div>
      <?php
         }
      }else{
         echo '<p class="empty">no orders placed yet!</p>';
      }
      ?>
   </div>
</section>



</body>
</html>
