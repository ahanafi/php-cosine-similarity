-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 29, 2022 at 05:00 PM
-- Server version: 8.0.29-0ubuntu0.20.04.3
-- PHP Version: 7.4.29

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
(10, '2017102020', 'Ahmad Hanafi', 'Teknik Informatika', 'Algoritma C4.5 untuk X dan IMplemenetasi Y dengan Z', 3, 2020),
(12, '2015112004', ' Naufal Rizaldi', 'Teknik Informatika', 'Sistem Monitoring dan Kontrol Otomatis Suhu Kandang Peternakan Ayam Menggunakan Wemos dengan Telegram', 8, 2019),
(13, '2015112006', ' Ashri Haeni Surya', 'Teknik Informatika', 'Implementasi Teknologi Augmented Reality pada Media Promosi STMIK CIC', 9, 2019),
(14, '2015112007', ' Eka Nurwasilah', 'Teknik Informatika', 'Pemanfaatan Mikrotik RB941 untuk Manajemen User Hotspot dengan Metode Queue Free (Studi Kasus : SMA NU Kaplongan Indramayu)', 10, 2019),
(15, '2015112008', ' Ibnu Rakhmatullah', 'Teknik Informatika', 'Sistem Monitoring dan Kontrol Air Nutrisi Tanaman Hidroponik Berbasis Mikrokontroler Wemos Dengan Telegram', 11, 2019),
(16, '2015112010', ' Iman Nurrobi', 'Teknik Informatika', 'Penerapan Metode QOS (Quality Of Service) untuk Menganalisa Kualitas Kinerja Wireless', 10, 2019),
(17, '2015112011', ' Rifky Ridho Prabowo', 'Teknik Informatika', 'Sistem Monitoring dan Pemberian Pakan Otomatis pada Budidaya Ikan Menggunakan Wemos dengan Konsep Internet Of Things (IOT)', 11, 2019),
(18, '2015112016', ' Ahmad Thoufiq Familyyanto', 'Teknik Informatika', 'Rancang Bangun Akses Kontrol Pintu Rumah dan Keamanan Rumah Berbasis Wemos dengan Konsep Internet of Things (IOT)', 11, 2019),
(19, '2015112021', ' Nurhalimah', 'Teknik Informatika', 'Pemanfaatan Free Radius Server untuk Mengelola User Otentikasi Pengguna Jaringan (Studi Kasus : SMP NU Darul Ma\'arif Indramayu)', 10, 2019),
(20, '2015142001', ' Maulana Zain', 'Teknik Informatika', 'Deteksi dan Hitung Kendaraan dengan Convolutional Neural Network Menggunakan Algoritma You Only Look Once (YOLO)', 9, 2019),
(21, '2015142003', ' Idheana Nurul Fadillah', 'Teknik Informatika', 'Analisis Sentimen Konsumen Terhadap Barang Pre-Order pada Online Shop Menggunakan Metode Naive Bayes Classifier', 12, 2019),
(22, '2015142004', ' Fadjar Firdaus', 'Teknik Informatika', 'Prototype Locking System Berdasarkan QR-Code Menggunakan Board Ardoino Berbasis Android ', 11, 2019),
(23, '2015142005', ' Rizki Hassantha', 'Teknik Informatika', 'Rancang Bangun Aplikasi Alat Bantu Pembelajaran Pengenalan Hardware Komputer dengan Teknologi Augmented Reality (Studi Kasus : Sekolah Dasar Cirebon Islamic School (CIS))', 9, 2019),
(24, '2015142006', ' Angga Mardhian Locano', 'Teknik Informatika', 'Aplikasi Pengaduan Judul Proyek dan Skripsi Program Studi Teknik Informatika Berbasis Android', 13, 2019),
(25, '2015142009', ' Agi Rionaldo FS', 'Teknik Informatika', 'Rancang Bangun Aplikasi Perpustakaan Online Berbasis Android (studi Kasus : STMIK CIC Cirebon)', 13, 2019),
(26, '2015142010', ' Muadzin Baihaqi', 'Teknik Informatika', 'Rancang Bangun Aplikasi Absensi Mahasiswa Menggunakan QR Code Berbasis Android (Studi Kasus : STMIK CIC Cirebon)', 13, 2019),
(27, '2015142011', ' Mohamad Rifaldi', 'Teknik Informatika', 'Aplikasi Marketplace Dengan Sistem Lelang Untuk Produk Seni Berbasis Web Menggunakan Metode Concurrency Control (Timestamp) (Studi Kasus : Sinar Arts)', 13, 2019),
(28, '2015142013', ' Alvin Basrah', 'Teknik Informatika', 'Perancangan dan Pembuatan Sistem Pengendalian Kelembaban Tanah Berbasis Mikrokontroler ATMEGA328PU Menggunakan Logika Fuzzy dan Aplikasi Android', 11, 2019),
(29, '2015142015', ' Rubi Oktopani ', 'Teknik Informatika', 'Aplikasi Pendeteksi Kemiripan Judul Skripsi dan Abstrak Menggunakan Algoritma Brute Force Berbasis Web (Studi Kasus : STMIK CIC Cirebon)', 13, 2019),
(30, '2015142016', ' Egi Nuryadi', 'Teknik Informatika', 'Rancang Bangun Aplikasi MyCIC Berbasis Android (Studi Kasus : STMIK CIC Cirebon)', 13, 2019),
(31, '2015142017', ' Moch Pasha Rusbandi', 'Teknik Informatika', 'Sistem Pakar Diagnosa Kerusakan Sepeda Motor Matic Honda Vario Non Injeksi Menggunakan Metode Certainty Factor (Studi Kasus : Bengkel One\'s Motor)', 14, 2019),
(32, '2015142018', ' Rian Maulana', 'Teknik Informatika', 'Perancangan dan Pembuatan Game Edukasi untuk Pembelajaran Bahasa Inggris Kelas 1 SD Berbasis Android', 15, 2019),
(33, '2015142020', ' Devie Claudea Natalie', 'Teknik Informatika', 'Sistem Pakar untuk Menentukan Jenis Perawatan Kulit Wajah Berdasarkan Jenis Kulit Menggunakan Metode Forward Chaining', 14, 2019),
(34, '2015142022', ' Billy Kusmanto', 'Teknik Informatika', 'Sistem Pakar untuk Menentukan Penyakit dan Perawatan Gigi Menggunakan Metode Forward Chaining (Studi Kasus : Clinik Smiling Forever)', 14, 2019),
(35, '2015142024', ' Andi Saputra', 'Teknik Informatika', 'Rancang Bangun Aplikasi Ujian Semester Online Menggunakan Algoritma Fisher Yates Shuffle Berbasis Android', 13, 2019),
(36, '2015142025', ' Wahdiati', 'Teknik Informatika', 'Sistem Pendukung Kaputusan Penentuan Sanksi Pelanggaran Siswa Menggunakan Metode Analytical Hierarchy Process (AHP) (Study Kasus : SMAN 4 Cirebon)', 16, 2019),
(37, '2015142026', ' M. Fihri Aziz Assuyuti', 'Teknik Informatika', 'Sistem Informasi Penjadwalan Mata Kuliah di STMIK CIC Menggunakan Algoritma Genetika Berbasis Android', 13, 2019),
(38, '2015142027', ' Rommy Rifaldi Hartoyo', 'Teknik Informatika', 'Sistem Pendukung Keputusan Pemberian Bonus Karyawan Menggunakan Metode Fuzzy Logic', 16, 2019),
(39, '2015142029', ' Septian Galuh Andika', 'Teknik Informatika', 'Sistem Pendukung Keputusan Pemilihan Kegiatan Ekstrakurikuler untuk Siswa SMA Menggunakan Metode Simple Milti Attribute Technique (SMART)', 16, 2019),
(40, '2017102086', ' Victor Leonarto', 'Teknik Informatika', 'Sistem Informasi Virtual Tour untuk Pengenalan Lokasi dan Ruang pada Rumah Sakit Umum Daerah Gunung Jati Cirebon Berbasis Web', 13, 2019),
(41, '2015102001', ' M. Lutfi', 'Teknik Informatika', 'Pemanfaatan Mikrotik Routerboard untuk Manajemen Bandwidth Menggunakan Metode Qeueu Tree ( SK.SMAN 1 Kersana)', 17, 2020),
(42, '2016102001', ' Kristianto', 'Teknik Informatika', 'Sistem Analisis Kepuasan Alumni dan Pengguna Lulusan pada Universitas CIC dengan Metode CSI dan Matrix IPA', 16, 2020),
(43, '2016102002', ' Syifa Ulkarim', 'Teknik Informatika', 'Implementasi Sistem Penjadwalan Kuliah Menggunakan Algoritma Genetika (Studi Kasus : Universitas Catur Insan Cendekia)', 13, 2020),
(44, '2016102003', ' Mohamad Rully', 'Teknik Informatika', 'rancang bangun sistem informasi arsip data kerjasama tri dharma perguruan tinggi berbasis web menggunakan metode alphabetical filing', 13, 2020),
(45, '2016102005', ' Irfan Riyadi', 'Teknik Informatika', 'Sistem E-learning Berbasis Web Menggunakan Metode Kansei Engineering (Studi Kasus : Prodi Teknik Informatika Universitas Catur Insan Cendekia)', 13, 2020),
(46, '2016102006', ' Wahyu Septiawan', 'Teknik Informatika', 'Analisis dan Implementasi Security Network Fail2ban Terhadap Serangan DDoS pada Web Server (Study Kasus : Universitas Catur Insan Cendekia)', 10, 2020),
(47, '2016102007', ' Leilly Indahsari', 'Teknik Informatika', 'Rancang Bangun LINE Chatbot Informasi dan Edukasi Kesehatan Mental Menggunakan Algoritma Jaro Winkler', 13, 2020),
(48, '2016102009', ' Sri Apriyani', 'Teknik Informatika', 'Perancangan dan Pembuatan Aplikasi Monitoring Ruangan Menggunakan IP Camera Berbasis Android di Universitas Catur Insan Cendekia', 13, 2020),
(49, '2016102011', ' Arif Maulana', 'Teknik Informatika', 'Perancangan Dan Implementasi Sistem Monitoring Dan Kendali Multi Perangkat Pada Ruang Laboratorium Komputer Universitas CIC Berbasis Iot Menggunakan Nodemcu', 8, 2020),
(50, '2016102013', ' Farida Trie Agustiany', 'Teknik Informatika', 'Rancang Bangun Aplikasi Ujian Saringan Masuk Universitas Berbasis We Menggunakan Metode Blum Blum Shub (BBS) \nStudi kasus : universitas cic', 13, 2020),
(51, '2016102014', ' Mochamad Rizky Alvin Fernanda', 'Teknik Informatika', 'Sistem Prediksi Kelulusan Mahasiswa Bersasarkan Data Akademik dan Non Akademik menggunakan Metode K-Means (Studi Kasus : Universitas CIC)', 12, 2020),
(52, '2016102019', ' Miawati', 'Teknik Informatika', 'Sistem Penilaian Kinerja Dosen Menggunakan Metode Simple Multi Attribute Rating Technique (SMART) pada Universitas Catur Insan Cendekia Cirebon', 16, 2020),
(53, '2016102020', ' Sakti Wibawa', 'Teknik Informatika', 'Sistem Forecasting Sarana dan Prasarana Menggunakan Metode Naive Approach di Universitas Catur Insan Cendekia', 18, 2020),
(54, '2016102021', ' Nurfiki', 'Teknik Informatika', 'Rancang bangun sistem pengolahan limbah sayuran menjadi cairan kompos dan alternatif pakan ikan organik berbasis Android dengan mikrokontroler arduino uno menggunakan metode fuzzy logic (studi  kasus : ud.kaswan sayur)', 8, 2020),
(55, '2016102022', ' Subhan Saeful Islami', 'Teknik Informatika', 'Perancangan Aplikasi Sistem Informasi Untuk Pengajuan Cuti Pegawai Universitas Catur Insan Cendikia Secara Online\n(Studi Kasus: Unibersitas CIC)', 13, 2020),
(56, '2016102023', ' Melly Amalia', 'Teknik Informatika', 'Rancang Bangun Sistem Pengarsipan Data Aturan Pedoman dan SOP Berbasis Web Menggunakan Metode Index Field', 13, 2020),
(57, '2016102024', ' Rizky Arbilah', 'Teknik Informatika', 'Prototype Alat Penyiraman Air dan Nutrisi Otomatis Pada Proses Pembenihan Buah Naga Menggunakan Modul NodemCU (Studi Kasus : Lahan Pembenihan Buah Naga Desa Winduhaji)', 8, 2020),
(58, '2016102025', ' Humam Muhadzdzab', 'Teknik Informatika', 'Sistem Prediksi Untuk Menentukan Jumlah Pendaftaran Mahasiswa Baru Pada Univertisitas Catur Insan Cendekia Menggunakan Metode Least Square', 18, 2020),
(59, '2016102026', ' Habillah Abbas', 'Teknik Informatika', 'Sistem Kendali Alat Pemberi Pakan Kucing Otomatis Menggunakan Modul NodemCU ESP8266', 8, 2020),
(60, '2016102028', ' Andreas Oktafian', 'Teknik Informatika', 'Sistem penilaian kinerja karyawan menggunakan metode ahp studi kasus CV. Trijaya', 16, 2020),
(61, '2016102032', ' Indra Romadon', 'Teknik Informatika', 'Pengembangan Konfigurasi Hotspot dan Voucher Login Menggunakan Mikrotik RB952ui dengan Web Top Up (studi kasus : Noralona Coffee Roastery)', 17, 2020),
(62, '2016102033', ' Devi Nurjannah', 'Teknik Informatika', 'Sistem Ujian Berbasis Web Server Menggunakan Metode LCM (Linear Congruent Method)  Studi kasus : SMA Muhammadiyah', 13, 2020),
(63, '2016102036', ' Puja Irawan', 'Teknik Informatika', 'Penerapan Metode Simple Additive Weighting untuk Menentukan Penggunaan Dana Bantuan Operasional Sekolah (studi kasus: SMK Asyifa Depok)', 16, 2020),
(64, '2016102037', ' Alfian', 'Teknik Informatika', 'Rancang Bangun Aplikasi Marketplace Waroeng Mahasiswa dengan digitalisasi pembayaran Menggunakan Sistem Payment Gateway (Studi Kasus : Universitas Catur Insan Cendekia)', 13, 2020),
(65, '2016102038', ' Haevah Reza Amri', 'Teknik Informatika', 'Penerapan Metode Customer Satisfaction Index untuk Mengukur Tingkat Kepuasan Layanan Manajemen Universitas Catur Insan Cendekia', 16, 2020),
(66, '2016102041', ' Rizky Maulana', 'Teknik Informatika', 'Analisa Penerapan Filtering Proxy Server Pada Keamanan Jaringan Komputer Untuk Meminimalisir Penyebaran Malware (Studi kasus :  Cakrabuana Cruise Ship and Hotel School)', 10, 2020),
(67, '2016102042', ' Vega Pramudia Sukma', 'Teknik Informatika', 'Implementasi Sistem Absensi Mahasiswa Menggunakan Fingerprint ( studi kasus : Universitas CIC)', 13, 2020),
(68, '2016102043', ' Nadila Khabiru', 'Teknik Informatika', 'Rancang Bangun Prototype Sistem Kontrol Temperatur Untuk Kumbung Jamur Tiram Pada Media Kardus', 11, 2020),
(69, '2016102044', ' Muhammad Faqih Hasan', 'Teknik Informatika', 'Analisa Penerapan Metode Port Knocking Pada Nmap Sebagai Penunjang Keamanan Jaringan (Studi Kasus : SMK Negeri 1 Lemahabang)', 10, 2020),
(70, '2016102049', ' Dimas Aulia Pujie Prasetya', 'Teknik Informatika', 'Rancang Bangun Aplikasi Penilaian Kinerja Guru Menggunakan Metode Simple Additive Weighting (SAW) (Studi Kasus : SMK Asyifa Depok)', 16, 2020),
(71, '2016102050', ' Kresna Adi Pratama', 'Teknik Informatika', 'Implementasi load balancing pada web server menggunakan apache dengan server mirror data secara real time (Studi Kasus: PT.Trimitra Data Teknologi)', 19, 2020),
(72, '2016102051', ' Surandi', 'Teknik Informatika', 'Implementasi Load Balancing Menggunakan Nginx Dengan Metode Round Robin Pada Learning Management System Moodl', 19, 2020),
(73, '2016102052', ' Ridwanto', 'Teknik Informatika', 'Manajemen Konfigurasi Mikrotik dan Cisco Menggunakan Python dan Django', 17, 2020),
(74, '2016102057', ' Muhammad Fajar Ramadhan', 'Teknik Informatika', 'Analisa dan Implementasi Honeypot untuk Meningkatkan Keamanan Server dari Aktivitas Serangan (Studi kasus : SMA 1 Mandirancan )', 10, 2020),
(75, '2018102092', ' Ahmad tajul Arifin', 'Teknik Informatika', 'Prototype Home Automation Kontrol Perangkat Elektronik Dengan Modul Nodemcu Berbasis Internet Of Things', 11, 2020);

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
(1, 'ARTIFICIAL INTELLIGENCE', 'Kecerdasan Buatan'),
(2, 'SISTEM INFORMASI', 'Sisfo'),
(3, 'SOFTWARE DEVELOPMENT', 'Pengembangan perangkat lunak'),
(6, 'Perancangan Database', 'Database design'),
(7, 'Data Minign', ''),
(8, 'IOT', 'IOT'),
(9, 'Pengolahan Citra', 'Pengolahan Citra'),
(10, 'Keamanan Jaringan', 'Keamanan Jaringan'),
(11, 'IoT', 'IoT'),
(12, 'Data Mining', 'Data Mining'),
(13, 'Sistem Informasi', 'Sistem Informasi'),
(14, 'Sistem Pakar', 'Sistem Pakar'),
(15, 'Games', 'Games'),
(16, 'SPK', 'SPK'),
(17, 'Jaringan Komputer', 'Jaringan Komputer'),
(18, 'Kecerdasan Buatan', 'Kecerdasan Buatan'),
(19, 'Server Optimization', 'Server Optimization');

-- --------------------------------------------------------

--
-- Table structure for table `uji_plagiarisme`
--

CREATE TABLE `uji_plagiarisme` (
  `id_uji_plagiarisme` int NOT NULL,
  `judul` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `kemiripan` int NOT NULL,
  `perbedaan` int NOT NULL,
  `status` enum('RENDAH','SEDANG','TINGGI','TIDAK') COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `judul_skripsi`
--
ALTER TABLE `judul_skripsi`
  ADD PRIMARY KEY (`id_judul_skripsi`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

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
  MODIFY `id_judul_skripsi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `topik_skripsi`
--
ALTER TABLE `topik_skripsi`
  MODIFY `id_topik_skripsi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `uji_plagiarisme`
--
ALTER TABLE `uji_plagiarisme`
  MODIFY `id_uji_plagiarisme` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
