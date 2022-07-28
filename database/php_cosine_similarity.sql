-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 19, 2022 at 08:47 PM
-- Server version: 8.0.29-0ubuntu0.20.04.3
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_cosine_similarity`
--

-- --------------------------------------------------------

--
-- Table structure for table `judul_skripsi`
--

CREATE TABLE `judul_skripsi` (
  `id_judul_skripsi` int NOT NULL,
  `nim` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `nama_mahasiswa` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `program_studi` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `judul` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `id_topik_skripsi` int NOT NULL,
  `tahun_skripsi` year NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `judul_skripsi`
--

INSERT INTO `judul_skripsi` (`id_judul_skripsi`, `nim`, `nama_mahasiswa`, `program_studi`, `judul`, `id_topik_skripsi`, `tahun_skripsi`) VALUES
(1, '2015114013', ' Noviana', 'SI', 'Implementasi Algoritma Naive Bayes Classifier sebagai Sistem Rekomendasi Pembimbing Skripsi', 4, 2019),
(2, '2015114014', ' Novitasari', 'SI', 'Aplikasi Absensi Siswa Realtime Dengan PHP Dan SMS', 2, 2019),
(3, '2015114015', ' Viona Firlisia Krisnadi', 'SI', 'Penerapan Data Mining Untuk Koperasi Se-Jawa Barat Menggunakan Metode Clustering pada Kementerian Koperasi dan UKM', 4, 2019),
(4, '2015114016', ' Ananda Savira Tamara Putri', 'SI', 'Penerapan Teknologi Augmented Reality untuk Pengenalan Komponen Jaringan dan Cara Kerja TCP/IP berbasis Android', 5, 2019),
(5, '2015114017', ' Catherine Verencia Dewi', 'SI', 'Penerapan Payment Gateway pada Aplikasi Marketplace Waroeng Mahasiswa Menggunakan Midtrans  ', 2, 2019);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int NOT NULL,
  `nama_lengkap` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `username` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `level` enum('ADMIN','KAPRODI') CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `picture` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_lengkap`, `username`, `email`, `password`, `level`, `picture`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '$2y$10$9j82xzJUcJw4sqwVThK/q.vMi32zakkToUxNxQ/bHy6RSjkQC5V6e', 'ADMIN', 'uploads/user/1dadb10576865070a01a094e51c67fb6.jpg'),
