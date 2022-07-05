<?php
include("db.php");
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

function addProduct($id,$orderID){
    global $con;
    $sql = "INSERT INTO tbl_orderdetails(order_id,product_id) VALUES ($orderID,$id)";
    $result = mysqli_query($con,$sql);
    echo mysqli_error($con);
    return $result;
}
function addCart($id)
{
    global $con;
    $user_id = $_SESSION['user_id'];
    //CHECK IF ORDER EXISTS
    $sql = "SELECT * FROM tbl_order WHERE customer_id=$user_id AND order_status=1";

    $result = mysqli_query($con, $sql);
    echo mysqli_error($con);

    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);

        addProduct($id,$data['order_id']);
        header("Location:../cart.php");
        
    }
    else{
        $sql = "INSERT INTO tbl_order(customer_id,order_status) VALUES($user_id,1)";
        $result = mysqli_query($con,$sql);
        $orderID = mysqli_insert_id($con);
        addProduct($id,$orderID);
        header("Location:../cart.php");

    }
}
if(isset($_GET['id'])){
$product_id = $_GET['id'];
addCart($product_id);
}
