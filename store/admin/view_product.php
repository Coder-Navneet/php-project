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
        <h1 class="text-center ">product</h1>
        <table class="table text-center mt-5 ">
            <thead class="table-info">
                <tr>
                    <th scope="col">S. no.</th>
                    <th scope="col">product title</th>
                    <th scope="col">product image </th>
                    <th scope="col">product price</th>
                    <th scope="col">date</th>
                    <th scope="col" colspan="2">oprations</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM product";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                   
                    while ( $rows = mysqli_fetch_assoc($result)) {
                        echo '
                              <tr>
                                <th scope="row">' . $rows['category_id'] . '</th>
                                <td>' . $rows['product_title'] . '</td>
                                <td> <img src="./product_images/'. $rows['product_image1'] .'" style="width:50px;" > </td>
                                <td>' . $rows['product_price'] . '</td>
                                <td>' . $rows['date'] . '</td>
                                <td><button class="btn btn-primary" ><a href="#" class="text-light text-decoration-none">edit</a></button></td>
                                <td><button class="btn btn-danger"><a href="#" class="text-light text-decoration-none">delete</a></button></td>
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