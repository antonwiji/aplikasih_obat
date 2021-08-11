<?php
session_start();
require '../controllers/config_load_data.php';
require '../controllers/perintah.php';
require '../layout_dashboard/head.php';
require '../layout_dashboard/head.php';
require '../layout_dashboard/topbar.php';
require '../layout_dashboard/sidebar.php';
$id_perintah = $_GET['id_perintah'];
$perintah = query("SELECT * FROM tb_perintah WHERE id_perintah = $id_perintah")[0];
if (isset($_POST["submit"])) {
    if (konfirmasi($_POST) > 0) {
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
            <li class="breadcrumb-item"><a href="#">Konfirmasi Perintah</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Konfirmasi perintah</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <!-- Container -->
    <div class="container">

        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="database"></i></span></span>Data Konfirmasi perintah</h4>
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
                                <form action="" method="post">
                                    <input type="hidden" name="id_perintah" value="<?= $perintah['id_perintah']  ?>">
                                    <div class="form-group">
                                        <label class="col-md-12 control-label">Konfirmasi Barang Diterima</label>
                                        <div class="col-md">
                                            <select name="konfirmasi_barang_diterima" class="form-control">
                                                <option value="<?= $perintah['konfirmasi_barang_diterima']  ?>"><?= $perintah['konfirmasi_barang_diterima']  ?></option>
                                                <option value="Belum Dikonfirmasi">Belum Dikonfirmasi</option>
                                                <option value="Dikonfirmasi">Dikonfirmasi</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label">Konfirmasi Sampai Dikantor</label>
                                        <div class="col-md">
                                            <select name="konfirmasi_sampai_kantor" class="form-control">
                                                <option value="<?= $perintah['konfirmasi_sampai_kantor']  ?>"><?= $perintah['konfirmasi_sampai_kantor']  ?></option>
                                                <option value="Belum Dikonfirmasi">Belum Dikonfirmasi</option>
                                                <option value="Dikonfirmasi">Dikonfirmasi</option>
                                            </select>
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