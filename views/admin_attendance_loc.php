<?php
//database access path
include("../dataAccess/DBconnection.php");



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php session_start();
    $Id = $_GET['attendanceId'];


    $user_query2 = "SELECT * FROM attendance,staff WHERE staff.empNo=attendance.empId AND attendance.attendanceId = $Id";
    $user_arr2 = $dbConn->executeQuery($user_query2)->fetch_array();
    $longitude = $user_arr2["longitude"];
    $latitude = $user_arr2["latitude"];


    ?>
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
        <?php include('../shared/headeradmin.php') ?>
    </div>
    <div class="main-content ">
        <div class="back mt-3 mb-3 mr-5">
            <a class="text-decoration-none text-muted" href="#" onclick="history.back();">
                <i class="bi bi-arrow-left-square pe-2"></i>Go back</a>
        </div>
        <div class="emp-location">

        <div class="emp-details">
            <table>
                <tr>
                    <td>Employee Name : </td>
                    <td><?php echo "  " .$user_arr2["firstName"] . " " . $user_arr2["lastName"]; ?></td>
                </tr>
                <tr>
                    <td>Attend Date : </td>
                    <td><?php echo "  " .$user_arr2["signInDate"]; ?></td>
                </tr>
                <tr>
                    <td>Sign Date : </td>
                    <td><?php echo "  " .$user_arr2["signInTime"]; ?></td>
                </tr>
                <tr>
                    <td>Client Place Name : </td>
                    <td><?php echo "  " .$user_arr2["clientPlace"]; ?></td>
                </tr>
                <tr>
                    <td>Location : </td>
                    <td><?php echo "  " .$user_arr2["locations"]; ?></td>
                </tr>
            </table>
        </div>
        <div class="employee-location mt-3">
            <div id="googleMap" style="width: 400px; height:400px; background-color:gray;"></div>

            <?php
            echo "<script>var lattiude = '$latitude'; var longitude='$longitude';</script>";
            ?>
            <script>
                function myMap() {
                    console.log(lattiude, longitude);
                    var mapProp = {
                        center: new google.maps.LatLng(lattiude, longitude),
                        zoom: 20,
                    };
                    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

                }
            </script>
            <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBd1Y9yM9Lqz-6RcjjZwDbdPJ8WJV_KhiU&callback=myMap"></script>
        </div>
    </div>
    </div>
    <div class="footer">
        <?php include('../shared/footer.php') ?>
    </div>
</body>

</html>