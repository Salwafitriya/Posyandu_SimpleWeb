<?php
session_start();
$username = $_SESSION['username'];
include "config.php";
$db = new Database();

foreach ($db->login($username) as $x) {
    $akses_id = $x['akses_id'];
    if ($akses_id == '1') {
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | DataTables</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="template/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="template/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <?php
    include 'index_kader_new.html';  // Commented this line, as it's unclear what it contains
    ?>
     <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Balita</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">DataTables</li>
                </ol>
            </div>
            </div>
        </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-12">
                <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Balita Posyandu Nirmala</h3>
                </div>
               <!-- SEARCH FORM -->
                <form class="form-inline ml-3">
                    <div class="input-group input-group-sm">
                        <select id="searchSelect" class="form-control form-control-navbar" placeholder="Search" aria-label="Search">
                            <!-- Add default option or options if needed -->
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <!-- /.card-header -->

                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                    <thead>                  
                        <tr>
                            <th>No</th>
                            <th>NIK Balita</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th>Nama Ibu</th>
                            <th>Alamat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($db->tampil_data_balita() as $x) {
                            ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $x['NIK_balita']; ?></td>
                                <td><?php echo $x['nama_balita']; ?></td>
                                <td><?php echo $x['jenis_kelamin']; ?></td>
                                <td><?php echo $x['tanggal_lahir']; ?></td>
                                <td><?php echo $x['nama_ibu']; ?></td>
                                <td><?php echo $x['alamat_balita']; ?></td>
                                <!-- <td><a href="edit_data_balita.php?id=<?php echo $x['NIK_balita']; ?>">Edit</a></td> -->
                                <td>
                                    <!-- Edit button with data attributes -->
                                    <a class="btn btn-warning edit-btn" href="edit_data_balita.php?NIK=<?php echo $x['NIK_balita']; ?>">Edit
                                    </a>

                                    <!-- Delete button with data attributes -->
                                    <a class="btn btn-danger delete-btn" href="hapus_data_balita.php?id=<?php echo $x['NIK_balita']; ?>">
                                        Delete
                                    </a>
                                </td>
                           </tr>
                        <?php } ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<!-- jQuery -->
<script src="template/plugins/jquery/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- Bootstrap 4 -->
<script src="template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="template/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="template/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="template/plugins/jszip/jszip.min.js"></script>
<script src="template/plugins/pdfmake/pdfmake.min.js"></script>
<script src="template/plugins/pdfmake/vfs_fonts.js"></script>
<script src="template/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="template/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="template/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="template/dist/js/adminlte.min.js"></script>

<!-- Page specific script -->
<!-- Add this script after the DataTable initialization script -->
<script>
    $(function () {
        // Your existing DataTable initialization
        $("#example2").DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true
        });

        // Handle Edit button click
        $("#example2").on("click", ".edit-btn", function () {
            var nik = $(this).data("nik");
            // Redirect or perform any other action for edit based on the NIK
            // Example: window.location.href = "edit.php?nik=" + nik;
        });

        // Handle Delete button click
        $("#example2").on("click", ".delete-btn", function () {
            var nik = $(this).data("nik");
            // Perform AJAX request or any other action for delete based on the NIK
            // Example: $.post("delete.php", { nik: nik }, function (data) { /* handle response */ });
        });
    });
</script>

</body>
</html>

<?php
        }
        else{
            echo "Anda belum login";
            header("Location: login.php");
        }
    }
?>
