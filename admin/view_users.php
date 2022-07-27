<?php

require("../functions/db.php");

$sql = "SELECT * FROM  tbl_users;";

$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>View Users</title>
</head>

<body>
    <?php
    include("navbar.php");
    ?>
    <main>
        <div class="products-table shadow">
            <table>
                <tr>
                    <th>User id</th>
                    <th>Email Address</th>
                    <th>Username</th>
                    <th>Admin</th>
                    <th>Phone Number</th>
                </tr>

                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        $email = $row['email'];
                        $username = $row['username'];
                        $user_id = $row['user_id'];
                        $admin = $row['is_admin']==0?"Regular":"Admin";
                        $role = $row['role'];
                        
                        $phone = $row['phone'];
                        echo "<tr>
                <td>$user_id</td>
                <td>$email</td>
                <td>$username</td>
                <td>$admin</td>
                <td>$phone</td>
                <td>
                    <div class='icons'>
                        <a href='users_detail.php?id=$user_id'><i class='fa-solid fa-square-pen'></i></a>
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