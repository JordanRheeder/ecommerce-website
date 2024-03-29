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
                <span style="float:right; font-size:16px; padding:5px; line-height:40px;">
                <?php
                if (isset($_SESSION['customer_email'])) {
                    echo "<b>Welcome: </b>". $_SESSION['customer_email']. ' '. "<b style='color:teal;'>Your</b>";
                }
                else {
                    echo "<b>Welcome Guest:</b>";
                }
                ?>
                <b style="color:teal"> Shopping Cart - </b> <a href="index.php" style="color:teal">Back to Shop</a>
                
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
                <!-- <br> -->
                <form action="" method="POST" enctype="multipart/form-data">
							<table align="center" width="700" bgcolor="orange">
								<tr>
									<td colspan="5"><h2>Got everything?</h2></td>
								</tr>
								<tr>
									<th>Remove</th>
									<th>Products</th>
									<th>Qty</th>
									<th>Price</th>
								</tr>
								<?php
									$total = 0;
									global $con;
									$ip = getIp();
									$get_price = "select * from cart where ip_add='$ip'";
									$run_price = mysqli_query($con, $get_price);
									while($p_price = mysqli_fetch_array($run_price)) {
										$pro_id = $p_price['p_id'];
										$pro_price = "select * from products where product_id='$pro_id'";
										$run_pro_price = mysqli_query($con, $pro_price);
										while ($pp_price = mysqli_fetch_array($run_pro_price)) {
											$products_price = array($pp_price['product_price']);
											$product_title = $pp_price['product_title'];
											$product_image = $pp_price['product_image'];
											$single_price = $pp_price['product_price'];
											$values = array_sum($products_price);
											$total += $values;
								?>
								<tr align="center">
									<td> <input type="checkbox" name="remove[]" value="<?php echo $pro_id ?>"/></td>
									<td><?php echo $product_title; ?><br/>
										<img src="admin_area/product_images/<?php echo $product_image;?>" width="60" height="60"/>
									</td>
									<td> <input type="text" size="3" name="qty" value="<?php echo $_SESSION['qty']; ?>"></td>
									<?php
										if (isset($_POST['update_cart'])) {
											$qty = $_POST['qty'];
											$update_qty = "update cart set qty='$qty'";
											$run_qty = mysqli_query($con, $update_qty);
											$_SESSION['qty'] = $qty;
											$total = $total * $qty;
											// echo "<script>window.open('cart.php','_self')</script>";
										}
									?>

									<td> <?php echo "$ ".$single_price ?> </td>
								</tr>
								<?php } } ?>
								<tr>
									<td colspan="4" align="right"><b>Sub Total:</b></td>
									<td><?php echo "$ ".$total ?></b>
									</td>
								</tr>
								<tr align="center">
									<td colspan="2"><input type="submit" name="update_cart" value="Update Cart"/></td>
									<td><input type="submit" name="continue" value="Continue Shopping"/></td>
									<td><input type="submit" name="checkout" value="Checkout"></td>
								</tr>
							</table>
						</form>
						<?php
							global $con;
							$ip = getIp();
							if (isset($_POST['update_cart'])) {
								foreach($_POST['remove'] as $remove_id) {
									$delete_prod = "delete from cart where p_id='$remove_id' AND ip_add='$ip'";
									$run_delete = mysqli_query($con, $delete_prod);
									if ($run_delete) {
										echo "<script>window.open('cart.php','_self')</script>";
									}
								}
							}
							if (isset($_POST['continue'])) {
								echo "<script>window.open('index.php','_self')</script>";
							}
							if (isset($_POST['checkout'])) {
								echo "<script>window.open('checkout.php','_self')</script>";
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