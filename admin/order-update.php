<?php include("./partials/menu.php")?>

<div class="main-content">
    <h1>Update Order</h1><br><br>
    <?php
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];

            $sql = "SELECT * FROM jojo WHERE id=$id";
            $rows = mysqli_fetch_assoc(mysqli_query($con,$sql));

            $title = $rows['cake'];
            $quantity = $rows['quantity'];
            $price = $rows['price'];
            $name = $rows['cus_name'];
            $email = $rows['cus_email'];
            $address = $rows['cus_adds'];
        }
        else
        {
            header("location:".SITEURL.'admin/order.php');
        }
    ?>
    <form action="" method="POST">
        <span>Cake Name: </span><span style="font-weight: bold; "><?php echo $title;?></span><br><br>
        <span>Cake price: </span><span style="font-weight: bold;"><?php echo $price;?></span><br><br>
        <span>Quantity:</span>
        <input type="text" name="quantity" value="<?php echo $quantity;?>"><br><br>
        <span>Status</span>
        <select name="status">
            <option value="ordered">Ordered</option>
            <option value="On Delivery">On Delivery</option>
            <option value="Delivered">Delivered</option>
            <option value="Cancelled">Cancelled</option>
        </select><br><br>
        <span>Customer Name:</span>
        <input type="text" name="cus_name" value="<?php echo $name;?>"><br><br>
        <span>Customer Email:</span>
        <input type="email" name="cus_email" value="<?php echo $email;?>"><br><br>
        <span>Customer Address</span>
        <textarea name="cus_adds" id="" cols="30" rows="8"><?php echo $address;?></textarea><br><br>
        <input type="submit" name="submit" value="Update Order" class="Abtn">
    </form>
    <?php
        if(isset($_POST['submit']))
        {
            $quantity2 = $_POST['quantity']; 
            $total = $price * $quantity2;
            $name2 = $_POST['cus_name']; 
            $email2 = $_POST['cus_email'];
            $address2 = $_POST['cus_adds'];
            $status = $_POST['status'];
            
            $sql2 = "UPDATE jojo SET
                    quantity = $quantity2,
                    total = $total,
                    status = '$status',
                    cus_name = '$name2',
                    cus_email = '$email2',
                    cus_adds = '$address2'
                    WHERE id=$id
            ";
            $res2 = mysqli_query($con,$sql2);
            if($res2 == true)
            {
                $_SESSION['order-updated'] = "<div style='color:green;'>Order Updated</div>";
                header("location:".SITEURL.'admin/order.php');
            }
            else
            {
                $_SESSION['order-updated'] = "<div style='color:red;'>Failed to Update Order</div>";
                header("location:".SITEURL.'admin/order.php');
            }
        }
    ?>
</div>

<?php include("./partials/footer.php")?>
