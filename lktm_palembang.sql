-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2021 at 06:57 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lktm_palembang`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_pembelian`
--

CREATE TABLE `tb_detail_pembelian` (
  `id_detail_pembelian` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_detail_pembelian`
--

INSERT INTO `tb_detail_pembelian` (`id_detail_pembelian`, `id_pembelian`, `id_product`, `jumlah`) VALUES
(9, 8, 6, 2),
(10, 9, 8, 1),
(11, 9, 9, 1),
(12, 9, 3, 2),
(13, 9, 11, 2),
(14, 10, 1, 1),
(15, 10, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_keranjang`
--

CREATE TABLE `tb_keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `jml_pesanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_konsultasi`
--

CREATE TABLE `tb_konsultasi` (
  `id_konsultasi` int(11) NOT NULL,
  `id_pengirim` int(11) NOT NULL,
  `id_penerima` int(11) NOT NULL,
  `pesan` varchar(100) NOT NULL,
  `waktu_kirim` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_konsultasi`
--

INSERT INTO `tb_konsultasi` (`id_konsultasi`, `id_pengirim`, `id_penerima`, `pesan`, `waktu_kirim`) VALUES
(31, 8, 4, 'halo dok', '09 Jul 2021  23:47'),
(33, 4, 8, 'halo rizki', '09 Jul 2021  23:48'),
(34, 10, 4, 'halo dok', '09 Jul 2021  23:52'),
(35, 4, 10, 'halo pembeli satu', '09 Jul 2021  23:53');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kunjungan`
--

CREATE TABLE `tb_kunjungan` (
  `id_kunjungan` int(11) NOT NULL,
  `poli` varchar(30) NOT NULL,
  `bulan` varchar(15) NOT NULL,
  `hari_tanggal` varchar(30) NOT NULL,
  `no_reg` varchar(15) NOT NULL,
  `nama_pasien` varchar(30) NOT NULL,
  `umur` int(11) NOT NULL,
  `status_l_b` varchar(10) NOT NULL,
  `status_lk_pr` varchar(10) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `akp` int(11) NOT NULL,
  `k_jamu` int(11) NOT NULL,
  `akupresur` varchar(30) NOT NULL,
  `tdp` int(11) NOT NULL,
  `us` int(11) NOT NULL,
  `spa` int(11) NOT NULL,
  `col` int(11) NOT NULL,
  `au` int(11) NOT NULL,
  `gds` int(11) NOT NULL,
  `oht` int(11) NOT NULL,
  `keterangan_kunjungan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kunjungan`
--

INSERT INTO `tb_kunjungan` (`id_kunjungan`, `poli`, `bulan`, `hari_tanggal`, `no_reg`, `nama_pasien`, `umur`, `status_l_b`, `status_lk_pr`, `alamat`, `akp`, `k_jamu`, `akupresur`, `tdp`, `us`, `spa`, `col`, `au`, `gds`, `oht`, `keterangan_kunjungan`) VALUES
(3, 'PELAYANAN KESEHATAN TRADISIONA', 'Juni', 'Sat, 05 Jun 2021', '0353', 'Jon Heri', 56, 'L', 'LK', 'Jalan Inspektur Marzuki', 0, 0, 'Dewasa', 0, 0, 0, 0, 0, 0, 0, '-'),
(5, 'PELAYANAN KESEHATAN TRADISIONA', 'Juli', 'Fri, 09 Jul 2021', '12', 'Nama Pasien', 21, 'L', 'LK', 'Jalan Demang Lebar Daun', 1, 1, 'Dewasa', 1, 1, 1, 1, 1, 1, 1, 'Keterangan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `bukti_pembayaran` varchar(20) NOT NULL,
  `status_pembayaran` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_pembayaran`, `id_pembelian`, `bukti_pembayaran`, `status_pembayaran`) VALUES
