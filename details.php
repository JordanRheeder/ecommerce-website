<?php
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
                    <li><a href="#">Contact Us</a></li>
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
                <!-- <ul id="cats">
                <li><a href="">World of Warcraft</a></li>
                <li><a href="">Diablo 3</a></li>
                <li><a href="">Path of Exile</a></li>
                <div id="sidebar_title">Brands :</div>
                //< ?php getBrands(); ?>
                </ul> -->
            </div>
            <div id="content_area">
            <div id="shopping_cart">
                <span style="float:right; font-size:18px; padding:5px; line-height:40px;">Welcome Guest! <b style="color:teal">Shopping Cart - </b> Total Items - Total Price: <a href="cart.php" style="color:teal">Go to Cart</a></span>
            </div>
        <?php
                if(isset($_GET['product_id'])) {
                    $product_id = $_GET['product_id'];
                    $get_pro = "select * from products where product_id='$product_id'";
                    $run_pro = mysqli_query($con, $get_pro);

                    while ($row_pro=mysqli_fetch_array($run_pro)) {
                        $pro_id = $row_pro['product_id'];
                        $pro_title = $row_pro['product_title'];
                        $pro_price = $row_pro['product_price'];
                        $pro_image = $row_pro['product_image'];
                        $pro_desc = $row_pro['product_desc'];
                    }
                        echo "
                            <div id='single_product'>
                            <h3>$pro_title</h3>
                            <img src='admin_area/product_images/$pro_image' width='400' height='400'/>
                            <p><b>$ $pro_price.00 </b></p>
                            <p>$pro_desc</p>
                            <a href='index.php' style='float:left;'>Go Back</a>
                            <a href='index.php?add_cart=$pro_id'><button style='float:right'>Add to cart</button></a>
                            </div>
                        ";
}
    ?>
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