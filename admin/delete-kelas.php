<?php


$id_kelas = mysqli_real_escape_string($conn, htmlspecialchars($_GET['id']));
$query = mysqli_query($conn, "DELETE FROM kelas WHERE id_kelas = $id_kelas");
// cek apakah $query bernilai 1 atau true
if ($query > 0) {
    # Jika berhasil
    echo "<script>alert('Data Berhasil Di Hapus'); window.location='?url=data-kelas';</script>";
} else {
    # jika gagal
    echo "<script>alert('Data Gagal Di Hapus'); window.location='?url=data-kelas';</script>";
    // echo 'gagal dihapus';
}
