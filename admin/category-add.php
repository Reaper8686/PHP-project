<?php include("./partials/menu.php") ?>

<div class="main-content">
    <h1>Add Category</h1>
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
        <input type="text" name="title" placeholder="Enter category title"><br><br>
        <span>Select Image:</span>
        <input type="file" name="image"><br><br>
        <span>Featured:</span>
        <span><input type="radio" name="featured" value="Yes">Yes</span>
        <span><input type="radio" name="featured" value="No">NO</span> <br><br>
        <span>Active:</span>
        <span><input type="radio" name="active" value="Yes">Yes</span>
        <span><input type="radio" name="active" value="No">NO </span><br><br>
        <input type="submit" name="submit" value="Add Category" class="Abtn">

    </form>
    </div>
</div>

<?php

if(isset($_POST['submit']))
{
    $title = $_POST['title'];

    if(isset($_POST['featured']))
    {
        $featured = $_POST['featured'];
    }
    else
    {
        $featured = "No";
    }

    if(isset($_POST['active']))
    {
        $active = $_POST['active'];
    }
    else
    {
        $active = $_POST = "No";
    }

    if(isset($_FILES['image']['name']))
    {
        $image_name = $_FILES['image']['name'];

        if($image_name != "")
        {

            $ext = end(explode('.',$image_name));
            $image_name = "cake_category".rand(000,999).'.'.$ext;



            $source_path  = $_FILES['image']['tmp_name'];
            $destination_path = "../images/category/".$image_name;

            $upload = move_uploaded_file($source_path,$destination_path);

            if($upload == false)
            {
                $_SESSION['not-upload'] = "Image not uploaded";
                header("location:".SITEURL.'admin/category-add.php');
                die();
            }
        }
    }
    else
    {
        $image_name = "";
    }



    $sql = "INSERT INTO category SET
    title='$title',
    image_name='$image_name',
    featured='$featured',
    active='$active'
    ";

    $res = mysqli_query($con,$sql);

    if($res == true)
    {
        $_SESSION['category-added'] = "Category Added Succesfully!!";
        header("location:".SITEURL.'admin/category.php');
    }
    else
    {
        $_SESSION['category-added'] = "Failed to add category";
        header("location:".SITEURL.'admin/category-add.php');

    }
}

?>

<?php include("./partials/footer.php") ?>