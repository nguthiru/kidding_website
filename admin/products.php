<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Your Products</title>
</head>

<body>
    <?php
    include("./navbar.php");
    include("../functions/db.php");
    ?>
    <main>
        <div class="products-table shadow">
            <table >
                <thead>
                    <th>ID</th>
                    <th></th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Available</th>
                </thead>

                <tbody>

                    <?php
                    $sql = "SELECT *FROM tbl_product INNER JOIN tbl_subcategories ON tbl_product.subcategory_id=tbl_subcategories.subcategory_id;";

                    $result = mysqli_query($con, $sql);
                    
                    echo mysqli_error($con);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['product_id'];
                        $name = $row['product_name'];
                        $category = $row['subcategory_name'];
                        $image = $row['product_image'];
                        $price = $row['unit_price'];
                        $quantity = $row['available_quantity'];
                        $sql_category ="SELECT * FROM tbl_categories WHERE category_id=$category";
                        $result2 = mysqli_query($con,$sql_category);
                        echo "
                        <tr>
                        <td class='tbl-product-id'>$id</td>
                        <td><img src='.$image'></td>
                        <td class='tbl-product-name'>$name</td>
                        <td class='caption'>$category</td>
                        <td>$price/=</td>
                        <td>$quantity</td>
                        <td>
                            <div class='icons'>
                                <a href='product_detail.php?id=$id'><i class='fa-solid fa-square-pen'></i></a>
                                <i class='fa fa-trash' aria-hidden='true'></i>

                            </div>

                        </td>
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