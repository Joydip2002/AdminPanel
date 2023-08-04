<?php

include("../config/connection.php");
if(isset($_POST['id']))
{
    
    $id=$_POST['id'];
    $t = time();
    date_default_timezone_set('Asia/Kolkata');
    $date = date("Y-m-d h:i:s");
    //Approved OF Parent Menu
    $appquery ="UPDATE `admission` SET `verified_status`='allocate' WHERE `id`='$id'";
    $resapp = mysqli_query($conn,$appquery);  
    if($resapp){
        $query = "SELECT * FROM students WHERE admission_id = '$id'";
        $checkres = mysqli_query($conn,$query);
        $countData = mysqli_num_rows($checkres);
        if($countData == 0){
            $insertQueryStu = "INSERT INTO students (admission_id,roll,status,created_date) VALUES ('$id','','1','$date')";
            $res2 = mysqli_query($conn,$insertQueryStu);
        }
        else{
            $studentStatusquery ="UPDATE `students` SET `status` = '1' WHERE `admission_id`='$id'";
            $resstudent=mysqli_query($conn,$studentStatusquery);
        }
    }
    if($resapp){
        $response = [
            "status" => 200,
            "message" => "success",
            "data"=>[]
        ];  
    }
    else{
        $response = [
            "status" => 400,
            "message" => "something went wrong",
            "data"=>[]
        ];  
    }
   echo json_encode($response);

}

 

?>