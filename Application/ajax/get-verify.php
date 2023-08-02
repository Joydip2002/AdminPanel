<?php

include("../config/connection.php");
if(isset($_POST['id']))
{
    $appid=$_POST['id'];
    //Approved OF Parent Menu
    $appquery ="UPDATE `admission` SET `btn_check`='1' WHERE `id`='$appid'";
    $resapp = mysqli_query($conn,$appquery);  
    if($resapp)
      {
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