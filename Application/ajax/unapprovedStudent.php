<?php
include("../config/connection.php");
if(isset($_POST['id'])){
    $sid = $_POST['id'];

    $query = "UPDATE admission SET status = '0' WHERE id = '$sid'";
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