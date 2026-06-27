 <?php
 include '../common/conn.php';
    if (isset($_GET['brand_delete'])) {
        $brand_id = $_GET['brand_delete'];
         $delete_sql = "DELETE FROM brand where brand_id = '$brand_id'";
         $result = mysqli_query($conn,$delete_sql);
         echo "<script>alert('brand delete successfully');</script>";
         echo "<script>window.open('dashboard.php?view_brand','_self');</script>";
    }

    ?>
