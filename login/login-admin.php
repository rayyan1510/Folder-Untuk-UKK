<?php

include '../app/config/config.php';

if (isset($_POST['login'])) {
    # cek username & password sudah bersih dan terhindar dari sql injection
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = mysqli_query($conn, "SELECT * FROM petugas WHERE username='$username' AND password = '$password'");
    $hasil = mysqli_num_rows($query);

    if ($hasil === 1) {
        session_start();
        $value = mysqli_fetch_assoc($query);
        $_SESSION['level'] = $value['level'];
        $_SESSION['id_petugas'] = $value['id_petugas'];
        $_SESSION['nama_petugas'] = $value['nama_petugas'];

        if (isset($_SESSION['level'])) {
            # kalau sdh di set session level
            if ($_SESSION['level'] == 'admin') {
                # kalau admin re direct ke halaman admin
                header('Location: ../admin/index.php');
            } else {
                # kalau bukan admin re direct ke halaman petugas
                header('Location: ../petugas/index.php');
            }
        } else {
            # kalau tidak di set session level
            header('Location: login-siswa.php');
        }
    } else {
        echo "<script>alert('Gagal Login!, Username dan Password Tidak Sesuai');</script>";
    }
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

    <title>Halaman Login</title>

    <!-- Custom fonts for this template-->
    <link href="../app/assets/vendor/sb-admin/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../app/assets/vendor/sb-admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-success">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-3">Selamat Datang</h1>
                                        <h2 class="h5 text mb-4">Aplikasi Pembayaran SPP</h2>
                                        <p>Login - Admin & Petugas</p>
                                    </div>
                                    <!-- awal form -->
                                    <form class="user" action="" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="exampleInputusername" aria-describedby="usernameHelp" placeholder="Masukkan Username Anda" name="username" maxlength="25" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="exampleInputpassword" placeholder="Masukkan Password Anda" name="password" maxlength="32" autocomplete="off" required>
                                        </div>
                                        <!-- form tombol check box -->
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck" name="rember">
                                                <label class="custom-control-label" for="customCheck">Remember Me</label>
                                            </div>
                                        </div>
                                        <!-- akhir form chebox -->
                                        <!-- tombol login -->
                                        <button type="submit" class="btn btn-primary btn-user btn-block" name="login">Login</button>
                                        <!-- akhir tombol login -->
                                    </form>
                                    <!-- akhir form -->
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
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

</body>

</html>