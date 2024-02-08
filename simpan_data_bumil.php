<?php
include('config.php');

$koneksi = new Database();
$koneksi->tambah_data_bumil(
    $_POST['NIK_bumil'],
    $_POST['nama_bumil'],
    $_POST['tanggal_lahir'],
    $_POST['nama_suami'],
    $_POST['HPHT'],
    $_POST['alamat'],
);

header('location:tampil_data_bumil.php');
?>

<!-- <?php
include 'config.php';
if (isset($_POST['nyimpen'])){
    $NIK_balita = $_POST['NIK_balita'];

    $insert_query = mysqli_query($koneksi, "INSERT INTO data_balita (NIK_balita)
    VALUES ('$NIK_balita')");
}
?> -->