<?php
session_start();
require '../controllers/config_load_data.php';
require '../controllers/users.php';
require '../layout_dashboard/head.php';
require '../layout_dashboard/head.php';
require '../layout_dashboard/topbar.php';
require '../layout_dashboard/sidebar.php';
$users = query("SELECT * FROM tb_users WHERE level != 'Admin'");
if (isset($_POST["submit"])) {
    if (create($_POST) > 0) {
        echo "<script>
		alert('Data Berhasil Ditambah')
		document.location.href='index.php';
		</script>";
    } else {
        echo "<script>
		alert('Data Gagal Ditambah')
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
            <li class="breadcrumb-item"><a href="#">Users</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Users</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <!-- Container -->
    <div class="container">

        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="database"></i></span></span>Data Users</h4>
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
                                <table id="datable_1" class="table table-hover w-100 display pb-30">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>NIK</th>
                                            <th>No. Hp/WA</th>
                                            <th>Alamat</th>
                                            <th>Kecamatan</th>
                                            <th>Kabupaten/Kota</th>
                                            <th>Provinsi</th>
                                            <th>Username</th>
                                            <th>level</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($users as $users) : ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $users['nama'] ?></td>
                                                <td><?= $users['nik'] ?></td>
                                                <td><?= $users['no_hp'] ?></td>
                                                <td><?= $users['alamat'] ?></td>
                                                <td><?= $users['kecamatan'] ?></td>
                                                <td><?= $users['kabupaten'] ?></td>
                                                <td><?= $users['provinsi'] ?></td>
                                                <td><?= $users['username'] ?></td>
                                                <td><?= $users['level'] ?></td>
                                                <td>
                                                    <a href="update.php?id_users=<?= $users['id_users']; ?>" class="btn btn-primary"> <i class="fas fa-pencil-alt"></i></a>
                                                    <a href="delete.php?id_users=<?= $users['id_users']; ?>" class="btn btn-danger" onclick="return confirm('Anda Yakin Ingin Menghapus Data ini?')"> <i class="fas fa-trash"></i> </a>
                                                </td>
                                            </tr>
                                        <?php $no++;
                                        endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- /Row -->
    </div>
    <!-- /Container -->

    <!-- Modal tambah -->
    <div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="exampleRoleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleRoleModalLabel">Tambah Data</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post">
                    <div class="form-group">
                        <label class="col-md-12 control-label">Nama</label>
                        <div class="col-md">
                            <input type="text" name="nama" class="form-control" placeholder="Nama" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 control-label">No. Hp</label>
                        <div class="col-md">
                            <input type="text" name="no_hp" class="form-control" placeholder="No. Hp" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 control-label">NIK</label>
                        <div class="col-md">
                            <input type="text" name="nik" class="form-control" placeholder="NIK" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 control-label">Alamat</label>
                        <div class="col-md">
                            <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 control-label">Kecamatan</label>
                        <div class="col-md">
                            <input type="text" name="kecamatan" class="form-control" placeholder="Kecamatan" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 control-label">Kabupaten/Kota</label>
                        <div class="col-md">
                            <input type="text" name="kabupaten" class="form-control" placeholder="Kabupaten/Kota" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 control-label">Provinsi</label>
                        <div class="col-md">
                            <input type="text" name="provinsi" class="form-control" placeholder="Provinsi" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 control-label">Username</label>
                        <div class="col-md">
                            <input type="text" name="username" class="form-control" placeholder="Username" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 control-label">Password</label>
                        <div class="col-md">
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 control-label">Konfirmasi Password</label>
                        <div class="col-md">
                            <input type="password" name="konfirmasi_password" class="form-control" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 control-label">Level</label>
                        <div class="col-md">
                            <select name="level" class="form-control">
                                <option value="Pimpinan">Pimpinan</option>
                                <option value="Kurir">Kurir</option>
                                <option value="Apoteker">Apoteker</option>
                            </select>
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
                <!-- Footer -->
                <footer class="text-center mt-5 pb-3">
                    <h4>Copyright &copy; <?= date("Y") ?></h4>
                </footer>
            </div>
        </div>
    </div>
    <?php require '../layout_dashboard/footer.php' ?>