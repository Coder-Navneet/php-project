<?php

if (isset($_POST['login'])) {
    include './common/conn.php';
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user_table WHERE user_email = '$email' AND user_password = $password ";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            echo "login successfully";
            session_start();
            $_SESSION['email'] = $email; 
            $_SESSION['password'] = $password;
            // header('location:..\index.php');
        } else {
            echo "Invalid credantiol";
        }
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
        <form class="w-50 mx-auto" method="post" action="login.php">
            <div class="mb-3">
                <label for="email" class="form-label">Email </label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-primary w-100" name="login">log in</button>
        </form>
        <p class="text-center my-5">you have not account <a href="user/user_signup.php">sign up</a></p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>