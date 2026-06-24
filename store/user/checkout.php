<?php
session_start();
require_once  '../common/conn.php';
require_once  '../function/common_function.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> demo</title>
    <!-- Bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
    <!-- font awesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body{
            overflow-x: hidden;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-white border-bottom">
            <div class="container-fluid ">
                <a class="navbar-brand" href="../"><img src="../images/logo.png" alt="" style="width: 150px;"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <form class="d-flex me-auto w-50 " role="search" method="get" action="search_product.php">
                        <input class="form-control  me-2" type="search" placeholder="Search" aria-label="Search" name="search_data" />
                        <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->
                        <input type="submit" class="btn btn-outline-success" name="search_data_product" value="search">

                    </form>
                    <ul class="navbar-nav mx-auto w-50  mb-lg-0 me-5 align-content-center">
                        <li class="nav-item me-3 my-auto">
                            <a class="nav-link " href="../display.php">product</a>
                        </li>

                        <li class="nav-item me-3 my-auto">
                            <a class="nav-link " href="../cart.php "><i class="fa-solid fa-cart-arrow-down"></i><sup><span class="badge text-bg-secondary"><?php cart_item(); ?></span> </sup> </a>
                        </li>
                        <li class="nav-item me-3 my-auto">
                            <a class="nav-link " href="#">price <?php total_cart_price(); ?> </a>
                        </li>



                        <?php
                        if (isset($_SESSION['username'])) {
                            echo '<li class="nav-item me-auto my-auto">
                                    <a class="btn btn-danger" href="./user_logout.php"> logout</a>
                                </li> ';
                            echo ' <li class="nav-item d-flex my-auto ">
                            <img src=".\user_images/' . $_SESSION['user_image'] . '"  class="" style="width:30px;"> 
                            <h2 class="ms-2 text-dark text-decoration-underline">' . $_SESSION['username'] . '</h2>
                            
                        </li>';
                        } else {
                            echo '  <li class="nav-item me-3 my-auto">
                        <a class="nav-link " href="user\user_signup.php">registraion</a>
                    </li>';
                            echo '<li class="nav-item mx-auto my-auto">
                                    <a class="btn btn-primary" href="user/user_login.php"> login</a>
                                </li> ';
                        }
                        ?>
                    </ul>

                </div>
            </div>
        </nav>
    </header>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <?php
                if (!isset($_SESSION['username'])) {
                    include 'user/user_login.php';
                } else {
                    include 'payment.php';
                }
                ?>
            </div>
        </div>

    </div>


    <?php include '../common/footer.php';
    ?>
    <!-- Bootstrap js link  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>