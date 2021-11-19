<?php include("../config/config.php")?>

<?php
if(isset($_GET['id']))
{
    $id = $_GET['id'];

    $sql = "DELETE FROM jojo WHERE id=$id";

    $res = mysqli_query($con,$sql);
    if($res == true)
    {
        $_SESSION['order-deleted'] = "<div style='color:green;'>Order Deleted Succesfully</div>";
        header("location:".SITEURL.'admin/order.php');
    }
    else
    {
        $_SESSION['order-deleted'] = "<div style='color:red;'>Failed to Deleted Order</div>";
        header("location:".SITEURL.'admin/order.php');
    }
}
else
{
    header("location:".SITEURL.'admin/order.php');
}

?>