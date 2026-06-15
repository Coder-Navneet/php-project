<?php
include 'connect.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crud Operation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center mt-5 h1">Users Data</h1>

    <div class="container"> 
        <button class="btn btn-primary my-5"><a href="user.php" class="text-white ">Add user</a></button>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">S.No.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile NO.</th>
                    <th scope="col">Password</th>
                    <th scope="col">Operations</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $a = 1 ;
                $sql = "select * from `crud` ";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $name = $row['name'];
                        $email = $row['email'];
                        $mobile = $row['mobile'];
                        $password = $row['password'];
                        echo  '  <tr>
                          <th scope="row">' . $a . '</th>
                          <td>' . $name . '</td>
                          <td>' . $email . '</td>
                          <td>' . $mobile . '</td>
                          <td>' . $password . '</td>
                          <td><button class="btn btn-primary"><a href="update.php?updateid='.$id.'" class="text-white text-decoration-none">update</a></button></td>
                          <td><button class="btn btn-danger"> <a href="delete.php?deleteid='.$id.'" onclick="return confirm("Are you sure you want to delete this item?");" class="text-white text-decoration-none" >delete</a></button></td>
                          </tr>';
                          $a++;
                    }
                }

                ?>

            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>