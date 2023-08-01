<?php
include("../config/connection.php");
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $adstatus = $_POST['status'];
        $sqlStatus = "UPDATE admission SET admission_status = '$adstatus' WHERE id = '$id'";
        $resStatus = mysqli_query($conn,$sqlStatus);
        
        if($resStatus){
            $response = [
                "status" => 200,
                "message" => 'admission Status Updated Successfully.'
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