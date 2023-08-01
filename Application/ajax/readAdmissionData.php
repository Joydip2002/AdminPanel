<?php
include("../config/connection.php");
if (isset($_POST['displaydata'])) {
    $table = '<div class="container table-responsive"><table class="table table-striped datatable" id = "myTable">
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
                <td scope="col">admission_date</td>  
                <td scope="col">Action</td>  
                <td scope="col">Admission_status</td>  
            </tr>
    </thead>';

    $updateQuery = "SELECT * FROM admission";
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
        $admission_date = $showdata['admission_date'];
    
        $statusCheckbox = '<label class="switch">
                                    <input type="checkbox" data-id="' . $id . '" onclick="toggleStatus(' . $id . ')" ' . ($adstatus == 1 ? 'checked' : '') . '>
                                    <span class="slider round"></span>
                           </label>';
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
                        <td>' . $admission_date . '</td>
                        <td>' .$statusCheckbox. '</td>         
                        <td>';

                        if ($status == 0) {
                            $table .= '<button class="btn btn-info m-2" onclick="approvedStu(' . $id . ')">Approve</button>';
                        } else {
                            $table .= '<button class="btn btn-danger" onclick="unapprovedStu(' . $id . ')">Un-aproved</button>';
                        }
                        $table .= '</td></tr>';
                        $number++;
                                  
        $number++;
    }
    $table .= '</table></div>';
    echo $table;
}
?>
<!-- Add this in your HTML file or in a separate script file -->
<script>
    function toggleStatus(id) {
        const checkbox = document.querySelector(`input[data-id="${id}"]`);
        const status = checkbox.checked ? 1 : 0;
        // alert(`Updated status for ID ${id}: ${status}`);
        // console.log(id,status);
        $.ajax({
            url: "../ajax/toggleNavIconAdmission.php",
            type: "POST",
            data : {id : id , status : status},
            success : function(data,status){
                console.log("Data:", data);
                // if (response.status == 200) {
                //     Swal.fire({
                //         position: 'middle-center',
                //         icon: 'success',
                //         title: response.message,
                //         showConfirmButton: false,
                //         timerProgressBar: true,
                //         timer: 3000
                //     })
                // }
                // else {
                //     Swal.fire({
                //         position: 'middle-center',
                //         icon: 'error',
                //         title: response.message,
                //         showConfirmButton: false,
                //         timerProgressBar: true,
                //         timer: 3000
                //     })
                // }
            }
        })
    }

</script>
