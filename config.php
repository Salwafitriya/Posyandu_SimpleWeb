<?php

class Database {
    var $host = "localhost";
    var $username = "root";
    var $password = "";
    var $database = "posyandu";
    var $koneksi = "";

    function __construct() {
        $this->koneksi = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        if (mysqli_connect_errno()) {
            echo "Koneksi database gagal : " . mysqli_connect_error();
        }
    }

    // $koneksi = mysqli_connect($host, $username, $password, $database);
    //     if(!$koneksi){
    //         die("koneksi tidak berhasil: ". mysq;i_connect_error());
    //     }
    //     
        
    // function __construct() {
    //     $koneksi = mysqli_connect("localhost", "root", "", "posyandu");
    //     if (mysqli_connect_errno()) {
    //         echo "Koneksi database gagal : " . mysqli_connect_error();
    //     }
    // }

    function login($username)
    {
        $data = mysqli_query($this->koneksi, "SELECT * FROM user WHERE username = '$username'");

        if (!$data || mysqli_num_rows($data) == 0) {
            echo "<b>Data user tidak ditemukan</b>";
            header('Location: login.php');
        } else {
            $hasil = array(); // Initialize an array to store results
            while ($row = mysqli_fetch_array($data)) {
                $hasil[] = $row;
            }
            // Do something with $hasil or return it as needed
            return $hasil;
        }        
    }

