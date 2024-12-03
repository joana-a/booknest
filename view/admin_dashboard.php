<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css"> 
    <title>Admin Dashboard</title>
</head>
<body>
    <header class="header">
        <div class="flex">
            <div class="logo">Admin Dashboard <span>Panel</span></div>
            <div class="navbar">
                <a href="admin_books.php">Books</a>
                
            </div>
            <div class="user-box">
                 <a href="../login/logout.php" class="delete-btn">logout</a>
            </div>
        </div>
    </header>

    <section>
        <h1 class="title">Welcome to the Admin Dashboard</h1>
        <div class="dashboard">
            <div class="box-container">
                <div class="box">
                    <h3>Manage Books</h3>
                    <p><a href="admin_books.php" class="btn">Manage Books</a></p>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
