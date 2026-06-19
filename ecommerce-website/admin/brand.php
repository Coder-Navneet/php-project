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
    <div class="container mt-5">
        <h1 class="text-center ">Brand</h1>
        <table class="table mt-5 ">
            <thead class="table-info">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Brand Name</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM brand";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                   
                    while ( $rows = mysqli_fetch_assoc($result)) {
                        echo '
                              <tr>
                                <th scope="row">' . $rows['id'] . '</th>
                                <td>' . $rows['brand'] . '</td>
                              </tr>
                            ';
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>