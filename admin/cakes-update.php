<?php include("./partials/menu.php");?>

<?php
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];

        $sql2 = "SELECT * FROM cakes WHERE id = $id";

        $res2 = mysqli_query($con,$sql2);

        $row = mysqli_fetch_assoc($res2);
        $title = $row['title'];
        $description = $row['description'];
        $price = $row['price'];
        $current_category =$row['category_id'];
        $current_image = $row['image_name'];
        $featured = $row['featured'];
        $active = $row['active'];

    }
    else
    {
        header("location:".SITEURL.'admin/cakes.php');
    }


?>

<div class="main-content">
    <h1>Update Cake</h1>
    <div style="color: red;">
        <?php
        ?>    
    </div><br><br>
    <div style="color: green;">
        <?php

        ?>    
    </div>
    <form action="" class="" method="Post" enctype="multipart/form-data">
        <span>Title:</span>
        <input type="text" name="title" placeholder="Enter cake title" value="<?php echo $title;?>"><br><br>
        <span>Description:</span>
        <textarea name="desp" id="" cols="30" rows="5" placeholder="Enter cake description"><?php echo $description;?></textarea><br><br>
        <span>Price:</span>
        <input type="number" name="price" placeholder="Enter cake price" value="<?php echo $price;?>"><br><br>
        <span>Current image:</span>
        <?php
            if($current_image == "")
            {
                echo "<div style='color:red;'>Image not Available</div>";
            }
            else
            {
                ?>
                    <img src="<?php echo SITEURL;?>/images/cakes/<?php echo $current_image;?>" width="100px" alt="">
                <?php
            }
        ?>
        <br><br>
        <span>Select new image:</span>
        <input type="file" name="image"><br><br>
        <span>Select New Category:</span>
        <select name="category" id="">

            <?php
                $sql = "SELECT * FROM category WHERE active = 'Yes'";

                $res = mysqli_query($con,$sql);

                $count = mysqli_num_rows($res);
                if($count > 0)
                {
                    while($rows = mysqli_fetch_assoc($res))
                    {
                        $category_id = $rows['id'];
                        $title = $rows['title'];
                        ?>
                        <option <?php if($current_category==$category_id){echo "selected";} ?> value="<?php echo $category_id;?>"><?php echo $title;?></option>
                        <?php
                    }
                }
                else
                {
                    ?>
                    <option value="0">No Category Found</option>
                    <?php
                }
            ?>
        </select><br><br>
        <span>Featured:</span>
        <input <?php if($featured == "Yes"){ echo "checked"; } ?> type="radio" value="Yes" name="featured">Yes
        <input <?php if($featured == "No"){ echo "checked"; } ?> type="radio" value="No" name="featured">No <br><br>
        <span>Active:</span>
        <input <?php if($active == "Yes"){ echo "checked"; } ?> type="radio" value="Yes" name="active">Yes
        <input <?php if($active == "No"){ echo "checked"; } ?> type="radio" value="No" name="active">No <br><br> 
        <input type="submit" name="submit" value="Update Cake" class="Abtn">
    </form>
</div>

<?php 
    if(isset($_POST['submit']))
    {
        $title2 = $_POST['title'];
        $description2 = $_POST['desp'];
        $price2 = $_POST['price'];
        $category2 = $_POST['category'];
        $featured2 = $_POST['featured'];
        $active2 = $_POST['active'];

        $image_name = $_FILES['image']['name'];

        if($image_name != "")
        {
        if(isset($_FILES['image']['name']))
        {


                $ext = end(explode('.',$image_name));
                $image_name = "cake_name".rand(0000,9999).'.'.$ext;

                $src = $_FILES['image']['tmp_name'];
                $des = "../images/cakes/".$image_name;

                $upload = move_uploaded_file($src,$des);
                if($upload == false)
                {
                    $_SESSION['image-not-uploaded'] = "image failed to update";
                    header("location:".SITEURL.'admin/cakes.php');
                    die();
                }
                if($current_image != "")
                {
                    $remove_path = "../images/cakes/".$current_image;
                    $remove = unlink($remove_path);
                    
                    if($remove == false)
                    {
                        $_SESSION['current-image failed'] = "Failed to remove current image";
                        header("location:".SITEURL.'admin/cakes.php');
                        die();
                    }
                }
            }

        }
        else
        {
            $image_name = $current_image;
        }

        $sql2 = "UPDATE cakes SET
            title = '$title2',
            description = '$description2',
            price = '$price2',
            image_name = '$image_name',
            category_id = $category2,
            featured = '$featured2',
            active = '$active2'
            WHERE id = $id
        ";

        $res2 = mysqli_query($con,$sql2);

        if($res2 == true)
        {
            $_SESSION['category-updated'] = "Cake Updated Succesfully";
            header("location:".SITEURL.'admin/cakes.php');
        }
        else
        {
            $_SESSION['category-updated'] = "Cake Failed to Update";
            header("location:".SITEURL.'admin/cakes.php');
        }

    }

?>

<?php include("./partials/footer.php");?>
