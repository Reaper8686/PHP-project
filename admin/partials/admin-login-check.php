<?php

if(!isset($_SESSION['user']))
{
    $_SESSION['not-login'] = "You have to Login to Access";
    header("location:".SITEURL.'admin/admin-login.php');
}

?>