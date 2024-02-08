<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/posyandu/fpdf/fpdf.php");

$host = "localhost";
$username = "root";
$password = "";
$database = "posyandu";

// Open a connection to the MySQL server
$id_mysql = mysqli_connect($host, $username, $password);

// Check if the connection is successful
if (!$id_mysql) {
    die("Gagal melakukan koneksi ke Database server MySQL");
}

// Select the database
if (!mysqli_select_db($id_mysql, $database)) {
    die("Database tidak bisa dipilih");
}

// Fetch data from the "data_balita" table
$hasil = mysqli_query($id_mysql, "SELECT * FROM data_balita ORDER BY NIK_balita");

// Check if the query is successful
if (!$hasil) {
    die("Permintaan gagal dilaksanakan");
}
// Buat PDF
$pdf = new FPDF();
$pdf->AddPage();

// Buat judul file PDF
$pdf->SetFillColor(95, 158, 160);
$pdf->SetTextColor(255, 255, 255);
$pdf->SetFont("Arial", "B");
$pdf->Cell(20, 7, "NIK", 1, 0, "L", true);
$pdf->Cell(50, 7, "Nama Balita", 1, 0, "L", true);
$pdf->Cell(30, 7, "Tanggal Lahir", 1, 0, "L", true);
$pdf->Cell(50, 7, "Alamat", 1, 0, "L", true);
$pdf->Cell(30, 7, "Jenis Kelamin", 1, 0, "L", true);
$pdf->Ln();

$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont("Times");

$pencacah = 0;
while ($baris = mysqli_fetch_assoc($hasil)) {
    $pdf->Cell(20, 7, $baris['NIK_balita'], 1, 0, "L", true);
    $pdf->Cell(50, 7, $baris['nama_balita'], 1, 0, "L", true);
    $pdf->Cell(30, 7, $baris['tanggal_lahir'], 1, 0, "L", true);
    $pdf->Cell(50, 7, $baris['alamat_balita'], 1, 0, "L", true);
    $pdf->Cell(30, 7, $baris['jenis_kelamin'], 1, 0, "L", true);
    $pdf->Ln();
    $pencacah++;
}

mysqli_close($id_mysql);
$pdf->Output();
?>
