<?php

include("../config/config.php");

$id = $_GET["id"];

$sql = "DELETE FROM admin WHERE id = $id";

$res = mysqli_query($con,$sql);

if($res == TRUE)
{
   $_SESSION['delete'] = "Admin Deleted Succesfully";
   header("location:".SITEURL.'admin/admin.php');
}
else
{
    $_SESSION['delete'] = "Admin Deleted Failed";
    header("location:".SITEURL.'admin/admin.php');
}



?>