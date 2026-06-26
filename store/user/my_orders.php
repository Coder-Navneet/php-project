<?php
include '../common/conn.php';
$username =  $_SESSION['username'];
$get_details = "SELECT * FROM user_table WHERE username = '$username' ";
$result_get_details = mysqli_query($conn, $get_details);
while ($row_query = mysqli_fetch_array($result_get_details)) {
    $user_id = $row_query['user_id'];
    $get_order = "SELECT * FROM user_orders WHERE user_id = $user_id ";
    $result_get_order = mysqli_query($conn, $get_order);
    $row_count = mysqli_num_rows($result_get_order);
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <h1>My Order</h1>
        <table class="table ">
            <thead class="table-dark">
                <tr>
                    <th scope="col">S. no.</th>
                    <th scope="col">Amount Due</th>
                    <th scope="col">Total product</th>
                    <th scope="col">Invoice number</th>
                    <th scope="col">Date</th>
                    <th scope="col">Complete/Incomplete</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody class="table-info">

                <?php 
                if ($row_count > 0) {
                    $num = 1;
                    while ($row_data =  mysqli_fetch_array($result_get_order)) {
                        $order_num = $row_data['order_id'];
                        $amount_due = $row_data['amount_due'];
                        $total_product = $row_data['total_product'];
                        $invoice_number = $row_data['invoice_number'];
                        $order_date = $row_data['order_date'];
                        $order_status = $row_data['order_status'];
                        if($order_status == 'pending'){
                            $order_status = 'Incomplete';
                            }else{
                            $order_status = 'Complete';
                        }

                        echo '
                             <tr>
                                    <td scope="row">' . $num . '</td>
                                    <td scope="row">' . $amount_due . '</td>
                                    <td scope="row">' . $total_product . '</td>
                                    <td scope="row">' . $invoice_number . '</td>
                                    <td scope="row">' . $order_date . '</td>
                                    <td scope="row">' . $order_status . '</td>';
                                ?>

                                    <?php 
                                    
                                    if($order_status == 'Complete' ){
                                      echo '  <td scope="row">paid</a></td> ';
                                    }else{

                                       echo  ' <td  scope="row"><a href="confirm_payment.php?order_id='.$order_num.'">confirm</a></td>';
                                    }
                                    echo '</tr>';
                        $num++;
                    }
                }
                ?>

            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>