<?php
session_start();
require '../controllers/config_load_data.php';
require '../controllers/konsultasi.php';

$id_penerima = $_GET['id_users'];
$id_pengirim = $_SESSION['login']['id_users'];

if (isset($_POST["submit"])) {
    if (create($_POST) > 0) {
        $_SESSION["pesan"] = "konsultasi Berhasil dikirim";
        header("location: isi_konsultasi.php?id_users=$id_penerima");
    }
} ?>
<!DOCTYPE html>
<!-- 
Template Name: Mintos - Responsive Bootstrap 4 Admin Dashboard Template
Author: Hencework
Contact: support@hencework.com

License: You must have a valid license purchased only from templatemonster to legally use the template for your project.
-->
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Loka Kesehatan tradisional masyarakat (lktm) palembang</title>
    <meta name="description" content="A responsive bootstrap 4 admin dashboard template by hencework" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="../assets_dashboard/favicon.ico">
    <link rel="icon" href="../assets_dashboard/favicon.ico" type="image/x-icon">

    <!-- vector map CSS -->
    <link href="../assets_dashboard/vendors/vectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" type="text/css" />

    <!-- Toggles CSS -->
    <link href="../assets_dashboard/vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
    <link href="../assets_dashboard/vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">

    <!-- Toastr CSS -->
    <link href="../assets_dashboard/vendors/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="../assets_dashboard/dist/css/style.css" rel="stylesheet" type="text/css">


    <!-- Data Table CSS -->
    <link href="../assets_dashboard/vendors/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets_dashboard/vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css" /> <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../assets_dashboard/font-awesome/css/all.min.css">


    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../adminlte/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" href="../adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../adminlte/plugins/summernote/summernote-bs4.css">
</head>

