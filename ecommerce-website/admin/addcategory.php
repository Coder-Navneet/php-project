<?php
session_start();
if (isset($_POST['submit'])) {
    include '../common/conn.php';
    $category = $_POST['category'];

    $sql = "INSERT INTO category (category) VALUES ('$category')";
    // $sql = "SELECT * FROM admin_users WHERE email = '$email' AND password = $password ";

    $result = mysqli_query($conn,$sql);
    if ($result) {
        
        echo '<div class="alert alert-success" role="alert">
  Category add successfully .
</div>';
    } else {
        echo "Invalid credantiol";
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
        <h1 class="text-center mb-3">Add Category</h1>
        <form class="w-50 mx-auto" method="post" action="addcategory.php">
            <div class="mb-3">
                <label for="category" class="form-label">category </label>
                <input type="text" class="form-control" name="category">
            </div>

            <button type="submit" class="btn btn-primary w-100" name="submit">submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>