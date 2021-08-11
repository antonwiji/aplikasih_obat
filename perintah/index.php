<?php
session_start();
require '../controllers/config_load_data.php';
require '../controllers/perintah.php';
require '../layout_dashboard/head.php';
require '../layout_dashboard/head.php';
require '../layout_dashboard/topbar.php';
require '../layout_dashboard/sidebar.php';
$perintah = query("SELECT * FROM tb_perintah INNER JOIN tb_pembayaran ON tb_perintah.id_pembayaran = tb_pembayaran.id_pembayaran INNER JOIN tb_users ON tb_perintah.id_users = tb_users.id_users");


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
            <li class="breadcrumb-item"><a href="#">Perintah</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Perintah</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <!-- Container -->
    <div class="container">

        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="database"></i></span></span>Data Perintah</h4>
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
                                            <th>No. HP/WA</th>
                                            <th>Alamat</th>
                                            <th>Kecamatan</th>
                                            <th>Kabupaten/Kota</th>
                                            <th>Provinsi</th>
                                            <th>Bukti Pembayaran</th>
                                            <th>Status perintah</th>
                                            <th>Konfirmasi Barang Diterima</th>
                                            <th>Konfirmasi Sampai Kantor</th>
                                            <th>Detail Barang</th>
                                            <?php
                                            if ($_SESSION['login']['level'] == 'Kurir') { ?>
                                                <th>Aksi</th>
                                            <?php }
                                            ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($perintah as $perintah) : ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $perintah['nama'] ?></td>
                                                <td><?= $perintah['nik'] ?></td>
                                                <td><?= $perintah['no_hp'] ?></td>
                                                <td><?= $perintah['alamat'] ?></td>
                                                <td><?= $perintah['kecamatan'] ?></td>
                                                <td><?= $perintah['kabupaten'] ?></td>
                                                <td><?= $perintah['provinsi'] ?></td>
                                                <td><a href="../upload/bukti_pembayaran/<?= $perintah['bukti_pembayaran'] ?>"><?= $perintah['bukti_pembayaran'] ?></a></td>
                                                <td><?= $perintah['status_pembayaran'] ?></td>
                                                <td><?= $perintah['konfirmasi_barang_diterima'] ?></td>
                                                <td><?= $perintah['konfirmasi_sampai_kantor'] ?></td>
                                                
                                                <td><?= $perintah['nama_product'] ?>
                                                </td>
                                                
                                                <?php
                                                if ($_SESSION['login']['level'] == 'Kurir') { ?>
                                                    <td>
                                                        <a href="konfirmasi.php?id_perintah=<?= $perintah['id_perintah']; ?>" class="btn btn-success"> <i class="fas fa-check-circle"></i></a>

                                                    </td>
                                                <?php }
                                                ?>
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