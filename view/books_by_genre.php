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
   <title>Books by Genre</title>

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

      // Get the genre from the query string
      $genre = isset($_GET['genre']) ? htmlspecialchars($_GET['genre']) : '';

      // Fetch books based on genre
      switch ($genre) {
          case 'romance':
              $books = get_romance_books_controller($genre);
              break;
          case 'fantasy':
              $books = get_fantasy_books_controller($genre);
              break;
          case 'thriller':
              $books = get_thriller_books_controller($genre);
              break;
          case 'afrilit':
              $books = get_afrilit_books_controller($genre);
              break;
          case 'scifi':
              $books = get_scifi_books_controller($genre);
              break;
          case 'textbooks':
              $books = get_textbooks_books_controller($genre);
              break;
          case 'nonfiction':
              $books = get_nonfiction_books_controller($genre);
              break;
          default:
              $books = [];
              echo '<p class="empty">Invalid genre or no books available in this genre!</p>';
              break;
      }

      // Display books
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
          echo '<p class="empty">No books available in this genre!</p>';
      }
      ?>
   </div>
</section>

</body>
</html>
