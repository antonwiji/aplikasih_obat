<?php
session_start();
require '../controllers/users.php';
if (isset($_POST["submit"])) {
    if (create($_POST) > 0) {
        echo "<script>
		alert('Berhasil Melakukan Pendaftaran')
		document.location.href='index.php';
		</script>";
    } else {
        echo "<script>
		alert('Gagal Melakukan Pendaftaran')
		document.location.href='index.php';
		</script>";
    }
}
?>
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
    <title>Login | Loka Kesehatan tradisional masyarakat (lktm) palembang</title>
    <meta name="description" content="A responsive bootstrap 4 admin dashboard template by hencework" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="../assets_dashboard/favicon.ico">
    <link rel="icon" href="../assets_dashboard/favicon.ico" type="image/x-icon">

    <!-- Custom CSS -->
    <link href="../assets_dashboard/dist/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <!-- Preloader -->
    <div class="preloader-it">
        <div class="loader-pendulums"></div>
    </div>
    <!-- /Preloader -->

    <!-- HK Wrapper -->
    <div class="hk-wrapper">

        <!-- Main Content -->
        <div class="hk-pg-wrapper hk-auth-wrapper">
            <header class="d-flex justify-content-between align-items-center">
                <a class="d-flex auth-brand" href="#">
                    <!-- <img class="brand-img" src="../upload/logo.jpg" style="width: 15%;" alt="brand" /> -->
                </a>
            </header>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-5 pa-0">
                        <div id="owl_demo_1" class="owl-carousel dots-on-item owl-theme">
                            <div class="fadeOut item auth-cover-img overlay-wrap" style="background-image:url(../assets_dashboard/dist/img/1.jpg);">
                                <div class="auth-cover-info py-xl-0 pt-100 pb-50">
                                    <div class="auth-cover-content text-center w-xxl-75 w-sm-90 w-xs-100">
                                        <h1 class="display-3 text-white mb-20">Understand and look deep into nature.</h1>
                                        <p class="text-white">The purpose of lorem ipsum is to create a natural looking block of text (sentence, paragraph, page, etc.) that doesn't distract from the layout. Again during the 90s as desktop publishers bundled the text with their software.</p>
                                    </div>
                                </div>
                                <div class="bg-overlay bg-trans-dark-50"></div>
                            </div>
                            <div class="fadeOut item auth-cover-img overlay-wrap" style="background-image:url(../assets_dashboard/dist/img/2.jpg);">
                                <div class="auth-cover-info py-xl-0 pt-100 pb-50">
                                    <div class="auth-cover-content text-center w-xxl-75 w-sm-90 w-xs-100">
                                        <h1 class="display-3 text-white mb-20">Experience matters for good applications.</h1>
                                        <p class="text-white">The passage experienced a surge in popularity during the 1960s when Letraset used it on their dry-transfer sheets, and again during the 90s as desktop publishers bundled the text with their software.</p>
                                    </div>
                                </div>
                                <div class="bg-overlay bg-trans-dark-50"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 pa-0">
                        <div class="auth-form-wrap py-xl-0 py-50">
                            <div class="auth-form w-xxl-55 w-xl-75 w-sm-90 w-xs-100">
                                <?php if (isset($error)) : ?>
                                    <div class="alert alert-danger">
                                        <a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Username/Password Anda Salah!
                                    </div>
                                <?php endif; ?>
                                <?php if (isset($_SESSION["pesan"])) : ?>
                                    <div class="alert alert-success">
                                        <a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><?= $_SESSION["pesan"]; ?>
                                    </div>
                                <?php endif; ?>
                                <?php unset($_SESSION["pesan"]); ?>
                                <form action="" method="POST">
                                    <input class="form-control" name="level" value="Pembeli" type="hidden">
                                    <p class="mb-10 mt-10 pt-20">Register your account and enjoy unlimited perks.</p>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Nama" name="nama" type="text">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="NIK" name="nik" type="text">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="No. Hp" name="no_hp" type="text">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Alamat" name="alamat" type="text">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Kecamatan" name="kecamatan" type="text">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Kabupaten/Kota" name="kabupaten" type="text">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Provinsi" name="provinsi" type="text">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Username" name="username" type="text">
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input class="form-control" name="password" placeholder="Password" type="password">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><span class="feather-icon"><i data-feather="eye-off"></i></span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input class="form-control" name="konfirmasi_password" placeholder="Konfirmasi Password" type="password">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><span class="feather-icon"><i data-feather="eye-off"></i></span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary btn-block" name="submit" type="submit">Register</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Main Content -->

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

    <!-- Owl JavaScript -->
    <script src="../assets_dashboard/vendors/owl.carousel/dist/owl.carousel.min.js"></script>

    <!-- FeatherIcons JavaScript -->
    <script src="../assets_dashboard/dist/js/feather.min.js"></script>

    <!-- Init JavaScript -->
    <script src="../assets_dashboard/dist/js/init.js"></script>
    <script src="../assets_dashboard/dist/js/login-data.js"></script>
</body>

</html>