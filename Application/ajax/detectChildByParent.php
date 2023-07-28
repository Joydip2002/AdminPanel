<?php
include("../config/connection.php");

if(isset($_POST['id'])){
    $id = $_POST["id"];
    $olist = $_POST["olist"];
    echo "ID: ".$id;
    $childQuery = "SELECT DISTINCT title,orderlist FROM menulist WHERE parentid = '$id'";
    $resChild = mysqli_query($conn,$childQuery);
              while ($showdata = mysqli_fetch_array($resChild)) {
                if($olist != $showdata['orderlist']){
                    ?>
                    <option value="<?php echo $showdata['orderlist']; ?>"><?php echo $showdata['title']; ?></option>
                    <?php
                }
              }
    }
?>