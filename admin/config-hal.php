<?php

if (isset($_GET['url'])) {
    $url = @$_GET['url'];

    // cek data dari url
    switch ($url) {

            /////////////////////////
            // config - bagian siswa
        case 'data-siswa':
            include 'data-siswa.php';
            break;

        case 'update-siswa':
            # halaman update data siswa
            include 'update-siswa.php';
            break;

        case 'delete-siswa':
            # halaman delete data siswa
            include 'delete-siswa.php';
            break;


            /////////////////////////
            // config - bagian petugas
        case 'data-petugas':
            #halaman data petugas
            include 'data-petugas.php';
            break;

        case 'update-petugas':
            #halaman update data petugas
            include 'update-petugas.php';
            break;

        case 'delete-petugas':
            #halaman delete data petugas
            include 'delete-petugas.php';
            break;


            /////////////////////////
            // config - bagian kelas
        case 'data-kelas':
            // halaman data kelas
            include 'data-kelas.php';
            break;

        case 'update-kelas':
            # halaman update kelas
            include 'update-kelas.php';
            break;

        case 'delete-kelas':
            # halaman delete kelas
            include 'delete-kelas.php';
            break;


            /////////////////////////
            // config - bagian spp
        case 'data-spp':
            // halaman data spp
            include 'data-spp.php';
            break;

        case 'update-spp':
            # include halaman update spp
            include 'update-spp.php';
            break;

        case 'delete-spp':
            # include halaman delete spp
            include 'delete-spp.php';
            break;


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

            /////////////////////////
            // config - bagian generate laporan
        case 'generate-laporan':
            // halaman generate laporan
            include 'generate-laporan.php';
            break;
    }
} else {
    # kalau data yg di kirim dari url tidak ada berarti itu home page/halaman dashboard
    include 'home.php';
}
