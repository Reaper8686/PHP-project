<?php include("./partials/menu.php") ?>

<?php

if(isset($_GET['id']))
{
    $id = $_GET['id'];
}
?>

<div class="main-content">
    <h1>Update Password</h1>
    <div style="color: red;">
    </div>
    <br><br>
    <form action="" method="POST" class="">
        <label for="">Old Password:</label>
        <input type="password" placeholder="enter old password" name="old-password"><br><br>
        <label for="password">New Password:</label>
        <input type="password" placeholder="enter new password" name="new-password"><br><br>
        <label for="password">Confirm Password:</label>
        <input type="password" placeholder="confirm password" name="confirm-password"><br><br>
        <input type="hidden" name = id value = <?php echo $id ?> >
        <input type="submit" value="Update Password" name="submit" class="Abtn">   
    </form>
</div>

<?php
if(isset($_POST['submit']))
{
    $id = $_POST['id'];
    $old_password = $_POST['old-password'];
    $new_password = $_POST['new-password'];
    $confirm_password = $_POST['confirm-password'];


    $sql = "SELECT * FROM admin WHERE id = $id AND password = '$old_password'";

    $res = mysqli_query($con,$sql);

    if($res == true)
    {
        $count = mysqli_num_rows($res);

        if($count == 1)
        {
            if($new_password == $confirm_password)
            {
                $sql = "UPDATE admin SET
                password = '$new_password'
                WHERE id = $id
                ";

                $res = mysqli_query($con,$sql);

                if($res == TRUE)
                {
                    $_SESSION['password-updated'] = "Password Updated Succesfully"; 
                    header("location:".SITEURL.'admin/admin.php');
                }
                else
                {
                    $_SESSION['password-not-updated'] = "Password Updation Failed";
                    header("location:".SITEURL.'admin/admin.php');
                }
            }
            else
            {
                $_SESSION['password-not-matched'] = "Password not Matched";
                header("location:".SITEURL.'admin/admin.php');
            }
        }
        else
        {
            $_SESSION['user-not-found'] = "User not Found";
            header("location:".SITEURL.'admin/admin.php');
        }
    }
}

?>


<?php include("./partials/footer.php") ?>
