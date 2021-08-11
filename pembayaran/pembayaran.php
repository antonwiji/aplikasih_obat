<?php
session_start();
require '../controllers/config_load_data.php';
require '../controllers/pembayaran.php';
require '../layout_dashboard/head.php';
require '../layout_dashboard/head.php';
require '../layout_dashboard/topbar.php';
require '../layout_dashboard/sidebar.php';
$id_pembayaran = $_GET['id_pembayaran'];
$pembayaran = query("SELECT * FROM tb_pembayaran WHERE id_pembayaran = $id_pembayaran")[0];
if (isset($_POST["submit"])) {
    if (pembayaran($_POST) > 0) {
        echo "<script>
		alert('Data Berhasil Diupdate')
		document.location.href='index.php';
		</script>";
    } else {
        echo "<script>
		alert('Data Gagal Diupdate')
		document.location.href='index.php';
		</script>";
    }
}
?>
<!-- Main Content -->
<div class="hk-pg-wrapper">
    <!-- Breadcrumb -->
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="#">Konfirmasi Pembayaran</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Konfirmasi pembayaran</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <!-- Container -->
    <div class="container">

        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="database"></i></span></span>Data Konfirmasi pembayaran</h4>
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <?php if (isset($_SESSION["pesan"])) : ?>
                        <div class="alert alert-success mt-3">
                            <a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><?= $_SESSION["pesan"]; ?>
                        </div>
                    <?php endif; ?>
                    <?php unset($_SESSION["pesan"]); ?>
                    <div class="row">
                        <div class="col-sm">
                            <div class="table-wrap">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id_pembayaran" value="<?= $pembayaran['id_pembayaran']  ?>">
                                    <input type="hidden" name="bukti_pembayaranLama" value="<?= $pembayaran['bukti_pembayaran']  ?>">
                                    <div class="form-group">
                                        <label class="col-md-12 control-label">Bukti pembayaran * <small><a href="../upload/bukti_pembayaran/<?= $pembayaran['bukti_pembayaran'] ?>"><?= $pembayaran['bukti_pembayaran'] ?></a></small></label>
                                        <div class="col-md">
                                            <input type="file" name="bukti_pembayaran" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label"></label>
                                        <div class="col-md">
                                            <button class="btn btn-primary btn-lg" name="submit" type="submit">
                                                <i class="fas fa-save"></i> Simpan
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- /Row -->
    </div>
    <!-- /Container -->

    <?php require '../layout_dashboard/footer.php' ?>