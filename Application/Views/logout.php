<?php
session_start();
session_destroy();
     ?>
     <script>
        alert("Logout Successful")
     </script>

     <?php
     header("location:index.php");
?>