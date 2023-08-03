<?php
include("../config/connection.php");
if(isset($_POST['id'])){
    $sid = $_POST['id'];
    $findquery = "SELECT * FROM admission WHERE id = '$sid'";
    $findVerifiedStatus = mysqli_query($conn,$findquery);

    $fetchStatus = mysqli_fetch_array($findVerifiedStatus);
    $verifiedStatus =  $fetchStatus[14];

    $t = time();
    date_default_timezone_set('Asia/Kolkata');
    $date = date("Y-m-d h:i:s");
    $query = "UPDATE admission SET status = 'sa', verified_status = 'a',updated_date = '$date' WHERE id = '$sid'";
    $res = mysqli_query($conn,$query);

    if($res){
        $response = [
            'status'=>200,
            'message'=>"approved successfully"
        ];
    }
    else{
        $response = [
            'status'=>404,
            'message'=>"something went wrong!!"
        ];
    }
    echo json_encode($response);
}
?>