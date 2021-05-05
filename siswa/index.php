<?php

session_start();

require '../app/config/config.php';

if (isset($_SESSION['nisn'])) {
    $nisn = $_SESSION['nisn'];
} else {
    header('Location: ../login/login-siswa.php');
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="../app/assets/vendor/bootstrap-4.6.0/css/bootstrap.min.css">
    <!-- my css -->
    <link rel="stylesheet" href="../app/assets/css/style.css">

    <title>Aplikasi Pembayaran SPP</title>
</head>

<body>

    <?php include '../app/template/header.php'; ?>

    <?php include 'config-hal.php'; ?>

    <?php include '../app/template/footer.php'; ?>


    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="./app/assets/vendor/bootstrap-4.6.0/js/bootstrap.min.js"></script>

    <!-- my js -->
    <script src="./app/assets/js/script.js"></script>
</body>

</html>