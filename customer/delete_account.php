<br>
<h2 style="text-align:center;">Do you really want to delete your account?</h2>

<form action="" method="post">
<br>
<input type="submit" name="yes" value="Yes" />
<input type="submit" name="no" value="No" />



</form>

<?php
    include("db.php");
    $user = $_SESSION['customer_email'];
    if (isset($_POST['yes'])) {
        $delete_customer = "delete from customers where customer_email='$user'";

        $run_customer = mysqli_query($con, $delete_customer);

        echo "<script>alert('Account has been purged','_self')</script>";
        echo "<script>window.open('../index.php', '_self')</script";
        session_destroy();
    }
    if (isset($_POST['no'])) {
        echo "<script>alert('Account has NOT been purged','_self')</script>";
        echo "<script>window.open('my_account.php', '_self')</script";
    }
?>