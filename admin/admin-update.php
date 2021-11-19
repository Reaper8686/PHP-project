<?php include("./partials/menu.php") ?>

<?php

$id = $_GET['id'];

$sql = "SELECT * FROM admin WHERE id = $id";

$res = mysqli_query($con,$sql);

if($res == TRUE)
{
    $count = mysqli_num_rows($res);
    
    if($count == 1)
    {
        $rows = mysqli_fetch_assoc($res);

        $full_name = $rows['full_Name'];
        $username = $rows['username'];
    }
    else
    {
        header("location:".SITEURL.'admin/admin.php');
    }
}

?>

<div class="main-content">
    <h1>Update Admin</h1>
    <div style="color: red;">
    <?php
    if(isset($_SESSION['update']))
    {
        echo $_SESSION['update'];
        unset($_SESSION['update']);
    }
    ?>
    </div>
    <br><br>
    <form action="" method="POST" class="">
        <label for="full_name" >Full Name:</label>
        <input type="text" placeholder="Enter your name" name="full_name" value="<?php echo $full_name;?>"><br><br>
        <label for="username">Username:</label>
        <input type="text" placeholder="Enter your username" name="username" value="<?php echo $username;?>"><br><br>
        <input type="hidden" name="id" value=<?php echo $id; ?> >
        <input type="submit" value="Update Admin" name="submit" class="Abtn">   
    </form>
</div>

<?php include("partials/footer.php")?>

<?php
if(isset($_POST['submit']))
{
    $full_name = $_POST["full_name"];
    $username = $_POST["username"];



    $sql = "UPDATE admin SET
    full_name = '$full_name',
    username = '$username'
    WHERE id = '$id'
    ";

    

    $res = mysqli_query($con, $sql) or die("error sql");

    if($res == TRUE)
    {
        $_SESSION['update'] = "Admin Updated Succesfully!!";
        header("location:".SITEURL.'admin/admin.php');
    }else{
        $_SESSION['update'] = "Failed to update Admin";
        header("location:".SITEURL.'admin/update-admin.php');
    }
}
?>


