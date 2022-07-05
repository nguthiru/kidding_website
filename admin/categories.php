<!DOCTYPE html>
<?php
require("../functions/db.php");
if (isset($_POST['category-form'])) {
    $category_name = $_POST['Category'];

    $sql = "INSERT INTO tbl_categories(category_name) VALUES ('$category_name');";

    $result = mysqli_query($con, $sql);
    echo mysqli_error($con);
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Categories</title>
</head>

<body>
    <?php
    include("navbar.php");
    ?>

    <main>
        <div class="form-box">
            <form action="categories.php" method="post">
                <div class="form-container">
                    <label for="Category">Category Name</label>
                    <input type="text" name="Category" id="" , placeholder="Enter Category name">
                </div>
                <input type="submit" value="Add Category" name="category-form">
            </form>
        </div>
    </main>

</body>

</html>