<?php

function getProducts($id){
    include("db.php");
    include_once("add_cart.php");
    $sql = "SELECT *FROM tbl_product INNER JOIN tbl_subcategories ON tbl_product.subcategory_id=tbl_subcategories.subcategory_id WHERE category=$id;";

    $result = mysqli_query($con, $sql);
    echo mysqli_error($con);
    while ($row = mysqli_fetch_assoc($result)) {
        $img_url = $row['product_image'];
        $product_name = $row['product_name'];
        $product_id = $row['product_id'];
        $product_price = $row['unit_price'];
        $subcategory_name = $row['subcategory_name'];

        echo "
            <div class='product-card'>
            <img src='$img_url' alt=''>
            <div class='row'>
            <div class='product-card-details'>
            <p class='product-gender'>
                $subcategory_name
            </p>
            <p class='product-name'>$product_name</p>
            <p class='product-price'>$product_price<small>sh</small></p>
            </div>
            <form action='functions/add_cart.php'>
            <input type='hidden' value ='$product_id' name='id'>
            <button type='submit'>
            <div class='icon'>

            <i class='fa fa-cart-plus' aria-hidden='true'></i>
                        </div>

            </button>
            </form>

            </div>
            
            </div>
            ";
    }
}
