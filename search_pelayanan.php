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

              
              <form action="tambah_pelayanan.php" method="post">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="NIK_bumil">NIK_bumil</label>
                    <select class="form-control" name="NIK_bumil">
                    <option value="--"></option>
                       <?php
                        $no = 1;
                        foreach ($db->ambil_data_nik_bumil() as $x) {
                          echo '<option value="' . $x['NIK_bumil'] . '">' . $x['nama_bumil'] . '</option>';
                        }
                        ?>
                    </select>
                  </div>

                  <div class="form-group">
                      <input type="submit" class="btn btn-primary" value="Submit">
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
