<?php
include('../config/connection.php');
 // update data
 if(isset($_POST['uid'])){
          
    $uuid = $_POST['uid']; 
    $name = $_POST['name'];
    $title = $_POST['title'];
    $parentid = $_POST['parentid'];
    $orderlist = $_POST['orderlist'];
    $status = $_POST['status'];
    $icon = $_POST['icon'];
    $url = $_POST['url'];

    $updateQuery = "UPDATE menulist SET name = '$name', title = '$title', parentid ='$parentid', orderlist = '$orderlist',status='$status', navicon = '$icon',url ='$url' WHERE id = '$uuid'";
    $upres = mysqli_query($conn,$updateQuery);

    if($upres){
        $response2 = [
            "status" => 200,
            "message" => "updated successfully",
            "data" => []
        ];
    } else {
        $response2 = [
            "status" => 404,
            "message" => "something went wrong",
            "data" => []
        ];
    }
}
echo json_encode($response2);
?>