<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="bg-dark">
    <h1 class="text-info text-center p-3">Voteing System</h1>
    <div class="container bg-info p-4 text-center">
        <h1 class="text-center my-3">Log in</h1>
        <form method="post" action="action\login.php">
            <div class="mb-3 ">
                <input type="text" class="form-control w-50 m-auto" name="name" placeholder="Enter your Name">
            </div>
            <div class="mb-3 ">
                <input type="text" class="form-control w-50 m-auto" name="mobile" maxlength="10" minlength="10" placeholder="Enter your Mobile number">
            </div>
            <div class="mb-3 ">   
                <input type="email" class="form-control w-50 m-auto" name="email" placeholder="Enter your Email">
            </div>
            <div class="mb-3">
                <input type="password" class="form-control w-50 m-auto" name="password"  placeholder="Enter your password">
            </div>
            <div class="mb-3 ">
                <select name="std" class="form-select w-50 m-auto" >
                    <option value="group">Group</option>
                    <option value="voter">Voter</option>
                </select>
            </div>
            <button type="submit" class="btn btn-dark" name="login">Log in</button>
        </form>
        <p class="my-3">you not have account <a href="registration.php">Register</a></p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>