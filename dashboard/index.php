<?php
session_start();
require '../layout_dashboard/head.php';
require '../layout_dashboard/topbar.php';
require '../layout_dashboard/sidebar.php';
?>

<!-- Main Content -->
<div class="hk-pg-wrapper">
    <!-- Container -->
    <div class="container mt-xl-50 mt-sm-30 mt-15">
        <!-- Title -->
        <div class="hk-pg-header align-items-top">
            <div>
                <h2 class="hk-pg-title font-weight-600 mb-10">Dashboard</h2>
                <p>Loka Kesehatan tradisional masyarakat (lktm) palembang</p>
            </div>
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <div class="hk-row">
                    <div class="col-sm-12">
                        <div class="card-group hk-dash-type-2">
                            <?php if ($_SESSION['login']['level'] == 'Admin' or $_SESSION['login']['level'] == 'Pimpinan') : ?>
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between mb-5">
                                            <div>
                                                <span class="d-block font-15 text-dark font-weight-500">Laporan Penjualan</span>
                                            </div>
                                            <div>
                                                <span class="text-success font-14 font-weight-500"><a href="print_laporan_penjualan.php">DOWNLOAD</a></span>
                                            </div>
                                        </div>
                                        <div>
                                            <span class="d-block display-4 text-dark mb-5"><i class="fas fa-file-pdf"></i></span>
                                            <small class="d-block"> </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between mb-5">
                                            <div>
                                                <span class="d-block font-15 text-dark font-weight-500">Laporan Produk</span>
                                            </div>
                                            <div>
                                                <span class="text-success font-14 font-weight-500"><a href="print_laporan_produk.php">DOWNLOAD</a></span>
                                            </div>
                                        </div>
                                        <div>
                                            <span class="d-block display-4 text-dark mb-5"><i class="fas fa-file-pdf"></i></span>
                                            <small class="d-block"> </small>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Row -->
    </div>
    <!-- /Container -->
    <?php require '../layout_dashboard/footer.php' ?>