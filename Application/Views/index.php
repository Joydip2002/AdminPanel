<?php
  include("../config/connection.php");
  session_start();
  if(isset($_SESSION["name"])){
    header("location:index1.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <?php include("./Components/header/header.php"); ?>
    <style>
        *{
            padding:0;
            margin: 0;
            box-sizing: border-box;
        }
        #p{
          display: flex;
          justify-content:center;
          align-items: center;
          min-height: 100vh;
        }
        #c{
          
        }
        /* input[type="email"]{
            padding:.7rem 0;
        }
        input[type="text"]{
            padding:.7rem 0;
        } */
        a{
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container col-md-7" id="p">
        <div class="container col-md-5 bg-light rounded-3" id="c">
            <div class="container col-md-12">
                <h2 class="text-center py-3 mt-3">Sign in</h2>
            </div>  
            <div class="container col-md-12 text-center py-3">
                <h4>Welcome</h4>
                <p>Enter Your Register Username</p>
                <?php
                    if(isset($_POST['submit'])){
                        $username = $_POST['username'];
                        $_SESSION['username'] = $username;
                        $password = $_POST['password'];

                        
                $sqlPass = "SELECT * FROM  user where email ='$username' AND password = '$password'";
                $res1 = mysqli_query($conn,$sqlPass);
                $emailCount = mysqli_num_rows($res1);
                if($emailCount){
                    $pass_email = mysqli_fetch_assoc($res1);
                    $_SESSION['name'] = $pass_email['name'];    
                    header("location:index1.php");
                }
                else{
                    ?>
                    <script>
                        alert("Invalid Credentials!");
                    </script>
                <?php
                }

                    }
                ?>
            </div>
             <form class="container col-md-10" method="POST">
                <label for="Name">Username(Email)</label>
                <input type="email" class="form-control" name="username" value="" placeholder="">
                <label for="Password" class="mt-3">Password</label>
                <input type="text" class="form-control" name="password" value="" placeholder=" ">

                <div class="d-flex justify-content-between mt-3">
                    <!-- <label for=""><input type="checkbox">Remind me</label> -->
                    <!-- <label for=""><a href="">Forgot Password</a></label> -->
                </div>

                <input type="submit" name ="submit" class="btn w-100 btn-primary mt-3 mb-5 mt-5 py-2">
             </form>
        </div>
    </div>
    <?php include("./Components/footer/footer.php"); ?>
</body>
</html>