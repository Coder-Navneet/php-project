<?php
include '../common/conn.php';


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
    <?php
    $sql = "SELECT * FROM category";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num > 0) {
        $i = 1; ?>
        <div class="container mt-5">
            <h1 class="text-center ">Category</h1>
            <table class="table mt-5 ">
                <thead class="table-info">
                    <tr>
                        <th scope="col">S. no.</th>
                        <th scope="col">Category Name</th>
                        <th scope="col" colspan="2">Opration</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($rows = mysqli_fetch_assoc($result)) {
                        echo '
                              <tr >
                                <th scope="row">' . $i . '</th>
                                <td>' . $rows['category_name'] . '</td>
                                <td><a href="dashboard.php?category_update=' . $rows['category_id'] . '"  class="btn btn-primary" >update</a> </td>
                                <td><a href="dashboard.php?category_delete=' . $rows['category_id'] . '"  class="btn btn-danger" >delete</a> </td>
                              </tr>
                            ';
                        $i++;
                    }

                    ?>
                </tbody>
            </table>
        </div>
    <?php
    } else {
    ?>
        <h1 class="text-center text-danger">category not found in database </h1>
    <?php
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>