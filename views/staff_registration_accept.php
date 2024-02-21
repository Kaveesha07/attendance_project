<?php
    //For inserting new system operator to database
    include("../dataAccess/DBconnection.php");

    //check password with confirm password
    $pwd = $_POST["pwd"];
    $cfpwd = $_POST["cfpwd"];
    if($pwd != $cfpwd){
        ?>
        <script>
            alert('Your password is not match.\nPlease enter it again.');
            history.back();
        </script>
        <?php
        exit(1);
    }else{
        //get other info when password matches
        $email = $_POST["email"];
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $contactNo = $_POST["contactNo"];
        $department = $_POST["department"];
    

        //Check for duplicating username
        $query = "SELECT email FROM staff WHERE email = '$email';";
        $result = $dbConn -> executeQuery($query);
        if($result -> num_rows >= 1){
            ?>
            <script>
                alert('Your email is already registered!');
                history.back();
            </script>
            <?php
        }
        $result -> free_result();

        //Enter the new operatir details to database
        $query = "INSERT INTO staff (email,firstName,lastName,contactNo,departmentId,password)
        VALUES ('$email','$firstName','$lastName','$contactNo','$department','$pwd');";
        $result = $dbConn -> executeQuery($query);

        //send varriable based on output
        if($result){
            header("location: staff_register.php?reg_up=1");
        }else{
            header("location: staff_register.php?reg_up=0");
        }
    }
?>