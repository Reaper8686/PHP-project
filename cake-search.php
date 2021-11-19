<?php include("partials-front/menu.php")?>

<?php 
    $search = $_POST['search'];
?>
<br><br>
<h3>Result for search"<span class="bold" ><?php echo $search;?></span>"</h3>
<br><br><br>
<div class="row crow">
        <?php
    if($search != ""){
        $sql = "SELECT * FROM cakes WHERE title LIKE '%$search%' or description LIKE '%$search%'";   
        
        $res = mysqli_query($con,$sql);

        $count = mysqli_num_rows($res);
        if($count > 0)
        {
          while($rows = mysqli_fetch_assoc($res))
          {
            $id = $rows['id'];
            $title = $rows['title'];
            $image_name = $rows['image_name'];
            $price = $rows['price'];
            $description = $rows  ['description'];

            ?>    
              <div class="col-lg-4 col-sm-12  corder">
                <?php
                  if($image_name!="")
                  {
                    ?>
                      <a href=""><img class="img-responsive img-curve cimg" src="<?php echo SITEURL;?>images/cakes/<?php echo $image_name;?>" alt="" /></a>
                    <?php
                  }
                  else
                  {
                    echo "<div class='error'>Image not found</div>";
                  }
                ?>

                  <h3><?php echo $title;?></h3>  
                  <p>
                    <?php echo $description;?>
                  </p>
                  <p id="price" class="bold">price: <?php echo $price;?>/-</p>
                  <a href="<?php echo SITEURL;?>billing.php?id=<?php echo $id;?>"><button class="cbtn">Order</button></a>
              </div>

            <?php

          }
        }
        else
        {
          echo "<div class='error'>Not Matching Search</div>";
        }
    }
    else
    {
        echo "<div class='error'>Not Matching Search</div>";
    }
      
      ?>
        </div>
      </div>

<?php include("partials-front/footer.php")?>
