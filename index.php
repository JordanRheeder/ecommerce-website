<?php
ini_set("display_errors", true);
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
                    <li><a href="https://www.youtube.com/watch?v=y6120QOlsfU">Contact Us</a></li>
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
            <div id="shopping_cart">
                <span style="float:right; font-size:15px; padding:5px; line-height:40px;">
                <?php
                if (isset($_SESSION['customer_email'])) {
                    echo "<b>Welcome:</b>". $_SESSION['customer_email'] . "<b style='color:teal;'>Your</b>";
                }
                else {
                    echo "<b>Welcome Guest:</b>";
                }
                ?>
                <b style="color:teal">Shopping Cart - </b> Total Items: <?php total_items(); ?> Total Price: $<?php total_price() ?>.00 <a href="cart.php" style="color:teal">Go to Cart</a>
                
                            <?php
                if (!isset($_SESSION['customer_email'])) {
                    echo "<a href='checkout.php' style='color:orange'>Login</a>";
                }
                else {
                    echo "<a href='logout.php' style='color:orange'>Logout</a>";
                }
                
            ?>

                </span>
            </div>

                <div id="products_box">
                    <?php
                        getPro();
                        getCatPro();
                    ?>
                </div>
            </div>
        </div>
        <!--content wrapper ends-->

        <!--footer starts-->
        <div id="footer">
            <h2 style="text-align:center; padding-top:30px;">&copy; 2019 by jrheeder@student.wethinkcode.co.za</h2>
        </div>
        <!--footer ends-->
    </div>
</body>

</html>