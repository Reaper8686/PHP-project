<?php
include("../config/config.php");

session_destroy();

header("location:".SITEURL.'admin/admin-login.php')


?>