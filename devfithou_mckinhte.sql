-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2021 at 10:21 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `devfithou_mckinhte`
--

-- --------------------------------------------------------

--
-- Table structure for table `dm_hanhchinh`
--

CREATE TABLE IF NOT EXISTS `dm_hanhchinh` (
  `PK_sMaHanhChinh` varchar(50) NOT NULL,
  `sTenHanhChinh` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tMota` text CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chuongtrinh`
--

CREATE TABLE IF NOT EXISTS `tbl_chuongtrinh` (
  `PK_sMaChuongTrinh` varchar(50) NOT NULL,
  `sTenCT` varchar(255) NOT NULL,
  `tMota` text,
  `FK_sMaCB` varchar(50) NOT NULL,
  `dThoiGIanBD` date NOT NULL,
  `dThoiGIanKT` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dangkydon`
--

CREATE TABLE IF NOT EXISTS `tbl_dangkydon` (
  `PK_sMaDangKy` varchar(50) NOT NULL,
  `FK_sMaSV` varchar(50) NOT NULL,
  `FK_sMaCanbo` varchar(50) DEFAULT NULL,
  `FK_sMaHanhChinh` varchar(50) NOT NULL,
  `dTGThem` datetime NOT NULL,
  `dTGDuyet` datetime DEFAULT NULL,
  `iTrangThai` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lop`
--

CREATE TABLE IF NOT EXISTS `tbl_lop` (
  `PK_sMaLop` varchar(50) NOT NULL,
  `sTenLop` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_minhchung`
--

CREATE TABLE IF NOT EXISTS `tbl_minhchung` (
  `PK_sMaMC` varchar(50) NOT NULL,
  `FK_sMaSV` varchar(50) NOT NULL,
  `FK_sMaCT` varchar(50) NOT NULL,
  `tLink` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quyen`
--

CREATE TABLE IF NOT EXISTS `tbl_quyen` (
  `PK_sMaQuyen` varchar(50) NOT NULL,
  `sTenQuyen` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_quyen`
--

INSERT INTO `tbl_quyen` (`PK_sMaQuyen`, `sTenQuyen`) VALUES
('1', 'Admin'),
('2', 'Sinh viên'),
('3', 'Liên chi đoàn, liên chi hội'),
('4', 'Cán bộ hành chính');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_taikhoan`
--

CREATE TABLE IF NOT EXISTS `tbl_taikhoan` (
  `PK_sMaTK` varchar(50) NOT NULL,
  `sTenTK` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sMatKhau` varchar(50) NOT NULL,
  `FK_sMaQuyen` varchar(50) NOT NULL,
  `sHoTen` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sFK_Lop` varchar(50) DEFAULT NULL,
  `iGioiTinh` int(5) DEFAULT NULL,
  `dNgaySinh` date DEFAULT NULL,
  `tEmail` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dm_hanhchinh`
--
ALTER TABLE `dm_hanhchinh`
  ADD PRIMARY KEY (`PK_sMaHanhChinh`);

--
-- Indexes for table `tbl_chuongtrinh`
--
ALTER TABLE `tbl_chuongtrinh`
  ADD PRIMARY KEY (`PK_sMaChuongTrinh`),
  ADD KEY `index_ct_canbo` (`FK_sMaCB`);

--
-- Indexes for table `tbl_dangkydon`
--
ALTER TABLE `tbl_dangkydon`
  ADD PRIMARY KEY (`PK_sMaDangKy`),
  ADD KEY `index_don_canbo` (`FK_sMaCanbo`),
  ADD KEY `index_don_sv` (`FK_sMaSV`),
  ADD KEY `index_don_hc` (`FK_sMaHanhChinh`);

--
-- Indexes for table `tbl_lop`
--
ALTER TABLE `tbl_lop`
  ADD PRIMARY KEY (`PK_sMaLop`);

--
-- Indexes for table `tbl_minhchung`
--
ALTER TABLE `tbl_minhchung`
  ADD PRIMARY KEY (`PK_sMaMC`),
  ADD KEY `index_mc_sv` (`FK_sMaSV`),
  ADD KEY `index_mc_ct` (`FK_sMaCT`);

--
-- Indexes for table `tbl_quyen`
--
ALTER TABLE `tbl_quyen`
  ADD PRIMARY KEY (`PK_sMaQuyen`);

--
-- Indexes for table `tbl_taikhoan`
--
ALTER TABLE `tbl_taikhoan`
  ADD PRIMARY KEY (`PK_sMaTK`),
  ADD KEY `maQuyen` (`FK_sMaQuyen`),
  ADD KEY `index_lop_tk` (`sFK_Lop`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_dangkydon`
--
ALTER TABLE `tbl_dangkydon`
  ADD CONSTRAINT `tbl_dangkydon_ibfk_1` FOREIGN KEY (`FK_sMaHanhChinh`) REFERENCES `dm_hanhchinh` (`PK_sMaHanhChinh`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_dangkydon_ibfk_2` FOREIGN KEY (`FK_sMaSV`) REFERENCES `tbl_taikhoan` (`PK_sMaTK`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_dangkydon_ibfk_3` FOREIGN KEY (`FK_sMaCanbo`) REFERENCES `tbl_taikhoan` (`PK_sMaTK`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_minhchung`
--
ALTER TABLE `tbl_minhchung`
  ADD CONSTRAINT `tbl_minhchung_ibfk_1` FOREIGN KEY (`FK_sMaSV`) REFERENCES `tbl_taikhoan` (`PK_sMaTK`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_minhchung_ibfk_2` FOREIGN KEY (`FK_sMaCT`) REFERENCES `tbl_chuongtrinh` (`PK_sMaChuongTrinh`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_taikhoan`
--
ALTER TABLE `tbl_taikhoan`
  ADD CONSTRAINT `tbl_taikhoan_ibfk_1` FOREIGN KEY (`sFK_Lop`) REFERENCES `tbl_lop` (`PK_sMaLop`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_taikhoan_ibfk_2` FOREIGN KEY (`FK_sMaQuyen`) REFERENCES `tbl_quyen` (`PK_sMaQuyen`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
