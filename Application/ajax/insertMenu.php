<?php

include('../config/connection.php');
$t = time();
date_default_timezone_set('Asia/Kolkata');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = array();
    $person = array(
        'title' => $_POST['title'],
        'parentid' => $_POST['parentid'],
        'icon' => $_POST['icon'],
        'url' => $_POST['url']
    );
    $data[] = $person;
    //    echo "<pre>";
//    print_r($data);
//    echo "</pre>";
//    die;

    foreach ($data as $item) {
        $title = strtolower($item['title']);
        $modifiedtitle = str_replace(' ', '_', $title);
        $slug = 'menu_' . $modifiedtitle;
        $parentid = $item['parentid'];
        $url = $item['url'];
        $icon = $item['icon'];
        $date = date("Y-m-d h:i:s");
        // Construct the INSERT statement
        $sql = "INSERT INTO `menulist` (`name`,`title`, `parentid`, `created_date`,`url`,`navicon`) VALUES ('$slug','$title', '$parentid','$date','$url','$icon')";

        $res = mysqli_query($conn, $sql);
        $order = mysqli_insert_id($conn);
        $sqlf = "SELECT * FROM `menulist` WHERE `parentid`=$parentid";
        $queryf = mysqli_query($conn, $sqlf);
        $numf = mysqli_num_rows($queryf);
        $resnum = $numf++;
        $upquery = "UPDATE `menulist` SET `orderlist` = '$resnum'  WHERE `id` ='$order' ";
        $resup = mysqli_query($conn, $upquery);
    }

    // Department
        // $depchild = trim($_POST['title']);
        // $deparent = $_POST['parentid'];
        // $sqldep = "SELECT * FROM `menulist` WHERE `id`='$deparent'";
        // $resdep = mysqli_query($conn, $sqldep);
        // $numdep = mysqli_num_rows($resdep);
        // if ($numdep > 0) {
        //     $fetchdep = mysqli_fetch_array($resdep);
        //     $fetdeptitle = $fetchdep['title'];

        //     $maxid = "SELECT MAX(id) FROM `menulist`";
        //     $res = mysqli_query($conn,$maxid);
        //     $fetchdata = mysqli_fetch_array($res);
        //     $newid = (int)$fetchdata[0];
            
        //     if (trim($fetdeptitle) == 'department' || trim($fetdeptitle) == 'departments' || trim($fetdeptitle) == 'Department' || trim($fetdeptitle) == 'Departments') {
        //         $sqlpart = "INSERT INTO `departments` (`department_name`,`created_date`) VALUES ('$depchild','$newid','$date')";
        //         $respart = mysqli_query($conn, $sqlpart);
        //     }
        // }



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