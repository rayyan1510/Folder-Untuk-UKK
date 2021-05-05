<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Cari Data Siswa</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nisn</th>
                        <th>Nis</th>
                        <th>Nama</th>
                        <th>Nama Kelas</th>
                        <th>Tahun</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <!-- mengambil data dari tabel spp dan di tampilkan menggunakan while -->
                <?php $query = mysqli_query($conn, "SELECT * FROM vsiswa");
                $no = 1; ?>
                <tbody>
                    <?php while ($data = mysqli_fetch_assoc($query)) : ?>
                        <tr>
                            <td><?= $data['nisn']; ?></td>
                            <td><?= $data['nis']; ?></td>
                            <td><?= $data['nama']; ?></td>
                            <td><?= $data['nama_kelas']; ?></td>
                            <td><?= $data['tahun']; ?></td>
                            <td>

                                <!-- button Input Pembayaran  -->
                                <a href="?url=entri-pembayaran&nisn=<?= $data['nisn']; ?>" class="btn  btn-primary btn-icon-split btn-sm">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-edit"></i>
                                    </span>
                                    <span class="text">Pilih Siswa</span>
                                </a>
                                <!-- akhir button Input Pembayaran -->

                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>