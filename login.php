<?php

    $login=false;
    $showError=false;
  if($_SERVER["REQUEST_METHOD"] =="POST"){
    include 'Partials/dbconnect.php';
    $username=$_POST["username"];
    $password=$_POST["password"];
 
      $sql = "Select * from users where username='$username' AND password='$password'";
        $result = mysqli_query($conn,$sql);
        $num=mysqli_num_rows($result);
        if($num == 1){
          $login = true;
          session_start();
          $_SESSION['loggedin']=true;
          $_SESSION['username']=$username;

          echo "<script>
            alert('Login Successful !');
            location.replace('welcome.php');
          </script>";
          // header("location:welcome.php");
        }

   
    else{
      $showError = "Invalid Credentials !!";
    }

  }
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>My_Project | RealEstate.com</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

</head>
    <body>

    <?php require 'Partials/_nav.php' ?>
    <br>
    <br>
    <br>
    <?php
   
    if($login){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div> ';
    }

    if($showError){
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> '.$showError.'
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div> ';
      }
      ?>
    
    
    <div class="container">
    <h1 class="text-center my-3">Login to our Website</h1>

        <form action="login.php" method="post">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="Enter username" required>
        
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
        
      </div>
     
      <button type="submit" class="btn btn-primary">Login</button>
     
    </form>
    </div>
    
    


  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/popper/popper.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/scrollreveal/scrollreveal.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>
</html>