
<?php
include('config.php');
$db = new Database();

if (isset($_GET['id'])) {
    $NIK_bumil = $_GET['id'];
    $db->hapus_data_bumil($NIK_bumil);
    header('Location: tampil_data_bumil.php');
} else {
    echo "ID TIDAK DITEMUKAN";
}
?>