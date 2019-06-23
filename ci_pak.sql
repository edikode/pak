-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2019 at 02:30 PM
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
-- Database: `ci_pak2`
--

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `pangkat` varchar(100) NOT NULL,
  `gol_ruang` varchar(50) NOT NULL,
  `komulatif_minimal` int(11) NOT NULL,
  `perjenjang` int(11) NOT NULL,
  `ak_pbtt` int(11) NOT NULL,
  `akpkb` int(11) NOT NULL,
  `akp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `nama`, `pangkat`, `gol_ruang`, `komulatif_minimal`, `perjenjang`, `ak_pbtt`, `akpkb`, `akp`) VALUES
(1, 'Guru Pertama', 'Penata Muda', 'III/a', 100, 50, 42, 3, 5),
(2, 'Guru Pertama', 'Penata Muda Tingkat 1', 'III/b', 150, 50, 38, 7, 5),
(3, 'Guru Muda', 'Penata', 'III/c', 200, 100, 81, 9, 10),
(4, 'Guru Muda', 'Penata Tingkat 1', 'III/d', 300, 100, 78, 12, 10),
(5, 'Guru Madya', 'Pembina', 'IV/a', 400, 150, 119, 16, 15),
(6, 'Guru Madya', 'Pembina Tingkat 1', 'IV/b', 550, 150, 119, 16, 15),
(7, 'Guru Madya', 'Pembina Utama Muda', 'IV/c', 700, 150, 116, 19, 15),
(8, 'Guru Utama', 'Pembina Utama Madya', 'IV/d', 850, 200, 155, 25, 20),
(9, 'Guru Utama', 'Pembina Utama', 'IV/e', 1050, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan_fungsional`
--

