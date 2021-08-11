<?php
session_start();
require '../controllers/config_load_data.php';
require '../controllers/product.php';
require '../layout_dashboard/head.php';
require '../layout_dashboard/head.php';
require '../layout_dashboard/topbar.php';
require '../layout_dashboard/sidebar.php';
$product = query("SELECT * FROM tb_product INNER JOIN tb_users ON tb_product.id_users = tb_users.id_users");
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
            <li class="breadcrumb-item"><a href="#">Product</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Product</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <!-- Container -->
    <div class="container">

        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="database"></i></span></span>Data Product</h4>
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
                                            <th>Nama Product</th>
                                            <th>Stock</th>
                                            <th>Harga</th>
                                            <th>Tanggal Expired</th>
                                            <th width="5%">foto</th>
                                            <th>Keterangan Product</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($product as $product) : ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $product['nama'] ?></td>
                                                <td><?= $product['nik'] ?></td>
                                                <td><?= $product['nama_product'] ?></td>
                                                <td><?= $product['stock'] ?></td>
                                                <td>Rp<?= number_format($product['harga']) ?></td>
                                                <td><?= $product['tgl_expired'] ?></td>
                                                <td><img src="../upload/product/<?= $product['foto'] ?>" alt="<?= $product['foto'] ?>" width="100%"><a href="../upload/product/<?= $product['foto'] ?>"> </td>
                                                <td><?= $product['keterangan_product'] ?></td>
                                                <td>
                                                    <a href="update.php?id_product=<?= $product['id_product']; ?>" class="btn btn-primary"> <i class="fas fa-pencil-alt"></i></a>
                                                    <a href="delete.php?id_product=<?= $product['id_product']; ?>" class="btn btn-danger" onclick="return confirm('Anda Yakin Ingin Menghapus Data ini?')"> <i class="fas fa-trash"></i> </a>
                                                </td>
                                            </tr>
                                        <?php $no++;
                                        endforeach ?>
                                    </tbody>
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
                                <form action="" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id_users" value="<?= $_SESSION['login']['id_users'] ?>">
                                    <div class="form-group">
                                        <label class="col-md-12 control-label">Nama Product</label>
                                        <div class="col-md">
                                            <input type="text" name="nama_product" class="form-control" placeholder="Nama Product" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label">Stock</label>
                                        <div class="col-md">
                                            <input type="number" name="stock" class="form-control" placeholder="Stock" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label">Harga</label>
                                        <div class="col-md">
                                            <input type="number" name="harga" class="form-control" placeholder="Harga" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label">Tanggal Expired</label>
                                        <div class="col-md">
                                            <input type="date" name="tgl_expired" class="form-control" placeholder="Tanggal Expired" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label">Khasiat</label>
                                        <div class="col-md">
                                            <input type="text" name="khasiat" class="form-control" placeholder="Khasiat" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label">Foto</label>
                                        <div class="col-md">
                                            <input type="file" name="foto" class="form-control" placeholder="Foto" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label">keterangan Product</label>
                                        <div class="col-md">
                                            <input type="text" name="keterangan_product" class="form-control" placeholder="keterangan Product" required>
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