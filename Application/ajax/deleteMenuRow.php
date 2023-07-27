<?php
include("../config/connection.php");

if(isset($_POST['menu_id'])){
    $mid = $_POST['menu_id'];

    $deleteQuery = "DELETE FROM menulist WHERE id = '$mid'";
    $delRes = mysqli_query($conn,$deleteQuery);

    $delChild = "DELETE FROM menulist WHERE parentid = '$mid'";
    $delCRes = mysqli_query($conn,$delChild);

    if ($delRes || $delCRes) {
        $response=[
            'status'=> 200,
            'message'=>'deleted successfully'
        ];
    }
    else{
        $response=[
            'status'=> 404,
            'message'=>'Something Went Wrong!!'
        ];
    }

    echo json_encode($response);
}

?>