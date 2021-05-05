<?php

// jika tombol tambah ditekan
if (isset($_POST['kirim'])) {
    # ambil data yg dikirim dari form modal melalui $_post
    $tahun = $_POST['tahun'];
    $nominal = $_POST['nominal'];

    // cek dulu apakah data spp sudah ada atau belum
    $sql = mysqli_query($conn, "SELECT * FROM spp WHERE tahun='$tahun'");
    $cek  = mysqli_num_rows($sql);

    if ($cek > 0) {
        // jika ada data
        echo "<script>alert('Data SPP Sudah Ada'); window.location='?url=data-spp';</script>";
    } else {
        # jika tidak ada
        // buat query insert data spp masukan ke variable q
        $query = mysqli_query($conn, "INSERT INTO spp VALUES('','$tahun','$nominal')");
        // cek apakah data berhasil di tambah atau tidak
        if ($query) {
            echo "<script>alert('Data Berhasil di Tambahkan!'); window.location='?url=data-spp';</script>";
        } else {
            echo "<script>alert('Data Gagal Di Tambahkan!'); window.location='?url=data-spp';</script>";
        }
    }
}


?>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data SPP</h1>

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
        <h6 class="m-0 font-weight-bold text-primary">Data Tabel SPP</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>ID SPP</th>
                        <th>Tahun</th>
                        <th>Nominal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <!-- mengambil data dari tabel spp dan di tampilkan menggunakan while -->
                <?php $query = mysqli_query($conn, "SELECT * FROM spp ORDER BY tahun ASC");
                $no = 1; ?>
                <tbody>
                    <?php while ($data = mysqli_fetch_assoc($query)) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $data['id_spp']; ?></td>
                            <td><?= $data['tahun']; ?></td>
                            <td>Rp. <?= $data['nominal']; ?>,-</td>
                            <td colspan="3">
                                <a href="?url=update-spp&id=<?= $data['id_spp']; ?>" class="btn btn-primary">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-edit"></i>
                                    </span>Update
                                </a>
                                <a href="?url=delete-spp&id=<?= $data['id_spp']; ?>" class="btn btn-danger" onclick="return confirm('Yakin mau data ini dihapus?');">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-trash"></i>
                                    </span>Delete
                                </a>
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
                <h5 class="modal-title" id="tambahDataLabel">Tambah SPP</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">

                    <!-- form tahun -->
                    <div class="form-group">
                        <label for="tahun">Tahun</label>
                        <input type="number" class="form-control" id="tahun" placeholder="" name="tahun" required autocomplete="off">
                    </div>
                    <!-- akhir form tahun -->

                    <!-- form nominal -->
                    <div class="form-group">
                        <label for="nominal">Nominal</label>
                        <input type="number" class="form-control" id="nominal" placeholder="" name="nominal" required autocomplete="off">
                    </div>
                    <!-- akhir form nominal -->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="kirim">Tambah Data</button>
            </div>
            </form>
        </div>
    </div>
</div>