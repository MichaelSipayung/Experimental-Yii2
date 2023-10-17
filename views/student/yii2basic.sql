-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2023 at 01:01 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yii2basic`
--

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `code` char(2) NOT NULL,
  `name` char(52) NOT NULL,
  `population` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`code`, `name`, `population`) VALUES
('AU', 'Australia', 18886000),
('BR', 'Brazil', 170115000),
('CA', 'Canada', 1147000),
('CN', 'China', 1277558000),
('DE', 'Germany', 82164700),
('FR', 'France', 59225700),
('GB', 'United Kingdom', 59623400),
('IN', 'India', 1013662000),
('RU', 'Russia', 146934000),
('TH', 'Thailand', 61399000),
('US', 'United States', 278357000),
('ZA', 'South Africa', 40377000),
('ZM', 'Zambia', 9169000),
('ZW', 'Zimbabwe', 11669000);

-- --------------------------------------------------------

--
-- Table structure for table `t_jenis_kelamin`
--

CREATE TABLE `t_jenis_kelamin` (
  `jenis_kelamin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_jenis_kelamin`
--

INSERT INTO `t_jenis_kelamin` (`jenis_kelamin`) VALUES
('Pria'),
('Wanita');

-- --------------------------------------------------------

--
-- Table structure for table `t_pendaftar`
--

CREATE TABLE `t_pendaftar` (
  `pendaftar_id` int(11) NOT NULL,
  `jalur_pendaftaran_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `nisn` varchar(10) DEFAULT NULL,
  `no_kps` varchar(100) DEFAULT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `jenis_kelamin_id` int(11) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(128) DEFAULT NULL,
  `agama_id` int(11) NOT NULL,
  `alamat` tinytext DEFAULT NULL,
  `kode_pos` varchar(45) DEFAULT NULL,
  `kelurahan` varchar(32) DEFAULT NULL,
  `kabupaten` varchar(30) NOT NULL,
  `provinsi` varchar(30) NOT NULL,
  `alamat_kec` int(11) DEFAULT NULL,
  `no_telepon_rumah` varchar(45) DEFAULT NULL,
  `no_telepon_mobile` varchar(45) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `nama_ayah_kandung` varchar(128) DEFAULT NULL,
  `nama_ibu_kandung` varchar(45) DEFAULT NULL,
  `nik_ayah` varchar(16) DEFAULT NULL,
  `nik_ibu` varchar(16) DEFAULT NULL,
  `tanggal_lahir_ayah` date DEFAULT NULL,
  `tanggal_lahir_ibu` date DEFAULT NULL,
  `pendidikan_ayah_id` int(11) DEFAULT NULL,
  `pendidikan_ibu_id` int(11) DEFAULT NULL,
  `alamat_orang_tua` tinytext DEFAULT NULL,
  `kode_pos_orang_tua` varchar(45) DEFAULT NULL,
  `pekerjaan_ayah_id` int(11) DEFAULT NULL,
  `pekerjaan_ibu_id` int(11) DEFAULT NULL,
  `penghasilan_ayah` int(11) DEFAULT NULL,
  `penghasilan_ibu` int(11) DEFAULT NULL,
  `penghasilan_total` int(11) DEFAULT NULL,
  `sekolah_id` int(11) NOT NULL,
  `jurusan_sekolah` varchar(128) DEFAULT NULL,
  `jumlah_pelajaran_sem_1` int(11) DEFAULT NULL,
  `jumlah_nilai_sem_1` int(11) DEFAULT NULL,
  `jumlah_pelajaran_sem_2` int(11) DEFAULT NULL,
  `jumlah_nilai_sem_2` int(11) DEFAULT NULL,
  `jumlah_pelajaran_sem_3` int(11) DEFAULT NULL,
  `jumlah_nilai_sem_3` int(11) DEFAULT NULL,
  `jumlah_pelajaran_sem_4` int(11) DEFAULT NULL,
  `jumlah_nilai_sem_4` int(11) DEFAULT NULL,
  `jumlah_pelajaran_sem_5` int(11) DEFAULT NULL,
  `jumlah_nilai_sem_5` int(11) DEFAULT NULL,
  `jumlah_pelajaran_sem_6` int(11) DEFAULT NULL,
  `jumlah_nilai_sem_6` int(11) DEFAULT NULL,
  `jumlah_pelajaran_un` int(11) DEFAULT NULL,
  `jumlah_nilai_un` int(11) DEFAULT NULL,
  `kemampuan_bahasa_inggris` int(11) DEFAULT NULL,
  `bahasa_asing_lainnya` varchar(45) DEFAULT NULL,
  `kemampuan_bahasa_asing_lainnya` int(11) DEFAULT NULL,
  `informasi_del_id` int(11) NOT NULL,
  `informasi_del_lainnya` tinytext DEFAULT NULL,
  `n` int(11) DEFAULT NULL,
  `tanggal_pendaftaran` date DEFAULT NULL,
  `metode_pembayaran_id` int(11) DEFAULT NULL,
  `file_verifikasi_pembayaran` varchar(128) DEFAULT NULL,
  `pas_foto` varchar(128) DEFAULT NULL,
  `file_nilai_rapor` varchar(128) DEFAULT NULL,
  `file_sertifikat` varchar(128) DEFAULT NULL,
  `file_formulir` varchar(128) DEFAULT NULL,
  `file_rekomendasi` varchar(128) DEFAULT NULL,
  `prefix_kode_pendaftaran` varchar(10) DEFAULT NULL,
  `no_pendaftaran` int(11) DEFAULT NULL,
  `status_pendaftaran_id` int(11) NOT NULL DEFAULT 1,
  `status_test_akademik_id` int(11) NOT NULL DEFAULT 1,
  `status_test_psikologi_id` int(11) NOT NULL DEFAULT 1,
  `status_kelulusan` int(11) NOT NULL DEFAULT 0,
  `gelombang_pendaftaran_id` int(11) NOT NULL,
  `lokasi_ujian_id` int(11) NOT NULL,
  `kode_ujian` varchar(128) DEFAULT NULL,
  `u_cr` varchar(128) DEFAULT NULL,
  `ip_cr` varchar(45) DEFAULT NULL,
  `d_cr` datetime DEFAULT NULL,
  `u_up` varchar(128) DEFAULT NULL,
  `ip_up` varchar(45) DEFAULT NULL,
  `d_up` datetime DEFAULT NULL,
  `jurusan_sekolah_id` int(11) DEFAULT NULL,
  `sekolah_dapodik_id` int(11) DEFAULT NULL,
  `no_hp_orangtua` varchar(45) DEFAULT NULL,
  `motivasi` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `phone_number` varchar(13) NOT NULL,
  `nik` varchar(17) NOT NULL,
  `email` varchar(30) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `verf_code` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id`, `username`, `password`, `phone_number`, `nik`, `email`, `active`, `verf_code`) VALUES
(24, 'Axel', 're', '081249365161', '1222031505980005', 'michaelsipayung163@gmail.com', 0, 'JCL8eaEXzt'),
(25, 'Michael', 'p9SShODW', '082272194708', '133203150598006', 'jack1@miller.com', 0, 'Mds3rDcxnk');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `t_pendaftar`
--
ALTER TABLE `t_pendaftar`
  ADD PRIMARY KEY (`pendaftar_id`),
  ADD KEY `fk_t_pendaftar_t_user1_idx` (`user_id`),
  ADD KEY `fk_t_pendaftar_t_r_jenis_kelamin1_idx` (`jenis_kelamin_id`),
  ADD KEY `fk_t_pendaftar_t_r_agama1_idx` (`agama_id`),
  ADD KEY `fk_t_pendaftar_t_r_sekolah1_idx` (`sekolah_id`),
  ADD KEY `fk_t_pendaftar_t_r_informasi_del1_idx` (`informasi_del_id`),
  ADD KEY `fk_t_pendaftar_t_r_jalur_pendaftaran1_idx` (`jalur_pendaftaran_id`),
  ADD KEY `fk_t_pendaftar_t_status_pendaftaran1_idx` (`status_pendaftaran_id`),
  ADD KEY `fk_t_pendaftar_t_status_test_akademik1_idx` (`status_test_akademik_id`),
  ADD KEY `fk_t_pendaftar_t_status_test_psikologi1_idx` (`status_test_psikologi_id`),
  ADD KEY `fk_t_pendaftar_t_gelombang_pendaftaran1_idx` (`gelombang_pendaftaran_id`),
  ADD KEY `fk_t_pendaftar_t_r_lokasi_ujian` (`lokasi_ujian_id`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_pendaftar`
--
ALTER TABLE `t_pendaftar`
  MODIFY `pendaftar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13547;

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
