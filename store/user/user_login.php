<?php
include '../function/common_function.php';
if (isset($_POST['login'])) {
    include '../common/conn.php';
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user_table WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $num = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);
        $ip = getUserIpAddr();

        // cart item 

        $cart_item_sql = "SELECT * FROM cart_details WHERE ip_address= '$ip'";
        $result_cart = mysqli_query($conn, $cart_item_sql);
        $num_cart = mysqli_num_rows($result_cart);
        $row_cart = mysqli_fetch_assoc($result_cart);


        if ($num > 0) {
            if (password_verify($password, $row['user_password'])) {

                if ($num_cart == 1 && $row_cart['product_id'] == 0) {
                    session_start();
                    $_SESSION['username'] = $username;
                    $_SESSION['user_image'] = $row['user_image'];
                    echo "<script>alert('login successfully')</script>";
                    echo "<script>window.open('cart.php','_self')</script>";
                } else {
                    session_start();
                    $_SESSION['username'] = $username;
                    $_SESSION['user_image'] = $row['user_image'];
                    echo "<script>alert('login successfully')</script>";
                    echo "<script>window.open('profile.php','_self')</script>";
                }
            } else {
                echo "<script>alert('password does not match');</script>";
            }
        } else {
            echo "<script>alert('Invalid credantiol');</script>";
        }
    } else {
        echo "<script>alert('user not found');</script>";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
        <h1 class="text-center mb-3">Login</h1>
        <form class="w-50 mx-auto" method="post" action="">
            <div class="mb-3">
                <label for="username" class="form-label">User Name </label>
                <input type="text" class="form-control" name="username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-primary w-100" name="login">log in</button>
        </form>
        <p class="text-center my-5">you have not account <a href="user_signup.php">sign up</a></p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>