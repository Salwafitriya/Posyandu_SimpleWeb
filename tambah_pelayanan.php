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

<body class="hold-transition sidebar-mini">
<?php
    include "menu_kader.php"
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
                <h3 class="card-title">Pelayanan Ibu Hamil</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php
                        $no = 1;
                        $NIK_bumil = $_POST['NIK_bumil'];
                        $data_bumil =  $db->cari_nik_bumil($NIK_bumil);//print_r($data_balita);
                        
                ?>
              <form action="simpan_layanan_bumil.php" method="post">
             
                <div class="card-body">
                <div class="form-group">
                      <label for="nama_bumil">Nama Bumil</label>
                      <input type="text" class="form-control" name="nama_bumil" value="<?php echo $data_bumil[1];?>">
                      <!-- <input type="date" class="form-control" name="tanggal_timbang"> -->
                    </div>
                <div class="form-group">
                      <label for="NIK_bumil">NIK Bumil</label>
                      <input type="text" class="form-control" name="NIK_bumil" value="<?php echo $data_bumil[0];?>">
                    </div>
                <div class="form-group">
                      <label for="tanggal_cekbumil">Tanggal Cek Ibu Hamil</label>
                      <input type="date" class="form-control" name="tanggal_cekbumil">
                    </div>
                <div class="form-group">
                        <label for="berat_badan">Berat Badan</label>
                        <input type="int" class="form-control" name="berat_badan" placeholder="Berat Badan Bumil">
                      </div>
                      <div class="form-group">
                        <label for="lingkar_perut">Lingkar Perut</label>
                        <input type="int" class="form-control" name="lingkar_perut" placeholder="Lingkar Perut">
                      </div>
                      <div class="form-group">
                        <label for="usia_hamil">Usia Kehamilan</label>
                        <input type="int" class="form-control" name="usia_hamil" placeholder="Usia Kehamilan">
                      </div>
                      <div class="form-group">
                        <label for="vitamin">Keluhan</label>
                        <input type="text" class="form-control" name="keluhan" placeholder="Keluhan">
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
