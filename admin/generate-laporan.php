<?php

session_start();

include '../app/config/config.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Aplikasi Pembayran SPP</title>

    <!-- Custom fonts for this template-->
    <link href="../app/assets/vendor/sb-admin/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../app/assets/vendor/sb-admin/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../app/assets/vendor/sb-admin/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- my css -->
    <link href="../app/assets/css/cetak.css" rel="stylesheet">

</head>

<body id="page-top">


    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- konten -->
            <div class="container-fluid">
                <!-- Page Heading -->
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                    </div>
                    <div class="card-body">

                        <h3 class="m-0 font-weight-bold text-primary" align="center">SMK Desain Medan</h3>
                        <h4 class="m-0 font-weight-bold text-primary" align="center">Laporan Bulanan</h4>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Id Pembayaran</th>
                                    <th>Nama Petugas</th>
                                    <th>Nama</th>
                                    <th>Nisn</th>
                                    <th>Tanggal Bayar</th>
                                    <th>Bulan Dibayar</th>
                                    <th>Tahun Dibayar</th>
                                    <th>Jumlah Dibayar</th>
                                </tr>
                            </thead>
                            <!-- mengambil data dari tabel spp dan di tampilkan menggunakan while -->
                            <?php $query = mysqli_query($conn, "SELECT * FROM vpembayaran");
                            $no = 1; ?>
                            <tbody>
                                <?php while ($data = mysqli_fetch_assoc($query)) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $data["id_pembayaran"]; ?></td>
                                        <td><?= $data["nama_petugas"]; ?></td>
                                        <td><?= $data["nisn"]; ?></td>
                                        <td><?= $data["nama"]; ?></td>
                                        <td><?= $data["tgl_bayar"]; ?></td>
                                        <td><?= $data["bulan_dibayar"]; ?></td>
                                        <td><?= $data["tahun_dibayar"]; ?>'</td>
                                        <td><?= $data["jumlah_bayar"]; ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                        <h6 class="m-0 font-weight-bold text-primary mt-3" align="right">Medan, <?= date("d m Y") ?></h6>
                        <h6 class="m-0 font-weight-bold text-primary mb-5" align="right"><?= $_SESSION["level"]; ?></h6>
                        <h6 class="m-0 font-weight-bold text-primary mt-5" align="right"><?= $_SESSION["nama_petugas"]; ?></h6>
                    </div>
                </div>
            </div>
            <!-- akhir konten -->
        </div>
    </div>
    <!-- End of Content Wrapper -->

    <!-- Bootstrap core JavaScript-->
    <script src="../app/assets/vendor/sb-admin/jquery/jquery.min.js"></script>
    <script src="../app/assets/vendor/sb-admin/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../app/assets/vendor/sb-admin/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../app/assets/vendor/sb-admin/js/sb-admin-2.min.js"></script>
    <script src="../app/assets/js/script.js"></script>


    <!-- Page level plugins -->
    <script src="../app/assets/vendor/sb-admin/datatables/jquery.dataTables.min.js"></script>
    <script src="../app/assets/vendor/sb-admin/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- dataTables -->
    <script src="../app/assets/vendor/sb-admin/js/demo/datatables-demo.js"></script>
</body>

</html>