<?php

session_start();
include '../app/config/config.php';

if (isset($_SESSION['id_petugas'])) {
    $id = $_SESSION['id_petugas'];
}

if (!isset($_SESSION['level'])) {
    header('location: ../login/login-admin.php');
}


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

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion cetak" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-0">
                    <i class="fas fa-receipt"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Aplikasi <sup>Pembayaran SPP</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>


            <!-- Nav Item - Data Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Data Table</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data Table:</h6>

                        <!-- Nav Item - Table Siswa -->
                        <a class="collapse-item" href="?url=data-siswa">
                            <i class="fas fa-fw fa-user-graduate"></i>
                            <span>Data Siswa</span>
                        </a>

                        <!-- Nav Item - Table Petugas -->
                        <a class="collapse-item" href="?url=data-petugas">
                            <i class="fas fa-fw fa-user-tie"></i>
                            <span>Data Petugas</span>
                        </a>

                        <!-- Nav Item - Table Kelas -->
                        <a class="collapse-item" href="?url=data-kelas">
                            <i class="far fa-fw fa-list-alt"></i>
                            <span>Data Kelas</span>
                        </a>

                        <!-- Nav Item - Table SPP -->
                        <a class="collapse-item" href="?url=data-spp">
                            <i class="fas fa-fw fa-money-bill-wave"></i>
                            <span>Data SPP</span>
                        </a>


                    </div>
                </div>
            </li>

            <!-- Nav Item - Table transaksi -->
            <li class="nav-item">
                <a class="nav-link" href="?url=transaksi-pembayaran">
                    <i class="fas fa-fw fa-edit"></i>
                    <span>Entri Transaksi Pembayaran</span>
                </a>
            </li>

            <!-- Nav Item - Generate Laporan -->
            <li class="nav-item">
                <a class="nav-link" href="generate-laporan.php?url=generate-laporan" target="__blank">
                    <i class="fas fa-download fa-sm text-white-50"></i>
                    <span>Generate Laporan</span>
                </a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow ">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['nama_petugas']; ?></span>
                                <img class="img-profile rounded-circle" src="">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- konten -->
                <div class="container-fluid">
                    <?php require_once 'config-hal.php'; ?>
                </div>
                <!-- akhir konten -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Aplikasi Pembayaran SPP <?= date('Y'); ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin Mau Keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih tombol "Logout" untuk melanjutkan.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="./logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../app/assets/vendor/sb-admin/jquery/jquery.min.js"></script>
    <script src="../app/assets/vendor/sb-admin/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../app/assets/vendor/sb-admin/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../app/assets/vendor/sb-admin/js/sb-admin-2.min.js"></script>
    <!-- <script src="../app/assets/js/script.js"></script> -->

    <!-- Page level plugins -->
    <script src="../app/assets/vendor/sb-admin/datatables/jquery.dataTables.min.js"></script>
    <script src="../app/assets/vendor/sb-admin/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- dataTables -->
    <script src="../app/assets/vendor/sb-admin/js/demo/datatables-demo.js"></script>
</body>

</html>