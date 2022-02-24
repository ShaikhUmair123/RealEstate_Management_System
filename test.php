<?php
// include database configuration file
    include 'Partials/dbconnect.php';
?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

.navbar {
  width: 100%;
  background-color: #555;
  overflow: auto;
}

.navbar a {
  float: left;
  padding: 12px;
  color: white;
  text-decoration: none;
  font-size: 17px;
}

.navbar a:hover {
}

.active {

}

@media screen and (max-width: 500px) {
  .navbar a {
    float: none;
    display: block;
  }
}

    .container{
      padding: 40px;
    }
    .cart-link{
      width: 100%;
      text-align: right;display: block;font-size: 22px;
    }
    .footer {
 
  left: 0;
  bottom: 0;
  position: fixed;
  width: 100%;
  background-color: #14141f;
  color: #ffffff;
  text-align: center;
}

</style>
<body>

<div class="navbar">
  <a class="index.php" href="#"><i class=""></i> Dukan</a>
  <a href="index.php"><i class=""></i> Home</a>
  <a href="product.php"><i class=""></i> Product</a>
  <a href="viewCart.php"><i class=""></i> Cart</a>
</div>

         
<div class="container">
<h1>Products</h1>
    <a href="viewCart.php" class="cart-link" title="View Cart"><i class="glyphicon glyphicon-shopping-cart"></i></a>
    <div id="products" class="row list-group">
        <?php
        //get rows query
        $query = $conn->query("SELECT * FROM add_property ");
        if($query->num_rows > 0){
            while($row = $query->fetch_assoc()){
        ?>
        <div class="item col-lg-4">
            <div class="thumbnail">
                <div class="caption">
                   
                
                <div><img src="<?php echo $row['image']; ?>" width="300px" height="300px"></div><hr>
                <i style="color: #000066;">House NO: <h4 class="list-group-item-heading"><?php echo $row["houseno"]; ?></h4></i><hr>
                    <p class="list-group-item-text">House Name:<?php echo $row["housename"]; ?></p><hr>
                    <p class="list-group-item-text"><?php echo $row["area"]; ?></p><hr>
                    <p class="list-group-item-text"><?php echo $row["price"]; ?></p><hr>
                        <p class="lead"><?php echo $row["city"]; ?></p><br> 
                        <div class="col-md-6">
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } }else{ ?>
        <p>Product(s) not found.....</p>
        <?php } ?>
    </div>
</div>
<section id="banner_adds">
            <div class="container py-5 text-center">
             <a href=""> <img  src="image/banner1-cr-500x150.jpg" alt="banner1" class="img-fluid">
              <a href=""><img src="image/banner2-cr-500x150.jpg" alt="banner1" class="img-fluid"></a>
            </div>
          </section>
         
<div class="footer">
          <p>Desing By Shaikh Sohail</p>
        </div>
</div>

</body>
</html> 