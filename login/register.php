<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="../css/regstyle.css">
    <link rel="stylesheet" type="text/css" href="../css/loginstyle.css">
</head>
<body>
    <div class="banner">
        <h2>Register</h2>
    </div>  

    <div class="login-container">
        <form id="registerForm" action="../actions/registerprocess.php" method="POST">
            <div class="form-group">
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <select name="gender" required>
                    <option value="" disabled selected>Select Gender</option>
                    <option value="female">Female</option>
                    <option value="male">Male</option>
                </select>
            </div>
            <div class="form-group">
                <input type="text" name="contact_no" placeholder="Contact" required>
            </div>
            <button type="submit" class="btn">Register</button>
            <p class="signup-link">Already have an account? <a href="../login/login.php">Log In!</a></p>
        </form>
        
    </div>

    <script src="../js/registervalidation.js"></script>
</body>
</html>
