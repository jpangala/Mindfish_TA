-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2022 at 02:39 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mindfish`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `nama_customer` varchar(50) NOT NULL,
  `nomor_telp` varchar(13) NOT NULL,
  `alamat_customer` varchar(250) NOT NULL,
  `id_akun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `nama_customer`, `nomor_telp`, `alamat_customer`, `id_akun`) VALUES
(1, 'Obed Jack Gredo', '0222014832', 'Jl Mustang 46, Bandung, Jawa Barat 40164', 6),
(2, 'Daniel Felix', '0215229484', 'Jl HR Rasuna Said Kav X-6/8 Sentra Mulia Lt 17 607, Dki Jakarta 12940', 12);

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id` int(11) NOT NULL,
  `id_ikan` int(11) NOT NULL,
  `id_penjualan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `subtotal_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id`, `id_ikan`, `id_penjualan`, `jumlah`, `harga_jual`, `subtotal_harga`) VALUES
(23, 2, 2, 1, 2000000, 2000000),
(24, 19, 2, 4, 200000, 800000),
(25, 19, 2, 4, 200000, 800000),
(26, 20, 2, 7, 25000, 175000),
(27, 1, 2, 12, 15000, 180000),
(28, 2, 3, 31, 2000000, 62000000),
(32, 20, 4, 77, 25000, 1925000),
(34, 2, 5, 90, 2000000, 180000000),
(35, 1, 7, 1, 15000, 15000),
(36, 1, 7, 1, 15000, 15000),
(37, 1, 7, 1, 15000, 15000),
(38, 1, 7, 1, 15000, 15000),
(39, 1, 7, 90, 15000, 1350000),
(40, 1, 7, 33, 15000, 495000),
(43, 2, 8, 2, 2000000, 4000000),
(45, 2, 8, 3, 2000000, 6000000),
(46, 1, 8, 4, 15000, 60000),
(47, 1, 8, 6, 15000, 90000),
(49, 1, 4, 12, 15000, 180000),
(50, 2, 6, 1, 2000000, 2000000),
(51, 2, 9, 3, 2000000, 6000000),
(52, 20, 9, 5, 25000, 125000),
(53, 2, 10, 7, 2000000, 14000000),
(54, 1, 11, 4, 15000, 60000),
(55, 20, 12, 15, 25000, 375000),
(56, 1, 13, 15, 15000, 225000),
(57, 2, 14, 1, 2000000, 2000000),
(58, 2, 15, 1, 2000000, 2000000),
(59, 1, 16, 1, 15000, 15000),
(60, 21, 17, 2, 50000, 100000),
(61, 22, 17, 5, 750000, 3750000),
(81, 19, 19, 5, 200000, 1000000),
(86, 19, 109, 2, 200000, 400000),
(87, 1, 109, 1, 1500000, 1500000),
(88, 22, 110, 4, 750000, 3000000),
(89, 21, 110, 6, 50000, 300000),
(90, 19, 111, 1, 200000, 200000),
(91, 22, 111, 2, 750000, 1500000),
(92, 1, 112, 10, 1500000, 15000000),
(93, 20, 117, 1, 25000, 25000),
(94, 2, 122, 11, 2000000, 22000000),
(95, 1, 123, 1, 1500000, 1500000),
(96, 19, 124, 9, 200000, 1800000),
(97, 19, 125, 7, 200000, 1400000),
(98, 21, 126, 5, 50000, 250000),
(99, 2, 127, 1, 2000000, 2000000),
(100, 21, 128, 2, 50000, 100000),
(101, 20, 129, 2, 25000, 50000),
(103, 1, 131, 1, 1500000, 1500000),
(123, 1, 149, 1, 1500000, 1500000),
(124, 2, 149, 1, 2000000, 2000000),
(125, 19, 150, 1, 200000, 200000),
(126, 1, 154, 1, 1500000, 1500000),
(127, 2, 155, 1, 2000000, 2000000),
(132, 2, 160, 1, 2000000, 2000000),
(133, 22, 161, 1, 750000, 750000),
(134, 22, 162, 1, 750000, 750000),
(138, 2, 164, 1, 2000000, 2000000),
(140, 20, 166, 1, 25000, 25000),
(141, 19, 167, 1, 200000, 200000),
(142, 2, 168, 1, 2000000, 2000000),
(143, 2, 169, 1, 2000000, 2000000),
(144, 19, 170, 1, 200000, 200000),
(145, 19, 171, 1, 200000, 200000),
(146, 20, 171, 1, 25000, 25000),
(147, 21, 172, 1, 50000, 50000),
(148, 22, 172, 1, 750000, 750000),
(149, 19, 173, 3, 200000, 600000),
(150, 20, 173, 3, 25000, 75000),
(151, 21, 174, 2, 50000, 100000),
(152, 22, 174, 2, 750000, 1500000),
(153, 2, 175, 1, 2000000, 2000000),
(154, 19, 176, 1, 200000, 200000),
(155, 1, 177, 1, 1500000, 1500000),
(156, 1, 178, 1, 1500000, 1500000),
(157, 1, 179, 2, 1500000, 3000000),
(158, 1, 180, 2, 1500000, 3000000),
(159, 22, 181, 2, 750000, 1500000);

