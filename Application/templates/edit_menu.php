<?php include("../config/connection.php"); ?>

<!-- Update Modal -->
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <h5 class="message text-danger text-center"></h5>
                    <form class="container form-group">
                        <div class="mb-3">
                            <label for="">Update Name</label>
                            <input type="text" name="uname" id="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Update Title</label>
                            <input type="text" name="umobile" id="title" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Update Parentid</label>
                            <select class="form-select" id="parentid" aria-label="Default select example">
                                <?php 
                                      $sql = "SELECT DISTINCT parentid FROM menulist";
                                      $res = mysqli_query($conn,$sql);
                                      while($showdata = mysqli_fetch_array($res)){
                                        ?>
                                        <option value="<?php echo $showdata['parentid']; ?>"><?php echo $showdata['parentid']; ?></option>
                                        <?php
                                      }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">Update Orderlist</label>
                            <select class="form-select" id="orderlist" aria-label="Default select example">
                                <?php 
                                      $sql = "SELECT DISTINCT orderlist FROM menulist";
                                      $res = mysqli_query($conn,$sql);
                                      while($showdata = mysqli_fetch_array($res)){
                                        ?>
                                        <option value="<?php echo $showdata['orderlist']; ?>"><?php echo $showdata['orderlist']; ?></option>
                                        <?php
                                      }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">Update Status</label>
                            <select class="form-select" id="status" aria-label="Default select example">
                                <?php 
                                      $sql = "SELECT DISTINCT status FROM menulist";
                                      $res = mysqli_query($conn,$sql);
                                      while($showdata = mysqli_fetch_array($res)){
                                        ?>
                                        <option value="<?php echo $showdata['status']; ?>"><?php echo $showdata['status']; ?></option>
                                        <?php
                                      }
                                ?>
                                 
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">Update Icon</label>
                            <input type="email" name="uemail" id="icon" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Update URL</label>
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



<div class="">
  <div class="text-center mt-2">
    <h3>Edit Menu</h3>
  </div>
  <div class="text-center"><label for="" class="message text-danger"></label></div>
  <div class="d-flex ppp justify-content-center">
    <div class="col-12 border border-primary p-2 mb-3">
      <div class="mb-3">
        <table class="table">
          <?php
           $sql = "SELECT * FROM menulist";
           $res = mysqli_query($conn,$sql);
          ?>
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
          </thead>
          <?php
          while($showdata = mysqli_fetch_assoc($res)){
            ?>
                <tbody>
                    <tr>
                      <td scope="col"><?php echo $showdata['name'];?></td>
                      <td scope="col"><?php echo $showdata['title'];?></td>
                      <td scope="col"><?php echo $showdata['parentid'];?></td>
                      <td scope="col"><?php echo $showdata['orderlist'];?></td>
                      <td scope="col"><?php echo $showdata['status'];?></td>
                      <td scope="col"><?php echo $showdata['navicon'];?></td>
                      <td scope="col"><?php echo $showdata['url'];?></td>
                      <td scope="col"><i class="fa-solid fa-pen-to-square px-2" id="editbtn" onclick="updateMenu(<?php echo $showdata['id'] ?>)"></i><i class="fa-solid fa-trash"></i></td>
                    </tr>   
                </tbody>
            <?php
           }
          ?>
        </table>
      </div>
    </div>
  </div>

  <script>
   
      function updateMenu(id){
        $.post('../ajax/showdatamodal.php', { updateid: id }, function (data, status) {
                var response = JSON.parse(data);
                $("#name").val(response.name);
                $("#title").val(response.title);
                $("#parentid").val(response.parentid);
                $("#orderlist").val(response.orderlist);
                $("#status").val(response.status);
                $("#icon").val(response.navicon);
                $("#url").val(response.url);
                $("#mid").val(response.id);
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

            $.post("../ajax/updateShowdatamodal.php", {uid:uid, name: name, title: title, parentid: parentid, orderlist: orderlist, status: status, icon:icon, url:url }, function (data, status) {
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