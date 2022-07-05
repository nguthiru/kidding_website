<?php

require("../functions/db.php");
$name = $_POST['product_name'];
$description = $_POST['product_description'];
$price = $_POST['product_price'];
$category = $_POST['product_category'];
$stock = $_POST['product_stock'];
if(isset($_FILES)){
    $image_dir = './images/';
    $temp_file = $_FILES['product_image']['tmp_name'];
    $uploaded_name = $_FILES['product_image']['name'];
    $directory = "C:/xampp/htdocs/kids_store/images/".$uploaded_name;
    $to_upload = $image_dir .$uploaded_name;
    $moved = move_uploaded_file($temp_file,$directory);

    if($moved){
    $sql = "INSERT INTO tbl_product(product_name,product_description,product_image,unit_price,available_quantity,subcategory_id) VALUES ('$name','$description','$to_upload','$price','$stock','$category')";
    $result = mysqli_query($con,$sql);
    echo mysqli_error($con);

    header("Location:add_product.php");
    }
}

?>