<?php
   

// login section php code 
if (isset($_POST['login'])) {
     include '../function\common_function.php';
    include '../common/conn.php';
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin_users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $num = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);
        $ip = getUserIpAddr();

        if ($num > 0) {
            if (password_verify($password, $row['user_password'])) {

                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['user_image'] = $row['user_image'];
                echo "<script>alert('login successfully')</script>";
                echo "<script>window.open('dashboard.php','_self')</script>";
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

// signup section php code 

if (isset($_POST['signup'])) {
     include '../function\common_function.php';
    include '../common/conn.php';

    $name = $_POST['name'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hash_password = password_hash($password, PASSWORD_DEFAULT);
    $cpassword = $_POST['cpassword'];
    $user_image = $_FILES['user_image']['name'];
    $tmp_image = $_FILES['user_image']['tmp_name'];
    $user_ip =  getUserIpAddr();

    $select_query = "SELECT * FROM admin_users WHERE  user_mobile='$mobile' or user_email='$email' ";
    $select_result = mysqli_query($conn, $select_query);

    $num = mysqli_num_rows($select_result);
    if ($num > 0) {
        echo "<script>alert('user alreay registered !') </script>";
    } else {



        if ($password === $cpassword) {
            move_uploaded_file($tmp_image, "user_images/$user_image");
            $sql = "INSERT INTO admin_users (username,user_address,user_mobile,user_email,user_password,user_image,user_ip) VALUES ('$name','$address','$mobile','$email','$hash_password','$user_image','$user_ip')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                    echo "<script>alert(' sign up successfully ');</script>";           
            } else {
                die(mysqli_error($conn));
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">
            Invalid Credanstiol!
         </div>';
        }
    }}
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
    <div class="text-center my-5">
        <p>please login or sign up with use this link </p>
        <button class="btn btn-primary me-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_login" aria-expanded="false" aria-controls="collapse_login">
            <h3>Login</h3>
        </button>
        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_signup" aria-expanded="false" aria-controls="collapse_signup">
            <h3>sign up</h3>
        </button>
    </div>

    <!-- login section collapse  -->
    <div class="collapse" id="collapse_login">
        <div class="card card-body">

            <div class="container my-5">
                <h1 class="text-center ">Log in </h1>
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

        </div>
    </div>

    <!-- sign up section collapse  -->
    <div class="collapse" id="collapse_signup">
        <div class="card card-body">

            <div class="container my-3">
                <h1 class="text-center ">Sign up</h1>
                <form class="w-50 mx-auto" method="post" action="" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Your Name">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" name="address" placeholder="Enter Your Address">
                    </div>
                    <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile No.</label>
                        <input type="text" class="form-control" name="mobile" placeholder="Enter Your Mobile Number">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email </label>
                        <input type="email" class="form-control" name="email" placeholder="Enter Your Email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter Your Password">
                    </div>
                    <div class="mb-3">
                        <label for="cpassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" name="cpassword" placeholder="Enter Your Confirm Password">
                    </div>
                    <div class="mb-3">
                        <label for="user_image" class="form-label">User Image</label>
                        <input type="file" class="form-control" name="user_image">
                    </div>
                    <button type="submit" class="btn btn-primary w-100" name="signup">Submit</button>
                </form>
                <p class="text-center my-5">you have already account <a href="user_login.php">Log in</a></p>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>