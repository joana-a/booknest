<?php
include_once '../settings/db_class.php';

$db = new db_connection();

$mysqli = $db->db_conn();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $user_query = mysqli_query($mysqli, "SELECT username FROM `users` WHERE user_id = '$user_id'") or die('Query failed');
    $user_data = mysqli_fetch_assoc($user_query);

    $user_fname = $user_data['username'];

    $select_cart_number = mysqli_query($mysqli, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('Query failed');
    $cart_rows_number = mysqli_num_rows($select_cart_number);
} else {
    $user_id = null;
    $user_fname = '';
    $cart_rows_number = 0;
}
?>

<header class="header">
    <div class="header-2">
        <div class="flex">
            <a href="../view/home.php" class="logo">booknest <3 </a>
            <span style="font-size:x-large;">Hello, <?php echo $user_fname; ?>  !</span>
            <nav class="navbar">
                <a href="../view/about.php">about</a>
                <a href="../view/shop.php">shop</a>
                <a href="../view/orders.php">orders</a>
                <a href="../view/wishlist.php">wishlist</a>
                <a href="../view/reviews.php?book_id=<?php echo htmlspecialchars($book['book_id']); ?>">reviews</a>
            </nav>
            <div class="icons">
                <a href="../view/search.php" class="fas fa-search"></a>    
                <a href="../view/cart.php"> <i class="fas fa-shopping-cart"></i> <span>(<?php echo $cart_rows_number; ?>)</span> </a>
                 <a href="../login/logout.php" class="delete-btn">logout</a>
            </div>
            </div>
            </div>
        </div> 
    </div>
</header>
