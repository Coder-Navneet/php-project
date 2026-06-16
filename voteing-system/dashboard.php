<?php
session_start();
$data=$_SESSION['data'];
if($_SESSION['status']==1){
    $status='<b class = "ms-2 text-sucsess">Voted</b>';
}else{
    $status='<b class = "ms-2 text-danger">Not Voted</b>';
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Voteing System Dasboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="bg-secondary">
    <div class="container my-5">
        <button class="btn btn-dark"><a href="index.php" class="text-light text-decoration-none">Back</a></button>
        <button class="btn btn-dark"><a href="logout.php" class="text-light text-decoration-none">Log out</a></button>
        <h1 class="my-3">Voting System </h1>
        <div class="row mt-5">
            <!-- group -->
             
            <div class="col-7">
                <?php if(isset($_SESSION['groups'])){
                  $groups =  $_SESSION['groups'];
                  for($i=0;$i<count($groups);$i++){
?>                  <div class="row">
                    <div class="col-md-4">
                        <img src="uploads/<?php echo  $groups[$i]['images'];?>" alt="" class="w-50">
                    </div>
                    <div class="col-md-8">
                        <strong class="h5 ">group name:<?php echo $groups[$i]['name'];?></strong> <br>
                        <strong class="h5">Votes:<?php echo $groups[$i]['vote'];?></strong>
                    </div>
                </div>
                <hr class="text-light ">
            </div>
<?php
                }
                }
             ?>
                
            <!-- user profile -->
            <div class="col-5">

                <img src="uploads/<?php echo $data['images'] ; ?>" alt="" class="w-50" >
                <div class="ms-3 mt-2" >
                    <strong class="h5">Name:<?php echo $data['name'] ; ?></strong><br>
                    <strong class="h5">Mobile:<?php echo $data['mobile'] ; ?></strong><br>
                    <strong class="h5">Status:<?php echo $status ; ?></strong>
                </div>
            </div>

        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>