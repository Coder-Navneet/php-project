<?php

session_start();
if (!isset($_SESSION['email'])) {
    header('location:login.php');
}
// $name = $_SESSION['name'];
// $address = $_SESSION['address'];
// $mobile = $_SESSION['mobile'];
$email = $_SESSION['email'];
$password = $_SESSION['password'];

// echo " $name  <br/>";
// echo " $address  <br/>";
// echo " $mobile  <br/>";
// echo " $email  <br/>";
// echo " $password <br/>";

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <!-- header start  -->
    <header>
        <nav class="navbar navbar-expand-lg bg-white border-bottom">
            <div class="container-fluid ">
                <a class="navbar-brand" href="#"><img src="../images/logo.png" alt="" class=" logo"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav ms-auto  me-5 mb-lg-0 align-content-center">

                        <li class="nav-item  my-auto"><?php echo "$email"; ?></li>
                    </ul>

                </div>
            </div>
        </nav>
    </header>
    <!-- title  -->
    <div>
        <h1 class="text-center my-3 display-4 fw-bold">Manage Details</h1>

    </div>

    <!-- all buttons  -->
    <div class="container-fulid  ">
        <div class="row  mx-auto">
            <div class="col-12 text-center">
                <button class="btn btn-info text-center my-3 me-3"> <a class="nav-link text-light " href="index.php?addproduct">Add Product</a></button>
                <button class="btn btn-primary text-center my-3 me-3"> <a class="nav-link text-light" href="index.php?view_product">view product</a></button>
                <button class="btn btn-primary text-center my-3 me-3"> <a class="nav-link text-light" href="index.php?addcategory">Add catagory</a></button>
                <button class="btn btn-primary text-center my-3 me-3"> <a class="nav-link text-light" href="index.php?view_category">view catagory</a></button>
                <button class="btn btn-primary text-center my-3 me-3"> <a class="nav-link text-light" href="index.php?addbrand">Add brand</a></button>
                <button class="btn btn-primary text-center my-3 me-3"> <a class="nav-link text-light" href="index.php?view_brand">view brand</a></button>
                <button class="btn btn-primary text-center my-3 me-3"> <a class="nav-link text-light" href="">All order</a></button>
                <button class="btn btn-primary text-center my-3 me-3"> <a class="nav-link text-light" href="">Add Payments</a></button>
                <button class="btn btn-primary text-center my-3 me-3"> <a class="nav-link text-light" href="">list users</a></button>
                <button class="btn btn-primary text-center my-3 me-3"> <a class="nav-link text-light" href="">logout</a></button>
            </div>
        </div>
    </div>

    <!-- add categroy section  -->

    <div class="container">
        <?php
        if (isset($_GET['addcategory'])) {
            include 'addcategory.php';
        }
        ?>
    </div>
    <!-- add brand section  -->
    <div class="container">
        <?php
        if (isset($_GET['addbrand'])) {
            include 'addbrand.php';
            if (isset($_POST['add_brand'])) {
                include '../common/conn.php';
                $brand = $_POST['brand'];
                $sql = "SELECT * FROM brand  WHERE  brand = '$brand'";
                $result = mysqli_query($conn, $sql);
                $num = mysqli_num_rows($result);
                if ($num > 0) {
                    echo "<script>alert('brand alery available') ;</script>";
                } else {

                    $sql = "INSERT INTO brand (brand) VALUES ('$brand')";
                    // $sql = "SELECT * FROM admin_users WHERE email = '$email' AND password = $password ";

                    $result = mysqli_query($conn, $sql);
                    if ($result) {

                        echo "<script>alert('brand add successfully.') ;</script>";
                    } else {
                        echo "Invalid credantiol";
                    }
                }
            }
        }
        ?>
    </div>
    <!-- add product section  -->
    <div class="container">
        <?php
        if (isset($_GET['addproduct'])) {
            include 'addproduct.php';
        }
        ?>
    </div>
    <!-- view category section  -->
    <div class="container">
        <?php
        if (isset($_GET['view_category'])) {
            include 'category.php';
        }
        ?>
    </div>
    <!-- view brand section  -->
    <div class="container">
        <?php
        if (isset($_GET['view_brand'])) {
            include 'brand.php';
        }
        ?>
    </div>
    <!-- view brand section  -->
    <div class="container">
        <?php
        if (isset($_GET['view_product'])) {
            include 'brand.php';
        }
        ?>
    </div>

    <footer class="container-fulid bg-white pt-3  bottom-0 mt-5">
        <div class="container mt-5 border-bottom border-dark">

            <div class="row ">

                <div class="col-3">
                    <a class="" href="#"><img src="images/logo.png" alt="" class="logo "></a>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa, quibusdam.</p>
                </div>
                <div class="col-3 ">
                    <ul class="list-unstyled">
                        <li>
                            <h3 class="text-black">link</h3>
                        </li>
                        <li class="">product</li>
                        <li>about</li>
                        <li></li>
                    </ul>
                </div>
                <div class="col-3 ">
                    <ul class="list-unstyled">
                        <li>
                            <h3 class="text-black">Category</h3>
                        </li>
                        <li class="">T-shirt</li>
                        <li>Jeans</li>
                        <li>Shoes</li>
                    </ul>
                </div>
                <div class="col-3">
                    <ul class="list-unstyled">
                        <li>
                            <h3 class="text-black">contact us</h3>
                        </li>
                        <li>address: <a href="">dewas (M.P)</a></li>
                        <li>mobile no.: <a href="">1234567890</a></li>
                        <li>email: <a href="">info@gmail.com</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="text-center ">
            <p class="mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit, autem?</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>