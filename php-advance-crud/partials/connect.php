<?php

$conn = mysqli_connect('localhost','root','root','userdata');
if (!$conn) {
    die(mysqli_error($conn));
}else{
    echo "connection successfully";
}

?>