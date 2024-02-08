<?php
include('config.php');

$koneksi = new Database();
$koneksi->tambah_layanan_bumil(
    $_POST['NIK_bumil'],
    $_POST['nama_bumil'],
    $_POST['tanggal_cekbumil'],
    $_POST['berat_badan'],
    $_POST['lingkar_perut'],
    $_POST['usia_hamil'],
    $_POST['keluhan'],
);

header('location:tampil_layanan_bumil.php');
?>