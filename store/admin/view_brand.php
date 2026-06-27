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
    $sql = "SELECT * FROM brand";
    $result = mysqli_query($conn, $sql);
    if ($result) {
    ?>
        <div class="container mt-5">
            <h1 class="text-center ">Brand</h1>
            <table class="table mt-5 ">
                <thead class="table-info">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Brand Name</th>
                       <th scope="col" >update</th>
                        <th scope="col" >Delete</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($rows = mysqli_fetch_assoc($result)) {
                        $brand_id = $rows['brand_id']; 
                        echo '
                              <tr>
                                <th scope="row">' . $rows['brand_id'] . '</th>
                                <td>' . $rows['brand_name'] . '</td>
                                  <td><a href="dashboard.php?brand_update=' . $rows['brand_id'] . '"  class="btn btn-primary" >update</a> </td>
<td><a data-bs-toggle="modal" data-bs-target="#staticBackdrop"  class="btn btn-danger" >delete</a> </td>                              </tr>
                            ';
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
                            <button type="button" class="btn btn-primary "><a href="dashboard.php?brand_delete=<?php echo $brand_id; ?>" class="text-light text-decoration-none">yes</a></button>
                        </div>
                    </div>
                </div>
            </div>
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