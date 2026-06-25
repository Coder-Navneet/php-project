<?php
if (isset($_GET['edit_account'])) {
    $user_name = $_SESSION['username'];
    $sql = "SELECT * FROM user_table WHERE username = '$user_name'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $userid = $row['user_id'];
    $username = $row['username'];
    $useraddress = $row['user_address'];
    $useremail = $row['user_email'];
    $usermobile = $row['user_mobile'];
    $userimage = $row['user_image'];

    if (isset($_POST['update'])) {
        $update_id = $userid;

        $name = $_POST['name'];
        $address = $_POST['address'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $user_image = $_FILES['user_image']['name'];
        $tmp_image = $_FILES['user_image']['tmp_name'];
        move_uploaded_file($tmp_image, "./user_images/$user_image");

        $select_query = "UPDATE user_table set username='$name',user_address='$address',user_mobile ='$mobile',user_email='$email',user_image='$user_image'   WHERE user_id='$update_id' ";
        $select_result = mysqli_query($conn, $select_query);

        if ($select_result) {
                    echo "<script>alert(' data update successfully ');</script>";                   
                    echo "<script>window.open('user_logout.php','_self');</script>";                   
                }
    }
}


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign In page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div class="container my-3">
        <h1 class="text-center mb-3">Edit account</h1>
        <form class="w-50 mx-auto" method="post" action="" enctype="multipart/form-data">
            <div class="mb-3">
                <input type="text" class="form-control" name="name" value="<?php echo $username; ?>" placeholder="Enter your name">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="address" placeholder="Enter Your Address" value="<?php echo $useraddress; ?>">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="mobile" placeholder="Enter Your Mobile Number" value="<?php echo $usermobile; ?>">
            </div>
            <div class="mb-3">
                <input type="email" class="form-control" name="email" placeholder="Enter Your Email" value="<?php echo $useremail; ?>">
            </div>
            <div class="mb-3 bg-light row">
                <div class="col-8">
                    <input type="file" class="form-control w-100" name="user_image" value="<?php echo $userimage; ?>">
                </div>
                <div class="col-4">

                    <img src="./user_images/<?php echo $userimage; ?>" alt="" class="img w-50 ">
                </div>

            </div>
            <button type="submit" class="btn btn-primary w-100" name="update">Update</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>