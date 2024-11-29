<?php 
include '../actions/search_action.php';  

if (!isset($_SESSION['user_id'])) {
    header('location:../login/login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../css/stylee.css">
</head>
<body>
    <?php include '../view/header.php'; ?>

    <div class="heading">
        <h3>What book are you looking for?</h3>
        <p><a href="../view/home.php">Home</a> / Search</p>
    </div>

    <section class="search-form">
        <form action="" method="post">
            <input type="text" name="search" placeholder="Search books..." class="box">
            <input type="submit" name="submit" value="Search" class="btn">
        </form>
    </section>

    <script src="../js/script.js"></script>
</body>
</html>
