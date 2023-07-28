<?php include("../config/connection.php"); ?>

<!-- Update Modal -->
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h5 class="message text-danger text-center"></h5>
        <form class="container form-group">
          <div class="mb-3">
            <label for="">Name</label>
            <input type="text" name="umobile" id="title" class="form-control">
          </div>
          <div class="mb-3">
            <label for="">Parent Node</label>
            <select class="form-select" id="parentid" aria-label="Default select example" onchange="detectChild(this.value);">
              <?php
              $sql = "SELECT DISTINCT id, title, parentid FROM menulist WHERE parentid = 0";
              $res = mysqli_query($conn, $sql);
              while ($showdata = mysqli_fetch_array($res)) {
                ?>
                <option value="<?php echo $showdata['id'];?>"><?php echo $showdata['title']; ?></option>
                <?php
              }
              ?>
            </select>
          </div>
          
          <div class="mb-3">
            <label for="">Place After</label>
            <select class="form-select" id="orderlist" aria-label="Default select example">
              
            </select>
          </div>

          <div class="mb-3">
            <label for="">Status</label>
            <select class="form-select" id="status" aria-label="Default select example">
              <?php
              $sql = "SELECT DISTINCT status FROM menulist";
              $res = mysqli_query($conn, $sql);
              while ($showdata = mysqli_fetch_array($res)) {
                ?>
                <option value="<?php echo $showdata['status'];?>"><?php echo $showdata['status']; ?></option>
                <?php
              }
              ?>
            </select>
          </div>
          
          <div class="mb-3">
            <label for="">Icon</label>
            <input type="email" name="uemail" id="icon" class="form-control">
          </div>
          <div class="mb-3">
            <label for="">URL</label>
            <input type="text" name="uemail" id="url" class="form-control">
          </div>
          <input type="hidden" name="" value="" id="mid">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="updateMenudetails()">Update</button>
      </div>
    </div>
  </div>
</div>
<!-- update moda -->



  <div class="text-center mt-2">
    <h3>Edit Menu</h3>
  </div>
  <div class="text-center showtable col-12"></div>


  <script>
    $(document).ready(function () {
      fetchData();
    })

    function fetchData() {
      var displaydata = true;
      $.ajax({
        url: '../ajax/readMenuData.php',
        type: 'POST',
        data: { displaydata: displaydata },
        success: function (data, status) {
          $(".showtable").html(data);
          $("#myTable").DataTable();
        }

      })
    }


    function updateMenu(id) {
      $.post('../ajax/showdatamodal.php', { updateid: id }, function (data, status) {
        var response = JSON.parse(data);
        // $("#name").val(response.name);
        $("#title").val(response.title);
        $("#parentid").val(response.parentid);
        $("#orderlist").val(response.orderlist);
        $("#status").val(response.status);
        $("#icon").val(response.navicon);
        $("#url").val(response.url);
        $("#mid").val(response.id);
        detectChild(response.parentid,response.orderlist);
      })
      $("#staticBackdrop").modal('show');
    }

    function updateMenudetails() {
      var name = $("#name").val();
      var title = $("#title").val();
      var parentid = $("#parentid").val();
      var orderlist = $("#orderlist").val();
      var status = $("#status").val();
      var icon = $("#icon").val();
      var url = $("#url").val();
      var uid = $("#mid").val();

      $.post("../ajax/updateShowdatamodal.php", { uid: uid, name: name, title: title, parentid: parentid, orderlist: orderlist, status: status, icon: icon, url: url }, function (data, status) {
        fetchData();
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

    function deleteMenu(id){
        $.ajax({
          url : '../ajax/deleteMenuRow.php',
          type : 'POST',
          data:{menu_id: id},
          success :function(data){
            console.log("Deleted Successfully");
            fetchData();
              var response = JSON.parse(data);
              //    alert(response.message);
              if (response.status == 200) {
                  Swal.fire({
                      position: 'middle-center',
                      icon: 'success',
                      title: response.message,
                      showConfirmButton: false,
                      timerProgressBar: true,
                      timer: 3000
                  })
              }
              else {
                  Swal.fire({
                      position: 'middle-center',
                      icon: 'error',
                      title: response.message,
                      showConfirmButton: false,
                      timerProgressBar: true,
                      timer: 3000
                  })
              }
          }
        })
    }

    function detectChild(id, olist=-1){
      $.ajax({
        url : '../ajax/detectChildByParent.php',
        type : 'POST',
        data : {id : id, olist:olist},
        success :function(data,status){
          // console.log(data);
          $("#orderlist").html(data);
        }
      })

    }
  </script>