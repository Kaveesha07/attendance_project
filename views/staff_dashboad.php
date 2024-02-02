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
            <div class="card-box">
                <div class="attendcard">
                    <div class="card-icon">
                            <span><i class="bi bi-fingerprint"></i></span>
                    </div>
                    <div class="card-text">
                            <span>Mark Attendance</span>
                    </div>
                    
                </div>
                <div class="attendcard">
                    <div class="card-icon">
                            <span><i class="bi bi-file-earmark-person"></i></span>
                    </div>
                    <div class="card-text">
                            <span>View Previous Attendance</span>
                    </div>
   
                    
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <?php include('../shared/footer.php')?>
    </div>
</body>
</html>