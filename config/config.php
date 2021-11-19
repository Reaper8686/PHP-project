<?php
session_start();
ob_start();

define('SITEURL','http://localhost/Cake-order/');
define('LOCALHOST','localhost:3307');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','cake-order');


$con = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die("error sql");
$db_select = mysqli_select_db($con,DB_NAME) or die("error sql");

?>