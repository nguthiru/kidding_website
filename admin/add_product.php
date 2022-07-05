<!DOCTYPE html>
<html lang="en">
<?php
require("../functions/db.php");
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Admin Page</title>
</head>

<body>
    <?php
    include("navbar.php");
    ?>
    <main>
        <div class="form-box" style="margin: 1em auto;">
            <h3>Add Product</h3>
            <form action="product.php" method="post" enctype="multipart/form-data">
                <div class="form-container">
                    <label for="product_name">Product</label>
                    <input type="text" name="product_name" placeholder="Enter product name">
                </div>
                <div class="form-container">
                    <label for="product_description">Product Description</label>
                    <textarea name="product_description" placeholder="Enter product description"></textarea>
                </div>
                <div class="form-container">
                    <label for="product_image">Image</label>
                    <input type="file" name="product_image" placeholder="Enter image">
                </div>
                <div class="form-container">
                    <label for="product_price">Price</label>
                    <input type="number" name="product_price" placeholder="Enter product price">
                </div>
                <div class="form-container">
                    <label for="product_category">Category</label>
                    <select name="product_category" id="product_category">

                        <?php
                        $sql = "SELECT * FROM tbl_subcategories INNER JOIN tbl_categories ON tbl_subcategories.category=tbl_categories.category_id;";

                        $result = mysqli_query($con, $sql);

                        while ($row = mysqli_fetch_array($result)) {
                            $category_name = $row['subcategory_name'];
                            $category_id = $row['subcategory_id'];
                            $category = $row['category_name'];

                            echo "
                    <option value='$category_id'> $category_name - $category </option>
                    
                    ";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-container">
                    <label for="product_stock">Available Quantity</label>
                    <input type="number" name="product_stock" id="" placeholder="Items Available in stock">
                </div>

                <input type="submit" value="Add Product" name="add-product">
            </form>
        </div>

    </main>
</body>

</body>

</body>

</html>