<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Orders</title>
</head>

<body>
    <?php
    include("navbar.php");
    include("../functions/db.php");
    ?>

    <main>
        <div class="orders-table shadow">
            <table>
                <thead>
                    <th>Order-id</th>
                    <th>Ordered Date</th>
                    <th>Customer Name</th>
                    <th></th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM tbl_orderdetails INNER JOIN tbl_product ON tbl_orderdetails.product_id=tbl_product.product_id INNER JOIN tbl_order ON tbl_orderdetails.order_id=tbl_order.order_id INNER JOIN tbl_users ON tbl_users.user_id=tbl_order.customer_id WHERE order_status!=1;";
                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $order_id = $row['order_id'];
                        $order_date = $row['updated_at'];
                        $date_ordered = date_create($order_date);
                        $date_ordered = date_format($date_ordered, "d-M-Y");
                        $pro_img = $row['product_image'];
                        $customer = $row['username'];
                        $product = $row['product_name'];
                        $quantity = $row['order_quantity'];
                        $subtotal = $quantity * $row['unit_price'];
                        $amount = $row['order_amount'];
                        echo "
                        <tr>
                        <td class='tbl-product-id'>$order_id</td>
                        <td class='tbl-product-id'>$date_ordered</td>
                        <td class='tbl-product-name'>$customer</td>
                        <td><img src='.$pro_img'></td>
                        <td class='tbl-product-name'>$product</td>
                        <td class='caption'>$quantity</td>
                        <td>$subtotal/=</td>
                        
                    </tr>
                        ";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>