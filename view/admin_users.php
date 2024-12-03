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

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    mysqli_query($mysqli, "DELETE FROM `users` WHERE user_id = '$delete_id'") or die('Query failed');
    header('Location: ../view/admin_users.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Users</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
   
<?php include '../view/admin_header.php'; ?>

<section class="users">
   <h1 class="title">User Accounts</h1>
   <div class="box-container">
      <?php
         $sql = "SELECT user_id, username, email, gender, pno, role
                 FROM users";
         $result = mysqli_query($mysqli, $sql);

         
         if (mysqli_num_rows($result) > 0) {
            while ($fetch_users = mysqli_fetch_assoc($result)) {
      ?>
      <div class="box">
         <p> user id : <span><?php echo $fetch_users['user_id']; ?></span> </p>
         <p> username : <span><?php echo $fetch_users['username']; ?></span> </p>
         <p> email : <span><?php echo $fetch_users['email']; ?></span> </p>
         <p> gender : <span><?php echo $fetch_users['gender']; ?></span> </p>
         <p> contact : <span><?php echo $fetch_users['pno']; ?></span> </p>
         <p> user type : <span><?php echo $fetch_users['role']; ?></span> </p>
         <a href="../view/admin_users.php?delete=<?php echo $fetch_users['user_id']; ?>" onclick="return confirm('Delete this user?');" class="delete-btn">Delete User</a>
      </div>
      <?php
            }
         } else {
            echo "No users found.";
         }
         mysqli_close($mysqli);
      ?>
   </div>
</section>



</body>
</html>
