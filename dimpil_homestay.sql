-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2020 at 10:07 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dimpil_homestay`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_akomodasi`
--

CREATE TABLE `tb_akomodasi` (
  `id` int(11) NOT NULL,
  `nama_kamar` varchar(120) NOT NULL,
  `keterangan` varchar(225) NOT NULL,
  `kategori` varchar(60) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(4) NOT NULL,
  `gambar_kamar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_akomodasi`
--

INSERT INTO `tb_akomodasi` (`id`, `nama_kamar`, `keterangan`, `kategori`, `harga`, `stok`, `gambar_kamar`) VALUES
(1, 'Deluxe Room 1', 'Deluxe Room for couple', 'Deluxe Room', 300000, 9, 'kamar.jpg'),
(2, 'Deluxe Room 2', 'Deluxe Room for Couple', 'Deluxe Room', 300000, 10, 'kamardua.jpg'),
(3, 'Double Room 1', 'Double Room for Family', 'Double Room', 300000, 3, 'kamarlima.jpg'),
(4, 'Double Deluxe Room 1', 'Double Deluxe Room for Couple', 'Double Deluxe Room', 350000, 10, 'kamarempat.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku_tamu`
--

CREATE TABLE `tb_buku_tamu` (
  `id_buku_tamu` int(11) NOT NULL,
  `nama_lengkap` varchar(225) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `no_hp` int(13) NOT NULL,
  `jk` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `komentar` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_galeri`
--

CREATE TABLE `tb_galeri` (
  `id_galeri` int(11) NOT NULL,
  `judul` varchar(225) NOT NULL,
  `deskripsi` varchar(225) NOT NULL,
  `tanggal` date NOT NULL,
  `gambar_galeri` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_galeri`
--

INSERT INTO `tb_galeri` (`id_galeri`, `judul`, `deskripsi`, `tanggal`, `gambar_galeri`) VALUES
(3, 'Halaman Dimpil', 'Halaman Dimpil Homestay yang terletak di depan kamar', '2020-11-01', 'halaman1.jpg'),
(4, 'Restoran', 'restoran dimpil homestay ', '2020-11-01', 'resto.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_invoice`
--

CREATE TABLE `tb_invoice` (
  `id_invoice` int(11) NOT NULL,
  `nama` varchar(56) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_invoice`
--

INSERT INTO `tb_invoice` (`id_invoice`, `nama`, `alamat`, `tgl_pesan`, `batas_bayar`) VALUES
(1, 'Indah Aristia', 'Denpasar', '2020-09-28 08:23:24', '2020-09-29 08:23:24'),
(2, 'Indah Aristia', 'Denpasar', '2020-09-28 08:24:27', '2020-09-29 08:24:27'),
(3, 'fghj', 'fvgbhn', '2020-10-12 10:36:03', '2020-10-13 10:36:03'),
(4, '', '', '2020-10-14 11:20:42', '2020-10-15 11:20:42'),
(5, 'risa', 'risayana', '2020-11-01 18:46:07', '2020-11-02 18:46:07'),
(6, 'Budiyani', 'Denpasar', '2020-11-02 15:00:22', '2020-11-03 15:00:22');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id_pesan` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `nama_kamar` varchar(50) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` int(10) NOT NULL,
  `pilihan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id_pesan`, `id_invoice`, `id`, `nama_kamar`, `jumlah`, `harga`, `pilihan`) VALUES
(1, 2, 1, 'Deluxe Room 1', 1, 300000, ''),
(2, 3, 1, 'Deluxe Room 1', 1, 300000, ''),
(3, 4, 1, 'Deluxe Room 1', 1, 300000, ''),
(4, 5, 3, 'Double Room 1', 1, 300000, ''),
(5, 6, 3, 'Double Room 1', 1, 300000, '');

--
-- Triggers `tb_pesanan`
--
DELIMITER $$
CREATE TRIGGER `pesanan_kamar` AFTER INSERT ON `tb_pesanan` FOR EACH ROW BEGIN
	UPDATE tb_akomodasi SET stok = stok-NEW.jumlah
    WHERE id = NEW.id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `username`, `password`, `role_id`) VALUES
(1, 'admin', 'admin', '123', 1),
(2, 'user', 'user', '123', 2),
(3, 'Budi', 'Budiman', '123', 2),
(5, 'indah', 'indah', '123', 2),
(6, 'Budiyani', 'Budi', '123', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_welcome`
--

CREATE TABLE `tb_welcome` (
  `id_welcome` int(11) NOT NULL,
  `keterangan` varchar(225) NOT NULL,
  `tanggal` date NOT NULL,
  `gambar_welcome` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_welcome`
--

INSERT INTO `tb_welcome` (`id_welcome`, `keterangan`, `tanggal`, `gambar_welcome`) VALUES
(1, 'Gambar Welcome', '2020-10-30', 'resto.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_akomodasi`
--
ALTER TABLE `tb_akomodasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_buku_tamu`
--
ALTER TABLE `tb_buku_tamu`
  ADD PRIMARY KEY (`id_buku_tamu`);

--
-- Indexes for table `tb_galeri`
--
ALTER TABLE `tb_galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indexes for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`id_invoice`);

--
-- Indexes for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_welcome`
--
ALTER TABLE `tb_welcome`
  ADD PRIMARY KEY (`id_welcome`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_akomodasi`
--
ALTER TABLE `tb_akomodasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_buku_tamu`
--
ALTER TABLE `tb_buku_tamu`
  MODIFY `id_buku_tamu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_galeri`
--
ALTER TABLE `tb_galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_welcome`
--
ALTER TABLE `tb_welcome`
  MODIFY `id_welcome` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
