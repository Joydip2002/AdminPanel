<?php
include('../config/connection.php');

        if (isset($_POST['id'])) {
            $sid = $_POST['id'];

            $findquery = "SELECT admission.*,students.roll,departments.name AS dept_name FROM admission LEFT JOIN students ON admission.id = students.admission_id LEFT JOIN departments ON admission.department_id = departments.id WHERE verified_status = 'allocate' AND admission.id = '$sid'";

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