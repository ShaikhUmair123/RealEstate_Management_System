
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
   
   <div class="container">
   <h1 class="text-center my-3">Admin Login</h1>
   <hr>
  <form id="form"  method="post">
    <div class="form-group">
      <label for="Username">Username:</label>
      <input type="Username" class="form-control" id="Username" placeholder="Username" name="username">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
    </div>
   
    <div class="btn-group">
  <button type="submit" class="btn btn-primary">Login</button>
 
</div>
<div class="btn-group">
  <button type="button" class="btn btn-primary">Cancel</button>
 
</div>
  </form>
</div>

<?php
include 'Partials/dbconnect.php';

if(isset($_POST['username']) && !empty($_POST['username']) AND isset($_POST['password']) && !empty($_POST['password'])){
  //$UserID = mysqli_escape_string($_POST['Username']);
  //$PIN = mysqli_escape_string(md5($_POST['pswd']));
    $UserID = $_POST['username'];
  $PIN = $_POST['password'];
  $search = mysqli_query($conn,"SELECT username, password FROM admin WHERE username='".$_POST['username']."' AND password='".$_POST['password']."'") or die(mysqli_error($conn)); 
  $match  = mysqli_num_rows($search);
  
  if($match > 0){
     
    echo "<script>
      alert('Login successful');
      location.replace('admin_panel.php');
      </script>


    ";


    // header("location:onlineapp.html");
      //$msg = 'Login Complete! Thanks';
  }else{ 
    echo "
    <script>
      alert('Login Failed! Please make sure that you enter the correct details and that you have activated your account');
      </script>
      ";
  }
}


?>

    
    


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