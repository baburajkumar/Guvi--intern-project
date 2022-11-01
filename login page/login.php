<?php
require("class.php");
session_start();
$conn = mysqli_connect('localhost','root','' , 'db_school') or die ('unable to connect');
?>
<!DOCTYPE html>
<html lan="en" and dir="Itr">
<head>
    <meta charset="utf-8">
    <title>Interactive Login form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div>
    <form class ="box"  action="login.php" method="POST" >
        <h1>
            login
        </h1>
        <input type ="text" name="username"placeholder="Enter Username" id="username" required = "">
        <p id="userError"></p>
        <input type="password" name="password"placeholder="Enter password" id="password" required = "">
        <p id="passError"></p>
        <input type="submit" name="login"value="Login">
        <h2>
            Don't have a account click <a href="register_form.php">Here</a>
        </h2>
    </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <?php
        if (isset($_POST['login'])){
            $username = $_POST['username'];
            $password = $_POST['password'];

        $select = mysqli_query($conn, "SELECT * FROM tb_student WHERE username = '$username' AND password = '$password' ");
        $row = mysqli_fetch_array($select);

        if(is_array($row)){
            $_SESSION["username"] = $row ['username'];
            $_SESSION["password"] = $row ['password'];
        }
        else{
            echo '<script type = "text/javascript">';
            echo 'alert("Invalid username or password");';
            echo 'window.location.herf = "login.php" ';
            echo '</script>';
        }
        }
        
        if(isset($_SESSION["username"]))
        {
           header("Location:welcome.php");
        }
    ?>
</body>
<script src="login2.js"></script>
</html>