<?php include("partials/menu.php")?>

<!-- main-content -->
<div class="main-content">
    <div>
    <h1>Manage Order</h1>
    <!-- <button class="Abtn">Add Order</button> -->
    <?php
        if(isset($_SESSION['order-deleted']))
        {
            echo $_SESSION['order-deleted'];
            unset($_SESSION['order-deleted']);
        }
        if(isset($_SESSION['order-updated']))
        {
            echo $_SESSION['order-updated'];
            unset($_SESSION['order-updated']);
        }
    ?>
    <table class="table">
        <tr>
            <th>Sr.no</th>
            <th>Cake</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Name</th>
            <th>Phone no.</th>
            <th>Email</th>
            <th>Address</th>
            <th>Total</th>
            <th>Date</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        <?php
            $sql = "SELECT * FROM jojo ORDER BY id DESC";

            $res = mysqli_query($con,$sql);
            $count = mysqli_num_rows($res);
            $sid = 1;
            if($count > 0)
            {
                while($rows = mysqli_fetch_assoc($res))
                {
                        $id = $rows['id'];
                        $title = $rows['cake'];
                        $price = $rows['price'];
                        $quantity = $rows['quantity'];
                        $name = $rows['cus_name'];
                        $phone = $rows['cus_phone'];
                        $email = $rows['cus_email'];
                        $address = $rows['cus_adds'];
                        $total = $rows['total'];
                        $date = $rows['date'];
                        $status = $rows['status'];
                        ?>
                            <tr>
                                <td><?php echo $sid++;?></td>
                                <td><?php echo $title;?></td>
                                <td><?php echo $quantity;?></td>
                                <td><?php echo $price;?></td>
                                <td><?php echo $name;?></td>
                                <td><?php echo $phone;?></td>
                                <td><?php echo $email;?></td>
                                <td><?php echo $address;?></td>
                                <td><?php echo $total;?></td>
                                <td><?php echo $date;?></td>
                                <td><?php echo $status;?></td>
                                <td>
                                    <a href="<?php echo SITEURL;?>admin/order-update.php?id=<?php echo $id;?>" id="up" class="btn-update">Update Order</a> | 
                                    <a href="<?php echo SITEURL;?>admin/order-delete.php?id=<?php echo $id;?>" id="del">Delete Order</a>
                                </td>
                            </tr>
                        <?php
                }
            }
            else
            {
                echo "<tr><td>Order not available</td></tr>";
            }
        ?>
    </table>
    </div>
</div>

<?php include("partials/footer.php")?>
