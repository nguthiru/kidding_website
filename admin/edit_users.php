<?php 
include_once("../functions/db.php");
if(isset($_POST['edit-user'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone'];
    $admin = null;
    $id = $_POST['id'];
    if(isset($_POST['admin'])){
        $admin = 1;
    }
    else{
        $admin = 0;
    }

    $sql = "UPDATE tbl_users SET username='$username',email='$email',phone='$phone_number',is_admin=$admin WHERE user_id=$id;";
    mysqli_query($con,$sql);
    echo mysqli_error($con);

    header("Location:view_users.php");

}

?>