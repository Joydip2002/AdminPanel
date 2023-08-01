<?php
    include("../config/connection.php");
?>
<?php
// $query = "SELECT * FROM departments";
// $res = mysqli_query($conn,$query);

$query2 = "SELECT departments.name,COUNT(*) as no_of_stu FROM `students`,departments WHERE students.department_id = departments.id GROUP BY departments.id";
$res2 = mysqli_query($conn,$query2);
// $showdata2 = mysqli_fetch_array($res2);
// echo "<pre>";
// print_r($showdata2);
// echo "</pre>";
while($showdata = mysqli_fetch_array($res2)){
    ?>
        <div class="container col-8 my-2">
            <div class="p-3 c3 shadow-sm d-flex flex-column justify-content-around align-items-center rounded">
                <div>
                    <p class="fs-2 text-capitalize"><?php echo $showdata['name'] ?></p>
                    <h4 class="fs-5 text-center"><?php echo $showdata['no_of_stu'] ?> </h4>
                </div>
                <!-- <div class="float-right"><button type="" class="btn btn-primary">Show</button></div> -->
            </div>
        </div>
    <?php
}

?>