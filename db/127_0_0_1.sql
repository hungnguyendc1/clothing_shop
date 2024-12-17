-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 23, 2024 at 04:51 AM
-- Server version: 8.3.0
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clothingshop`
--
CREATE DATABASE IF NOT EXISTS `clothingshop` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `clothingshop`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `ADMIN`;
CREATE TABLE IF NOT EXISTS `ADMIN` (
  `ID` varchar(5) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Passwd` varchar(255) NOT NULL,
  `Image` text NOT NULL,
  `Contact` varchar(255) NOT NULL,
  `Address` text NOT NULL,
  `Position` varchar(255) NOT NULL,
  `About` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `admin`
--

INSERT INTO `ADMIN` (`ID`, `Name`, `Email`, `Passwd`, `Image`, `Contact`, `Address`, `Position`, `About`) VALUES
('ad01', 'admin', 'admin@gmail.com', '123', 'ad02.jpg', '0123456789', '180 cao lỗ', '1', '                                                                                                                                                                        ');

-- --------------------------------------------------------

--
-- Table structure for table `ct_hoadon`
--

DROP TABLE IF EXISTS `CT_HOADON`;
CREATE TABLE IF NOT EXISTS `CT_HOADON` (
  `MA_HD` int NOT NULL,
  `MA_SP` varchar(10) NOT NULL,
  `SOLUONG` int NOT NULL,
  `TONGTIEN` int NOT NULL,
  PRIMARY KEY (`MA_HD`,`MA_SP`),
  KEY `FK_SP` (`MA_SP`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `ct_hoadon`
--

INSERT INTO `CT_HOADON` (`MA_HD`, `MA_SP`, `SOLUONG`, `TONGTIEN`) VALUES
(1511171558, 'ao01', 1, 320000),
(1511171713, 'ao01', 1, 320000),
(1511190104, 'giay02', 1, 2500000),
(1511210112, 'ao04', 1, 340000),
(1711190111, 'ao04', 1, 340000),
(1711190111, 'ao05', 1, 420000),
(1711211443, 'ao05', 1, 420000),
(1711211443, 'giay02', 1, 2500000),
(1811190546, 'giay02', 1, 2500000),
(1911230403, 'ao01', 1, 320000);

-- --------------------------------------------------------

--
-- Table structure for table `hangsx`
--

DROP TABLE IF EXISTS `HANGSX`;
CREATE TABLE IF NOT EXISTS `HANGSX` (
  `MA_HANGSX` varchar(10) NOT NULL,
  `TEN_HANGSX` varchar(50) NOT NULL,
  PRIMARY KEY (`MA_HANGSX`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `hangsx`
--

INSERT INTO `HANGSX` (`MA_HANGSX`, `TEN_HANGSX`) VALUES
('H001', 'MISSOUT'),
('H002', 'ADIDAS'),
('H004', 'CONVERSE');

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

DROP TABLE IF EXISTS `HOADON`;
CREATE TABLE IF NOT EXISTS `HOADON` (
  `MA_HD` int NOT NULL AUTO_INCREMENT,
  `MA_KH` int NOT NULL,
  `TONGTIEN` int NOT NULL,
  `TRANGTHAI` text,
  PRIMARY KEY (`MA_HD`)
) ENGINE=InnoDB AUTO_INCREMENT=1911230404 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `HOADON` (`MA_HD`, `MA_KH`, `TONGTIEN`, `TRANGTHAI`) VALUES
(1511171558, 15, 320000, 'Chưa Thanh Toán'),
(1511171713, 15, 320000, 'Chưa Thanh Toán'),
(1511190104, 15, 2500000, 'Chưa Thanh Toán'),
(1511210112, 15, 340000, 'Chưa Thanh Toán'),
(1711190111, 17, 760000, 'Chưa Thanh Toán'),
(1711211443, 17, 2920000, 'Chưa Thanh Toán'),
(1811190546, 18, 2500000, 'Chưa Thanh Toán'),
(1911230403, 19, 320000, 'Chưa Thanh Toán');

-- --------------------------------------------------------

--
-- Table structure for table `kh`
--

DROP TABLE IF EXISTS `KH`;
CREATE TABLE IF NOT EXISTS `KH` (
  `MA_KH` int NOT NULL AUTO_INCREMENT,
  `TEN_KH` varchar(50) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `MATKHAU` varchar(255) NOT NULL,
  `DIACHI` varchar(100) DEFAULT NULL,
  `DIENTHOAI` varchar(10) DEFAULT NULL,
  `AVATAR` varchar(500) DEFAULT NULL,
  `TRANGTHAI` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`MA_KH`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `kh`
--

INSERT INTO `KH` (`MA_KH`, `TEN_KH`, `EMAIL`, `MATKHAU`, `DIACHI`, `DIENTHOAI`, `AVATAR`, `TRANGTHAI`) VALUES
(15, 'Hùng', 'hung@gmail.com', '123456', 'PY', '012345678', 'kh01.jpg', ''),
(16, 'My', 'my@gmail.com', '123456', 'HCM', '7777777777', 'kh02.jpg', NULL),
(17, 'Hiển', 'hien@gmail.com', '123456', 'hcm', '123123123', 'kh02.jpg', NULL),
(18, 'Duc', 'duc@gmail.com', '123456', 'Quan 8 HCM', '012121212', 'kh01.jpg', NULL),
(19, 'ceoduc', 'ceoduc@gmail.com', '123456', 'Quan 8 HCM', '1213224134', 'kh01.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `loaisp`
--

DROP TABLE IF EXISTS `LOAISP`;
CREATE TABLE IF NOT EXISTS `LOAISP` (
  `MA_LOAISP` varchar(10) NOT NULL,
  `TEN_LOAISP` varchar(50) NOT NULL,
  PRIMARY KEY (`MA_LOAISP`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `loaisp`
--

INSERT INTO `LOAISP` (`MA_LOAISP`, `TEN_LOAISP`) VALUES
('L001', 'Giày'),
('L002', 'Áo'),
('L003', 'Quần'),
('L004', 'Túi');

-- --------------------------------------------------------

--
-- Table structure for table `sp`
--

DROP TABLE IF EXISTS `SP`;
CREATE TABLE IF NOT EXISTS `SP` (
  `MA_SP` varchar(10) NOT NULL,
  `TEN_SP` varchar(50) NOT NULL,
  `MA_LOAISP` varchar(10) NOT NULL,
  `MA_HANGSX` varchar(10) NOT NULL,
  `MIEUTA_SP` text,
  `HINHANH_SP` text,
  `GIA` bigint NOT NULL,
  PRIMARY KEY (`MA_SP`),
  KEY `MA_LOAISP` (`MA_LOAISP`),
  KEY `MA_HANGSX` (`MA_HANGSX`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `sp`
--

INSERT INTO `SP` (`MA_SP`, `TEN_SP`, `MA_LOAISP`, `MA_HANGSX`, `MIEUTA_SP`, `HINHANH_SP`, `GIA`) VALUES
('ao01', 'TEE SNOW BEAR', 'L002', 'H001', 'Chất liệu vải cotton 100% 2 chiều\r\nSize: S/M/L\r\n                             \r\n                            ', 'ao01.jpg', 320000),
('ao03', 'MELTING CHEESE', 'L002', 'H001', 'Chất liệu vải cotton 100% 2 chiều\r\nColor: ĐEN, TRẮNG\r\nSize: S/M/L\r\n                            ', 'ao03.jpg', 350000),
('ao04', 'SPACE TEE MST', 'L002', 'H001', 'Chất liệu vải cotton 100% 2 chiều\r\nColor: XÁM, TRẮNG\r\nSize: S/M/L\r\n                             \r\n                            ', 'ao04.jpg', 340000),
('ao05', 'CARDIGAN LOGO M', 'L002', 'H001', 'Size S/M/L', 'ao05.jpg', 420000),
('ao06', 'SÆ  MI LOGO ( SHIRT )', 'L002', 'H001', 'Size S/M/L', 'ao06.png', 380000),
('ao07', 'LOGO LINE TEE', 'L002', 'H001', 'Chất liệu vải cotton 100% 2 chiều\r\nColor:TRẮNG\r\nSize: S/M/L\r\n\r\nHãy cận thận cân nhắc size trước khi đặt hàng bạn nhé, shop có đổi trả hàng bạn cứ yên tâm nhá!', 'ao07.jpg', 320000),
('giay01', 'MST LOGO SLIPPER', 'L001', 'H001', 'Size 1 : 36-37 (23cm )\r\nSize 2 : 38-39 (25cm ) \r\nSize 3 : 40-41. ( 26.5cm) \r\nSize 4 : 42-43. (28cm )\r\n\r\nÄá»‘i vá»›i dÃ©p shop khÃ´ng há»— trá»£ Ä‘á»•i size nÃªn báº¡n Ä‘o chiá»u dÃ i chÃ¢n trÆ°á»›c khi Ä‘áº·t hÃ ng hoáº·c liÃªn há»‡ vá»›i shop qua insta/fb Ä‘á»ƒ Ä‘Æ°á»£c tÆ° váº¥n size nha <3\r\n                             \r\n                             \r\n                             \r\n                            ', 'giay01.jpg', 380000),
('giay02', 'ZX 1K BOOST', 'L001', 'H002', 'Size 3.5UK  4UK  4.5UK  5UK  5.5UK  6UK', 'giay02.jpg', 2500000),
('giay03', 'CHUCK TAYLOR ALL STAR MADISON HYBRID SHINE', 'L001', 'H004', 'Color: Black/White/Black\r\nSize: 5.5US - 8.5US Women', 'giay03.jpg', 1500000),
('quan01', 'LOGO PANTS', 'L003', 'H001', 'Color: Black Size: S/M/L\r\nChất liệu: Kaki.\r\nTAG kim loại thiêu login nổi\r\n                            ', 'quan01.jpg', 420000),
('quan02', 'SWEATPANTS LOGO', 'L003', 'H001', 'Size S/M/L\r\n                            ', 'quan02.jpg', 380000),
('tui01', 'Wallet Logo', 'L004', 'H004', ' \r\n                             \r\n                            ', 'tui01.jpg', 250000),
('tui02', 'BACKPACK LOGO MISSOUT', 'L004', 'H001', 'Balo gồm 1 Balo kết hợp 1 Túi mini\r\nChất liệu: Vải bố 900pvc.\r\nTrang bị: Túi hộp/ Tag nhựa/ Miếng lót mềm giảm sức nặng.\r\n                            ', 'tui02.jpg', 580000),
('tui03', 'MST SHOULDER BAG', 'L004', 'H001', 'Size: 40x29x12\r\nBLACK ONLY\r\n                            ', 'tui03.jpg', 350000);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ct_hoadon`
--
ALTER TABLE `CT_HOADON`
  ADD CONSTRAINT `FK_HD` FOREIGN KEY (`MA_HD`) REFERENCES `HOADON` (`MA_HD`),
  ADD CONSTRAINT `FK_SP` FOREIGN KEY (`MA_SP`) REFERENCES `SP` (`MA_SP`);

--
-- Constraints for table `sp`
--
ALTER TABLE `SP`
  ADD CONSTRAINT `sp_ibfk_1` FOREIGN KEY (`MA_LOAISP`) REFERENCES `LOAISP` (`MA_LOAISP`),
  ADD CONSTRAINT `sp_ibfk_2` FOREIGN KEY (`MA_HANGSX`) REFERENCES `HANGSX` (`MA_HANGSX`);