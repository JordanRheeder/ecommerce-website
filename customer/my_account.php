<?php
    session_start();
    include("../functions/functions.php");
?>
<html>
    <head>
        <title>Sanctuary Bots</title>
    
    <link rel="stylesheet" href="style.css" media="all" />
    </head>

<body>
    <div class="main_wrapper">
        <div class="header_wrapper">
            <img id="banner" src="images/test.gif"/>

        </div>
        <!--Navigation bar starts-->
        <div class="menubar">
            <ul id="menu">
                    <li><a href="../index.php">Home</a></li>

                    <li><a href="my_account.php">My Account</a></li>
                    <li><a href="../cart.php">Shopping Cart</a></li>
                    <li><a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">Contact Us</a></li>
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
                <div id="sidebar_title">My account :</div>
                <ul id="cats">

                <?php
                    $user=$_SESSION['customer_email'];
                    $get_img = "select * from customers where customer_email='$user'";
                    $run_img = mysqli_query($con, $get_img);
                    $row_img = mysqli_fetch_array($run_img);
                    $c_image = $row_img['customer_image'];
                    $c_name = $row_img['customer_name'];
                    echo "<p style='text-align:center;'><img src='customer_images/$c_image' width='150' height='150'/></p>";
                ?>

                <li><a href="my_account.php?my_orders">My orders</a></li>
                <li><a href="my_account.php?edit_account">Edit account</a></li>
                <!-- <li><a href="my_account.php?change_pass">Change password</a></li> -->
                <li><a href="my_account.php?delete_account">Delete account</a></li>
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
                    echo "<b>Welcome:</b>". $_SESSION['customer_email'];
                }
                ?>
                
                <?php
                if (!isset($_SESSION['customer_email'])) {
                    echo "<a href='../index.php' style='color:orange'>Login</a>";
                }
                else {
                    echo "<a href='../logout.php' style='color:orange'>Logout</a>";
                }
                
                ?>

                </span>
            </div>

                <div id="products_box">

                <?php
                    if(!isset($_GET['my_orders'])) {
                        if(!isset($_GET['edit_account'])) {
                                if(!isset($_GET['delete_account'])) {
                                    
                                    echo "
                                    <h2 style='padding:20px;'>Welcome: $c_name; </h2>
                                    <b>You can see your orders by clicking this <a href='my_account.php'>link</a></b>";
                        }
                    }
                }

                ?>

                <?php
                    if(isset($_GET['edit_account'])) {
                        include("edit_account.php");
                    }
                    if(isset($_GET['delete_account'])) {
                        include("delete_account.php");
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