<div class="">
    <div class="text-center my-3"><h3>Add Department</h3></div>
    <div class="text-center"><label for="" class="message text-danger"></label></div>
    <div class="d-flex ppp justify-content-center">
        <form class="col-10 border border-primary p-5">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Department Name</label>
            <input type="text" id="title2" class="form-control" aria-describedby="emailHelp">
          </div>
          <button type="submit" id="subbtn2" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#subbtn2").click(function(event) {
            event.preventDefault(); // Prevent the default form submission behavior
            var dept_name = $("#title2").val();
            $.ajax({
                url: "../ajax/addDepartment.php",
                method: "POST",
                data: { dept_name: dept_name },
                success: function(data,status) {
                    var updateresponse = JSON.parse(data);
                    
                    if (updateresponse.status == 200) {
                        Swal.fire({
                        position: 'middle-center',
                        icon: 'success',
                        text: updateresponse.message,
                        // confirmButtonText: "OK"
                        timer: 2000
                        })
                    }
                    else {
                        Swal.fire({
                        position: 'middle-center',
                        icon: 'error',
                        text: updateresponse.message,
                        // confirmButtonText: "OK"
                        })
                    }
                }
            });
        });
    });
</script>
