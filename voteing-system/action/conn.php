<?php
    $host = "localhost" ;
    $username ="root" ;
$password = "";
$dbname = "voteingsystem";
$conn = new mysqli($host , $username ,$password,$dbname);

if (!$conn) {
    die(mysqli_error($conn));
}

?>