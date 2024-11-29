<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Add Book</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="../css/admin.css">
   <!-- <link rel="stylesheet" href="../css/stylee.css"> -->
</head>
<body>

<section class="add-products">
  
   <h1 class="title">All Books</h1>
   <p style="text-align: center; font-size: 24px; font-weight: bold;">
    <a href="../view/admin_dashboard.php" style="text-decoration: none; color: #007bff; padding: 0px 10px; 
    border-radius: 5px; font-weight: bold; background-color: #f8f9fa;">Dashboard</a> / Books
</p>



   <form action="../actions/add_book_action.php" method="post" enctype="multipart/form-data">
      <h3>Add New Book</h3> 

      <input type="text" name="title" class="box" placeholder="Enter book title" required>

      <input type="text" name="author" class="box" placeholder="Enter book author" required>

      <select name="genre" required>
            <option value="" disabled selected>Select Genre</option>
            <option value="fantasy">Fantasy</option>
            <option value="thriller">Thriller</option>
            <option value="romance">Romance</option>
            <option value="scifi">Science Fiction</option>
            <option value="afrilit">African Literature</option>
            <option value="historical">Historical Fiction</option>
            <option value="textbook">Textbook</option>
            <option value="nonfiction">Non-fiction</option>
        </select>
      
      <input type="number" name="price" class="box" placeholder="Enter book price" required>

      <select name="bookcondition" required>
            <option value="" disabled selected>Select Book's Condition</option>
            <option value="new">New</option>
            <option value="like new">like new</option>
            <option value="used">Used</option>
        </select>
       
      <input type="text" name="keywords" class="box" placeholder="Enter keywords (comma-separated)" required>

      <input type="text" name="quantity" class="box" placeholder="Enter book quantity" required>

      <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box" required>

      <input type="submit" value="Add Book" name="add_book" class="btn">
   </form>

</section>

<section class="show-products">

   <h3>Available Books</h3>

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
            <img src="../uploads/<?php echo htmlspecialchars($book['image']); ?>" alt="<?php echo htmlspecialchars($book['title']); ?>" class="book-image">
         </div>

         
         <button type="button" class="btn" onclick="toggleUpdateForm(<?php echo $book['book_id']; ?>)">Update</button>
         <div id="update-form-<?php echo $book['book_id']; ?>" class="edit-product-form" style="display: none;">
        <form action="../actions/update_book_action.php" method="post">
            <input type="hidden" name="book_id" value="<?php echo htmlspecialchars($book['book_id']); ?>">
            
            <label for="quantity-<?php echo $book['book_id']; ?>">Quantity:</label>
            <input type="number" id="quantity-<?php echo $book['book_id']; ?>" name="quantity" class="box" value="<?php echo $book['quantity']; ?>" required>
            
            <label for="price-<?php echo $book['book_id']; ?>">Price:</label>
            <input type="number" id="price-<?php echo $book['book_id']; ?>" name="price" class="box" value="<?php echo $book['price']; ?>" required>

            <label for="book_condition-<?php echo $book['book_id']; ?>">Condition:</label>
            <select name="book_condition" id="book_condition-<?php echo $book['book_id']; ?>" class="box" required>
                <option value="new" <?php echo ($book['book_condition'] == 'new') ? 'selected' : ''; ?>>New</option>
                <option value="like new" <?php echo ($book['book_condition'] == 'like new') ? 'selected' : ''; ?>>Like New</option>
                <option value="used" <?php echo ($book['book_condition'] == 'used') ? 'selected' : ''; ?>>Used</option>
            </select>

            <input type="submit" name="update_book" value="Update Book" class="option-btn">
        </form>
    </div>


         <form action="../actions/delete_book_action.php" method="post" style="display:inline;">
             <input type="hidden" name="book_id" value="<?php echo htmlspecialchars($book['book_id']); ?>">
             <input type="submit" value="Delete" name="delete_book" class="delete-btn" onclick="return confirm('Are you sure you want to delete this book?');">
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

<script>
    // Function to toggle visibility of the update form
    function toggleUpdateForm(bookId) {
        var form = document.getElementById('update-form-' + bookId);

        if (form.style.display === "none" || form.style.display === "") {
            form.style.display = "block";  
        } else {
            form.style.display = "none";   
        }
    }
</script>

</body>


</html>
