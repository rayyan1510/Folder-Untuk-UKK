<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-3">
    <div class="container">
        <a class="navbar-brand" href="#">Aplikasi Pembayaran SPP</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item lk">
                    <a class="nav-link" href="<?= BASEURL ?>siswa/?url=histori-pembayaran&nisn=<?= $_SESSION['nisn']; ?>">Histori Pembayaran</a>
                </li>

                <li class="nav-item lk">
                    <a class="nav-link" href="<?= BASEURL ?>siswa/logout.php">Log Out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>