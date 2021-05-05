<?php
// ambil nisn dari $_GET[nisn]; simpan ke dalam varible $nisn
$nisn = $_GET['nisn'];

// buat query untuk nampilkan form siswa dari tb viewsiswa
$query = mysqli_query($conn, "SELECT * FROM vsiswa WHERE nisn='$nisn'");
$siswa = mysqli_fetch_assoc($query);

if (isset($_POST['kirim'])) {
    # ambil data dari form
    $nisn = $_POST['nisn'];
    $nis  = $_POST['nis'];
    $nama = ucwords(htmlspecialchars($_POST['nama_siswa']));
    $kelas = $_POST['id_kelas'];
    $alamat = htmlspecialchars($_POST['alamat']);
    $no_telp = $_POST['no_telp'];
    $tahun = $_POST['id_spp'];

    // echo "<br>";
    // var_dump($nisn, $nis, $nama, $kelas, $alamat, $no_telp, $tahun);

    // buat query update
    $query = mysqli_query($conn, "UPDATE siswa SET nis='$nis', nama='$nama', id_kelas='$kelas', alamat='$alamat', no_telp='$no_telp', id_spp='$tahun' WHERE nisn='$nisn'");
    // $query = mysqli_query($conn, "UPDATE siswa SET nis='$nis', nama='$nama', alamat='$alamat', no_telp='$no_telp' WHERE nisn='$nisn'");
    if ($query > 0) {
        // jika ada kembali ke data spp
        echo "<script>
                alert('Data Berhasil di Ubah!');
                window.location='?url=data-siswa';
            </script>";
    } else {
        // echo "<script>alert('Data Gagal Di Ubah!');</script>";
        echo "data gagal";
    }
}

?>

<!-- Basic Card Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Update Data Siswa</h6>
    </div>
    <div class="card-body">
        <form action="" method="post">

            <!-- form nisn -->
            <div class="form-group">
                <label for="nisn">Nisn</label>
                <input type="number" class="form-control" id="nisn" name="nisn" value="<?= $siswa['nisn']; ?>" required autocomplete="off">
            </div>
            <!-- akhir form nisn -->

            <!-- form nis -->
            <div class="form-group">
                <label for="nis">Nis</label>
                <input type="number" class="form-control" id="nis" name="nis" value="<?= $siswa['nis']; ?>" required autocomplete="off">
            </div>
            <!-- akhir form nis -->

            <!-- form nama -->
            <div class="form-group">
                <label for="nama">Nama Siswa</label>
                <input type="text" class="form-control" id="nama" name="nama_siswa" value="<?= $siswa['nama']; ?>" required autocomplete="off">
            </div>
            <!-- akhir form nama -->

            <!-- form pilih kelas -->
            <div class="form-group">Kelas</label>
                <select class="form-control" id="kelas" name="id_kelas">
                    <!--  -->
                    <option value="<?= $siswa['id_kelas']; ?>" selected hidden><?= $siswa['nama_kelas']; ?></option>
                    <!--  -->

                    <!-- buat perulangan while dari tb kelas diambil dari $query1 simpan di varibale $a -->
                    <?php
                    $query1 = mysqli_query($conn, "SELECT * FROM `kelas` ORDER BY `kelas`.`nama_kelas` ASC, `kelas`.`kompetensi_keahlian` ASC");
                    var_dump($query1);
                    while ($a = mysqli_fetch_assoc($query1)) : ?>
                        <option value="<?= $a['id_kelas']; ?>"><?= $a['nama_kelas']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <!-- akhir form pilih kelas -->

            <!-- form alamat -->
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Alamat</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="alamat" value="<?= $siswa['alamat']; ?>" autocomplete="off" required><?= $siswa['alamat']; ?></textarea>
            </div>
            <!-- akhir form alamat -->

            <!-- form no_telp -->
            <div class="form-group">
                <label for="no_telp">No Hp/Telp Siswa</label>
                <input type="number" class="form-control" id="no_telp" name="no_telp" value="<?= $siswa['no_telp']; ?>" required autocomplete="off">
            </div>
            <!-- akhir form no_telp -->

            <!-- form pilih tahun -->
            <div class="form-group">Tahun</label>
                <select class="form-control" id="tahun" name="id_spp">
                    <!--  -->
                    <option value="<?= $siswa['id_spp']; ?>" selected hidden><?= $siswa['tahun']; ?></option>
                    <!--  -->

                    <!-- buat peruralangan while dari data spp pada variable $spp simpan di $x -->
                    <?php
                    $spp = mysqli_query($conn, "SELECT * FROM spp");
                    while ($x = mysqli_fetch_assoc($spp)) : ?>
                        <option value="<?= $x['id_spp']; ?>"><?= $x['tahun']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <!-- akhir form pilih tahun -->

            <a href="?url=data-siswa" class="btn btn-primary">
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