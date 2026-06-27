<?php
include '../common/conn.php';
if (isset($_GET['edit_product'])) {
    $product_id = $_GET['edit_product'];
    $sql = "SELECT * FROM product WHERE product_id = $product_id";
    $product_show = mysqli_query($conn, $sql);
    $prdouct_row = mysqli_fetch_assoc($product_show);
    $product_title = $prdouct_row['product_title'];
    $product_keyword = $prdouct_row['product_keyword'];
    $product_discription = $prdouct_row['product_discription'];
    $category_id = $prdouct_row['category_id'];
    $brand_id = $prdouct_row['brand_id'];
    $product_image1 = $prdouct_row['product_image1'];
    $product_image2 = $prdouct_row['product_image2'];
    $product_image3 = $prdouct_row['product_image3'];
    $product_price = $prdouct_row['product_price'];

    $category = "SELECT * FROM category where category_id = $category_id";
    $category_result = mysqli_query($conn, $category);
    $row_data = mysqli_fetch_assoc($category_result);
    $categoryname = $row_data['category_name'];

    $brand = "SELECT * FROM brand where brand_id = $brand_id";
    $brand_result = mysqli_query($conn, $brand);
    $brand_row_data = mysqli_fetch_assoc($brand_result);
    $brand_name = $brand_row_data['brand_name'];
}



if (isset($_POST['edit_product'])) {
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

    if ($product_title == "" or $product_discription == "" or $product_keyword == "" or $category == "" or $brand == "" or $product_price = "" or   $product_image1 == "" or   $product_image3 == "" or   $product_image3 == "") {
        echo "<script>alert('please fill all the fileds and continue the process . ');</script>";
    }else{

    

    $update_product = "UPDATE product SET 	product_title = '$product_title' ,product_keyword = '$product_keyword' ,product_discription	='$product_discription' ,category_id='$category_id' ,brand_id = '$brand_id' ,product_image1='	$product_image1' ,product_image2 ='$product_image2' ,product_image3 ='$product_image3' ,product_price = '$product_price' WHERE 	product_id = $product_id";
    $update_result = mysqli_query($conn, $update_product);
    if ($update_result) {
        echo "<script>alert('product update successfully . ');</script>";
        echo "<script>window.open('dashboard.php?view_product ','_self');</script>";
    } else {
        echo "<script>alert('product does not  update !  ');</script>";
        echo "<script>window.open('dashboard.php?view_product ','_self');</script>";
    }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit product</title>
</head>

<body>
    <div class="container my-5">
        <h1 class="text-center">Edit Product </h1>
        <form class="mx-auto w-75" method="post" action="" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" class="form-control" name="product_title" placeholder="Enter Product Title" value="<?php echo $product_title;  ?>">
            </div>
            <div class="mb-3">
                <label for="product_keyword" class="form-label">Product Keyword</label>
                <input type="text" class="form-control" name="product_keyword" placeholder="Enter Product keyword" value="<?php echo $product_keyword;  ?>">
            </div>
            <div class="mb-3">
                <label for="product_discription" class="form-label">Product discription</label>
                <textarea name="product_discription" placeholder="Product discription" class="form-control" value="<?php echo $product_discription;  ?>"></textarea>
            </div>
            <div class="d-flex ">
                <div class="mb-3 me-5 w-50">
                    <label for="category" class="form-label">Category</label>
                    <select name="category" class="form-select">
                        <?php
                        echo "<option value='$category_id'>$categoryname</option>";

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
                        <?php
                        echo "<option value='$brand_id'>$brand_name</option>";

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
                <div class="container text-center">
                    <div class="row">
                        <div class="col">
                            <label for="product_image1" class="form-label">Imgaes 1</label>
                            <input type="file" class="form-control mb-3" name="product_image1" value="<?php echo $product_image1; ?>">
                            <img src="./product_images/<?php echo $product_image1;  ?>" class="img img-thumbnail  w-50" alt="">
                        </div>
                        <div class="col">
                            <label for="product_image2" class="form-label">Imgaes 2</label>
                            <input type="file" class="form-control mb-3" name="product_image2">
                            <img src="./product_images/<?php echo $product_image2;  ?>" class="img img-thumbnail  w-50" alt="">
                        </div>
                        <div class="col">
                            <label for="product_image3" class="form-label">Imgaes 3</label>
                            <input type="file" class="form-control mb-3" name="product_image3">
                            <img src="./product_images/<?php echo $product_image3;  ?>" class="img img-thumbnail  w-50" alt="">
                        </div>

                    </div>
                </div>



            </div>
            <div class="mb-3">
                <label for="product_price" class="form-label">Price</label>
                <input type="text" class="form-control" name="product_price" placeholder="Enter Product Price" value="<?php echo $product_price;  ?>">
            </div>

            <button type="submit" class="btn btn-primary" name="edit_product">update product</button>
        </form>
    </div>
</body>

</html>