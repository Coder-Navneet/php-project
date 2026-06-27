<?php
session_start();
if (!$_SESSION['username']) {
    header('location:index.php');
}

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
        <nav class="navbar navbar-expand-lg bg-info border-bottom">
            <div class="container-fluid ">
                <a class="navbar-brand" href="#"><img src="../images/logo.png" alt="" class=" logo"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav  mx-auto me-5 mb-lg-0 align-content-center">

                        <li class="nav-item d-flex  my-auto">
                            <h2 class="me-3 text-decoration-underline">Welcome

                                <?php
                                echo $_SESSION["username"];
                                ?>
                            </h2>
                        </li>

                        <li class="nav-item  my-auto">
                        </li>
                    </ul>
                    <button class="btn btn-danger ms-auto "> <a class="nav-link text-light" href="logout.php">logout</a></button>

                </div>
            </div>
        </nav>
    </header>
    <!-- title  -->
    <div>
        <h1 class="text-center my-3 display-4 fw-bold">Manage Details</h1>

    </div>

    <!-- all buttons  -->
    <div class="container-fulid bg-dark py-3 my-5">
        <div class="row  mx-auto">
            <div class="col-12 text-center">
                <button class="btn btn-primary text-center my-3 me-3"> <a class="nav-link text-light " href="insert_product.php">insert Product</a></button>
                <button class="btn btn-primary text-center my-3 me-3"> <a class="nav-link text-light" href="dashboard.php?view_product">view product</a></button>
                <button class="btn btn-primary text-center my-3 me-3"> <a class="nav-link text-light" href="dashboard.php?insert_category">insert catagory</a></button>
                <button class="btn btn-primary text-center my-3 me-3"> <a class="nav-link text-light" href="dashboard.php?view_category">view catagory</a></button>
                <button class="btn btn-primary text-center my-3 me-3"> <a class="nav-link text-light" href="dashboard.php?insert_brand">insert brand</a></button>
                <button class="btn btn-primary text-center my-3 me-3"> <a class="nav-link text-light" href="dashboard.php?view_brand">view brand</a></button>
                <button class="btn btn-primary text-center my-3 me-3"> <a class="nav-link text-light" href="dashboard.php?all_orders">All orders</a></button>
                <button class="btn btn-primary text-center my-3 me-3"> <a class="nav-link text-light" href="dashboard.php?all_payment">Add Payments</a></button>
                <button class="btn btn-primary text-center my-3 me-3"> <a class="nav-link text-light" href="dashboard.php?all_user">list users</a></button>

            </div>
        </div>
    </div>

     <!-- insert category  -->
     <div class="container ">
         <?php
        if (isset($_GET['insert_category'])) {
            include 'insert_category.php';
            }
            ?>
    </div>
    <!-- insert brand  -->
    <div class="container ">
        <?php
        if (isset($_GET['insert_brand'])) {
            include 'insert_brand.php';
            }
            ?>
    </div>
    <!-- view brand  -->
    <div class="container ">
        <?php
        if (isset($_GET['view_brand'])) {
            include 'view_brand.php';
            }
            ?>
    </div>
    <!-- view category  -->
    <div class="container ">
        <?php
        if (isset($_GET['view_category'])) {
            include 'view_category.php';
            }
            ?>
    </div>
    <!-- view product  -->
    <div class="container ">
        <?php
        if (isset($_GET['view_product'])) {
            include 'view_product.php';
            }
            ?>
    </div>
    <div class="container ">
        <?php
        if (isset($_GET['category_delete'])) {
            include 'category_delete.php';
            }
            ?>
    </div>
    <div class="container ">
        <?php
        if (isset($_GET['category_update'])) {
            include 'category_update.php';
            }
            ?>
    </div>
    <div class="container ">
        <?php
        if (isset($_GET['brand_update'])) {
            include 'brand_update.php';}
            ?>
    </div>
     <div class="container ">
        <?php
        if (isset($_GET['brand_delete'])) {
            include 'brand_delete.php';
            }
            ?>
    </div>
    <div class="container ">
        <?php
        if (isset($_GET['edit_product'])) {
            include 'edit_product.php';
            }
            ?>
    </div>
    <div class="container ">
        <?php
        if (isset($_GET['delete_product'])) {
            include 'delete_product.php';
            }
            ?>
    </div>
    <div class="container ">
        <?php
        if (isset($_GET['all_orders'])) {
            include 'all_orders.php' ;
            }
            ?>
    </div>
    <div class="container ">
        <?php
        if (isset($_GET['delete_order'])) {
            include 'delete_order.php' ;
            }
            ?>
    </div>
    <div class="container ">
        <?php
        if (isset($_GET['all_payment'])) {
            include 'all_payment.php' ;
            }
            ?>
    </div>
    <div class="container ">
        <?php
        if (isset($_GET['delete_payment'])) {
            include 'delete_payment.php' ;
            }
            ?>
    </div>
    <div class="container ">
        <?php
        if (isset($_GET['all_user'])) {
            include 'all_user.php' ;
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