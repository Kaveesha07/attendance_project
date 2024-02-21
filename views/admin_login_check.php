<?php
    session_start();
    //database access path
    include("../dataAccess/DBconnection.php");

    $username = $_POST["username"];
    $passwrd = $_POST["user_password"];

    $query = "SELECT adminId,username,password,name FROM admin WHERE
    username = '$username' AND password = '$passwrd' LIMIT 0,1";

    $result = $dbConn -> executeQuery($query);
    if($result -> num_rows == 1){
        //director login
        $row = $result -> fetch_array();
        $_SESSION["adminId"] = $row["adminId"];
        $_SESSION["username"] = $username;
        $_SESSION["name"] = $row["name"];
        header("location: admin_dashboad.php");
    }else{
        ?>
        <script>
            alert("Wrong username and/or password!");
            history.back();
        </script>
        <?php
    }
?>