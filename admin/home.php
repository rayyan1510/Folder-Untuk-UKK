<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Jumlah Siswa Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Siswa</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">

                                <?php
                                $totalSiswa = mysqli_query($conn, "SELECT * FROM siswa ");
                                $hasilSiswa = mysqli_num_rows($totalSiswa);
                                echo $hasilSiswa;
                                ?>

                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jumlah Kelas -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Kelas</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">

                                <?php
                                $totalKelas = mysqli_query($conn, "SELECT * FROM kelas ");
                                $hasilKelas = mysqli_num_rows($totalKelas);
                                echo $hasilKelas;
                                ?>

                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="far fa-list-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jumlah Petugas & Admin -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Petugas</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">

                                <?php
                                $totalPetugas = mysqli_query($conn, "SELECT * FROM petugas ");
                                $hasilPetugas = mysqli_num_rows($totalPetugas);
                                echo $hasilPetugas;
                                ?>

                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /.container-fluid -->