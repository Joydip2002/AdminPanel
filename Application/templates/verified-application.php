<!-- <div class="preloader pl" id="preloader">
    Loading...
</div> -->
<div class="container">
    <h3>Verified Student Application</h3>
</div>
<div class="showtable mt-3"></div>

<script>
    $(document).ready(function () {
        fetchMeritData();
    })

    function fetchMeritData() {
        var displaydata = true;
        $.ajax({
            url: '../ajax/readMeritData.php',
            type: 'POST',
            data: { displaydata: displaydata },
            success: function (data, status) {
                $(".showtable").html(data);
                $("#myTable").DataTable();
            }
        })
    }

    function approvedStuMerit(id){
        $.ajax({
            url: '../ajax/approveAfterSelected.php',
            type: 'POST',
            data: { id: id },
            success:function(){
                // alert("Approved Successfully");
                fetchMeritData();
            }
        })
    }

    function rejectStuMerit(id){
        $.ajax({
            url: '../ajax/rejectAfterSelected.php',
            type: 'POST',
            data: { id: id },
            success:function(){
                // alert("Approved Successfully");
                fetchMeritData();
            }
        })
    }

    // $("#preloader").hide();
    // function showPreloader() {
    //     $("#preloader").show();
    // }
    // // Function to hide preloader
    // function hidePreloader() {
    //     $("#preloader").hide();
    // }
</script>
