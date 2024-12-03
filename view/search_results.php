<?php
session_start();  

if (isset($_SESSION['search_results']) && count($_SESSION['search_results']) > 0) {
    $search_results = $_SESSION['search_results'];
} else {
    $search_results = []; 
}
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
    <title>Search Results</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/stylee.css">
    
</head>
<body>
    <?php include '../view/header.php'; ?>
    
    <div class="heading">
        <h3>Search Results</h3>
        <p> <a href="../view/home.php">Home</a> / Search Results </p>
    </div>

    <section class="search-results">
        <?php if (!empty($search_results)): ?>
            <div class="box-container">
                <?php foreach ($search_results as $product): ?>
                    <div class="box">
                        <div class="name"><?php echo $product['title']; ?></div>
                        <div class="price">$<?php echo $product['price']; ?>/-</div>
                        <div class="image">
            <img src="../uploads/<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['title']); ?>" class="book-image">
         </div>
         <form action="../actions/add_to_cart_action.php" method="post" style="display:inline;">
                        <input type="hidden" name="book_id" value="<?php echo $product['book_id']; ?>">
                        <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user_id); ?>"> 
                        <input type="submit" class="btn" value="Add to Cart" name="add_to_cart">
        </form>

        <form action="../actions/add_to_wishlist_action.php" method="post" style="display:inline;">
    <input type="hidden" name="book_id" value="<?php echo htmlspecialchars($product['book_id']); ?>">
    <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user_id); ?>"> 
    <input type="submit" value="Add to Wishlist" name="add_to_wishlist" class="btn">
</form>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>No results found :(</p>
        <?php endif; ?>
    </section>

    <script src="../js/script.js"></script>
</body>
</html>
