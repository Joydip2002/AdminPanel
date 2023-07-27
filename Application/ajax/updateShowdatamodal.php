<?php
include('../config/connection.php');

// update data
if (isset($_POST['uid'])) {
    $uuid = $_POST['uid'];
    $name = $_POST['name'];
    $title = $_POST['title'];
    $parentid = $_POST['parentid'];
    $orderlist = $_POST['orderlist'];
    $status = $_POST['status'];
    $icon = $_POST['icon'];
    $url = $_POST['url'];

    $t = time();
    date_default_timezone_set('Asia/Kolkata');
    $date = date("Y-m-d h:i:s");

    // Fetch the current listorder values from the database in ascending order
    $fetchOrderQuery = "SELECT id,orderlist FROM menulist WHERE title = '$title' ORDER BY orderlist ASC";
    $fetchOrderResult = mysqli_query($conn, $fetchOrderQuery);

    if ($fetchOrderResult) {
        $sequentialOrder = 1;
        
        while ($row = mysqli_fetch_assoc($fetchOrderResult)) {
            $menuId = $row['id'];
            $updateOrderQuery = "UPDATE menulist SET orderlist = $sequentialOrder WHERE parentid = $menuId";
            $updateOrderResult = mysqli_query($conn, $updateOrderQuery);
            echo $sequentialOrder++;
        }
    }

    $updateQuery = "UPDATE menulist SET name = '$name', title = '$title', parentid ='$parentid', orderlist = '$orderlist',status='$status', navicon = '$icon',url ='$url',updated_date = '$date' WHERE id = '$uuid'";
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