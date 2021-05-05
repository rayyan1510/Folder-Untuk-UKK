<?php

// jika tombol tambah data sdh ditekan
if (isset($_POST['kirim'])) {
    $nama_kelas = strtoupper(htmlspecialchars($_POST['nama']));
    $kompetensi_keahlian = ucwords(htmlspecialchars($_POST['kompetensi_keahlian']));
    // cek apakah kelas sudah ada atau belum
    $cek = mysqli_query($conn, "SELECT * FROM kelas WHERE nama_kelas='$nama_kelas'");
    $a = mysqli_num_rows($cek);
    if ($a > 0) {
        echo "<script>alert('Data Kelas Sudah Ada'); window.location='?url=data-kelas';</script>";
    } else {
        // buat query insert data kelas masukan ke variable q
        $q = mysqli_query($conn, "INSERT INTO kelas VALUES('','$nama_kelas','$kompetensi_keahlian')");
        // cek apakah data berhasil di tambah atau tidak
        if ($q) {
            echo "<script>alert('Data Berhasil di Tambahkan!'); window.location='?url=data-kelas';</script>";
        } else {
            echo "<script>alert('Data Gagal Di Tambahkan!'); window.location='?url=data-kelas';</script>";
        }
    }
}
?>

<!-- akhir script -->

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-3">
    <h1 class="h3 mb-0 text-gray-800">Data Kelas</h1>
</div>

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
        <h6 class="m-0 font-weight-bold text-primary">Data Tabel Kelas</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Kelas</th>
                        <th>Kompetensi Keahlian</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <?php
                $query = mysqli_query($conn, "SELECT * FROM `kelas` ORDER BY `kelas`.`nama_kelas` ASC, `kelas`.`kompetensi_keahlian` ASC");
                $no = 1;
                ?>

                <tbody>
                    <?php while ($data = mysqli_fetch_array($query)) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $data['nama_kelas']; ?></td>
                            <td><?= $data['kompetensi_keahlian']; ?></td>
                            <td>
                                <!-- button update data-->
                                <a href="?url=update-kelas&id=<?= $data['id_kelas']; ?>" class="btn btn-primary">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-edit"></i>
                                    </span>Update
                                </a>
                                <!-- akhir button update data -->

                                <!-- button delete data -->
                                <a href="?url=delete-kelas&id=<?= $data['id_kelas']; ?>" class="btn btn-danger" onclick="return confirm('Yakin mau data ini dihapus?');">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-trash"></i>
                                    </span>Delete
                                </a>
                                <!-- akhir button delete data -->
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

                    <!-- form nama kelas -->
                    <div class="form-group">
                        <label for="nama">Nama Kelas</label>
                        <input type="text" class="form-control" id="nama" placeholder="" name="nama" required autocomplete="off">
                    </div>
                    <!-- akhir form nama kelas -->

                    <!-- form kompetensi -->
                    <div class="form-group">
                        <label for="kompetensi">Kompetensi Keahlian</label>
                        <input type="text" class="form-control" id="kompetensi" placeholder="" name="kompetensi_keahlian" required autocomplete="off">
                    </div>
                    <!-- akhir form kompetensi -->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="kirim">Tambah Data</button>
            </div>
            </form>
        </div>
    </div>
</div>