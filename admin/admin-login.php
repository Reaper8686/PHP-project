<?php include("../config/config.php") ?>

<html>
    <head>
        <title>Admin Login Page</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body class="login-main">
        <div class="login">
            <h1>Login</h1>
            <div style="color: red; font-weight:bold;">
            <?php
            if(isset($_SESSION['logined']))
            {
                echo $_SESSION['logined'];
                unset($_SESSION['logined']);
            }
            if(isset($_SESSION['not-login']))
            {
                echo $_SESSION['not-login'];
                unset($_SESSION['not-login']);
            }
            ?>
            </div>
            <form action="" method="POST">
                <label for="">Username:</label>
                <input type="text" placeholder="Enter Username" name="username"><br>
                <label for="">Password:</label>
                <input type="password" placeholder="Enter password" name="password"><br>
                <input class="log-btn" type="submit" name="submit" value="Login">
            </form>
        </div>
    </body>
</html>


<?php
if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE username = '$username'
    AND password='$password'";

    $res = mysqli_query($con,$sql);

    if(mysqli_num_rows($res) == 1)
    {
        $_SESSION['logined'] = 'Login Succesfully!!';
        $_SESSION['user'] = $username;

        header("location:".SITEURL.'admin/');
    }
    else
    {
        $_SESSION['logined'] = "Username or Password not Matched";
        header("location:".SITEURL.'admin/admin-login.php');
    }
}
?>






