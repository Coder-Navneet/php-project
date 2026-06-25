<?php
include '../function/common_function.php';
include '../common/conn.php';

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
}

// product price 

$ip = getUserIpAddr();
$total_price = 0;

$cart_price_query = "SELECT * FROM cart_details WHERE ip_address ='$ip'";
$result_cart_price = mysqli_query($conn, $cart_price_query);
$invoice_number = mt_rand();
$status = 'pending';
$count_product = mysqli_num_rows($result_cart_price);
while ($rows = mysqli_fetch_array($result_cart_price)) {
    $product_id = $rows['product_id'];
    $select_product = "SELECT * FROM product WHERE product_id ='$product_id'";
    $result_product = mysqli_query($conn, $select_product);
    while ($row_pro = mysqli_fetch_array($result_product)) {
        $product_price = $row_pro['product_price'];
        $product_value = $product_price;
        $total_price += $product_value;
    }
}



// getting quantity from cart
$get_cart = "SELECT * FROM cart_details";
$run_cart = mysqli_query($conn, $get_cart);
$get_item_quantity = mysqli_fetch_array($run_cart);
$quantity = $get_item_quantity['quantity'];

if ($quantity == 0) {
    $quantity = 1;
    $subtotal = $total_price;
} else {
    $quantity = $quantity;
    $subtotal = $total_price * $quantity;
}

$insert_order = "INSERT INTO user_orders (user_id,amount_due,invoice_number,total_product,order_date,order_status) VALUES ($user_id,$subtotal,$invoice_number,$count_product,NOW(),'$status')";
$result_query = mysqli_query($conn, $insert_order);
if ($result_query) {
    echo "<script>alert('Order are submited successfullty')</script>";
    echo "<script>window.open('profile.php','_self')</script>";
}


// order_pending 
$insert_pending_order = "INSERT INTO order_pending (user_id,invoice_number,product_id,quantity,order_status) VALUES ($user_id,$invoice_number,$product_id,$quantity,'$status')";
$result_insert_query = mysqli_query($conn, $insert_pending_order);


$empty_cart ="DELETE from cart_details where ip_address= '$ip'";
$result_empty =mysqli_query($conn,$empty_cart);