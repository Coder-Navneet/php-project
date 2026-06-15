<?php

include 'connect.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $mobile = $_POST['mobile'];
    $image = $_FILES['file'];

    // echo " $username <br/>";
    // echo "$mobile <br>";
    // print_r($image);

    $imagefilename = $image['name'];
    // print_r($imagefilename);
    // echo "<br>";
    $imagefileError = $image['error'];
    // print_r($imagefileError);
    // echo "<br>";

    $imagefiletemp = $image['tmp_name'];
    // print_r($imagefiletemp);
    // echo "<br>";

    $filename_separate = explode('.', $imagefilename);
    // print_r($filename_separate);
    // $file_extension =strtolower($filename_separate[1]);
    // print_r($file_extension);

    $file_extension = strtolower(end($filename_separate));
    // print_r($file_extension);

    $extension = array('jpeg', 'jpg', 'png');
    if (in_array($file_extension, $extension)) {
        $upload_image = 'image/' . $imagefilename;
        move_uploaded_file($imagefiletemp, $upload_image);

        $username = $_POST['username'];
        $sql = "INSERT INTO registration (name,mobile,images) VALUES('$username','$mobile','$upload_image')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo '
            <div class="alert alert-success" role="alert">
             data insert successfully
            </div>';
        } else {
            die(mysqli_error($conn));
        }
    }
}
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
    <h1 class="text-center display-3 fw-bold my-5">User Data</h1>
    <div class="container  d-flex justify-content-center">

        <table class="table table-bordered w-50 text-center">
            <thead class="table-dark">
                <tr>
                    <th scope="col">S no.</th>
                    <th scope="col">username</th>
                    <th scope="col">images</th>
                </tr>
            </thead>
            <tbody>
            <?php
        $sql = "SELECT * FROM registration ";
        $result = mysqli_query($conn,$sql);
            $i = 1;
            if ($result) {
                while($row = mysqli_fetch_assoc($result)){
                    echo '
                     <tr>
                    <td>'.$i.'</td>
                    <td>'.$row['name'].'</td>
                    <td> <img src="'.$row['images'].'" alt="" class="w-25"> </td>
                </tr>
                    ' ;
                    $i++ ; 
                }
            }

            ?>
               
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>