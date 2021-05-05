<?php

// var_dump($_GET, $_SESSION);
$nisn = $_GET['nisn'];

// buat query untuk menampilkan form pembayar spp dari table view siswa
$queryFormPembayaran = mysqli_query($conn, "SELECT * FROM vsiswa WHERE nisn='$nisn'");
$dataFormPembayaran = mysqli_fetch_assoc($queryFormPembayaran);
$id_spp = $dataFormPembayaran['id_spp'];
// buat query untuk menampilkan form pembayar spp dari table spp
$queryFormPembayaran2 = mysqli_query($conn, "SELECT * FROM spp WHERE id_spp='$id_spp'");
$dataFormPembayaran2 = mysqli_fetch_assoc($queryFormPembayaran2);

// jika tombol bayar ditekan
if (isset($_POST['bayar'])) {
    # ambil data dari form pembayaran
    $id_petugas     = $_POST['id_petugas'];
    $nisnForm       = $_POST['nisnForm'];
    $tanggal_dibayar = $_POST['tanggal_dibayar'];
    $bulan_dibayar  = $_POST['bulan_dibayar'];
    $tahun_dibayar  = $_POST['tahun_dibayar'];
    $id_spp         = $_POST['id_spp'];
    $nominal        = $_POST['nominal'];

    // cek jika data transaksi berdasarkan bulan sudah ada atau belum
    $queryCPembayaran = mysqli_query($conn, "SELECT * FROM pembayaran WHERE nisn='$nisn' AND bulan_dibayar = '$bulan_dibayar'");
    $hasilCPembayaran = mysqli_num_rows($queryCPembayaran);

    if ($hasilCPembayaran > 0) {
        echo "<script>alert('Sudah Melakukan Pembayaran'); window.location='?url=entri-pembayaran&nisn=$nisn';</script>";
    } else {
        // buat query untuk membuat transaksi pembayaran
        $queryPembayaran = mysqli_query($conn, "INSERT INTO pembayaran VALUES ('', '$id_petugas', '$nisnForm', '$tanggal_dibayar', '$bulan_dibayar', '$tahun_dibayar', '$id_spp', '$nominal')");
        if ($queryPembayaran > 0) {
            echo   "<script>
                        alert('Berhasil Melakukan Pembayaran SPP!');
                        window.location = '?url=entri-pembayaran&nisn=$nisn'
                    </script>";
        } else {
            echo   "<script>
                        alert('Gagal Melakukan Pembayaran SPP!');
                        window.location = '?url=entri-pembayaran&nisn=$nisn'
                    </script>";
        }
    }
}
?>
<!-- card Form Pembayaran  -->
<div class="card shadow mb-4">
    <div class="card-header">
        Form Pembayaran SPP
    </div>
    <div class="card-body">
        <form action="" method="POST" class="user">
            <!-- form id_petugas -->
            <input type="hidden" name="id_petugas" value="<?= $_SESSION['id_petugas']; ?>">
            <!-- akhir form id_petugas -->
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="">Nisn</label>
                    <input type="text" class="form-control form-control-sm" id="" name="nisnForm" aria-describedby="nisnHelp" value="<?= $dataFormPembayaran['nisn']; ?>" readonly>
                </div>
                <div class="col-sm-6">
                    <label for="tahun_dibayar">Tahun Dibayar</label>
                    <input type="text" class="form-control form-control-sm" id="tahun_dibayar" name="tahun_dibayar" aria-describedby="tahun_dibayarHelp" value="<?= $dataFormPembayaran['tahun']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="nama">Nama Siswa</label>
                    <input type="text" class="form-control form-control-sm" id="nama" name="nama_siswa" aria-describedby="namaSiswaHelp" value="<?= $dataFormPembayaran['nama']; ?>" readonly>
                </div>
                <div class="col-sm-6">
                    <label for="bulanDibayar">Bulan Dibayar</label>
                    <select class="form-control" id="bulanDibayar" name="bulan_dibayar">
                        <option value="Januari">Januari</option>
                        <option value="Februari">Februari</option>
                        <option value="Maret">Maret</option>
                        <option value="April">April</option>
                        <option value="Mei">Mei</option>
                        <option value="Juni">Juni</option>
                        <option value="Juli">Juli</option>
                        <option value="Agustus">Agustus</option>
                        <option value="September">September</option>
                        <option value="Oktober">Oktober</option>
                        <option value="November">November</option>
                        <option value="Desember">Desember</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="">Tanggal Dibayar</label>
                    <input type="text" class="form-control form-control-sm" name="tanggal_dibayar" id="" value="<?= date("Y-m-d"); ?>" readonly>
                </div>
                <!-- form id_spp -->
                <input type="hidden" name="id_spp" value="<?= $dataFormPembayaran['id_spp']; ?>">
                <!-- akhir form id_spp -->
                <div class="col-sm-6">
                    <label for="nominal">Jumlah Dibayar</label>
                    <input type="text" class="form-control form-control-sm" id="nominal" name="nominal" aria-describedby="nominalHelp" value="<?= $dataFormPembayaran2['nominal']; ?>" readonly>
                </div>
            </div>
            <!-- button bayar -->
            <button type="submit" name="bayar" class="btn btn-outline-success">Bayar</button>
            <!-- akhir button bayar -->
            <a href="?url=transaksi-pembayaran" class="btn btn-outline-warning">Batal</a>
        </form>
    </div>
</div>
<!-- akhir card form pembayaran spp -->

<!-- card history pembayaran spp berdasarkan nisn/nis -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Histori Transaksi</h6>
    </div>
    <div class="card-body">
        <a href="?url=transaksi-pembayaran" class="btn btn-outline-secondary mb-3">Kembali</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Petugas</th>
                        <th>Nisn</th>
                        <th>Nama Siswa</th>
                        <th>Tanggal Bayar</th>
                        <th>Bulan Dibayar</th>
                        <th>Tahun Dibayar</th>
                        <th>Jumlah Dibayar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <?php
                // buat query view pembayaran
                $query = mysqli_query($conn, "SELECT * FROM vpembayaran WHERE nisn='$nisn'");
                $no = 1;
                ?>
                <tbody>
                    <?php while ($data = mysqli_fetch_assoc($query)) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $data['nama_petugas']; ?></td>
                            <td><?= $data['nisn']; ?></td>
                            <td><?= $data['tgl_bayar']; ?></td>
                            <td><?= $data['bulan_dibayar']; ?></td>
                            <td><?= $data['tahun_dibayar']; ?></td>
                            <td><?= $data['jumlah_bayar']; ?></td>
                            <td>
                                <a href="cetak-pembayaran.php?url=cetak-pembayaran&id=<?= $data['id_pembayaran']; ?>" class="btn btn-primary btn-sm mb-2">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-print"></i>
                                    </span>Cetak Laporan
                                </a>
                                <a href="?url=delete-pembayaran&id=<?= $data['id_pembayaran']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau data ini dihapus?');">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-trash"></i>
                                    </span>Hapus
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- akhir card history pembayaran spp berdasarkan nisn/nis-->