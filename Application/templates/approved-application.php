<div class="container text-center"><h3>Approved Application</h3></div>
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

function getVerify(id) {
// Show the confirmation dialog
    $.ajax({
        url:'../ajax/get-verify.php',
        type : 'POST',
        data : {id : id},
        success :function(data,status){
          approvedfetchData();
            var response = JSON.parse(data);
        }
    })
}
    function getApproved(id) {
        $.ajax({
            url:'../ajax/get-approve.php',
            type : 'POST',
            data : {id : id},
            success :function(data,status){
                var response = JSON.parse(data);
            }
        })
    }

    function getPending(id) {
    // Show the confirmation dialog
        $.ajax({
            url:'../ajax/get-pending.php',
            type : 'POST',
            data : {id : id},
            success :function(data,status){
              approvedfetchData();
                var response = JSON.parse(data);
            }
        })
    }
</script>