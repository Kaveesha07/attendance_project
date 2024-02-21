<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500&display=swap">
    <title>EY Staff Portal</title>
    
</head>
<body>
    <div class="header">
        <?php include('../shared/startHeader.php')?>
    </div>
    <div class="main-content">
        <div class="content">
        <div class="content-right">
            <img src="../assets/images/attendance.jpg" alt="">
        </div>
        <div class="staff-login-form">
        <form action="staff_login_check.php" method="POST" class="">
            <img src="../assets/images/eylogo.png" alt="eylogo.png" width='100rem'>
            <label for="user_email" class="form-label">Email Address</label>
            <input type="email" name="user_email" id="user_email" class="form-control" placeholder="Enter the email address">
            <label for="user_password" class="form-label">Password</label>
            <input type="password" name="user_password" id="user_password" class="form-control" placeholder="Enter your password">
            <button type="submit"  class="btn btn-warning" >
                Log In
            </button>
            <a href=""><i class="bi bi-question-circle"></i>  Forgot password</a>
            <a href="admin_login.php"><i class="bi bi-box-arrow-right"></i>  Log into Admin</a>
            <a href="staff_register.php"><i class="bi bi-person-plus"></i>  Create account</a>

        </form>
        </div>
        </div>
    </div>
    
    <div class="footer">
        <?php include('../shared/footer.php')?>
    </div>
</body>
</html>