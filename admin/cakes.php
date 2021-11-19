<?php include("partials/menu.php")?>

<!-- main-content -->
<div class="main-content">
    <div>
    <h1>Manage Cakes</h1>
    <div style="color: green;">
        <?php
            if(isset($_SESSION['cake-added']))
            {
                echo $_SESSION['cake-added'];
                unset($_SESSION['cake-added']);
            }
            if(isset($_SESSION['cake-delete']))
            {
                echo $_SESSION['cake-delete'];
                unset($_SESSION['cake-delete']);
            }
            if(isset($_SESSION['category-updated']))
            {
                echo $_SESSION['category-updated'];
                unset($_SESSION['category-updated']);
            }
        ?>
    </div>
    <div style="color: red;">
        <?php
            if(isset($_SESSION['cake-added']))
            {
                echo $_SESSION['cake-added'];
                unset($_SESSION['cake-added']);
            }
            if(isset($_SESSION['cake-image-not-removed']))
            {
                echo $_SESSION['cake-image-not-removed'];
                unset($_SESSION['cake-image-not-removed']);
            }
            if(isset($_SESSION['cake-delete']))
            {
                echo $_SESSION['cake-delete'];
                unset($_SESSION['cake-delete']);
            }
            if(isset($_SESSION['image-not uploaded']))
            {
                echo $_SESSION['image-not-uploaded'];
                unset($_SESSION['image-not uploaded']);
            }
            if(isset($_SESSION['current-image failed']))
            {
                echo $_SESSION['current-image failed'];
                unset($_SESSION['current-image failed']);
            }

        ?>
    </div><br><br>
    <button class="Abtn"><a href="<?php echo SITEURL;?>admin/cakes-add.php">Add Cakes</a></button>
    <table class="table">
        <tr>
            <th>Sr.no</th>
            <th>Title</th>
            <th>Description</th>
            <th>Image</th>
            <th>Featured</th>
            <th>Active</th>
            <th>Actions</th>
        </tr>
        <?php
            $sql = "SELECT * FROM cakes";
            
            $res = mysqli_query($con,$sql);
            $count = mysqli_num_rows($res);

            if($count > 0)
            {
                $sid = 1;
                while($rows = mysqli_fetch_assoc($res))
                {
                    $id = $rows['id'];
                    $title = $rows['title'];
                    $description = $rows['description'];
                    $price = $rows['price'];
                    $image_name = $rows['image_name'];
                    $featured = $rows['featured'];
                    $active = $rows['active'];
                    
                    ?>
                            <tr>
                            <td><?php echo $sid++;?></td>
                            <td><?php echo $title;?></td>
                            <td><?php echo $description; ?></td>
                            <td>
                                <?php
                                    if($image_name!="")
                                    {
                                        ?>
                                        <img src="<?php echo SITEURL;?>images/cakes/<?php echo $image_name;?>" width="100px" alt="">
                                        <?php
                                    }
                                    else
                                    {
                                        echo "<div style='color:red;'>Image not available</div>";
                                    }
                                ?>
                            </td>
                            <td><?php echo $featured; ?></td>
                            <td><?php echo $active; ?></td>
                            <td>
                                <a href="<?php echo SITEURL;?>admin/cakes-update.php?id=<?php echo $id;?>" id="up" class="btn-update">Update Cakes</a> | 
                                <a href="<?php echo SITEURL;?>admin/cakes-delete.php?id=<?php echo $id;?>&image_name=<?php echo $image_name;?>" id="del">Delete Cakes</a>
                            </td>
                        </tr>
                    <?php
                }
            }
            else
            {
                echo "<tr><td>Cakes not Available</td></tr>";
            }
        ?>        
    </table>
    </div>
</div>

<?php include("partials/footer.php")?>
