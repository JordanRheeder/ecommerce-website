<?php
    $con = mysqli_connect('localhost', 'root', 'qwerqwer', 'ecommerce');

    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_errno();
    }
?>