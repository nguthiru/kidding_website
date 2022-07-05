<?php

include("../functions/db.php");
$id = $_GET['id'];

$sql = "SELECT * FROM tbl_product WHERE product_id=$id";
$result = mysqli_query($con, $sql);
$product = mysqli_fetch_assoc($result);
$product_name = $product['product_name'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php

    echo "<title>$product_name</title>";
    
    ?>
</head>

<body>
    <div class="form-box" style="margin: 1em auto;">
        <h3>Add Product</h3>
        <?php 
        $product_description = $product['product_description'];
        $product_image = $product['product_image'];
        $unit_price = $product['unit_price'];
        $stock = $product['available_quantity'];        

        echo "
        <form action='product.php' method='post' enctype='multipart/form-data'>
            <div class='form-container'>
                <label for='product_name'>Product</label>
                <input type='text' name='product_name' placeholder='Enter product name' value='$product_name'>
            </div>
            <div class='form-container'>
                <label for='product_description'>Product Description</label>
                <textarea name='product_description' placeholder='Enter product description' value='$product_description'></textarea>
            </div>
            <div class='form-container'>
                <label for='product_image'>Image</label>
                <input type='file' name='product_image' placeholder='Enter image' value='$product_image'>
            </div>
            <div class='form-container'>
                <label for='product_price'>Price</label>
                <input type='number' name='product_price' placeholder='Enter product price' value='$unit_price'>
            </div>
            
            <div class='form-container'>
                <label for='product_stock'>Available Quantity</label>
                <input type='number' name='product_stock' id='' placeholder='Items Available in stock'>
            </div>

            <input type='submit' value='Add Product' name='add-product'>
        </form>
";
        ?>
    </div>

</body>

</html>