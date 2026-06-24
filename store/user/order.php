<?php
include '../function/common_function.php';
include '../common/conn.php';

if (isset($_GET['user_id'])) {
    $ip_address = $_GET['user_id'];

}
        $ip = getUserIpAddr();
        $total_price = 0;

    $cart_price_query = "SELECT * FROM cart_details WHERE ip_address ='$ip'";
    $result_cart_price = mysqli_query($conn, $cart_price_query);
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
    echo $total_price;

?>