<?php
include('config.php');

$koneksi = new Database();
$koneksi->tambah_data_balita(
    $_POST['NIK_balita'],
    $_POST['nama_balita'],
    $_POST['jenis_kelamin'],
    $_POST['tanggal_lahir'],
    $_POST['nama_ibu'],
    $_POST['alamat_balita'],
);

header('location:tampil_data_balita.php');
?>

<!-- <?php
include 'config.php';
if (isset($_POST['nyimpen'])){
    $NIK_balita = $_POST['NIK_balita'];

    $insert_query = mysqli_query($koneksi, "INSERT INTO data_balita (NIK_balita)
    VALUES ('$NIK_balita')");
}
?> -->