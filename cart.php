<?php
session_start();
require 'controllers/keranjang.php';
require 'controllers/config_load_data.php';
$id_users = $_SESSION['login']['id_users'];
$users = query(" SELECT * FROM tb_users WHERE id_users = $id_users")[0];
$keranjang = query("SELECT * FROM tb_keranjang INNER JOIN tb_product ON tb_product.id_product = tb_keranjang.id_product WHERE tb_keranjang.id_users = $id_users ");
$stock_di_keranjang = query("SELECT * FROM tb_keranjang INNER JOIN tb_product ON tb_product.id_product = tb_keranjang.id_product WHERE tb_keranjang.id_users = $id_users ");
$pemesanan = query("SELECT * FROM tb_keranjang INNER JOIN tb_product ON tb_product.id_product = tb_keranjang.id_product WHERE tb_keranjang.id_users = $id_users ");
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <title>Loka Kesehatan tradisional masyarakat (lktm) palembang</title>
    <!-- =================== META =================== -->
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="assets_halaman_utama/assets/img/favicon.png">
    <!-- =================== STYLE =================== -->
    <link rel="stylesheet" href="assets_halaman_utama/assets/css/slick.min.css">
    <link rel="stylesheet" href="assets_halaman_utama/assets/css/bootstrap-grid.css">
    <link rel="stylesheet" href="assets_halaman_utama/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets_halaman_utama/assets/css/jquery-ui.css">
    <link rel="stylesheet" href="assets_halaman_utama/assets/css/nice-select.css">
    <link rel="stylesheet" href="assets_halaman_utama/assets/css/style.css">
    <link rel="stylesheet" href="assets_halaman_utama/css/bootstrap.css">
</head>

