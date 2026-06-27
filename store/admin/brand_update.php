 <?php
    include '../common/conn.php';

    if (isset($_GET['brand_update'])) {
        $brand_id = $_GET['brand_update'];
        $sql = "SELECT * FROM brand where brand_id = $brand_id";
        $result = mysqli_query($conn, $sql);
        $rows = mysqli_fetch_assoc($result);
        $brand_name = $rows['brand_name'];

        if (isset($_POST['update'])) {
            $brand_name = $_POST['brand_name'];

                $delete_sql = "UPDATE brand set brand_name = '$brand_name' where brand_id = $brand_id";
                $result = mysqli_query($conn, $delete_sql);
                if ($result) {
                    echo "<script>alert('brand update successfully');</script>";
                    echo "<script>window.open('dashboard.php?view_brand','_self');</script>";
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
                 <input type="text" name="brand_name" value="<?php echo $brand_name; ?> " class=" w-50 me-3 form-control">
                 <input type="submit" class="btn btn-dark " name="update" value="update category">
             </div>
         </form>
     </div>
 </body>

 
 </html>

 