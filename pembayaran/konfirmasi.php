<?php
session_start();
require '../controllers/config_load_data.php';
require '../controllers/pembayaran.php';
require '../layout_dashboard/head.php';
require '../layout_dashboard/head.php';
require '../layout_dashboard/topbar.php';
require '../layout_dashboard/sidebar.php';
require '../smsnotif.php';
$id_pembayaran = $_GET['id_pembayaran'];
$pembayaran = query("SELECT * FROM tb_pembayaran INNER JOIN tb_pembelian ON tb_pembayaran.id_pembelian = tb_pembelian.id_pembelian INNER JOIN tb_users ON tb_pembelian.id_users = tb_users.id_users WHERE id_pembayaran = $id_pembayaran")[0];
$beli = $pembayaran['id_pembelian'];
$nama = $pembayaran['nama'];
$nohp = $pembayaran['no_hp'];
$alamat = $pembayaran['alamat'];
$id = $pembayaran['id_pembayaran'];

if (isset($_POST["submit"])) {

    sendsms("085709005738","Hallo kurir pesanan masuk Atas nama $nama : Dengan Alamat $alamat No. hp $nohp");

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
            <li class="breadcrumb-item"><a href="#">Konfirmasi embelian</a></li>
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
                                <form action="" method="post">
                                    <input type="hidden" name="id_pembayaran" value="<?= $pembayaran['id_pembayaran']  ?>">
                                    <div class="form-group">
                                        <label class="col-md-12 control-label">Status pembayaran</label>
                                        <div class="col-md">
                                            <select name="status_pembayaran" class="form-control">
                                                <option value="<?= $pembayaran['status_pembayaran']  ?>"><?= $pembayaran['status_pembayaran']  ?></option>
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