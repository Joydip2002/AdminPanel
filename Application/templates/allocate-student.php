
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

</script>