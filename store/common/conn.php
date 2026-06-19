<?php

$host = "localhost";
$username= "root";
$password = "";
$dbname = "mystore";

$conn = new mysqli("$host","$username","$password","$dbname");
if(!$conn){
    die(mysqli_error($conn));
}

?>