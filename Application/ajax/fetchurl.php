<?php
include("../config/connection.php");
if(isset($_POST['urid'])){
    $ur_id = $_POST['urid'];
    $urlquery = "SELECT url FROM menulist WHERE id = $ur_id";
    $res = mysqli_query($conn,$urlquery);
    echo mysqli_fetch_assoc($res)['url'];
}
?>