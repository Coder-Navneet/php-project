<?php 

    $host = "localhost";
    $username = "root";
    $password = "root";
    $db = "crudoperation";

    $conn = new mysqli($host ,$username,$password,$db);

    if(!$conn){
        die(mysqli_error($conn));
    }

?>