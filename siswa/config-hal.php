<?php

if (isset($_GET['url'])) {
    $url = @$_GET['url'];

    // cek data dari url
    switch ($url) {
            /////////////////////////
            // config - bagian histori pembayaran
        case 'histori-pembayaran':
            // halaman tampilan cari data siswa sebelum melakukan entri pembayaran
            include 'histori-pembayaran.php';
            break;
    }
} else {
    # kalau data yg di kirim dari url tidak ada berarti itu home page/halaman dashboard
    include 'home.php';
}
