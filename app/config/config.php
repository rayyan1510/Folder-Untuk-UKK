<?php

$host = 'localhost';
$username = 'root';
$pass   = '';
$db = 'db_spp';

$conn = mysqli_connect($host, $username, $pass, $db);

if (mysqli_connect_errno()) {
    # code...
    echo "Koneksi Database Gagal";
}

// URL KONSTANT
define('BASEURL', 'http://localhost/pembayaran_spp/');
