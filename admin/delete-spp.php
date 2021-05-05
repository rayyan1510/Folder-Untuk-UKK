<?php

$id_spp = mysqli_real_escape_string($conn, htmlspecialchars($_GET['id']));
$query = mysqli_query($conn, "DELETE FROM spp WHERE id_spp = $id_spp");
// cek apakah $query bernilai 1 atau true
if ($query > 0) {
    # Jika berhasil
    echo "<script>alert('Data Berhasil Di Hapus'); window.location='?url=data-spp';</script>";
} else {
    # jika gagal
    echo "<script>alert('Data Gagal Di Hapus'); window.location='?url=data-spp';</script>";
    // echo 'gagal dihapus';
}
