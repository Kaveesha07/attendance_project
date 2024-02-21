<?php
//database access path
include("../dataAccess/DBconnection.php");


if (isset($_POST["markAttendance"])) {
    $empId = $_POST['empNo'];
    $signDate = $_POST['Date'];
    $signTime = $_POST['time'];
    $longititude = $_POST['longitude'];
    $latitude = $_POST['latitude'];
    $clientPlace = $_POST['clientplace'];
    $location = $_POST['location'];
        

    if ($empId != null && $signTime != null && $longititude != null  && $latitude != null) {
        $insert_query = "INSERT INTO attendance (empId,signInDate,signInTime,clientplace,locations,longitude,latitude)
            VALUES ('{$empId}','{$signDate}','{$signTime}','{$clientPlace}','{$location}',{$longititude},'{$latitude}');";
        $insert_result = $dbConn->executeQuery($insert_query);
    } else {
        echo $insert_result->error();
        $insert_result = false;
    }

    if ($insert_result) {
        header("location: staff_dashboad.php?add_att=1");
    } else {
        header("location: staff_dashboad.php?add_att=0");
    }
    exit(1);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php session_start();

    $user_query = "SELECT * FROM staff WHERE empNo = {$_SESSION['empNo']}";
    $user_arr = $dbConn->executeQuery($user_query)->fetch_array();
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500&display=swap">
    <title>EY Staff Portal</title>

    <script>
        function getLocation() {

            const status = document.querySelector('.status');
            const sucess = (position) => {
                console.log(position)
                const latitude = position.coords.latitude;
                const longitude = position.coords.longitude;
                document.getElementById("latitude").value = latitude;
                document.getElementById("longitude").value = longitude;
                const geoApiUrl = `https://api.bigdatacloud.net/data/reverse-geocode-client?latitude=${latitude}&longitude=${longitude}&localityLanguage=en`

                fetch(geoApiUrl)
                    .then(res => res.json())
                    .then(data => {
                        // status.textContent=data.principalSubdivision+data.locality+data.city;
                        var citydetails = data.city + "," + data.principalSubdivision;
                        document.getElementById("locationBtn").style.display = "none";
                        document.getElementById("markAttendance").hidden = false;
                        document.getElementById("status2").hidden = false;
                        document.getElementById("status2").value = citydetails;
                    })
            }
            const error = () => {
                status.textContent = "Unable to retrieve location";
            }
            navigator.geolocation.getCurrentPosition(sucess, error);
            console.log(latitude, longitude);
            var mapProp = {
                center: new google.maps.LatLng(latitude, longitude),
                zoom: 20,
            };
            var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
        }
        // document.querySelector('.findLocation').addEventListener('click',getLocation);
    </script>


</head>

<body>
    <div class="header">
        <?php include('../shared/header.php') ?>
    </div>

    <div class="main-content attendanceView">
        <div class="back mt-5 mr-5">
            <a class="text-decoration-none text-muted" href="#" onclick="history.back();">
                <i class="bi bi-arrow-left-square pe-2"></i>Go back</a>
        </div>
        <div class="attendance ">
            
            <div class="right-attendance">
                <table style="border-collapse: separate; border-spacing: 1rem;">
                    <tr style="margin-left: 1rem;">
                        <div class="text-center"><i class="bi bi-fingerprint text-center"></i></div>
                        <p class="title text-center">Mark My Attendance</p>
                    </tr>
                    <tr>
                        <p name="Date">Date : <?php echo  date("Y/m/d") ?></p>
                    </tr>
                </table>
                <form action="staff_mark_attendance.php" method="POST">
                    <table style="border-collapse: separate; border-spacing: 1rem;" class="attendTable">
                        <tr>
                            <td>
                                <label for="empNo"> Employee Number</label>
                            </td>
                            <td class="attendTableValue">
                                <input type="text" name="empNo" id="empNo" class=" form-control" value="<?php echo $user_arr["empNo"]; ?>" readonly />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="name"> Full Name</label>
                            </td>
                            <td class="attendTableValue">
                                <input type="text" name="fname" id="name" class=" form-control" value="<?php echo $user_arr["firstName"] . " " . $user_arr["lastName"]; ?>" readonly />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="place"> Client Place</label>
                            </td>
                            <td class="attendTableValue">
                                <input type="text" name="clientplace" id="place" class=" form-control" placeholder="Enter client place Name" required />
                            </td>
                        </tr>
                        <tr>
                            <td>

                                <label for="time"> Attend Time</label>
                            </td>
                            <td class="attendTableValue">
                                <input type="text" name="time" id="time" class=" form-control" value="<?php
                                                                                                        date_default_timezone_set("Asia/Kolkata");
                                                                                                        echo date("h:i:sa") ?>" readonly />
                        <tr>
                            <input type="text" name="Date" value=<?php echo  date("Y/m/d") ?> hidden>
                        </tr>
                        </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td class="attendTableValue">
                                <!-- <td><button type="button" onlclick="myMap()">Save Location</button></td> -->
                                <input type="hidden" id="latitude" name="latitude" required>
                                <input type="hidden" id="longitude" name="longitude" required>
                                <button type="button" id="locationBtn" onclick="getLocation()">Get My Location</button>
                                <input type="text" class=" form-control" id="status2" name="location" value="0" hidden readonly>
                            </td>
                        </tr>


                        <tr>
                            <td>&nbsp;</td>
                            <td><input type="submit" value="Mark My Attendance" name="markAttendance" id="markAttendance" hidden></td>
                        </tr>
                    </table>
                    <script>
                        function myMap() {
                            console.log(latitude, longitude);

                        }
                    </script>
                    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBd1Y9yM9Lqz-6RcjjZwDbdPJ8WJV_KhiU&callback=myMap"></script>
            </div>
        </div>

        </form>
    </div>



    <div class="footer mt-5">
        <?php include('../shared/footer.php') ?>
    </div>
</body>

</html>