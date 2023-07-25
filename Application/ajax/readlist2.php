<?php
include("../config/connection.php");
include("../class/class.MenuOrganizer1.php");
$menuOrganizer = new MenuOrganizer1($conn);
$menuData = $menuOrganizer->getMenuData();
 echo "<pre>";
    print_r($menuData);
 echo "</pre>";
// echo $title = $menuData[0]['title']; // "dashboard"
// $name = $array[0]['name']; 
?>
