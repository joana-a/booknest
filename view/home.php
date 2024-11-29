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
<?php include '../view/header.php'; ?>

<section class="home">
   <div class="content">
      <h3>Discover your next great read here</h3>
      <p>There's no friend as loyal as a book!</p>
   </div>
</section>

<section class="show-products">
<h1 class="title">Latest Additions</h1>

 

   <div class="box-container">
      <?php
      require_once '../controllers/bookcontroller.php';

      $books = get_some_books_controller();
    
      
      if (!empty($books)) {
          foreach ($books as $book) {  
      ?>
      <div class="box">
         <div class="name"><?php echo htmlspecialchars($book['title']); ?></div>
         <div class="price">$<?php echo htmlspecialchars($book['price']); ?></div>
         <div class="name"><?php echo htmlspecialchars($book['book_condition']); ?></div>
         <div class="image">
            <img src="../uploads/<?php echo htmlspecialchars($book['image']); ?>" alt="<?php echo htmlspecialchars($book['title']); ?>" class="book-image">
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

   <div class="load-more" style="margin-top: 2rem; text-align:center">
      <a href="../view/shop.php" class="option-btn">Load More</a>
   </div>
   </section>

   <section class="about">
   <div class="flex">
      <div class="image">
         <img src="../uploads/aboutus3.png" alt="">
      </div>
      <div class="content">
         <h3>About Us</h3>
         <p>Welcome to BookNest!, a haven for book lovers of all ages! We're passionate about connecting readers with their next great read. Whether you're searching for the latest bestsellers, timeless classics, or hidden gems waiting to be discovered, our carefully curated collection has something for everyone. We strive to create a welcoming space where book enthusiasts can indulge in their love for reading. Happy shopping!</p>
         <a href="../view/about.php" class="btn">Read More About Us Here</a>
      </div>
   </div>
</section>



</body>
</html>
