<?php
session_start();
require 'controllers/keranjang.php';
require 'controllers/config_load_data.php';
$product = query("SELECT * FROM tb_product");
$top_product = query("SELECT * FROM tb_product LIMIT 8");
if (isset($_POST["submit"])) {
    if (create($_POST) > 0) {
        echo "<script>
        alert('Berhasil Ditambahkan Ke Keranjang')
        document.location.href='shop.php';
        </script>
        ";
    } else {
        echo "<script>
    alert('Gagal Ditambahkan Ke Keranjang')
    document.location.href='shop.php';
    </script>
    ";
    }
}
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
                <a href="index.php" class="logo"><img src="upload/logo.jpg" style="width: 15%;" alt="logo"></a>
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
            <h1>Shop</h1>
            <ul class="breadcrambs">
                <li><a href="index.php">Home</a></li>
                <li>Shop</li>
            </ul>
        </div>
    </section>
    <!-- ============== HEADER-TITLE END ============== -->

    <!--===================== SHOP =====================-->
    <section class="s-shop">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12 shop-cover">
                    <h2 class="title">Top Produk</h2>
                    <div class="shop-sort-cover">
                        <div class="sort-left"><?= count($product) ?> products found</div>
                        <div class="sort-right">
                            <ul class="sort-form">
                                <li data-atr="large"><i class="fa fa-th-large" aria-hidden="true"></i></li>
                                <li data-atr="block" class="active"><i class="fa fa-th" aria-hidden="true"></i></li>
                                <li data-atr="list"><i class="fa fa-list" aria-hidden="true"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="shop-product-cover">
                        <div class="row product-cover block">
                            <?php $i = 1;
                            foreach ($product as $product) { ?>
                                <div class="col-12 col-sm-4 prod-item-col">
                                    <div class="product-item">
                                        <span class="top-sale">Top Sale</span>
                                        <a href="single-shop.html" class="product-img"><img src="upload/product/<?= $product['foto'] ?>" alt="product"></a>
                                        <div class="product-item-wrap">
                                            <div class="product-item-cover">
                                                <div class="price-cover">
                                                    <div class="new-price">Rp<?= number_format($product['harga']) ?></div>
                                                </div>
                                                <h6 class="prod-title"><a href="#"><?= $product['nama_product'] ?></a></h6>
                                                <form method="post" class="cart">
                                                    <div class="">
                                                        <input type="hidden" name="id_product" id="french-hens" value="<?= $product['id_product']  ?>">
                                                        <input type="hidden" name="id_users" id="french-hens" value="<?= $_SESSION['login']['id_users']  ?>">
                                                        <input type="number" name="jml_pesanan" id="french-hens" class="form-group" value="1" min="1" max="<?= $product['stock']  ?>">
                                                    </div>
                                                    <?php if (isset($_SESSION['login'])) { ?>
                                                        <button type="submit" name="submit" class="btn btn-add-to-cart">+ Buy</button>
                                                    <?php } else { ?>
                                                        <p><a href="auth/index.php" class="btn btn-warning btn-sm" style="margin:10px;">+ Buy</a></p>
                                                    <?php } ?>
                                                </form>
                                            </div>
                                            <div class="prod-info">
                                                <ul class="prod-list">
                                                    <li>Nama product: <span><?= $product['nama_product'] ?></span></li>
                                                    <li>Stock: <span><?= $product['stock'] ?></span></li>
                                                    <li>Harga: <span>Rp<?= number_format($product['harga']) ?></span></li>
                                                    <li>Tanggal Expired: <span><?= $product['tgl_expired'] ?></span></li>
                                                    <li>khasiat: <span><?= $product['khasiat'] ?></span></li>
                                                    <li>Keterangan: <span><?= $product['keterangan_product'] ?></span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="baner-shop">
                        <span class="mask"></span>
                        <img src="assets_halaman_utama/assets/img/11.jpg" alt="img">
                        <div class="baner-item-content">
                            <h2>Loka Kesehatan Tradisional Masyarakat Palembang</h2>
                            <p>Pembangunan Kesehatan mempunyai tujuan meningkatkan Pembangunan kesehatan merupakan salah satu upaya pembangunan nasional yang diselenggarakan pada semua bidang kehidupan. Pembangunan kesehatan bertujuan untuk meningkatkan kesadaran, kemauan dan kemampuan hidup sehat bagi setiap orang agar terwujud derajat kesehatan masyarakat yang optimal. Dengan demikian, pembangunan kesehatan merupakan salah satu upaya utama untuk meningkatkan kualitas sumber daya manusia yang pada gilirannya mendukung percepatan pencapaian sasaran pembangunan nasional.</p>
                        </div>
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
                        <li><a href="keranjang.php">Keranjang</a></li>
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
</body>

</html>