<?php

    include("../config/config.php");

    $id = $_GET["id"];
    $image_name = $_GET["image_name"];

    $path = "../images/category/".$image_name;
    $remove = unlink($path);
    if($remove == false)
    {
        $_SESSION['image-not-removed'] = "Failed to remove image";
        header("location:".SITEURL.'admin/category.php');
    }

    $sql = "DELETE FROM category WHERE id = $id";

    $res = mysqli_query($con,$sql);

    if($res == TRUE)
    {
    $_SESSION['category-delete'] = "Category Deleted Succesfully";
    header("location:".SITEURL.'admin/category.php');
    }
    else
    {
    $_SESSION['category-delete'] = "Category Deleted Failed";
    header("location:".SITEURL.'admin/category.php');
    die();
    }
