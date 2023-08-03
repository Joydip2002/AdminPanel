<div class="preloader pl" id="preloader">
    Loading...
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
      url: '../ajax/readApprovedData.php',
      type: 'POST',
      data: { displaydata: displaydata },
      success: function (data, status) {
        $(".showtable").html(data);
        $("#myTable").DataTable();
      }
    })
  }

  function studentAllocate(id) {
    showPreloader();
// Show the confirmation dialog
    $.ajax({
        url:'../ajax/getAllocate.php',
        type : 'POST',
        data : {id : id},
        success :function(data,status){
          hidePreloader();
          approvedfetchData();
            var response = JSON.parse(data);
        }
    })
}

function studentDeAllocate(id) {
    showPreloader();
// Show the confirmation dialog
    $.ajax({
        url:'../ajax/studentDeAllocate.php',
        type : 'POST',
        data : {id : id},
        success :function(data,status){
          hidePreloader();
          approvedfetchData();
            var response = JSON.parse(data);
        }
    })
}

    // function getApproved(id) {
    //     showPreloader();
    //     $.ajax({
    //         url:'../ajax/get-approve.php',
    //         type : 'POST',
    //         data : {id : id},
    //         success :function(data,status){
    //             hidePreloader();
    //             var response = JSON.parse(data);
    //         }
    //     })
    // }

    // function getPending(id) {
    // // Show the confirmation dialog
    //     showPreloader();
    //     $.ajax({
    //         url:'../ajax/get-pending.php',
    //         type : 'POST',
    //         data : {id : id},
    //         success :function(data,status){
    //           approvedfetchData();
    //           hidePreloader();
    //             var response = JSON.parse(data);
    //         }
    //     })
    // }

    $("#preloader").hide();
      function showPreloader() {
        $("#preloader").show();
      }
      // Function to hide preloader
      function hidePreloader() {
        $("#preloader").hide();
      }
</script>