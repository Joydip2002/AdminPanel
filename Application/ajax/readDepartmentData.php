<?php
include("../config/connection.php");
if (isset($_POST['displaydata'])) {
    $table = ' <div class="container table-responsive"><table class="table table-striped datatable" id = "myTable">
    <thead>
            <tr id="menutable">
                <td scope="col">Sl_no</td>
                <td scope="col">Name</td>
                <td scope="col">Status</td>
                <td scope="col">Created Date</td> 
            </tr>
    </thead>';

    $updateQuery = "SELECT * FROM departments";
    $res = mysqli_query($conn, $updateQuery);
    $number = 1;

    while ($showdata = mysqli_fetch_assoc($res)) {
        $name = $showdata['name'];
        $status = $showdata['status'];
        if($status == '1'){
            $statusdept='Active';
        }
        else{
            $statusdept='Inactive';
        }
        $created_date = $showdata['created_date'];

        $table .= '<tr>
                        <td>' . $number . '</td>
                        <td>' . $name . '</td>
                        <td>' . $statusdept . '</td>
                        <td>' . $created_date. '</td>
                   
                 </tr>';
        $number++;
    }
    $table .= '</table></div>';
    echo $table;
}
?>