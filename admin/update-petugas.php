<?php
// ambil id_spp dari $_GET[id]; simpan ke dalam varible $id_spp
$id = $_GET['id'];

// buat query untuk menampilkan data petugas berdasarkan id yg dikirim dari $_GET['id']
$query = mysqli_query($conn, "SELECT * FROM petugas WHERE id_petugas='$id'");
$petugas = mysqli_fetch_assoc($query);

// jika tombol update ditekan
if (isset($_POST['kirim'])) {
    # ambil data petugas dari form 
    $id_petugas = htmlspecialchars($_POST['id_petugas']);
    $username   = mysqli_real_escape_string($conn, $_POST['username']);
    $password   = mysqli_real_escape_string($conn, $_POST['password']);
    $nama_petugas = ucwords(htmlspecialchars($_POST['nama_petugas']));
    $level = 'petugas';
    // buat query update 
    $queryPetugas = mysqli_query($conn, "UPDATE petugas SET username='$username', password='$password', nama_petugas='$nama_petugas' WHERE id_petugas='$id_petugas'");
    if ($queryPetugas > 0) {
        // jika ada kembali ke data spp
        echo "<script>
                alert('Data Berhasil di Ubah!');
                window.location='?url=data-petugas';
            </script>";
    } else {
        echo "<script>alert('Data Gagal Di Ubah!');</script>";
    }
}

?>

<!-- Basic Card Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Update Data Petugas</h6>
    </div>
    <div class="card-body">
        <form action="" method="post">
            <!-- form id_petugas -->
            <input type="hidden" name="id_petugas" value="<?= $petugas['id_petugas']; ?>">
            <!-- akhir form id petugas -->

            <!-- form username -->
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" placeholder="" name="username" value="<?= $petugas['username']; ?>" autocomplete="off" required>
            </div>
            <!-- akhir form username -->

            <!-- form password -->
            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" class="form-control" id="password" placeholder="" name="password" value="<?= $petugas['password']; ?>" autocomplete="off" required>
            </div>
            <!-- akhir form password -->

            <!-- form nama petugas -->
            <div class="form-group">
                <label for="namaPetugas">Nama Petugas</label>
                <input type="text" class="form-control" id="namaPetugas" placeholder="" name="nama_petugas" value="<?= $petugas['nama_petugas']; ?>" autocomplete="off" required>
            </div>
            <!-- akhir form nama petugas -->

            <a href="?url=data-petugas" class="btn btn-primary">
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