-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2024 at 09:02 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbperpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_peminjaman`
--

CREATE TABLE `tbl_peminjaman` (
  `nama_peminjam` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `lama_pinjam` varchar(15) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_peminjaman`
--

INSERT INTO `tbl_peminjaman` (`nama_peminjam`, `jenis_kelamin`, `alamat`, `no_hp`, `judul_buku`, `tanggal_pinjam`, `tanggal_kembali`, `lama_pinjam`, `keterangan`, `id`) VALUES
('asep', 'Laki-Laki', 'jl. skakskd gg. asdasda', '08120380128', 'aspirant', '2024-09-10', '2024-09-14', '4', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `username` varchar(25) NOT NULL,
  `paswd` varchar(50) NOT NULL,
  `email` varchar(25) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `level` int(5) NOT NULL,
  `ket` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`username`, `paswd`, `email`, `nama`, `level`, `ket`) VALUES
('admin', 'admin', 'admin.smpn9dumai@gmail.co', 'edy', 1, 'ADMIN'),
('mythicomyia', 'ADMIN', 'fitrahuljumas@gmail.com', 'FITRAHUL JUMA SAWIKA', 0, 'ANGGOTA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
