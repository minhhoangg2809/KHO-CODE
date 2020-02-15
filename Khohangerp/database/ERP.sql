-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2020 at 06:00 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanly_erp`
--
CREATE DATABASE IF NOT EXISTS `quanly_erp` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `quanly_erp`;

-- --------------------------------------------------------

--
-- Table structure for table `chitiet_nhap`
--

DROP TABLE IF EXISTS `chitiet_nhap`;
CREATE TABLE `chitiet_nhap` (
  `id_ctnhap` int(11) NOT NULL,
  `id_nhap` int(11) NOT NULL,
  `id_mathang` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongianhap` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chitiet_nhap`
--

INSERT INTO `chitiet_nhap` (`id_ctnhap`, `id_nhap`, `id_mathang`, `soluong`, `dongianhap`) VALUES
(1, 1, 16, 100, 1000000),
(2, 2, 13, 100, 500000),
(3, 2, 13, 100, 500000),
(4, 2, 13, 300, 300000),
(5, 2, 13, 300, 300000),
(6, 2, 13, 300, 300000),
(7, 3, 13, 10, 200000);

-- --------------------------------------------------------

--
-- Table structure for table `chitiet_xuat`
--

DROP TABLE IF EXISTS `chitiet_xuat`;
CREATE TABLE `chitiet_xuat` (
  `id_ctxuat` int(11) NOT NULL,
  `id_mathang` int(11) NOT NULL,
  `id_xuat` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongiaxuat` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chitiet_xuat`
--

INSERT INTO `chitiet_xuat` (`id_ctxuat`, `id_mathang`, `id_xuat`, `soluong`, `dongiaxuat`) VALUES
(2, 13, 3, 100, 100000),
(3, 16, 4, 10, 900000),
(4, 13, 5, 10, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

DROP TABLE IF EXISTS `danhmuc`;
CREATE TABLE `danhmuc` (
  `id_danhmuc` int(11) NOT NULL,
  `ten_danhmuc` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `loai` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`id_danhmuc`, `ten_danhmuc`, `loai`) VALUES
(3, 'Danh mục 1', 'Danh mục 1'),
(4, 'Danh mục 2', 'Danh mục 2'),
(5, 'Danh mục 3', 'Danh mục 3');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

DROP TABLE IF EXISTS `khachhang`;
CREATE TABLE `khachhang` (
  `id_khachhang` int(11) NOT NULL,
  `ten_khachhang` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `sodienthoai` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `gmail` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `solanmua` int(11) DEFAULT '0',
  `diachi` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`id_khachhang`, `ten_khachhang`, `sodienthoai`, `gmail`, `solanmua`, `diachi`) VALUES
(1, 'Giáp Minh Hoàng', '0990909090', 'hoang@gmail.com', 0, 'HN'),
(2, 'Hoang 2', '0979797979', '33ABC@gmail.com', 0, 'HN');

-- --------------------------------------------------------

--
-- Table structure for table `mathang`
--

DROP TABLE IF EXISTS `mathang`;
CREATE TABLE `mathang` (
  `id_mathang` int(11) NOT NULL,
  `ma_mathang` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `ten_mathang` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `soluonght` int(11) DEFAULT NULL,
  `gia` double DEFAULT NULL,
  `donvitinh` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `ngaynhapkhomoinhat` date DEFAULT NULL,
  `id_danhmuc` int(11) DEFAULT NULL,
  `id_nhacungcap` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `mathang`
--

INSERT INTO `mathang` (`id_mathang`, `ma_mathang`, `ten_mathang`, `soluonght`, `gia`, `donvitinh`, `ngaynhapkhomoinhat`, `id_danhmuc`, `id_nhacungcap`) VALUES
(13, 'MH-44530', 'máy siêu âm', 500, 100000, 'máy', '2020-02-13', 4, 4),
(14, 'MH-35235', 'máy chụp ', 0, 50000000, 'máy', NULL, 3, 5),
(15, 'MH-45384', 'Máy chiếu', 0, 9000000, 'máy', NULL, 4, 5),
(16, 'MH-52450', 'máy siêu âm 2', 50, 900000, 'máy ', '2020-02-12', 5, 2),
(17, 'MH-52294', 'máy đo', 0, 10000000, 'Máy', NULL, 5, 2),
(19, 'MH-44580', 'máy siêu âm II', 0, 100000, 'máy', NULL, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `nhacungcap`
--

DROP TABLE IF EXISTS `nhacungcap`;
CREATE TABLE `nhacungcap` (
  `id_nhacungcap` int(11) NOT NULL,
  `ten_nhacungcap` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `diachi` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `gmail` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `sodienthoai` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `ngayhoptac` date DEFAULT NULL,
  `loaisanpham` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `nguoidaidien` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `nhacungcap`
--

INSERT INTO `nhacungcap` (`id_nhacungcap`, `ten_nhacungcap`, `diachi`, `gmail`, `sodienthoai`, `ngayhoptac`, `loaisanpham`, `nguoidaidien`) VALUES
(1, 'Công ty A', 'USA', 'AAA@gmail.com', '0990909090', '2010-10-10', 'máy đo', 'Trump'),
(2, 'Công ty B', 'USA', 'BBA@gmail.com', '0990909090', '2010-10-10', 'máy đo', 'Trump'),
(3, 'Công ty C', 'USA', 'SA@gmail.com', '0990909090', '2010-10-10', 'máy đo', 'Trump'),
(4, 'Công ty D', 'USA', 'DDD@gmail.com', '0990909090', '2010-10-10', 'máy đo', 'Trump'),
(5, 'Công ty E', 'USA', 'EEE@gmail.com', '0990909090', '2010-10-10', 'máy đo', 'Trump'),
(6, 'Công ty F', 'USA', 'FFA@gmail.com', '0990909090', '2010-10-10', 'máy đo', 'Trump'),
(7, 'Công ty G', 'USA', 'GGG@gmail.com', '0990909090', '2010-10-10', 'máy đo', 'Trump'),
(8, 'Công ty H', 'USA', 'HHH@gmail.com', '0990909090', '2010-10-10', 'máy đo', 'Trump'),
(9, 'Công ty I', 'USA', 'IYI@gmail.com', '0990909090', '2010-10-10', 'máy đo', 'Trump'),
(10, 'Công ty K', 'USA', 'KKK@gmail.com', '0990909090', '2010-10-10', 'máy đo', 'Trump');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

DROP TABLE IF EXISTS `nhanvien`;
CREATE TABLE `nhanvien` (
  `id_nhanvien` int(11) NOT NULL,
  `ten_nhanvien` varchar(255) COLLATE utf8_bin NOT NULL,
  `ngaysinh` date DEFAULT NULL,
  `quequan` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `dantoc` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `diachi` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `nhaphang`
--

DROP TABLE IF EXISTS `nhaphang`;
CREATE TABLE `nhaphang` (
  `id_nhap` int(11) NOT NULL,
  `nhanvien` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `ngaynhap` date DEFAULT NULL,
  `id_nhacungcap` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `nhaphang`
--

INSERT INTO `nhaphang` (`id_nhap`, `nhanvien`, `ngaynhap`, `id_nhacungcap`) VALUES
(1, 'Hoang', '2020-02-12', 2),
(2, 'Hoang', '2020-02-12', 4),
(3, 'Hoang', '2020-02-13', 4);

-- --------------------------------------------------------

--
-- Table structure for table `xuathang`
--

DROP TABLE IF EXISTS `xuathang`;
CREATE TABLE `xuathang` (
  `id_xuat` int(11) NOT NULL,
  `nhanvien` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngayxuat` date DEFAULT NULL,
  `id_khachhang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `xuathang`
--

INSERT INTO `xuathang` (`id_xuat`, `nhanvien`, `ngayxuat`, `id_khachhang`) VALUES
(3, 'Hoang', '2020-02-12', 1),
(4, 'Hoang', '2020-02-13', 1),
(5, 'Hoang', '2020-02-13', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitiet_nhap`
--
ALTER TABLE `chitiet_nhap`
  ADD PRIMARY KEY (`id_ctnhap`);

