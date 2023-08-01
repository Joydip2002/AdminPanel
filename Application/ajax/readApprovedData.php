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
                <td scope="col">XII_Marks</td>
                <td scope="col">Specilized_Subject</td>
                <td scope="col">Specilized_Subject_Total_Marks_XII</td>
                <td scope="col">Season</td>
                <td scope="col">Address</td>
                <td scope="col">Status</td>
                <td scope="col">admission_date</td>
                <td scope="col">Action</td>
            </tr>
    </thead>';

    $updateQuery = "SELECT * FROM admission  WHERE status = '1' ";
    $res = mysqli_query($conn, $updateQuery);
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
        $admission_date = $showdata['admission_date'];
        if ($status == '1') {
            $pen = 'Approved';
        } else {
            $pen = '';
        }

        $table .= '<tr>
            <td>' . $number . '</td>
            <td>' . $name . '</td>
            <td>' . $title . '</td>
            <td>' . $email . '</td>
            <td>' . $mobile . '</td>
            <td>' . $xii_marks . '</td>
            <td>' . $sb . '</td>
            <td>' . $ssm . '</td>
            <td>' . $season . '</td>
            <td>' . $address . '</td>
            <td>' . $pen . '</td>
            <td>' . $admission_date . '</td>
            <td>';

        if ($btn_check == "0") {
            $table .= '<button class="btn btn-info m-2" onclick="getVerify(' . $id . ')">Verify</button>';
        } else{
            $table .= '<button class="btn btn-danger" onclick="getPending(' . $id . ')">Unverified</button>';
        } 
        $table .= '</td></tr>';
        $number++;
    }
    $table .= '</table></div>';
    echo $table;
}

?>

