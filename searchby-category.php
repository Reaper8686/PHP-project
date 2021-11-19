<?php include("partials-front/menu.php")?>

<?php  
    $category = $_GET['id'];
    $sql3 = "SELECT title FROM category WHERE id='$category'";
    $rows3 = mysqli_fetch_assoc(mysqli_query($con,$sql3));

    $category_title3 = $rows3['title'];
?>

<div class="row crow">
        <h1><?php echo $category_title3;?> Cake's</h1>
        <?php
        $sql2 = "SELECT * FROM cakes WHERE category_id='$category' AND active='Yes'";   
        
        $res2 = mysqli_query($con,$sql2);

        $count2 = mysqli_num_rows($res2);
        if($count2 > 0)
        {
          while($rows2 = mysqli_fetch_assoc($res2))
          {
            $id2 = $rows2['id'];
            $title2 = $rows2['title'];
            $image_name2 = $rows2['image_name'];
            $price2 = $rows2['price'];
            $description2 = $rows2  ['description'];

            ?>    
              <div class="col-lg-4 col-sm-12  corder">
                <?php
                  if($image_name2!="")
                  {
                    ?>
                      <a href=""><img class="img-responsive img-curve cimg" src="<?php echo SITEURL;?>images/cakes/<?php echo $image_name2;?>" alt="" /></a>
                    <?php
                  }
                  else
                  {
                    echo "<div class='error'>Image not found</div>";
                  }
                ?>

                  <h3><?php echo $title2;?></h3>  
                  <p>
                    <?php echo $description2;?>
                  </p>
                  <p id="price" class="bold">price: <?php echo $price2;?>/-</p>
                  <button class="cbtn"><a href="<?php echo SITEURL;?>cakes.php">Order</a></button>
              </div>

            <?php

          }
        }
        else
        {
          echo "<div class='error'> $category_title3 Cake Sold Out!😥</div>";
        }
      
      ?>
        </div>
      </div>

<?php include("partials-front/footer.php")?>
