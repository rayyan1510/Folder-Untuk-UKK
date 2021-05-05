<?php
// ambil data tahun dari tb spp, dan tampilkan  di form tahun
$spp = mysqli_query($conn, "SELECT * FROM spp");

// untuk mengambil data kelas dan di simpan ke form tambah siswa
$query1 = mysqli_query($conn, "SELECT * FROM `kelas` ORDER BY `kelas`.`nama_kelas` ASC, `kelas`.`kompetensi_keahlian` ASC");


// cek apakah tombil kirim sudah di tekan apa belum
if (isset($_POST['kirim'])) {
    # ambil data dari form modal
    $nisn = htmlspecialchars($_POST['nisn']);
    $nis  = htmlspecialchars($_POST['nis']);
    $nama = ucwords(htmlspecialchars($_POST['nama']));
    $kelas = $_POST['kelas'];
    $alamat = htmlspecialchars($_POST['alamat']);
    $no_telp = $_POST['no_telp'];
    $tahun = $_POST['tahun'];

    // cek dulu data apakah sudah ada atau belum
    $query = mysqli_query($conn, "SELECT * FROM siswa WHERE nisn='$nisn'");
    $cek = mysqli_num_rows($query);
    if ($cek > 0) {
        // jika ada data
        echo "<script>alert('Data siswa Sudah Ada'); window.location='?url=data-siswa';</script>";
    } else {
        # jika tidak ada
        // buat query insert data siswa masukan ke variable q
        $query = mysqli_query($conn, "INSERT INTO siswa VALUES('$nisn','$nis','$nama','$kelas','$alamat','$no_telp','$tahun')");
        // cek apakah data berhasil di tambah atau tidak
        if ($query) {
            echo "<script>alert('Data Berhasil di Tambahkan!'); window.location='?url=data-siswa';</script>";
        } else {
            echo "<script>alert('Data Gagal Di Tambahkan!'); window.location='?url=data-siswa';</script>";
        }
    }
}


?>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Table Siswa</h1>

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
        <h6 class="m-0 font-weight-bold text-primary">Data Tabel Siswa</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nisn</th>
                        <th>Nis</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Alamat</th>
                        <th>No Telp</th>
                        <th>Tahun</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <?php
                // buat query untuk menampilkan data siswa dan mengambil data nama_kelas dari tb kelas berdasarkan id_kelas dari tb siswa, dan tahun dari tb spp berdasarkan id_spp dari tb siswa,
                $q = mysqli_query($conn, "SELECT siswa.nisn, siswa.nis, siswa.nama, kelas.nama_kelas, siswa.alamat, siswa.no_telp, spp.tahun FROM siswa INNER JOIN kelas, spp WHERE siswa.id_kelas=kelas.id_kelas && siswa.id_spp = spp.id_spp ORDER BY nisn ASC");

                // $z = mysqli_query($conn, "SELECT siswa.nisn, siswa.nis, siswa.nama, siswa.id_kelas, kelas.nama_kelas, siswa.alamat, siswa.no_telp, siswa.id_spp, spp.tahun FROM siswa INNER JOIN kelas, spp WHERE siswa.id_kelas=kelas.id_kelas && siswa.id_spp = spp.id_spp");
                // var_dump($h = mysqli_fetch_assoc($z));
                $no = 1;
                ?>
                <tbody>
                    <!-- mengambil data dari tabel siswa dan di tampilkan menggunakan while -->
                    <?php while ($data = mysqli_fetch_assoc($q)) : ?>
                        <tr>
                            <td><?= $data['nisn']; ?></td>
                            <td><?= $data['nis']; ?></td>
                            <td><?= $data['nama']; ?></td>
                            <td><?= $data['nama_kelas']; ?></td>
                            <td><?= $data['alamat']; ?></td>
                            <td><?= $data['no_telp']; ?></td>
                            <td><?= $data['tahun']; ?></td>
                            <td>
                                <!-- button udpate -->
                                <a href="?url=update-siswa&nisn=<?= $data['nisn']; ?>" class="btn btn-primary">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-edit"></i>
                                    </span>Update
                                </a>
                                <!-- akhir button update -->

                                <!-- button delete -->
                                <a href="?url=delete-siswa&nisn=<?= $data['nisn']; ?>" class="btn btn-danger" onclick="return confirm('Yakin mau data ini dihapus?');">
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
                <h5 class="modal-title" id="tambahDataLabel">Tambah Data Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">

                    <!-- form nisn -->
                    <div class="form-group">
                        <label for="nisn">Nisn</label>
                        <input type="number" class="form-control" id="nisn" placeholder="" name="nisn" required autocomplete="off">
                    </div>
                    <!-- akhir form nisn -->

                    <!-- form nis -->
                    <div class="form-group">
                        <label for="nis">Nis</label>
                        <input type="number" class="form-control" id="nis" placeholder="" name="nis" required autocomplete="off">
                    </div>
                    <!-- akhir form nis -->

                    <!-- form nama -->
                    <div class="form-group">
                        <label for="nama">Nama Siswa</label>
                        <input type="text" class="form-control" id="nama" placeholder="" name="nama" required autocomplete="off">
                    </div>
                    <!-- akhir form nama -->

                    <!-- form pilih kelas -->
                    <div class="form-group">Kelas</label>
                        <select class="form-control" id="kelas" name="kelas">
                            <!-- buat perulangan while dari tb kelas diambil dari $query1 simpan di varibale $a -->
                            <?php while ($a = mysqli_fetch_assoc($query1)) : ?>
                                <option value="<?= $a['id_kelas']; ?>"><?= $a['nama_kelas']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <!-- akhir form pilih kelas -->

                    <!-- form alamat -->
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Alamat</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="alamat" autocomplete="off" required></textarea>
                    </div>
                    <!-- akhir form alamat -->

                    <!-- form no_telp -->
                    <div class="form-group">
                        <label for="no_telp">No Hp/Telp Siswa</label>
                        <input type="number" class="form-control" id="no_telp" placeholder="" name="no_telp" required autocomplete="off">
                    </div>
                    <!-- akhir form no_telp -->

                    <!-- form pilih tahun -->
                    <div class="form-group">Tahun</label>
                        <select class="form-control" id="tahun" name="tahun">
                            <!-- buat peruralangan while dari data spp pada variable $spp simpan di $x -->
                            <?php while ($x = mysqli_fetch_assoc($spp)) : ?>
                                <option value="<?= $x['id_spp']; ?>"><?= $x['tahun']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <!-- akhir form pilih tahun -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="kirim">Tambah Data</button>
            </div>
            </form>
        </div>
    </div>
</div>