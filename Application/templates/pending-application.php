<div class="preloader pl" id="preloader">
    Loading...
</div>
<div class="container"><h3>Pending Application</h3></div>
<div class="showtable mt-3"></div>

<script>
    $(document).ready(function(){
        fetchData();
    })

    function fetchData() {
    var displaydata = true;
    $.ajax({
      url: '../ajax/readAdmissionData.php',
      type: 'POST',
      data: { displaydata: displaydata },
      success: function (data, status) {
        $(".showtable").html(data);
        $("#myTable").DataTable();
      }
    })
  }

// toggel button in readadmissiondata page
  function toggleStatus(id) {
        $("#accept").prop("disabled", true);
        const checkbox = document.querySelector(`input[data-id="${id}"]`);
        const status = checkbox.checked ? 1 : 0;
        // alert(`Updated status for ID ${id}: ${status}`);
        // console.log(id,status);
        $.ajax({
            url: "../ajax/toggleNavIconAdmission.php",
            type: "POST",
            data : {id : id , status : status},
            success : function(data,status){
                console.log("Data:", data);
                fetchData();
                // if (response.status == 200) {
                //     Swal.fire({
                //         position: 'middle-center',
                //         icon: 'success',
                //         title: response.message,
                //         showConfirmButton: false,
                //         timerProgressBar: true,
                //         timer: 3000
                //     })
                // }
                // else {
                //     Swal.fire({
                //         position: 'middle-center',
                //         icon: 'error',
                //         title: response.message,
                //         showConfirmButton: false,
                //         timerProgressBar: true,
                //         timer: 3000
                //     })
                // }
            }
        })
    }

  function approvedStu(id){
        showPreloader();
        $.ajax({
            url:'../ajax/approvedStudent.php',
            type : 'POST',
            data : {id : id},
            success :function(data,status){
                fetchData();
                hidePreloader();
                var response = JSON.parse(data);
                // if (response.status == 200) {
                // Swal.fire({
                //     position: 'middle-center',
                //     icon: 'success',
                //     title: response.message,
                //     showConfirmButton: false,
                //     timerProgressBar: true,
                //     timer: 3000
                // })
                // }
                // else {
                // Swal.fire({
                //     position: 'middle-center',
                //     icon: 'error',
                //     title: response.message,
                //     showConfirmButton: false,
                //     timerProgressBar: true,
                //     timer: 3000
                // })
                // }
            }
        })
    }

    function unapprovedStu(id){
        showPreloader();
        $.ajax({
            url:'../ajax/unapprovedStudent.php',
            type : 'POST',
            data : {id : id},
            success :function(data,status){
                fetchData();
                hidePreloader();
                var response = JSON.parse(data);
                // if (response.status == 200) {
                // Swal.fire({
                //     position: 'middle-center',
                //     icon: 'success',
                //     title: response.message,
                //     showConfirmButton: false,
                //     timerProgressBar: true,
                //     timer: 3000
                // })
                // }
                // else {
                // Swal.fire({
                //     position: 'middle-center',
                //     icon: 'error',
                //     title: response.message,
                //     showConfirmButton: false,
                //     timerProgressBar: true,
                //     timer: 3000
                // })
                // }
            }
        })
    }


    $("#preloader").hide();
      function showPreloader() {
        $("#preloader").show();
      }
      // Function to hide preloader
      function hidePreloader() {
        $("#preloader").hide();
      }
</script>