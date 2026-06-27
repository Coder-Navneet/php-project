<?php
session_start();
include '../common/conn.php';
include '../function/common_function.php';

if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    $sql = "SELECT * FROM user_orders where order_id = '$order_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $invoice_number = $row['invoice_number'];
    $amount_due = $row['amount_due'];
}

if (isset($_POST['confirm_payment'])) {
    $invoice = $_POST['invoice_number'];
    $amount = $_POST['amount'];
    $payment_mode = $_POST['payment_mode'];
    $insert_payment = "INSERT INTO  user_payment (order_id,invoice_number,amount,payment_mode,date) VALUES ($order_id,$invoice ,$amount,'$payment_mode',NOw())";
    $result_payment = mysqli_query($conn, $insert_payment);
    if ($result_payment) {
        echo "<script>alert('Successfully complete the payment')</script>";
        echo "<script>window.open('profile.php?my_orders','_self')</script>";
    }

    $update_order = "UPDATE user_orders set order_status = 'Complete' WHERE  order_id = $order_id";
    $result_order = mysqli_query($conn, $update_order);
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

<body class="bg-secondary">

    <div class="container text-center mt-5">
        <h1>Confirm Payment</h1>
        <form action="" method="post">
            <div class="form-outline my-4 text-center mx-auto w-50">
                <input type="text" name="invoice_number" class="form-control w-50 mx-auto" value="<?php echo $invoice_number; ?>">
            </div>
            <div class="form-outline my-4 text-center mx-auto w-50">
                <label for="amount">Amount</label>
                <input type="text" name="amount" class="form-control w-50 mx-auto" value="<?php echo $amount_due; ?>">
            </div>
            <div class="form-outline my-4 text-center mx-auto w-50">
                <select name="payment_mode" class="form-select w-50 mx-auto">
                    <option value="">payment mode</option>
                    <option value="UPI">UPI</option>
                    <option value="Netbanking">Netbanking</option>
                    <option value="Paypal">Paypal</option>
                    <option value="Cash on Delivery">Cash on Delivery</option>
                    <option value="Pay Offline">Pay Offline</option>
                </select>
            </div>
            <div>
                <input type="submit" value="Confirm payment" name="confirm_payment" class="btn btn-primary mx-auto d-block">
            </div>
        </form>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>