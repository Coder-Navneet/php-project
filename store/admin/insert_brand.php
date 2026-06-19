<?php
include '../common/conn.php';
if (isset($_POST['insert_brand'])) {
    $brand_name = $_POST['brand_name'];

    $sql = "SELECT * FROM brand  WHERE  brand_name = '$brand_name'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num > 0) {
        echo "<script>alert('brand alery available') ;</script>";
    } else {
        $insert_sql = "INSERT INTO brand (brand_name) VALUES ('$brand_name')";
        // $sql = "SELECT * FROM admin_users WHERE email = '$email' AND password = $password ";

        $result = mysqli_query($conn, $insert_sql);
        if ($result) {

            echo "<script>alert('Brand add successfully.') ;</script>";
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
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <h2 class="text-center">Insert Brand</h2>
    <form class="w-75 mt-3 mx-auto" method="post" action="">
        <div class="input-group mb-3">
            <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
            <input type="text" class="form-control" name="brand_name" placeholder="Insert Brand">
        </div>
        <div class="group mb-3">

        </div>
        <input type="submit" class="btn btn-info" name="insert_brand" value="Insert Category">
        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>