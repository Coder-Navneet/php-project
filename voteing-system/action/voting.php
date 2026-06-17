<?php
session_start();
include 'conn.php';

$votes = $_POST['groupsvote'];
$totalvotes = $votes + 1;

$git = $_POST['groupsid'];
$uid = $_SESSION['id'];
$groups_sql = "UPDATE data set vote = $totalvotes WHERE id='$git'";
$updatevotes = mysqli_query($conn, $groups_sql);
$staues_sql = "UPDATE data set status = 1 WHERE id='$uid'";
$updatestatus = mysqli_query($conn, $staues_sql);
if($_SESSION['status']==0){
if($updatevotes && $updatestatus ){
    $sql = "SELECT name,images,vote,id FROM data WhERE standard='group'";
    $getgroups=mysqli_query($conn,$sql);
    $groups=mysqli_fetch_all($getgroups,MYSQLI_ASSOC);
    $_SESSION['groups']=$groups;
    $_SESSION['status']=1;
        echo '<script>
    alert("voted successfully");
    window.location="../dashboard.php";
    </script>';
}else{
    echo '<script>
    alert("Technical error !! Vote after sometimne");
    window.location="../dashboard.php";
    </script>';
}}else{
    echo '<script>
    alert("you give voted already !");
    window.location="../dashboard.php";
    </script>';
}

?>
