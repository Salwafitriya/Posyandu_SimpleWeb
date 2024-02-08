<?php
    include('config.php');
    $koneksi = new database();
    $NIK_balita = $_POST['NIK_balita'];//echo $NIK_balita; die();
    $koneksi->cari_nik_balita(
        $_POST['NIK_balita']
    );//die();
    header('location: tambah_pencatatan.php');
?>
