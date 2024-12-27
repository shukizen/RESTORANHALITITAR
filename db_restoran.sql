-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2024 at 09:02 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_restoran`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `tambah_stok_bahan` (IN `id_stok` INT, IN `tambahan` INT)   BEGIN
    UPDATE stok_bahan
    SET jumlah_stok = jumlah_stok + tambahan
    WHERE stok_id = id_stok;
END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `hitung_total_pendapatan` (`tgl_awal` DATE, `tgl_akhir` DATE) RETURNS DECIMAL(10,2) DETERMINISTIC BEGIN
	DECLARE total DECIMAL(10,2);
    SELECT SUM(total_pendapatan)
    INTO total
    FROM tabel_pendapatan
    WHERE tanggal BETWEEN tgl_awal AND tgl_akhir;
    RETURN total;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `detail_laporan_penjualan`
--

CREATE TABLE `detail_laporan_penjualan` (
  `laporan_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `nama_menu` varchar(255) NOT NULL,
  `jumlah_terjual` int(11) NOT NULL,
  `total_pendapatan` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_laporan_penjualan`
--

INSERT INTO `detail_laporan_penjualan` (`laporan_id`, `menu_id`, `nama_menu`, `jumlah_terjual`, `total_pendapatan`) VALUES
(1, 1, 'Nasi Goreng', 2, 50000.00),
(1, 2, 'Ayam Bakar', 1, 30000.00),
(1, 3, 'Sate Ayam', 3, 60000.00);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemesanan`
--

