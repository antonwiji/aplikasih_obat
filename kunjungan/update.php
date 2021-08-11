<?php
session_start();
require '../controllers/config_load_data.php';
require '../controllers/kunjungan.php';
require '../layout_dashboard/head.php';
require '../layout_dashboard/head.php';
require '../layout_dashboard/topbar.php';
require '../layout_dashboard/sidebar.php';
$id_kunjungan = $_GET['id_kunjungan'];
$kunjungan = query("SELECT * FROM tb_kunjungan WHERE id_kunjungan = '$id_kunjungan' ")[0];
if (isset($_POST["submit"])) {
    if (update($_POST) > 0) {
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
            <li class="breadcrumb-item"><a href="#">kunjungan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data kunjungan</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <!-- Container -->
    <div class="container">

        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="database"></i></span></span>Data kunjungan</h4>
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <a href="#" class="btn btn-primary btn-lg m-3" data-toggle="modal" data-target="#newRoleModal">
                        <i class="fas fa-plus"></i>
                    </a>
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
                                    <input type="hidden" name="id_kunjungan" value="<?= $id_kunjungan; ?>">
                                    <div class="form-group">
                                        <label class="col-md-12 control-label">Poli</label>
                                        <div class="col-md">
                                            <input type="text" name="poli" class="form-control" placeholder="Poli" value="PELAYANAN KESEHATAN TRADISIONAL LKTM">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label">Bulan</label>
                                        <div class="col-md">
                                            <input type="text" name="bulan" class="form-control" placeholder="Bulan" value="<?= $kunjungan['bulan'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label">Hari/Tgl</label>
                                        <div class="col-md">
                                            <input type="text" name="hari_tanggal" class="form-control" placeholder="Hari/Tgl" value="<?= $kunjungan['hari_tanggal'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label">No. Reg</label>
                                        <div class="col-md">
                                            <input type="text" name="no_reg" class="form-control" placeholder="No. Reg" value="<?= $kunjungan['no_reg'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label">Nama Pasien</label>
                                        <div class="col-md">
                                            <input type="text" name="nama_pasien" class="form-control" placeholder="Nama Pasien" value="<?= $kunjungan['nama_pasien'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label">Umur</label>
                                        <div class="col-md">
                                            <input type="number" name="umur" class="form-control" placeholder="Umur" value="<?= $kunjungan['umur'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label">Status L/K</label>
                                        <div class="col-md">
                                            <select name="status_l_b" id="status_l_b" class="form-control">
                                                <option value="<?= $kunjungan['status_l_b'] ?>"> <?= $kunjungan['status_l_b'] ?> </option>
                                                <option value="L">L</option>
                                                <option value="B">B</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label">Status LK/PR</label>
                                        <div class="col-md">
                                            <select name="status_lk_pr" id="status_lk_pr" class="form-control">
                                                <option value="<?= $kunjungan['status_lk_pr'] ?>"> <?= $kunjungan['status_lk_pr'] ?> </option>
                                                <option value="LK">LK</option>
                                                <option value="PR">PR</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label">Alamat</label>
                                        <div class="col-md">
                                            <input type="text" name="alamat" class="form-control" placeholder="Alamat" value="<?= $kunjungan['alamat'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label">Akp</label>
                                        <div class="col-md">
                                            <input type="number" name="akp" class="form-control" placeholder="Akp" value="<?= $kunjungan['akp'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label">K.Jamu</label>
                                        <div class="col-md">
                                            <input type="number" name="k_jamu" class="form-control" placeholder="K.Jamu" value="<?= $kunjungan['k_jamu'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label">Akupresur</label>
                                        <div class="col-md">
                                            <select name="akupresur" id="akupresur" class="form-control">
                                                <option value="<?= $kunjungan['akupresur'] ?>"> <?= $kunjungan['akupresur'] ?> </option>
                                                <option value="Dewasa">Dewasa</option>
                                                <option value="Bayi">Bayi</option>
                                                <option value="Anak-Anak">Anak-Anak</option>
                                                <option value="Facial">Facial</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label">TDP</label>
                                        <div class="col-md">
                                            <input type="number" name="tdp" class="form-control" placeholder="TDP" value="<?= $kunjungan['tdp'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label">US</label>
                                        <div class="col-md">
                                            <input type="number" name="us" class="form-control" placeholder="US" value="<?= $kunjungan['us'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label">SPA</label>
                                        <div class="col-md">
                                            <input type="number" name="spa" class="form-control" placeholder="SPA" value="<?= $kunjungan['spa'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label">COL</label>
                                        <div class="col-md">
                                            <input type="number" name="col" class="form-control" placeholder="COl" value="<?= $kunjungan['col'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label">AU</label>
                                        <div class="col-md">
                                            <input type="number" name="au" class="form-control" placeholder="AU" value="<?= $kunjungan['au'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label">GDS</label>
                                        <div class="col-md">
                                            <input type="number" name="gds" class="form-control" placeholder="GDS" value="<?= $kunjungan['gds'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label">OHT</label>
                                        <div class="col-md">
                                            <input type="number" name="oht" class="form-control" placeholder="OHT" value="<?= $kunjungan['oht'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label">Keterangan</label>
                                        <div class="col-md">
                                            <input type="text" name="keterangan_kunjungan" class="form-control" placeholder="Keterangan" value="<?= $kunjungan['keterangan_kunjungan'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label"></label>
                                        <div class="col-md">
                                            <button class="btn btn-primary btn-lg" name="submit" type="submit">
                                                <i class="fas fa-save"></i> Simpan
                                            </button>
                                            <button type="button" class="btn btn-danger waves-effect btn-lg" data-dismiss="modal">CLOSE</button>
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