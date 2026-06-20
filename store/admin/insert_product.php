<?php
include '../common/conn.php';
if (isset($_POST['insert_product'])) {
    // $product_id = $_POST['product_id'];
    $product_title = $_POST['product_title'];
    $product_keyword = $_POST['product_keyword'];
    $product_discription = $_POST['product_discription'];
    $category = $_POST['category'];
    $brand = $_POST['brand'];
    $product_price = $_POST['product_price'];
    // $date = $_POST['date'];
    $status = true;

    // accessing img 
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    // accessing img tem name

    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];

    // empty contion check  
    if ($product_title == "" or $product_discription == "" or $category == "" or $brand == "" or $product_price == "" or $product_image1 == "" or $product_image2 == "" or $product_image3 == "") {
        echo "<script>alert('please fill all avialable feilds .') </script>";

        exit();
    } else {
        move_uploaded_file($temp_image1, "./product_images/$product_image1");
        move_uploaded_file($temp_image2, "./product_images/$product_image2");
        move_uploaded_file($temp_image3, "./product_images/$product_image3");

        // inset query 


        $product = "INSERT INTO product (product_id,product_title,product_keyword,product_discription,category_id,brand_id,product_image1,product_image2,product_image3,product_price,date,status) VALUES ('','$product_title','$product_keyword','$product_discription','$category','$brand','$product_image1','$product_image2','$product_image3','$product_price', NOW(),'$status')";

        // echo "$product_title <br/>";
        // echo "$product_discription <br/>";
        // echo "$category <br/>";
        // echo "$brand <br/>";
        // echo "$product_price <br/>";
        // echo "$status <br/>";
        // print_r($product_image1);
        // print_r($product_image2);
        // print_r($product_image3);

        $result_product = mysqli_query($conn,$product);
        if ($result_product) {
            echo "<script>alert('data insert successfully.') </script>";
        } else {
            echo "Invalid credantiol";
        }
    }
    // $sql = "SELECT * FROM admin_users WHERE email = '$email' AND password = $password ";


}

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
        <h1 class="text-center">Add Product </h1>
        <form class="mx-auto w-75" method="post" action="" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" class="form-control" name="product_title" placeholder="Enter Product Title">
            </div>
            <div class="mb-3">
                <label for="product_keyword" class="form-label">Product Keyword</label>
                <input type="text" class="form-control" name="product_keyword" placeholder="Enter Product keyword">
            </div>
            <div class="mb-3">
                <label for="product_discription" class="form-label">Product discription</label>
                <textarea name="product_discription" placeholder="Product discription" class="form-control"></textarea>
            </div>
            <div class="d-flex ">
                <div class="mb-3 me-5 w-50">
                    <label for="category" class="form-label">Category</label>
                    <select name="category" id="" class="form-select">
                        <option value="">Select a Category</option>
                        <?php
                        $select_category = "SELECT * FROM category ";
                        $result_category = mysqli_query($conn, $select_category);
                        while ($row_data = mysqli_fetch_assoc($result_category)) {
                            $category_id = $row_data['category_id'];
                            $category_name = $row_data['category_name'];
                            echo "<option value='$category_id'>$category_name</option>";
                        }
                        ?>



                    </select>
                </div>
                <div class="mb-3 me-5 w-50">
                    <label for="brand" class="form-label">Brand</label>
                    <select name="brand" id="" class="form-select">
                        <option value="">Select a Brand</option>
                        <?php

                        $select_brand = "SELECT * FROM brand ";
                        $result_brand = mysqli_query($conn, $select_brand);

                        // echo $num['category_name'];
                        while ($row_data = mysqli_fetch_assoc($result_brand)) {
                            $brand_id = $row_data['brand_id'];
                            $brand_name = $row_data['brand_name'];
                            // echo $category_name;

                            echo "<option value='$brand_id'>$brand_name</option>";
                        }
                        ?>

                    </select>
                </div>

            </div>
            <div class="mb-3">
                <label for="product_image1" class="form-label">Imgaes 1</label>
                <input type="file" class="form-control mb-3" name="product_image1">
                <label for="product_image2" class="form-label">Imgaes 2</label>
                <input type="file" class="form-control mb-3" name="product_image2">
                <label for="product_image3" class="form-label">Imgaes 3</label>
                <input type="file" class="form-control mb-3" name="product_image3">
            </div>
            <div class="mb-3">
                <label for="product_price" class="form-label">Price</label>
                <input type="text" class="form-control" name="product_price" placeholder="Enter Product Price">
            </div>

            <button type="submit" class="btn btn-primary" name="insert_product">Insert Product</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>