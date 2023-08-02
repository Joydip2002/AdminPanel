<?php
session_start();
include("../config/connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $count = $_GET['id'];

    $data = array();
    for ($val = 1; $val < $count; $val++) {
            $name = $_POST['name' . $val];
            $title = $_POST['title' .$val];
            $email = $_POST['email' . $val];
            $phone = $_POST['mobile' . $val];
            $marks12 = $_POST['XII' . $val];
            $sb = $_POST['sb' . $val];
            $ssm = $_POST['ssm' . $val];            
            $season = $_POST['season' . $val];  
            $department = $_POST['department' .$val];    
            $address = $_POST['address' . $val]; 

            $t = time();
            date_default_timezone_set('Asia/Kolkata');
            $date = date("Y-m-d h:i:sa");
            $person = array(
                'name' => $_POST['name' . $val],
                'title' => $_POST['title' .$val],
                'email' => $_POST['email' . $val],
                'phone' => $_POST['mobile' . $val],
                'marks12' => $_POST['XII' . $val],
                'sb' => $_POST['sb' . $val],
                'ssm' => $_POST['ssm' . $val],            
                'season' => $_POST['season' . $val],       
                'address' => $_POST['address' . $val],       
            );
        $insertQuery = "INSERT INTO admission (name,title,email,mobile,xii_marks,specilized_subject,specilized_subject_total_marks_xii,season,department_id,address,status,admission_status,admission_date) VALUES ('$name','$title','$email','$phone','$marks12','$sb','$ssm','$season','$department','$address','0','1','$date')";
        $res = mysqli_query($conn, $insertQuery);
        $data[] = $person;
    }
  
    if ($res) {
        $response = [
            "status" => 200,
            "message" => "saved successfully",
            "data" => []
        ];
    } else {
        $response = [
            "status" => 400,
            "message" => "something went wrong",
            "data" => []
        ];
    }
    echo json_encode($response);
}
?>