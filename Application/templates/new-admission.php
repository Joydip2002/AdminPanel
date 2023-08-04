<!-- <?php
session_start();
include("../config/connection.php");
?> -->
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="" href="tabimage.png">
  <title>Tabular Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.css" />
  <style>
    .sbtn {
      /* background-color: red; */
      display: flex;
      justify-content: center;
      /* justify-content: flex-end; */
      /* margin-right: 1.7rem; */
    }

    #isbtn {
      position: relative;
      right: 0;
      padding: 2px;
      background-color: green;
      border-radius: 5px;
      color: white;
    }

    #view {
      float: right;
      margin-top: -2rem;
    }

    .v1,
    .v2 {
      visibility: hidden;
    }

    ion-icon,
    .tableicon {
      font-size: 1.5rem;
      color: white;
    }

    @media only screen and (max-width: 495px) {
      .mb-3 {
        /* background-color: #e11414; */
        width: 100%;
        /* align-items: center; */
      }
    }

    @media (max-width:992px) and (min-width:768px) {
      .mb-3 {
        /* background-color: #e11414; */
        width: 100%;
        /* align-items: center; */
      }
    }

    @media only screen and (max-width: 365px) {
      .icon {
        /* background-color: #e11414; */
        font-size: 20px
          /* align-items: center; */
      }
    }

    .icon {
      font-size: 20px;
    }

    .icon:hover {
      cursor: pointer !important;
      transform: scale(1.1);
      color: red;
    }

    .modal {
      display: none;
      /* position: fixed; */
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.5);
    }

    .modal-content {
      overflow: hidden;
      background-color: #fefefe;
      margin: 15% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
      max-width: 600px;
    }

    #imageModal {
      overflow: hidden;
    }

    .modal-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }

    .modal-body {
      text-align: center;
    }

    .selected-image {
      max-width: 60%;
      height: auto;
      margin-bottom: 20px;
    }

    #saveButton,
    #closeButton {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    #saveButton {
      margin-right: 10px;
    }

    .vmobile:valid {
      border: 1px solid green;
    }

    /* .vmobile:invalid {
      border: 1px solid red;
    } */
    .preloader {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(255, 255, 255, 0.7);
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 9999;

    }
  </style>
</head>