<body>
    <?php
    require '../layout_dashboard/topbar.php';
    require '../layout_dashboard/sidebar.php';
    if ($_SESSION['login']['level'] == 'Apoteker') {
        $konsultasi = query("SELECT * FROM tb_konsultasi INNER JOIN tb_users on tb_konsultasi.id_pengirim = tb_users.id_users WHERE tb_konsultasi.id_penerima = '$id_penerima' or tb_konsultasi.id_pengirim = '$id_penerima' ORDER BY id_konsultasi ASC ");
    } else {
        $konsultasi = query("SELECT * FROM tb_konsultasi INNER JOIN tb_users on tb_konsultasi.id_pengirim = tb_users.id_users WHERE tb_konsultasi.id_penerima = '$id_pengirim' or tb_konsultasi.id_pengirim = '$id_pengirim' ORDER BY id_konsultasi ASC ");
    }
    ?>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid hk-pg-wrapper container">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-lg-11 col-11">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php if (isset($_SESSION["pesan"])) : ?>
                                <div class="alert alert-success">
                                    <a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><?= $_SESSION["pesan"]; ?>
                                </div>
                            <?php endif; ?>
                            <?php unset($_SESSION["pesan"]); ?>
                            <!-- Conversations are loaded here -->
                            <div class="direct-chat-messages" style="min-height: 350px;">
                                <?php foreach ($konsultasi as $konsultasi) { ?>
                                    <?php if ($_SESSION['login']['level'] == 'Apoteker') : ?>
                                        <?php if ($konsultasi['level'] == 'Apoteker') : ?>
                                            <?php $chat0 = "right"  ?>
                                            <?php $chat1 = "right"  ?>
                                            <?php $chat2 = "left" ?>
                                        <?php endif ?>
                                        <?php if ($konsultasi['level'] == 'Pembeli') : ?>
                                            <?php $chat0 = ""  ?>
                                            <?php $chat1 = "left"  ?>
                                            <?php $chat2 = "right" ?>
                                        <?php endif ?>
                                    <?php endif ?>

                                    <?php if ($_SESSION['login']['level'] == 'Pembeli') : ?>
                                        <?php if ($konsultasi['level'] == 'Pembeli') : ?>
                                            <?php $chat0 = "right"  ?>
                                            <?php $chat1 = "right"  ?>
                                            <?php $chat2 = "left" ?>
                                        <?php endif ?>
                                        <?php if ($konsultasi['level'] == 'Apoteker') : ?>
                                            <?php $chat0 = ""  ?>
                                            <?php $chat1 = "left"  ?>
                                            <?php $chat2 = "right" ?>
                                        <?php endif ?>
                                    <?php endif ?>
                                    <!-- Message. Default to the left -->
                                    <div class="direct-chat-msg <?= $chat0  ?>">
                                        <div class="direct-chat-infos clearfix">
                                            <span class="direct-chat-name float-<?= $chat1  ?>"><?= $konsultasi['nama'] ?></span>
                                            <span class="direct-chat-timestamp float-<?= $chat2  ?>"><?= $konsultasi['waktu_kirim'] ?></span>
                                        </div>
                                        <!-- /.direct-chat-infos -->
                                        <img class="direct-chat-img" src="../upload/users/4.jpg" alt="message user image">
                                        <!-- /.direct-chat-img -->
                                        <div class="direct-chat-text">
                                            <?= $konsultasi['pesan'] ?>
                                        </div>
                                        <!-- /.direct-chat-text -->
                                    </div>
                                    <!-- /.direct-chat-msg -->
                                <?php } ?>
                            </div>
                            <!--/.direct-chat-messages-->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <form action="" method="post">
                                <input type="hidden" name="id_pengirim" value="<?= $id_pengirim  ?>">
                                <input type="hidden" name="id_penerima" value="<?= $id_penerima  ?>">
                                <div class="input-group">
                                    <input type="text" name="pesan" placeholder="Type Message ..." class="form-control">
                                    <span class="input-group-append">
                                        <button type="submit" name="submit" class="btn btn-primary">Send </button>
                                    </span>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-footer-->
                    </div>
                    <!--/.direct-chat -->
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        </div>
        <!-- /.row -->
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->

    </div>
    <!-- /HK Wrapper -->
    <!-- jQuery -->
    <script src="../assets_dashboard/vendors/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../assets_dashboard/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets_dashboard/vendors/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Slimscroll JavaScript -->
    <script src="../assets_dashboard/dist/js/jquery.slimscroll.js"></script>

    <!-- Fancy Dropdown JS -->
    <script src="../assets_dashboard/dist/js/dropdown-bootstrap-extended.js"></script>

    <!-- FeatherIcons JavaScript -->
    <script src="../assets_dashboard/dist/js/feather.min.js"></script>

    <!-- Toggles JavaScript -->
    <script src="../assets_dashboard/vendors/jquery-toggles/toggles.min.js"></script>
    <script src="../assets_dashboard/dist/js/toggle-data.js"></script>

    <!-- Counter Animation JavaScript -->
    <script src="../assets_dashboard/vendors/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="../assets_dashboard/vendors/jquery.counterup/jquery.counterup.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../assets_dashboard/vendors/raphael/raphael.min.js"></script>
    <script src="../assets_dashboard/vendors/morris.js/morris.min.js"></script>

    <!-- EChartJS JavaScript -->
    <script src="../assets_dashboard/vendors/echarts/dist/echarts-en.min.js"></script>

    <!-- Sparkline JavaScript -->
    <script src="../assets_dashboard/vendors/jquery.sparkline/dist/jquery.sparkline.min.js"></script>

    <!-- Vector Maps JavaScript -->
    <script src="../assets_dashboard/vendors/vectormap/jquery-jvectormap-2.0.3.min.js"></script>
    <script src="../assets_dashboard/vendors/vectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../assets_dashboard/dist/js/vectormap-data.js"></script>

    <!-- Owl JavaScript -->
    <script src="../assets_dashboard/vendors/owl.carousel/dist/owl.carousel.min.js"></script>

    <!-- Toastr JS -->
    <script src="../assets_dashboard/vendors/jquery-toast-plugin/dist/jquery.toast.min.js"></script>

    <!-- Init JavaScript -->
    <script src="../assets_dashboard/dist/js/init.js"></script>
    <script src="../assets_dashboard/dist/js/dashboard-data.js"></script>

    <!-- Data Table JavaScript -->
    <script src="../assets_dashboard/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../assets_dashboard/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../assets_dashboard/vendors/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
    <script src="../assets_dashboard/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../assets_dashboard/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="../assets_dashboard/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../assets_dashboard/vendors/jszip/dist/jszip.min.js"></script>
    <script src="../assets_dashboard/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../assets_dashboard/vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="../assets_dashboard/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../assets_dashboard/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../assets_dashboard/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../assets_dashboard/dist/js/dataTables-data.js"></script>


    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="../adminlte/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="../adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../adminlte/dist/js/adminlte.js"></script>

    <!-- OPTIONAL SCRIPTS -->
    <script src="../adminlte/dist/js/demo.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="../adminlte/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="../adminlte/plugins/raphael/raphael.min.js"></script>
    <script src="../adminlte/plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="../adminlte/plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="../adminlte/plugins/chart.js/Chart.min.js"></script>

    <!-- PAGE SCRIPTS -->
    <script src="../adminlte/dist/js/pages/dashboard2.js"></script>
    <!-- DataTables -->
    <script src="../adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <!-- Summernote -->
    <script src="../adminlte/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- page script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
    <script>
        $(function() {
            // Summernote
            $('.textarea').summernote()
        })
    </script>
</body>

</html>