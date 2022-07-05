<?php

require("../functions/db.php");

$sql = "SELECT * FROM  tbl_users;";

$result = mysqli_query($con,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Users</title>
</head>
<body>
    <table>
        <tr>
            <th>User id</th>
            <th>Email Address</th>
            <th>Username</th>
            <th>Gender</th>
            <th>Role</th>
            <th>Phone Number</th>
        </tr>

        <tbody>
            <?php
            while($row = mysqli_fetch_assoc($result)){
                $email = $row['email'];
                $username = $row['username'];
                $user_id = $row['user_id'];
                $gender = $row['gender'];
                $role = $row['role'];
                $phone = $row['phone'];
                echo "<tr>
                <td>$user_id</td>
                <td>$email</td>
                <td>$username</td>
                <td>$gender</td>
                <td>$role</td>
                <td>$phone</td>
                </tr>
                ";
            }
            ?>
        </tbody>
    </table>
</body>
</html>