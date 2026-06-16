<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crud</title>

    <!-- bootstrap css  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header class="bg-dark">
        <h1 class="text-light text-center p-3">PHP Advance Crud</h1>
    </header>
    <div class="container">
        <!-- form modal start -->



        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add and update users</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- form start  -->
                        <form id="addform" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <!-- name input -->
                                <div class="mb-3">
                                    <label for="username" class="form-label">Name :</label>
                                    <div class="input-group ">
                                        <span class="input-group-text bg-dark" id="basic-addon1">
                                            <i class="fa-solid fa-user  text-light fs-4"></i>
                                        </span>
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter your name">
                                    </div>
                                </div>

                                <!-- email input  -->
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email :</label>
                                    <div class="input-group ">
                                        <span class="input-group-text bg-dark" id="basic-addon1">
                                            <i class="fa-regular fa-envelope text-light fs-4"></i>
                                        </span>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                                    </div>
                                </div>
                                <!-- phone input  -->
                                <div class="mb-3">
                                    <label for="mobile" class="form-label">Mobile:</label>
                                    <div class="input-group ">
                                        <span class="input-group-text bg-dark" id="basic-addon1">
                                            <i class="fa-solid fa-phone text-light fs-4"></i>
                                        </span>
                                        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter your phone No." maxlength="10" minlength="10">
                                    </div>
                                </div>

                                <!-- Photo input  -->
                                <div class="mb-3">
                                    <label for="userphoto" class="form-label">Photo:</label>
                                    <div class="input-group ">
                                        <label for="userphoto" class="custom-file-label"></label>
                                        <input type="file" class="custom-file-input" id="userphoto" name="photo" >
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-dark">Submit</button>
                    </div>
                    </form>
                    <!-- form end    -->
                </div>
            </div>
        </div>
        <!-- form modal end -->

        <div class="row my-3 ">
            <div class="col-10">
                <div class="input-group ">
                    <span class="input-group-text bg-dark" id="basic-addon1"><i class="fa-solid fa-magnifying-glass text-light fs-4 "></i></span>
                    <input type="search" class="form-control " id="exampleInputEmail1" placeholder="Search">
                </div>
            </div>
            <div class="col-2">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add new user </button>
            </div>
        </div>
    </div>

    <div class="container">
        <table class="table  " id="usertable"> 
            <thead class="table-dark ">
                <tr>
                    <th scope="col">Images</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Operations</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><img src="" alt="" class="w-25"></td>
                    <td>Navneet</td>
                    <td>vnavnnee@gmail.com</td>
                    <td>9343817226</td>
                    <td><a href=""><i class="fa-solid fa-eye"></i></a>
                        <a href=""></a>
                        <a href=""></a>
                    </td>
                </tr>
            </tbody>
        </table>
        <nav aria-label="Page navigation example" id="pagination">
            <ul class="pagination justify-content-center">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
    </div>

    <!-- jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- bootstrap popper and js link  -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
</body>

</html>