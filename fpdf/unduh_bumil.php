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

// Fetch data from the "data_bumil" table
$hasil = mysqli_query($id_mysql, "SELECT * FROM data_bumil ORDER BY NIK_bumil");

// Check if the query is successful
if (!$hasil) {
    die("Permintaan gagal dilaksanakan");
}

// Create PDF
$pdf = new FPDF();
$pdf->AddPage();

// Title of the PDF
$pdf->SetFont("Arial", "B", 14);
$pdf->Cell(0, 10, "Data Ibu Hamil", 0, 1, "C");
$pdf->Ln(10);

// Table header
$pdf->SetFont("Arial", "B", 12);
$pdf->Cell(15, 10, "No", 1);
$pdf->Cell(30, 10, "NIK Ibu Hamil", 1);
$pdf->Cell(40, 10, "Nama Ibu Hamil", 1);
$pdf->Cell(30, 10, "Tanggal Lahir", 1);
$pdf->Cell(30, 10, "Nama Suami", 1);
$pdf->Cell(20, 10, "HPHT", 1);
$pdf->Cell(50, 10, "Alamat", 1);
$pdf->Cell(20, 10, "Action", 1);
$pdf->Ln();

// Table data
$pdf->SetFont("Arial", "", 10);
$no = 1;
while ($baris = mysqli_fetch_assoc($hasil)) {
    $pdf->Cell(15, 10, $no++, 1);
    $pdf->Cell(30, 10, $baris['NIK_bumil'], 1);
    $pdf->Cell(40, 10, $baris['nama_bumil'], 1);
    $pdf->Cell(30, 10, $baris['tanggal_lahir'], 1);
    $pdf->Cell(30, 10, $baris['nama_suami'], 1);
    $pdf->Cell(20, 10, $baris['HPHT'], 1);
    $pdf->Cell(50, 10, $baris['alamat'], 1);
    $pdf->Cell(20, 10, "", 1); // You can add action links/buttons here
    $pdf->Ln();
}

// Close the MySQL connection
mysqli_close($id_mysql);

// Output PDF
$pdf->Output();
?>
