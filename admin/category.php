<?php include("partials/menu.php")?>

<!-- main-content -->
<div class="main-content">
    <div>
    <h1>Manage Category</h1>
    <div style="color: green;">
        <?php
            if(isset($_SESSION['category-added']))
            {
                echo $_SESSION['category-added'];
                unset($_SESSION['category-added']);
            }
            if(isset($_SESSION['category-delete']))
            {
                echo $_SESSION['category-delete'];
                unset($_SESSION['category-delete']);
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
                if(isset($_SESSION['image-not-deleted']))
                {
                    echo $_SESSION['image-not-deleted'];
                    unset($_SESSION['image-not-deleted']);
                }
                if(isset($_SESSION['category-not-found']))
                {
                    echo $_SESSION['category-not-found'];
                    unset($_SESSION['category-not-found']);
                }
                if(isset($_SESSION['not-upload']))
                {
                    echo $_SESSION['not-upload'];
                    unset($_SESSION['not-upload']);
                }
                if(isset($_SESSION['remove-failed']))
                {
                    echo $$_SESSION['remove-failed'];
                    unset($_SESSION['remove-failed']);
                }

            ?>
    </div><br><br>
    <button class="Abtn"><a href="<?php echo SITEURL;?>admin/category-add.php">Add Category</a></button>
    <table class="table">
        <tr>
            <th>Sr.no</th>
            <th>Title</th>
            <th>Image</th>
            <th>Featured</th>
            <th>Active</th>
            <th>Actions</th>
        </tr>
        <?php
            $sql = "SELECT * FROM category";
            
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
                        $title = $rows['title'];
                        $image_name = $rows['image_name'];
                        $featured = $rows['featured'];
                        $active = $rows['active'];

                ?>
                        <tr>
                            <td><?php echo $sid++; ?></td>
                            <td><?php echo $title; ?></td>

                            <td>
                                <?php
                                    if($image_name != "")
                                    {
                                        ?>
                                        <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name; ?>" width="100px" alt="">
                                        <?php
                                    }
                                    else
                                    {
                                        echo "<div style = 'color:red;'>Image not Available</div>";
                                    }
                                ?>
                            </td>

                            <td><?php echo $featured; ?></td>
                            <td><?php echo $active; ?></td>
                            <td>
                                <a href="<?php echo SITEURL;?>admin/category-update.php?id=<?php echo $id;?>" id="up" class="btn-update">Update Category</a> | 
                                <a href="<?php echo SITEURL;?>admin/category-delete.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name ?>" id="del">Delete Category</a>
                            </td>
                        </tr>
                <?php

                    }
                }
            }
        
        ?>
    </table>
    </div>
</div>

<?php include("partials/footer.php")?>
