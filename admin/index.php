<?php include("partials/menu.php") ?>



<!-- main-content -->
<div class="main-content">
    <h1>Dashboard</h1>
    <div style="color: green; font-weight:bold;">
    <?php
    if(isset($_SESSION['logined']))
    {
        echo $_SESSION['logined'];
        unset($_SESSION['logined']);
    } 
    ?>
    </div>
    <br><br>
    <div class="category">
        <?php
            $sql = "SELECT * FROM admin";
            $count = mysqli_num_rows(mysqli_query($con,$sql));
        ?>
        <h1><?php echo $count;?></h1>
        <span>Admin's</span>
    </div>
    <div class="category">
        <?php
            $sql2 = "SELECT * FROM category";
            $count2 = mysqli_num_rows(mysqli_query($con,$sql2));
        ?>
        <h1><?php echo $count2;?></h1>
        <span>Category's</span>
    </div>
    <div class="category">
        <?php
            $sql3 = "SELECT * FROM cakes";
            $count3 = mysqli_num_rows(mysqli_query($con,$sql3));
        ?>
        <h1><?php echo $count3;?></h1>
        <span>Cake's</span>
    </div>
    <div class="category">
        <?php
            $sql4 = "SELECT * FROM jojo";
            $count4 = mysqli_num_rows(mysqli_query($con,$sql4));
        ?>
        <h1><?php echo $count4;?></h1>
        <span>Order's</span>
    </div>
</div>


<?php include("partials/footer.php") ?>