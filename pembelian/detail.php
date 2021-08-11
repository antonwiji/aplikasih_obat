<?php
session_start();
require '../controllers/config_load_data.php';
require '../controllers/detail_pembelian.php';
require '../layout_dashboard/head.php';
require '../layout_dashboard/head.php';
require '../layout_dashboard/topbar.php';
require '../layout_dashboard/sidebar.php';
$id_pembelian = $_GET['id_pembelian'];
$detail_pembelian = query("SELECT * FROM tb_detail_pembelian INNER JOIN tb_product ON tb_detail_pembelian.id_product = tb_product.id_product WHERE id_pembelian = $id_pembelian");
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
            <li class="breadcrumb-item"><a href="#">pembelian</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data pembelian</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <!-- Container -->
    <div class="container">

        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="database"></i></span></span>Data pembelian</h4>
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
                                <table id="datable_1" class="table table-hover w-100 display pb-30">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Product</th>
                                            <th>Tanggal Expired</th>
                                            <th>Khasiat</th>
                                            <th>Keterangan Product</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            <th>Sub Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $total = 0;
                                        foreach ($detail_pembelian as $detail_pembelian) : ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $detail_pembelian['nama_product'] ?></td>
                                                <td><?= $detail_pembelian['tgl_expired'] ?></td>
                                                <td><?= $detail_pembelian['khasiat'] ?></td>
                                                <td><?= $detail_pembelian['keterangan_product'] ?></td>
                                                <td>Rp<?= number_format($detail_pembelian['harga']) ?></td>
                                                <td><?= number_format($detail_pembelian['jumlah']) ?></td>
                                                <?php $subtotal = $detail_pembelian['jumlah'] * $detail_pembelian['harga'] ?>
                                                <td>Rp<?= number_format($subtotal) ?></td>
                                            </tr>
                                        <?php $no++;
                                            $total += $subtotal;
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
    <?php require '../layout_dashboard/footer.php' ?>