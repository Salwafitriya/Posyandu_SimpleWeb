
<?php
include('config.php');
$db = new Database();

if (isset($_GET['id'])) {
    $NIK_balita = $_GET['id'];
    $db->hapus_data_balita($NIK_balita);
    header('Location: tampil_data_balita.php');
} else {
    echo "ID TIDAK DITEMUKAN";
}
?>