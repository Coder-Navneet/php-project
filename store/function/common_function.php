<?php
// include './common/conn.php';

// get product display 
function getproduct()
{
    global $conn;
    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {


            $select_query = "SELECT * FROM product order by rand() limit 0,4 ";
            $result_query = mysqli_query($conn, $select_query);
            while ($row = mysqli_fetch_assoc($result_query)) {

                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_keyword = $row['product_keyword'];
                $product_discription = $row['product_discription'];
                $product_image1 = $row['product_image1'];
                $product_image2 = $row['product_image2'];
                $product_image3 = $row['product_image3'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];
                $product_price = $row['product_price'];


                echo ' <div class="col-3 py-2">


                        <div class="card" style="width: 18rem; ">
                            <img src="admin/product_images/' . $row['product_image1'] . '" class="card-img-top " alt="..." style="height: 291px;">
                            <div class="card-body">
                                <h5 class="card-title">' . $product_title . '</h5>
                                <p class="card-text">' . mb_substr($product_discription, 0, 50) . '</p>
                                <p class="card-text">price : ' . $product_price . ' Rs</p>

                                <a href="index.php?add_to_cart=' . $product_id . '" class="btn btn-success">Add to cart</a>
                                <a href="produt_details.php?product_id=' . $product_id . '" class="btn btn-primary">view more</a>
                            </div>
                        </div>
                    </div>';
            }
        }
    }
}
// geting unique category 
function get_unique_category()
{
    global $conn;
    if (isset($_GET['category'])) {
        $category_id = $_GET['category'];
        $select_query = "SELECT * FROM product  WHERE category_id= '$category_id'";
        $result_query = mysqli_query($conn, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);

        if ($num_of_rows === 0) {
            echo "<h2 class='text-center text-danger display-5 fw-bold'>No stock for this category</h2>";
        }
        while ($row = mysqli_fetch_assoc($result_query)) {

            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_keyword = $row['product_keyword'];

            $product_discription = $row['product_discription'];
            $product_image1 = $row['product_image1'];
            $product_image2 = $row['product_image2'];
            $product_image3 = $row['product_image3'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            $product_price = $row['product_price'];


            echo ' <div class="col-3 py-2">


                        <div class="card" style="width: 18rem; height:30rem">
                            <img src="admin/product_images/' . $row['product_image1'] . '" class="card-img-top " alt="..." style="height: 291px;">
                            <div class="card-body">
                              <h5 class="card-title">' . $product_keyword . '</h5>
                                <p class="card-text">' . $product_title . '</p>
                                <a href="index.php?add_to_cart=' . $product_id . '" class="btn btn-success">Add to cart</a>
                                <a href="produt_details.php?product_id=' . $product_id . '" class="btn btn-primary">view more</a>
                            </div>
                        </div>
                    </div>';
        }
    }
}
function get_unique_brand()
{
    global $conn;
    if (isset($_GET['brand'])) {
        $brand_id = $_GET['brand'];
        $select_query = "SELECT * FROM product  WHERE brand_id= '$brand_id'";
        $result_query = mysqli_query($conn, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);

        if ($num_of_rows === 0) {
            echo "<h2 class='text-center text-danger display-5 fw-bold'>this brand is not available for service</h2>";
        }

        while ($row = mysqli_fetch_assoc($result_query)) {

            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_keyword = $row['product_keyword'];

            $product_discription = $row['product_discription'];
            $product_image1 = $row['product_image1'];
            $product_image2 = $row['product_image2'];
            $product_image3 = $row['product_image3'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            $product_price = $row['product_price'];


            echo ' <div class="col-3 py-2">


                        <div class="card" style="width: 18rem; height:30rem">
                            <img src="admin/product_images/' . $row['product_image1'] . '" class="card-img-top " alt="..." style="height: 291px;">
                            <div class="card-body">
                               <h5 class="card-title">' . $product_keyword . '</h5>
                                <p class="card-text">' . $product_title . '</p>

                                <a href="index.php?add_to_cart=' . $product_id . '" class="btn btn-success">Add to cart</a>
                                <a href="produt_details.php?product_id=' . $product_id . '" class="btn btn-primary">view more</a>
                            </div>
                        </div>
                    </div>';
        }
    }
}



// get category display 
function getcategory()
{
    global $conn;
    $select_category = "SELECT * FROM category ";
    $result_category = mysqli_query($conn, $select_category);

    // echo $num['category_name'];
    while ($row_data = mysqli_fetch_assoc($result_category)) {
        $category_id = $row_data['category_id'];
        $category_name = $row_data['category_name'];
        // echo $category_name;
        echo '<li class="list-group-item list-group-item-action list-group-item-dark"><a href="index.php?category=' . $category_id . '" class="text-dark text-decoration-none"><h5>' . $category_name . '</h5></a></li>  ';
    }
}


// get brand display 
function getbrand()
{
    global $conn;
    $select_brand = "SELECT * FROM brand ";
    $result_brand = mysqli_query($conn, $select_brand);

    // echo $num['category_name'];
    while ($row_data = mysqli_fetch_assoc($result_brand)) {
        $brand_id = $row_data['brand_id'];
        $brand_name = $row_data['brand_name'];
        // echo $category_name;
        echo '<li class="list-group-item list-group-item-action list-group-item-dark"><a href="index.php?brand=' . $brand_id . '" class="text-dark text-decoration-none"><h5>' . $brand_name . '</h5></a></li>  ';
    }
}

// search all  product  
function search_product()
{
    global $conn;

    if (isset($_GET['search_data_product'])) {
        $search_data_value = $_GET['search_data'];
        $search_query = "SELECT * FROM product WHERE  product_keyword like '%$search_data_value%'";
        $result_query = mysqli_query($conn, $search_query);
        $num_of_rows = mysqli_num_rows($result_query);

        if ($num_of_rows === 0) {
            echo "<h2 class='text-center text-danger display-5 fw-bold'>No result match. product not found !</h2>";
        }

        while ($row = mysqli_fetch_assoc($result_query)) {

            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_keyword = $row['product_keyword'];

            $product_discription = $row['product_discription'];
            $product_image1 = $row['product_image1'];
            $product_image2 = $row['product_image2'];
            $product_image3 = $row['product_image3'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            $product_price = $row['product_price'];


            echo ' <div class="col-3 py-2">


                        <div class="card" style="width: 18rem; height:30rem">
                            <img src="admin/product_images/' . $row['product_image1'] . '" class="card-img-top " alt="..." style="height: 291px;">
                            <div class="card-body">
               <h5 class="card-title">' . $product_keyword . '</h5>
                                <p class="card-text">' . $product_title . '</p>
                                <a href="#" class="btn btn-success">Add to cart</a>
                                <a href="produt_details.php?product_id=' . $product_id . '" class="btn btn-primary">view more</a>
                            </div>
                        </div>
                    </div>';
        }
    }
}


// get all product 
function get_all_product()
{
    global $conn;
    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {


            $select_query = "SELECT * FROM product order by rand() ";
            $result_query = mysqli_query($conn, $select_query);
            while ($row = mysqli_fetch_assoc($result_query)) {

                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_keyword = $row['product_keyword'];
                $product_discription = $row['product_discription'];
                $product_image1 = $row['product_image1'];
                $product_image2 = $row['product_image2'];
                $product_image3 = $row['product_image3'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];
                $product_price = $row['product_price'];


                echo ' <div class="col-3 py-2">


                        <div class="card" style="width: 18rem; height:30rem">
                            <img src="admin/product_images/' . $row['product_image1'] . '" class="card-img-top " alt="..." style="height: 291px;">
                            <div class="card-body">
                                <h5 class="card-title">' . $product_keyword . '</h5>
                                <p class="card-text">' . $product_title . '</p>

                                <a href="#" class="btn btn-success">Add to cart</a>
                                <a href="produt_details.php?product_id=' . $product_id . '" class="btn btn-primary">view more</a>
                            </div>
                        </div>
                    </div>';
            }
        }
    }
}


// product details 
function product_details()
{
    global $conn;
    if (isset($_GET['product_id'])) {
        $product_id = $_GET['product_id'];

        $select_query = "SELECT * FROM product WHERE product_id = '$product_id' ";
        $result_query = mysqli_query($conn, $select_query);
        while ($row = mysqli_fetch_assoc($result_query)) {

            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_keyword = $row['product_keyword'];
            $product_discription = $row['product_discription'];
            $product_image1 = $row['product_image1'];
            $product_image2 = $row['product_image2'];
            $product_image3 = $row['product_image3'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            $product_price = $row['product_price'];

            echo '<div class="col-4">
                            <div class="col  p-2 img-thumbnail align-content-center" style="height: 513px;">
                                <div id="carouselExample" class="carousel slide">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                        <img src="./admin/product_images/' . $product_image1 . '" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                        <img src="./admin/product_images/' . $product_image2 . '" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                        <img src="./admin/product_images/' . $product_image3 . '" class="d-block w-100" alt="...">
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                    </div>
                            </div>
                    </div>
                    <div class="col-8">
                        <div class="card-body ">
                            <h5 class="card-title">' . $product_title . '</h5>
                            <h5 class="py-3">price -' . $product_price . 'Rs</h5>
                            <p class="card-text">' . $product_discription . '</p>
                           <a href="index.php?add_to_cart=' . $product_id . '" class="btn btn-success">Add to cart</a>
                           <a href="produt_details.php?product_id=' . $product_id . '" class="btn btn-primary">buy now</a>
                        </div>
                    </div>';
        }
    }
}

function getUserIpAddr()
{

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
// echo " user ip address  $ip";

// cart function 

function cart()
{
    if (isset($_GET['add_to_cart'])) {
        global $conn;
        $ip = getUserIpAddr();

        $product_id = $_GET['add_to_cart'];

        $select_query = "SELECT * FROM cart_details WHERE product_id = '$product_id' and ip_address = '$ip' ";
        $result_query = mysqli_query($conn, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);

        if ($num_of_rows > 0) {
            echo "<script> alert('this item alreay presant inside  cart'); </script>";
            echo "<script>window.open('index.php','_self');</script>";
        } else {

            $insert_query = "INSERT INTO cart_details (product_id,ip_address,quantity) VALUES ('$product_id', '$ip',0)";
            $result = mysqli_query($conn, $insert_query);
            if ($result) {

                echo "<script> alert( 'item add to cart ' ); </script>";
                echo "<script>window.open('index.php','_self');</script>";
            }
        }
    };
}

// function  to get cart item number 
function cart_item()
{
    if (isset($_GET['add_to_cart'])) {
        global $conn;
        $ip = getUserIpAddr();

        $product_id = $_GET['add_to_cart'];

        $select_query = "SELECT * FROM cart_details WHERE ip_address = '$ip' ";
        $result_query = mysqli_query($conn, $select_query);
        $count_cart_item = mysqli_num_rows($result_query);
    } else {
        global $conn;
        $ip = getUserIpAddr();
        $select_query = "SELECT * FROM cart_details WHERE ip_address = '$ip' ";
        $result_query = mysqli_query($conn, $select_query);
        $count_cart_item = mysqli_num_rows($result_query);
    }
    echo "$count_cart_item";
}

// total price function 

function total_cart_price()
{
    // if (isset($_GET['add_to_cart'])) {
    global $conn;
    $ip = getUserIpAddr();
    $total_price = 0;
    $cart_query = "SELECT * FROM cart_details WHERE ip_address = '$ip' ";
    $result = mysqli_query($conn, $cart_query);
    while ($row = mysqli_fetch_array($result)) {
        $product_id = $row['product_id'];
        $select_query = "SELECT * FROM product WHERE product_id = '$product_id'";
        $result_query = mysqli_query($conn, $select_query);
        while ($row_product_price = mysqli_fetch_array($result_query)) {
            $product_price = array($row_product_price['product_price']);
            $product_value = array_sum($product_price);
            $total_price += $product_value;
        }
    }
    echo $total_price;
}

// get user order details
function get_user_order_details()
{
    global $conn;
    $username =  $_SESSION['username'];
    $get_details = "SELECT * FROM user_table WHERE username = '$username' ";
    $result_get_details = mysqli_query($conn, $get_details);
    while ($row_query = mysqli_fetch_array($result_get_details)) {
        $user_id = $row_query['user_id'];
        if (!isset($_GET['edit_account'])) {
            if (!isset($_GET['my_order'])) {
                if (!isset($_GET['delete_account'])) {
                    $get_order = "SELECT * FROM user_orders WHERE user_id = $user_id and order_status ='pending'";
                    $result_get_order = mysqli_query($conn, $get_order);
                    $row_count = mysqli_num_rows($result_get_order);
                    if ($row_count > 0) {
                        echo "<h1 class='text-success'>You have <span>$row_count</span> Pending order</h1>";
                        echo "<a href='profile.php?my_orders' class='text-dark'>Order Details</a>";
                    } else {
                        echo "<h1 class='text-success'>You have zero Pending order</h1>";
                        echo "<a href='../display.php' class='text-dark'>Explore product</a>";
                    }
                }
            }
        }
    }
}



