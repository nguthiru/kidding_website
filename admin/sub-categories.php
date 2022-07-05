<!DOCTYPE html>
<html lang="en">

<?php
    require("../functions/db.php");
if(isset($_POST['sub-category-form'])){

    $cat_id = $_POST['category'];
    $sub_name = $_POST['sub-category'];
    $sql = "INSERT INTO tbl_subcategories(category,subcategory_name) VALUES ('$cat_id','$sub_name');";

    $result = mysqli_query($con,$sql);
    echo mysqli_error($con);

}
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Subcategories</title>
</head>

<body>
    <?php
    include("navbar.php");
    ?>

    <main>
        <div class="form-box">
            <h4>Add Sub-category</h4>
            <form action="sub-categories.php" method="post">

                <label for="Category">Category</label>
                <select name="category" id="">

                    <?php
                    $sql = "SELECT * FROM tbl_categories;";

                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($result)) {

                        $category_name = $row['category_name'];
                        $category_id = $row['category_id'];

                        echo "
                
                <option value='$category_id'> $category_name </option>
                ";
                    }

                    ?>
                </select>


                <div class="form-container">
                    <label for="Sub-category name">Sub-category name</label>
                    <input type="text" name="sub-category" id="">
                </div>
                <input type="submit" value="Add Sub-category" name="sub-category-form">
            </form>

    </main>
</body>

</html>