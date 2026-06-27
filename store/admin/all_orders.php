<?php
include '../common/conn.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> all orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center ">all orders</h1>
        <table class="table text-center mt-5 ">
            <thead class="table-info">
                <tr>
                    <th scope="col">S. no</th>
                    <th scope="col">amount due</th>
                    <th scope="col">invoice number</th>
                    <th scope="col">total product</th>
                    <th scope="col">order date</th>
                    <th scope="col">status</th>
                    <th scope="col">Delete</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM user_orders";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    $i = 1 ;
                    while ($rows = mysqli_fetch_assoc($result)) {
                        // $get_count = "SELECT * FROM order_pending where product_id = $product_id";
                        // $result_count = mysqli_query($conn, $get_count);
                        // $rows_count = mysqli_fetch_assoc($result_count);
                        // $product_sold = $rows_count['quantity'];
                        $order_id = $rows['order_id'];

                    


                        echo '
                              <tr>
                                <th scope="row">'.$i.'</th>
                                <td>' . $rows['amount_due'] . '</td>
                                <td> ' . $rows['invoice_number'] . ' </td>
                                <td>' . $rows['total_product'] . '</td>
                                <td>' . $rows['order_date'] . '</td>
                                <td>' . $rows['order_status'] . '   </td>
                                <td><a data-bs-toggle="modal" data-bs-target="#staticBackdrop"  class="btn btn-danger" >delete</a> </td>                            
                                  </tr>
                            ';
                            $i++ ;
                    }
                }
                ?>
            </tbody>
        </table>
        <!-- Button trigger modal -->
        <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Launch static backdrop modal
</button> -->

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel"></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h4> you sure you want to delete this ? </h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><a href="dashboard.php" class="text-light text-decoration-none">No</a></button>
                        <button type="button" class="btn btn-primary "><a href="dashboard.php?delete_order=<?php echo $order_id; ?>" class="text-light text-decoration-none">yes</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>