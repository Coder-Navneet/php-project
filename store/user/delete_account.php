<?php

if (isset($_POST['delete'])) {
    $username = $_SESSION['username'];
    $delete_sql = "DELETE  FROM user_table where username = '$username'";
    $result = mysqli_query($conn, $delete_sql);
    if ($result) {
        session_unset();
        session_destroy();
        echo "<script>alert('Account Deleted Successfully ')</script>";
        echo "<script>window.open('../index.php','_self')</script>";
    }
}
if (isset($_POST['dont_delete'])) {
    echo "<script>window.open('profile.php','_self')</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>

    <div class="container text-center mt-5">
        <h1>Delete Account</h1>
        <form action="" method="post">
            <div class="form-outline my-4 text-center mx-auto w-50">
                <input type="submit" name="delete" class="form-control w-50 mx-auto" value="delete account">
            </div>
            <div class="form-outline my-4 text-center mx-auto w-50">
                <input type="submit" name="dont_delete" class="form-control w-50 mx-auto" value="Don't delete account">
            </div>

        </form>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>