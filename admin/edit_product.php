<?php
include("../functions/db.php");
if (isset($_POST['edit-product'])) {
    $product_name = $_POST['product_name'];
    $id = $_POST['id'];
    $product_description = $_POST['product_description'];
    $price = $_POST['product_price'];
    $stock = $_POST['product_stock'];
    if ($_FILES['product_image']['size']!=0) {

        $image_dir = './images/';
        $temp_file = $_FILES['product_image']['tmp_name'];
        $uploaded_name = $_FILES['product_image']['name'];
        $directory = "C:/xampp/htdocs/kids_store/images/" . $uploaded_name;
        $to_upload = $image_dir . $uploaded_name;
        $moved = move_uploaded_file($temp_file, $directory);

        if ($moved) {
            $sql = "UPDATE tbl_product SET product_name='$product_name',product_name='$product_description',unit_price=$price,available_quantity=$stock,product_image=$to_upload, WHERE product_id=$id";
            $result = mysqli_query($con, $sql);
            echo mysqli_error($con);

            header("Location:add_product.php");
        }
    }
    else {

        $sql = "UPDATE tbl_product SET product_name='$product_name',product_description='$product_description',unit_price=$price,available_quantity=$stock WHERE product_id=$id";
        $result = mysqli_query($con, $sql);
        echo mysqli_error($con);

        header("Location:product_detail.php");
    }
}
