<?php
session_start();
include('security.php');

if(isset($_POST['registerbtn']))
{
    $name = $_POST['housename'];
    $city = $_POST['city'];
    $area = $_POST['area'];
    $price = $_POST['price'];
    $image = $_POST['image'];


            $query = "INSERT INTO add_property (image,housename,city,area,price) VALUES ('$image','$name','$city','$area','$price')";
            $query_run = mysqli_query($conn, $query);
            
            if($query_run)
            {
                // echo "Saved";
                $_SESSION['success'] = "Property Added";
                $_SESSION['success_code'] = "success";
                header('Location: Realestate.php');
            }
            else 
            {
                $_SESSION['status'] = "Property Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: Realestate.php');  
            }
    }

if(isset($_POST['updatebtn']))
{
    $houseno = $_POST['edit_houseno'];
    $name = $_POST['edit_housename'];
    $city = $_POST['edit_city'];
    $area = $_POST['edit_area'];
    $price = $_POST['edit_price'];
    $image = $_POST['edit_image'];


    $query = "UPDATE add_property SET image='$image',housename='$name',city='$city',area='$area',price=' $price' WHERE houseno='$houseno' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Your Data is Updated";
        $_SESSION['success_code'] = "success";
        header('Location: Realestate.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Updated";
        $_SESSION['status_code'] = "error";
        header('Location: Realestate.php'); 
    }
}

if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM add_property WHERE houseno='$id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Your Data is Deleted";
        $_SESSION['success_code'] = "success";
        header('Location: Realestate.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Deleted";       
        $_SESSION['status_code'] = "error";
        header('Location: Realestate.php'); 
    }    
}

?>