<body class="container ">
  <!-- Navbar -->
  <div class="border border-dark ">
    <header class="mb-3 border border-dark">
      <div class=" p-2 bg-secondary text-center">
        <h4 class="text-white">Admission Form</h4>
        <div class="iconimg">
          <span id="view" class="v2"><i class="fa-sharp tableicon fa-solid fa-table"></i></span>
          <!-- <span><ion-icon name="eye" id="view" class="v1"></ion-icon></span> -->
        </div>
      </div>
    </header>
    <nav class="mb-3">
      <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <button class="nav-link active" id="nav-form-tab" data-bs-toggle="tab" data-bs-target="#nav-form" type="button"
          role="tab" aria-controls="nav-home" aria-selected="true">Form</button>
        <!-- <button class="nav-link" id="nav-list-tab" data-bs-toggle="tab" data-bs-target="#nav-list" type="button"
          role="tab" aria-controls="nav-profile" aria-selected="false">List</button>
        <button class="nav-link" id="nav-chart-tab" data-bs-toggle="tab" data-bs-target="#nav-chart" type="button"
          role="tab" aria-controls="nav-profile" aria-selected="false">Graph</button> -->
      </div>
    </nav>
    <!-- Form -->
    <div class="formdiv tab-content" id="nav-tabContent">
      <div class="formdiv1 content tab-pane fade show active" id="nav-form" role="tabpanel" aria-labelledby="home-tab"
        tabindex="0">
        <form name="subform" id="subform" enctype="multipart/form-data">
          <div id="pform1" class="ghyt">
            <div
              class="container gap-1 d-flex justify-content-center justify-content-between flex-wrap mb-4 border border-dark rounded-1 position-relative"
              id="reform" style="width: 95%;">

              <div class="col-md-3 mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" class="form-control username" name="name1" id="namefield"
                  aria-describedby="emailHelp" placeholder="Enter Your Name" required>
              </div>

              <div class="col-md-3 mb-3">
                <label for="" class="form-label">Title</label>
                <input type="text" class="form-control usertitle" name="title1" id="namefield"
                  aria-describedby="emailHelp" placeholder="Enter Your Title" required>
              </div>

              <div class="col-md-3 mb-3">
                <label for="" class="form-label">Email</label>
                <input type="email" name="email1" class="form-control useremail" id="emailfield"
                  placeholder="Enter Your Email" required>
              </div>

              <div class="col-md-3 mb-3">
                <label for="" class="form-label">Mobile</label>
                <input type="tel" name="mobile1" class="form-control userphone vmobile" pattern="[0-9]{10}" id=""
                  placeholder="ex : 1234567890" required>
                <!-- <div id="mobileHelp" class="form-text text-center">please enter 10 digit Number.</div> -->
              </div>

              <div class="col-md-3 mb-3">
                <label for="" class="form-label">Class XII Marks</label>
                <input type="number" class="form-control marks" name="XII1" id="marks" aria-describedby="emailHelp"
                  placeholder="Total XII Marks" min="0" max="500" required>
              </div>

              <div class="col-md-3 mb-3">
                <label for="" class="form-label">Specialized Subject</label>
                <input type="text" class="form-control subject" name="sb1" id="namefield" aria-describedby="emailHelp"
                  placeholder="Specialized Subject" required>
              </div>

              <div class="col-md-3 mb-3">
                <label for="" class="form-label">Specialized Subject Marks in XII</label>
                <input type="number" class="form-control subjectmarks" name="ssm1" id="namefield"
                  aria-describedby="emailHelp" placeholder="Total Marks" min="0" max="100" required>
              </div>

              <div class="col-md-3 mb-3">
                <label for="" class="form-label">Season</label>
                <input type="text" class="form-control Season" name="season1" id="namefield"
                  aria-describedby="emailHelp" placeholder="Season" required>
              </div>

              <div class="col-md-3 mb-3">
                <label for="" class="form-label">Choose Department</label>
                <select class="form-select department" name="department1" id="department"
                  aria-label="Default select example">
                  <option selected>Select Department</option>
                  <?php
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

              <div class="col-md-3 mb-3">
                <label for="" class="form-label">Address</label>
                <input type="text" class="form-control Address" name="address1" id="namefield"
                  aria-describedby="emailHelp" placeholder="Enter Your Address" required>
              </div>
              <!-- <input type="hidden" name="id" value="1"> -->

              <!-- Radio Button -->
              <!-- <div class="mb-3" style="padding-right: 4rem;">
                <label for="">Gender</label>
                <div class="d-flex mt-2 gap-2">
                  <div class="form-check ">
                    <input class="form-check-input gender-male" type="radio" name="gender1" value="m"
                      id="flexRadioDefault1" required>
                    <label class="form-check-label" for="flexRadioDefault1">
                      Male
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input gender-female" type="radio" name="gender1" value="f"
                      id="flexRadioDefault2" checked required>
                    <label class="form-check-label" for="flexRadioDefault2">
                      Female
                    </label>
                  </div>
                </div>
              </div> -->
              <!-- Image upload -->
              <!-- <div class="mb-3 ">
                <label for="" class="form-label">Upload Image</label>
                <div class="d-flex">
                  <input type="hidden" name="file1" value="" class="profile-photo-input">
                  <input type="file" name="uimage1" class="uimage editimage profile-photo-input form-control"
                    id="uimage1" data-bs-toggle="modal" data-bs-target="#myModal">
                </div>
              </div> -->
              <!-- Radio Button End -->

              <!-- Plus Button -->
              <div class="position-absolute" style="right: -15px;bottom: 0;" id="parent1">
                <label for="" id="plusbtn1" class="pbtn"><i
                    class="fa-sharp fa-solid fa-plus border border-dark rounded-circle p-2 bg-success"
                    style="color: #eaeaea;"></i></label>
              </div>

              <div class="position-absolute" style="right: -15px; visibility: hidden;" id="minusbtn">
                <label for=""><i class="fa-sharp fa-solid fa-minus border border-dark rounded-circle p-2 bg-danger"
                    style="color: #eaeaea;"></i></label>
              </div>
            </div>
          </div>
          <!-- Form End -->
          <div class="position-relative sbtn" style="right: 0;">
            <input type="submit" name="submit" id="isbtn" value="Submit" class="mt-2 mb-2 p-2 bg-primary">
          </div>
        </form>
      </div>
      <!-- <div class="listdata content tab-pane fade show active" id="nav-list" role="tabpanel" aria-labelledby="home-tab"
        tabindex="0">
      </div>
      <div class="chart content tab-pane fade show active" id="nav-chart" role="tabpanel" aria-labelledby="home-tab"
        tabindex="0">
      </div> -->
    </div>
  </div>
  <!-- swalalert & jquery & chatjs cdn link -->
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js" defer></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.all.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/cropperjs/dist/cropper.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/cropperjs/dist/cropper.min.js"></script>
  <script src="https://kit.fontawesome.com/4cae11b526.js" crossorigin="anonymous"></script>

  <script>
    $(document).ready(function () {

      var hash = window.location.hash;
      // console.log(hash);
      // if (hash != "") {
      //   $(hash).trigger("click");
      // }
      //   if(hash == "#nav-list-tab"){
      //     $(hash).trigger("click");
      //     showPreloader();
      //     $.ajax({
      //       url: 'datatable.php',
      //       type: 'post',
      //       success: function (response) {
      //         $('.listdata').html(response);
      //         $('#myTable2').DataTable();
      //         $('.listdata').show();
      //         hidePreloader();
      //         $(".chart").hide();
      //         $('.formdiv1').hide();

      //       }
      //     })
      //   }
      //   else if(hash == "#nav-chart-tab"){
      //     $(hash).trigger("click");
      //     $.ajax({
      //       url: './chartJs/chartJs.php',
      //       type: 'post',
      //       success: function (response) {
      //         $(".chart").html(response);
      //         $(".chart").show();
      //         $('.listdata').hide();
      //         $('.formdiv1').hide();

      //       }
      //     })
      //   }

      $("#preloader").hide();
      function showPreloader() {
        $("#preloader").show();
      }
      // Function to hide preloader
      //   function hidePreloader() {
      //     $("#preloader").hide();
      //   }
      var isVisible = true;
      var ids = 2;
      $(document).on('click', '.pbtn', async function (e) {
        e.preventDefault();
        var elmId = $(this).parent().parent().parent().attr("id");

        var html = `<div id="` + "pform" + ids + `" class="appendChild ghyt" method="post">
      <div class=" gap-1 container mb-4 justify-content-center d-flex justify-content-between flex-wrap border border-dark rounded-1 position-relative"
      id="reform" style="width: 95%;">

              <div class="col-md-3 mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" class="form-control username" name="`+ "name" + ids + `" id="" aria-describedby="emailHelp"
                  placeholder="Enter Your Name" required>
              </div>

              <div class="col-md-3 mb-3">
                <label for="" class="form-label">Title</label>
                <input type="text" class="form-control usertitle" name="`+ "title" + ids + `" id="" aria-describedby="emailHelp"
                  placeholder="Enter Your Name" required>
              </div>

              <div class="col-md-3 mb-3">
                <label for="" class="form-label">Email</label>
                <input type="email" name="`+ "email" + ids + `" class="form-control useremail" id="" placeholder="Enter Your Email" required>
              </div>

              <div class="col-md-3 mb-3">
                <label for="" class="form-label">Mobile</label>
                <input type="tel" name="`+ "mobile" + ids + `" class="form-control vmobile userphone" pattern="[0-9]{10}" id="" placeholder="ex : 1234567890" required>
              </div>

              <div class="col-md-3 mb-3">
                <label for="" class="form-label">Class XII Marks</label>
                <input type="number" name="`+ "XII" + ids + `" class="form-control marks" id="" placeholder="Total XII Marks" required>
              </div>

              <div class="col-md-3 mb-3">
                <label for="" class="form-label">Specialized Subject</label>
                <input type="text" name="`+ "sb" + ids + `" class="form-control subject" id="" placeholder="Specialized Subject" required>
              </div>

              <div class="col-md-3 mb-3">
                <label for="" class="form-label">Specialized Subject Marks in XII</label>
                <input type="number" name="`+ "ssm" + ids + `" class="form-control subjectmarks" id="" placeholder="Total Marks" required>
              </div>

              <div class="col-md-3 mb-3">
                <label for="" class="form-label">Season</label>
                <input type="text" name="`+ "season" + ids + `" class="form-control Season" id="" placeholder="Season" required>
              </div>

              <div class="col-md-3 mb-3">
                <label for="" class="form-label">Choose Department</label>
                    <select class="form-select department" name="`+ "department" + ids + `" id="department" aria-label="Default select example">
                        <option selected>Select Department</option>
                        <?php
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

              <div class="col-md-3 mb-3">
                <label for="" class="form-label">Address</label>
                <input type="text" name="`+ "address" + ids + `" class="form-control Address" id="" placeholder="Enter Your Address" required>
              </div>

            <!-- Plus Button -->
              <div class="position-absolute" style="right: -15px;bottom: 0;" id="`+ "ppform" + ids + `">
                <label for="" id="`+ "pp2form" + ids + `" class="pbtn"><i class="fa-sharp fa-solid fa-plus border border-dark rounded-circle p-2 bg-success"
                    style="color: #eaeaea;"></i></label>
              </div>

              <div class="position-absolute" style="right: -15px;" id="minusbtn">
                <label for=""><i class="fa-sharp fa-solid fa-minus border border-dark rounded-circle p-2 bg-danger"
                    style="color: #eaeaea;"></i></label>
              </div>

      </div>
      <!-- Form End -->
  </div>`;
        $(html).insertAfter('#' + elmId);
        ids++;
        await updateDivIds();
      });

      //   // '#nav-form-tab'
      //   $(document).on('click', '#nav-form-tab', function (e) {
      //     $('.formdiv1').show();
      //     $('.listdata').hide();
      //     $(".chart").hide();
      //     insertUrlHash("#nav-form-tab");
      //   })
      // #nav-list-tab
      //     $(document).on('click', '#nav-list-tab', function (e) {
      //     e.preventDefault();
      //     showPreloader();
      //     $.ajax({
      //       url: 'datatable.php',
      //       type: 'post',
      //       success: function (response) {
      //         $('.listdata').html(response);
      //         $('#myTable2').DataTable();
      //         $('.listdata').show();
      //         hidePreloader();
      //         $(".chart").hide();
      //         $('.formdiv1').hide();
      //         insertUrlHash("#nav-list-tab");
      //       }
      //     })
      //   })
      // #nav-chart-tab
      //   $(document).on("click", "#nav-chart-tab", function (e) {
      //     e.preventDefault();
      //     $.ajax({
      //       url: './chartJs/chartJs.php',
      //       type: 'post',
      //       success: function (response) {
      //         $(".chart").html(response);
      //         $(".chart").show();
      //         $('.listdata').hide();
      //         $('.formdiv1').hide();
      //         insertUrlHash("#nav-chart-tab");
      //       }
      //     })
      //   })
      // End nav Toggal

      // Remove Field
      $(document).on('click', '#minusbtn', function (e) {
        e.preventDefault();
        let row_item = $(this).parent().parent();
        $(row_item).remove();
        updateDivIds();
      });
    });
    // Update the name of input fields sequentially  
    async function updateDivIds() {
      var count = $('.ghyt').length;
      console.log(count);
      for (var i = 1; i <= count; i++) {
        var trgt = $(".ghyt:nth-child(" + i + ")");
        trgt.find('.username').attr('name', 'name' + i);
        trgt.find('.usertitle').attr('name', 'title' + i);
        trgt.find('.useremail').attr('name', 'email' + i);
        trgt.find('.userphone').attr('name', 'mobile' + i);

        trgt.find('.marks').attr('name', 'XII' + i);
        trgt.find('.subject').attr('name', 'sb' + i);
        trgt.find('.subjectmarks').attr('name', 'ssm' + i);
        trgt.find('.Season').attr('name', 'season' + i);
        trgt.find('.department').attr('name', 'department' + i);
        trgt.find('.Address').attr('name', 'address' + i);

        // trgt.find('.profile-photo-input').attr('name', 'file' + i);
        // trgt.find('.gender-male,.gender-female').attr('name', 'gender' + i);
        // trgt.find('.gender-male').attr('id', 'gender-male' + i);
        // // trgt.find('.gender-female').attr('id', 'gender-female' + i).prop('checked', true);
        // // trgt.find('.gender-male').attr('id', 'gender-male' + i).prop('checked', true);
        // trgt.find('.gender-female').attr('id', 'gender-female' + i);
        // trgt.find('.gender-male').siblings('label').attr('for', 'gender-male' + i);
        // trgt.find('.gender-female').siblings('label').attr('for', 'gender-female' + i);
      }
    }
    // Hashing Navigation function
    // function insertUrlHash(hash) {
    //   window.location.hash = hash;
    // }

    // form submit
    $('#subform').submit(function (e) {
      e.preventDefault();
      $.ajax({
        url: '../ajax/data.php/?id=' + $("#subform").children().length,
        method: 'post',
        data: $(this).serialize(),
        success: function (response) {
          var response = JSON.parse(response);
          if (response.status === 200) {
            Swal.fire({
              showConfirmButton: false,
              text: response.message,
              icon: 'success',
              timer: 3000
            });
          }
          else {
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Something went wrong!',
              footer: '<a href="">Why do I have this issue?</a>'
            })
          }
          // $('form').trigger('reset');
          $("#subform")[0].reset();
          $(".appendChild").remove()

          // console.log(response);
        }
      });
    });
    // Image Cropper Moduleportion
    // var croppers = {}; // Object to store the Cropper instances
    // // When a file input changes
    // $(document).on('change', '.uimage', function (e) {
    //   var selectedFile = e.target.files[0];
    //   var inputId = e.target.id;
    //   console.log(inputId);
    //   // Remove the previously displayed image
    //   $(this).siblings('.selected-image').remove();
    //   // Create an image element for the selected file
    //   var image = document.createElement('img');
    //   image.src = URL.createObjectURL(selectedFile);
    //   image.className = 'selected-image';
    //   image.alt = 'Selected Image';
    //   // Append the image after the file input
    //   $('#imageContainer').append(image);
    //   // Open the modal when any file input is clicked
    //   $('#imageModal').show();
    //   // Initialize Cropper.js on the image
    //   var cropper = new Cropper(image, {
    //     viewMode: 1,
    //     aspectRatio: 1,
    //     movable: true,
    //     zoomable: true,
    //   });
    //   $('.crotate').on('click', function () {
    //     cropper.rotate(90);
    //   });
    //   $('.antirotate').on('click', function () {
    //     cropper.rotate(-90);
    //   });
    //   $('.zoom-in-button').on('click', function () {
    //     cropper.zoom(0.1); // Increase zoom level by 0.1 (adjust the value as needed)
    //   });
    //   // Handle zoom out button click
    //   $('.zoom-out-button').on('click', function () {
    //     cropper.zoom(-0.1); // Decrease zoom level by 0.1 (adjust the value as needed)
    //   });
    //   // Store the Cropper instance in the croppers object
    //   croppers[inputId] = cropper;
    // });

    // Save the cropped and rotated image
    // $('#saveButton').on('click', function () {
    //   for (var inputId in croppers) {
    //     var cropper = croppers[inputId];
    //     var croppedImage = cropper.getCroppedCanvas().toDataURL();
    //     $("#" + inputId).siblings(".profile-photo-input").val(croppedImage);
    //     cropper.destroy();
    //   }
    //   $('#imageModal').hide();
    //   $('.selected-image').remove();
    //   croppers = {};
    // });
    // // Close the modal when the close button is clicked
    // $('#closeButton').on('click', function () {
    //   $('#imageModal').hide();
    //   for (var inputId in croppers) {
    //     var cropper = croppers[inputId];
    //     cropper.destroy();
    //   }
    //   $('.selected-image').remove();
    //   croppers = {};
    // });

    document.getElementById('subform').addEventListener('submit', function (event) {
      var marksInput = parseInt(document.getElementById('marks').value);

      if (isNaN(marksInput) || marksInput > 500) {
        event.preventDefault();
        alert('Marks must be a number between 0 and 500.');
      }
    });

  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/4cae11b526.js" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</body>

</html>