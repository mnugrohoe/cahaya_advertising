-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2022 at 03:00 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cahaya_adv`
--

-- --------------------------------------------------------

--
-- Table structure for table `katalog`
--

CREATE TABLE `katalog` (
  `id_katalog` int(11) NOT NULL,
  `nama_katalog` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `katalog`
--

INSERT INTO `katalog` (`id_katalog`, `nama_katalog`) VALUES
(1, 'Buku'),
(2, 'Dekorasi'),
(3, 'Event'),
(4, 'Kemasan'),
(5, 'Stationary'),
(6, 'Promosi'),
(7, 'Signage & Display'),
(8, 'Souvenir'),
(9, 'Textile');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `role`) VALUES
('admin', '$2y$10$4v/5RnDwB.DRCqAq9jczweNLJQeJZ0RY4eLn0jgVTzjCR8MOy9xyq', 'admin'),
('user', '$2y$10$ZPeb3hLSpr4sk/2vXKnUEunsfceQE6jElXbQUNB1JE05Jf9Ok1YCu', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `gender` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `telp` varchar(16) DEFAULT NULL,
  `alamat` varchar(256) DEFAULT NULL,
  `tanggal_daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `username`, `nama`, `gender`, `telp`, `alamat`, `tanggal_daftar`) VALUES
(0, 'admin', 'Admin', NULL, NULL, NULL, '2022-02-07'),
(1, 'user', 'User Test', NULL, NULL, NULL, '2022-02-08');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `total_bayar` int(16) NOT NULL,
  `id_penjualan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_jual` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `username` varchar(16) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `kuantitas` int(8) NOT NULL,
  `total_harga` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_jual`, `tanggal`, `username`, `id_produk`, `kuantitas`, `total_harga`) VALUES
(2, '2022-02-27', 'user', 6, 2, 172000),
(3, '2022-02-27', 'user', 4, 3, 105000),
(5, '2022-02-27', 'user', 3, 3, 195000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(64) NOT NULL,
  `harga` int(16) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `id_katalog` int(11) NOT NULL,
  `stock` int(16) NOT NULL,
  `deskripsi` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga`, `gambar`, `id_katalog`, `stock`, `deskripsi`) VALUES
