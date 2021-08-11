<?php
session_start();
require 'controllers/keranjang.php';
require 'controllers/config_load_data.php';
$product = query("SELECT * FROM tb_product");
$top_product = query("SELECT * FROM tb_product LIMIT 4");
if (isset($_POST["submit"])) {
    if (create($_POST) > 0) {
        echo "<script>
        alert('Berhasil Ditambahkan Ke Keranjang')
        document.location.href='index.php';
        </script>
        ";
    } else {
        echo "<script>
    alert('Gagal Ditambahkan Ke Keranjang')
    document.location.href='index.php';
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
    <link rel="stylesheet" href="assets_halaman_utama/assets/css/nice-select.css">
    <link rel="stylesheet" href="assets_halaman_utama/assets/css/animate.css">
    <link rel="stylesheet" href="assets_halaman_utama/assets/css/style.css">
</head>

<body id="home" class="inner-scroll">
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

    <!-- =============== main-slider =============== -->
    <section class="s-main-slider">
        <div class="main-slide-navigation"></div>
        <ul class="main-soc-list">
            <li><a href="#">facebook</a></li>
            <li><a href="#">twitter</a></li>
            <li><a href="#">instagram</a></li>
        </ul>
        <div class="main-slider">
            <div class="main-slide">
                <div class="main-slide-bg" style="background-image: url(assets_halaman_utama/assets/img/2.jpg);"></div>
                <div class="container">
                    <div class="main-slide-info">
                        <h2 class="title">Klinik Akupunktur</h2>
                        <p>Akupuntur merupakan pengobatan yang dilakukan dengan caramenusukkan jarum di titik-titik tertentu pada bagian tubuh pasien untukmembantu menyembuhkan penyakit atau mencapai kondisi kesehatantertentu.</p>
                        <a href="shop.php" class="btn"><span>Shop</span></a>
                    </div>
                </div>
            </div>
            <div class="main-slide">
                <div class="main-slide-bg" style="background-image: url(assets_halaman_utama/assets/img/2.jpg);"></div>
                <div class="container">
                    <div class="main-slide-info">
                        <h2 class="title">Klinik Jamu Herbal</h2>
                        <p>Pemanfaatan tanaman berkhasiat obat untuk berbagai kondisi gangguankesehatan telah dikenal sejak lama di seluruh dunia, khususnya di Indonesia. Pada awalnya pemanfaatan tanaman berkhasiat obat dilakukansecara turun-temurun (empiris) hingga saat ini telah banyak dilakukanpenelitian tentang tanaman berkhasiat obat (herbal).</p>
                        <a href="shop.php" class="btn"><span>Shop</span></a>
                    </div>
                </div>
            </div>
            <div class="main-slide">
                <div class="main-slide-bg" style="background-image: url(assets_halaman_utama/assets/img/4.jpg);"></div>
                <div class="container">
                    <div class="main-slide-info">
                        <h2 class="title">Klinik SPA</h2>
                        <p>Pelayanan kesehatan SPA adalah pelayanan yang dilakukan secaraholistik dengan memadukan berbagai jenis perawatan kesehatantradisional dan modern yang menggunakan air beserta pendukungperawatan lainnya berupa pijat penggunaan ramuan, terapi aroma, latihan fisik, terapi warna, terapi musik, dan makanan untukmemberikan efek terapi melalui panca indera guna mencapaikeseimbangan antara tubuh (body), pikiran (mind), dan jiwa (spirit),sehingga terwujud kondisi kesehatan yang optimal.</p>
                        <a href="shop.php" class="btn"><span>Shop</span></a>
                    </div>
                </div>
            </div>
            <div class="main-slide">
                <div class="main-slide-bg" style="background-image: url(assets_halaman_utama/assets/img/3.jpg);"></div>
                <div class="container">
                    <div class="main-slide-info">
                        <h2 class="title">Klinik Akupresur</h2>
                        <p>Akupresur merupakan teknik pengobatan tradisional dari Tiongkok. Teknik ini mirip dengan akupunktur, namun tidak menggunakan jarum. Akupresur diduga memiliki beberapa manfaat untuk kesehatan, seperti membantu meningkatkan sirkulasi darah, merangsang sistem saraf, serta membuat tubuh menjadi rileks dan lebih bertenaga..</p>
                        <a href="shop.php" class="btn"><span>Shop</span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ============= main-slider end ============= -->

    <!--============== S-CATEGORY-BICYKLE ==============-->
    <section class="s-category-bicycle">
        <div class="container">
            <div class="slider-categ-bicycle">
                <div class="slide-categ-bicycle">
                    <div class="categ-bicycle-item">
                        <img src="assets_halaman_utama/assets/img/categ-2.png" alt="category">
                        <div class="categ-bicycle-info">
                            <h4 class="title">Klinik <br>Akupunktur</h4>
                            <a href="shop.php" class="btn"><span>view more</span></a>
                        </div>
                    </div>
                </div>
                <div class="slide-categ-bicycle">
                    <div class="categ-bicycle-item">
                        <img src="assets_halaman_utama/assets/img/categ-2.png" alt="category">
                        <div class="categ-bicycle-info">
                            <h4 class="title">Klinik <br>Jamu Herbal</h4>
                            <a href="shop.php" class="btn"><span>view more</span></a>
                        </div>
                    </div>
                </div>
                <div class="slide-categ-bicycle">
                    <div class="categ-bicycle-item">
                        <img src="assets_halaman_utama/assets/img/categ-2.png" alt="category">
                        <div class="categ-bicycle-info">
                            <h4 class="title">Klinik <br>SPA</h4>
                            <a href="shop.php" class="btn"><span>view more</span></a>
                        </div>
                    </div>
                </div>
                <div class="slide-categ-bicycle">
                    <div class="categ-bicycle-item">
                        <img src="assets_halaman_utama/assets/img/categ-2.png" alt="category">
                        <div class="categ-bicycle-info">
                            <h4 class="title">Klinik <br>Akupresur</h4>
                            <a href="shop.php" class="btn"><span>view more</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============ S-CATEGORY-BICYKLE END ============-->

    <!--=============== S-OUR-ADVANTAGES ===============-->
    <section class="s-our-advantages" style="background-image: url(assets/img/bg-advantages.jpg);">
        <span class="mask"></span>
        <div class="container">
            <h2 class="title">Our Advantages</h2>
            <div class="our-advantages-wrap">
                <div class="our-advantages-item">
                    <img class="lazy" src="assets_halaman_utama/assets/img/placeholder-all.png" data-src="assets_halaman_utama/assets/img/advantages-1.svg" alt="icon">
                    <h5>Free shipping <br>from $500</h5>
                </div>
                <div class="our-advantages-item">
                    <img class="lazy" src="assets_halaman_utama/assets/img/placeholder-all.png" data-src="assets_halaman_utama/assets/img/advantages-2.svg" alt="icon">
                    <h5>Warranty service <br>for 3 months</h5>
                </div>
                <div class="our-advantages-item">
                    <img class="lazy" src="assets_halaman_utama/assets/img/placeholder-all.png" data-src="assets_halaman_utama/assets/img/advantages-3.svg" alt="icon">
                    <h5>Exchange and return <br>within 14 days</h5>
                </div>
                <div class="our-advantages-item">
                    <img class="lazy" src="assets_halaman_utama/assets/img/placeholder-all.png" data-src="assets_halaman_utama/assets/img/advantages-4.svg" alt="icon">
                    <h5>Discounts for <br>customers</h5>
                </div>
            </div>
        </div>
    </section>
    <!--============= S-OUR-ADVANTAGES END =============-->

    <!--================== S-PRODUCTS ==================-->
    <section class="s-products">
        <div class="container">
            <div class="tab-wrap">
                <div class="products-title-cover">
                    <h2 class="title">our products</h2>
                    <ul class="tab-nav product-tabs">
                        <li class="item" rel="tab1"><span>All</span></li>
                    </ul>
                </div>
                <div class="tabs-content">
                    <div class="tab tab1">
                        <div class="row product-cover">
                            <?php $i = 1;
                            foreach ($product as $product) { ?>
                                <div class="col-sm-6 col-lg-3">
                                    <div class="product-item">
                                        <span class="top-sale">top sale</span>
                                        <a href="#" class="product-img"><img class="lazy" src="upload/product/<?= $product['foto'] ?>" data-src="upload/product/<?= $product['foto'] ?>" alt="product"></a>
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
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ S-PRODUCTS END ================-->

    <!--================== S-SUBSCRIBE ==================-->
    <section class="s-subscribe" style="background-image: url(assets/img/bg-subscribe.jpg);">
        <span class="mask"></span>
        <span class="subscribe-effect wow fadeIn" data-wow-duration="1s" style="background-image: url(assets/img/subscribe-effect.svg);"></span>
        <div class="container">
            <div class="subscribe-left">
                <h2 class="title m-3"><span>Loka Kesehatan Tradisional Masyarakat Palembang</span></h2>
                <p class="m-2"><small>Pembangunan Kesehatan mempunyai tujuan meningkatkan Pembangunan kesehatan merupakan salah satu upaya pembangunan nasional yang diselenggarakan pada semua bidang kehidupan. Pembangunan kesehatan bertujuan untuk meningkatkan kesadaran, kemauan dan kemampuan hidup sehat bagi setiap orang agar terwujud derajat kesehatan masyarakat yang optimal. Dengan demikian, pembangunan kesehatan merupakan salah satu upaya utama untuk meningkatkan kualitas sumber daya manusia yang pada gilirannya mendukung percepatan pencapaian sasaran pembangunan nasional.</small></p>
            </div>
            <img class="wow fadeInRightBlur lazy" data-wow-duration=".8s" data-wow-delay=".3s" src="assets_halaman_utama/assets/img/placeholder-all.png" data-src="assets_halaman_utama/assets/img/5.jpg" width="100%" alt="img">
        </div>
    </section>
    <!--================ S-SUBSCRIBE END ================-->

    <!--================== S-TOP-SALE ==================-->
    <section class="s-top-sale">
        <div class="container">
            <h2 class="title">Produk Terbaru</h2>
            <div class="row product-cover">
                <?php $i = 1;
                foreach ($top_product as $top_product) { ?>
                    <div class="col-sm-6 col-lg-3">
                        <div class="product-item">
                            <a href="#" class="product-img"><img class="lazy" src="upload/product/<?= $top_product['foto'] ?>" data-src="upload/product/<?= $top_product['foto'] ?>" alt="product"></a>
                            <div class="product-item-cover">
                                <div class="price-cover">
                                    <div class="new-price">Rp<?= number_format($top_product['harga']) ?></div>
                                </div>
                                <h6 class="prod-title"><a href="#"><?= $top_product['nama_product'] ?></a></h6>
                                <form method="post" class="cart">
                                    <div class="">
                                        <input type="hidden" name="id_product" id="french-hens" value="<?= $top_product['id_product']  ?>">
                                        <input type="hidden" name="id_users" id="french-hens" value="<?= $_SESSION['login']['id_users']  ?>">
                                        <input type="number" name="jml_pesanan" id="french-hens" class="form-group" value="1" min="1" max="<?= $top_product['stock']  ?>">
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
                                    <li>Nama product: <span><?= $top_product['nama_product'] ?></span></li>
                                    <li>Stock: <span><?= $top_product['stock'] ?></span></li>
                                    <li>Harga: <span>Rp<?= number_format($top_product['harga']) ?></span></li>
                                    <li>Tanggal Expired: <span><?= $top_product['tgl_expired'] ?></span></li>
                                    <li>khasiat: <span><?= $top_product['khasiat'] ?></span></li>
                                    <li>Keterangan: <span><?= $top_product['keterangan_product'] ?></span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!--================ S-TOP-SALE END ================-->

    <!--================== S-FEEDBACK ==================-->
    <section class="s-feedback" style="background-image: url(assets/img/bg-feedback.jpg);">
        <span class="effwct-bg-feedback" style="background-image: url(assets/img/effect-bg-feedback.svg);"></span>
        <span class="mask"></span>
        <div class="container">
            <h2 class="title">feedback</h2>
            <div class="feedback-slider">
                <div class="feedback-slide">
                    <div class="feedback-item">
                        <div class="feedback-content">
                            <p>“ Semua pegawai mulai dari dokter, perawat dan petugas-petugas yang lain sangat ramah dan proses administrasi tidak dipersulit bahkan dibuat simple sekali. Kami tidak pernah dibuat menunggu lama oleh karena alur atau loket-loket antrian yang panjang dan rumit. Saya yang merupakan pasien lama sudah lebih dari 5 tahun melihat perkembangan baik dari segi fasilitas dan pelayanan semakin hari semakin bagus.”</p>
                        </div>
                        <div class="feedback-item-top">
                            <img src="assets_halaman_utama/assets/img/6.jpg" alt="photo">
                            <div class="feedback-title">
                                <h5 class="title"><span>Bpk. Supriyadi (46 tahun)</span></h5>
                                <ul class="rating">
                                    <li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="feedback-slide">
                    <div class="feedback-item">
                        <div class="feedback-content">
                            <p>“ Prosedural yang dilalui pun tidaklah rumit atau menyulitkan pasien. Pasien peserta BPJS tidak mesti melalui loket-loket “procedural” yang melelahkan dan ribet. Cukup satu loket, selesai sudah urusan. Kedepannya semoga Dipertahankan yang baiknya dan semakin ditingkatkan pelayanannya.”</p>
                        </div>
                        <div class="feedback-item-top">
                            <img src="assets_halaman_utama/assets/img/7.jpg" alt="photo">
                            <div class="feedback-title">
                                <h5 class="title"><span>Ibu Ratih Virta Gayatri ( 41 tahun)</span></h5>
                                <ul class="rating">
                                    <li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="feedback-slide">
                    <div class="feedback-item">
                        <div class="feedback-content">
                            <p>“ Anak saya Andika Febriansyah masuk pada hari Minggu, 20 Maret 2016 dengan keluhan demam dan diagnosa dari dokter anak saya positif tyfus dan langsung di rawat intensif di kamar rawat inap. Menurut saya pelayanan sudah bagus, semua perawat, dokter, dan petugas lainnya responnya cepat ,sangat ramah dan murah senyum. Saya juga dipermudah untuk alur administrasinya tidak berbelit-belit dan tidak harus menunggu lama. Anak saya dirawat dengan baik oleh dr. Ester Sp.A dan sekarang sudah sehat”</p>
                        </div>
                        <div class="feedback-item-top">
                            <img src="assets_halaman_utama/assets/img/8.jpg" alt="photo">
                            <div class="feedback-title">
                                <h5 class="title"><span>Lisma Yanti (28 tahun)</span></h5>
                                <ul class="rating">
                                    <li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="feedback-slide">
                    <div class="feedback-item">
                        <div class="feedback-content">
                            <p>“Pada tanggal 22 maret 2016 anak pertama saya Boryenka dirawat karena sakit flu singapura dan campak. Ketika anak saya sakit, saya memang langsung mempercayakan segala tindakan pengobatan kepada dokter spesialis anak yaitu dr. Ester, Sp.A karena dari awal sudah nyaman ditangani dengan dr. Ester, Sp.A penanganannya cepat dan teliti sekali. Dan memang betul anak saya cepat pulih sekarang sudah bisa beraktifitas kembali. Begitu juga dengan para tim medis dan petugas lainnya , mereka begitu ramah dan perhatian terhadap pasiennya. ”</p>
                        </div>
                        <div class="feedback-item-top">
                            <img src="assets_halaman_utama/assets/img/9.jpg" alt="photo">
                            <div class="feedback-title">
                                <h5 class="title"><span>Tri Sapto Untoro (38 tahun)</span></h5>
                                <ul class="rating">
                                    <li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ S-FEEDBACK END ================-->

    <!--=================== S-CLIENTS ===================-->
    <section class="s-clients">
        <div class="container">
            <div class="clients-cover">
                <div class="client-slide">
                    <div class="client-slide-cover">
                        <img src="assets_halaman_utama/assets/img/client-1.svg" alt="img">
                    </div>
                </div>
                <div class="client-slide">
                    <div class="client-slide-cover">
                        <img src="assets_halaman_utama/assets/img/client-2.svg" alt="img">
                    </div>
                </div>
                <div class="client-slide">
                    <div class="client-slide-cover">
                        <img src="assets_halaman_utama/assets/img/client-4.svg" alt="img">
                    </div>
                </div>
                <div class="client-slide">
                    <div class="client-slide-cover">
                        <img src="assets_halaman_utama/assets/img/client-5.svg" alt="img">
                    </div>
                </div>
                <div class="client-slide">
                    <div class="client-slide-cover">
                        <img src="assets_halaman_utama/assets/img/client-6.svg" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================= S-CLIENTS END =================-->

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
    <!--==================== SCRIPT	====================-->
    <script src="assets_halaman_utama/assets/js/jquery-2.2.4.min.js"></script>
    <script src="assets_halaman_utama/assets/js/slick.min.js"></script>
    <script src="assets_halaman_utama/assets/js/jquery.nice-select.js"></script>
    <script src="assets_halaman_utama/assets/js/wow.js"></script>
    <script src="assets_halaman_utama/assets/js/lazyload.min.js"></script>
    <script src="assets_halaman_utama/assets/js/scripts.js"></script>
</body>

</html>