<!DOCTYPE html>
<html lang="en">
<?php
require_once('functions/db.php');
session_start();
if (isset($_POST['login'])) {

    $email = $_POST['Email'];
    $password = md5($_POST['Password']);


    $sql = "SELECT * FROM tbl_users WHERE email='$email' AND password ='$password';";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) == 1) {
        $details = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $details['user_id'];
        $_SESSION['email'] = $details['email'];
        $_SESSION['username'] = $details['username'];
        header("Location: home.php");
    }
}

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/register.css">
    <title>LOGIN</title>
</head>

<body>

    <div id="login-form" class="auth-form">
        <img src="./assets/register_person.png" alt="" class="hero-icons">
        <h1 class="form-title">Welcome to back, login</h1>
        <form action="login.php" method="post">

            <label for="Email">Email</label>
            <input type="email" name="Email" placeholder="Enter your email address">

            <label for="Password">Password</label>
            <input type="password" name="Password" class="password-field" placeholder="Enter your password">
            <button type="submit" name="login">Login to your account</button>
            <p>Don't Have an account? <a href="./register.php">Create An Account</a></p>
        </form>

    </div>


</body>

</html>