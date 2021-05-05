<?php
session_start();
require_once __DIR__ . '\..\app\assets\vendor\vendor\autoload.php';
require_once '../app/config/config.php';
$id_pembayaran = $_GET['id'];

$html = '<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Kwitansi Siswa</title>
<!-- Custom styles for this template-->
<link href="../app/assets/vendor/sb-admin/css/sb-admin-2.min.css" rel="stylesheet" media="mpdf">

<body id="page-top">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary" align="center">SMK Desain Medan</h3>
            <h4 class="m-0 font-weight-bold text-primary" align="center">Kwitani Pembayaran SPP</h4>
        </div>
        <div class="card-body">';

$html .= '<div class="">
    <table class="table table-bordered" border="1">
        <tr>
            <th>No.</th>
            <th>Nama Petugas</th>
            <th>Nisn</th>
            <th>Nama Siswa</th>
            <th>Tanggal Bayar</th>
            <th>Bulan Dibayar</th>
            <th>Tahun Dibayar</th>
            <th>Jumlah Dibayar</th>
        </tr>';

// buat query view pembayaran
$query = mysqli_query($conn, "SELECT * FROM vpembayaran WHERE id_pembayaran='$id_pembayaran'");
$no = 1;
while ($data = mysqli_fetch_assoc($query)) {
    $html       .= '<tr>
                <td>' . $no++ . '</td>
                <td>' . $data["nama_petugas"] . '</td>
                <td>' . $data["nisn"] . '</td>
                <td>' . $data["nama"] . '</td>
                <td>' . $data["tgl_bayar"] . '</td>
                <td>' . $data["bulan_dibayar"] . '</td>
                <td>' . $data["tahun_dibayar"] . '</td>
                <td>' . $data["jumlah_bayar"] . '</td>
                </tr>';
}

$html  .= '</table>
<h3 class="m-0 font-weight-bold text-primary mb-3" align="right">Medan,' . date('d m Y') . '</h3><br><br>
<h3 class="m-0 font-weight-bold text-primary mt-3" align="right">' . $_SESSION['nama_petugas'] . '</h3>
</div>

</div>
</div>
</body>
</html>';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output('Kwitansti SPP.pdf', \Mpdf\Output\Destination::INLINE);
