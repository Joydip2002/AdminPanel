<form class="bg-info col-md-12 py-3 mt-3 rounded-3">
    <div class="col-md-12 d-flex flex-column justify-content-center ">
        <h4 class="choosedep mx-3">Choose Department</h4>
    </div>  
    <div class="col-md-5 mx-3 d-flex bg-light flex-column justify-content-center align-items-center gap-2 rounded-3 py-3">

        <div class="col-md-8">
            <select class="form-select" id="dept" aria-label="Default select example">
                <option selected>Select Department</option>
                <?php
                include("../config/connection.php");
                $query = "SELECT * FROM departments";
                $res = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($res)) {
                    ?>
                    <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="col-md-8">
            <select class="form-select" id="season" aria-label="Default select example">
                <option selected>Select Season</option>
                <?php
                include("../config/connection.php");
                $query = "SELECT DISTINCT season FROM admission";
                $res = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($res)) {
                    ?>
                    <option value="<?php echo $row['season'] ?>"><?php echo $row['season'] ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <button type="submit" id="subbtn" class="btn btn-primary m-2">Search</button>
    </div>
</form>

<div class="showtable mt-2"></div>

<script>
   $(document).ready(function(){
        $("#subbtn").click(function(event) {
            event.preventDefault();
            var dept_name = $("#dept").val();
            var season = $("#season").val();
            $.ajax({
                url : '../ajax/searchDept.php',
                type : 'POST',
                data : {dept_name:dept_name,season:season},
                success:function(data,status){
                    // console.log("Data:",data,"Status:", status)
                    $(".showtable").html(data);
                    $("#myTable").DataTable();
                }
            })
        })
   })

   function refreshData(){
    var dept_name = $("#dept").val();
    var season = $("#season").val();
    $.ajax({
        url : '../ajax/searchDept.php',
        type : 'POST',
        data : {dept_name:dept_name,season:season},
        success:function(data,status){
            // console.log("Data:",data,"Status:", status)
            $(".showtable").html(data);
            $("#myTable").DataTable();
        }
    })
   }

   
   function selectedStudent(id){
        // alert(id);
        $.ajax({
            url:'../ajax/selectedStudent.php',
            type: 'POST',
            data : {id : id},
            success : function(){
                console.log("selected");
                refreshData();
            }
        })
    }

</script>
