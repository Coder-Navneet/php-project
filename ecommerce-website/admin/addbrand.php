<?php
 if (isset($_POST['add_brand'])) {
                include '../common/conn.php';
                $brand = $_POST['brand'];

                $sql = "SELECT * FROM brand  WHERE  brand = '$brand'";
                $result = mysqli_query($conn, $sql);
                $num = mysqli_num_rows($result);
                if ($num > 0) {
                    echo "<script>alert('brand alery available') ;</script>";
                } else {

                    $insert_sql = "INSERT INTO brand (brand) VALUES ('$brand')";
                    // $sql = "SELECT * FROM admin_users WHERE email = '$email' AND password = $password ";

                    $result = mysqli_query($conn, $insert_sql);
                    if ($result) {

                        echo "<script>alert('brand add successfully.') ;</script>";
                    } else {
                        echo "Invalid credantiol";
                    }
                }
            }
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
        <h1 class="text-center mb-3">Add Brand</h1>
        <form class="w-75 mx-auto" method="post" action="">
            <div class="mb-3">
                <label for="brand" class="form-label">Brand</label>
                <input type="text" class="form-control" name="brand">
            </div>

            <button type="submit" class="btn btn-primary " name="add_brand">Insert Brand</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>