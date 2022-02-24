<?php
session_start();
include('includes/header.php'); 
include('includes/navbar.php'); 
include('security.php');
?>

<<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> EDIT Property </h6>
    </div>
    <div class="card-body">
    <?php

        if(isset($_POST['edit_btn']))
        {
            $houseno = $_POST['edit_houseno'];
            
            $query = "SELECT * FROM add_property WHERE houseno='$houseno' ";
            $query_run = mysqli_query($conn, $query);

            foreach($query_run as $row)
            {
                ?>

                    <form action="realestate_code.php" method="POST">

                        <input type="hidden" name="edit_houseno" value="<?php echo $row['houseno'] ?>">

                        <div class="form-group">
                            <label> Image </label>
                            <input type="file" name="edit_image" value="<?php echo $row['image'] ?>" class=""
                                placeholder="">
                        </div>
                        <div class="form-group">
                            <label> PropertyName </label>
                            <input type="text" name="edit_housename" value="<?php echo $row['housename'] ?>" class="form-control"
                                placeholder="Enter PropertyName">
                        </div>
                        <div class="form-group">
                            <label> City </label>
                            <input type="text" name="edit_city" value="<?php echo $row['city'] ?>" class="form-control"
                                placeholder="Enter City">
                        </div>
                        <div class="form-group">
                            <label> Area </label>
                            <input type="text" name="edit_area" value="<?php echo $row['area'] ?>" class="form-control"
                                placeholder="Enter Area">
                        </div>
                        <div class="form-group">
                            <label> Price </label>
                            <input type="text" name="edit_price" value="<?php echo $row['price'] ?>" class="form-control"
                                placeholder="Enter Price">
                        </div>

                        <a href="Realestate.php" class="btn btn-danger"> CANCEL </a>
                        <button type="submit" name="updatebtn" class="btn btn-primary"> Update </button>

                    </form>
                    <?php
            }
        }
    ?>
    </div>
</div>
</div>

</div>

<?php 
include('includes/scripts.php'); 
include('includes/footer.php'); 
?>