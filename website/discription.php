<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <!-- Bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <!-- style css -->
    <link rel="stylesheet" href="./public/style.css">
</head>

<body>
    <div class="carousel-inner slider">
        <!-- header start -->
        <?php include './common/header.php'; ?>
        <!-- header end -->

        <div class="container-fluid p-5 ">
             <div class=" p-5  bg-warning">
            <?php
            include 'common/conn.php';
            $id= $_GET['id'];
            $sql = "SELECT * FROM blog WHERE id = $id" ;
            $result = mysqli_query($conn,$sql);
            if($row=mysqli_fetch_assoc($result)){
                echo '<h1 >'.$row['topic_name'].'</h1>
                <p>'.$row['topic_dis'].'</p>
                <button class="btn btn-primary"><a href="#discription" class="text-light">read more</a></button>';
            

            ?>
           
                
            </div>

        </div>

        <!-- carousel start -->

        <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>

            <div class="carousel-item active">
                <img src="public/img/image1.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="public/img/image2.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="public/img/image3.png" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- carousel end-->
<div class="container-fluid  my-3" >

    <div class="container text-center p-5 bg-warning" >
        <?php
        echo ' <h1 class="pt-5 " id="discription">'.$row['topic_name'].'</h1>
        <p class="ps-5">'.$row['topic_dis'].'</p>';

            }
        ?>
    </div>
</div>

<!-- footer start -->
 <?php include 'common/footer.php' ?>
<!-- footer end -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>

</html>