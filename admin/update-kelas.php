<?php

// ambil id_kelas dari $_GET[id]; simpan ke dalam varible $id_kelas
$id_kelas = $_GET['id'];
// buat query untuk menampilkan data kelas berdasarkan id yg di kirim dari $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM kelas WHERE id_kelas = '$id_kelas'");
$hasil = mysqli_fetch_assoc($query);

// jika apakah tombol update ditekan
if (isset($_POST['kirim'])) {
    $id_kelas   = $_POST['id_kelas'];
    $nama_kelas = strtoupper(htmlspecialchars($_POST['nama_kelas']));
    $kompetensi_keahlian = ucwords(htmlspecialchars($_POST['kompetensi_keahlian']));

    // cek apakah kelas sudah ada atau belum
    $cek = mysqli_query($conn, "SELECT * FROM kelas WHERE nama_kelas='$nama_kelas'");
    $a = mysqli_num_rows($cek);
    if ($a > 0) {
        echo "<script>alert('Data Kelas Sudah Ada'); window.location='?url=data-kelas';</script>";
    } else {
        // buat query update data kelas masukan ke variable q
        $q = mysqli_query($conn, "UPDATE kelas SET nama_kelas='$nama_kelas', kompetensi_keahlian='$kompetensi_keahlian' WHERE id_kelas='$id_kelas'");
        // cek apakah data berhasil di tambah atau tidak
        if ($q) {
            echo "<script>
                alert('Data Berhasil di Ubah!');
                window.location='?url=data-kelas';
            </script>";
        } else {
            echo "<script>alert('Data Gagal Di Ubah!');</script>";
        }
    }
}

?>

<!-- Basic Card Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Update Data Kelas</h6>
    </div>
    <div class="card-body">
        <form action="" method="post">
            <!-- form id kelas -->
            <input type="hidden" name="id_kelas" value="<?= $hasil['id_kelas']; ?>">
            <!-- akhir form id kelas -->

            <!-- form nama kelas -->
            <div class="form-group">
                <label for="nama">Nama Kelas</label>
                <input type="text" class="form-control" id="nama" placeholder="" name="nama_kelas" value="<?= $hasil['nama_kelas']; ?>" required autocomplete="off">
            </div>
            <!-- akhir form nama kelas -->

            <!-- form kompetensi -->
            <div class="form-group">
                <label for="kompetensi">Kompetensi Keahlian</label>
                <input type="text" class="form-control" id="kompetensi" value="<?= $hasil['kompetensi_keahlian']; ?>" placeholder="" name="kompetensi_keahlian" required autocomplete="off">
            </div>
            <!-- akhir form kompetensi -->

            <a href="?url=data-kelas" class="btn btn-primary">
                <span class="icon text-white-50">
                    <i class="fas fa-arrow-left"></i>
                </span>Kembali
            </a>

            <button type="submit" name="kirim" class="btn btn-warning">
                <span class="icon text-white-50">
                    <i class="fas fa-edit"></i>
                </span>Update
            </button>
        </form>
    </div>
</div>