<?php include("./partials-front/menu.php") ?>

        <?php
        $id = $_GET['id'];

        $sql = "SELECT * FROM cakes WHERE id=$id";

        $count = mysqli_num_rows(mysqli_query($con,$sql));

        if($count == 1)
        {
          $rows = mysqli_fetch_assoc(mysqli_query($con,$sql));
          $title = $rows['title'];
          $price = $rows['price'];
          $image_name = $rows['image_name'];
        }
        else
        {
          header("location:".SITEURL);
        }
        ?>

        <div class="container"><br><br>

            <!-- Quantity -->
            <h1>Ordered Cake:</h1>
            <div class="quantity">
                <?php 
                  if($image_name != "")
                  {
                    ?>
                      <img class="img-respansive qimg" src="<?php echo SITEURL?>images/cakes/<?php echo $image_name;?>" alt="">
                    <?php
                  }
                  else
                  {
                    echo "<div class='error'>Image not available</div>";
                  }
                ?>
                <div class="qdesp">
                    <h4><?php echo $title;?></h4>
                    <span>price: <?php echo $price;?>/-</span>
                </div>
            </div>

            <!-- Delivery -->
            <h1 id="h1">Delivery Info</h1>
            <div class="delivery">
                <form action="" method="POST">
                <div class="form-floating mb-3 dform">
                        <input type="hidden" name="title" value="<?php echo $title;?>">
                        <input type="hidden" name="price" value="<?php echo $price;?>">
                        <input type="number" class="form-control" id="floatingInput" placeholder="" name="quantity">
                        <label for="floatingInput">Quantity</label>
                      </div>
                    <div class="form-floating mb-3 dform">
                        <input type="text" class="form-control" id="floatingInput" placeholder="" name="name">
                        <label for="floatingInput">Full name</label>
                      </div>
                      <div class="form-floating mb-3 dform">
                        <input type="number" class="form-control" id="floatingInput" placeholder="" name="phone_no">
                        <label for="floatingInput">Phone Number</label>
                      </div>
                      <div class="form-floating mb-3 dform">
                        <input type="email" class="form-control" id="floatingInput" placeholder="" name="email">
                        <label for="floatingInput">Email address</label>
                      </div>
                      <div class="form-floating dform">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="address"></textarea>
                        <label for="floatingTextarea">Address</label>
                      </div><br>
                      <input type="submit" name="submit" value="Confirm order" class="deliverybtn">
                </form>
                <?php
                    if(isset($_POST['submit']))
                    {
                      $title2 = $_POST['title'];
                      $price2 = $_POST['price'];
                      $quantity = $_POST['quantity'];
                      $name = $_POST['name'];
                      $phone = $_POST['phone_no'];
                      $email = $_POST['email'];
                      $address = $_POST['address'];   
                      $total = $price * $quantity;
                      $date  = date("Y-m-d:i:sa");
                      $status = "ordered";

                      $sql2 = "INSERT INTO jojo SET
                              cake = '$title2',
                              price = $price2,
                              quantity = $quantity,
                              cus_name = '$name',
                              cus_phone = $phone,
                              cus_email = '$email',
                              cus_adds = '$address',
                              total = $total,
                              date = '$date',
                              status = '$status'
                              ";

                      $res2 = mysqli_query($con,$sql2);
                      if($res2 == true)
                      {
                        $_SESSION['order'] = "<div class='bold'>order success</div>";
                        header("location:".SITEURL);
                      }
                      else
                      {
                        $_SESSION['order'] = "<div class='bold'>order failed</div>";
                        header("location:".SITEURL);  
                      }
                    }
                ?>

            </div>
        </div>
        



<?php include("./partials-front/footer.php") ?>



  