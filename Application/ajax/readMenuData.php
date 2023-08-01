<?php
include("../config/connection.php");
if (isset($_POST['displaydata'])) {
    $table = ' <div class="container table-responsive"><table class="table table-striped datatable" id = "myTable">
    <thead class="bg-secondary">
            <tr id="menutable">
            <td scope="col">Sl no</td>
            <td scope="col">Name</td>
            <td scope="col">Parent Node</td>
            <td scope="col">Icon</td>
            <td scope="col">URL</td>
            <td scope="col">Action</td> 
            <td scope="col">Status</td> 
            </tr>
    </thead>';

    $updateQuery = "SELECT * FROM menulist";
    $res = mysqli_query($conn, $updateQuery);
    $number = 1;
    function getparent($id, $conn){ 
        $sqlparentname = "SELECT * FROM `menulist` WHERE `id`='$id'";
        $resparentname = mysqli_query($conn, $sqlparentname);
        $numparent = mysqli_num_rows($resparentname);
        if ($numparent > 0)
        {
            $fetchparent = mysqli_fetch_array($resparentname);
            $parentname = $fetchparent['title'];
                return $parentname;
        }
        return "Root";
    }
    while ($showdata = mysqli_fetch_assoc($res)) {
        $title = $showdata['title'];
        $parentid = $showdata['parentid'];
        $orderlist = $showdata['orderlist'];
        $status = $showdata['status'];
        $navicon = $showdata['navicon'];
        $url = $showdata['url'];
        $id = $showdata['id'];
        $statusCheckbox = '<label class="switch">
                                    <input type="checkbox" data-id="' . $id . '" onclick="toggleStatus(' . $id . ')" ' . ($status == 1 ? 'checked' : '') . '>
                                    <span class="slider round"></span>
                           </label>';
        $parentValue = getparent($parentid, $conn);
        $table .= '<tr>
                        <td>' . $number . '</td>
                        <td>' . $title . '</td>
                        <td>'.$parentValue.'</td>
                        <td><i class="' . $navicon . '" id="deletebtn"></i></td>
                        <td>' . $url . '</td>
                        <td class=""><i class="fa-solid fa-pen-to-square text-success" id="editbtn" onclick="updateMenu(' . $id . ')" style="font-size:30px; margin:0 10px;"></i> <i class="fa-solid fa-trash text-danger" id="deletebtn" onclick="deleteMenu(' . $id . ')" style="font-size:30px;"></i>
                        </td>
                        <td>'.$statusCheckbox.'</td>                      
                 </tr>';
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
            url: "../ajax/toggleNavIcon.php",
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
