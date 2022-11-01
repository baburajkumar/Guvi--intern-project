<?php
require("class.php");
@include 'config.php';

if(isset($_POST['submit'])){

   $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    $result = mysqli_query($conn, "SELECT * FROM tb_student WHERE username = '$username' ");

   //  $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){

       $error[] = 'user already exist!';

      }else{

       if($password != $cpassword){
          $error[] = 'password not matched!';
       }else{
          $insert = "INSERT INTO tb_student( username , password) VALUES('$username','$password')";
          mysqli_query($conn, $insert);
          header('location:reg_success.php');
       }
    }

 };

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.sass">
   <script src="login2.js"></script>
</head>
<body>
<form class ="box" id="ajaxform" action="" method="POST" >
      <h1>register now</h1>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
        <input type ="text" name="username"placeholder="Enter Username" id="username" required = "">
        <p id="userError"></p>
        <input type="password" name="password"placeholder="Enter password" id="password" required = "">
        <p id="passError"></p>
        <input type="password" name="cpassword"placeholder="Confirm password" id="cpassword" required = "">
        <input type="submit" name="submit"value="Sign up">
        <h2>already have an account? <a href="login.php">login now</a></h2>
   </form>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
   <script type="text/javascript">
      $(document).ready(function(){

         $("#ajaxform").submit(function(event){
             alert('SUBMITTED SUCCESSFULLY !');
         })
         
      });
      </script>
</body>
</html>