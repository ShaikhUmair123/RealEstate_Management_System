<?php
session_start();
include('includes/header.php'); 
include('includes/navbar.php'); 
include('security.php');
?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Property</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="realestate_code.php" method="POST">

        <div class="modal-body">


            <div class="form-group">
                <label> Image </label>
                <input type="file" name="image" class="" placeholder="" required>
            </div>
            <div class="form-group">
                <label> Property Name </label>
                <input type="text" name="housename" class="form-control" placeholder="Enter Property" required>
            </div>
            <div class="form-group">
                <label> City </label>
                <input type="text" name="city" class="form-control" placeholder="Enter City" required>
            </div>
            <div class="form-group">
                <label> Area </label>
                <input type="text" name="area" class="form-control" placeholder="Enter Area" required>
            </div>
            <div class="form-group">
                <label> Price </label>
                <input type="text" name="price" class="form-control" placeholder="Enter Price" required>
            </div>


        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><h3>Property</h3> 
            <div style="text-align: right">
              <a href="realestate_search.php" type="submit" name="search_btn" class="btn btn-secondary"> Search</a>
            </div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add 
            </button>
    </h6>
  </div>

  <div class="card-body">

   <?php

    if(isset($_SESSION['success']) && $_SESSION['success'] !='')
    {
      echo '<h3>' .$_SESSION['success'].'</h3>';
      unset($_SESSION['success']);

    }

   ?>

    <?php

    if(isset($_SESSION['status']) && $_SESSION['status'] !='')
    {
      echo '<h3>' .$_SESSION['status'].'</h3>';
      unset($_SESSION['status']);

    }

    ?>

    <?php

    if(isset($_SESSION['warning']) && $_SESSION['warning'] !='')
    {
      echo '<h3>' .$_SESSION['warning'].'</h3>';
      unset($_SESSION['warning']);

    }

    ?>


<div class="table-responsive">

    <?php
        $query = "SELECT * FROM add_property";
        $query_run = mysqli_query($conn, $query);
    ?>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> Id </th>
            <th> Image </th>
            <th> Property Name </th>
            <th> City </th>
            <th> Area </th>
            <th> Price </th>
            <th>EDIT </th>
            <th>DELETE </th>
          </tr>
        </thead>
        <tbody>
        <?php
            if(mysqli_num_rows($query_run) > 0)        
              {
                while($row = mysqli_fetch_assoc($query_run))
              {
            ?>
     
          <tr>
            <td><?php  echo $row['houseno']; ?></td>
            <td><img src="img\<?php  echo $row['image']; ?>" width="152" height="83"></td>
            <td><?php  echo $row['housename']; ?></td>
            <td><?php  echo $row['city']; ?></td>
            <td><?php  echo $row['area']; ?></td>
            <td><?php  echo $row['price']; ?></td>
            <td>
                <form action="realestate_edit.php" method="post">
                    <input type="hidden" name="edit_houseno" value="<?php  echo $row['houseno']; ?>">
                    <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                </form>
            </td>
            <td>
                <form action="realestate_code.php" method="post">
                  <input type="hidden" name="delete_id" value="<?php echo $row['houseno']; ?>">
                  <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                </form>
            </td>
          </tr>
          <?php
                    } 
                }
                else {
                      echo "No Record Found";
                     }
          ?>
        
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>