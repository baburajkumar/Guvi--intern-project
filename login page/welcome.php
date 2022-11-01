<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            text-align: center;
            color: white;
            background: url(jr-korpa-9XngoIpxcEo-unsplash.jpg);
            background-size: cover;
            width: 100%;
            height: 100%;
            padding: 0;
            margin: 0
        }
        a:link {
           background-color:transparent;
           text-decoration: none;
        }
    </style>
</head>
<body>
    <h2>WELCOME <?php echo $_SESSION['username'];?></h2>
    click here to <a href="logout.php">Logout</a>
</body>
</html>