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
                <h3 class="card-title">Pencatan Balita</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php
                        $no = 1;
                        $NIK_balita = $_POST['NIK_balita'];
                        $data_balita =  $db->cari_nik_balita($NIK_balita);//print_r($data_balita);
                        
                ?>
              <form action="simpan_catatan_balita.php" method="post">
             
                <div class="card-body">
                <div class="form-group">
                      <label for="nama_balita">Nama Bayi</label>
                      <input type="text" class="form-control" name="nama_balita" value="<?php echo $data_balita[1];?>">

                    </div>
                <div class="form-group">
                      <label for="NIK_balita">NIK Balita</label>
                      <input type="text" class="form-control" name="NIK_balita" value="<?php echo $data_balita[0];?>">
                    </div>
                <div class="form-group">
                      <label for="tanggal_timbang">Tanggal Timbang</label>
                      <input type="date" class="form-control" name="tanggal_timbang">
                    </div>
                <div class="form-group">
                        <label for="tinggi_badan">Tinggi Badan</label>
                        <input type="int" class="form-control" name="tinggi_badan" placeholder="Tinggi Balita">
                      </div>
                      <div class="form-group">
                        <label for="berat_badan">Berat Badan</label>
                        <input type="int" class="form-control" name="berat_badan" placeholder="Berat Balita">
                      </div>
                      <div class="form-group">
                        <label for="usia">Usia</label>
                        <input type="int" class="form-control" name="usia" placeholder="usia">
                      </div>
                      <div class="form-group">
                        <label for="vitamin">Vitamin</label>
                        <input type="int" class="form-control" name="vitamin" placeholder="vitamin">
                      </div>
                      <div class="form-group">
                        <label for="imunisasi">Imunisasi</label>
                        <input type="text" class="form-control" name="imunisasi" placeholder="imunisasi">
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
