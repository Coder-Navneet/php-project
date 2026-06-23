<?php
session_start();
?>
<header>
    <nav class="navbar navbar-expand-lg bg-white border-bottom">
        <div class="container-fluid ">
            <a class="navbar-brand" href="./"><img src="images/logo.png" alt="" class=" logo"></a>
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
                        <a class="nav-link " href="display.php">product</a>
                    </li>

                    <li class="nav-item me-3 my-auto">
                        <a class="nav-link " href="cart.php "><i class="fa-solid fa-cart-arrow-down"></i><sup><span class="badge text-bg-secondary"><?php cart_item(); ?></span> </sup> </a>
                    </li>
                    <li class="nav-item me-3 my-auto">
                        <a class="nav-link " href="#">price <?php total_cart_price(); ?> </a>
                    </li>



                    <?php
                    if (isset($_SESSION['username'])) {
                        echo '<li class="nav-item me-auto my-auto">
                                    <a class="btn btn-danger" href="user/user_logout.php"> logout</a>
                                </li> ';
                        echo ' <li class="nav-item d-flex my-auto ">
                            <img src=".\user\user_images/' . $_SESSION['user_image'] . '"  class="" style="width:30px;"> 
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