-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2024 at 06:50 PM
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
-- Database: `pendataan-penduduk`
--

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `id_agama` varchar(10) NOT NULL,
  `nama_agama` varchar(30) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id_agama`, `nama_agama`, `status`) VALUES
('A1', 'Islam', 1),
('A2', 'Kristen', 1),
('A3', 'Katholik', 1),
('A4', 'HIndu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE `dokumen` (
  `id_dokumen` varchar(30) NOT NULL,
  `nama_dokumen` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `dokumen`
--

INSERT INTO `dokumen` (`id_dokumen`, `nama_dokumen`, `status`) VALUES
('D1', 'E-KTP', 1),
('D2', 'IJASAH', 1);

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id_dokumen` varchar(30) DEFAULT NULL,
  `nik` varchar(30) DEFAULT NULL,
  `file` text DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id_akses` varchar(10) NOT NULL,
  `nama_akses` varchar(20) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `hak_akses`
--

INSERT INTO `hak_akses` (`id_akses`, `nama_akses`, `status`) VALUES
('akses01', 'admin', 1),
('akses04', 'penduduk', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses_user`
--

CREATE TABLE `hak_akses_user` (
  `nik` varchar(15) NOT NULL,
  `id_akses` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `hak_akses_user`
--

INSERT INTO `hak_akses_user` (`nik`, `id_akses`) VALUES
('123451', 'akses04'),
('123451', 'akses01');

-- --------------------------------------------------------

--
-- Table structure for table `kk`
--

CREATE TABLE `kk` (
  `id_kk` varchar(10) DEFAULT NULL,
  `no_kk` varchar(50) NOT NULL DEFAULT '',
  `alamat` varchar(30) DEFAULT NULL,
  `desa` varchar(30) DEFAULT NULL,
  `kecamatan` varchar(30) DEFAULT NULL,
  `kabupaten` varchar(30) DEFAULT NULL,
  `kode_pos` varchar(10) DEFAULT NULL,
  `provinsi` varchar(30) DEFAULT NULL,
  `rt` varchar(5) DEFAULT NULL,
  `rw` varchar(5) DEFAULT NULL,
  `kepala_keluarga` varchar(50) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kk`
--

INSERT INTO `kk` (`id_kk`, `no_kk`, `alamat`, `desa`, `kecamatan`, `kabupaten`, `kode_pos`, `provinsi`, `rt`, `rw`, `kepala_keluarga`, `status`) VALUES
('1', '12341', 'Dukuh Pandean', 'TRUCUK', 'TRUCUK', 'BOJONEGORO', '62155', 'JAWA TIMUR', '07', '08', '123451', '1'),
('2', '12342', 'JL. CIJENGKOL', 'MEKARJAYA', 'BUNGBULANG', 'GARUT', '44165', 'JAWA BARAT', '01', '02', '123445', '1'),
('3', '12343', 'JL. BAMBU II', 'SERENGSENG', 'KEMBANGAN', 'JAKARTA BARAT', '11630', 'DKI JAKARTA', '02', '06', '123453', '1'),
('4', '12344', 'JL. TAMAN MERUYA ILIR', 'MERUYA UTARA', 'KEMBANGAN', 'JAKARTA BARAT', '11620', 'DKI JAKARTA', '14', '04', '123454', '1'),
('5', '12345', 'JL. DHARMA WANITA V', 'RAWA BUAYA', 'CENGKARENG', 'JAKARTA BARAT', '23563', 'DKI JAKARTA', '01', '09', '123456', '1');

-- --------------------------------------------------------

--
-- Table structure for table `klasifikasi`
--

CREATE TABLE `klasifikasi` (
  `id_klasifikasi` varchar(10) NOT NULL DEFAULT '',
  `nama_klasifikasi` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `klasifikasi`
--

INSERT INTO `klasifikasi` (`id_klasifikasi`, `nama_klasifikasi`, `status`) VALUES
('K1', 'Anak - Anak', 1),
('K2', 'Remaja', 1),
('K3', 'Dewasa', 1),
('K4', 'Lansia', 1);

-- --------------------------------------------------------

--
-- Table structure for table `klasifikasi_dokumen`
--

CREATE TABLE `klasifikasi_dokumen` (
  `id_klasifikasi` varchar(5) NOT NULL,
  `id_dokumen` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `klasifikasi_dokumen`
--

INSERT INTO `klasifikasi_dokumen` (`id_klasifikasi`, `id_dokumen`) VALUES
('K3', 'D1'),
('K3', 'D2'),
('K2', 'D2'),
('K4', 'D1'),
('K4', 'D2');

-- --------------------------------------------------------

--
-- Table structure for table `online`
--

CREATE TABLE `online` (
  `id_online` int(11) NOT NULL,
  `nik` varchar(15) NOT NULL,
  `waktu` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `online`
--

INSERT INTO `online` (`id_online`, `nik`, `waktu`) VALUES
(1, '123451', '11-01-2017  14:27'),
(2, '123451', '11-01-2017  14:27');

-- --------------------------------------------------------

--
-- Table structure for table `penduduk`
--

CREATE TABLE `penduduk` (
  `nik` varchar(100) NOT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` varchar(10) DEFAULT NULL,
  `jk` enum('L','P') DEFAULT NULL,
  `golongan_darah` varchar(5) DEFAULT NULL,
  `pekerjaan` text DEFAULT NULL,
  `pendidikan` varchar(10) NOT NULL,
  `status_perkawinan` enum('KAWIN','BELUM KAWIN') NOT NULL,
  `kewarganegaraan` varchar(50) DEFAULT NULL,
  `id_agama` varchar(30) DEFAULT NULL,
  `id_klasifikasi` varchar(20) NOT NULL,
  `no_kk` varchar(50) DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `about` text DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `penduduk`
--

INSERT INTO `penduduk` (`nik`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jk`, `golongan_darah`, `pekerjaan`, `pendidikan`, `status_perkawinan`, `kewarganegaraan`, `id_agama`, `id_klasifikasi`, `no_kk`, `foto`, `about`, `username`, `password`, `status`) VALUES
('123445', 'HILMI', 'GARUT', '19-12-2005', 'L', 'A', 'PELAJAR/MAHASISWA', 'D4/S1', 'BELUM KAWIN', 'WNA', 'A1', 'K1', '12342', 'foto123445.jpg', NULL, 'agus', 'YWd1c2FndXM=', 0),
('123451', 'MUHAMAD NUR ARIF', 'JAKARTA', '08-09-2004', 'L', 'O', 'PELAJAR/MAHASISWA', 'D4/S1', 'BELUM KAWIN', 'WNI', 'A1', 'K3', '12341', 'Arif.JPG', 'Manusia Berencana Tuhan Yang Mentakdirkan', 'admin', 'YWRtaW4=', 1),
('123453', 'MUHAMMAD ALFAREDZ ARIESTU DELSYAH', 'JAKARTA', '2005-09-28', 'L', 'A', 'PELAJAR/MAHASISWA', 'D4/S1', 'BELUM KAWIN', 'WNI', 'A1', 'K2', '12343', 'foto123453.jpg', '', 'coba', '1621a5dc746d5d19665ed742b2ef9736', 0),
('123454', 'MUHAMMAD MUSYAFFA AZZAM', 'JAKARTA', '03-01-2005', 'L', 'AB', 'PELAJAR/MAHASISWA', 'D4/S1', 'BELUM KAWIN', 'WNI', 'A1', 'K2', '12344', 'foto123454.jpg', '', 'maya', '27d3b3b3901de679a59571f85ea78c38', 0),
('123455', 'LAURA JANISA AZAHRA', 'TANGERANG', '13-01-2005', 'P', 'A', 'PELAJAR/MAHASISWA', 'D4/S1', 'KAWIN', 'WNI', 'A1', 'K2', '12341', 'foto123455.jpg', 'Manusia berangan lebih panjang dibandingan...\r\numur yang mampu mereka perjuangan.\r\nMendambakan banyak hal dan lupa bahwa hidupnya hanyalah bagian dari sebuah...\r\nPerjalan Pulang ~\r\n\r\n--Kashva--', 'lia', 'bc8ee6f4b9ca1e80e897ff7c68ae0b8c', 0),
('123456', 'INTAN PERMATASARI', 'JAKARTA', '22-09-2006', 'P', 'AB', 'PELAJAR/MAHASISWA', 'SMA', 'BELUM KAWIN', 'WNI', 'A1', 'K2', '12345', 'foto123456.jpg', '\r\n', 'surya', 'aff8fbcbf1363cd7edc85a1e11391173', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `nik` varchar(15) NOT NULL,
  `pesan` text NOT NULL,
  `waktu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `nik`, `pesan`, `waktu`) VALUES
(39, '123455', 'satu [kasmaran]', '10-12-2016  00:19'),
(40, '123454', 'dua  [kedip]', '10-12-2016  00:19'),
(41, '123451', 'tiga  [ketawa]', '10-12-2016  00:19'),
(42, '123451', 'tes satu dua tiga  [kasmaran] [kedip] [ketawa] [marah] [melet] [nangis] [sakit] [bye] [maki-maki] [cmarah] [cmurung] [cnangis] [csedih] [csenyum] [bonus]', '10-12-2016  00:21'),
(43, '123454', 'vhdhshdchshcbhsbhsbhbhsbdhsb', '15-12-2016  07:52'),
(44, '123454', ' [nangis] [nangis] [nangis] [nangis] [nangis] [nangis] [nangis]', '15-12-2016  07:53'),
(45, '123451', ' [cmurung] [cmurung] [cmurung] [cmurung] [bonus] [bonus] [bonus] [bonus] [bonus] [bonus]', '19-12-2016  22:00'),
(46, '123451', 'obby auliyaur rohman  [bonus] [bonus] [bonus] [bonus]', '19-12-2016  22:00'),
(47, '123451', ' [marah] [marah] [marah] [marah] [marah] [marah] [marah]', '19-12-2016  22:02'),
(48, '123445', 'iki agus', '20-12-2016  23:44'),
(49, '123445', ' [csenyum] [maki-maki] [melet] [nangis] [ketawa] [ketawa] [marah]', '20-12-2016  23:44'),
(50, '123451', ' [kasmaran] [melet] [kasmaran] [ketawa] [ketawa] [marah] [marah]', '20-12-2016  23:47'),
(51, '123454', 'malem semua [maki-maki]', '20-12-2016  23:50'),
(52, '123451', ' [bonus] [csenyum] [csedih]', '22-12-2016  01:08'),
(53, '123451', ' [cnangis] [cnangis] [cnangis]', '22-12-2016  01:18'),
(54, '123451', ' [kasmaran] [kasmaran] [kasmaran] [kasmaran] [kasmaran] [kasmaran]', '22-12-2016  01:27'),
(55, '123451', 'bjdhjhejfhekf', '22-12-2016  02:55'),
(56, '123451', ' [cmurung] [cmurung] [cmurung]', '22-12-2016  02:55'),
(57, '123451', ' [cmarah] [cmarah] [cmarah] [cmarah]', '02-01-2017  07:14'),
(58, '123451', 'aku ingin berjalan bersamamu', '05-01-2017  08:32'),
(59, '123445', 'dalam hujan dan malam gelap', '05-01-2017  08:33'),
(60, '123451', 'tapi aku tak bisa melihat matamu', '05-01-2017  09:03'),
(61, '123445', 'aku ingin berdua denganmu', '05-01-2017  09:04'),
(62, '123445', ' [bonus] [bonus] [bonus] [bonus] [bonus] [cmarah] [cmarah] [csedih] [csedih]', '05-01-2017  09:04'),
(63, '123451', ' [nangis] [nangis] [nangis] [cmarah] [cmarah] [cnangis] [cnangis] [csedih] [csedih]', '05-01-2017  09:04'),
(64, '123445', ' [bonus] [sakit] [sakit] [nangis] [nangis] [cmarah]', '05-01-2017  09:04'),
(65, '123451', ' [sakit] [sakit] [cmurung] [cmurung] [cmarah] [cmarah]', '05-01-2017  09:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id_dokumen`);

--
-- Indexes for table `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indexes for table `hak_akses_user`
--
ALTER TABLE `hak_akses_user`
  ADD KEY `hak_akses_user` (`id_akses`);

--
-- Indexes for table `kk`
--
ALTER TABLE `kk`
  ADD PRIMARY KEY (`no_kk`);

--
-- Indexes for table `klasifikasi`
--
ALTER TABLE `klasifikasi`
  ADD PRIMARY KEY (`id_klasifikasi`);

--
-- Indexes for table `online`
--
ALTER TABLE `online`
  ADD PRIMARY KEY (`id_online`);

--
-- Indexes for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`nik`),
  ADD KEY `penduduk` (`id_agama`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `online`
--
ALTER TABLE `online`
  MODIFY `id_online` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hak_akses_user`
--
ALTER TABLE `hak_akses_user`
  ADD CONSTRAINT `hak_akses_user` FOREIGN KEY (`id_akses`) REFERENCES `hak_akses` (`id_akses`);

--
-- Constraints for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD CONSTRAINT `penduduk` FOREIGN KEY (`id_agama`) REFERENCES `agama` (`id_agama`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
