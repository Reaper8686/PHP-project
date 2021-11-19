<?php

include("../config/config.php");

$id = $_GET["id"];
$image_name = $_GET["image_name"];

if($image_name!="")
{
    $path = "../images/cakes/".$image_name;
    $remove = unlink($path);
    if($remove == false)
    {
        $_SESSION['cake-image-not-removed'] = "Failed to remove image";
        header("location:".SITEURL.'admin/cakes.php');
    } 
}


$sql = "DELETE FROM cakes WHERE id = $id";

$res = mysqli_query($con,$sql);

if($res == TRUE)
{
$_SESSION['cake-delete'] = "Cake Deleted Succesfully";
header("location:".SITEURL.'admin/cakes.php');
}
else
{
$_SESSION['cake-delete'] = "Cake Deleted Failed";
header("location:".SITEURL.'admin/cakes.php');
die();
}



?>