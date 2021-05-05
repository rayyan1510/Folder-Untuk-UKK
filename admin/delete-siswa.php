<?php

$nisn = mysqli_real_escape_string($conn, htmlspecialchars($_GET['nisn']));
$query = mysqli_query($conn, "DELETE FROM siswa WHERE nisn = $nisn");
// cek apakah $query bernilai 1 atau true
if ($query > 0) {
    # Jika berhasil
    echo "<script>alert('Data Berhasil Di Hapus'); window.location='?url=data-siswa';</script>";
} else {
    # jika gagal
    echo "<script>alert('Data Gagal Di Hapus'); window.location='?url=data-siswa';</script>";
    // echo 'gagal dihapus';
}
