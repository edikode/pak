-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2019 at 11:35 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_pak`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode`, `nama`, `satuan`, `harga`) VALUES
('14', 'asdad', 'Pcs', 324234),
('15', 'sfdf', 'Kubik', 234234),
('17', 'asdfdsf', 'Kubik', 1231),
('18', 'fdsfsd', 'Kubik', 324234),
('2', 'asdfdsf', 'Kubik', 1231),
('3', 'fdsfsd', 'Kubik', 324234),
('4', 'asdad', 'Pcs', 324234),
('5', 'sfdf', 'Kubik', 234234),
('6', 'sdf', 'Pcs', 1231),
('7', 'asdfdsf', 'Kubik', 1231),
('8', 'fdsfsd', 'Kubik', 324234),
('9', 'asdad', 'Pcs', 324234);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL,
  `kode` varchar(45) DEFAULT NULL,
  `kegiatan` varchar(255) DEFAULT NULL,
  `satuan` varchar(45) DEFAULT NULL,
  `angka_kredit` double DEFAULT NULL,
  `pelaksana` varchar(45) DEFAULT NULL,
  `unsur_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `kode`, `kegiatan`, `satuan`, `angka_kredit`, `pelaksana`, `unsur_id`) VALUES
(1, '01', 'Doktor (S-3)', 'Ijazah', 200, 'Semua Jenjang', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL,
  `tanggal` int(11) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `kegiatan_id` int(11) DEFAULT NULL,
  `rekap_nilai_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `nip` varchar(45) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `tmp_lahir` varchar(100) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `agama` varchar(45) DEFAULT NULL,
  `telepon` varchar(45) DEFAULT NULL,
  `alamat` text,
  `gambar` varchar(45) DEFAULT NULL,
  `jabatan` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nip`, `nama`, `tmp_lahir`, `tgl_lahir`, `jenis_kelamin`, `status`, `agama`, `telepon`, `alamat`, `gambar`, `jabatan`) VALUES
(2, '12345', 'Roin', 'Banyuwangi', '1997-12-12', 'P', 'BK', 'Islam', '081123456789', 'Purwoharjo - Banyuwangi', NULL, 'Pegawai'),
(5, '12344', 'Siti', 'Banyuwangi', '1997-12-12', 'P', 'BK', 'Islam', '08112345678', 'Purwoharjo - Banyuwangi', NULL, 'Bendahara');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftar`
--

CREATE TABLE `pendaftar` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `nip` varchar(45) DEFAULT NULL,
  `nuptk` varchar(45) DEFAULT NULL,
  `karpeg` varchar(45) DEFAULT NULL,
  `tmp_lahir` varchar(45) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(45) DEFAULT NULL,
  `agama` varchar(45) DEFAULT NULL,
  `status_guru` varchar(45) DEFAULT NULL,
  `tugas_mengajar` varchar(45) DEFAULT NULL,
  `unit_kerja` varchar(45) DEFAULT NULL,
  `pangkat_guru` varchar(45) DEFAULT NULL,
  `gol_ruang` varchar(45) DEFAULT NULL,
  `jabatan_fungsional` varchar(45) DEFAULT NULL,
  `alamat_rumah` text,
  `alamat_sekolah` text,
  `gambar` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `telepon` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rekap_nilai`
--

CREATE TABLE `rekap_nilai` (
  `id` int(11) NOT NULL,
  `nilai_total` double DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `pendaftar_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `nama` varchar(126) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `nama`) VALUES
(1, 'Admin'),
(2, 'Kepala Dinas'),
(3, 'Penilai');

-- --------------------------------------------------------

--
-- Table structure for table `unsur`
--

CREATE TABLE `unsur` (
  `id` int(11) NOT NULL,
  `unsur` varchar(255) DEFAULT NULL,
  `sub_unsur` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unsur`
--

INSERT INTO `unsur` (`id`, `unsur`, `sub_unsur`) VALUES
(1, 'PENDIDIKAN', 'Mengikuti pendidikan dan memperoleh gelar/ijazah/akta'),
(2, 'PENDIDIKAN', 'Mengikuti pelatihan prajabatan'),
(3, 'PEMBELAJARAN/ BIMBINGAN DAN TUGAS TERTENTU', 'Melaksanakan proses pembelajaran'),
(4, 'PEMBELAJARAN/ BIMBINGAN DAN TUGAS TERTENTU', 'Melaksanakan proses bimbingan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `pendaftar_id` int(50) DEFAULT NULL,
  `pegawai_id` int(11) DEFAULT NULL,
  `username` varchar(126) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(2) NOT NULL,
  `is_active` int(1) NOT NULL,
  `gambar` varchar(256) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `pendaftar_id`, `pegawai_id`, `username`, `password`, `role_id`, `is_active`, `gambar`, `date_created`) VALUES
(4, NULL, 2, 'siti', '$2y$10$WKw3jo4OKTuzTHTHzAhrle0fkec73YN5wG7/5UiZN4iWCnXPmn.Bm', 1, 1, 'avatar.jpg', 1552637403),
(8, 1, NULL, 'baru', '$2y$10$rVPJkcCKUTIwegilgzdjGuHqNYoR5HfRndrFWZe/9oVccBh.DDfOa', 1, 1, 'avatar.jpg', 1552987762);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_nilai_kegiatan` (`kegiatan_id`),
  ADD KEY `fk_nilai_rekap_nilai1` (`rekap_nilai_id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekap_nilai`
--
ALTER TABLE `rekap_nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_rekap_nilai_pendaftar1` (`pendaftar_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unsur`
--
ALTER TABLE `unsur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pendaftar`
--
ALTER TABLE `pendaftar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rekap_nilai`
--
ALTER TABLE `rekap_nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `unsur`
--
ALTER TABLE `unsur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `fk_nilai_kegiatan` FOREIGN KEY (`kegiatan_id`) REFERENCES `kegiatan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_nilai_rekap_nilai1` FOREIGN KEY (`rekap_nilai_id`) REFERENCES `rekap_nilai` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `rekap_nilai`
--
ALTER TABLE `rekap_nilai`
  ADD CONSTRAINT `fk_rekap_nilai_pendaftar1` FOREIGN KEY (`pendaftar_id`) REFERENCES `pendaftar` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
