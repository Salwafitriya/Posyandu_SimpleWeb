<?php
include('config.php');

$koneksi = new Database();
$koneksi->edit_data_bumil(
    $_POST['NIK_bumil'],
    $_POST['nama_bumil'],
    $_POST['tanggal_lahir'],
    $_POST['nama_suami'],
    $_POST['HPHT'],
    $_POST['alamat'],
);

header('location:tampil_data_bumil.php');
?>