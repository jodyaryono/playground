-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2020 at 06:33 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9
SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

SET
  AUTOCOMMIT = 0;

START TRANSACTION;

SET
  time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;

/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbarsip`
--
-- --------------------------------------------------------
--
-- Table structure for table `arsip`
--
CREATE TABLE
  `arsip` (
    `id_arsip` int (11) NOT NULL,
    `nama_arsip` varchar(50) NOT NULL,
    `id_kategori` int (11) NOT NULL,
    `tgl_arsip` date NOT NULL,
    `foto` varchar(50) NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = latin1;

--
-- Dumping data for table `arsip`
--
INSERT INTO
  `arsip` (
    `id_arsip`,
    `nama_arsip`,
    `id_kategori`,
    `tgl_arsip`,
    `foto`
  )
VALUES
  (
    10,
    'arsip12',
    3,
    '2020-03-20',
    'http://localhost/e-arsip/file/spider-verse.jpg'
  ),
  (
    12,
    'Arsip11',
    4,
    '2020-03-21',
    'http://localhost/e-arsip/file/photo_bg_yellow.jpg'
  );

-- --------------------------------------------------------
--
-- Table structure for table `kategori`
--
CREATE TABLE
  `kategori` (
    `id_kategori` int (11) NOT NULL,
    `kategori` varchar(50) NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = latin1;

--
-- Dumping data for table `kategori`
--
INSERT INTO
  `kategori` (`id_kategori`, `kategori`)
VALUES
  (3, 'Surat Dinas'),
  (4, 'Surat Keterangan Sakit'),
  (7, 'Surat Kunjungan');

-- --------------------------------------------------------
--
-- Table structure for table `login`
--
CREATE TABLE
  `login` (
    `id` int (11) NOT NULL,
    `username` varchar(25) NOT NULL,
    `password` text NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = latin1;

--
-- Dumping data for table `login`
--
INSERT INTO
  `login` (`id`, `username`, `password`)
VALUES
  (1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--
--
-- Indexes for table `arsip`
--
ALTER TABLE `arsip` ADD PRIMARY KEY (`id_arsip`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori` ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `login`
--
ALTER TABLE `login` ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--
--
-- AUTO_INCREMENT for table `arsip`
--
ALTER TABLE `arsip` MODIFY `id_arsip` int (11) NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 13;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori` MODIFY `id_kategori` int (11) NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 8;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login` MODIFY `id` int (11) NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 2;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;