CREATE TABLE `jabatan_fungsional` (
  `id` int(11) NOT NULL,
  `tugas` varchar(200) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `jml_kompetensi` int(11) NOT NULL,
  `nilai_kompetensi_maks` int(11) NOT NULL,
  `nilai_pk_maks` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `kegiatan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan_fungsional`
--

INSERT INTO `jabatan_fungsional` (`id`, `tugas`, `jenis`, `jml_kompetensi`, `nilai_kompetensi_maks`, `nilai_pk_maks`, `keterangan`, `kegiatan_id`) VALUES
(1, 'Kepala Sekolah', 'ttmj', 6, 4, 24, 'Tugas tambahan mengurangi jam', 7),
(2, 'Wakil Kepala Sekolah', 'ttmj', 5, 4, 20, 'Tugas tambahan mengurangi jam', 8),
(3, 'Ka. Program Keahlian', 'ttmj', 8, 4, 32, 'Tugas tambahan mengurangi jam', 9),
(4, 'Ka. Perpustakaan', 'ttmj', 10, 4, 40, 'Tugas tambahan mengurangi jam', 10),
(5, 'Ka. Lab/Bengkel/UP', 'ttmj', 7, 4, 28, 'Tugas tambahan mengurangi jam', 11),
(6, 'Menjadi Pembimbing Khusus pada satuan pendidikan yang menyelenggarakan pendidikan inklusi, pendidikan terpadu', 'ttmj', 0, 0, 0, 'Tugas tambahan mengurangi jam (nilai tidak boleh kosong)', 12),
(7, 'Wali Kelas', 'tttmj', 0, 0, 5, 'Tugas tambahan tidak mengurangi jam x 5%', 13),
(8, 'Menyusun Kurikulum', 'tttmj', 0, 0, 5, 'Tugas tambahan tidak mengurangi jam x 5%', 14),
(9, 'Membimbing Guru Pemula dalam Program diskusi', 'tttmj', 0, 0, 5, 'Tugas tambahan tidak mengurangi jam x 5%', 17),
(10, 'Membimbing Siswa dalam kegiatan ekskul', 'tttmj', 0, 0, 5, 'Tugas tambahan tidak mengurangi jam x 5%', 18),
(11, 'Menjadi Pengawas Penilaian dan evaluasi', 'pkdt', 0, 0, 2, 'Penugasan kurang dari 1 tahun x 2%', 15),
(12, 'Pembimbing pada penyusunan publikasi ilmiah dan karya inovatif', 'pkdt', 0, 0, 2, 'Penugasan kurang dari 1 tahun x 2%', 19),
(13, 'Pembimbing Pada kelas yang menjadi tanggung jawabnya (khusus guru kelas)', 'pkdt', 0, 0, 2, 'Penugasan kurang dari 1 tahun x 2%', 20),
(14, 'Guru Mata Pelajaran / Guru kelas', 'pb', 14, 4, 56, 'Pembelajaran / bimbingan', 5),
(15, 'Guru Bimbingan', 'pb', 17, 4, 68, 'Pembelajaran / bimbingan', 6);

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
(1, '01', 'Doktor (S-3)', 'Ijazah', 200, 'Semua Jenjang', 1),
(2, '02', 'Magister (S-2)', 'Ijazah', 150, 'Semua Jenjang', 1),
(3, '03', 'Sarjana (S-1) / Diploma IV', 'Ijazah', 100, 'Semua Jenjang', 1),
(4, '04', 'Pelatihan prajabatan fungsional bagi Guru Calon Pegawai Negeri Sipil / program induksi', 'STTPP', 3, 'Semua Jenjang', 2),
(5, '05', 'Merencanakan dan melaksanakan pembelajaran, mengevaluasi dan menilai hasil pembelajaran, menganalisis hasil pembelajaran, melaksanakan tindak lanjut hasil', 'Laporan Penilaian Kinerja', 0, 'Semua Jenjang', 3),
(6, '06', 'Merencanakan dan melaksanakan pembimbingan, mengevaluasi dan menilai hasil pembimbingan, menganalisis hasil pembimbingan, melaksanakan tindak lanjut hasil pembimbingan', 'Laporan Penilaian Kinerja', 0, 'Semua Jenjang', 4),
(7, '07', 'Menjadi Kepala Sekolah/Madrasah per tahun', 'Laporan Penilaian Kinerja', 0, 'Semua Jenjang', 5),
(8, '08', 'Menjadi Wakil Kepala Sekolah/Madrasah per tahun', 'Laporan Penilaian Kinerja', 0, 'Semua Jenjang', 5),
(9, '09', 'Menjadi ketua program keahlian/program studi atau yang sejenisnya', 'Laporan Penilaian Kinerja', 0, 'Semua Jenjang', 5),
(10, '10', 'Menjadi kepala perpustakaan', 'Laporan Penilaian Kinerja', 0, 'Semua Jenjang', 5),
(11, '11', 'Menjadi kepala laboratorium, bengkel, unit produksi atau yang sejenisnya', 'Laporan Penilaian Kinerja', 0, 'Semua Jenjang', 5),
(12, '12', 'Menjadi pembimbing khusus pada satuan pendidikan yang menyelenggarakan pendidikan inklusi, pendidikan terpadu atau yang sejenisnya.', 'Laporan Penilaian Kinerja', 0, 'Semua Jenjang', 5),
(13, '13', 'Menjadi wali kelas', 'Laporan Penilaian Kinerja', 0, 'Semua Jenjang', 5),
(14, '14', 'Menyusun kurikulum pada satuan pendidikannya', 'Laporan Penilaian Kinerja', 0, 'Semua Jenjang', 5),
(15, '15', 'Menjadi pengawas penilaian dan evaluasi terhadap proses dan hasil belajar.', 'Laporan Penilaian Kinerja', 0, 'Semua Jenjang', 5),
(17, '15a', 'Membimbing guru pemula dalam program induksi', 'Laporan Penilaian Kinerja', 0, 'Semua Jenjang', 5),
(18, '16', 'Membimbing siswa dalam kegiatan ekstrakurikuler', 'Laporan Penilaian Kinerja', 0, 'Semua Jenjang', 5),
(19, '17', 'Menjadi pembimbing pada penyusunan publikasi ilmiah dan karya inovatif', 'Laporan Penilaian Kinerja', 0, 'Semua Jenjang', 5),
(20, '18', 'Melaksanakan pembimbingan pada kelas yang menjadi tanggungjawabnya (khusus Guru Kelas)', 'Laporan Penilaian Kinerja', 0, 'Semua Jenjang', 5),
(21, '20', 'Mengikuti diklat fungsional:  a. Lamanya lebih dari 960 jam', '1. Surat tugas 2. Laporan deskripsi hasil pel', 15, 'Semua Jenjang', 6),
(22, '21', 'Mengikuti diklat fungsional: b. Lamanya antara 641 s.d 960 jam', '1. Surat tugas 2. Laporan deskripsi hasil pel', 9, 'Semua Jenjang', 6),
(23, '22', 'Mengikuti diklat fungsional: c. Lamanya antara 481 s.d 640 jam', '1. Surat tugas 2. Laporan deskripsi hasil pel', 6, 'Semua Jenjang', 6),
(24, '23', 'Mengikuti diklat fungsional: d. Lamanya antara 181 s.d 480 jam', '1. Surat tugas 2. Laporan deskripsi hasil pel', 3, 'Semua Jenjang', 6),
(25, '24', 'Mengikuti diklat fungsional: e. Lamanya antara 81 s.d 180 jam', '1. Surat tugas 2. Laporan deskripsi hasil pel', 2, 'Semua Jenjang', 6),
(26, '25', 'Mengikuti diklat fungsional: f. Lamanya antara 30 s.d 80 jam', '1. Surat tugas 2. Laporan deskripsi hasil pel', 1, 'Semua Jenjang', 6),
(27, '26', 'Kegiatan kolektif guru yang meningkatkan kompetensi dan/atau keprofesian guru : a. Lokakarya atau kegiatan bersama (seperti kelompok kerja guru) untuk penyusunan perangkat kurikulum dan atau pembelajaran', 'Surat keterangan dan laporan per kegiatan', 0.15, 'Semua Jenjang', 6),
(28, '27', 'Kegiatan kolektif guru yang meningkatkan kompetensi dan/atau keprofesian guru : b. keikutsertaan pada kegiatan ilmiah (seminar, kologium dan diskusi panel)\r\n1) Menjadi pembahas pada kegiatan ilmiah\r\ndan diskusi panel)', 'Surat keterangan dan laporan per kegiatan', 0.2, 'Semua Jenjang', 6),
(29, '28', 'Kegiatan kolektif guru yang meningkatkan kompetensi dan/atau keprofesian guru : b. keikutsertaan pada kegiatan ilmiah (seminar, kologium dan diskusi panel)\r\n2) Menjadi peserta pada kegiatan ilmiah', 'Surat keterangan dan laporan per kegiatan', 0.1, 'Semua Jenjang', 6),
(30, '29', 'Kegiatan kolektif guru yang meningkatkan kompetensi dan/atau keprofesian guru : c. Kegiatan kolektif lainnya yang sesuai dengan tugas dan kewajiban guru', 'Surat keterangan dan laporan per kegiatan', 0.1, 'Semua Jenjang', 6),
(31, '30', 'Presentasi pada forum ilmiah : a. Menjadi pemrasaran/nara sumber pada seminar atau lokakarya ilmiah', 'Surat keterangan dan makalah pemrasaran', 0.2, 'Semua Jenjang', 7),
(32, '31', 'Presentasi pada forum ilmiah : b. Menjadi pemrasaran/nara sumber pada koloqium atau diskusi ilmiah', 'Surat keterangan dan makalah pemrasaran', 0.2, 'Semua Jenjang', 7),
(33, '32', 'Membuat karya tulis berupa laporan hasil penelitian pada bidang pendidikan di sekolahnya, diterbitkan/dipublikasikan dalam bentuk buku ber ISBN dan diedarkan secara nasional atau telah lulus dari penilaian BNSP', 'Buku', 4, 'Semua Jenjang', 7),
(34, '33', 'Membuat karya tulis berupa laporan hasil penelitian pada bidang pendidikan di sekolahnya, diterbitkan/dipublikasikan dalam majalah/jurnal ilmiah tingkat nasional yang terakreditasi.', 'Karya tulis dalam majalah / jurnal ilmiah', 3, 'Semua Jenjang', 7),
(35, '34', 'Membuat karya tulis berupa laporan hasil penelitian pada bidang pendidikan di sekolahnya, diterbitkan/dipublikasikan dalam majalah/jurnal ilmiah tingkat provinsi.', 'Karya tulis dalam majalah / jurnal ilmiah', 2, 'Semua Jenjang', 7),
(36, '35', 'Membuat karya tulis berupa laporan hasil penelitian pada bidang pendidikan di sekolahnya, diterbitkan/dipublikasikan dalam majalah ilmiah tingkat kabupaten/ kota.', 'Karya tulis dalam majalah / jurnal ilmiah', 1, 'Semua Jenjang', 7),
(37, '36', 'Membuat karya tulis berupa laporan hasil penelitian pada bidang pendidikan di sekolahnya, diseminarkan di sekolahnya, disimpan di perpustakaan.', 'Laporan', 4, 'Semua Jenjang', 7),
(38, '37', 'Membuat makalah berupa tinjauan ilmiah dalam bidang pendidikan formal dan pembelajaran pada satuan pendidikannya, tidak diterbitkan, disimpan di perpustakaan.', 'Makalah', 2, 'Semua Jenjang', 7),
(39, '38', 'Membuat Artikel Ilmiah Populer di bidang pendidikan formal dan pembelajaran pada satuan pendidikannya dimuat di media masa tingkat nasional', 'Artikel Ilmiah', 2, 'Semua Jenjang', 7),
(40, '39', 'Membuat Artikel Ilmiah Populer di bidang pendidikan formal dan pembelajaran pada satuan pendidikannya dimuat di media masa tingkat provinsi (koran daerah).', 'Artikel Ilmiah', 1.5, 'Semua Jenjang', 7),
(41, '40', 'Membuat Artikel Ilmiah dalam bidang pendidikan formal dan pembelajaran pada satuan pendidikannya dan dimuat di jurnal tingkat nasional yang terakreditasi', 'Artikel Ilmiah', 2, 'Semua Jenjang', 7),
(42, '41', 'Membuat Artikel Ilmiah dalam bidang pendidikan formal dan pembelajaran pada satuan pendidikannya dan dimuat di jurnal tingkat nasional yang tidak terakreditasi/tingkat propvinsi.', 'Artikel Ilmiah', 1.5, 'Semua Jenjang', 7),
(43, '42', 'Membuat Artikel Ilmiah dalam bidang pendidikan formal dan pembelajaran pada satuan pendidikannya dan dimuat di jurnal tingkat lokal (kabupaten/kota/ sekolah/madrasah dstnya).', 'Artikel Ilmiah', 1, 'Semua Jenjang', 7),
(44, '43', 'Buku pelajaran yang lolos penilaian oleh BSNP', 'Buku', 6, 'Semua Jenjang', 7),
(45, '44', 'Buku pelajaran yang dicetak oleh penerbit dan ber\r\nISBN', 'Buku', 3, 'Semua Jenjang', 7),
(46, '45', 'Buku pelajaran dicetak oleh penerbit tetapi belum\r\nber-ISBN.', 'Buku', 1, 'Semua Jenjang', 7),
(47, '46', 'Membuat modul/diktat pembelajaran per semester: 1. Digunakan di tingkat Provinsi dengan pengesahan dari Dinas Pendidikan Provinsi.', 'Modul /diktat', 1.5, 'Semua Jenjang', 7),
(48, '47', 'Membuat modul/diktat pembelajaran per semester: 2. Digunakan di tingkat kota/kabupaten dengan pengesahan dari Dinas Pendidikan Kota/Kabupaten.', 'Modul / diktat', 1, 'Semua Jenjang', 7),
(49, '48', 'Membuat modul/diktat pembelajaran per semester: 3. Digunakan di tingkat sekolah/madrasah setempat', 'Modul / diktat', 0.5, 'Semua Jenjang', 7),
(50, '49', 'Buku dalam bidang pendidikan dicetak oleh penerbit dan ber-ISBN.', 'Buku', 3, 'Semua Jenjang', 7),
(51, '50', 'Buku dalam bidang pendidikan dicetak oleh penerbit tetapi belum ber-ISBN.', 'Buku', 1.5, 'Semua Jenjang', 7),
(52, '51', 'Membuat karya hasil terjemahan yang dinyatakan oleh kepala sekolah/madrasah tiap karya', 'Karya hasil terjemahan', 1, 'Semua Jenjang', 7),
(53, '52', 'Membuat buku pedoman guru', 'Buku', 1.5, 'Semua Jenjang', 7),
(54, '53', 'Menemukan teknologi tepatguna: a. Kategori Kompleks', 'Hasil Karya', 4, 'Semua Jenjang', 8),
(55, '54', 'Menemukan teknologi tepatguna: b. Kategori Sederhana', 'Hasil Karya', 2, 'Semua Jenjang', 8),
(56, '55', 'Menemukan / menciptakan karya seni: a. Kategori Kompleks', 'Hasil Karya', 4, 'Semua Jenjang', 8),
(57, '56', 'Menemukan / menciptakan karya seni: b. Kategori Sederhana', 'Hasil Karya', 2, 'Semua Jenjang', 8),
(58, '57', 'Membuat alat pelajaran: 1. Kategori kompleks', 'Alat pelajaran', 2, 'Semua Jenjang', 8),
(59, '58', 'Membuat alat pelajaran: 2. Kategori sederhana', 'Alat pelajaran', 1, 'Semua Jenjang', 8),
(60, '59', 'Membuat alat peraga: 1. Kategori kompleks', 'Alat peraga', 2, 'Semua Jenjang', 8),
(61, '60', 'Membuat alat peraga: 2. Kategori sederhana', 'Alat peraga', 1, 'Semua Jenjang', 8),
(62, '61', 'Membuat alat praktikum: 1. Kategori kompleks', 'Alat Praktik', 4, 'Semua Jenjang', 8),
(63, '62', 'Membuat alat praktikum: 2. Kategori sederhana', 'Alat Praktik', 2, 'Semua Jenjang', 8),
(64, '63', 'Mengikuti Kegiatan Penyusunan Standar/ Pedoman/ Soal dan sejenisnya pada tingkat nasional.', 'SK', 1, 'Semua Jenjang', 8),
(65, '64', 'Mengikuti Kegiatan Penyusunan Standar/ Pedoman/ Soal dan sejenisnya pada tingkat provinsi.', 'SK', 1, 'Semua Jenjang', 8),
(66, '65', 'Doktor (S-3)', 'Ijazah', 15, 'Semua Jenjang', 9),
(67, '66', 'Magister (S-2)', 'Ijazah', 10, 'Semua Jenjang', 9),
(68, '67', 'Sarjana (S-1) / Diploma IV', 'Ijazah', 5, 'Semua Jenjang', 9),
(69, '68', 'Membimbing siswa dalam praktik kerja nyata / praktik industri / ekstrakurikuler dan yang sejenisnya', 'Laporan', 0.17, 'Semua Jenjang', 10),
(70, '69', 'Sebagai pengawas ujian penilaian dan evaluasi terhadap proses dan hasil belajar tingkat : 1. Sekolah', 'SK', 0.08, 'Semua Jenjang', 10),
(71, '70', 'Sebagai pengawas ujian penilaian dan evaluasi terhadap proses dan hasil belajar tingkat : 2. Nasional', 'SK', 0.08, 'Semua Jenjang', 10),
(72, '71', 'Menjadi anggota organisasi profesi, sebagai: 1. Pengurus aktif', 'SK', 1, 'Semua Jenjang', 10),
(73, '72', 'Menjadi anggota organisasi profesi, sebagai: 2. Anggota aktif', 'SK', 0.75, 'Semua Jenjang', 10),
(74, '73', 'Menjadi anggota kegiatan kepramukaan, sebagai: 1. Pengurus aktif', 'SK', 1, 'Semua Jenjang', 10),
(75, '74', 'Menjadi anggota kegiatan kepramukaan, sebagai: 2. Anggota aktif', 'SK', 0.75, 'Semua Jenjang', 10),
(76, '75', 'Menjadi tim penilai angka kredit', 'DUPAK', 0.04, 'Semua Jenjang', 10),
(77, '76', 'Menjadi tutor/pelatih/instruktur', '2 Jampel', 0.04, 'Semua Jenjang', 10),
(78, '77', 'Memperoleh Penghargaan/tanda jasa Satya Lancana Karya Satya : a.  30 (tiga puluh) tahun', 'Sertifikat/Piagam', 3, 'Semua jenjang', 11),
(79, '78', 'Memperoleh Penghargaan/tanda jasa Satya Lancana Karya Satya : b. 20 (dua puluh) tahun', 'Sertifikat/Piagam', 2, 'Semua Jenjang', 11),
(80, '79', 'Memperoleh Penghargaan/tanda jasa Satya Lancana Karya Satya : b. 10 (sepuluh) tahun', 'Sertifikat/Piagam', 1, 'Semua Jenjang', 11),
(81, '80', 'Memperoleh Penghargaan/tanda jasa', 'Sertifikat/Piagam', 1, 'Semua Jenjang', 11);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL,
  `tanggal` int(11) DEFAULT NULL,
  `file` varchar(50) NOT NULL,
  `status` varchar(45) DEFAULT NULL,
  `tahun` int(11) NOT NULL,
  `jumlah_jam` int(11) NOT NULL,
  `nilai` double NOT NULL,
  `npk` double NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `jabatan_fungsional_id` int(11) NOT NULL,
  `kegiatan_id` int(11) DEFAULT NULL,
  `rekap_nilai_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id`, `tanggal`, `file`, `status`, `tahun`, `jumlah_jam`, `nilai`, `npk`, `jenis`, `jabatan_fungsional_id`, `kegiatan_id`, `rekap_nilai_id`) VALUES
