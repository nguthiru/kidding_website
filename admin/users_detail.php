<?php

include("../functions/db.php");
$id = $_GET['id'];

$sql = "SELECT * FROM tbl_users WHERE user_id=$id";
$result = mysqli_query($con, $sql);
$user = mysqli_fetch_assoc($result);
$username = $user['username'];



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">

    <?php

    echo "<title>$username</title>";

    ?>
</head>

<body>
    <?php
    include("navbar.php");
    ?>
    <main>
        <div class="form-box" style="margin: 1em auto;">
            <h3>Edit Users</h3>
            <?php
            $email = $user['email'];
            $isAdmin = $user['is_admin'];
            $phone = $user['phone'];
            $id = $_GET['id'];

            echo "
        <form action='edit_users.php' method='post' enctype='multipart/form-data'>
        <input value='$id' name='id' type='hidden'>
            <div class='form-container'>
                <label for='product_name'>Username</label>
                <input type='text' name='username' placeholder='Username' value='$username'>
            </div>
            <div class='form-container'>
                <label for='product_name'>Email</label>
                <input type='text' name='email' placeholder='Email Address' value='$email'>
            </div>
       
            
           
            <div class='form-container'>
                <label for='product_price'>Phone Number</label>
                <input type='number' name='phone' placeholder='Phone Number' value='$phone'>
            </div>
            
            <div class='form-container'>
                <label for='product_stock'>Admin</label>
                <input type='checkbox' name='admin' value=$isAdmin>
            </div>

            <input type='submit' value='Edit User' name='edit-user'>
        </form>
";
            ?>
        </div>
    </main>
</body>

</html>