<?php
require('./functions/db.php');
require('./functions/home_section.php');
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>KiDDING</title>
</head>

<body>
    <?php 
    include_once("components/navbar_home.php");
    
    ?>
    <main>
        <section id="baby-clothes">
            <div class="section-header primary-color">
                <div class="section-content">
                    <h1>Infant Clothing</h1>
                    <p>Baby sized clothes, food napkins and diapers for your child.<br> All sizes and colors are available. <em>Ages 0-3</em></p>
                    <button class="secondary-btn">View All</button>
                </div>
                <img src="./assets/baby_home.png" alt="">
            </div>

            <div class="section-body">
                <?php
                getProducts(1);
                ?>

            </div>
        </section>
        <section id="toddler-clothes">
            <div class="section-header secondary-color">
                <div class="section-content">
                    <h1>Preschoolers</h1>
                    <p>Make your kids look beautiful before they go to school.<br> All sizes and colors are available. <em style='color:#FCEF53'>Ages 0-3</em></p>
                    <button class="primary-btn">View All</button>
                </div>
                <img src="./assets/pre_school.png" alt="">
            </div>

            <div class="section-body">
                <?php
                getProducts(2);
                ?>

            </div>
        </section>
    </main>


</body>

</html>