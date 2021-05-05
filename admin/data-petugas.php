<?php

// jika tombol tambah data sdh di tekan
if (isset($_POST['kirim'])) {
    # ambil data yg dikirim dari form modal melalui $_post
    $username = mysqli_real_escape_string($conn, htmlspecialchars($_POST['username']));
    $password = mysqli_real_escape_string($conn, htmlspecialchars($_POST['password']));
    $nama_petugas = ucwords(htmlspecialchars($_POST['nama_petugas']));
    $level = 'petugas';
    // cek dulu data apakah sudah ada atau belum
    $query = mysqli_query($conn, "SELECT * FROM petugas WHERE username='$username'");
    $cek = mysqli_num_rows($query);
    if ($cek > 0) {
        // jika ada data
        echo "<script>alert('Data Petugas Sudah Ada'); window.location='?url=data-petugas';</script>";
    } else {
        # jika tidak ada
        // buat query insert data petugas masukan ke variable q
        $query = mysqli_query($conn, "INSERT INTO petugas VALUES('','$username','$password','$nama_petugas', '$level')");
        // cek apakah data berhasil di tambah atau tidak
        if ($query) {
            echo "<script>alert('Data Berhasil di Tambahkan!'); window.location='?url=data-petugas';</script>";
        } else {
            echo "<script>alert('Data Gagal Di Tambahkan!'); window.location='?url=data-petugas';</script>";
            // var_dump($query);
        }
    }
}



?>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Petugas</h1>

<div class="row mb-3">
    <div class="col-lg-6">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahData">
            Tambah Data
        </button>
    </div>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Tabel Petugas</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id Petugas</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Nama Petugas</th>
                        <th>Jabatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <!-- mengambil data dari tabel petugas dan di tampilkan menggunakan while -->
                <?php
                $query = mysqli_query($conn, "SELECT * FROM petugas");
                $no = 1;
                ?>
                <tbody>
                    <?php while ($data = mysqli_fetch_assoc($query)) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $data['id_petugas']; ?></td>
                            <td><?= $data['username']; ?></td>
                            <td><?= $data['password']; ?></td>
                            <td><?= $data['nama_petugas']; ?></td>
                            <td><?= $data['level']; ?></td>
                            <td>
                                <!-- button udpate -->
                                <a href="?url=update-petugas&id=<?= $data['id_petugas']; ?>" class="btn btn-primary">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-edit"></i>
                                    </span>Update
                                </a>
                                <!-- akhir button update -->

                                <!-- button delete -->
                                <a href="?url=delete-petugas&id=<?= $data['id_petugas']; ?>" class="btn btn-danger" onclick="return confirm('Yakin mau data ini dihapus?');">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-trash"></i>
                                    </span>Delete
                                </a>
                                <!-- akhir button delete -->
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="tambahDataLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahDataLabel">Tambah Data Kelas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">

                    <!-- form Username -->
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" placeholder="" name="username" required autocomplete="off">
                    </div>
                    <!-- akhir form Username -->

                    <!-- form password -->
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="" name="password" required autocomplete="off">
                    </div>
                    <!-- akhir form password -->

                    <!-- form nama petugas -->
                    <div class="form-group">
                        <label for="namaPetugas">Nama Petugas</label>
                        <input type="text" class="form-control" id="namaPetugas" placeholder="" name="nama_petugas" required autocomplete="off">
                    </div>
                    <!-- akhir form nama petugas -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="kirim">Tambah Data</button>
            </div>
            </form>
        </div>
    </div>
</div>