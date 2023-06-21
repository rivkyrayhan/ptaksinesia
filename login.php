<?php 
    require "controller/database.php";
    if (isset($_POST['signin'])) {
        $userEmail = $_POST['user-email'];
        $password = $_POST['password'];
        $checkUsername = mysqli_query($databaseConn, "SELECT * FROM users WHERE username = '$userEmail'");
        if (mysqli_num_rows($checkUsername) === 1) {
            $row = mysqli_fetch_assoc($checkUsername);
            if (password_verify($password, $row["password"])) {
                header("Location: views/customers/dashboard.php");
                exit;
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/logo-nav.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/style-login.css">
    <link rel="stylesheet" href="assets/css/style-about.css">
    <link rel="stylesheet" href="assets/css/style-layanan.css">
    <link rel="stylesheet" href="assets/css/style-contact.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>
<body>
    <?php include 'layouts/header.php'; ?>
    <section id="form">
        <div class="container">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="user-email" class="form-label">Username :</label>
                    <input type="user-email" name="user-email" class="form-control" autofocus id="user-email">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password :</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" name="signin" class="btn btn-primary" style="width: 100%;">Login</button>
            </form>
        </div>
    </section>
    <section id="register">
        <div class="container">
            <p class="mt-3 text-center text-reg">Belum punya akun? Register disini <a href="register.php">Register</a></p>
        </div>
    </section>
    <script src="assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>