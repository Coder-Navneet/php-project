<?php

use Dom\Element;

 include './common/conn.php';
include './function/common_function.php'; ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
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
                <a class="navbar-brand" href="./"><img src="images/logo.png" alt="" class=" logo"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">

                    <ul class="navbar-nav w-25  mb-lg-0 me-5 align-content-center">
                        <li class="nav-item me-3 my-auto">
                            <a class="nav-link " href="display.php">product</a>
                        </li>
                        <li class="nav-item me-3 my-auto">
                            <a class="nav-link " href="cart.php "><i class="fa-solid fa-cart-arrow-down"></i><sup><span class="badge text-bg-secondary"><?php cart_item(); ?></span> </sup> </a>
                        </li>
                        <li class="nav-item me-3 my-auto">
                            <a class="nav-link " href="#">price <?php total_cart_price(); ?> </a>
                        </li>
                        <li class="nav-item mx-auto my-auto">
                            <a class="nav-link" href="#"> <i class="fa-regular fa-user"> </i>
                                <br>profile
                            </a>
                        </li>

                        <!-- <?php
                                // if ($email && $password ) {
                                //     echo '<li class="nav-item mx-auto my-auto">
                                //     <a class="btn btn-danger" href="logout.php"> logout</a>
                                // </li> ';
                                // } else {
                                //     echo '<li class="nav-item mx-auto my-auto">
                                //     <a class="btn btn-primary" href="login.php"> login</a>
                                // </li> ';
                                // }
                                ?> -->
                    </ul>

                </div>
            </div>
        </nav>
    </header>


    <div class="container my-5">
        <form action="" method="post">

            <table class="table table-bordered text-center">
             
                    <!-- php code to  dispay dynamic data  -->
                    <?php
                // if (isset($_GET['add_to_cart'])) {
                    global $conn;
                    $ip = getUserIpAddr();
                    $total_price = 0;
                    $cart_query = "SELECT * FROM cart_details WHERE ip_address = '$ip' ";
                    $result = mysqli_query($conn, $cart_query);
                    $num = mysqli_num_rows($result);
                    if ($num > 0) {
                        
                    echo '
                       <thead>
                    
                    <tr>
                        <th>product title</th>
                        <th>product image</th>
                        <th>quantity</th>
                        <th>total price </th>
                        <th>remove</th>
                        <th colspan="2">opration</th>
                    </tr>
                </thead>
                <tbody>';

                    while ($row = mysqli_fetch_array($result)) {
                        $product_id = $row['product_id'];
                    $select_query = "SELECT * FROM product WHERE product_id = '$product_id'";
                    $result_query = mysqli_query($conn, $select_query);
                    while ($row_product_price = mysqli_fetch_array($result_query)) {
                        $product_price = array($row_product_price['product_price']);
                        $price_table = $row_product_price['product_price'];
                        $product_title = $row_product_price['product_title'];
                        $product_image1 = $row_product_price['product_image1'];
                        
                        $product_value = array_sum($product_price);
                        $total_price += $product_value;

                
                        
                        echo    "<tr>
                        <td>$product_title</td>
                        <td><img src='./admin/product_images/$product_image1' alt='' style='width: 80px;  '></td>
                        <td><input type='text' name='qty' class=' w-25'></td>
                        <td>$price_table/-</td> 
                        <td><input type='checkbox' name='removeitem[]' value='$product_id'></td> 
                        <td>
                        <input type='submit' class='btn btn-primary' name='updatecart' value='Update cart'>
                        </td>
                        <td>
                        <input type='submit' class='btn btn-primary' name='remove_cart' value='remove'>

                        
                        </td>
                        </tr>" ; 

                       
                        
                        }
                        }
                         if (isset($_POST['updatecart'])) {
                            $quantity = $_POST['qty'];
                            $upadate_cart = "UPDATE cart_details SET  quantity='$quantity' WHERE ip_address = '$ip'";
                            $result_product = mysqli_query($conn,$upadate_cart);
                            $total_price=$total_price*$quantity;
                        }
                    }else{
                        echo "<h2 class='text-center text-danger'>Cart empty<h2>";
                    }
                        ?>
                    
            </tbody>
        </table>
        <!-- subtotal  -->
         <?php
             global $conn;
                    $ip = getUserIpAddr();
                    $cart_query = "SELECT * FROM cart_details WHERE ip_address = '$ip' ";
                    $result = mysqli_query($conn, $cart_query);
                    $num = mysqli_num_rows($result);
                    if ($num > 0) { ?>
        <div class="d-flex p-3">
            <h4 class="me-4">subtotal - <strong> <?php echo $total_price;  ?> /-</strong></h4>
            <button class=" btn btn-primary me-4"><a href="index.php" class="text-light text-decoration-none">coutinue shopping</a></button>
            <button class=" btn btn-dark me-4"><a href="checkout.php" class="text-light text-decoration-none">coutinue shopping</a></button>
        </div>
    </form>
    </div>
    <!-- function to remove item  -->
<?php }
else{
    echo " <button class='btn btn-primary mx-4'><a href='index.php' class='text-light text-decoration-none'>coutinue shopping</a></button>
"; 

}
?>
<?php
    function remove_cart_item(){
        global $conn;
        if(isset($_POST['remove_cart'])){
            foreach($_POST['removeitem'] as $remove_id){
                echo $remove_id;
                $delet_query = "DELETE FROM cart_details WHERE product_id = $remove_id";
                $run_delete = mysqli_query($conn,$delet_query);
                if ($run_delete) {
                    echo "<script>window('cart.php','_self');</script>";
                }
            }
        }
    }
     $remove_item = remove_cart_item();
     echo $remove_item ;
?>

    
    <?php include './common/footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>