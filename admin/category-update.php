<?php include("./partials/menu.php") ?>
<?php

if(isset($_GET['id']))
{
    $id = $_GET['id'];

    $sql = "SELECT * FROM category WHERE id=$id";
    $res = mysqli_query($con,$sql);

    $count = mysqli_num_rows($res);

    if($count == 1)
    {
     $rows = mysqli_fetch_assoc($res);
     $title = $rows['title'];
     $current_image = $rows['image_name'];
     $featured = $rows["featured"];
     $active = $rows['active'];
    }
    else
    {
        $_SESSION['category-not-found'] = "Category Not Found";
        header("location:".SITEURL.'admin/category.php');
    }
}
else
{
    header("loacation:".SITEURL.'admin/category.php');
}

?>

<div class="main-content">
    <h1>Update Category</h1>
    <div style="color: red;">
        <?php
            if(isset($_SESSION['category-added']))
            {
                echo $_SESSION['category-added'];
                unset($_SESSION['category-added']);
            }
            if(isset($_SESSION['not-upload']))
            {
                echo $_SESSION['not-upload'];
                unset($_SESSION['not-upload']);
            }

        ?>
    </div><br><br>
    <div id="">
    <form action="" method="POST" enctype="multipart/form-data">
        <span>Title:</span>
        <input type="text" name="title" placeholder="Enter category title" value="<?php echo $title ?>"><br><br>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <span>current Image:</span> 
        <?php
            if($current_image != "")
            {
                ?>
                <img src="<?php echo SITEURL;?>images/category/<?php echo $current_image;?>" width="100px"><br><br>
                <?php
            }
            else
            {
                echo "<div style = 'color:red;'>Image not available</div>";
            }
        ?>
        <span>Select New Image:</span>
        <input type="file" name="image"><br><br>
        <span>Featured:</span>
        <span><input <?php if($featured == "Yes"){echo "checked";} ?> type="radio" name="featured" value="Yes">Yes</span>
        <span><input <?php if($featured == "No"){echo "checked";} ?> type="radio" name="featured" value="No">NO</span> <br><br>
        <span>Active:</span>
        <span><input <?php if($active == "Yes"){echo "checked";} ?> type="radio" name="active" value="Yes">Yes</span>
        <span><input <?php if($active == "No"){echo "checked";} ?> type="radio" name="active" value="No">NO </span><br><br>
        <input type="submit" name="submit" value="Update Category" class="Abtn">
        <input type="hidden" name="current_image" value="<?php echo $current_image;?>">
        <input type="hidden" name="id" value="<?php echo $id;?>">

    </form>
    </div>
</div>

<?php
if(isset($_POST['submit']))
{
    $title = $_POST['title'];
    $id2 = $_POST['id'];
    $current_image2 = $_POST['current_image'];
    $featured = $_POST['featured'];
    $active = $_POST['active']; 


    $image_name = $_FILES['image']['name'];

    if($image_name != "")
    {
        if(isset($_FILES['image']['name']))
        {
            

                $ext = end(explode('.' , $image_name));
                $image_name = "cake_category".rand(000,999).'.'.$ext;



                $source_path  = $_FILES['image']['tmp_name'];
                $destination_path = "../images/category/".$image_name;

                $upload = move_uploaded_file($source_path,$destination_path);

                if($upload == false)
                {
                    $_SESSION['not-upload'] = "Image not uploaded";
                    header("location:".SITEURL.'admin/category.php');
                    die();
                }
            }
            if($current_image2 != "")
            {
                $remove_path = "../images/category/".$current_image2;

                $remove = unlink($remove_path);
                
                if($remove == false)
                {
                    $_SESSION['remove-failed'] = "Failed to remove image";
                    header("location:".SITEURL.'admin/category.php');
                    die();
                }
        }
        
    }
    else
    {
        $image_name = $current_image2;
    }


    $sql2 = "UPDATE  category SET
    title = '$title',
    image_name = '$image_name',
    featured = '$featured',
    active = '$active'
    WHERE id = $id2
    ";


    $res2 = mysqli_query($con,$sql2);

    if($res2 == true)
    {
        $_SESSION['category-updated'] = "Category updated succesfully";
        header("location:".SITEURL.'admin/category.php');
    }
    else
    {
        $_SESSION['category-updated'] = "Category update Failed";
        header("location:".SITEURL.'admin/category.php'); 
    }
}

?>

<?php include("./partials/footer.php") ?>