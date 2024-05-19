<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("location: login.php");
}

if (!isset($_GET['path'])) {
    header("location: index.php?path=Dashboard");
}
date_default_timezone_set("Asia/Manila");
include("auth/conn.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logo.png">
    <!-- Bootstrap -->
    <link href="libraries\css\bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="libraries\js\bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <!-- Font-awesome -->
    <script src="https://kit.fontawesome.com/bace51c485.js" crossorigin="anonymous"></script>

    <!-- Chart -->
    <script src="libraries\js\chart.js"></script>

    <!-- jquery -->
    <script src="libraries\js\jquery-3.7.1.js"></script>

    <!-- Selectize -->
    <link rel="stylesheet" href="libraries\css\selectize.default.min.css" />

    <script src="libraries\js\selectize.min.js"></script>

    <!-- Datatables -->
    <script src="libraries\js\dataTables.js"></script>
    <link rel="stylesheet" href="libraries\css\dataTables.css">

    <!-- SweetAlert -->
    <script src="libraries\js\sweetalert2@11.js"></script>

    <!-- Date Picker -->
    <link rel="stylesheet" href="libraries\css\bootstrap-datepicker3.min.css">
    <script src="libraries\js\bootstrap-datepicker.min.js"></script>


    <title>Vape Republic - <?php echo $_GET['path'] ?></title>
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

.card {
    border: none;
    border-radius: 10px;
    box-shadow: -10px 10px 20px darkgray;
    background-color: whitesmoke;
}
</style>

<body class="bg-secondary-subtle">