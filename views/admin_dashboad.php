<?php
include("../dataAccess/DBconnection.php");
//open po count 
$date = date("Y/m/d");

$ReadSql = "SELECT count(*) as count FROM attendance Where signInDate ='$date'";
$resPO = $dbConn->executeQuery($ReadSql);

$ReadSql = "SELECT count(*) as count FROM 	staff ";
$resStaff = $dbConn->executeQuery($ReadSql);




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php session_start(); ?>
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
    <div class="main-content adminDashboad">
        <div class="pt-5">
            <div class="cardBox2 ">
                
                    <div class="card2 text-center">
                        <div class="text-center">
                            <?php
                            if (mysqli_num_rows($resPO) > 0) {
                                $row = mysqli_fetch_assoc($resPO);
                                $count = $row["count"];
                            } ?>
                            <div class="numbers"><?php echo $count ?></div>
                            <div class="cardName">Today Attendance </div>
                        </div>

                        <div class="iconBx mt-1">
                            <i class="bi bi-fingerprint" style="font-size: 35px;"></i>
                        </div>
                    </div>
             
               
                    <div class="card2 text-center">
                        <div>
                            <?php
                            if (mysqli_num_rows($resStaff) > 0) {
                                $row = mysqli_fetch_assoc($resStaff);
                                $count = $row["count"];
                            } ?>
                            <div class="numbers"><?php echo $count ?></div>
                            <div class="cardName">No of Employees</div>
                        </div>
                        <div class="iconBx mt-1">
                            <i class="bi bi-people" style="font-size: 35px;"></i>
                        </div>

               
            </div>
        </div>

            <div class="details mt-5">
                        <form class="form-floating mb-3 mt-3" method="GET" action="admin_dashboad.php">
                            <div class="row g-2">
                                <div class="col">
                                    <input type="text" class="form-control" id="Date" name="Date" placeholder="Student Name or Attendance Date" <?php if (isset($_GET["search"])) { ?>value="<?php echo $_GET["Date"]; ?>" <?php } ?>>
                                </div>
                                <div class="col-auto">
                                    <button type="submit" name="search" class="btn btn-primary">Search</button>
                                    <button type="reset" class="btn btn-danger" onclick="javascript: window.location='admin_dashboad.php'">Clear</button>
                                </div>
                            </div>
                        </form>

                        <?php

                        if (!isset($_GET["search"])) {
                            //when no search all items retrive
                            $search_query = "SELECT * FROM attendance ,staff  WHERE staff.empNo = attendance.empId ORDER BY attendance.signInDate DESC";
                        } else {
                            //when search only get exact item
                            $search_fn = $_GET["Date"];
                            $search_query = "SELECT * FROM attendance,staff WHERE staff.empNo = attendance.empId AND (attendance.signInDate LIKE '%{$search_fn}%' OR  staff.firstName LIKE '%{$search_fn}%')  ORDER BY attendance.signInTime ASC";
                        }
                        $search_result = $dbConn->executeQuery($search_query);
                        $search_numrow = $search_result->num_rows;
                        if ($search_numrow == 0) {
                        ?>
                            <div class="row">
                                <div class="col mt-2 ms-2 p-2 bg-danger text-white rounded text-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle ms-2" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                    </svg><span class="ms-2 mt-2">No Attendance Record Found!</span>
                                    <a href="admin_dashboad.php" class="text-white">Clear Search Result</a>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="table-responsive">
                                <table class="table rounded-5 table-light table-striped table-hover align-middle caption-top mb-5">
                                    <caption><?php echo $search_numrow; ?> Attendance(s) <?php if (isset($_GET["search"])) { ?><br /><a href="admin_dashboad.php" class="text-decoration-none text-danger">Clear Search
                                                Result</a><?php } ?></caption>
                                    <thead class="bg-light">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Employee Name </th>
                                            <th scope="col">Client Place</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Time</th>
                                            <th scope="col">View Location</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!--show pop values from database -->
                                        <?php $i = 1;
                                        while ($row = $search_result->fetch_array()) { ?>
                                            <tr>
                                                <th><?php echo $i++; ?></th>
                                                <td><?php echo $row["firstName"] . " " . $row["lastName"]; ?></td>
                                                <td><?php echo $row["clientPlace"]; ?></td>
                                                <td><?php echo $row["signInDate"]; ?></td>
                                                <td><?php echo $row["signInTime"]; ?></td>
                                                <td>
                                                    <a href="admin_attendance_loc.php?attendanceId=<?php echo $row["attendanceId"] ?>
                            " class="btn btn-sm btn-warning">View</a>
                                                </td>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php }
                        $search_result->free_result();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <?php include('../shared/footer.php') ?>
    </div>

</body>

</html>