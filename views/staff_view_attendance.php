<!DOCTYPE html>
<html lang="en">

<head>
    <?php session_start();
       
    include("../dataAccess/DBconnection.php"); 
    $userId = $_SESSION['empNo']?>

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
        <?php include('../shared/header.php') ?>
    </div>
    <div class="main-content">
            <div class="border-bottom">
                <a class="nav nav-item text-decoration-none text-muted mb-5 pt-2 mt-2" href="#" onclick="history.back();">
                    <i class="bi bi-arrow-left-square pe-2"></i>Go back</a>
        <div class="pt-2" id="pop-table">

            <form class="form-floating mb-3 " method="GET" action="staff_view_attendance.php">
                    <div class="row g-2">
                        <div class="col-6" style="width:50%" >
                            <input type="date" class="form-control" id="Date" name="Date" placeholder="Attendance Date" <?php if (isset($_GET["search"])) { ?>value="<?php echo $_GET["Date"]; ?>" <?php } ?>>
                        </div>
                        <div class="col-auto">
                            <button type="submit" name="search" class="btn btn-primary" >Search</button>
                            <button type="reset" class="btn btn-danger" onclick="javascript: window.location='staff_view_attendance.php'">Clear</button>
                        </div>
                    </div>
                </form>

            <?php

            if (!isset($_GET["search"])) {
                //when no search all items retrive
                $search_query = "SELECT * FROM attendance WHERE empId='$userId' ORDER BY signInDate,signInTime DESC" ;
            } else {
                //when search only get exact item
                $search_fn = $_GET["Date"];
                $search_query = "SELECT * FROM attendance WHERE empId='$userId' AND signInDate LIKE '%{$search_fn}%' ORDER BY signInTime ASC";
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
                        <a href="staff_view_attendance.php" class="text-white">Clear Search Result</a>
                    </div>
                </div>
            <?php } else { ?>
                <div class="table-responsive">
                    <table class="table rounded-5 table-light table-striped table-hover align-middle caption-top mb-5">
                        <caption><?php echo $search_numrow; ?> Attendance(s) <?php if (isset($_GET["search"])) { ?><br /><a href="staff_view_attendance.php" class="text-decoration-none text-danger">Clear Search
                                    Result</a><?php } ?></caption>
                        <thead class="bg-light">
                            <tr>
                                <th scope="col">#</th>
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
                                    <td><?php echo $row["empId"]; ?></td>
                                    <td><?php echo $row["signInDate"]; ?></td>
                                    <td><?php echo $row["signInTime"]; ?></td>
                                    <td>
                                        <a href="staff_mark_attendance_loc.php?attendanceId=<?php echo $row["attendanceId"] ?>
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
    <div class="footer">
        <?php include('../shared/footer.php') ?>
    </div>
</body>

</html>