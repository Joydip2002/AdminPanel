<?php
include("../config/connection.php");
if (isset($_POST['displaydata'])) {
    $table = '<div class="container table-responsive"><table class="table table-striped datatable" id="myTable">
    <thead class="bg-secondary">
            <tr id="menutable">
                <td scope="col">Sl_No</td>
                <td scope="col">Name</td>
                <td scope="col">Title</td>
                <td scope="col">Email</td>
                <td scope="col">Mobile</td>
                <td scope="col">Department</td>
                <td scope="col">Roll</td>
                <td scope="col">Season</td>
                <td scope="col">Action</td>
            </tr>
    </thead>';

    function getDepartment($id, $conn){ 
        $sqlDeptname = "SELECT * FROM `departments` WHERE `id`='$id'";
        $resDeptname = mysqli_query($conn, $sqlDeptname);
        $numDept = mysqli_num_rows($resDeptname);
        if ($numDept > 0)
        {
            $fetchDepartment = mysqli_fetch_array($resDeptname);
            $dept_name = $fetchDepartment['name'];
                return $dept_name;
        }
        return "";
    }

    $selectQuery = "SELECT admission.*,students.roll FROM admission LEFT JOIN students ON admission.id = students.admission_id WHERE verified_status = 'allocate' ORDER BY created_date DESC";
    $res = mysqli_query($conn, $selectQuery);
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
        $btn_check = $showdata['btn_check'];
        $dept_id = $showdata['department_id'];
        $dept_name = getDepartment($dept_id,$conn);
        $roll = $showdata['roll'];
        
       

        $table .= '<tr>
            <td>' . $number . '</td>
            <td>' . $name . '</td>
            <td>' . $title . '</td>
            <td>' . $email . '</td>
            <td>' . $mobile . '</td>
            <td>' .$dept_name.'</td>
            <td>' .$roll.'</td>
            <td>' . $season . '</td>
            <td>';

            $table .= '<button class="btn btn-success m-2" onclick="editStudentAfterAllocate(' . $id . ')">Edit</button>';
        $table .= '</td></tr>';
        $number++;
    }
    $table .= '</table></div>';
    echo $table;
}

?>