(53, 1561252284, 'kodeKegiatan-05-idRekapNilai-11.pdf', '1', 4, 6, 50, 29.75, 'pb', 14, 5, 11),
(54, 1561252284, 'kodeKegiatan-07-idRekapNilai-11.pdf', '1', 4, 0, 20, 29.75, 'ttmj', 1, 7, 11),
(55, 1561252284, 'kodeKegiatan-20-idRekapNilai-11.pdf', '1', 0, 0, 0, 0, '', 0, 21, 11),
(56, 1561252284, 'kodeKegiatan-21-idRekapNilai-11.pdf', '1', 0, 0, 0, 0, '', 0, 22, 11),
(57, 1561252285, 'kodeKegiatan-30-idRekapNilai-11.pdf', '1', 0, 0, 0, 0, '', 0, 31, 11),
(58, 1561252285, 'kodeKegiatan-31-idRekapNilai-11.pdf', '1', 0, 0, 0, 0, '', 0, 32, 11),
(59, 1561252285, 'kodeKegiatan-65-idRekapNilai-11.pdf', '1', 0, 0, 0, 0, '', 0, 66, 11),
(60, 1561252285, 'kodeKegiatan-68-idRekapNilai-11.pdf', '1', 0, 0, 0, 0, '', 0, 69, 11),
(61, 1561252285, 'kodeKegiatan-69-idRekapNilai-11.pdf', '1', 0, 0, 0, 0, '', 0, 70, 11),
(65, 1561254408, 'kodeKegiatan-06-idRekapNilai-13.pdf', '1', 4, 75, 63, 25.3125, 'pb', 15, 6, 13),
(66, 1561254408, 'kodeKegiatan-08-idRekapNilai-13.pdf', '1', 4, 0, 18, 20.25, 'ttmj', 2, 8, 13),
(67, 1561254408, 'kodeKegiatan-13-idRekapNilai-13.pdf', '1', 0, 0, 0, 1.265625, 'tttmj', 7, 13, 13),
(68, 1561254408, 'kodeKegiatan-18-idRekapNilai-13.pdf', '1', 0, 0, 0, 0.50625, 'pkdt', 13, 20, 13);

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
  `jabatan` varchar(45) DEFAULT NULL,
  `is_active` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nip`, `nama`, `tmp_lahir`, `tgl_lahir`, `jenis_kelamin`, `status`, `agama`, `telepon`, `alamat`, `gambar`, `jabatan`, `is_active`) VALUES
(1, '12345', 'Siti Admin', 'Banyuwangi', '1997-12-12', 'P', 'BK', 'Islam', '081123456789', 'Purwoharjo - Banyuwangi', NULL, 'Kepala Dinas', NULL),
(2, '12344', 'Siti Penilai', 'Banyuwangi', '1997-12-12', 'P', 'BK', 'Islam', '08112345678', 'Purwoharjo - Banyuwangi', NULL, 'Sekertaris', NULL);

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
  `unit_kerja` varchar(45) DEFAULT NULL,
  `jabatan_id` int(11) NOT NULL,
  `tugas_mengajar` varchar(45) DEFAULT NULL,
  `jabatan_fungsional_id` int(11) NOT NULL,
  `alamat_rumah` text,
  `alamat_sekolah` text,
  `gambar` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `telepon` varchar(45) DEFAULT NULL,
  `is_active` int(1) DEFAULT NULL,
  `date_created` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftar`
