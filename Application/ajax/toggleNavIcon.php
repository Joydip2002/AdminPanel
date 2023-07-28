<?php
include("../config/connection.php");
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $status = $_POST['status'];
        $sqlStatus = "UPDATE menulist SET status = '$status' WHERE id = '$id'";
        $resStatus = mysqli_query($conn,$sqlStatus);
        if($resStatus){
            $response = [
                "status" => 200,
                "message" => 'Menu Status Updated Successfully.'
            ];
        }
        else{
            $response = [
                "status" => 501,
                "error" =>'Error Occured While Updating Menu Status.',
                ];
        }
    }
    echo json_encode($response);
?>