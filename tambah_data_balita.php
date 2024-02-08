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
<!-- <?php
    include "menu_kader.php"
    ?> -->

<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- Content for the right side of the page (form) -->
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Data Balita</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="simpan_data_balita.php" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="NIK_balita">NIK Balita</label>
                    <input type="text" class="form-control" name="NIK_balita" placeholder="NIK Balita">
                  </div>
                  <div class="form-group">
                    <label for="nama_balita">Nama Balita</label>
                    <input type="text" class="form-control" name="nama_balita" placeholder="Nama Balita">
                  </div>
                  <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                      <option value="--"></option>
                      <?php
                        foreach ($db->tampil_data_jenis_kelamin() as $x) {
                          echo '<option value="' . $x['kode_jk'] . '">' . $x['keterangan_jk'] . '</option>';
                        }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                      <label for="tanggal_lahir">Tanggal Lahir</label>
                      <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                    </div>

                    <div class="form-group">
                      <label for="nama_ibu">Nama Ibu</label>
                      <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" placeholder="Nama Ibu">
                    </div>

                    <div class="form-group">
                      <label for="alamat_balita">Alamat Balita</label>
                      <input type="text" class="form-control" id="alamat_balita" name="alamat_balita" placeholder="Alamat Balita">
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
