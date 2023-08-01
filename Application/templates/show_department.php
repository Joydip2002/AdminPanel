<div class="showtable col-12"></div>

<script>
    function fetchData() {
    var displaydata = true;
    $.ajax({
      url: '../ajax/readDepartmentData.php',
      type: 'POST',
      data: { displaydata: displaydata },
      success: function (data, status) {
        $(".showtable").html(data);
        $("#myTable").DataTable();
      },
      error: function(xhr, status, error) {
            console.error(error);
      }
    })
  }
  fetchData();
</script>