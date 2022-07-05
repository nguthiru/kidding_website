<!DOCTYPE html>

<?php

require_once('functions/db.php');
if (isset($_POST['register'])) {
    $email = $_POST['Email'];
    $phone = $_POST['Phone'];
    $pass1 = $_POST['Password'];
    $pass2 = $_POST['Password2'];
    $username = $_POST['Username'];
    $gender = $_POST['gender'];
    if (strcmp($pass1,$pass2) == 0) {
        $pass_hash = md5(($pass1));
        $sql = "INSERT INTO tbl_users(username,password,email,phone,gender) VALUES ('$username','$pass_hash','$email','$phone','$gender');";

        $result = mysqli_query($con, $sql);
        echo mysqli_error($con);
        header('Location: login.php');
    }
}   
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/register.css">
    <title>REGISTER</title>
</head>

<body>

    <div id="register-form" class="auth-form">
        <img src="./assets/register_person.png" alt="" class="hero-icons">
        <h1 class="form-title">Welcome to kidding, register</h1>
        <form action="./register.php" method="post">

            <label for="Email">Username</label>
            <input type="text" name="Username" placeholder="Enter your username">
            <label for="Email">Email</label>
            <input type="email" name="Email" placeholder="Enter your email address">
            <label for="gender">Gender</label>
            <select name="gender" id="gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>

            </select>
            <label for="Phone_Number">Phone</label>
            <input type="text" placeholder="Enter your phone number" name="Phone">
            <label for="Password">Password</label>
            <input type="password" name="Password" class="password-field" placeholder="Enter your password">
            <label for="Password2">Confirm Password</label>
            <input type="password" name="Password2" class="password-field" placeholder="Confirm your password">
            <p>By signing up you agree to the <a href="#">Terms & Conditions</a></p>
            <input type="submit" value="Create Account" name="register">
            <p>Have an account? <a href="./login.php">Login</a></p>
        </form>

    </div>


</body>

</html>