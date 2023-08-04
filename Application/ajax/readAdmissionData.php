<?php
include("../config/connection.php");
if (isset($_POST['displaydata'])) {
    $table = '<div class="container table-responsive p-3"><table class="table table-striped datatable" id = "myTable">
    <thead class="bg-secondary">
            <tr id="menutable">
                <td scope="col">Sl.No.</td>
                <td scope="col">Name</td>
                <td scope="col">Title</td>
                <td scope="col">Email</td>
                <td scope="col">Phone</td>
                <td scope="col">HSMarks</td> 
                <td scope="col">AppliedSubject</td> 
                <td scope="col">MarksInAppliedSubject</td> 
                <td scope="col">Season</td> 
                <td scope="col">Address</td>   
                <td scope="col">Action</td>  
                <td scope="col">status</td>  
            </tr>
    </thead>';

    $updateQuery = "SELECT * FROM admission ORDER BY id DESC;";
    $res = mysqli_query($conn, $updateQuery);
    $number = 1;
    while ($showdata = mysqli_fetch_assoc($res)) {
        $id = $showdata['id'];
        $adstatus = $showdata['admission_status'];
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
    
        $status2 = $showdata['status'];
                        $disableCheckbox = ($status2 == 1 || $status2 == 's' || $status2 == 'ss' || $status2 == 'sa') ? 'disabled' : '';
                
                        if($status2 == 1) {
                            $statusCheckbox = '<label class="switch">
                                                <input type="checkbox" id="accept" data-id="' . $id . '" onclick="getCancelApproved(' . $id . ')" ' . ($adstatus == 1 ? 'checked' : '') . ' ' . $disableCheckbox . '>
                                                <span class="slider round"></span>
                                            </label>';
                           }

                           if($status2 == 's' || $status2 == 'ss' || $status2 == 'sa') {
                            $statusCheckbox = '<label class="switch">
                                                <input type="checkbox" id="accept" data-id="' . $id . '" onclick="getCancelApproved(' . $id . ')" ' . ($adstatus == 1 ? 'checked' : '') . ' ' . $disableCheckbox . '>
                                                <span class="slider round"></span>
                                            </label>';
                           }
                           
                           
                           if($status2 == 0) {    
                                $statusCheckbox = '<label class="switch">
                                                    <input type="checkbox" data-id="' . $id . '" onclick="toggleStatus(' . $id . ')" ' . ($adstatus == 1 ? 'checked' : '') . '>
                                                    <span class="slider round"></span>
                                                </label>';
                               }    

        // $parentValue = getparent($parentid, $conn);
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
                        <td>';

                        if ($status == 0) {
                            if($adstatus == '1'){
                                $table .= '<button class="btn btn-success m-2"id ="approve" onclick="approvedStu(' . $id . ')">Verify</button>';
                            }
                            else{
                                $table .= '<button class="btn btn-success m-2 disabled" onclick="disableForm(' . $id . ')">Verify</button>';
                            }
                           
                        }else {
                            if($btn_check == '1'){
                                $table .= '<button class="btn btn-danger" onclick="alreadyExit(' . $id . ')">Unverify</button>';
                            }
                            else{
                                $table .= '<button class="btn btn-danger" onclick="unapprovedStu(' . $id . ')">Unverify</button>';
                            }
                        }
                        $table .= '</td>
                        <td>' .$statusCheckbox. '</td> 
                    </tr>';
               $number++;
    }
    $table .= '</table></div>';
    echo $table;
}
?>


<!-- separate script file -->
<script> 

    function alreadyExit(id){
      Swal.fire({
            position : 'middle-center',
            icon:'warning',
            title : 'student already verified',
            showConfirmButton :false,
            timerProgressBar: true,
            timer: 3000
      })
    }
    function getCancelApproved(id){
      Swal.fire({
            position : 'middle-center',
            icon:'warning',
            title : 'please unapproved and try again!!',
            showConfirmButton :false,
            timerProgressBar: true,
            timer: 3000
      })
    }
    function disableForm(id){
      Swal.fire({
            position : 'middle-center',
            icon:'warning',
            title : 'Invalid Form Details!!',
            showConfirmButton :false,
            timerProgressBar: true,
            timer: 3000
      })
    }

</script>
