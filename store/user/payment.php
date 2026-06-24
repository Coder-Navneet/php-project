<?php

require_once  '../function/common_function.php';
require_once  '../common/conn.php';

$ip = getUserIpAddr();

$sql = "SELECT * FROM user_table WHERE user_ip = '$ip'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$user_id = $row['user_id'];

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
  <h1 class="text-center">payment method</h1>
  <div class="container my-5 ">

    <div class="row d-flex justify-content-center align-items-center">
      <div class="col-md-6  ">
        <img src="../images/payment.png" alt="payment image" class="w-75 d-block ms-auto">
      </div>
      <div class="col-md-6  text-center">

        <button class="btn btn-primary "><a href="order.php?user_id=<?php echo $user_id; ?>" class="text-light text-decoration-none ">Pay offline</a></button>

      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>