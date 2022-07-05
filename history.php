<?php
require('./functions/db.php');
require('./functions/home_section.php');
ini_set('session.cache_limiter', 'public');
session_cache_limiter(false);
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>History</title>
</head>

<body>
    <?php
    include_once("components/navbar_home.php");

    ?>
    <main>
        <table id='cart-table'>
            <thead>
                <th style="text-align:center;">Date of purchase</th>
                <th></th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </thead>
            <tbody>
                <?php
                $user_id = $_SESSION['user_id'];
                $sql = "SELECT * FROM tbl_order WHERE customer_id=$user_id AND order_status!=1";
                $result = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $order_id = $row['order_id'];
                    $date_ordered = $row['updated_at'];
                    $date_ordered = date_create($date_ordered);
                    $date_ordered = date_format($date_ordered,"d-M-Y");
                    $sql = "SELECT * FROM tbl_orderdetails INNER JOIN tbl_product ON tbl_orderdetails.product_id=tbl_product.product_id WHERE order_id=$order_id";
                    $query = mysqli_query($con, $sql);
                    $total = 0;
                    while ($row2 = mysqli_fetch_assoc($query)) {
                        $cart_image = $row2['product_image'];
                        $cart_name = $row2['product_name'];
                        $cart_description = $row2['product_description'];
                        $cart_price = $row2['unit_price'];
                        $quantity = $row2['order_quantity'];
                        $sub_total = $quantity * $cart_price;
                        $total = $total + $sub_total;
                        $product_id = $row2['orderdetails_id'];
                        echo "
                        <tr>
                        <td id='cart-number' class='caption'>$date_ordered</td>
                        <td><img src='$cart_image' alt=''></td>
                        <td class='cart-name'>$cart_name</td>
                        <td class='cart-price'>$cart_price<small>sh</small></td>
                        <td class='cart-quantity'>$quantity<small>sh</small></td>
                        
                        <td>$sub_total<small>sh</small></td>
                        
                        
                
    
                    </tr>
                        
                        ";
                    }
                }
                ?>
            </tbody>
        </table>
    </main>
</body>

</html>