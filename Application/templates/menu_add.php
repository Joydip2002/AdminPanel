<?php include("../config/connection.php"); ?>
<div class="">
    <div class="text-center my-3"><h3>Add Menu</h3></div>
    <div class="text-center"><label for="" class="message text-danger"></label></div>
    <div class="d-flex ppp justify-content-center">
        <form class="col-10 border border-primary p-5">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" id="title" class="form-control" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Parent Node</label>
            <select class="form-select" id="parent" aria-label="Default select example">
              <option selected>Open this select menu</option>
              <option value="null">null</option>
              <?php 
                $sql = "SELECT * FROM menulist WHERE parentid = 0";
                $res = mysqli_query($conn,$sql);
                while($showdata = mysqli_fetch_array($res)){
                  ?>
                  <option value="<?php echo $showdata['id']; ?>"><?php echo $showdata['title']; ?></option>
                  <?php
                }
              ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Set Icon</label>
            <input type="text" class="form-control" id="icon">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">URL</label>
            <input type="text" class="form-control" id="url">
          </div>
          <button type="submit" id="subbtn" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<script>

    $(document).on('click', "#subbtn", function () {
                var title = $('#title').val();
                var parent = $('#parent').val();
                var icon = $('#icon').val();
                var url = $('#url').val();

                // console.log(title, parent, icon, url);

                if (title == "" || parent == "" || url == "") {
                    $(".message").html("Please Fill in the Blank")
                }
                else {
                    $.ajax({
                        url: '../ajax/insertMenu.php',
                        type: 'POST',
                        data: {
                            title: title,
                            parentid: parent,
                            icon: icon,
                            url: url
                        },
                        success: function (data, status) {
                            var response = JSON.parse(data);
                              //  alert(response.message);
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
                            $('form').trigger('reset');

                        }
                    })
                }
            })



</script>