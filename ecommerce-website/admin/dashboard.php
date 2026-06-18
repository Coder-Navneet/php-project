<?php

session_start();
if(!isset($_SESSION['email'])){
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
    <header>
        <nav class="navbar navbar-expand-lg bg-white border-bottom">
            <div class="container-fluid ">
                <a class="navbar-brand" href="#"><img src="../images/logo.png" alt="" class=" logo"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav ms-auto  me-5 mb-lg-0 align-content-center">
                        <li class="nav-item me-3 my-auto">
                            <a class="nav-link " href="#">profile</a>
                        </li>
                        <li class="nav-item me-3 my-auto">
                            <a class=" btn btn-primary" href="logout.php">logout</a>
                        </li>
                        <li class="nav-item  my-auto" ><?php echo "$email";?></li>
                    </ul>

                </div>
            </div>
        </nav>
    </header>

    <div class="container-fulid">
        <ul class="nav nav-pills nav-fill mx-5 my-3">
            <li class="nav-item">
                <a class=" btn btn-info "  href="addproduct.php">Add Product</a>
            </li>
            <li class="nav-item">
                <a class="  btn btn-info" href="#">View Product</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="addcategory.php">Add catagory</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="category.php">view catagory</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="addbrand.php">add brand</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="brand.php">view brand</a>
            </li>
            <li class="nav-item">
                <a class="nav-link ">total order</a>
            </li>
        </ul>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>