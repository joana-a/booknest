<?php 
session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = null;  
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Books</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="../css/admin.css">
   <link rel="stylesheet" href="../css/stylee.css">
</head>
<body>
<?php include '../view/shopheader.php'; ?>



<section class="show-products">

 

   <div class="box-container">
      <?php
      require_once '../controllers/bookcontroller.php';

      $books = get_books_controller();
    
      
      if (!empty($books)) {
          foreach ($books as $book) {  
      ?>
      <div class="box">
         <div class="name"><?php echo htmlspecialchars($book['title']); ?></div>
         <div class="price">$<?php echo htmlspecialchars($book['price']); ?></div>
         <div class="name"><?php echo htmlspecialchars($book['book_condition']); ?></div>
         <div class="image">
            <img src="../uploads/<?php echo htmlspecialchars($book['image']); ?>" 
            alt="<?php echo htmlspecialchars($book['title']); ?>" class="book-image">
         </div>

         <form action="../actions/add_to_cart_action.php" method="post" style="display:inline;">
    <input type="hidden" name="book_id" value="<?php echo htmlspecialchars($book['book_id']); ?>">
    <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user_id); ?>"> 
    <input type="submit" value="Add to Cart" name="add_to_cart" class="btn">
</form>

<form action="../actions/add_to_wishlist_action.php" method="post" style="display:inline;">
    <input type="hidden" name="book_id" value="<?php echo htmlspecialchars($book['book_id']); ?>">
    <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user_id); ?>"> 
    <input type="submit" value="Add to Wishlist" name="add_to_wishlist" class="btn">
</form>

      </div>
      <?php
          }
      } else {
          echo '<p class="empty">No books added yet!</p>';
      }
      ?>
   </div>
   </section>

  



</body>
</html>
