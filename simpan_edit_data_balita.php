<?php
include('config.php');

$koneksi = new Database();

$koneksi->edit_data_balita(
    $_POST['NIK_balita'],
    $_POST['nama_balita'],
    $_POST['jenis_kelamin'],
    $_POST['tanggal_lahir'],
    $_POST['nama_ibu'],
    $_POST['alamat_balita']
);

header('location:tampil_data_balita.php');
?>
