<?php
session_start();
require '../controllers/config_load_data.php';
require '../controllers/pembelian.php';
require '../layout_dashboard/head.php';
require '../layout_dashboard/head.php';
require '../layout_dashboard/topbar.php';
require '../layout_dashboard/sidebar.php';
if ($_SESSION['login']['level'] == 'Pembeli') {
    $id_users = $_SESSION['login']['id_users'];
    $pembelian = query("SELECT * FROM tb_pembelian INNER JOIN tb_users ON tb_pembelian.id_users = tb_users.id_users WHERE tb_pembelian.id_users = $id_users");
} else {
    $pembelian = query("SELECT * FROM tb_pembelian INNER JOIN tb_users ON tb_pembelian.id_users = tb_users.id_users");
}
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
                                            <th>Nama</th>
                                            <th>NIK</th>
                                            <th>No. Hp/WA</th>
                                            <th>Alamat</th>
                                            <th>Kecamatan</th>
                                            <th>Kabupaten/Kota</th>
                                            <th>Provinsi</th>
                                            <th>Total Harga</th>
                                            <th>Status pembelian</th>
                                            <?php
                                            if ($_SESSION['login']['level'] == 'Admin') { ?>
                                                <th style="width: 25%;">Aksi</th>
                                            <?php } else { ?>
                                                <th>Aksi</th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($pembelian as $pembelian) : ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $pembelian['nama'] ?></td>
                                                <td><?= $pembelian['nik'] ?></td>
                                                <td><?= $pembelian['no_hp'] ?></td>
                                                <td><?= $pembelian['alamat'] ?></td>
                                                <td><?= $pembelian['kecamatan'] ?></td>
                                                <td><?= $pembelian['kabupaten'] ?></td>
                                                <td><?= $pembelian['provinsi'] ?></td>
                                                <td>Rp<?= number_format($pembelian['total_harga']) ?></td>
                                                <td><?= $pembelian['status_pembelian'] ?></td>
                                                <td>
                                                    <a href="detail.php?id_pembelian=<?= $pembelian['id_pembelian']; ?>" class="btn btn-primary"> <i class="fas fa-eye"></i></a>
                                                    <?php
                                                    if ($_SESSION['login']['level'] == 'Admin') { ?>
                                                        <a href="konfirmasi.php?id_pembelian=<?= $pembelian['id_pembelian']; ?>" class="btn btn-success"> <i class="fas fa-check-circle"></i></a>
                                                        <a href="delete.php?id_pembelian=<?= $pembelian['id_pembelian'] ?>" class="btn btn-danger" onclick="return confirm('Anda Yakin Ingin Menghapus Data ini?')"> <i class="fas fa-trash"></i> </a>
                                                    <?php }
                                                    ?>
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
    <?php require '../layout_dashboard/footer.php' ?>