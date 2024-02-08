<?php
include('config.php');

$koneksi = new Database();
$koneksi->tambah_catatan_balita(
    $_POST['NIK_balita'],
    $_POST['nama_balita'],
    $_POST['tanggal_timbang'],
    $_POST['tinggi_badan'],
    $_POST['berat_badan'],
    $_POST['usia'],
    $_POST['vitamin'],
    $_POST['imunisasi'],
);

header('location:tampil_catatan_balita.php');
?>