<?php

// ambil id_spp dari $_GET[id]; simpan ke dalam varible $id_spp
$id_spp = $_GET['id'];
// buat query untuk menampilkan data spp berdasarkan id yg di kirim dari $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM spp WHERE id_spp = '$id_spp'");
$hasil = mysqli_fetch_assoc($query);

// cek jika tombol update ditekan
if (isset($_POST['kirim'])) {
    # ambil data dari form 
    $id_spp  = htmlspecialchars($_POST['id_spp']);
    $tahun   = $_POST['tahun'];
    $nominal = $_POST['nominal'];

    // cek apakah data tahun spp sudah ada atau belum
    $sql = mysqli_query($conn, "SELECT * FROM spp WHERE tahun='$tahun'");
    $cek = mysqli_num_rows($sql);
    if ($cek > 0) {
        // jika ada kembali ke data spp
        echo "<script>alert('Data Kelas Sudah Ada'); window.location='?url=data-spp';</script>";
    } else {
        # jika tidak ada, buat query update data spp
        $q = mysqli_query($conn, "UPDATE spp SET tahun='$tahun', nominal='$nominal' WHERE id_spp='$id_spp'");
        // cek apakah data berhasil di tambah atau tidak
        if ($q) {
            echo "<script>
                alert('Data Berhasil di Ubah!');
                window.location='?url=data-spp';
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
        <h6 class="m-0 font-weight-bold text-primary">Update Data SPP</h6>
    </div>
    <div class="card-body">
        <form action="" method="post">

            <!-- form tahun - hidden -->
            <input type="hidden" name="id_spp" value="<?= $_GET['id']; ?>">
            <!-- akhir form tahun -->

            <!-- form tahun -->
            <div class="form-group">
                <label for="tahun">Tahun</label>
                <input type="number" class="form-control" id="tahun" placeholder="" name="tahun" value="<?= $hasil['tahun']; ?>" autocomplete="off" required>
            </div>
            <!-- akhir form tahun -->

            <!-- form nominal -->
            <div class="form-group">
                <label for="nominal">Nominal</label>
                <input type="number" class="form-control" id="nominal" placeholder="" name="nominal" value="<?= $hasil['nominal']; ?>" autocomplete="off" required>
            </div>
            <!-- akhir form nominal -->

            <a href="?url=data-spp" class="btn btn-primary">
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