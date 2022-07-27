<?php
include_once("./functions/db.php");
if(isset($_POST)){
    $order_id = $_POST['order_id'];
    $total = $_POST['total'];

    $sql = "UPDATE tbl_order SET order_status=3, order_amount=$total WHERE order_id=$order_id";
    $result = mysqli_query($con,$sql);
    echo mysqli_error($con);
    header("Location:home.php");
}
?>