-- --------------------------------------------------------

--
-- Table structure for table `ikan`
--

CREATE TABLE `ikan` (
  `id` int(11) NOT NULL,
  `id_jenis` int(60) NOT NULL,
  `nama_ikan` varchar(50) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ikan`
--

INSERT INTO `ikan` (`id`, `id_jenis`, `nama_ikan`, `deskripsi`, `harga`, `gambar`) VALUES
(1, 1, 'Koi Kohaku', 'Kohaku sebagai raja dari semua ikan koi merupakan varietas pertama ikan koi yang dikembangkan dengan dua warna yaitu putih (shiroji), dan bercak merah.', 1500000, 'koi_kohaku.jpg'),
(2, 2, 'Arwana Super Red', 'Ikan yang berasal dari sungai Kapuas dan danau Sentarum, yang berada di Kalimantan Barat, terkenal sebagai habitat Super Red (Chili dan Blood Red). Umumnya, ikan jenis ini terbagi atas 4 warna, yaitu Merah Darah (Blood Red), Merah Cabai (Chili Red), Merah Orange (Orange Red), dan Merah Emas (Golden Red)', 2000000, 'arwana_superred.jpg'),
(19, 0, 'Cupang Beta Mandor', 'adalah spesies dari cupang. Betta mandor adalah ikan air tawar yang ditemukan di rawa-rawa, sungai serta sungai di hutan Kalimantan Indonesia.  Ini tumbuh dengan panjang sekitar 5,7 cm SL. Betta mandor makan arthropoda dan hewan kecil lainnya. Betta mandor adalah ikan pengeram mulut dan juga dengan menggunakan sarang gelembung.', 200000, 'cupang_bettamandor.jpg'),
(20, 0, 'Cupang Crown Tail', 'Ikan cupang crown tail (cupang hias serit) merupakan ikan asli Indonesia. Cupang jenis crowntail dapat memakan puluhan jentik dan telur nyamuk sampai tidak tersisa. Ciri yang menonjol pada ikan ini memiliki gerakan agresif dan memiliki warna yang indah.', 25000, 'cupang_crowntail.jpg'),
(21, 0, 'Manfish Altum', 'ikan manfish jenis ini cenderung susah karena membutuhkan ruang yang luas serta membutuhkan bebatuan dan tanaman sebagai tempat berlindung. Ikan manfish altum juga termasuk dari tiga ikan terbesar dari spesies ikan angelfish.', 50000, 'manfish_altum.jpg'),
(22, 0, 'Arwana Brazil', 'Merupakan Ikan hias yang langka dan sangat sensitif dalam peIkan Arwana Brazil punya kemampuan untuk melompat tinggi di udara saat menangkap mangsanya, yaitu serangga. Hewan air yang memiliki ciri khas sisik berwarna silver dan sirip yang panjang ini, akan bertumbuh sepanjang 1 meter saat dewasa.', 750000, 'arwana_brazil.jpg'),
(28, 0, 'Ikan hias 4', 'ikan contoh', 0, ''),
(32, 0, 'Ikan hias 5', 'ikan contoh', 1500000, 'KTM_Jeremia_Joseph_P_21120117140031.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `nama_bank` varchar(60) NOT NULL,
  `no_rekening` varchar(25) NOT NULL,
  `nama_penerima` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `nama_bank`, `no_rekening`, `nama_penerima`) VALUES
(1, 'BCA', '21120117140031', 'Jeremia Joseph P'),
(2, 'BNI', '3405987345349', 'Jeremia Joseph P'),
(5, 'Mandiri', '789534987534', 'Jeremia Joseph P');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `id_bank` int(11) NOT NULL,
  `no_penjualan` varchar(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `alamat_pengiriman` varchar(250) NOT NULL,
  `no_telepon` varchar(13) NOT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(50) NOT NULL,
  `bukti_pembayaran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id`, `id_pembeli`, `id_bank`, `no_penjualan`, `total_harga`, `alamat_pengiriman`, `no_telepon`, `tanggal_dibuat`, `status`, `bukti_pembayaran`) VALUES
(175, 6, 1, 'IKN06160001', 2000000, 'Jl. Mataram 1 No. 2 Griya Bandung Indah, Bandung, Jawa Barat 16724', '', '2022-08-16 11:41:41', 'Selesai', 'bukti_pembayaran.jpg'),
(179, 6, 1, 'IKN08160001', 3000000, 'Jln. Banjarsari 5 No 19', '', '2022-08-16 11:40:36', 'Selesai', 'axgpay.png'),
(181, 6, 2, 'IKN08160002', 1500000, 'Jln. Banjarsari 5 No 19', '', '2022-08-16 11:54:43', 'Pembayaran Telah Dilakukan', '202109062138-main.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `id` int(60) NOT NULL,
  `id_ikan` int(11) NOT NULL,
  `status` int(60) NOT NULL,
  `keterangan` varchar(60) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`id`, `id_ikan`, `status`, `keterangan`, `tanggal`) VALUES
(22, 1, 100, 'Penambahan Stok', '2022-06-09 12:34:09'),
(23, 1, 100, 'Penambahan Stok', '2022-06-09 12:27:18'),
(24, 19, 100, 'Penambahan Stok', '2022-05-26 22:12:00'),
(25, 20, 100, 'Penambahan Stok', '2022-05-26 22:12:00'),
(26, 21, 100, 'Penambahan Stok', '2022-05-26 22:13:00'),
(27, 22, 100, 'Penambahan Stok', '2022-05-26 22:13:00'),
(28, 1, -1, 'Pembelian', '2022-06-09 12:27:35'),
(29, 2, -1, 'Pembelian', '2022-05-26 17:14:27'),
(35, 2, -1, 'Pembelian', '2022-06-16 06:08:51'),
(36, 2, -1, 'Pembelian', '2022-06-16 06:30:29'),
(46, 2, -1, 'Pembelian', '2022-06-16 09:42:02'),
(48, 1, -1, 'Pembelian', '2022-06-22 11:30:42'),
(49, 2, 5, 'Penambahan Stok', '2022-07-07 12:42:00'),
(50, 1, -1, 'Pembelian', '2022-07-07 09:36:29'),
(52, 22, -2, 'Pembelian', '2022-08-16 06:53:45'),
(55, 28, 1, 'Penambahan Stok', '2022-08-25 10:43:00'),
(56, 28, 123, 'Penambahan Stok', '2022-08-25 10:50:00'),
(57, 29, 234, 'Penambahan stok', '2022-08-25 11:01:00'),
(58, 30, 45, 'Penambahan stok', '2022-08-25 11:04:00'),
(59, 31, 45, 'Penambahan stok', '2022-08-25 11:07:00'),
(60, 32, 1, 'Penambahan stok', '2022-09-12 15:23:00'),
(61, 1, -1, 'Pembelian', '2022-09-28 14:08:14'),
(62, 19, -1, 'Pembelian', '2022-09-28 14:08:14'),
(63, 22, -1, 'Pembelian', '2022-09-28 16:28:02'),
(64, 20, -3, 'Pembelian', '2022-09-28 16:45:21'),
(65, 21, -2, 'Pembelian', '2022-09-28 16:45:21'),
(66, 32, -1, 'Pembelian', '2022-09-28 16:45:21'),
(69, 1, -4, 'Pembelian', '2022-09-29 12:35:37');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `no_transaksi` varchar(11) NOT NULL,
  `id_ikan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(50) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `bukti_pembayaran` varchar(100) NOT NULL,
  `id_pembayaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `no_transaksi`, `id_ikan`, `jumlah`, `tanggal`, `status`, `id_customer`, `bukti_pembayaran`, `id_pembayaran`) VALUES
(1, 'IKN09280001', 1, 1, '2022-09-28 16:49:50', 'Pembayaran Berhasil', 1, 'bukti_pembayaran.jpg', 1),
(2, 'IKN09280001', 2, 1, '2022-09-28 16:49:50', 'Pembayaran Berhasil', 1, 'bukti_pembayaran.jpg', 1),
(3, 'IKN09280002', 1, 1, '2022-09-28 16:43:56', 'Pembayaran Telah Dilakukan', 1, 'Webex_Virtual_Background.png', 1),
(4, 'IKN09280002', 19, 1, '2022-09-28 16:43:56', 'Pembayaran Telah Dilakukan', 1, 'Webex_Virtual_Background.png', 1),
(5, 'IKN09280003', 22, 1, '2022-09-28 16:43:17', 'Pembayaran Telah Dilakukan', 1, '33.jpg', 1),
(11, 'IKN09290001', 1, 4, '2022-09-29 12:35:37', 'Menunggu Pembayaran', 2, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `tipe_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`id`, `username`, `password`, `nama_user`, `tipe_user`) VALUES
(1, 'jpangala', '$2y$10$eRKntAHyfmKDlzJyqY0AteiPIkgPc.oGi30W1AqRN2U3nizfRDqv6', 'Jeremia', 1),
(6, 'jek', '$2y$10$o6KZzNdOi96VnToP9PUxyOEA/KkrIOCkv.gDWs8URpUoGpMxmLXTm', 'Obed Jack Gredoo', 2),
(12, 'felix', '$2y$10$l3sMeMI/zMkH1nRAZaMl.uHoxAF8yKP5y3bqrPReIvpBFoW7KRRM6', 'Daniel Felix', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ikan`
--
ALTER TABLE `ikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `ikan`
--
ALTER TABLE `ikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `id` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