(2, 'Mohammad Yahya', 'yahyaa', 'yahya@gmail.com', '$2y$10$zd.WpI5471z/EsQuGOuxq.6.0mf9Rtm0zwCXU0pnctjT/hrpESIz6', 'KAPRODI', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tf_idf`
--

CREATE TABLE `tf_idf` (
  `id_tf_idf` int NOT NULL,
  `id_uji_plagiarisme` int NOT NULL,
  `term` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `df` int NOT NULL,
  `idf` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tf_idf`
--

INSERT INTO `tf_idf` (`id_tf_idf`, `id_uji_plagiarisme`, `term`, `df`, `idf`) VALUES
(1, 3, 'sistem', 2, '1.4771212547197'),
(2, 3, 'deteksi', 1, '1.7781512503836'),
(3, 3, 'judul', 1, '1.7781512503836'),
(4, 3, 'skripsi', 2, '1.4771212547197'),
(5, 3, 'menggunakan', 3, '1.301029995664'),
(6, 3, 'metode', 2, '1.4771212547197'),
(7, 3, 'cosine', 1, '1.7781512503836'),
(8, 3, 'similarity', 1, '1.7781512503836'),
(9, 3, 'implementasi', 1, '1.7781512503836'),
(10, 3, 'algoritma', 1, '1.7781512503836'),
(11, 3, 'naive', 1, '1.7781512503836'),
(12, 3, 'bayes', 1, '1.7781512503836'),
(13, 3, 'classifier', 1, '1.7781512503836'),
(14, 3, 'rekomendasi', 1, '1.7781512503836'),
(15, 3, 'pembimbing', 1, '1.7781512503836'),
(16, 3, 'aplikasi', 2, '1.4771212547197'),
(17, 3, 'absensi', 1, '1.7781512503836'),
(18, 3, 'siswa', 1, '1.7781512503836'),
(19, 3, 'realtime', 1, '1.7781512503836'),
(20, 3, 'php', 1, '1.7781512503836'),
(21, 3, 'sms', 1, '1.7781512503836'),
(22, 3, 'penerapan', 3, '1.301029995664'),
(23, 3, 'data', 1, '1.7781512503836'),
(24, 3, 'mining', 1, '1.7781512503836'),
(25, 3, 'koperasi', 1, '1.7781512503836'),
(26, 3, 'sejawa', 1, '1.7781512503836'),
(27, 3, 'barat', 1, '1.7781512503836'),
(28, 3, 'clustering', 1, '1.7781512503836'),
(29, 3, 'kementerian', 1, '1.7781512503836'),
(30, 3, 'ukm', 1, '1.7781512503836'),
(31, 3, 'teknologi', 1, '1.7781512503836'),
(32, 3, 'augmented', 1, '1.7781512503836'),
(33, 3, 'reality', 1, '1.7781512503836'),
(34, 3, 'pengenalan', 1, '1.7781512503836'),
(35, 3, 'komponen', 1, '1.7781512503836'),
(36, 3, 'jaringan', 1, '1.7781512503836'),
(37, 3, 'cara', 1, '1.7781512503836'),
(38, 3, 'kerja', 1, '1.7781512503836'),
(39, 3, 'tcpip', 1, '1.7781512503836'),
(40, 3, 'berbasis', 1, '1.7781512503836'),
(41, 3, 'android', 1, '1.7781512503836'),
(42, 3, 'payment', 1, '1.7781512503836'),
(43, 3, 'gateway', 1, '1.7781512503836'),
(44, 3, 'marketplace', 1, '1.7781512503836'),
(45, 3, 'waroeng', 1, '1.7781512503836'),
(46, 3, 'mahasiswa', 1, '1.7781512503836'),
(47, 3, 'midtrans', 1, '1.7781512503836');

-- --------------------------------------------------------

--
-- Table structure for table `topik_skripsi`
--

CREATE TABLE `topik_skripsi` (
  `id_topik_skripsi` int NOT NULL,
  `nama_topik_skripsi` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `topik_skripsi`
--

INSERT INTO `topik_skripsi` (`id_topik_skripsi`, `nama_topik_skripsi`, `keterangan`) VALUES
(1, 'Akuntansi', 'Akuntansi'),
(2, 'Sistem Informasi', 'Sistem Informasi'),
(3, 'SPK', 'SPK'),
(4, 'Data Mining', 'Data Mining'),
(5, 'Computer Network', 'Computer Network');

-- --------------------------------------------------------

--
-- Table structure for table `uji_plagiarisme`
--

CREATE TABLE `uji_plagiarisme` (
  `id_uji_plagiarisme` int NOT NULL,
  `judul` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `kemiripan` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` enum('RENDAH','SEDANG','Judul Skripsi Ditolak','Judul Skripsi Diterima') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uji_plagiarisme`
--

INSERT INTO `uji_plagiarisme` (`id_uji_plagiarisme`, `judul`, `kemiripan`, `status`, `tanggal`) VALUES
(3, 'Sistem Deteksi Judul Skripsi Menggunakan Metode Cosine Similarity', '0.078748613066513', NULL, '2022-07-18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `judul_skripsi`
--
ALTER TABLE `judul_skripsi`
  ADD PRIMARY KEY (`id_judul_skripsi`),
  ADD UNIQUE KEY `nim` (`nim`),
  ADD KEY `id_topik_skripsi` (`id_topik_skripsi`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tf_idf`
--
ALTER TABLE `tf_idf`
  ADD PRIMARY KEY (`id_tf_idf`),
  ADD KEY `id_uji_plagiarisme` (`id_uji_plagiarisme`);

--
-- Indexes for table `topik_skripsi`
--
ALTER TABLE `topik_skripsi`
  ADD PRIMARY KEY (`id_topik_skripsi`);

--
-- Indexes for table `uji_plagiarisme`
--
ALTER TABLE `uji_plagiarisme`
  ADD PRIMARY KEY (`id_uji_plagiarisme`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `judul_skripsi`
--
ALTER TABLE `judul_skripsi`
  MODIFY `id_judul_skripsi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tf_idf`
--
ALTER TABLE `tf_idf`
  MODIFY `id_tf_idf` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `topik_skripsi`
--
ALTER TABLE `topik_skripsi`
  MODIFY `id_topik_skripsi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `uji_plagiarisme`
--
ALTER TABLE `uji_plagiarisme`
  MODIFY `id_uji_plagiarisme` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `judul_skripsi`
--
ALTER TABLE `judul_skripsi`
  ADD CONSTRAINT `judul_skripsi_ibfk_1` FOREIGN KEY (`id_topik_skripsi`) REFERENCES `topik_skripsi` (`id_topik_skripsi`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `tf_idf`
--
ALTER TABLE `tf_idf`
  ADD CONSTRAINT `tf_idf_ibfk_1` FOREIGN KEY (`id_uji_plagiarisme`) REFERENCES `uji_plagiarisme` (`id_uji_plagiarisme`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
