<?php
include('../config/connection.php');

        if (isset($_POST['updateid'])) {
            $uid = $_POST['updateid'];

            $findquery = "SELECT * FROM menulist WHERE id = '$uid'";

            $findres = mysqli_query($conn, $findquery);

            while($finddata = mysqli_fetch_array($findres)){
                $response = $finddata;
            }
        }
        else{
            $response=[
                'status'=> 404,
                'message' => 'Invalid Request!'
            ];
        }
        echo json_encode($response); 
?>