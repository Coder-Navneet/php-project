<?php
 include '../common/conn.php';
    if (isset($_GET['delete_product'])) {
        $product_id = $_GET['delete_product'];
         $delete_sql = "DELETE FROM product where product_id = '$product_id'";
         $result = mysqli_query($conn,$delete_sql);
         echo "<script>alert('product delete successfully');</script>";
         echo "<script>window.open('dashboard.php?view_product','_self');</script>";
    }
    ?>
