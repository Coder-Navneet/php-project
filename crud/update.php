<?php
include 'connect.php';
if ($_GET['updateid']) {
    $id = $_GET['updateid'];
    $sql = "SELECT * FROM crud WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $email = $row['email'];
    $mobile = $row['mobile'];
    $password = $row['password'];
}

// echo $id ;
// die;
if (isset($_POST['submit'])) {
    // echo "<pre>";
    // print_r($_POST);
    // echo "<pre>";
    // die;
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $updateid = $_POST['updateid'];

    // echo "$id";
    // echo "$name";
    // echo "$email";
    // echo "$mobile";
    // echo "$password";

    $sql = "UPDATE `crud` SET name='$name',email='$email',mobile='$mobile',password='$password' WHERE id='$updateid'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "update successfuly";
        header('location:display.php');
    } else {
        die(mysqli_error($conn));
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crud Operation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center mt-5">Update User Data</h1>
    <div class="container">
        <form method="post" action="update.php">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo "$name"; ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo "$email"; ?>">
            </div>
            <div class="mb-3">
                <label for="mobile" class="form-label">Mobile No.</label>
                <input type="text" class="form-control" name="mobile" value="<?php echo "$mobile"; ?>">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" value="<?php echo "$password"; ?>">
            </div>
            <input type="hidden" name="updateid" value="<?= $_GET["updateid"] ?> ">
            <button type="submit" class="btn btn-primary  " name="submit">Update</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>