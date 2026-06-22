<?php
include 'common/conn.php';
include './function/common_function.php';
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
</head>

<body>
    <?php include './common/header.php' ?>
   <!-- calling add to cart function  -->
  <<?php  cart(); ?>

    <div class="main container-fluid bg-light py-5 ">
        <div class="row mx-5">
            <!-- side menu -->
            <div class="col-2 border-end border-bottom">

                <!-- side menu -->
                <div class=" row  ">
                    <div class="col ">
                        <h3>Brand</h3>
                        <ul class="list-group text-center">
                            <?php

                            getbrand();
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h3>category</h3>
                        <ul class="list-group  text-center">
                            <?php

                            getcategory();
                            ?>

                        </ul>
                    </div>
                </div>
            </div>
            <!-- product section  -->
            <div class="col-md-10">
                <div class="row">
                    <?php
                    search_product();
                    get_unique_category();
                    get_unique_brand();
                    ?>

                </div>
            </div>
        </div>
    </div>

    <footer class="container-fulid bg-white pt-3 border-top">
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
    <!-- Bootstrap js link  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>