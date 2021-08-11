<?php
session_start();
require '../controllers/config_load_data.php';
require '../controllers/kunjungan.php';
require '../layout_dashboard/head.php';
require '../layout_dashboard/head.php';
require '../layout_dashboard/topbar.php';
require '../layout_dashboard/sidebar.php';
$bulan = $_GET['bulan'];
$kunjungan = query("SELECT * FROM tb_kunjungan WHERE bulan = '$bulan' ");
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
                                            <th>Poli</th>
                                            <th>Bulan</th>
                                            <th>Hari/Tgl</th>
                                            <th>No. Reg</th>
                                            <th>Nama Pasien</th>
                                            <th>Umur</th>
                                            <th>Status L/B</th>
                                            <th>Status LK/PR</th>
                                            <th>Alamat</th>
                                            <th>Akp</th>
                                            <th>K.Jamu</th>
                                            <th>Akupresur</th>
                                            <th>TDP</th>
                                            <th>US</th>
                                            <th>SPA</th>
                                            <th>COL</th>
                                            <th>AU</th>
                                            <th>GDS</th>
                                            <th>OHT</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($kunjungan as $kunjungan) : ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $kunjungan['poli'] ?></td>
                                                <td><?= $kunjungan['bulan'] ?></td>
                                                <td><?= $kunjungan['hari_tanggal'] ?></td>
                                                <td><?= $kunjungan['no_reg'] ?></td>
                                                <td><?= $kunjungan['nama_pasien'] ?></td>
                                                <td><?= $kunjungan['umur'] ?></td>
                                                <td><?= $kunjungan['status_l_b'] ?></td>
                                                <td><?= $kunjungan['status_lk_pr'] ?></td>
                                                <td><?= $kunjungan['alamat'] ?></td>
                                                <td><?= $kunjungan['akp'] ?></td>
                                                <td><?= $kunjungan['k_jamu'] ?></td>
                                                <td><?= $kunjungan['akupresur'] ?></td>
                                                <td><?= $kunjungan['tdp'] ?></td>
                                                <td><?= $kunjungan['us'] ?></td>
                                                <td><?= $kunjungan['spa'] ?></td>
                                                <td><?= $kunjungan['col'] ?></td>
                                                <td><?= $kunjungan['au'] ?></td>
                                                <td><?= $kunjungan['gds'] ?></td>
                                                <td><?= $kunjungan['oht'] ?></td>
                                                <td><?= $kunjungan['keterangan_kunjungan'] ?></td>
                                                <td>
                                                    <a href="update.php?id_kunjungan=<?= $kunjungan['id_kunjungan']; ?>" class="btn btn-primary"> <i class="fas fa-pencil-alt"></i></a>
                                                    <a href="print.php?bulan=<?= $kunjungan['bulan']; ?>" class="btn btn-success"> <i class="fas fa-print"></i></a>
                                                    <a href="delete.php?id_kunjungan=<?= $kunjungan['id_kunjungan']; ?>" class="btn btn-danger" onclick="return confirm('Anda Yakin Ingin Menghapus Data ini?')"> <i class="fas fa-trash"></i> </a>
                                                </td>
                                            </tr>
                                        <?php $no++;
                                        endforeach; ?>
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
                        <label class="col-md-12 control-label">Poli</label>
                        <div class="col-md">
                            <input type="text" name="poli" class="form-control" placeholder="Poli" value="PELAYANAN KESEHATAN TRADISIONAL LKTM">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 control-label">Bulan</label>
                        <div class="col-md">
                            <input type="text" name="bulan" class="form-control" placeholder="Bulan" value="<?= $bulan ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 control-label">Hari/Tgl</label>
                        <div class="col-md">
                            <input type="text" name="hari_tanggal" class="form-control" placeholder="Hari/Tgl" value="<?= date('D, d M Y') ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 control-label">No. Reg</label>
                        <div class="col-md">
                            <input type="text" name="no_reg" class="form-control" placeholder="No. Reg">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 control-label">Nama Pasien</label>
                        <div class="col-md">
                            <input type="text" name="nama_pasien" class="form-control" placeholder="Nama Pasien">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 control-label">Umur</label>
                        <div class="col-md">
                            <input type="number" name="umur" class="form-control" placeholder="Umur">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 control-label">Status L/K</label>
                        <div class="col-md">
                            <select name="status_l_b" id="status" class="form-control">
                                <option value="L">L</option>
                                <option value="B">B</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 control-label">Status LK/PR</label>
                        <div class="col-md">
                            <select name="status_lk_pr" id="status" class="form-control">
                                <option value="LK">LK</option>
                                <option value="PR">PR</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 control-label">Alamat</label>
                        <div class="col-md">
                            <input type="text" name="alamat" class="form-control" placeholder="Alamat">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 control-label">Akp</label>
                        <div class="col-md">
                            <input type="number" name="akp" class="form-control" placeholder="Akp">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 control-label">K.Jamu</label>
                        <div class="col-md">
                            <input type="number" name="k_jamu" class="form-control" placeholder="K.Jamu">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 control-label">Akupresur</label>
                        <div class="col-md">
                            <select name="akupresur" id="akupresur" class="form-control">
                                <option value="Dewasa">Dewasa</option>
                                <option value="Bayi">Bayi</option>
                                <option value="Anak-Anak">Anak-Anak</option>
                                <option value="Facial">Facial</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 control-label">TDP</label>
                        <div class="col-md">
                            <input type="number" name="tdp" class="form-control" placeholder="TDP">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 control-label">US</label>
                        <div class="col-md">
                            <input type="number" name="us" class="form-control" placeholder="US">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 control-label">SPA</label>
                        <div class="col-md">
                            <input type="number" name="spa" class="form-control" placeholder="SPA">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 control-label">COL</label>
                        <div class="col-md">
                            <input type="number" name="col" class="form-control" placeholder="COl">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 control-label">AU</label>
                        <div class="col-md">
                            <input type="number" name="au" class="form-control" placeholder="AU">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 control-label">GDS</label>
                        <div class="col-md">
                            <input type="number" name="gds" class="form-control" placeholder="GDS">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 control-label">OHT</label>
                        <div class="col-md">
                            <input type="number" name="oht" class="form-control" placeholder="OHT">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 control-label">Keterangan</label>
                        <div class="col-md">
                            <input type="text" name="keterangan_kunjungan" class="form-control" placeholder="Keterangan">
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