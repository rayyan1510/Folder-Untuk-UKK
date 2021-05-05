<?php

$id_pembayaran =  $_GET['id'];

$queryHapusPembayaran = mysqli_query($conn, "DELETE FROM pembayaran WHERE id_pembayaran ='$id_pembayaran'");
// cek apakah $query bernilai 1 atau true
if ($queryHapusPembayaran > 0) {
    # Jika berhasil
    echo "<script>alert('Data Berhasil Di Hapus'); window.location='?url=transaksi-pembayaran';</script>";
} else {
    # jika gagal
    echo "<script>alert('Data Gagal Di Hapus'); window.location='?url=transaksi-pembayaran';</script>";
}
