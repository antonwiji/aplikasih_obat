<?php
session_start();
require '../controllers/config_load_data.php';
require '../controllers/users.php';
require '../layout_dashboard/head.php';
require '../layout_dashboard/head.php';
require '../layout_dashboard/topbar.php';
require '../layout_dashboard/sidebar.php';
$id_users = $_SESSION['login']['id_users'];
$users = query("SELECT * FROM tb_users WHERE id_users = $id_users")[0];
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
            <li class="breadcrumb-item"><a href="#">Profil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Profil</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <!-- Container -->
    <div class="container">

        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="database"></i></span></span>Data Profil</h4>
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
                                    <input type="hidden" name="id_users" value="<?= $users['id_users']  ?>">
                                    <div class="form-group">
                                        <label class="col-md-12 control-label">Nama</label>
                                        <div class="col-md">
                                            <input type="text" name="nama" class="form-control" placeholder="Nama" value="<?= $users['nama']  ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label">NIK</label>
                                        <div class="col-md">
                                            <input type="number" name="nik" class="form-control" placeholder="No. Identitas" value="<?= $users['nik']  ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label">No. Hp/WA</label>
                                        <div class="col-md">
                                            <input type="text" name="no_hp" class="form-control" placeholder="No. Hp" value="<?= $users['no_hp']  ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label">Alamat</label>
                                        <div class="col-md">
                                            <input type="text" name="alamat" class="form-control" placeholder="Alamat" value="<?= $users['alamat']  ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label">Kecamatan</label>
                                        <div class="col-md">
                                            <input type="text" name="kecamatan" class="form-control" placeholder="Kecamatan" value="<?= $users['kecamatan']  ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label">Kabupaten/Kota</label>
                                        <div class="col-md">
                                            <input type="text" name="kabupaten" class="form-control" placeholder="Kabupaten/Kota" value="<?= $users['kabupaten']  ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label">Provinsi</label>
                                        <div class="col-md">
                                            <input type="text" name="provinsi" class="form-control" placeholder="Provinsi" value="<?= $users['provinsi']  ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label">Username</label>
                                        <div class="col-md">
                                            <input type="text" name="username" class="form-control" placeholder="Username" value="<?= $users['username']  ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <a href="update_password.php?id_users=<?= $users['id_users']  ?>" class="btn btn-primary">Ubah Password</a>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label">Level</label>
                                        <div class="col-md">
                                            <select name="level" class="form-control">
                                                <option value="<?= $users['level']  ?>"><?= $users['level']  ?></option>
                                                <option value="Pimpinan">Pimpinan</option>
                                                <option value="Dokter">Dokter</option>
                                                <option value="Kurir">Kurir</option>
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