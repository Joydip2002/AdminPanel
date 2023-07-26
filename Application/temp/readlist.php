<?php
include("../config/connection.php");
if(isset($_POST['selectedTab'])){
    $selectTab = $_POST['selectedTab'];
    $readlist = "SELECT title FROM menulist where status = '1' AND parentid in (SELECT id FROM menulist WHERE title = '$selectTab')";
    $res = mysqli_query($conn,$readlist);
    $data=[];
    while ($row=mysqli_fetch_assoc($res)) {
        ?>
        <p><a href=""><?php echo $row['title']; ?></a></p>
        <?php
    }
    
}
?>