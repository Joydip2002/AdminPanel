<?php
session_start();
if(!isset($_SESSION["name"])){
  header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    <!-- header file include -->
    <?php include("./Components/header/header.php"); ?>
</head>

<body id="fullScreenContent">
    <div class="d-flex" id="wrapper">
        <?php include("./Components/navbar/sidenav.php"); ?>
        <!-- Main Page Content -->
        <div id="page-content-wrapper">
            <?php include("./Components/navbar/navbar.php"); ?>
            <?php include("./Components/main/main.php"); ?>
        </div>
        <!--Main Content Ends -->
    </div>
    <?php include("./Components/footer/footer.php"); ?>
</body>

<!-- search -->
<script>
    $(document).ready(function () {
  $(".searchicon").click(function () {
    var searchValue = $(".searchbox").val().trim().toLowerCase();

    // Remove previous highlights
    $('.highlight').removeClass('highlight');

    // Highlight elements containing the search value
    $("body *").each(function () {
      var elementText = $(this).text().toLowerCase();
      if (elementText.includes(searchValue)) {
        $(this).addClass('highlight');
      }
    });
  });
});

</script>

</html>