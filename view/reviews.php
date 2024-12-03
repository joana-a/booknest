<?php
require_once '../controllers/reviewcontroller.php';
session_start();

$reviews = get_all_reviews_controller();
$user_id = $_SESSION['user_id'] ?? null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Reviews</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="../css/admin.css">
   <link rel="stylesheet" href="../css/stylee.css"> 
</head>
<body>
<?php include '../view/header.php'; ?>

<section class="add-products">
   <h2 class="title">Leave a Review</h2>
   <form action="../actions/addreviewaction.php" method="post" class="form">
      <select name="book_id" class="box" required>
         <option value="" disabled selected>Select a Book</option>
         <?php
         require_once '../controllers/bookcontroller.php';
         $books = get_books_controller();
         foreach ($books as $book) {
            echo '<option value="' . htmlspecialchars($book['book_id']) . '">' . htmlspecialchars($book['title']) . '</option>';
         }
         ?>
      </select>
      <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user_id); ?>">
      <input type="number" name="rating" class="box" min="1" max="5" placeholder="Rating (1-5)" required>
      <textarea name="comment" class="box" rows="5" placeholder="Your review..." required></textarea>
      <button type="submit" class="btn">Submit Review</button>
   </form>
</section>

<section class="show-products">
   <h1 class="title">Customer Reviews</h1>
   <div class="box-container">
      <?php if (!empty($reviews)) { ?>
         <?php foreach ($reviews as $review) { ?>
            <div class="box">
               <div class="image">
                  <img src="../uploads/<?php echo htmlspecialchars($review['book_image']); ?>" alt="Book Image" class="book-image">
               </div>
               <div class="name"><?php echo htmlspecialchars($review['book_title']); ?></div>
               <div class="name">"<?php echo htmlspecialchars($review['comment']); ?>"</div>
               <div class="rating">Rating: <?php echo htmlspecialchars($review['rating']); ?>/5</div>
               <div class="date">Reviewed on: <?php echo htmlspecialchars($review['created_at']); ?></div>
               <div class="comment">Reviewed by: <?php echo htmlspecialchars($review['user_name']); ?></div>
            </div>
         <?php } ?>
      <?php } else { ?>
         <p class="empty">No reviews available yet!</p>
      <?php } ?>
   </div>
</section>

</body>
</html>
