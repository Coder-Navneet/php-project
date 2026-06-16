<?php
session_start();
include "conn.php";
$username = $_POST['name'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$password = $_POST['password'];
$std = $_POST['std'];

$sql = "SELECT * FROM data WHERE name ='$username' AND mobile ='$mobile' AND  email ='$email' AND password ='$password' AND standard='$std'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $sqlgroup = "SELECT name, images , email,vote,id FROM data WHERE standard='group'";
    $resultgroup = mysqli_query($conn,$sqlgroup);
    if (mysqli_num_rows($resultgroup) > 0) {
        $groups = mysqli_fetch_all($resultgroup, MYSQLI_ASSOC);
        $_SESSION['groups'] = $groups;
    }
    $data = mysqli_fetch_array($result);
    $_SESSION['id'] = $data['id'];
    $_SESSION['status'] = $data['status'];
    $_SESSION['data'] = $data;

    echo '<script>  
        window.location="../dashboard.php";
        </script>';
} else {
    
    echo '<script>  alert("Invalid Credentials");
        window.location="../index.php";
        </script>';
}
