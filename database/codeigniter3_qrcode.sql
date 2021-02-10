-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2021 at 09:13 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codeigniter3_qrcode`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_qr`
--

CREATE TABLE `tbl_qr` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `content` text NOT NULL COMMENT 'QR Content',
  `file` text NOT NULL COMMENT 'QR File Path'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Table QR';

--
-- Dumping data for table `tbl_qr`
--

INSERT INTO `tbl_qr` (`id`, `content`, `file`) VALUES
(1, 'https://github.com/', '/assets/media/qrcode/68747470733a2f2f6769746875622e636f6d2f.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_qr`
--
ALTER TABLE `tbl_qr`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_qr`
--
ALTER TABLE `tbl_qr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
