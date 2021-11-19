<?php include("./partials-front/menu.php") ?>

      <!-- search bar -->
      <div class="search">
        <form action="<?php echo SITEURL;?>cake-search.php" method="POST">
          <div class="input form-floating mb-3">
            <input type="text" class="" placeholder=" search cake" name="search" />
            <button type="submit" class="btn-primary">Search</button>
          </div>
        </form>
      </div>

      <!-- Cakes -->

      <div class="row crow">
        <h1>Cake's Available</h1>
        <?php
        $sql2 = "SELECT * FROM cakes WHERE active='Yes'";   
        
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
                  <a href="<?php echo SITEURL;?>billing.php?id=<?php echo $id2;?>"><button class="cbtn">Order</button></a>
              </div>

            <?php

          }
        }
        else
        {
          echo "<div class='error'>Cakes not Found</div>";
        }
      
      ?>
        </div>
      </div>

<?php include("./partials-front/footer.php") ?>
