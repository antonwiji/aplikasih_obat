<?php
session_start();
require '../controllers/config_load_data.php';
require '../controllers/pembayaran.php';
require '../layout_dashboard/head.php';
require '../layout_dashboard/head.php';
require '../layout_dashboard/topbar.php';
require '../layout_dashboard/sidebar.php';
if ($_SESSION['login']['level'] == 'Pembeli') {
    $id_users = $_SESSION['login']['id_users'];
    $pembayaran = query("SELECT * FROM tb_pembayaran INNER JOIN tb_pembelian ON tb_pembayaran.id_pembelian = tb_pembelian.id_pembelian INNER JOIN tb_users ON tb_pembelian.id_users = tb_users.id_users  WHERE  tb_pembelian.id_users = $id_users");
} else {
    $pembayaran = query("SELECT * FROM tb_pembayaran INNER JOIN tb_pembelian ON tb_pembayaran.id_pembelian = tb_pembelian.id_pembelian INNER JOIN tb_users ON tb_pembelian.id_users = tb_users.id_users");
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
            <li class="breadcrumb-item"><a href="#">pembayaran</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data pembayaran</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <!-- Container -->
    <div class="container">

        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="database"></i></span></span>Data pembayaran</h4>
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
                                            <th>Bukti pembayaran</th>
                                            <th>Status pembayaran</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($pembayaran as $pembayaran) : ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $pembayaran['nama'] ?></td>
                                                <td><?= $pembayaran['nik'] ?></td>
                                                <td><?= $pembayaran['no_hp'] ?></td>
                                                <td><?= $pembayaran['alamat'] ?></td>
                                                <td><?= $pembayaran['kecamatan'] ?></td>
                                                <td><?= $pembayaran['kabupaten'] ?></td>
                                                <td><?= $pembayaran['provinsi'] ?></td>
                                                <td>Rp<?= number_format($pembayaran['total_harga']) ?></td>
                                                <td><a href="../upload/bukti_pembayaran/<?= $pembayaran['bukti_pembayaran'] ?>"><?= $pembayaran['bukti_pembayaran'] ?></a></td>
                                                <td><?= $pembayaran['status_pembayaran'] ?></td>
                                                <td>
                                                    <?php
                                                    if ($_SESSION['login']['level'] == 'Pembeli') { ?>
                                                        <a href="pembayaran.php?id_pembayaran=<?= $pembayaran['id_pembayaran']; ?>" class="btn btn-success"> <i class="fas fa-money-bill-wave"></i></a>
                                                    <?php }
                                                    ?>
                                                    <?php
                                                    if ($_SESSION['login']['level'] == 'Admin') { ?>
                                                        <a href="konfirmasi.php?id_pembayaran=<?= $pembayaran['id_pembayaran']; ?>" class="btn btn-success"> <i class="fas fa-check-circle"></i></a>
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