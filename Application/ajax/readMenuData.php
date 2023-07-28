<?php
include("../config/connection.php");
if (isset($_POST['displaydata'])) {
    $table = ' <table class="table table-striped" id = "myTable">
    <thead>
            <tr id="menutable">
            <td scope="col">Name</td>
            <td scope="col">Parent Node</td>
            <td scope="col">Place After</td>
            <td scope="col">Icon</td>
            <td scope="col">URL</td>
            <td scope="col">Action</td> 
            <td scope="col">Status</td> 
            </tr>
    </thead>';

    $updateQuery = "SELECT * FROM menulist";
    $res = mysqli_query($conn, $updateQuery);
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
        $table .= '<tr>
                        <td>' . $title . '</td>
                        <td>' . $parentid . '</td>
                        <td>' . $orderlist . '</td>
                        <td>' . $navicon . '</td>
                        <td>' . $url . '</td>
                        <td class=""><i class="fa-solid fa-pen-to-square text-success" id="editbtn" onclick="updateMenu(' . $id . ')" style="font-size:30px; margin:0 10px;"></i> <i class="fa-solid fa-trash text-danger" id="deletebtn" onclick="deleteMenu(' . $id . ')" style="font-size:30px;"></i>
                        </td>
                        <td>'.$statusCheckbox.'</td>                      
                 </tr>';
    }
    $table .= '</table>';
    echo $table;
}
?>
<!-- Add this in your HTML file or in a separate script file -->
<script>
    function toggleStatus(id) {
        const checkbox = document.querySelector(`input[data-id="${id}"]`);
        const status = checkbox.checked ? 1 : 0;
        alert(`Updated status for ID ${id}: ${status}`);
        console.log(id,status);
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
