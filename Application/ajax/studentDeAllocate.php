<?php
include("../config/connection.php");
if(isset($_POST['id']))
{
    
    $id=$_POST['id'];
    //Approved OF Parent Menu
    $appquery ="UPDATE `admission` SET `status` = 'sa', `verified_status`='a' WHERE `id`='$id'";
    $resapp = mysqli_query($conn,$appquery);  
    if($resapp)
      {
        $studentStatusquery ="UPDATE `students` SET `status` = '0' WHERE `admission_id`='$id'";
        $resstudent=mysqli_query($conn,$studentStatusquery);

        $appresponse = [
            "status" => 200,
            "message" => "verify successfully",
            "data"=>[]
        ];  
   }
    else
    {
        $appresponse = [
            "status" => 400,
            "message" => "something went wrong",
            "data"=>[]
        ];  
    }
   echo json_encode($appresponse);

}

 

?>