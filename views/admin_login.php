<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <title>EY Staff Portal</title>
</head>
<body>
    <div class="header">
        <?php include('../shared/header.php')?>
    </div>
    <div class="main-content">
        <div class="content">
        <div class="content-right">
            <img class="admin-image"src="../assets/images/eylogo.png" alt="">
        </div>
        <div class="staff-login-form">
        <form action="" class="">
            <h4><i class="bi bi-person-lock"></i>  Adminstrator</h4>
            <label for="username" class="form-label">Username</label>
            <input type="email" name="username" id="username" class="form-control" placeholder="Enter the username">
            <label for="user_password" class="form-label">Password</label>
            <input type="text" name="user_password" id="user_password" class="form-control" placeholder="Enter your password">
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