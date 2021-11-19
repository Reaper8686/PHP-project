<?php include("partials/menu.php")?>

<div class="main-content">
    <h1>Add Admin</h1>
    <div style="color: red;">
    <?php

    if(isset($_SESSION['add']))
    {
        echo $_SESSION['add'] ;
        unset($_SESSION['add']);
    }    
    ?>
    </div>
    <br><br>
    <form action="" method="POST" class="">
        <label for="full_name" >Full Name:</label>
        <input type="text" placeholder="Enter your name" name="full_name" ><br><br>
        <label for="username">Username:</label>
        <input type="text" placeholder="Enter your username" name="username"><br><br>
        <label for="password">Password:</label>
        <input type="password" placeholder="enter your password" name="password"><br><br>
        <input type="submit" value="Add Admin" name="submit" class="Abtn">   
    </form>
</div>

<?php include("partials/footer.php")?>

<?php
if(isset($_POST['submit']))
{
    $full_name = $_POST["full_name"];
    $username = $_POST["username"];
    $password = $_POST["password"];


    

    $sql = "INSERT INTO admin SET
    full_name = '$full_name',
    username = '$username',
    password = '$password'
    ";

    

    $res = mysqli_query($con, $sql) or die("error sql");

    if($res == TRUE)
    {
        $_SESSION['add'] = "Admin added Succesfully!!";
        header("location:".SITEURL.'admin/admin.php');
    }else{
        $_SESSION['add'] = "Failed to add Admin";
        header("location:".SITEURL.'admin/add-admin.php');
    }
}
?>
