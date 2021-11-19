<?php include("config/config.php") ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reaper</title>

    <!-- favicon -->
    <link
      rel="apple-touch-icon"
      sizes="180x180"
      href="favicon/apple-touch-icon.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="32x32"
      href="favicon/favicon-32x32.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="favicon/favicon-16x16.png"
    />
    <link rel="manifest" href="favicon/site.webmanifest" />
    <link
      rel="mask-icon"
      href="favicon/safari-pinned-tab.svg"
      color="#5bbad5"
    />
    <meta name="msapplication-TileColor" content="#da532c" />
    <meta name="theme-color" content="#ffffff" />

    <!-- custum CSS -->

    <link rel="stylesheet" href="./css/style.css" />

    <!-- CSS only -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU"
      crossorigin="anonymous"
    />

    <!-- JavaScript Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
      crossorigin="anonymous"
    ></script>

    <!-- fontawesome -->
    <script
      src="https://kit.fontawesome.com/ee31b0888b.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body style="background-color: rgb(238, 211, 238)">
    <div class="container">
      <!-- header -->
      <div class="row header">
        <div class="col-7">
          <h1 class="heading">Reaper Cake's</h1>
        </div>
        <div class="col-5">
          <ul id="lists">
            <li><a href="<?php echo SITEURL;?>">Home</a></li>
            <li><a href="<?php echo SITEURL;?>category.php">Category</a></li>
            <li><a href="<?php echo SITEURL;?>cakes.php">Cake's</a></li>
            <li><a href="">Contact us</a></li>
          </ul>
        </div>
      </div>