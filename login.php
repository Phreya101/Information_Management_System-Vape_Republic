<?php
session_start();
if (isset($_SESSION["username"])) {
    header("location: index.php?path=Dashboard");
}
include("auth/conn.php");
date_default_timezone_set("Asia/Manila");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logo.ico">
    <title>Vape Republic - Login</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

</head>
<style>
    body {
        width: 100vw;
        height: 100vh;
        background-image: url('img/Background.png');
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .container-fluid {
        border: none;
        border-radius: 10px;
        box-shadow: -20px 25px 20px lightcoral;
        background-color: whitesmoke;
    }
</style>

<body class="p-5">
    <div class="container-fluid d-flex justify-content-lg-center flex-column mt-5" style="width: 35%">
        <div class="align-self-center">
            <img src="img/logo.jpg" alt="Logo" width="150" height="150" class=" rounded-circle mt-5 mb-3">
        </div>
        <div class="align-self-start h3 fw-bolder text-primary-emphasis mx-3 my-0 ">
            WELCOME
        </div>
        <?php if (isset($_GET["action"]) && $_GET["action"] == "Login Failed!") : ?>
            <div class="align-self-start mx-3 text-danger mb-2">
                Invalid username/password!
            </div>
        <?php else : ?>
            <div class="align-self-start mx-3 text-dark-emphasis mb-2">
                Enter your credentials here!
            </div>
        <?php endif; ?>
        <hr class="border-2 border-dark opacity-50 my-0">
        <form action="auth/login.php" method="post">
            <div class="form-group my-3 mx-3">
                <label for="username" class="fw-bold mb-2">USERNAME</label>
                <input type="text" name="username" id="username" class="form-control shadow-lg" required>
            </div>

            <div class="form-group my-3 mx-3">
                <label for="password" class="fw-bold mb-2">PASSWORD</label>
                <input type="password" name="password" id="password" class="form-control shadow-lg" required>
            </div>

            <div class="form-group mt-4 mb-3 mx-3">
                <button type="submit" name="login" class="btn btn-primary px-5">Login</button>
            </div>
        </form>

    </div>

</body>



</html>