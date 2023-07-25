<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/4cae11b526.js" crossorigin="anonymous"></script>
</head>
<body>
    <style>
        :root{
            --bg-custom: #ddd;
            --color-custom:#000 ;
        }
        .mydiv{
            height:100px;
            width:200px;
            background-color: var(--bg-custom);
            color:var(--color-custom);
        }
    </style>
     <i id="sun" onclick="light()" class="fa-solid fa-sun"></i>
     <i class="fa-solid fa-moon" id="moon" onclick="moon()" style="visibility: hidden;"></i>
    <div class="mydiv">
        <h4 class="myh4">abc</h4>
    </div>


    <script>
       function light() {
    const sun = document.getElementById("sun");
    const moon = document.getElementById("moon");
    document.body.style.background = "white";
    sun.style.visibility = "hidden";
    moon.style.visibility = "visible";
    moon.style.marginRight = "1rem";
    var root = document.querySelector(":root");
    root.style.setProperty("--bg-custom","#000");
    root.style.setProperty("--color-custom","#fff");  
}

function moon() {
    const sun = document.getElementById("sun");
    const moon = document.getElementById("moon");
    document.body.style.background = "#141b2d";
    sun.style.visibility = "visible";
    moon.style.visibility = "hidden";
    var root = document.querySelector(":root");
    root.style.setProperty("--bg-custom","#ddd");
    root.style.setProperty("--color-custom","#000");
}
    </script>
</body>
</html>