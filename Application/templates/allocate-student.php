<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Student Profile</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="container form-group">
          <div class="mb-3">
            <label for="">Name</label>
            <input type="text" name="name" id="name" class="form-control">
          </div>
          <div class="mb-3">
            <label for="">Title</label>
            <input type="text" name="title" id="title" class="form-control">
          </div>

          <div class="mb-3">
            <label for="">Department</label>
            <input type="text" name="department" id="department" class="form-control" readonly>
          </div>

          <div class="mb-3">
            <label for="">Email</label>
            <input type="email" name="email" id="email" class="form-control">
          </div>
          <div class="mb-3">
            <label for="">Mobile</label>
            <input type="tel" name="mobile" id="mobile" class="form-control">
          </div>
          <div class="mb-3">
            <label for="">Season</label>
            <input type="text" name="season" id="season" class="form-control" readonly>
          </div>
          <input type="hidden" name="" value="" id="mid">

          <div class="mb-3">
            <label for="">Give Roll No</label>
            <input type="text" name="roll" id="roll" class="form-control">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="updateStudentdetails()">Update</button>
      </div>
    </div>
  </div>
</div>


<div class="container"><h3>Approved Application</h3></div>
<div class="showtable col-12"></div>

<script>
    $(document).ready(function(){
        approvedfetchData();
    })
    function approvedfetchData() {
    var displaydata = true;
    $.ajax({
      url: '../ajax/allocateStudentData.php',
      type: 'POST',
      data: { displaydata: displaydata },
      success: function (data, status) {
        $(".showtable").html(data);
        $("#myTable").DataTable();
      }
    })
  }

  function editStudentAfterAllocate(id){
     $.post("../ajax/allocateStuEdit.php",{id:id},function(data){
        // console.log("success");
        var response = JSON.parse(data);
        console.log(response);
      $("#name").val(response.name);
      $("#title").val(response.title);
      $("#department").val(response.dept_name);
      // $("#status").val(response.status);
      $("#email").val(response.email);
      $("#mobile").val(response.mobile);
      $("#season").val(response.season);
      $("#roll").val(response.roll);
      $("#mid").val(response.id);

     })
      $("#staticBackdrop").modal('show');
  }

  function updateStudentdetails(){
    var name = $("#name").val();
    var title = $("#title").val();
    var email = $("#email").val();
    var mobile = $("#mobile").val();
    var season = $("#season").val();
    var roll = $("#roll").val();
    var department = $("#department").val();
    var sid = $("#mid").val();

    $.post("../ajax/updateStudentdatamodal.php", { sid: sid, name: name, title: title, email: email, mobile: mobile, season: season,roll:roll,department: department}, function (data, status) {
      approvedfetchData();
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
    })
    $("#staticBackdrop").modal('hide');
  }

</script>