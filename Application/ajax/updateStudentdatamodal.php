<?php
include("../config/connection.php");
if(isset($_POST['sid'])){
    $name = $_POST["name"];
    $title = $_POST["title"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $season = $_POST["season"];
    $roll = $_POST["roll"];
    $department = $_POST["department"];
    $sid = $_POST["sid"];
    $t = time();
    date_default_timezone_set('Asia/Kolkata');
    $date = date("Y-m-d h:i:s");

    $editQuery = "UPDATE students SET roll = '$roll', updated_date = '$date' WHERE admission_id = '$sid'";
    $editRes = mysqli_query($conn,$editQuery);

    echo $editQuery2 = "UPDATE admission SET name = '$name', title = '$title', email = '$email',mobile = '$mobile',updated_date = '$date' WHERE id = '$sid'";
    $editRes2 = mysqli_query($conn,$editQuery2);

    if($editQuery){
        echo "success";
    }
}
?>