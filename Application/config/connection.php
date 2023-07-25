<?php
include("constant.php");
    $conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    if(!$conn){
        echo "Not connected";
    }
?>