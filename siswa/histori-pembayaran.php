<?php

$nisn = $_SESSION['nisn'];

?>

<div class="container-fluid mt-5 mb-6">

    <!-- card history pembayaran spp berdasarkan nisn/nis -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Histori Transaksi</h6>
        </div>
        <div class="card-body">
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
                        </tr>
                    </thead>
                    <?php

                    $query = mysqli_query($conn, "SELECT * FROM vpembayaran WHERE nisn = '$nisn'");
                    $no = 1;
                    ?>
                    <tbody>
                        <?php while ($data = mysqli_fetch_assoc($query)) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $data['nama_petugas']; ?></td>
                                <td><?= $data['nisn']; ?></td>
                                <td><?= $data['nama']; ?></td>
                                <td><?= $data['tgl_bayar']; ?></td>
                                <td><?= $data['bulan_dibayar']; ?></td>
                                <td><?= $data['tahun_dibayar']; ?></td>
                                <td><?= $data['jumlah_bayar']; ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- akhir card history pembayaran spp berdasarkan nisn/nis-->

</div>