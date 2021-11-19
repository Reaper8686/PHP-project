
<?php include("./partials-front/menu.php") ?>
      <!-- category -->
      <div class="category">
        <div>
          <h2>
            <?php
              if(isset($_SESSION['order']))
              {
                echo $_SESSION['order'];
                unset($_SESSION['order']);
              }
            ?>
        </h2>
        </div><br><br>
        <h2>Category's</h2>
        <hr />
        <?php
          $sql = "SELECT * FROM category WHERE active='Yes' AND featured='Yes'";

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
                          <a href="<?php echo SITEURL;?>searchby-category.php?id=<?php echo $id;?>"><img width="700px" class="img-fluid" src="<?php echo SITEURL;?>images/category/<?php echo $image_name;?>" alt=""/></a>
                        <?php
                    }
                    else
                    {
                      echo "<div class='error'>Image Not Available</div>";
                    }
                  ?>
                  <a href="<?php echo SITEURL;?>searchby-category.php?id=<?php echo $id;?>"><h3><span><?php echo $title;?></span></h3></a>
                </div>
              <?php
            }
          }
          else
          {
            echo "<div class='error'>No Category Found</div>";
          }
        ?>
      </div>
      <hr />

      <!-- Cakes -->
      <div class="row crow">
      <h1>Cake's Available</h1>
      <?php
        $sql2 = "SELECT * FROM cakes WHERE active='Yes' AND featured='Yes' LIMIT 6";   
        
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

<!-- img-responsive img-curve cimg -->