(5, 6, '60cc75331a7d9.jpg', 'Dikonfirmasi'),
(6, 7, '60cc753d5e8bd.jpg', 'Belum Dikonfirmasi'),
(7, 8, 'Belum Ada', 'Belum Dikonfirmasi'),
(8, 9, '60e687291d007.jpg', 'Dikonfirmasi'),
(9, 10, '60e88015c1bf5.png', 'Dikonfirmasi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembelian`
--

CREATE TABLE `tb_pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `status_pembelian` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pembelian`
--

INSERT INTO `tb_pembelian` (`id_pembelian`, `id_users`, `total_harga`, `status_pembelian`) VALUES
(8, 6, 4000, 'Dikonfirmasi'),
(9, 8, 12000, 'Dikonfirmasi'),
(10, 10, 27000, 'Dikonfirmasi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_perintah`
--

CREATE TABLE `tb_perintah` (
  `id_perintah` int(11) NOT NULL,
  `id_pembayaran` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `konfirmasi_barang_diterima` varchar(30) NOT NULL,
  `konfirmasi_sampai_kantor` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_perintah`
--

INSERT INTO `tb_perintah` (`id_perintah`, `id_pembayaran`, `id_users`, `konfirmasi_barang_diterima`, `konfirmasi_sampai_kantor`) VALUES
(1, 5, 6, 'Dikonfirmasi', 'Dikonfirmasi'),
(2, 6, 6, 'Dikonfirmasi', 'Belum Dikonfirmasi'),
(3, 7, 6, 'Belum Dikonfirmasi', 'Belum Dikonfirmasi'),
(4, 8, 8, 'Dikonfirmasi', 'Dikonfirmasi'),
(5, 9, 10, 'Dikonfirmasi', 'Dikonfirmasi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `id_product` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `nama_product` varchar(50) NOT NULL,
  `stock` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `tgl_expired` date NOT NULL,
  `khasiat` text NOT NULL,
  `foto` varchar(50) NOT NULL,
  `keterangan_product` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`id_product`, `id_users`, `nama_product`, `stock`, `harga`, `tgl_expired`, `khasiat`, `foto`, `keterangan_product`) VALUES
(1, 1, 'bioskin', 18, 25000, '2025-07-30', 'Mengatasi Bekas luka dan masalah kulit-original. Membantu meringankan luka bakar, tersiram air panas, tersengat sinar matahari, gatal-gatal dan gigitan serangga. Memiliki efek anti inflamasi dan meringankan rasa sakit. Meredakan luka bakar dan mempercepat penyembuhan kulit', '60cc590197c07.png', '-'),
(2, 1, 'Busir', 14, 2000, '2025-06-30', 'Busir digunakan untuk membantu meringankan gejala wasir, seperti gatal atau iritasi, sakit, merah dan bengkak di sekitar anus. Kandungan alkaloid pada daun ungu secara tradisional mampu mencegah dan mengurangi rasa sakit dan peradangan di daerah sekitar timbulnya wasir.', '60cc5ff3dd8df.jpg', '-'),
(3, 1, 'Darsi', 19, 2000, '2025-06-30', 'Darsi digunakan untuk membantu mengurangi jerawat, bisul, serta kondisi gatal-gatal. Obat ini juga mampu menghaluskan kulit dan bertindak sebagai antiseptik.', '60cc60429b374.jpg', '-'),
(5, 1, 'delimas', 0, 2000, '2025-06-30', 'Delimas digunakan secara tradisional untuk membantu menjaga kesehatan pada organ kewanitaan.', '60cc60fddcdd3.jpg', '-'),
(6, 1, 'ganoderma', 18, 2000, '2025-06-30', 'ganoderma juga dipercaya dapat meningkatkan kualitas hidup, membuat tubuh tidak mudah lelah, dan meredakan gangguan kecemasan bahkan depresi.', '60cc6131b7a8e.jpg', '-'),
(7, 1, 'garam mandi', 0, 25000, '2025-06-30', 'Manfaat air garam yang pertama adalah membantu sistem pencernaan. Manfaat ini bisa didapatkan karena garam bisa membantu tubuh memproduksi enzim tertentu, yang bertugas membantu sistem pencernaan dalam melakukan tugasnya. Air liur memproduksi enzim amilase. Hal ini biasa dikenal sebagai tahap awal proses pencernaan.', '60cc625a96f6e.jpg', '-'),
(8, 1, 'gotu-k', 57, 2000, '2025-06-30', 'berguna untuk membantu melancarkan sirkulasi darah. Selain itu, ekstrak pegagan juga digunakan untuk membantu menjaga kesehatan kulit.', '60cc62989a846.jpg', '-'),
(9, 1, 'Jahe', 22, 2000, '2025-06-30', 'khasiat  Delapan', '60cc63207c6d4.jpg', 'manfaat jahe disebut-sebut dap'),
(10, 1, 'habbatusaudah', 22, 0, '2025-06-30', 'khasiat habbatussauda telah digunakan untuk sakit kepala, sakit gigi, hidung tersumbat, asma, radang sendi, infeksi, hingga cacingan. Studi praklinis telah menunjukkan efek menguntungkan dari habbatussauda', '60cc6382048cc.jpg', '-'),
(11, 1, 'katuk', 28, 2000, '2025-06-30', 'Manfaat daun katuk paling populer adalah sebagai pelancar ASI tradisional. ', '60cc63fcc23f8.jpg', '-'),
(12, 1, 'Kelorin', 30, 2000, '2025-06-30', 'Kelorin secara tradisional dapat membantu memelihara kesehatan tubuh.', '60cc66ddb6dce.jpg', '-'),
(13, 1, 'Kenis', 14, 2000, '2025-06-30', 'Kenis Pil digunakan untuk membantu meringankan penyakit gula (diabetes), dan mengatasi gejala-gejalanya.', '', '-'),
(15, 1, 'Kunirin', 43, 2000, '2025-06-18', 'maagh, antibiotik alami', '60cc67c58755d.jpg', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id_users` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  `kabupaten` varchar(30) NOT NULL,
  `provinsi` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(75) NOT NULL,
  `level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id_users`, `nama`, `nik`, `no_hp`, `alamat`, `kecamatan`, `kabupaten`, `provinsi`, `username`, `password`, `level`) VALUES
(1, 'admin', '1', '123', 'Alamat Palembang', 'Kecamatan Palembang', 'Kabupaten Palembang', 'Provinsi Sumatera Selatan', 'admin', '$2y$10$jlC6GNFzx0LNNlbl6O/vxuy5ZHTtRPxCfqpgJCdxcgum7g48SfF5q', 'Admin'),
(2, 'Pimpinan', '2', '234', 'alamat ', 'kecamatan', 'kabupaten', 'provinsi', 'pimpinan', '$2y$10$gEbtPRu4m27Wyf2p.4l1P.5BhkluvxtSKRuiRTUfRV0o6aY61io.a', 'Pimpinan'),
(4, 'Dokter Satu', '3', '345', 'alamat ', 'kecamatan', 'kabupaten', 'provinsi', 'doktersatu', '$2y$10$DzEgLk6QuM1aWUX2n5G/zehNgoF6XvXkfVk8sgWUbyGO4Vtwgow3O', 'Dokter'),
(5, 'Kurir Satu', '4', '456', 'alamat ', 'kecamatan', 'kabupaten', 'provinsi', 'kurirsatu', '$2y$10$uk916Y2.9vka791wnLffA.bZeaev1RdJamsA61tPs5aZtKTJDcXOi', 'Kurir'),
(8, 'Rizki', '5', '567', 'Jalan Demang Lebar Daun', 'Ilir Barat I', 'Palembang', 'Sumatera Selatan', 'Rizki123', '$2y$10$H5VniwKyWSW.CCaxbKL96.VR2CnTMZZ6BC7Y26ijC.uBcU201oUJ2', 'Pembeli'),
(10, 'pembeli satu', '6', '678', 'Jalan Demang Lebar Daun', 'Ilir Barat I', 'Palembang', 'Sumatera Selatan', 'pembelisatu', '$2y$10$rmBe85gAlMNHQFMS0nQZheXZZBIutKlqskL8XPSj9tFjudfb97cjW', 'Pembeli'),
(11, 'Pembeli Tiga', '9', '0898', 'Jalan Demang Lebar Daun', 'Ilir Barat I', 'Palembang', 'Sumatera Selatan', 'pembelitiga', '$2y$10$XezHYI5ABo621N0uOYIeWeklqQWh38A1C8w1uN8sSxFGknu1eobie', 'Pembeli');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_detail_pembelian`
--
ALTER TABLE `tb_detail_pembelian`
  ADD PRIMARY KEY (`id_detail_pembelian`);

--
-- Indexes for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `tb_konsultasi`
--
ALTER TABLE `tb_konsultasi`
  ADD PRIMARY KEY (`id_konsultasi`);

--
-- Indexes for table `tb_kunjungan`
--
ALTER TABLE `tb_kunjungan`
  ADD PRIMARY KEY (`id_kunjungan`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `tb_perintah`
--
ALTER TABLE `tb_perintah`
  ADD PRIMARY KEY (`id_perintah`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_detail_pembelian`
--
ALTER TABLE `tb_detail_pembelian`
  MODIFY `id_detail_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_konsultasi`
--
ALTER TABLE `tb_konsultasi`
  MODIFY `id_konsultasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tb_kunjungan`
--
ALTER TABLE `tb_kunjungan`
  MODIFY `id_kunjungan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_perintah`
--
ALTER TABLE `tb_perintah`
  MODIFY `id_perintah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