    public function tambah_data_balita($NIK_balita, $nama_balita, $jenis_kelamin, $tanggal_lahir, $nama_ibu, $alamat_balita)
    {
      mysqli_query($this->koneksi, "INSERT INTO data_balita (NIK_balita, nama_balita, jenis_kelamin, tanggal_lahir, nama_ibu, alamat_balita) 
      VALUES ('$NIK_balita', '$nama_balita', '$jenis_kelamin', '$tanggal_lahir', '$nama_ibu', '$alamat_balita')");
    } 

    // public function tampil_data_balita()
    // {
    //     $data = mysqli_query($this->koneksi, "SELECT * FROM data_balita");
        
    //     while($row = mysqli_fetch_array($data))
    //     {
    //         $hasil[] = $row;
    //     }
    //     return $hasil;
    // }

    public function tampil_data_balita()
{
    $query = "SELECT data_balita.*, jenis_kelamin.keterangan_jk 
              FROM data_balita
              INNER JOIN jenis_kelamin ON data_balita.jenis_kelamin = jenis_kelamin.kode_jk";

    $data = mysqli_query($this->koneksi, $query);

    $hasil = array();

    while ($row = mysqli_fetch_array($data)) {
        $hasil[] = $row;
    }

    return $hasil;
}


    function tampil_data_jenis_kelamin() {
        $data_jenis_kelamin = mysqli_query($this->koneksi, "SELECT * FROM jenis_kelamin");
        while ($row_jenis_kelamin = mysqli_fetch_array($data_jenis_kelamin)) {
            $hasil_jenis_kelamin[] = $row_jenis_kelamin;
        }
        return $hasil_jenis_kelamin;
    }

    //PENDAFTARAN IBU HAMIL
    public function tambah_data_bumil($NIK_bumil, $nama_bumil, $tanggal_lahir, $nama_suami, $HPHT, $alamat)
    {
      mysqli_query($this->koneksi, "INSERT INTO data_bumil (NIK_bumil, nama_bumil, tanggal_lahir, nama_suami, HPHT, alamat) 
      VALUES ('$NIK_bumil', '$nama_bumil', '$tanggal_lahir', '$nama_suami', '$HPHT', '$alamat')");
    } 

    public function tampil_data_bumil()
    {
        $hasil = array(); // Initialize an empty array
    
        $data = mysqli_query($this->koneksi, "SELECT * FROM data_bumil");
    
        while ($row = mysqli_fetch_array($data)) {
            $hasil[] = $row;
        }
    
        return $hasil;
    }

    //CARI NIK BALITA
    function cari_nik_balita($NIK)
    {
        //echo "ggg";
        $data_balita = mysqli_query($this->koneksi, "SELECT * FROM data_balita WHERE NIK_balita = $NIK");
        $hasil_data_nik = array(); // Menginisialisasi array hasil
    
        $hasil_data_nik = mysqli_fetch_array($data_balita);//print_r($hasil_data_nik);die();
        return $hasil_data_nik;
    }
    
    //AMBIL DATA NIK
    function ambil_data_nik()
    {
        $data_balita = mysqli_query($this->koneksi, "SELECT * FROM data_balita");
        $hasil_data_nik = array(); // Menginisialisasi array hasil
    
        //$x = mysqli_num_rows($data_balita);
        //print_r($x);
        while ($row = mysqli_fetch_array($data_balita)) {
            $hasil_data_nik[] = $row; // Mengambil NIK_balita saja
        }
        return $hasil_data_nik;
    }

    //TAMBAH CATATAN BALITA
    public function tambah_catatan_balita($NIK_balita, $nama_balita, $tanggal_timbang, $tinggi_badan, $berat_badan, $usia, $vitamin, $imunisasi)
    {

      mysqli_query($this->koneksi, "INSERT INTO penimbangan_balita (NIK_balita, nama_balita, tanggal_timbang, tinggi_badan, berat_badan, usia, vitamin, imunisasi)
      VALUES ('$NIK_balita', '$nama_balita', '$tanggal_timbang', '$tinggi_badan', '$berat_badan', '$usia', '$vitamin', '$imunisasi')");
    } 
     
    //TAMPIL CATATAN BALITA
    public function tampil_catatan_balita()
    {
    $data = mysqli_query($this->koneksi, "SELECT * FROM penimbangan_balita");
    $hasil = array();

    while ($row = mysqli_fetch_array($data)) {
        $hasil[] = $row;
    }

    return $hasil;
    }

    //TAMBAH LAYANAN BUMIL
    public function tambah_layanan_bumil($NIK_bumil, $nama_bumil,  $tanggal_cekbumil, $berat_bumil, $lingkar_perut, $usia_hamil, $keluhan)
    {

      mysqli_query($this->koneksi, "INSERT INTO pelayanan_bumil (NIK_bumil, nama_bumil, tanggal_cekbumil, berat_bumil, lingkar_perut, usia_hamil, keluhan)
      VALUES ('$NIK_bumil', '$nama_bumil', '$tanggal_cekbumil', '$berat_bumil', '$lingkar_perut', '$usia_hamil', '$keluhan')");
    } 
     
    //TAMPIL LAYANAN BUMIL
    public function tampil_layanan_bumil()
    {
    $data = mysqli_query($this->koneksi, "SELECT * FROM pelayanan_bumil");
    $hasil = array();

    while ($row = mysqli_fetch_array($data)) {
        $hasil[] = $row;
    }

    return $hasil;
    }

    //CARI NIK BUMIL
    function cari_nik_bumil($NIK)
    {
        //echo "ggg";
        $data_bumil = mysqli_query($this->koneksi, "SELECT * FROM data_bumil WHERE NIK_bumil =$NIK");
        $hasil_data_nik_bumil = array(); // Menginisialisasi array hasil
    
        $hasil_data_nik_bumil = mysqli_fetch_array($data_bumil);//print_r($hasil_data_nik);die();
        return $hasil_data_nik_bumil;
    }
    
    function ambil_data_nik_bumil()
    {
        $data_bumil = mysqli_query($this->koneksi, "SELECT * FROM data_bumil");
        $hasil_data_nik_bumil = array(); // Menginisialisasi array hasil
    
        //$x = mysqli_num_rows($data_balita);
        //print_r($x);
        while ($row = mysqli_fetch_array($data_bumil)) {
            $hasil_data_nik_bumil[] = $row; // Mengambil NIK_balita saja
        }
        return $hasil_data_nik_bumil;
    }

    //EDIT HAPUS
    public function edit_data_balita($NIK_balita, $nama_balita, $jenis_kelamin, $tanggal_lahir, $nama_ibu, $alamat_balita)
    {
    mysqli_query($this->koneksi, "UPDATE data_balita SET 
                                nama_balita = '$nama_balita',
                                jenis_kelamin = '$jenis_kelamin',
                                tanggal_lahir = '$tanggal_lahir',
                                nama_ibu = '$nama_ibu',
                                alamat_balita = '$alamat_balita'
                                WHERE NIK_balita = '$NIK_balita'");
    }

    public function hapus_data_balita($NIK_balita)
    {
    mysqli_query($this->koneksi, "DELETE FROM data_balita WHERE NIK_balita = '$NIK_balita'");
    }

    public function edit_data_bumil($NIK_bumil, $nama_bumil, $tanggal_lahir, $nama_suami, $HPHT, $alamat)
    {
        // Gunakan NIK_bumil sebagai kunci untuk menentukan baris yang akan diubah
        mysqli_query($this->koneksi, "UPDATE data_bumil 
                                       SET nama_bumil = '$nama_bumil', 
                                           tanggal_lahir = '$tanggal_lahir', 
                                           nama_suami = '$nama_suami', 
                                           HPHT = '$HPHT', 
                                           alamat = '$alamat' 
                                       WHERE NIK_bumil = '$NIK_bumil'");
    }

    public function hapus_data_bumil($NIK_bumil)
    {
    mysqli_query($this->koneksi, "DELETE FROM data_bumil WHERE NIK_bumil = '$NIK_bumil'");
    }
    






    //TAMPIL ANGGOTA
    public function tampil_anggota()
{
    $hasil = array(); 
    $data = mysqli_query($this->koneksi, "SELECT a.NIK_balita, a.nama_balita, a.tanggal_lahir AS tanggal_lahir_balita, a.alamat_balita,
                                            b.NIK_bumil, b.nama_bumil, b.tanggal_lahir AS tanggal_lahir_bumil, b.alamat AS alamat_bumil
                                        FROM data_balita a
                                        INNER JOIN data_bumil b ON a.NIK_balita = b.NIK_bumil");

    while($row = mysqli_fetch_array($data))
    {
        $hasil[] = $row;
    }

    return $hasil;
}


}

?>

