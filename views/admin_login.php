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
            <img class="admin-image"src="../assets/images/eylogo.png" alt="">
        </div>
        <div class="staff-login-form">
        <form action="admin_login_check.php" class="" method="POST">
            <h4><i class="bi bi-person-lock"></i>  Adminstrator</h4>
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" id="username" class="form-control" placeholder="Enter the username">
            <label for="user_password" class="form-label">Password</label>
            <input type="password" name="user_password" id="user_password" class="form-control" placeholder="Enter your password">
            <button type="submit"  class="btn btn-warning" >
                Log In
            </button>
            <a href="staff_login.php"><i class="bi bi-box-arrow-right"></i>  Login as user</a>

        </form>
        </div>
        </div>
    </div>
    <div class="footer">
        <?php include('../shared/footer.php')?>
    </div>
</body>
</html>