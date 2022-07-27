<header>
    <nav>
        <a href="./home.php"><img src="./assets/logo.png" alt="kidding" id='logo'></a>
        <input type="text" name="Search" class="searchbox" placeholder="Search in kidding">
        <ul>
            <li>
                <a href="cart.php">
                    <div class="nav-icon">
                        <img src="./assets/icons/cart.svg" alt="">
                        <p>Cart</p>
                    </div>
                </a>
            </li>
            <li>
                <a href="history.php">
                    <div class="nav-icon">
                        <img src="./assets/icons/history.svg" alt="">
                        <p>History</p>
                    </div>
                </a>
            </li>
            <li>
                <div class="nav-icon">
                    <?php
                    if (isset($_SESSION['user_id'])) {
                        $username = strtoupper($_SESSION['username']);
                        echo " <img src='./assets/icons/account.svg' alt=''>
                            <p> $username</p>";
                    } else {
                        echo "<a href='login.php'><p>Login</p></a>";
                    }

                    ?>
                </div>
            </li>
            <li>

                <?php
                if (isset($_SESSION['user_id'])) {
                    echo "            <li>
                    <div class='nav-icon'>
                        <img src='./assets/icons/logout.svg' alt=''>

                        <a href='logout.php'><p>Logout</p></a>

                    </div>
                </li>";
                }
                ?>

            </li>
            <li>

                <?php
                
                if (isset($_SESSION['isadmin']) and  $_SESSION['isadmin']==1) {
                    echo "            <li>
                    <div class='nav-icon'>
                        <img src='./assets/icons/time.svg' alt=''>

                        <a href='admin/orders.php'><p>Admin</p></a>

                    </div>
                </li>";
                }
                ?>

            </li>

        </ul>
    </nav>
</header>