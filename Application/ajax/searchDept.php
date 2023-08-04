<?php
include("../config/connection.php");
if (isset($_POST['dept_name'])) {
    $dept_name = $_POST['dept_name'];
    $season = $_POST['season'];

    $table = '<div class="table-responsive"><table class="table table-striped datatable" id="myTable">
    <thead class="bg-secondary">
            <tr id="menutable">
                <td scope="col">Sl_No</td>
                <td scope="col">Name</td>
                <td scope="col">Title</td>
                <td scope="col">Email</td>
                <td scope="col">Mobile</td>
                <td scope="col">HSMarks</td>
                <td scope="col">AppliedSubject</td>
                <td scope="col">MarksInAppliedSubject</td>
                <td scope="col">Department</td>
                <td scope="col">Action</td>
                
            </tr>
    </thead>';

    function getDepartment($dept_id, $conn) {
        $sqlparentname = "SELECT * FROM `departments` WHERE `id`='$dept_id'";
        $resparentname = mysqli_query($conn, $sqlparentname);
        $numparent = mysqli_num_rows($resparentname);
        if ($numparent > 0) {
            $fetchparent = mysqli_fetch_array($resparentname);
            $depname = $fetchparent['name'];      
            return $depname;      
        }
        return " ";
    }

    $query = "SELECT * FROM admission WHERE department_id = '$dept_name' and season = '$season' and status ='s' ORDER BY (specilized_subject_total_marks_xii+xii_marks) DESC";
    $res = mysqli_query($conn,$query);
    $number = 1;
    while ($showdata = mysqli_fetch_assoc($res)) {
        $id = $showdata['id'];
        $name = $showdata['name'];
        $title = $showdata['title'];
        $email = $showdata['email'];
        $mobile = $showdata['mobile'];
        $xii_marks = $showdata['xii_marks'];
        $sb = $showdata['specilized_subject'];
        $ssm = $showdata['specilized_subject_total_marks_xii'];
        $season = $showdata['season'];
        $address = $showdata['address'];
        $status = $showdata['status'];
        $dept_id = $showdata['department_id'];
        $dept_name = getDepartment($dept_id, $conn);
        $addMarks = $xii_marks + $ssm;

        $table .= '<tr>
            <td>' . $number . '</td>
            <td>' . $name . '</td>
            <td>' . $title . '</td>
            <td>' . $email . '</td>
            <td>' . $mobile . '</td>
            <td>' . $xii_marks . '</td>
            <td>' . $sb . '</td>
            <td>' . $ssm . '</td>
            <td>' . $dept_name . '</td>
            <td><button class="btn btn-info" onclick="selectedStudent('.$id.')">Select</button></td>';
          
        $number++;
    }
    $table .= '</table></div>';
    echo $table;
}

?>

    