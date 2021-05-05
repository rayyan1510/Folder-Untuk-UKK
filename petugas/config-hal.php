<?php

if (isset($_GET['url'])) {
    $url = @$_GET['url'];

    // cek data dari url
    switch ($url) {
            /////////////////////////
            // config - bagian pembayaran
        case 'transaksi-pembayaran':
            // halaman tampilan cari data siswa sebelum melakukan entri pembayaran
            include 'transaksi-pembayaran.php';
            break;

        case 'entri-pembayaran':
            # halaman entri pembayaran
            include 'entri-pembayaran.php';
            break;

        case 'delete-pembayaran':
            # halaman delete pembayaran
            include 'delete-pembayaran.php';
            break;

        case 'cetak-pembayaran':
            # halaman cetak pembayaran
            include 'cetak-pembayaran.php';
            break;
    }
} else {
    # kalau data yg di kirim dari url tidak ada berarti itu home page/halaman dashboard
    include 'home.php';
}
