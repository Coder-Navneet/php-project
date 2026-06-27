<?php
 include '../common/conn.php';
    if (isset($_GET['delete_payment'])) {
        $payment_id = $_GET['delete_payment'];
         $delete_sql = "DELETE FROM user_payment where payment_id = '$payment_id'";
         $result = mysqli_query($conn,$delete_sql);
         echo "<script>alert('this payment delete successfully');</script>";
         echo "<script>window.open('dashboard.php?all_payment','_self');</script>";
    }
    ?>
