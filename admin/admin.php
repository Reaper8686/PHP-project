<?php include("partials/menu.php")?>

<!-- main-content -->
<div class="main-content">
    <div>
    <h1>Manage Admin</h1>
    <div style="color: green; font-weight:bold;">
    <?php

    if(isset($_SESSION['add']))
    {
        echo $_SESSION['add'] ;
        unset($_SESSION['add']);
    }
    if(isset($_SESSION['delete']))
    {
        echo $_SESSION['delete'] ;
        unset($_SESSION['delete']);
    } 
    if(isset($_SESSION['update']))
    {
        echo $_SESSION['update'] ;
        unset($_SESSION['update']);
    }  
    if(isset($_SESSION['password-updated']))
    {
        echo $_SESSION['password-updated'] ;
        unset($_SESSION['password-updated']);
    }  
    ?>
    </div>
    <div style="color: red; font-weight:bold;">
    <?php
    if(isset($_SESSION['user-not-found']))
    {
        echo $_SESSION['user-not-found'] ;
        unset($_SESSION['user-not-found']);
    }
    if(isset($_SESSION['password-not-updated']))
    {
        echo $_SESSION['password-not-updated'] ;
        unset($_SESSION['password-not-updated']);
    }  
    ?>
    </div>
    <br><br>
    <button class="Abtn"><a href="add-admin.php">Add Admin</a></button>
    <table class="table">
        <tr>
            <th>Sr.no</th>
            <th>Full Name</th>
            <th>Username</th>
            <th>Actions</th>
        </tr>
        <?php
            $sql = "SELECT * FROM admin";
            
            $res = mysqli_query($con,$sql);


            if($res == TRUE)
            {
                $count = mysqli_num_rows($res);

                if($count > 0)
                {
                    $sid = 1;
                    while($rows = mysqli_fetch_assoc($res))
                    {
                        $id = $rows['id'];
                        $full_namee = $rows['full_Name'];
                        $usernamee = $rows['username'];

                ?>
                        <tr>
                            <td><?php echo $sid++; ?></td>
                            <td><?php echo $full_namee; ?></td>
                            <td><?php echo $usernamee; ?></td>
                            <td>
                                <a href="<?php echo SITEURL;?>admin/admin-update.php?id=<?php echo $id;?>" id="up" class="btn-update">Update Admin</a> | 
                                <a href="<?php echo SITEURL;?>admin/admin-delete.php?id=<?php echo $id; ?>" id="del">Delete Admin</a> |
                                <a href="<?php echo SITEURL;?>admin/admin-password.php?id=<?php echo $id; ?>" id="del">Change password</a> |
                            </td>
                        </tr>
                <?php

                    }
                }else{

                }
            }
        
        ?>
    </table>
    </div>
</div>

<?php include("partials/footer.php")?>