--
-- Indexes for table `chitiet_xuat`
--
ALTER TABLE `chitiet_xuat`
  ADD PRIMARY KEY (`id_ctxuat`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id_khachhang`);

--
-- Indexes for table `mathang`
--
ALTER TABLE `mathang`
  ADD PRIMARY KEY (`id_mathang`);

--
-- Indexes for table `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`id_nhacungcap`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`id_nhanvien`);

--
-- Indexes for table `nhaphang`
--
ALTER TABLE `nhaphang`
  ADD PRIMARY KEY (`id_nhap`);

--
-- Indexes for table `xuathang`
--
ALTER TABLE `xuathang`
  ADD PRIMARY KEY (`id_xuat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chitiet_nhap`
--
ALTER TABLE `chitiet_nhap`
  MODIFY `id_ctnhap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `chitiet_xuat`
--
ALTER TABLE `chitiet_xuat`
  MODIFY `id_ctxuat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id_danhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id_khachhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mathang`
--
ALTER TABLE `mathang`
  MODIFY `id_mathang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `id_nhacungcap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `id_nhanvien` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nhaphang`
--
ALTER TABLE `nhaphang`
  MODIFY `id_nhap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `xuathang`
--
ALTER TABLE `xuathang`
  MODIFY `id_xuat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
