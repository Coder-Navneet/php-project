<?php
session_start();
 $email = $_SESSION['email']; 
$password = $_SESSION['password'] ; 

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
    <header>
        <nav class="navbar navbar-expand-lg bg-white border-bottom">
            <div class="container-fluid ">
                <a class="navbar-brand" href="#"><img src="images/logo.png" alt="" class=" logo"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <form class="d-flex mx-auto w-75 " role="search">
                        <input class="form-control  me-2" type="search" placeholder="Search" aria-label="Search" />
                    </form>
                    <ul class="navbar-nav mx-auto w-25  mb-lg-0 me-5 align-content-center">
                        <li class="nav-item me-3 my-auto">
                            <a class="nav-link " href="#">product</a>
                        </li>
                        <li class="nav-item me-3 my-auto">
                            <a class="nav-link " href="#"><i class="fa-solid fa-cart-arrow-down"></i><br>cart</a>
                        </li>
                        <li class="nav-item mx-auto my-auto">
                            <a class="nav-link" href="#"> <i class="fa-regular fa-user"> </i>
                                <br>profile
                            </a>
                        </li>

                        <?php
                        if ($email && $password ) {
                            echo '<li class="nav-item mx-auto my-auto">
                            <a class="btn btn-danger" href="logout.php"> logout</a>
                        </li> ';
                        } else {
                            echo '<li class="nav-item mx-auto my-auto">
                            <a class="btn btn-primary" href="login.php"> login</a>
                        </li> ';
                        }
                        ?>
                    </ul>

                </div>
            </div>
        </nav>
    </header>

    <div class="main container-fluid bg-light py-5 ">
        <div class="row mx-5">
            <!-- side menu -->
            <div class="col-2 border-end border-bottom">


                <div class=" row  ">
                    <div class="col ">
                        <h2>Brand</h2>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radioDefault" id="radioDefault1">
                            <label class="form-check-label" for="radioDefault1">
                                Default radio
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radioDefault" id="radioDefault2" checked>
                            <label class="form-check-label" for="radioDefault2">
                                Default checked radio
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radioDefault" id="radioDefault2" checked>
                            <label class="form-check-label" for="radioDefault2">
                                Default checked radio
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radioDefault" id="radioDefault2" checked>
                            <label class="form-check-label" for="radioDefault2">
                                Default checked radio
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radioDefault" id="radioDefault2" checked>
                            <label class="form-check-label" for="radioDefault2">
                                Default checked radio
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radioDefault" id="radioDefault2" checked>
                            <label class="form-check-label" for="radioDefault2">
                                Default checked radio
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radioDefault" id="radioDefault2" checked>
                            <label class="form-check-label" for="radioDefault2">
                                Default checked radio
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col ">
                        <h2>Brand</h2>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radioDefault" id="radioDefault1">
                            <label class="form-check-label" for="radioDefault1">
                                Default radio
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radioDefault" id="radioDefault2" checked>
                            <label class="form-check-label" for="radioDefault2">
                                Default checked radio
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radioDefault" id="radioDefault2" checked>
                            <label class="form-check-label" for="radioDefault2">
                                Default checked radio
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radioDefault" id="radioDefault2" checked>
                            <label class="form-check-label" for="radioDefault2">
                                Default checked radio
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radioDefault" id="radioDefault2" checked>
                            <label class="form-check-label" for="radioDefault2">
                                Default checked radio
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radioDefault" id="radioDefault2" checked>
                            <label class="form-check-label" for="radioDefault2">
                                Default checked radio
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radioDefault" id="radioDefault2" checked>
                            <label class="form-check-label" for="radioDefault2">
                                Default checked radio
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- product section  -->
            <div class="col-md-10">
                <div class="row">
                    <div class="col-3">
                        <div class="card" style="width: 18rem;">
                            <img src="images/mini-fan.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build </p>

                                <a href="#" class="btn btn-success">Add to cart</a>
                                <a href="#" class="btn btn-primary">view more</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card" style="width: 18rem;">
                            <img src="images/mini-fan.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build </p>

                                <a href="#" class="btn btn-success">Add to cart</a>
                                <a href="#" class="btn btn-primary">view more</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card" style="width: 18rem;">
                            <img src="images/mini-fan.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build </p>

                                <a href="#" class="btn btn-success">Add to cart</a>
                                <a href="#" class="btn btn-primary">view more</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card" style="width: 18rem;">
                            <img src="images/mini-fan.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build </p>

                                <a href="#" class="btn btn-success">Add to cart</a>
                                <a href="#" class="btn btn-primary">view more</a>
                            </div>
                        </div>
                    </div>
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