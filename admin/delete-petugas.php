<?php

$id_petugas = mysqli_real_escape_string($conn, htmlspecialchars($_GET['id']));
$query = mysqli_query($conn, "DELETE FROM petugas WHERE id_petugas = $id_petugas");
// cek apakah $query bernilai 1 atau true
if ($query > 0) {
    # Jika berhasil
    echo "<script>alert('Data Berhasil Di Hapus'); window.location='?url=data-petugas';</script>";
} else {
    # jika gagal
    echo "<script>alert('Data Gagal Di Hapus'); window.location='?url=data-petugas';</script>";
    // echo 'gagal dihapus';
}
