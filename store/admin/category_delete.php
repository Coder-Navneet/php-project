 <?php
 include '../common/conn.php';
    if (isset($_GET['category_delete'])) {
        $category_id = $_GET['category_delete'];
         $delete_sql = "DELETE FROM category where category_id = '$category_id'";
         $result = mysqli_query($conn,$delete_sql);
         echo "<script>alert('category delete successfully');</script>";
         echo "<script>window.open('dashboard.php?view_category','_self');</script>";
    }

    if(isset($_GET['category_update'])){
        $category_id = $_GET['category_update'];
        $category_name = $_POST['categoryname'];
         $delete_sql = "UPDATE FROM category set category_name = '$category_name' where category_id = '$category_id'";
         $result = mysqli_query($conn,$delete_sql);
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <form action="" met>
            <input type="text" value="" class="" name="categoryname">
        </form>
    </body>
    </html>