--

INSERT INTO `pendaftar` (`id`, `nama`, `nip`, `nuptk`, `karpeg`, `tmp_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `status_guru`, `unit_kerja`, `jabatan_id`, `tugas_mengajar`, `jabatan_fungsional_id`, `alamat_rumah`, `alamat_sekolah`, `gambar`, `email`, `telepon`, `is_active`, `date_created`) VALUES
(1, 'Siti Guru', '12345', '12345', '12345', 'Banyuwangi', '1999-12-12', 'P', 'Islam', 'PNS', 'SD 2 Purwoharjo', 3, 'Guru Mata Pelajaran Matematika', 3, 'Purwoharjo', 'Purwoharjo', 'avatar.jpg', 'sitiguru@mail.com', '08123456789', 1, 1556329845),
(2, 'User baru', '123456', '123456', '123456', 'Banyuwangi', '1997-12-12', 'L', 'Islam', 'PNS', 'SD 2 Purwoharjo', 5, 'Mengajar Mata Pelajaran Bahasa Indonesia', 2, 'Purwoharjo', 'Purwoharjo', 'avatar.jpg', 'userbaru@mail.com', '0812345678', 1, 1556330178);

-- --------------------------------------------------------

--
-- Table structure for table `rekap_nilai`
--

CREATE TABLE `rekap_nilai` (
  `id` int(11) NOT NULL,
  `lengkap` int(1) NOT NULL,
  `status` varchar(45) DEFAULT NULL,
  `tanggal` int(11) DEFAULT NULL,
  `dari` int(11) NOT NULL,
  `ke` int(11) NOT NULL,
  `pengajuan_ke` int(11) DEFAULT NULL,
  `hasil_akk` double NOT NULL,
  `pendaftar_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekap_nilai`
--

INSERT INTO `rekap_nilai` (`id`, `lengkap`, `status`, `tanggal`, `dari`, `ke`, `pengajuan_ke`, `hasil_akk`, `pendaftar_id`) VALUES
(11, 1, '1', 1561252284, 5, 6, 1, 158.65, 2),
(13, 1, '3', 1561254408, 3, 4, 1, 92.896875, 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `nama` varchar(126) NOT NULL,
  `link` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `nama`, `link`) VALUES
(1, 'Admin', 'admin'),
(2, 'Kepala Dinas', 'pimpinan'),
(3, 'Penilai', 'penilai'),
(4, 'Pendaftar', 'pendaftar');

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
(4, 'PEMBELAJARAN/ BIMBINGAN DAN TUGAS TERTENTU', 'Melaksanakan proses bimbingan'),
(5, 'PEMBELAJARAN/ BIMBINGAN DAN TUGAS TERTENTU', 'Melaksanakan tugas lain yang relevan dengan fungsi sekolah/madrasah'),
(6, 'PENGEMBANGAN KEPROFESIAN BERKELANJUTAN', 'Melaksanakan pengembangan diri'),
(7, 'PENGEMBANGAN KEPROFESIAN BERKELANJUTAN', 'Melaksanakan publikasi ilmiah'),
(8, 'PENGEMBANGAN KEPROFESIAN BERKELANJUTAN', 'Melaksanakan karya inovatif'),
(9, 'PENUNJANG TUGAS GURU', 'Memperoleh gelar/ijazah yang tidak sesuai dengan bidang yang diampunya'),
(10, 'PENUNJANG TUGAS GURU', 'Melaksanakan kegiatan yang mendukung tugas guru'),
(11, 'PENUNJANG TUGAS GURU', 'Perolehan penghargaan/tanda jasa');

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
(1, NULL, 1, 'sitiadmin', '$2y$10$WKw3jo4OKTuzTHTHzAhrle0fkec73YN5wG7/5UiZN4iWCnXPmn.Bm', 1, 1, 'avatar.jpg', 1552637403),
(4, NULL, 2, 'sitipenilai', '$2y$10$wUsoGmkil.VgUqR7HFVr/uoZRg1Wo50I0YpZ2DO7Lb5WtbImHhbPS', 3, 1, 'avatar.jpg', 1553427430),
(5, 1, NULL, 'sitiguru', '$2y$10$/lR8vMmvC6wilATL73WekOefoDJgsGbTvRTMExtLkd/C6wjlA9Qva', 4, 1, 'avatar.jpg', 1556073396),
(6, 2, NULL, 'userbaru', '$2y$10$46oUPk1VxiqcRI7cEA8hsewMekwHBWF/c3hoInK2JB3775t.O7LEq', 4, 1, 'avatar.jpg', 1556330179);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatan_fungsional`
--
ALTER TABLE `jabatan_fungsional`
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
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `jabatan_fungsional`
--
ALTER TABLE `jabatan_fungsional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pendaftar`
--
ALTER TABLE `pendaftar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rekap_nilai`
--
ALTER TABLE `rekap_nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `unsur`
--
ALTER TABLE `unsur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rekap_nilai`
--
ALTER TABLE `rekap_nilai`
  ADD CONSTRAINT `fk_rekap_nilai_pendaftar1` FOREIGN KEY (`pendaftar_id`) REFERENCES `pendaftar` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
