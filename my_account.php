<?php
                if (!isset($_SESSION['customer_email'])) {
                    echo "<a href='checkout.php' style='color:orange'>Login</a>";
                }
                else {
                    echo "<a href='logout.php' style='color:orange'>Logout</a>";
                }

?>