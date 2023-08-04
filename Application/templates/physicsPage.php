<?php
include("../config/connection.php");
?>

<div>
  <div class="container">
    <h3 class=" text-capitalize text-center text-dark bg-secondary p-3"><span>Department : </span>Physics</h3>
  </div>
 
  <!-- <div class="container mt-5">
    <div class="row g-2">
      <div class="col-md-6">
        <div class="p-3 c2 shadow-sm d-flex justify-content-around align-items-center rounded">
          <div>
            <p class="fs-2">Total Students</p>
            <h4 class="fs-5">156</h4>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="p-3 c2 shadow-sm d-flex justify-content-around align-items-center rounded">
          <div>
            <p class="fs-2">Teacher</p>
            <h4 class="fs-5">50</h4>
          </div>
        </div>
      </div>
    </div>
  </div> -->


  <div class="container mt-5 mb-5">
    <div class="row row-cols-1 row-cols-md-2 g-4">
      <div class="col">
        <div class="card studentcard">
          <div class="card-body">
            <h5 class="card-title  text-center">Students</h5>
            <!-- Start Table -->
            <table class="table ">
            <thead>
                <tr class="text-white">
                  <th scope="col">Name</th>
                  <th scope="col">Roll</th>
                  <th scope="col">Season</th>
                  <th scope="col">Department</th>
                </tr>
              </thead>
              <tbody>
        
              </tbody>
            </table>
            <!-- End Table -->
          </div>
        </div>
      </div>
      <!-- Top Teachers -->
      <div class="col">
        <div class="card studentcard ">
          <div class="card-body">
            <h5 class="card-title text-center">Top Teachers</h5>
            <table class="table ">
              <tbody>
                <tr>
                  <td><img src="../../public/logos/dashboard.png" height="35rem" width="35rem" alt="">Manas Samanta</td>
                </tr>
                <tr>
                  <td><img src="../../public/logos/dashboard.png" height="35rem" width="35rem" alt="">Suvendu Manna</td>
                </tr>
                <tr>
                  <td><img src="../../public/logos/dashboard.png" height="35rem" width="35rem" alt="">Sonthos Patra</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>