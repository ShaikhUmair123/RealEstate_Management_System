<?php
include('partials/dbconnect.php');

if($conn)
{
    // echo "Database Connected";
}
else
{
    header("Location: partials/dbconnect.php");
}
?>