-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2021 at 09:58 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

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

CREATE TABLE `dm_hanhchinh` (
  `PK_sMaHanhChinh` varchar(50) NOT NULL,
  `sTenHanhChinh` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tMota` text CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_hanhchinh`
--

INSERT INTO `dm_hanhchinh` (`PK_sMaHanhChinh`, `sTenHanhChinh`, `tMota`) VALUES
('1', 'Đăng ký vé xe bus', 'Nộp đơn xin giấy đăng ký vé xe bus'),
('2', 'Giấy xác nhận', 'Xin giấy xác nhận là sinh viên Đại học Mở Hà nội');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chuongtrinh`
--

CREATE TABLE `tbl_chuongtrinh` (
  `PK_sMaChuongTrinh` varchar(50) CHARACTER SET latin1 NOT NULL,
  `sTenCT` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tMota` text COLLATE utf8_unicode_ci,
  `FK_sMaCB` varchar(50) CHARACTER SET latin1 NOT NULL,
  `dThoiGIanBD` date NOT NULL,
  `dThoiGIanKT` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_chuongtrinh`
--

INSERT INTO `tbl_chuongtrinh` (`PK_sMaChuongTrinh`, `sTenCT`, `tMota`, `FK_sMaCB`, `dThoiGIanBD`, `dThoiGIanKT`) VALUES
('1', 'Nghiên cứu khoa học', 'Tham gia nghiên cứu khoa học theo nhóm', '1', '2021-04-01', '2021-06-01'),
('2', 'Music Award HOU', 'Tham gia nghệ thuật âm nhạc', '1', '2021-05-01', '2021-07-10'),
('3', 'Học Quân Sự', 'Tham gia quan su tai Van Giang Hung Yen', '1', '2021-05-03', '2021-07-11'),
('4', 'fithou xanh', 'Tham gia tình nguyện', '1', '2021-04-01', '2021-07-12'),
('mact5', 'Đọc sách', 'Chương trình ngày hội đọc sách quốc tế', '1', '2021-06-01', '2021-06-03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dangkydon`
--

CREATE TABLE `tbl_dangkydon` (
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

CREATE TABLE `tbl_lop` (
  `PK_sMaLop` varchar(50) NOT NULL,
  `sTenLop` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_lop`
--

INSERT INTO `tbl_lop` (`PK_sMaLop`, `sTenLop`) VALUES
('1', '2010A03'),
('2', '1910A01'),
('3', '1910A02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_minhchung`
--

CREATE TABLE `tbl_minhchung` (
  `PK_sMaMC` varchar(50) NOT NULL,
  `FK_sMaSV` varchar(50) NOT NULL,
  `FK_sMaCT` varchar(50) NOT NULL,
  `tLink` text NOT NULL,
  `sTrangthai` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_minhchung`
--

INSERT INTO `tbl_minhchung` (`PK_sMaMC`, `FK_sMaSV`, `FK_sMaCT`, `tLink`, `sTrangthai`) VALUES
('16247803821041', '20A10010123', '3', 'link2', 'Chưa duyệt'),
('16247803825972', '20A10010123', '4', 'link3', 'Chưa duyệt'),
('1624780382610', '20A10010123', '2', 'link1', 'Chưa duyệt');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quyen`
--

CREATE TABLE `tbl_quyen` (
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

CREATE TABLE `tbl_taikhoan` (
  `PK_sMaTK` varchar(50) NOT NULL,
  `sTenTK` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sMatKhau` varchar(50) NOT NULL,
  `FK_sMaQuyen` varchar(50) NOT NULL,
  `sHoTen` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sFK_Lop` varchar(50) DEFAULT NULL,
  `iGioiTinh` int(5) DEFAULT NULL,
  `dNgaySinh` char(10) DEFAULT NULL,
  `tEmail` text,
  `sTrangThai` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_taikhoan`
--

INSERT INTO `tbl_taikhoan` (`PK_sMaTK`, `sTenTK`, `sMatKhau`, `FK_sMaQuyen`, `sHoTen`, `sFK_Lop`, `iGioiTinh`, `dNgaySinh`, `tEmail`, `sTrangThai`) VALUES
('20A10010123', '20A10010123', '356a192b7913b04c54574d18c28d46e6395428ab', '2', 'Phạm Thảo', '1', 2, '26/11/2002', '20A10010123@students.hou.edu.vn', 'Chưa duyệt'),
('admin', 'admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1', 'admin', NULL, NULL, NULL, NULL, '');

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
