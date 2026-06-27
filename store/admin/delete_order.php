<?php
 include '../common/conn.php';
    if (isset($_GET['delete_order'])) {
        $order_id = $_GET['delete_order'];
         $delete_sql = "DELETE FROM user_orders where order_id = $order_id";
         $result = mysqli_query($conn,$delete_sql);
         echo "<script>alert('order delete successfully');</script>";
         echo "<script>window.open('dashboard.php?all_orders','_self');</script>";
    }
    ?>
