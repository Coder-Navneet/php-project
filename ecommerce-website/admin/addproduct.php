<?php
if (isset($_POST['submit'])) {
    include '../common/conn.php';
    $title = $_POST[''];
    $discription = $_POST['discription'];
    $category = $_POST['category'];
    $brand = $_POST['brand'];
    $size = $_POST['size'];
    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];

    

    $sql = "INSERT INTO product (title,discription,category,brand,size,image) VALUES ('$title','$discription','$category','$brand','$size','$image')";
    // $sql = "SELECT * FROM admin_users WHERE email = '$email' AND password = $password ";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo '<div class="alert alert-success" role="alert">
  Category add successfully .
</div>';
    } else {
        echo "Invalid credantiol";
    }
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
        <form class="mx-auto w-75" method="post" action="addproduct.php">
            <div class="mb-3">
                <label for="title" class="form-label">Product Name</label>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="mb-3">
                <label for="discription" class="form-label">Product discription</label>
                <textarea name="discription" placeholder="Descrition" class="form-control"></textarea>
            </div>
            <div class="d-flex ">
                <div class="mb-3 me-5 w-25">
                    <label for="category" class="form-label">Category</label>
                    <select name="category" id="" class="form-select">
                        <option value="defualt">defualt</option>
                        <option value="men">Men</option>
                        <option value="women">Women</option>
                        <option value="kids">Kida</option>
                    </select>
                </div>
                <div class="mb-3 me-5 w-25">
                    <label for="brand" class="form-label">Brand</label>
                    <select name="brand" id="" class="form-select">
                        <option value="defualt">defualt</option>
                        <option value="men">Men</option>
                        <option value="women">Women</option>
                        <option value="kids">Kida</option>
                    </select>
                </div>
                <div class="mb-3 w-25">
                    <label for="size" class="form-label">Size</label>
                    <select name="size" id="" class="form-select">
                        <option value="free">free</option>
                        <option value="small">small</option>
                        <option value="medium">medium</option>
                        <option value="large">large</option>
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Imgaes</label>
                <input type="file" class="form-control mb-3" name="image">
                <input type="file" class="form-control mb-3" name="image">
                <input type="file" class="form-control mb-3" name="image">
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>