CREATE TABLE `detail_pemesanan` (
  `detail_id` int(11) NOT NULL,
  `pemesanan_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `kuantitas` int(11) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_pemesanan`
--

INSERT INTO `detail_pemesanan` (`detail_id`, `pemesanan_id`, `menu_id`, `kuantitas`, `subtotal`) VALUES
(1, 1, 1, 2, 50000.00),
(2, 2, 2, 1, 30000.00),
(3, 2, 3, 2, 40000.00);

--
-- Triggers `detail_pemesanan`
--
DELIMITER $$
CREATE TRIGGER `kurangi_stok` AFTER INSERT ON `detail_pemesanan` FOR EACH ROW BEGIN
    UPDATE menu
    SET stok = stok - NEW.kuantitas
    WHERE menu_id = NEW.menu_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `laporan_penjualan`
--

CREATE TABLE `laporan_penjualan` (
  `laporan_id` int(11) NOT NULL,
  `tanggal_laporan` date NOT NULL,
  `total_pesanan` int(11) NOT NULL,
  `total_menu_terjual` int(11) NOT NULL,
  `total_pendapatan` decimal(15,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laporan_penjualan`
--

INSERT INTO `laporan_penjualan` (`laporan_id`, `tanggal_laporan`, `total_pesanan`, `total_menu_terjual`, `total_pendapatan`, `created_at`) VALUES
(1, '2024-12-08', 3, 6, 120000.00, '2024-12-08 16:19:36');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `nama_menu` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga` decimal(10,2) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `nama_menu`, `deskripsi`, `harga`, `gambar`, `created_at`) VALUES
(1, 'Nasi Goreng', 'Nasi goreng dengan ayam dan sayuran', 25000.00, 'nasi_goreng.jpg', '2024-12-08 16:18:17'),
(2, 'Ayam Bakar', 'Ayam bakar dengan sambal pedas', 30000.00, 'ayam_bakar.jpg', '2024-12-08 16:18:17'),
(3, 'Sate Ayam', 'Sate ayam dengan bumbu kacang', 20000.00, 'sate_ayam.jpg', '2024-12-08 16:18:17');

-- --------------------------------------------------------

--
-- Table structure for table `menu_bahan`
--

CREATE TABLE `menu_bahan` (
  `menu_id` int(11) NOT NULL,
  `stok_id` int(11) NOT NULL,
  `jumlah_bahan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu_bahan`
--

INSERT INTO `menu_bahan` (`menu_id`, `stok_id`, `jumlah_bahan`) VALUES
(1, 1, 2),
(1, 2, 1),
(1, 3, 1),
(2, 2, 2),
(2, 3, 1),
(3, 2, 1),
(3, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `pemesanan_id` int(11) NOT NULL,
  `nama_pelanggan` varchar(255) DEFAULT NULL,
  `tanggal_pemesanan` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('menunggu','lunas','batal') DEFAULT 'menunggu',
  `kasir_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`pemesanan_id`, `nama_pelanggan`, `tanggal_pemesanan`, `status`, `kasir_id`) VALUES
(1, 'Rafael Struick', '2024-12-08 16:19:04', 'menunggu', 2),
(2, 'Kevin Diks', '2024-12-08 16:19:04', 'menunggu', 3);

-- --------------------------------------------------------

--
-- Table structure for table `rekap_kasir`
--

CREATE TABLE `rekap_kasir` (
  `laporan_id` int(11) NOT NULL,
  `kasir_id` int(11) NOT NULL,
  `nama_kasir` varchar(255) NOT NULL,
  `total_pesanan` int(11) NOT NULL,
  `total_penjualan` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rekap_kasir`
--

INSERT INTO `rekap_kasir` (`laporan_id`, `kasir_id`, `nama_kasir`, `total_pesanan`, `total_penjualan`) VALUES
(1, 2, 'Kasir Satu', 2, 80000.00),
(1, 3, 'Kasir Dua', 1, 40000.00);

-- --------------------------------------------------------

--
-- Table structure for table `stok_bahan`
--

CREATE TABLE `stok_bahan` (
  `stok_id` int(11) NOT NULL,
  `nama_bahan` varchar(255) NOT NULL,
  `stok_awal` int(11) NOT NULL,
  `stok_terpakai` int(11) DEFAULT 0,
  `stok_tersedia` int(11) GENERATED ALWAYS AS (`stok_awal` - `stok_terpakai`) STORED,
  `harga_bahan` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stok_bahan`
--

INSERT INTO `stok_bahan` (`stok_id`, `nama_bahan`, `stok_awal`, `stok_terpakai`, `harga_bahan`, `created_at`) VALUES
(1, 'Nasi', 100, 0, 5000.00, '2024-12-08 16:18:29'),
(2, 'Ayam', 50, 0, 15000.00, '2024-12-08 16:18:29'),
(3, 'Sambal', 200, 0, 2000.00, '2024-12-08 16:18:29'),
(4, 'Kacang', 150, 0, 3000.00, '2024-12-08 16:18:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','kasir') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `nama_user`, `username`, `password`, `role`, `created_at`) VALUES
(1, 'Admin Restoran', 'admin', 'adminpassword', 'admin', '2024-12-08 16:18:11'),
(2, 'Kasir Satu', 'kasir1', 'kasirpassword1', 'kasir', '2024-12-08 16:18:11'),
(3, 'Kasir Dua', 'kasir2', 'kasirpassword2', 'kasir', '2024-12-08 16:18:11');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_transaksi`
-- (See below for the actual view)
--
CREATE TABLE `view_transaksi` (
`pemesanan_id` int(11)
,`nama_pelanggan` varchar(255)
,`menu_id` int(11)
,`nama_menu` varchar(255)
,`kuantitas` int(11)
,`subtotal` decimal(10,2)
,`status` enum('menunggu','lunas','batal')
);

-- --------------------------------------------------------

--
-- Structure for view `view_transaksi`
--
DROP TABLE IF EXISTS `view_transaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_transaksi`  AS SELECT `p`.`pemesanan_id` AS `pemesanan_id`, `p`.`nama_pelanggan` AS `nama_pelanggan`, `dp`.`menu_id` AS `menu_id`, `m`.`nama_menu` AS `nama_menu`, `dp`.`kuantitas` AS `kuantitas`, `dp`.`subtotal` AS `subtotal`, `p`.`status` AS `status` FROM ((`pemesanan` `p` join `detail_pemesanan` `dp` on(`p`.`pemesanan_id` = `dp`.`pemesanan_id`)) join `menu` `m` on(`dp`.`menu_id` = `m`.`menu_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_laporan_penjualan`
--
ALTER TABLE `detail_laporan_penjualan`
  ADD PRIMARY KEY (`laporan_id`,`menu_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `pemesanan_id` (`pemesanan_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `laporan_penjualan`
--
ALTER TABLE `laporan_penjualan`
  ADD PRIMARY KEY (`laporan_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `menu_bahan`
--
ALTER TABLE `menu_bahan`
  ADD PRIMARY KEY (`menu_id`,`stok_id`),
  ADD KEY `stok_id` (`stok_id`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`pemesanan_id`),
  ADD KEY `kasir_id` (`kasir_id`);

--
-- Indexes for table `rekap_kasir`
--
ALTER TABLE `rekap_kasir`
  ADD PRIMARY KEY (`laporan_id`,`kasir_id`),
  ADD KEY `kasir_id` (`kasir_id`);

--
-- Indexes for table `stok_bahan`
--
ALTER TABLE `stok_bahan`
  ADD PRIMARY KEY (`stok_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `laporan_penjualan`
--
ALTER TABLE `laporan_penjualan`
  MODIFY `laporan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `pemesanan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stok_bahan`
--
ALTER TABLE `stok_bahan`
  MODIFY `stok_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_laporan_penjualan`
--
ALTER TABLE `detail_laporan_penjualan`
  ADD CONSTRAINT `detail_laporan_penjualan_ibfk_1` FOREIGN KEY (`laporan_id`) REFERENCES `laporan_penjualan` (`laporan_id`),
  ADD CONSTRAINT `detail_laporan_penjualan_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`menu_id`);

--
-- Constraints for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD CONSTRAINT `detail_pemesanan_ibfk_1` FOREIGN KEY (`pemesanan_id`) REFERENCES `pemesanan` (`pemesanan_id`),
  ADD CONSTRAINT `detail_pemesanan_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`menu_id`);

--
-- Constraints for table `menu_bahan`
--
ALTER TABLE `menu_bahan`
  ADD CONSTRAINT `menu_bahan_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`menu_id`),
  ADD CONSTRAINT `menu_bahan_ibfk_2` FOREIGN KEY (`stok_id`) REFERENCES `stok_bahan` (`stok_id`);

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`kasir_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `rekap_kasir`
--
ALTER TABLE `rekap_kasir`
  ADD CONSTRAINT `rekap_kasir_ibfk_1` FOREIGN KEY (`laporan_id`) REFERENCES `laporan_penjualan` (`laporan_id`),
  ADD CONSTRAINT `rekap_kasir_ibfk_2` FOREIGN KEY (`kasir_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
