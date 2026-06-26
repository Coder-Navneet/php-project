<?php
session_start();
include '../common/conn.php';
include '../function/common_function.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> demo</title>
    <!-- Bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <style>
        body {
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
                        <a class="nav-link " href="user_signup.php">registraion</a>
                    </li>';
                            echo '<li class="nav-item mx-auto my-auto">
                                    <a class="btn btn-primary" href="user_login.php"> login</a>
                                </li> ';
                        }
                        ?>
                    </ul>

                </div>
            </div>
        </nav>
    </header>

    <div class="conatiner ">
        <div class="row mx-auto">
            <div class="col-md-2 p-0 bg-dark">
                <div class="bg-info text-center mb-3  ">
                    <h1 class="py-3 ">profile</h1>
                </div>
                <div class="text-center">

                    <img src="./user_images/<?php echo $_SESSION['user_image'] ?>" alt="" class="img img-thumbnail  ">
                </div>
                <div>
                    <ul class="navbar-nev text-center list-unstyled mt-3">
                        <li class=" mb-2 list list-item nav-item "><a href="profile.php" class="nav-link text-light text-decoration-none">Pending order</a></li>
                        <li class=" mb-2 list list-item nav-item "><a href="profile.php?edit_account" class=" nav-link text-light text-decoration-none">Edit Account</a></li>
                        <li class=" mb-2 list list-item nav-item "><a href="profile.php?my_orders" class="nav-link text-light text-decoration-none">My order</a></li>
                        <li class=" mb-2 list list-item nav-item "><a href="profile.php?delete_account" ` class=" nav-link text-light text-decoration-none">Delete Account</a></li>
                        <li class=" mb-2 list list-item nav-item "><a href="user_logout.php" class="nav-link text-light text-decoration-none">Logout</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-10 text-center mt-5">
                <?php
                if (isset($_GET['edit_account'])) {
                    include 'edit_account.php';
                } else if (isset($_GET['my_orders'])) {
                    include 'my_orders.php';
                } else if (isset($_GET['delete_account'])) {
                    include 'delete_account.php';
                } else {
                    get_user_order_details();
                }
                ?>


            </div>
        </div>
    </div>


    <!-- calling add to cart function  -->

    <?php include '../common/footer.php';
    ?>
    <!-- Bootstrap js link  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>