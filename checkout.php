<?php
    session_start();
    include("functions/functions.php");
?>
<html>
    <head>
        <title>Sanctuary Bots</title>
    
    <link rel="stylesheet" href="styles/style.css" media="all" />
    </head>

<body>
    <div class="main_wrapper">
        <div class="header_wrapper">
            <img id="banner" src="images/test.gif"/>

        </div>
        <!--Navigation bar starts-->
        <div class="menubar">
            <ul id="menu">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="customer/my_account.php">My Account</a></li>
                    <li><a href="cart.php">Shopping Cart</a></li>
                    <li><a href="https://www.youtube.com/watch?v=SQoA_wjmE9w">Contact Us</a></li>
                    <li><a href="admin_area/insert_product.php">Insert product</a></li>
            </ul>
            
            <div id="form">
                <form method="get" action="results.php" enctype="multipart/form-data">
                    <input type="text" name="user_query" placeholder="Search for a product"/>
                    <input type="submit" name="search" value="Search"/>
                </form>
            
            </div>
        </div>
        <!--Navigation bar ends-->

        <!--content wrapper starts-->
        <div class="content_wrapper">
            <div id="sidebar">
                <div id="sidebar_title">Products :</div>
                <ul id="cats">
                    <?php
                        getCats();

                    ?>
                </ul>
            </div>
            <div id="content_area">
            <?php 
                cart();
            ?>

                <div id="products_box">
                    <?php
                        if(!isset($_SESSION['customer_email'])) {
                            include("customer_login.php");

                        }
                        else {
                            include("payment.php");
                        }
                    ?>
                </div>
            </div>
        </div>
        <!--content wrapper ends-->

        <!--footer starts-->
        <div id="footer">
            <h2 style="text-align:center; padding-top:30px;">&copy; 2019 by jrheeder, rengelbr</h2>
        </div>
        <!--footer ends-->
    </div>
</body>

</html>