<body id="home">
    <!--================ PRELOADER ================-->
    <div class="preloader-cover">
        <div class="preloader">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <!--============== PRELOADER END ==============-->
    <!-- ================= HEADER ================= -->
    <header class="header">
        <a href="#" class="nav-btn">
            <span></span>
            <span></span>
            <span></span>
        </a>
        <div class="top-panel">
            <div class="container">
                <div class="top-panel-cover">
                    <ul class="header-cont">
                        <li><a href="tel:+62898 456 887"><i class="fa fa-phone"></i>+62898 456 887</a></li>
                        <li><a href="mailto:lktm@gmail.com"><i class="fa fa-envelope" aria-hidden="true"></i>lktm@gmail.com</a></li>
                    </ul>
                    <ul class="icon-right-list">
                        <?php if (isset($_SESSION['login'])) { ?>
                            <li><a class="header-cart" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                        <?php } else { ?>
                            <li><a class="header-cart" href="auth/index.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="header-menu">
            <div class="container">
                <a href="index.php" class="logo"><img src="upload/logo.jpg" alt="logo" style="width: 15%;"></a>
                <nav class="nav-menu">
                    <ul class="nav-list">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="shop.php">Shop</a></li>
                        <?php if (isset($_SESSION['login'])) { ?>
                            <li><a href="dashboard/index.php">Dashboard</a></li>
                            <li><a href="auth/logout.php">logout</a></li>
                        <?php } else { ?>
                            <li><a href="auth/index.php">Login</a></li>
                            <li><a href="auth/register.php">Daftar</a></li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <!-- =============== HEADER END =============== -->

    <!-- ================ HEADER-TITLE ================ -->
    <section class="s-header-title">
        <div class="container">
            <h1>Keranjang</h1>
            <ul class="breadcrambs">
                <li><a href="index.php">Home</a></li>
                <li>Keranjang</li>
            </ul>
        </div>
    </section>
    <!-- ============== HEADER-TITLE END ============== -->

    <!--===================== SHOP =====================-->
    <section class="s-shop">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12 shop-cover">
                    <table class="table table-striped table-dark">
                        <thead>
                            <tr>
                                <th width="15%">Produk</th>
                                <th>Khasiat</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <form method="POST">
                                <?php $total = 0;
                                foreach ($keranjang as $keranjang) { ?>
                                    <tr>
                                        <td>
                                            <img src="upload/product/<?= $keranjang['foto'] ?>" alt="" width="100%"><a href="#"><?= $keranjang['nama_product']  ?></a>
                                        </td>
                                        <td><?= $keranjang['khasiat']  ?></td>
                                        <td><span class='cart-price'>IDR<?= number_format($keranjang['harga'])  ?></span></td>
                                        <td>
                                            <input type="hidden" name="id_keranjang[]" value="<?= $keranjang['id_keranjang']  ?>">
                                            <input type="number" name="jml_pesanan[]" min="1" max="<?= $keranjang['stock']  ?>" value="<?= $keranjang['jml_pesanan']  ?>">
                                        </td>
                                        <td>
                                            <?php $subtotal = $keranjang['jml_pesanan'] * $keranjang['harga']  ?>
                                            <span class='cart-price'>IDR<?= number_format($subtotal);  ?></span>
                                        </td>
                                        <td><a href="hapus_data_keranjang.php?id_keranjang=<?= $keranjang['id_keranjang'];  ?>" onclick="return confirm('Anda Yakin Ingin Menghapus Data Pesanan Produk ini?')"><span class="item-remove"></span>x</a></td>
                                    </tr>
                                <?php $total += $subtotal;
                                } ?>
                                <tr>
                                    <td colspan="4">
                                        <button class="btn btn-info" name="update" type="submit">Update cart</button>
                                    </td>
                                    <td colspan="2">Total : IDR<?= number_format($total); ?></td>
                                </tr>
                            </form>
                            <?php
                            if (isset($_POST["update"])) {
                                $id_keranjang = $_POST['id_keranjang'];
                                $jml_pesanan = $_POST['jml_pesanan'];
                                $count = count($id_keranjang);
                                for ($i = 0; $i < $count; $i++) {
                                    $query = "UPDATE tb_keranjang SET id_keranjang = '$id_keranjang[$i]', jml_pesanan = '$jml_pesanan[$i]' WHERE id_keranjang = '$id_keranjang[$i]'";
                                    mysqli_query($conn, $query);
                                }
                                echo "<script>
                                        alert('Data Produk di Keranjang Berhasil diupdate')
                                        document.location.href='cart.php';
                                        </script>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-12 col-lg-12 shop-cover">
                    <h5 class="shiping-address">Pembeli</h5>
                    <div class="shipping-address-inner">
                        <form method="post">
                            <input type="hidden" name="bulan" value="<?= date('M') ?>">
                            <div class="form-group">
                                <input type="text" name="nama" class="form-control" value="<?= $users['nama'] ?>" placeholder="Nama">
                            </div>
                            <div class="form-group">
                                <input type="text" name="nik" class="form-control" value="<?= $users['nik'] ?>" placeholder="NIK">
                            </div>
                            <div class="form-group">
                                <input type="text" name="no_hp" class="form-control" value="<?= $users['no_hp'] ?>" placeholder="No. Hp/WA">
                            </div>
                            <div class="form-group">
                                <input type="text" name="alamat" class="form-control" value="<?= $users['alamat'] ?>" placeholder="Alamat">
                            </div>
                            <div class="form-group">
                                <input type="text" name="kecamatan" class="form-control" value="<?= $users['kecamatan'] ?>" placeholder="kecamatan">
                            </div>
                            <div class="form-group">
                                <input type="text" name="kabupaten" class="form-control" value="<?= $users['kabupaten'] ?>" placeholder="Kabupaten/Kota">
                            </div>
                            <div class="form-group">
                                <input type="text" name="provinsi" class="form-control" value="<?= $users['provinsi'] ?>" placeholder="Provinsi">
                            </div>
                            <input type="hidden" name="id_users" class="form-control" value="<?= $_SESSION['login']['id_users']  ?>">
                            <?php $total_pesanan = 0;
                            foreach ($pemesanan as $pemesanan) : ?>
                                <input type="hidden" name="id_product_stok" value="<?= $pemesanan['id_product'];  ?>">
                                <input type="hidden" name="jml_pesanan_stok" value="<?= $pemesanan['jml_pesanan'];  ?>">
                                <input type="hidden" name="id_product[]" value="<?= $pemesanan['id_product'];  ?>">
                                <input type="hidden" name="jml_pesanan[]" value="<?= $pemesanan['jml_pesanan'];  ?>">
                            <?php endforeach; ?>
                            <input type="hidden" name="total_harga" value="<?= $total;  ?>">
                            <input type="hidden" name="status_pembayaran" value="Belum Melakukan Pembayaran">
                            <input type="hidden" name="status_pembelian" value="Belum Dikonfirmasi">
                            <button type="hidden" name="checkout" class="btn btn-success m-3">proceed Checkout</button>
                        </form>
                        <?php

                        if (isset($_POST["checkout"])) {
                            $jml_pesanan_stok = $_POST['jml_pesanan_stok'];
                            $id_product_stok = $_POST['id_product_stok'];
                            foreach ($stock_di_keranjang as $stock_di_keranjang) {
                                if ($stock_di_keranjang['stock'] < $jml_pesanan_stok) {
                                    echo "<script>
                                            alert('Maaf Stok kami tidak cukup')
                                            document.location.href='cart.php';
                                            </script>";
                                    exit;
                                } else {
                                    $sisa_stok = $stock_di_keranjang['stock'] - $jml_pesanan_stok;
                                    $query0 = "UPDATE tb_product SET 
                                            id_product = '$id_product_stok', 
                                            stock = '$sisa_stok'
                                            WHERE id_product = $id_product_stok
                                            ";
                                    mysqli_query($conn, $query0);
                                }
                            }
                            $id_users = htmlspecialchars($_POST['id_users']);
                            $nama = htmlspecialchars($_POST['nama']);
                            $nik = htmlspecialchars($_POST['nik']);
                            $alamat = htmlspecialchars($_POST['alamat']);
                            $kecamatan = htmlspecialchars($_POST['kecamatan']);
                            $kabupaten = htmlspecialchars($_POST['kabupaten']);
                            $provinsi = htmlspecialchars($_POST['provinsi']);

                            $query1 = "UPDATE tb_users SET 
                                    id_users = '$id_users', 
                                    nama = '$nama',
                                    nik = '$nik',
                                    alamat = '$alamat',
                                    kecamatan = '$kecamatan',
                                    kabupaten = '$kabupaten',
                                    provinsi = '$provinsi'
                                    WHERE id_users = $id_users
                                    ";
                            mysqli_query($conn, $query1);

                            $id_users = htmlspecialchars($_POST['id_users']);
                            $total_harga = htmlspecialchars($_POST['total_harga']);
                            $status_pembelian  = "Belum Dikonfirmasi";
                            $query2 = "INSERT INTO tb_pembelian
                                    VALUES
                                    ('','$id_users', '$total_harga', '$status_pembelian')
                                    ";
                            mysqli_query($conn, $query2);

                            $id_pembelian =  $conn->insert_id;

                            $bukti_pembayaran = "Belum Ada";
                            $status_pembayaran  = "Belum Dikonfirmasi";
                            $query3 = "INSERT INTO tb_pembayaran
                                    VALUES
                                    ('','$id_pembelian', '$bukti_pembayaran', '$status_pembayaran')
                                    ";
                            mysqli_query($conn, $query3);

                            $id_pembayaran =  $conn->insert_id;
                            $konfirmasi_barang_diterima  = "Belum Dikonfirmasi";
                            $konfirmasi_sampai_kantor  = "Belum Dikonfirmasi";
                            $query4 = "INSERT INTO tb_perintah
                                    VALUES
                                    ('', '$id_pembayaran', '$id_users', '$konfirmasi_barang_diterima', '$konfirmasi_sampai_kantor')
                                    ";
                            mysqli_query($conn, $query4);

                            $id_product  = $_POST['id_product'];
                            $jumlah = $_POST['jml_pesanan'];
                            $count = count($id_product);
                            $sql   = "INSERT INTO tb_detail_pembelian (id_pembelian,id_product,jumlah ) VALUES ";
                            for ($i = 0; $i < $count; $i++) {
                                $sql .= "('{$id_pembelian}','{$id_product[$i]}','{$jumlah[$i]}')";
                                $sql .= ",";
                            }
                            $sql = rtrim($sql, ",");
                            $insert = $conn->query($sql);
                            mysqli_query($conn, "DELETE FROM tb_keranjang WHERE id_users = $id_users");
                            if (!$insert) {
                                $_SESSION["pesan"] = "Gagal Melakukan Checkout";
                                echo "<script>
                                        alert('Gagal Melakukan Checkout')
                                        document.location.href='cart.php';
                                        </script>";
                            } else {
                                $_SESSION["pesan"] = "Berhasil Melakukan Checkout";
                                echo "<script>
                                        alert('Berhasil Melakukan Checkout')
                                        document.location.href='pembelian/index.php';
                                        </script>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================== SHOP END ===================-->

    <!--==================== FOOTER ====================-->
    <footer>
        <div class="container">
            <div class="row footer-item-cover">
                <div class="footer-subscribe col-md-7 col-lg-8">
                    <h6>LOKA KESEHATAN TRADISIONAL MASYARAKAT PALEMBANG</h6>
                    <p>Pembangunan Kesehatan mempunyai tujuan meningkatkan Pembangunan kesehatan merupakan salah satu upaya pembangunan nasional yang diselenggarakan pada semua bidang kehidupan.</p>
                </div>
                <div class="footer-item col-md-5 col-lg-4">
                    <h6>info</h6>
                    <ul class="footer-list">
                        <li><a href="shop.php">Shop</a></li>
                        <li><a href="cart.php">Keranjang</a></li>
                    </ul>
                </div>
            </div>
            <div class="row footer-item-cover">
                <div class="footer-touch col-md-7 col-lg-8">
                    <h6>stay in touch</h6>
                    <ul class="footer-soc social-list">
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                    </ul>
                    <div class="footer-autor">Questions? Please write us at: <a href="mailto:lktm@gmail.com">lktm@gmail.com</a></div>
                </div>
                <div class="footer-item col-md-5 col-lg-4">
                    <!-- <h6><a href="shop.php">Shop</a></h6> -->
                </div>
            </div>
            <div class="footer-bottom">
                <div class="footer-copyright">LOKA KESEHATAN TRADISIONAL MASYARAKAT PALEMBANG © <?= date('Y') ?>. All Rights Reserved.</div>
                <ul class="footer-pay">
                    <li><a href="#"><img src="assets_halaman_utama/assets/img/footer-pay-1.png" alt="img"></a></li>
                    <li><a href="#"><img src="assets_halaman_utama/assets/img/footer-pay-2.png" alt="img"></a></li>
                    <li><a href="#"><img src="assets_halaman_utama/assets/img/footer-pay-3.png" alt="img"></a></li>
                    <li><a href="#"><img src="assets_halaman_utama/assets/img/footer-pay-4.png" alt="img"></a></li>
                </ul>
            </div>
        </div>
    </footer>
    <!--================== FOOTER END ==================-->

    <!--===================== TO TOP =====================-->
    <a class="to-top" href="#home">
        <i class="fa fa-angle-double-up" aria-hidden="true"></i>
    </a>
    <!--=================== TO TOP END ===================-->
    <!--=================== SCRIPT	===================-->
    <script src="assets_halaman_utama/assets/js/jquery-2.2.4.min.js"></script>
    <script src="assets_halaman_utama/assets/js/slick.min.js"></script>
    <script src="assets_halaman_utama/assets/js/jquery-ui.js"></script>
    <script src="assets_halaman_utama/assets/js/jquery.nice-select.js"></script>
    <script src="assets_halaman_utama/assets/js/scripts.js"></script>
    <script src="assets_halaman_utama/js/bootstrap.js"></script>
</body>

</html>