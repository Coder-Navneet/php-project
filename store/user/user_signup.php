<?php
include '../function/common_function.php';
if (isset($_POST['signup'])) {
    include '../common/conn.php';
    $name = $_POST['name'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $user_image = $_FILES['user_image']['name'];
    $tmp_image = $_FILES['user_image']['tmp_name'];
    $user_ip =  getUserIpAddr() ;
    
    if($password === $cpassword){
  $sql = "INSERT INTO user_table (username,user_address,user_mobile,user_email,user_password,user_image,user_ip) VALUES ('$name','$address','$mobile','$email','$password','$user_image','$user_ip')";
    $result = mysqli_query($conn,$sql);
    if ($result) {
        echo '<div class="alert alert-success" role="alert">
  sign up successfully .
</div>';
header('location:user_login.php');
    }else{
        die(mysqli_error($conn));
    }

    }else{
         echo '<div class="alert alert-danger" role="alert">
            Invalid Credanstiol!
         </div>';
        
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
    <div class="container my-3">
        <h1 class="text-center mb-3">Sign up</h1>
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
                <input type="file" class="form-control" name="user_image" >
            </div>
            <button type="submit" class="btn btn-primary w-100" name="signup">Submit</button>
        </form>
        <p class="text-center my-5">you have already account <a href="login.php">Log in</a></p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>