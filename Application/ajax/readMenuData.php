<?php
include("../config/connection.php");
if (isset($_POST['displaydata'])) {
    $table = ' <table class="table table-striped" id = "myTable">
    <thead>
            <tr id="menutable">
            <td scope="col">Name</td>
            <td scope="col">Title</td>
            <td scope="col">Parentid</td>
            <td scope="col">OrderList</td>
            <td scope="col">Status</td>
            <td scope="col">Icon</td>
            <td scope="col">URL</td>
            <td scope="col">Action</td>
            </tr>
    </thead>';

    $updateQuery = "SELECT * FROM menulist";
    $res = mysqli_query($conn, $updateQuery);
    while ($showdata = mysqli_fetch_assoc($res)) {
        $name = $showdata['name'];
        $title = $showdata['title'];
        $parentid = $showdata['parentid'];
        $orderlist = $showdata['orderlist'];
        $status = $showdata['status'];
        $navicon = $showdata['navicon'];
        $url = $showdata['url'];
        $id = $showdata['id'];

        $table .= '<tr>
                        <td scope="row">' . $name . '</td>
                        <td>' . $title . '</td>
                        <td>' . $parentid . '</td>
                        <td>' . $orderlist . '</td>
                        <td>' . $status . '</td>
                        <td>' . $navicon . '</td>
                        <td>' . $url . '</td>
                        <td class=""><i class="fa-solid fa-pen-to-square text-success" id="editbtn" onclick="updateMenu(' . $id . ')" style="font-size:30px; margin:0 10px;"></i> <i class="fa-solid fa-trash text-danger" id="deletebtn" onclick="deleteMenu(' . $id . ')" style="font-size:30px;"></i></td>

                 </tr>';

    }
    $table .= '</table>';
    echo $table;
}
?>