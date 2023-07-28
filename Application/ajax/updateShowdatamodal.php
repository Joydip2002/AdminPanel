<?php
include('../config/connection.php');

// update data
if (isset($_POST['uid'])) {
    $uuid = $_POST['uid'];
    // $name = $_POST['name'];
    $title = $_POST['title'];
    $parentid = $_POST['parentid'];
    $orderlist = $_POST['orderlist'];
    $status = $_POST['status'];
    $icon = $_POST['icon'];
    $url = $_POST['url'];
    // echo $uuid, $name ,$title, $parentid, $orderlist, $status, $icon, $url;
    // die;
    $t = time();
    date_default_timezone_set('Asia/Kolkata');

    $date = date("Y-m-d h:i:s");
    $orderplus = $orderlist+1;
    $sqlpg = "SELECT * FROM `menulist` WHERE `parentid`='$parentid' AND `orderlist`>='$orderplus'";
    $respg= mysqli_query($conn,$sqlpg);
    $numpg = mysqli_num_rows($respg);
    if($numpg>0){      
        $sequentialOrder=$orderplus+1;
        while ($row = mysqli_fetch_assoc($respg)) {
            $menuId = $row['id'];
            $updateOrderQuery = "UPDATE `menulist` SET `orderlist` = $sequentialOrder WHERE `id` = $menuId";
            $updateOrderResult = mysqli_query($conn, $updateOrderQuery);
            $sequentialOrder++;
        }
    }
    $updateQuery = "UPDATE `menulist` SET `title` = '$title', `parentid` ='$parentid',`orderlist`='$orderplus',`updated_date`= '$date',`navicon` = '$icon',`url` ='$url' WHERE `id` = '$uuid'";
    $upres = mysqli_query($conn, $updateQuery);

    if ($upres) {
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