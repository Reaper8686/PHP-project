<?php include("./partials/menu.php") ?>

<div class="main-content">
    <h1>Add Cake's</h1>
    <div style="color: red;">
        <?php
            if(isset($_SESSION['cake-image-not-upload']))
            {
                echo $_SESSION['cake-image-not-upload'];
                unset($_SESSION['cake-image-not-upload']);
            }
            if(isset($_SESSION['cake-added']))
            {
                echo $_SESSION['cake-added'];
                unset($_SESSION['cake-added']);
            }
        ?>    
    </div><br><br>
    <div style="color: green;">
        <?php

        ?>    
    </div>
    <form action="" class="" method="Post" enctype="multipart/form-data">
        <span>Title:</span>
        <input type="text" name="title" placeholder="Enter cake title"><br><br>
        <span>Description:</span>
        <textarea name="desp" id="" cols="30" rows="5" placeholder="Enter cake description"></textarea><br><br>
        <span>Price:</span>
        <input type="number" name="price" placeholder="Enter cake price"><br><br>
        <span>Select image:</span>
        <input type="file" name="image"><br><br>
        <span>Select Category:</span>
        <select name="category" id="">

            <?php
                $sql = "SELECT * FROM category WHERE active = 'Yes'";

                $res = mysqli_query($con,$sql);

                $count = mysqli_num_rows($res);
                if($count > 0)
                {
                    while($rows = mysqli_fetch_assoc($res))
                    {
                        $id = $rows['id'];
                        $title = $rows['title'];
                        ?>
                        <option value="<?php echo $id;?>"><?php echo $title;?></option>
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
        <input type="radio" value="Yes" name="featured">Yes
        <input type="radio" value="No" name="featured">No <br><br>
        <span>Active:</span>
        <input type="radio" value="Yes" name="active">Yes
        <input type="radio" value="No" name="active">No <br><br> 
        <input type="submit" name="submit" value="Add Cake" class="Abtn">
    </form>
</div>

<?php
    if(isset($_POST['submit']))
    {
        $title = $_POST['title'];
        $description = $_POST['desp'];
        $price = $_POST['price'];
        $category = $_POST['category'];


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
            $active = "No";
        }


        if(isset($_FILES['image']['name']))
        {
            $image_name = $_FILES['image']['name'];

            if($image_name!="")
            {
                $ext = end(explode('.',$image_name));
                $image_name = "cake_name".rand(0000,9999).'.'.$ext;


                $src = $_FILES['image']['tmp_name'];
                $dst = "../images/cakes/".$image_name;
                $upload = move_uploaded_file($src,$dst);

                if($upload == false)
                {
                    $_SESSION['cake-image-not-upload'] = "failed to upload image";
                    header("location:".SITEURL.'admin/cakes-add.php');
                    die();
                }
            }
            else
            {

            }
        }
        else
        {
            $image_name = "";
        }

        $sql2 = "INSERT INTO cakes SET
        title = '$title',
        description = '$description',
        price = $price,
        image_name = '$image_name',
        category_id = $category,
        featured = '$featured',
        active = '$active'
        ";

        $res2 = mysqli_query($con,$sql2);
        if($res = true)
        {
            $_SESSION['cake-added'] = "Cake Added Succwsfully";
            header("location:".SITEURL.'admin/cakes.php');
        }
        else
        {
            $_SESSION['cake-added'] = "Failed to Add Cake";
            header("location:".SITEURL.'admin/cakes-add.php');
        }
    }

?>

<?php include("./partials/footer.php") ?>
