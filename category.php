<?php include("./partials-front/menu.php") ?>

      <!-- search bar -->
      <div class="search">
          <form action="<?php echo SITEURL;?>category-search.php" method="POST">
            <div class="input form-floating mb-3">
                <input type="text" class="" placeholder=" search cake" name="search">
                <button type="submit" class="btn-primary">Search</button>
              </div>
          </form>
      </div>

          <!-- category -->
          <div class="category">
        <h2>Category's</h2>
        <hr />
        <?php
          $sql = "SELECT * FROM category WHERE active='Yes'";

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
            echo "<div class='error'>No Category Found</div>";
          }
        ?>
      </div>            
    

<?php include("./partials-front/footer.php") ?>

