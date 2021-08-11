<?php
session_start();
require '../controllers/config_load_data.php';
require '../controllers/product.php';
require '../layout_dashboard/head.php';
require '../layout_dashboard/head.php';
require '../layout_dashboard/topbar.php';
require '../layout_dashboard/sidebar.php';
$id_product = $_GET['id_product'];
$product = query("SELECT * FROM tb_product INNER JOIN tb_users ON tb_product.id_users = tb_users.id_users WHERE id_product = $id_product")[0];
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
                                    <input type="hidden" name="id_users" value="<?= $product['id_users']  ?>">
                                    <input type="hidden" name="id_product" value="<?= $product['id_product']  ?>">
                                    <input type="hidden" name="fotoLama" value="<?= $product['foto']  ?>">
                                    <div class="form-group">
                                        <label class="col-md-12 control-label">Nama Product</label>
                                        <div class="col-md">
                                            <input type="text" name="nama_product" class="form-control" placeholder="Nama Product" value="<?= $product['nama_product']  ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label">Stock</label>
                                        <div class="col-md">
                                            <input type="number" name="stock" class="form-control" placeholder="Stock" value="<?= $product['stock']  ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label">Harga</label>
                                        <div class="col-md">
                                            <input type="number" name="harga" class="form-control" placeholder="Harga" value="<?= $product['harga']  ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label">Tanggal Expired</label>
                                        <div class="col-md">
                                            <input type="date" name="tgl_expired" class="form-control" placeholder="Tanggal Expired" value="<?= $product['tgl_expired']  ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label">Khasiat</label>
                                        <div class="col-md">
                                            <input type="text" name="khasiat" class="form-control" placeholder="Khasiat" value="<?= $product['khasiat']  ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label">Foto</label>
                                        <img src="../upload/product/<?= $product['foto'] ?>" alt="<?= $product['foto'] ?>"><a href="../upload/product/<?= $product['foto'] ?>" width="5%"> </a>
                                        <div class="col-md">
                                            <input type="file" name="foto" class="form-control" placeholder="Foto" value="<?= $product['foto']  ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label">keterangan Product</label>
                                        <div class="col-md">
                                            <input type="text" name="keterangan_product" class="form-control" placeholder="keterangan Product" value="<?= $product['keterangan_product']  ?>" required>
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