(1, 'Annual Report', 50000, '1_annual_report.jpg', 1, 15, 'Menerima pesanan LAPORAN TAHUNAN perusahaan anda baik jumlah kecil maupun besar'),
(2, 'Biografi', 78000, '1_biografi.jpg', 1, 20, 'Menerima pembuatan Biografi Anda dalam jumlah besar maupun kecil'),
(3, 'Company Profile', 65000, '1_company_profile.jpg', 1, 22, 'Melayani pembuatan Company Profile baik jumlah kecil maupun besar'),
(4, 'Ebook', 35000, '1_ebook.jpg', 1, 50, 'Menerima pesanan pembuatan Ebook untuk usaha dan bisnis anda'),
(5, 'Majalah', 67000, '1_majalah.jpg', 1, 34, 'Menerima pembuatan Majalah untuk bisnis dan usaha anda'),
(6, 'Materi Presentasi', 86000, '1_materi_presentasi.jpg', 1, 17, 'Menerima pembuatan Materi Presentasi untuk promosi usaha anda'),
(7, 'Photobook', 98000, '1_photobook.jpg', 1, 56, 'Abadikan momen anda dalam photobook'),
(8, 'Portfolio', 27000, '1_portfolio.jpg', 1, 75, 'Maksimalkan kualitas portfolio anda'),
(9, 'Prospectus', 29000, '1_prospectus.jpg', 1, 76, 'merima pesanan Pembuatan Prospectus baik jumlah besar ataupun kecil'),
(14, 'Akrilik Print', 250000, '2_akrilik_print.jpg', 2, 75, 'Menerima pesanan Akrilik dalam jumlah kecil maupun besar'),
(15, 'Canvas Print', 135000, '2_canvas_print.jpg', 2, 45, 'menerima pesanan canvas'),
(16, 'Hanging Mobile', 25000, '2_hanging_mobile.jpg', 2, 35, 'menerima pesanan hanging mobile'),
(17, 'Jam Dinding', 119500, '2_jam_dinding.jpg', 2, 25, 'menerima pesanan jam dinding custom'),
(18, 'Keramik Print', 33700, '2_keramik_print.jpg', 2, 87, 'menerima pesanan keramik print untuk dinding rumah'),
(19, 'Magnet Print', 3000, '2_magnet_print.jpg', 2, 874, 'minimal order 100pcs'),
(20, 'Sticker Kaca', 98000, '2_sticker_kaca.jpg', 2, 46, 'menerima pesanan sticker kaca'),
(21, 'Wallpaper', 65000, '2_wallpaper.jpg', 2, 86, 'minimal order 1 roll'),
(22, 'Photo Print', 10000, '2_photo_print.jpg', 2, 987, 'menerima pesanan photo print'),
(23, 'Angpao General', 500, '3_angpao_general.jpg', 3, 2000, 'minimal order 100pcs'),
(24, 'Angpao Imlek', 500, '3_angpao_imlek.jpg', 3, 2000, 'minimal order 100 pcs'),
(25, 'Angpao Lebaran', 500, '3_angpao_lebaran.jpg', 3, 2000, 'minmal order 100 pcs'),
(26, 'Angpao Natal', 500, '3_angpao_natal.jpg', 3, 2000, 'minimal order 100 pcs'),
(27, 'Angpao Wedding', 500, '3_angpao_wedding.jpg', 3, 2000, 'minimal order 100 pcs'),
(28, 'Food Tray', 3500, '4_food_tray.jpg', 4, 785, 'menerima orderan kecil atau besar'),
(29, 'Cake Tag', 400, '4_cake_tag.jpg', 4, 9828, 'menerima orderan kecil atau besar'),
(30, 'Corugated Box', 4000, '4_corugated_box.jpg', 4, 276, 'menerima orderan kecil atau besar'),
(31, 'Hardbox', 3500, '4_hardbox.jpg', 4, 89, 'menerima orderan kecil atau besar'),
(32, 'Softbox', 2000, '4_softbox.jpg', 4, 298, 'menerima orderan kecil atau besar'),
(33, 'Kemasan Makanan', 3750, '4_kemasan_makanan.jpg', 4, 927, 'menerima orderan kecil atau besar'),
(34, 'Kertas Label', 1249, '4_kertas_label.jpg', 4, 288, 'menerima orderan kecil atau besar'),
(35, 'Paperbag', 4500, '4_paperbag.jpg', 4, 675, 'menerima orderan kecil atau besar'),
(36, 'Paper Bowl', 2350, '4_paper_bowl.jpg', 4, 781, 'menerima orderan kecil atau besar'),
(37, 'Papercup', 1235, '4_papercup.jpg', 4, 198, 'menerima orderan kecil atau besar'),
(38, 'Print Pita', 9875, '4_print_pita.png', 4, 681, 'menerima orderan kecil atau besar'),
(39, 'Product Tag', 245, '4_product_tag.jpg', 4, 1765, 'menerima orderan kecil atau besar'),
(40, 'Standing Pouch', 1250, '4_standing_pouch.jpg', 4, 348, 'menerima orderan kecil atau besar'),
(41, 'Sticker', 780, '4_sticker.jpg', 4, 2546, 'menerima orderan kecil atau besar'),
(42, 'Kartu Akses', 25000, '5_kartu_akses.jpg', 5, 198, 'menerima pesanan jumlah banyak atau sedikit'),
(43, 'Agenda', 35000, '5_agenda.jpg', 5, 85, 'menerima pesanan jumlah banyak atau sedikit'),
(44, 'Amplop', 200, '5_amplop.jpg', 5, 5885, 'menerima pesanan jumlah banyak atau sedikit'),
(45, 'Comment Card', 8000, '5_comment_card.jpg', 5, 91, 'menerima pesanan jumlah banyak atau sedikit'),
(46, 'Formulir', 1000, '5_formulir.jpg', 5, 188, 'menerima pesanan jumlah banyak atau sedikit'),
(47, 'Id Card', 15000, '5_id_card.jpg', 5, 571, 'menerima pesanan jumlah banyak atau sedikit'),
(48, 'Kartu Nama', 25000, '5_kartu_nama.jpg', 5, 320, 'menerima pesanan jumlah banyak atau sedikit'),
(49, 'Kop Surat', 400, '5_kop_surat.jpg', 5, 2991, 'menerima pesanan jumlah banyak atau sedikit'),
(50, 'Map Folder', 8000, '5_map_folder.jpg', 5, 267, 'menerima pesanan jumlah banyak atau sedikit'),
(51, 'Nota Ncr', 4875, '5_nota_ncr.jpg', 5, 188, 'menerima pesanan jumlah banyak atau sedikit'),
(52, 'Notebook', 7500, '5_notebook.jpg', 5, 1927, 'menerima pesanan jumlah banyak atau sedikit'),
(53, 'Notepad', 9000, '5_notepad.jpg', 5, 286, 'menerima pesanan jumlah banyak atau sedikit'),
(54, 'Sketchbook', 4500, '5_sketchbook.jpg', 5, 297, 'menerima pesanan jumlah banyak atau sedikit'),
(55, 'Booklet', 1540, '6_booklet.jpg', 6, 186, 'menerima pesanan jumlah sedikit atau banyak'),
(56, 'Brosur', 250000, '6_brosur.jpg', 6, 73, 'menerima pesanan jumlah sedikit atau banyak'),
(57, 'Flyer', 250000, '6_flyer.jpg', 6, 287, 'menerima pesanan jumlah sedikit atau banyak'),
(58, 'Katalog', 45000, '6_katalog.jpg', 6, 287, 'menerima pesanan jumlah sedikit atau banyak'),
(59, 'Coaster', 97200, '6_coaster.jpg', 6, 276, 'menerima pesanan jumlah sedikit atau banyak'),
(60, 'Kalender', 15000, '6_kalender.jpg', 6, 862, 'menerima pesanan jumlah sedikit atau banyak'),
(61, 'Kertas Kado', 1500, '6_kertas_kado.jpg', 6, 2868, 'menerima pesanan jumlah sedikit atau banyak'),
(62, 'Member Card', 15000, '6_member_card.jpg', 6, 1971, 'menerima pesanan jumlah sedikit atau banyak'),
(63, 'Menu', 10000, '6_menu.jpg', 6, 287, 'menerima pesanan jumlah sedikit atau banyak'),
(64, 'Newslatter', 4000, '6_newslatter.jpg', 6, 297, 'menerima pesanan jumlah sedikit atau banyak'),
(65, 'Table Mat', 14000, '6_table_mat.jpg', 6, 19, 'menerima pesanan jumlah sedikit atau banyak'),
(66, 'Tent Card', 2350, '6_tent_card.jpg', 6, 1721, 'menerima pesanan jumlah sedikit atau banyak'),
(67, 'Thank You Card', 500, '6_thank_you_card.jpg', 6, 2861, 'menerima pesanan jumlah sedikit atau banyak'),
(68, 'U Notebook', 34000, '6_u_notebook.jpg', 6, 28, 'menerima pesanan jumlah sedikit atau banyak'),
(69, 'Poster', 10000, '7_poster.jpg', 7, 189, 'menerima jumlah kecil maupun besar'),
(70, 'Roll Up Banner', 150000, '7_roll_up_banner.jpg', 7, 176, 'menerima jumlah kecil maupun besar'),
(71, 'Spanduk', 20000, '7_spanduk.jpg', 7, 128, 'menerima jumlah kecil maupun besar'),
(72, 'Tripod Banner', 345000, '7_tripod_banner.jpg', 7, 28, 'menerima jumlah kecil maupun besar'),
(73, 'X Banner', 90000, '7_x_banner.jpg', 7, 189, 'menerima jumlah kecil maupun besar'),
(74, 'E Money', 50000, '8_e_money.jpg', 8, 12, 'menerima pesanan jumlah kecil maupun banyak'),
(75, 'Flash Disk', 245000, '8_flash_disk.jpg', 8, 13, 'menerima pesanan jumlah kecil maupun banyak'),
(76, 'Gantungan Kunci', 5000, '8_gantungan_kunci.jpg', 8, 121, 'menerima pesanan jumlah kecil maupun banyak'),
(77, 'Gratitude Journal', 25000, '8_gratitude_journal.jpg', 8, 125, 'menerima pesanan jumlah kecil maupun banyak'),
(78, 'Kotak Kartu Nama', 14000, '8_kotak_kartu_nama.jpg', 8, 237, 'menerima pesanan jumlah kecil maupun banyak'),
(79, 'Lunggage Tag', 23000, '8_lunggage_tag.jpg', 8, 127, 'menerima pesanan jumlah kecil maupun banyak\r\n'),
(80, 'Mug', 4500, '8_mug.jpg', 8, 128, 'menerima pesanan jumlah kecil maupun banyak'),
(81, 'Agenda Gift Set', 168000, '8_agenda_gift_set.jpg', 8, 16, 'menerima pesanan jumlah kecil maupun banyak'),
(82, 'Pin Peniti', 4500, '8_pin_peniti.jpg', 8, 186, 'menerima pesanan jumlah kecil maupun banyak'),
(83, 'Power Bank', 150000, '8_power_bank.jpg', 8, 17, 'menerima pesanan jumlah kecil maupun banyak'),
(84, 'Pulpen', 3500, '8_pulpen.jpg', 8, 186, 'menerima pesanan jumlah kecil maupun banyak'),
(85, 'Tas Spunbound', 9500, '8_tas_spunbound.jpg', 8, 287, 'menerima pesanan jumlah kecil maupun banyak'),
(86, 'Tumbler', 38000, '8_tumbler.jpg', 8, 29, 'menerima pesanan jumlah kecil maupun banyak'),
(87, 'Usb Card', 65000, '8_usb_card.jpg', 8, 16, 'menerima pesanan jumlah kecil maupun banyak\r\n'),
(88, 'Apron', 35000, '9_apron.jpg', 9, 16, 'menerima pesanan jumlah banyak dan kecil'),
(89, 'Kaos', 100000, '9_kaos.jpg', 9, 16, 'menerima pesanan jumlah banyak dan kecil'),
(90, 'Polo Shirt', 150000, '9_polo_shirt.jpg', 9, 41, 'menerima pesanan jumlah banyak dan kecil'),
(91, 'Pouch', 24600, '9_pouch.jpg', 9, 61, 'menerima pesanan jumlah banyak dan kecil'),
(92, 'Print Kain', 30000, '9_print_kain.jpg', 9, 1756, 'menerima pesanan jumlah banyak dan kecil'),
(93, 'Topi', 25000, '9_topi.jpg', 9, 27, 'menerima pesanan jumlah banyak dan kecil'),
(94, 'Totebag', 17400, '9_totebag.jpg', 9, 176, 'menerima pesanan jumlah banyak dan kecil');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `katalog`
--
ALTER TABLE `katalog`
  ADD PRIMARY KEY (`id_katalog`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD KEY `fk_username` (`username`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `fk_penjualan` (`id_penjualan`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_jual`),
  ADD KEY `fk_produk` (`id_produk`),
  ADD KEY `fk_pelanggan` (`username`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `fk_gambar` (`gambar`),
  ADD KEY `fk_katalog` (`id_katalog`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `katalog`
--
ALTER TABLE `katalog`
  MODIFY `id_katalog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_jual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `fk_username` FOREIGN KEY (`username`) REFERENCES `login` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `fk_penjualan` FOREIGN KEY (`id_penjualan`) REFERENCES `penjualan` (`id_jual`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `fk_pelanggan` FOREIGN KEY (`username`) REFERENCES `login` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_produk` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `fk_katalog` FOREIGN KEY (`id_katalog`) REFERENCES `katalog` (`id_katalog`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
