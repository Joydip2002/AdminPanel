<?php
include("../config/connection.php");
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $t = time();
    date_default_timezone_set('Asia/Kolkata');
    $date = date("Y-m-d h:i:s");
    $query = "UPDATE admission SET status = 'ss',updated_date = '$date' WHERE id = '$id'";
    $res = mysqli_query($conn,$query);

    if($res){
        $response = [
            'status' => 200,
            'message' => "selected student"
        ];
    }
    else{
        $response = [
            'status' => 200,
            'message' => "selected student"
        ];
    }
    echo json_encode($response);
}

?>