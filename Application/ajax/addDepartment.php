<?php
 include("../config/connection.php");
    if(isset($_POST['dept_name'])){
        $title = $_POST['dept_name'];
         $t = time();
         date_default_timezone_set('Asia/Kolkata');
         $date = date("Y-m-d h:i:s");
        
             $query = "INSERT INTO `departments` (`name`,`status`, `created_date`) VALUES ('$title','1','$date')";
             $res = mysqli_query($conn,$query);

               
        if($res){
            $response = [
                "status" => 200,
                "message" => 'added Successfully.'
            ];
        }
        else{
            $response = [
                "status" => 501,
                "error" =>'Error Occured While Updating Menu Status.',
                ];
        }
    }
    echo json_encode($response);

    ?>

    