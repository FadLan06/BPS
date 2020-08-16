-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2019 at 12:30 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bps`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_akun`
--

CREATE TABLE `tb_akun` (
  `kd_akun` varchar(128) NOT NULL,
  `kd_subkomponen` varchar(128) NOT NULL,
  `kode_akun` varchar(128) NOT NULL,
  `akun` text NOT NULL,
  `biaya` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_akun`
--

INSERT INTO `tb_akun` (`kd_akun`, `kd_subkomponen`, `kode_akun`, `akun`, `biaya`) VALUES
('5554', '32243', '9880', 'ksdaklda', ''),
('9345', '30824', '523121', 'Belanja Biaya Pemeliharaan Peralatan dan Mesin', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kegiatan`
--

CREATE TABLE `tb_kegiatan` (
  `kd_kegiatan` varchar(128) NOT NULL,
  `kd_program` varchar(128) NOT NULL,
  `kode_keg` varchar(25) NOT NULL,
  `kegiatan` varchar(256) NOT NULL,
  `biaya` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kegiatan`
--

INSERT INTO `tb_kegiatan` (`kd_kegiatan`, `kd_program`, `kode_keg`, `kegiatan`, `biaya`) VALUES
('32392', '27179', '2886', 'sdasd', '1231'),
('33', '27179', '123', 'dadsa', '12313'),
('7527', '19750', '231', 'asdkad1231', '12320001'),
('8075', '16438', '2886', 'Dukungan Manajement dan Pelaksanaan Tugas Teknis Lainnya BPS Provinsi', '2832448000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_komponen`
--

CREATE TABLE `tb_komponen` (
  `kd_komponen` varchar(128) NOT NULL,
  `kd_output` varchar(128) NOT NULL,
  `kode_kom` varchar(128) NOT NULL,
  `komponen` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_komponen`
--

INSERT INTO `tb_komponen` (`kd_komponen`, `kd_output`, `kode_kom`, `komponen`) VALUES
('26788', '31543', '002', 'Operasional dan Pemeliharaan Kantor'),
('7101', '5908', '432', 'asdklads');

-- --------------------------------------------------------

--
-- Table structure for table `tb_output`
--

CREATE TABLE `tb_output` (
  `kd_output` varchar(25) NOT NULL,
  `kd_kegiatan` varchar(25) NOT NULL,
  `kode_out` varchar(25) NOT NULL,
  `output` text NOT NULL,
  `biaya` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_output`
--

INSERT INTO `tb_output` (`kd_output`, `kd_kegiatan`, `kode_out`, `output`, `biaya`) VALUES
('31543', '8075', '2886.994', 'Layanan Perkantoran', ''),
('5908', '7527', '432', 'asdklqwe', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_program`
--

CREATE TABLE `tb_program` (
  `kd_program` varchar(128) NOT NULL,
  `kode_pro` varchar(25) NOT NULL,
  `program` varchar(256) NOT NULL,
  `biaya` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_program`
--

INSERT INTO `tb_program` (`kd_program`, `kode_pro`, `program`, `biaya`) VALUES
('16438', '054.01.01', 'Program Dukungan Manajemen dan Pelaksanaan Tugas Teknis Lainnya BPS', '2832448000'),
('19750', '13123', 'alskdladk12', '12320001'),
('27179', '31231', 'dfsfd', '12320001');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rincian`
--

CREATE TABLE `tb_rincian` (
  `kd_rincian` varchar(128) NOT NULL,
  `kd_akun` varchar(128) NOT NULL,
  `rincian` text NOT NULL,
  `volume` varchar(128) NOT NULL,
  `satuan` varchar(128) NOT NULL,
  `biaya` varchar(128) NOT NULL,
  `sisa_rin` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rincian`
--

INSERT INTO `tb_rincian` (`kd_rincian`, `kd_akun`, `rincian`, `volume`, `satuan`, `biaya`, `sisa_rin`) VALUES
('23216', '5554', 'lksdflksf', '12', '45000000', '540000000', '538040000'),
('2342', '9345', 'Pemeliharaan kendaraan operasional roda 2', '14', '3500000', '49000000', '47701000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rincianvol`
--

CREATE TABLE `tb_rincianvol` (
  `kd_rincianvol` varchar(25) NOT NULL,
  `kd_volume` varchar(25) NOT NULL,
  `uraian_vol` text NOT NULL,
  `volume_vol` varchar(15) NOT NULL,
  `satuan_vol` varchar(128) NOT NULL,
  `harga_vol` varchar(256) NOT NULL,
  `biaya_vol` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rincianvol`
--

INSERT INTO `tb_rincianvol` (`kd_rincianvol`, `kd_volume`, `uraian_vol`, `volume_vol`, `satuan_vol`, `harga_vol`, `biaya_vol`) VALUES
('10300', '10690', 'Ongkos Kerja', '1', 'kali', '15000', '15000'),
('10430', '5886', 'Ongkos Kerja', '1', 'kali', '5000', '5000'),
('10827', '25273', 'Ongkos kerja dan service', '1', 'kali', '15000', '15000'),
('12058', '25273', 'Tampal ban', '1', 'buah', '10000', '10000'),
('12273', '29955', '1 liter oli mpx 1', '1', 'botol', '46000', '46000'),
('15485', '4530', 'Ongkos kerja dan service ringan', '1', 'kali', '50000', '50000'),
('17108', '29955', 'Tampal ban', '1', 'kali', '10000', '10000'),
('17187', '10018', 'Kampas rem belakang', '2', 'buah', '50000', '100000'),
('17836', '17406', 'Ongkos Kerja', '12', 'kali', '15000', '180000'),
('1887', '17406', 'Kampas rem belakang', '12', 'buah', '50000', '600000'),
('1906', '5075', 'Oli MPX 0,8 I', '1', 'botol', '38000', '38000'),
('19298', '4530', 'Kampas rem belakang', '1', 'buah', '50000', '50000'),
('19352', '27776', 'Servis ringan', '1', 'kali', '5000', '5000'),
('19526', '18829', 'Kampas rem belakang', '1', 'buah', '46000', '46000'),
('2006', '29955', 'Ongkos Kerja', '1', 'kali', '5000', '5000'),
('20652', '27408', 'isi master supra', '1', 'set', '20000', '20000'),
('22220', '10495', 'Ongkos Kerja', '8', 'kali', '15000', '120000'),
('23085', '4530', 'Oli yamalube sport', '1', 'botol', '50000', '50000'),
('23407', '7758', 'Kampas rem belakang', '12', 'buah', '40000', '480000'),
('23813', '7758', 'Oli MPX 1 0,8 I', '12', 'botol', '50000', '600000'),
('24159', '27408', 'Oli MPX 1 0,8 I', '1', 'botol', '43000', '43000'),
('28704', '10018', 'Oli MPX 1 0,8 I', '4', 'botol', '38000', '152000'),
('28796', '7758', 'Ongkos Kerja', '1', 'kali', '40000', '40000'),
('29045', '27408', 'Servis ringan', '1', 'kali', '40000', '40000'),
('3112', '27408', 'Kampas rem belakang', '1', 'buah', '25000', '25000'),
('32351', '3200', 'Ongkos Kerja', '12', 'kali', '5000', '60000'),
('3587', '28338', 'Ongkos Kerja', '3', 'kali', '15000', '45000'),
('379', '27776', 'Oli MPX 1 ', '1', 'buah', '45000', '45000'),
('4480', '28338', 'Tampal ban', '3', 'kali', '5000', '15000'),
('6083', '5075', 'Ongkos Kerja', '1', 'kali', '5000', '5000'),
('6597', '25273', 'Ban luar belakang irc', '1', 'buah', '185000', '185000'),
('6703', '10690', 'Kampas rem belakang', '1', 'buah', '50000', '50000'),
('8206', '10690', 'Oli MPX 1 Liter', '1', 'botol', '46000', '46000'),
('8231', '29955', '1 ban dalam belakang', '1', 'buah', '35000', '35000'),
('9081', '5886', 'Oli yamalube', '1', 'botol', '40000', '40000'),
('9459', '4530', 'Aki gs', '1', 'buah', '240000', '240000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_subkomponen`
--

CREATE TABLE `tb_subkomponen` (
  `kd_subkomponen` varchar(128) NOT NULL,
  `kd_komponen` varchar(128) NOT NULL,
  `kode_sub` varchar(15) NOT NULL,
  `subkomponen` text NOT NULL,
  `biaya` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_subkomponen`
--

INSERT INTO `tb_subkomponen` (`kd_subkomponen`, `kd_komponen`, `kode_sub`, `subkomponen`, `biaya`) VALUES
('30824', '26788', 'B', 'Kendaraan Dinas dan Operasional', ''),
('32243', '7101', '432', 'lkdsklsd', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `kd_transaksi` varchar(15) NOT NULL,
  `kd_program` varchar(15) NOT NULL,
  `kd_kegiatan` varchar(15) NOT NULL,
  `kd_output` varchar(15) NOT NULL,
  `kd_komponen` varchar(15) NOT NULL,
  `kd_subkomponen` varchar(15) NOT NULL,
  `kd_akun` varchar(15) NOT NULL,
  `kd_rincian` varchar(15) NOT NULL,
  `user` text NOT NULL,
  `volume_trans` varchar(128) NOT NULL,
  `tgl` int(11) NOT NULL,
  `biaya_trans` varchar(25) NOT NULL,
  `sisa` varchar(25) NOT NULL,
  `status` int(1) NOT NULL,
  `ttd_ppk` text NOT NULL,
  `ttd_pegawai` text NOT NULL,
  `komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`kd_transaksi`, `kd_program`, `kd_kegiatan`, `kd_output`, `kd_komponen`, `kd_subkomponen`, `kd_akun`, `kd_rincian`, `user`, `volume_trans`, `tgl`, `biaya_trans`, `sisa`, `status`, `ttd_ppk`, `ttd_pegawai`, `komentar`) VALUES
('13076', '16438', '8075', '31543', '26788', '30824', '9345', '2342', '4', '8', 1573088920, '47927000', '0', 1, '5dce2fb7ecae2.png', '5dcf59eb6edf0.png', ''),
('13641', '19750', '7527', '5908', '7101', '32243', '5554', '23216', '5', '1', 1574098899, '538100000', '539220000', 0, '', '5dd2d81b11e58.png', ''),
('19693', '16438', '8075', '31543', '26788', '30824', '9345', '2342', '4', '1', 1574006863, '0', '47927000', 0, '', '', ''),
('2068', '16438', '8075', '31543', '26788', '30824', '9345', '2342', '5', '1', 1574034067, '47867000', '47927000', 1, '5dd1de102e93c.png', '5dd1de1c0b962.png', ''),
('26654', '16438', '8075', '31543', '26788', '30824', '9345', '2342', '4', '1', 1574038801, '47747000', '47867000', 1, '5dd1eefae0194.png', '5dd1eeb8c8788.png', ''),
('5379', '19750', '7527', '5908', '7101', '32243', '5554', '23216', '5', '1', 1574102695, '538040000', '538100000', 0, '', '5dd2e78d7ba75.png', 'perbaiki'),
('6692', '16438', '8075', '31543', '26788', '30824', '9345', '2342', '5', '1', 1574247806, '47701000', '47747000', 1, '5dd51e348b142.png', '5dd51dcf1cc67.png', ''),
('9145', '19750', '7527', '5908', '7101', '32243', '5554', '23216', '5', '1', 1574093363, '539220000', '540000000', 1, '5dd2c604a0472.png', '5dd2c3413961c.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_volume`
--

CREATE TABLE `tb_volume` (
  `kd_volume` varchar(128) NOT NULL,
  `kd_transaksi` varchar(25) NOT NULL,
  `uraian` text NOT NULL,
  `volume` varchar(128) NOT NULL,
  `satuan` varchar(128) NOT NULL,
  `biaya` varchar(256) NOT NULL,
  `tgl_vol` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_volume`
--

INSERT INTO `tb_volume` (`kd_volume`, `kd_transaksi`, `uraian`, `volume`, `satuan`, `biaya`, `tgl_vol`) VALUES
('10018', '19693', 'Pemeliharaan DM 6904 CA', '1', 'BMN', '252000', '2019-11-19'),
('10495', '26654', 'Pemeliharaan DM 6904 CA', '1', 'BMN', '120000', '2019-11-19'),
('10690', '13076', 'Pemeliharaan DM 6983 CA', '1', 'BMN', '111000', '2019-07-09'),
('17406', '9145', 'Pemeliharaan DM 6904 CA', '1', 'BMN', '780000', '2019-09-16'),
('18829', '6692', 'Pemeliharaan DM 6904 CA', '1', 'BMN', '46000', '2019-11-20'),
('25273', '13076', 'Pemeliharaan DM 6907 CA', '1', 'BMN', '210000', '2019-11-15'),
('27408', '13076', 'Pemeliharaan DM 6982 CA', '1', 'BMN', '128000', '2019-08-05'),
('27776', '13076', 'Pemeliharaan DM 6905 CD', '1', 'BMN', '50000', '2019-11-15'),
('28338', '2068', 'Pemeliharaan DM 6904 CA', '1', 'BMN', '60000', '2019-11-18'),
('29955', '13076', 'Pemeliharaan DM 6904 CD', '1', 'BMN', '96000', '2019-11-13'),
('3200', '5379', 'Pemeliharaan DM 6904 CA', '1', 'BMN', '60000', '2019-11-18'),
('4530', '13076', 'Pemeliharaan DM 6904 CA', '1', 'BMN', '390000', '2019-06-17'),
('5075', '13076', 'Pemeliharaan DM 2075 E', '1', 'BMN', '43000', '2019-11-19'),
('5886', '13076', 'Pemeliharaan DM 6908 CA', '1', 'BMN', '45000', '2019-11-18'),
('7758', '13641', 'Pemeliharaan DM 6904 CA', '1', 'BMN', '1120000', '2019-10-24');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `nip` varchar(128) NOT NULL,
  `jabatan` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(15) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `nip`, `jabatan`, `image`, `username`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Super Admin', '0', 'Administrator', 'User.png', 'admin', '$2y$10$5FqMX/wdVZrf8UygSMI7e.qZ2B8DQVTTfrAXDq/eTi1zHmld1x6.i', 1, 1, 1570266157),
(4, 'Fadhlan', '0', 'Karyawan', 'User.png', 'pado', '$2y$10$mePMs9rQ7zxZAYtK/v7chOePq6oFAyehURSlZ5mEEVRc9ZS869KQu', 2, 1, 1570865407),
(5, 'Fadhlan Zainuddin', '5314', 'Karyawan', 'User.png', 'fadhlan', '$2y$10$cdZi.wfIUtwKmzYlHubXLu.g8DdXEtCo1cZE2x0ktqLcc0CmLug6W', 2, 1, 1574248164);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_akun`
--
ALTER TABLE `tb_akun`
  ADD PRIMARY KEY (`kd_akun`);

--
-- Indexes for table `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  ADD PRIMARY KEY (`kd_kegiatan`);

--
-- Indexes for table `tb_komponen`
--
ALTER TABLE `tb_komponen`
  ADD PRIMARY KEY (`kd_komponen`);

--
-- Indexes for table `tb_output`
--
ALTER TABLE `tb_output`
  ADD PRIMARY KEY (`kd_output`);

--
-- Indexes for table `tb_program`
--
ALTER TABLE `tb_program`
  ADD PRIMARY KEY (`kd_program`);

--
-- Indexes for table `tb_rincian`
--
ALTER TABLE `tb_rincian`
  ADD PRIMARY KEY (`kd_rincian`);

--
-- Indexes for table `tb_rincianvol`
--
ALTER TABLE `tb_rincianvol`
  ADD PRIMARY KEY (`kd_rincianvol`);

--
-- Indexes for table `tb_subkomponen`
--
ALTER TABLE `tb_subkomponen`
  ADD PRIMARY KEY (`kd_subkomponen`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`kd_transaksi`);

--
-- Indexes for table `tb_volume`
--
ALTER TABLE `tb_volume`
  ADD PRIMARY KEY (`kd_volume`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
