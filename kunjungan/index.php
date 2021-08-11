<?php
session_start();
require '../controllers/config_load_data.php';
require '../controllers/kunjungan.php';
require '../layout_dashboard/head.php';
require '../layout_dashboard/head.php';
require '../layout_dashboard/topbar.php';
require '../layout_dashboard/sidebar.php';
$kunjungan = query("SELECT * FROM tb_kunjungan");
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
                                            <th>Januari</th>
                                            <th>Februari</th>
                                            <th>Maret</th>
                                            <th>April</th>
                                            <th>Mei</th>
                                            <th>Juni</th>
                                            <th>Juli</th>
                                            <th>Agustus</th>
                                            <th>September</th>
                                            <th>Oktober</th>
                                            <th>November</th>
                                            <th>Desember</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td>
                                                <a href="detail.php?bulan=Januari" class="btn btn-primary"> <i class="fas fa-eye"></i></a>
                                            </td>
                                            <td>
                                                <a href="detail.php?bulan=Februari" class="btn btn-primary"> <i class="fas fa-eye"></i></a>
                                            </td>
                                            <td>
                                                <a href="detail.php?bulan=Maret" class="btn btn-primary"> <i class="fas fa-eye"></i></a>
                                            </td>
                                            <td>
                                                <a href="detail.php?bulan=April" class="btn btn-primary"> <i class="fas fa-eye"></i></a>
                                            </td>
                                            <td>
                                                <a href="detail.php?bulan=Mei" class="btn btn-primary"> <i class="fas fa-eye"></i></a>
                                            </td>
                                            <td>
                                                <a href="detail.php?bulan=Juni" class="btn btn-primary"> <i class="fas fa-eye"></i></a>
                                            </td>
                                            <td>
                                                <a href="detail.php?bulan=Juli" class="btn btn-primary"> <i class="fas fa-eye"></i></a>
                                            </td>
                                            <td>
                                                <a href="detail.php?bulan=Agustus" class="btn btn-primary"> <i class="fas fa-eye"></i></a>
                                            </td>
                                            <td>
                                                <a href="detail.php?bulan=September" class="btn btn-primary"> <i class="fas fa-eye"></i></a>
                                            </td>
                                            <td>
                                                <a href="detail.php?bulan=Oktober" class="btn btn-primary"> <i class="fas fa-eye"></i></a>
                                            </td>
                                            <td>
                                                <a href="detail.php?bulan=November" class="btn btn-primary"> <i class="fas fa-eye"></i></a>
                                            </td>
                                            <td>
                                                <a href="detail.php?bulan=Desember" class="btn btn-primary"> <i class="fas fa-eye"></i></a>
                                            </td>
                                        </tr>
                                        <?php $no++; ?>
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