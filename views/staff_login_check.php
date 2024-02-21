<?php
    include("../dataAccess/DBconnection.php");

    $username = $_POST["user_email"];
    $pwd = $_POST["user_password"];

    $query = "SELECT empNo,firstName,lastName ,email,password,departmentId FROM staff WHERE
    email = '$username' AND password = '$pwd' LIMIT 0,1";

    $result = $dbConn  -> executeQuery($query);
    if($result -> num_rows == 1){
        //customer login
        $row = $result -> fetch_array();
        session_start();
        $_SESSION["empNo"] = $row["empNo"];
        $_SESSION["email"] = $row["email"];
        $_SESSION["firstName"] = $row["firstName"];
        $_SESSION["lastName"] = $row["lastName"];
        $_SESSION["departmentId"] = $row["departmentId"];
        

        header("location: staff_dashboad.php");
        exit(1);
    }else{
        ?>
        <script>
            alert("You entered wrong username and/or password!");
            history.back();
        </script>
        <?php
    }
?>