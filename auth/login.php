<?php
include("conn.php");
session_start();
if (isset($_POST["login"])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `accounts` WHERE `username` = '$username' AND `password` = '$password'";
    $result = mysqli_query($conn, "$sql");
    $row = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {

        $_SESSION['username'] = $row['username'];
        $_SESSION['password'] = $row['password'];
        header('Location: ../index.php?path=Dashboard&action=Login Successfully!');
    } else {

        header('Location: ../login.php?action=Login Failed!');
    }
} else {

    header('Location: ../login.php');
}
