<?php include("partials-front/menu.php")?>

<?php 
    $search = $_POST['search'];
?>
<br><br>
<h3>Result for search"<span class="bold"><?php echo $search;?></span>"</h3>
<br><br><br>
<div class="category">
        <?php
        if($search !=""){
          $sql = "SELECT * FROM category WHERE title LIKE '%$search%' and active='Yes'";

          $res = mysqli_query($con,$sql);

          $count = mysqli_num_rows($res);

          if($count > 0)
          {
            while($rows = mysqli_fetch_assoc($res))
            {
              $id = $rows['id'];
              $title = $rows['title'];
              $image_name = $rows['image_name'];

            
              ?>
                <div class="cat-items">
                  <?php
                    if($image_name!="")
                    {
                        ?>
                          <a href="<?php echo SITEURL;?>searchby-category.php?id=<?php echo $id;?>"><img width="700px" class="img-fluid" src="<?php SITEURL;?>images/category/<?php echo $image_name;?>" alt=""/></a>
                        <?php
                    }
                    else
                    {
                      echo "<div class='error'>Image Not Available</div>";
                    }
                  ?>
                  <a href="<?php echo SITEURL;?>searchby-category.php?id=<?php echo $id;?>"><h3><?php echo $title;?></h3></a>
                </div>
              <?php
            }
          }
          else
          {
            echo "<div class='error'>Not found matching search</div>";
          }
        }
        else
        {
            echo "<div class='error'>Not found matching search</div>";

        }
        ?>
        
      </div>            

<?php include("partials-front/footer.php")?>
