<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | General Form Elements</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body>
    <?php
    include 'index_kader_new.html';
    include 'config.php';
  
    $db = new Database();
  
    if (isset($_GET['NIK'])) {
      $NIK_bumil = $_GET['NIK'];
      $data_bumil = $db->cari_nik_bumil($NIK_bumil);
    } else {
      echo "GAGAL MENDAPATKAN DATA BALITA";
    }
    ?>

<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- Content for the right side of the page (form) -->
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Data Ibu Hamil</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="simpan_edit_data_bumil.php" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="NIK_bumil">NIK Ibu Hamil</label>
                    <input type="text" class="form-control" name="NIK_bumil"
                    value="<?php echo $data_bumil['NIK_bumil']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="nama_bumil">Nama Bumil</label>
                    <input type="text" class="form-control" name="nama_bumil"
                    value="<?php echo $data_bumil['nama_bumil']; ?>">
                  </div>

                  <div class="form-group">
                      <label for="tanggal_lahir">Tanggal Lahir</label>
                      <input value="<?php echo $data_bumil['tanggal_lahir'] ?>" type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                  </div>

                    <div class="form-group">
                      <label for="nama_suami">Nama Suami</label>
                      <input value="<?php echo $data_bumil['nama_suami'] ?>" type="text" class="form-control" id="nama_suami" name="nama_suami" placeholder="Nama Suami">                    
                    </div>
                    
                      <div class="form-group">
                      <label for="HPHT">HPHT</label>
                      <input value="<?php echo $data_bumil['HPHT']?>" type="date" class="form-control" id="HPHT" name="HPHT">
                    </div>
  
                    <div class="form-group">
                      <label for="alamat_bumil">Alamat Ibu Hamil</label>
                      <input value="<?php echo $data_bumil['alamat'] ?>" type="text" class="form-control" id="alamat" name="alamat"
                      placeholder="Alamat Bumil">                    
                    </div>
                    <div class="form-group">
                      <!-- Kosongkan label dan gunakan input submit untuk tombol "Simpan" -->
                      <input type="submit" class="btn btn-primary" value="Simpan">
                    </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- jQuery -->
  <script src="template/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- bs-custom-file-input -->
  <script src="template/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <!-- AdminLTE App -->
  <script src="template/dist/js/adminlte.min.js"></script>

  <!-- Page specific script -->
  <script>
    $(function () {
      bsCustomFileInput.init();
    });
  </script>
</body>
</html>
