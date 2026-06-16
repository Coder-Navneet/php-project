<?php
include 'conn.php';
$name = $_POST['name'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$photo = $_FILES['photo']['name'];
$tmp_name = $_FILES['photo']['tmp_name'];
$std = $_POST['std'];

if ($password != $cpassword) {
    echo '<script>  alert("password does not match");
        window.location="../registration.php";

        </script>';
} else {
    move_uploaded_file($tmp_name, "../uploads/$photo");
    $sql = "INSERT INTO  data(name,email,mobile,password,images,standard,status,vote)VALUES ('$name','$email','$mobile','$password','$photo','$std',0,0)";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo '<script>  alert("Registration Successfull.");
        window.location="../index.php";
        </script>';
    }
}
