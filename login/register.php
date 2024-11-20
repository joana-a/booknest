<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">


</head>
<body>
    <form id="registerForm" action="../actions/registerprocess.php" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="text" name="gender" placeholder="Gender" required>
        <input type="text" name="contact_no" placeholder="Contact" required>
        <button type="submit">Register</button>
    </form>

    <script src="../js/registervalidation.js"></script>
</body>
</html> 
   