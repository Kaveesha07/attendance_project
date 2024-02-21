<!DOCTYPE html>
<html lang="en">
<head>
    <?php session_start(); include("../dataAccess/DBconnection.php");?>
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
        <?php include('../shared/header.php')?>
    </div>
    <div class="main-content">
    <div style="margin-top: 10px;">
            <?php 
            
            if(isset($_GET["add_att"])){
                if($_GET["add_att"]==1){
                    ?>
            <!-- message for sucesfully add attendance record -->
            <div class="row row-cols-1 notibar">
                <div class="col mt-2 ms-2 p-2 bg-success text-white rounded text-start">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-check-circle ms-2" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path
                            d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                    </svg>
                    <span class="ms-2 mt-2">Successfully Mark My Attendance.</span>
                    <span class="me-2 float-end"><a class="text-decoration-none link-light" href="staff_dashboad.php">X</a></span>
                </div>
            </div>

            <?php }else{ ?>
            <!-- message for failed to update item  -->
            <div class="row row-cols-1 notibar">
                <div class="col mt-2 ms-2 p-2 bg-danger text-white rounded text-start">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-x-circle ms-2" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path
                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                    </svg><span class="ms-2 mt-2">Failed to Mark My Attendance.</span>
                    <span class="me-2 float-end"><a class="text-decoration-none link-light" href="staff_dashboad.php">X</a></span>
                </div>
            </div>
            <?php }
                }
            ?>
            </div>

    
        <div class="content">
            <div class="card-box">
                <a class="card-link" href="staff_mark_attendance.php">
                <div class="attendcard">
                    <div class="card-icon">
                            <span><i class="bi bi-fingerprint"></i></span>
                    </div>
                    <div class="card-text">
                            <span>Mark Attendance</span>
                    </div>
                    </a>    
                </div>
                <a class="card-link" href="staff_view_attendance.php">
                <div class="attendcard">
                    <div class="card-icon">
                        <span><i class="bi bi-file-earmark-person"></i></span>
                    </div>
                    <div class="card-text">
                    <span>View Previous Attendance</span>
                    </div>
                </div>
                </a>
            </div>
        </div>
    </div>
    <div class="footer">
        <?php include('../shared/footer.php')?>
    </div>
</body>
</html>