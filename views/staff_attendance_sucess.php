<?php
   
    //database access path
    include("../dataAccess/DBconnection.php");
    $empId =$POST['empNo'];
    $signTime =$POST['time'];
    $longititude =$POST['latitude'];
    $latitude =$POST['longitude'];

    //first add 
    $delete_query2 = "DELETE FROM poplines WHERE popNo = '{$popNo}';";
    $delete_result2 = $dbConn -> executeQuery($delete_query2);
    
    //then inactive the pop status
    $status="Inactive";
    $update_query = "UPDATE pop SET status = '{$status}' WHERE popNo = '{$popNo}'";
    $update_result = $dbConn -> executeQuery($update_query);

    
    if($delete_result2 && $update_result){
        header("location: pop_view.php?d_itm=1");
    }else{
        header("location: pop_view.php?d_itm=0");
    }
?>