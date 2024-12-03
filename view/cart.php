<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../css/stylee.css">
</head>
<body>

<div class="heading"> 
    <h3>Shopping Cart</h3>
    <p><a href="../view/home.php">Home</a> / Cart</p>
</div>
 
<section class="shopping-cart">
    <h1 class="title">Books Added</h1>

    <div class="box-container">
        <?php
        require_once '../controllers/cart_controller.php';
        session_start();
        $customerId = $_SESSION['user_id'];
        $cartItems = viewCart_ctr($customerId);
        $grand_total = 0;
        if (!empty($cartItems)) {
            foreach ($cartItems as $item) {
                ?>
                <div class="box">
                    <div class="name"><?php echo $item['title']; ?></div>
                    <div class="price">$<?php echo $item['price']; ?>/-</div>
                    <div class="image">
            <img src="../uploads/<?php echo htmlspecialchars($item['image']); ?>" alt="<?php echo htmlspecialchars($item['title']); ?>" class="book-image">
         </div>
                    <form action="../actions/update_cart_action.php" method="post">
                        <input type="hidden" name="book_id" value="<?php echo htmlspecialchars($item['book_id']); ?>">
                        <div class="name"><?php echo htmlspecialchars($item['book_condition']); ?></div>
                        <input type="number" min="1" name="quantity" value="<?php echo $item['quantity']; ?>">
                        <input type="submit" name="update_cart" value="Update" class="option-btn">
                    </form> 

                    <form action="../actions/delete_cart_item_action.php" method="post" style="display:inline;">
                        <input type="hidden" name="book_id" value="<?php echo htmlspecialchars($item['book_id']); ?>">
                        <input type="submit" value="Delete" name="delete_item" class="delete-btn" onclick="return confirm('Are you sure you want to delete this book from your cart?');">
                    </form>
                    <div class="sub-total"> Subtotal: <span>$<?php echo $sub_total = ($item['quantity'] * $item['price']); ?>/-</span> </div>
                </div>
                <?php
                $grand_total += $sub_total;
            }
        } else {
            echo '<p class="empty">Your cart is empty</p>';
        }
        ?>
    </div> 

    <div class="cart-total">
    <p>Total: <span>$<?php echo $grand_total; ?>/-</span></p>
    <div class="flex">
        <form action="../actions/add_order_action.php" method="POST">
            <button type="submit" class="btn">Proceed to Checkout</button>
        </form>
        <a href="../view/home.php" class="option-btn">Continue Shopping</a>
    </div>
</div>


</section>

</body>
</html>
