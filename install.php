<?php
// include('./admin_area/includes/db.php');
// global $con;
$servername = "localhost:8080";
$username = "root";
$password = "qwerqwer";


$conn = mysqli_connect($servername, $username, $password);
$sql = "CREATE DATABASE ecommerce";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully";
}
$God = "SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = '+00:00';

CREATE TABLE `ecommerce.brands` (
  `brand_id` int(100) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `ecommerce.brands` (`brand_id`, `brand_title`) VALUES
(1, 'World of Warcraft bot'),
(2, 'Diablo 3 bot'),
(3, 'Path of Exile bot');


CREATE TABLE `ecommerce.cart` (
  `p_id` int(100) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(100) DEFAULT '1',
  `ref` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `ecommerce.cart` (`p_id`, `ip_add`, `qty`, `ref`) VALUES
(7, '127.0.0.1', 50, 108),
(8, '127.0.0.1', 50, 109),
(6, '127.0.0.1', 50, 110),
(7, '::1', 50, 111);



CREATE TABLE `ecommerce.categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO `ecommerce.categories` (`cat_id`, `cat_title`) VALUES
(1, 'World of Warcraft bot'),
(2, 'Diablo 3 bot'),
(3, 'Path of Exile bot');


CREATE TABLE `ecommerce.customers` (
  `customer_id` int(10) NOT NULL,
  `customer_ip` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `customer_name` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `customer_email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `customer_pass` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `customer_country` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `customer_city` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `customer_contact` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `customer_image` text NOT NULL,
  `customer_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `ecommerce.customers` (`customer_id`, `customer_ip`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_image`, `customer_address`) VALUES
(9, '127.0.0.1', 'Rafeeq', 'dutoit1998@gmail.com', 'Gigabit', 'South Africa', 'Cape Town', 'asdf', 'Bom_Bot (1).jpg', '123'),
(10, '127.0.0.1', 'asdf', 'asdf', 'asdf', 'Wakanda', 'asdf', 'asdf', 'book.png', 'asdf');


CREATE TABLE `ecommerce.orders` (
  `order_id` int(100) NOT NULL,
  `prod_id` int(100) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `prod_qty` int(100) NOT NULL,
  `prod_price` int(255) NOT NULL,
  `cust_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `ecommerce.products` (
  `product_id` bigint(255) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `ecommerce.products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`) VALUES
(5, 1, 1, 'World of Warcraft 30 Day Bot', 30, 'Best bot 2019', 'Bom_Bot (1).jpg', 'Hacks bot 2019 best bot'),
(6, 2, 2, 'Diablo 3 30 Day bot', 30, 'Best diablo 3 bot 2019', '306-3061677_key-for-the-bot-diablo-3-demon-buddy.png', 'bot diablo'),
(7, 3, 3, 'Path of Exile 30 Day Bot', 30, 'Best bot 2019', '19-gifs-that-prove-the-robotic-uprising-will-happ-2-17124-1427944870-0_dblbig.jpg', 'bot'),
(8, 1, 1, 'child', 69, '123', 'brick.jpg', 'asdfg');


ALTER TABLE `ecommerce.brands`
  ADD PRIMARY KEY (`brand_id`);

ALTER TABLE `ecommerce.cart`
  ADD PRIMARY KEY (`ref`),
  ADD KEY `p_id` (`p_id`);


ALTER TABLE `ecommerce.categories`
  ADD PRIMARY KEY (`cat_id`);


ALTER TABLE `ecommerce.customers`
  ADD PRIMARY KEY (`customer_id`);


ALTER TABLE `ecommerce.orders`
  ADD PRIMARY KEY (`order_id`),
  ADD UNIQUE KEY `order_id` (`order_id`);


ALTER TABLE `ecommerce.products`
  ADD PRIMARY KEY (`product_id`);


ALTER TABLE `ecommerce.brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;


ALTER TABLE `ecommerce.cart`
  MODIFY `ref` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

ALTER TABLE `ecommerce.categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;


ALTER TABLE `ecommerce.customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;


ALTER TABLE `ecommerce.orders`
  MODIFY `order_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

ALTER TABLE `ecommerce.products`
  MODIFY `product_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;";

mysqli_multi_query($conn, $God);
mysqli_close($conn);

?>
