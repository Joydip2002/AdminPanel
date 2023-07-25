<?php
    include("../config/connection.php");
    if(isset($_POST['display'])){
        $query = "SELECT title FROM menulist WHERE parentid = 1 AND status ='1'";
        $resq = mysqli_query($conn,$query);
        $title = [];
        while ($row=mysqli_fetch_assoc($resq)) {
            $title = $row;
        }
        print_r($title);
    }

?>