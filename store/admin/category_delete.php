 <?php
 include '../common/conn.php';
    if (isset($_GET['category_delete'])) {
        $category_id = $_GET['category_delete'];
         $delete_sql = "DELETE FROM category where category_id = '$category_id'";
         $result = mysqli_query($conn,$delete_sql);
         echo "<script>alert('category delete successfully');</script>";
         echo "<script>window.open('dashboard.php?view_category','_self');</script>";
    }

    ?>
