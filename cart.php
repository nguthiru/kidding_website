<?php
include_once('./functions/db.php');
ini_set('session.cache_limiter', 'public');
session_cache_limiter(false);
if (isset($_POST['quantity'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    $sql = "UPDATE tbl_orderdetails SET order_quantity='$quantity' WHERE orderdetails_id=$product_id";
    mysqli_query($con, $sql);
    echo mysqli_error($con);
}
if (isset($_POST['delete'])) {
    $product_id = $_POST['product_id'];
    mysqli_query($con, "DELETE FROM tbl_orderdetails WHERE orderdetails_id=$product_id");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/home.css">
    <title>My Cart</title>
</head>

<body>
    <?php
    if (!isset($_SESSION)) {
        session_start();
    }
    include_once("components/navbar_home.php");

    ?>

    <main>
        <h3 id='cart-title'>Your Cart</h3>
        <table id='cart-table'>
            <thead>
                <th></th>
                <th>Image</th>
                <th>Product</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th></th>
            </thead>
            <tbody>
                <?php

                if (!isset($_SESSION['user_id'])) {
                    header("Location:login.php");
                }
                $user_id = $_SESSION['user_id'];


                $sql = "SELECT * FROM tbl_orderdetails INNER JOIN tbl_product ON tbl_orderdetails.product_id=tbl_product.product_id INNER JOIN tbl_order ON tbl_orderdetails.order_id=tbl_order.order_id WHERE order_status=1";
                $result = mysqli_query($con, $sql);
                $counter = 0;
                $total = 0;
                $orderID = null;

                while ($row = mysqli_fetch_assoc($result)) {
                    $counter2 = $counter++;
                    $orderID = $row['order_id'];

                    $cart_image = $row['product_image'];
                    $cart_name = $row['product_name'];
                    $cart_description = $row['product_description'];
                    $cart_price = $row['unit_price'];
                    $quantity = $row['order_quantity'];
                    $sub_total = $quantity * $cart_price;
                    $total = $total + $sub_total;
                    $product_id = $row['orderdetails_id'];
                    echo "
                    <tr>
                    <td id='cart-number' class='caption'>$counter</td>
                    <td><img src='$cart_image' alt=''></td>
                    <td class='cart-name'>$cart_name</td>
                    <td class='cart-description'>$cart_description</td>
                    <td class='cart-price'>$cart_price<small>sh</small></td>
                    <td>
                        <div class='update-quantity'>
                            <form action='cart.php' method='post'>
                                <input type='hidden' value='$product_id' name='product_id'>
                                <input type='text' name='quantity' class='searchbox' value='$quantity'>
                            </form>
                        </div>
                    </td>
                    <td>$sub_total<small>sh</small></td>
                    <td>
                    <div class='update-quantity'>
                        <form action='cart.php' method='post'>
                            <input type='hidden' value='$product_id' name='product_id'>
                        <button type='submit' name='delete' class='warning-btn'>Remove</button>
                        </form>
                    </div>
                </td>

                </tr>
                    
                    ";
                }


                ?>

            </tbody>
        </table>
        <?php
        echo "<p class='cart-total'>Total: <span>$total<small>sh</small></span></p>";

        ?>

            <form action='checkout.php' method='POST'>
                <?php
                echo "<input type='hidden' value='$orderID' name='order_id'>";
                echo "<input type='hidden' value='$total' name='total'>";

                ?>
                <button class='primary-btn' id='checkout-btn' type='submit'>Proceed to checkout</button>
        </form>
    </main>
</body>

</html>