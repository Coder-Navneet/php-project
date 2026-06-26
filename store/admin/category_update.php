 <?php
    include '../common/conn.php';

    if (isset($_GET['category_update'])) {
        $category_id = $_GET['category_update'];
        $sql = "SELECT * FROM category where category_id = category_id";
        $result = mysqli_query($conn, $sql);
        $rows = mysqli_fetch_assoc($result);
        $category_name = $rows['category_name'];

        if (isset($_POST['update'])) {
            $category_name = $_POST['category_name'];
            if ($rows['category_name'] === $category_name) {

                $delete_sql = "UPDATE category set category_name = '$category_name' where category_id = $category_id";
                $result = mysqli_query($conn, $delete_sql);
                if ($result) {
                    echo "<script>alert('category update successfully');</script>";
                    echo "<script>window.open('dashboard.php?view_category','_self');</script>";
                }
            } else  {
                echo "<script>alert('dublicate category found ! data not changed');</script>";
                echo "<script>window.open('dashboard.php?view_category','_self');</script>";
            }
        }
    }
    ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

 </head>

 <body>
     <div class="container text-center">
         <h1 class="text-center">categroy update</h1>

         <form action="" method="post" class=" mt-5 ">
             <div class="d-flex justify-content-center ">
                 <input type="text" name="category_name" value="<?php echo $category_name; ?> " class=" w-50 me-3 form-control">
                 <input type="submit" class="btn btn-dark " name="update" value="update category">
             </div>
         </form>
     </div>
 </body>

 </html>