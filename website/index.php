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
    <!-- carousel start -->

    <div class=" ">
        <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner slider">
                <!-- header start -->
                <?php include './common/header.php'; ?>
                <!-- header end -->
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
    </div>
    <!-- carousel end -->
    <!-- card section start -->
    <div class="container my-5">
        <h1 class="text-center">Few language </h1>
        <div class="row">

            <?php
            include 'common/conn.php';
            $sql = "SELECT * FROM blog ";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo '
                <div class="col-md-4 col-sm-12 mt-5">
            <div class="card" style="width: 18rem;">
                <img src="'.$row['img'].'" class="card-img-top w-100 " alt="..." style="height:286px;">
                <div class="card-body">
                    <h5 class="card-title">'.$row['topic_name'].'</h5>
                    <p class="card-text">'.$row['topic_dis'].'</p>
                    <a href="discription.php?id='.$row['id'].'" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
            
        ';
            }

            ?>
        </div>
    </div>
    <!-- card section end -->

    <!-- footer start -->
    <?php include 'common/footer.php' ?>
    <!-- footer end -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>