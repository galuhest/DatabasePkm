-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2015 at 09:59 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pkm`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`id` int(11) NOT NULL,
  `name` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `updated_at`, `created_at`) VALUES
(1, 'PKM-P', '2015-08-22 11:21:06', '0000-00-00 00:00:00'),
(2, 'PKM-T', '2015-08-22 11:21:06', '0000-00-00 00:00:00'),
(3, 'PKM-K', '2015-08-22 11:21:06', '0000-00-00 00:00:00'),
(4, 'PKM-M', '2015-08-22 11:21:06', '0000-00-00 00:00:00'),
(5, 'PKM-KC', '2015-09-09 16:03:44', '0000-00-00 00:00:00'),
(6, 'PKM-AI', '2015-08-22 11:21:06', '0000-00-00 00:00:00'),
(7, 'PKM-GT', '2015-08-22 11:21:06', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE IF NOT EXISTS `faculties` (
`id` int(11) NOT NULL,
  `name` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `name`, `updated_at`, `created_at`) VALUES
(1, 'Fakultas Kedokteran', '2015-08-22 10:52:57', '0000-00-00 00:00:00'),
(2, 'Fakultas Ekonomi & Bisnis', '2015-08-22 10:52:57', '0000-00-00 00:00:00'),
(3, 'Fakultas Hukum', '2015-08-22 10:52:57', '0000-00-00 00:00:00'),
(4, 'Fakultas Kedokteran Gigi', '2015-08-22 10:52:57', '0000-00-00 00:00:00'),
(5, 'Fakultas Teknik', '2015-08-22 10:52:57', '0000-00-00 00:00:00'),
(6, 'Fakultas Ilmu Budaya', '2015-08-22 10:52:57', '0000-00-00 00:00:00'),
(7, 'Fakultas Psikologi', '2015-08-22 10:52:57', '0000-00-00 00:00:00'),
(8, 'Fakultas Kesehatan Masyarakat', '2015-08-22 10:52:57', '0000-00-00 00:00:00'),
(9, 'Fakultas Matematika & IPA', '2015-08-22 10:52:57', '0000-00-00 00:00:00'),
(10, 'Fakultas Ilmu Sosial & Ilmu Politik', '2015-08-22 10:52:57', '0000-00-00 00:00:00'),
(11, 'Fakultas Ilmu Komputer', '2015-08-22 10:52:57', '0000-00-00 00:00:00'),
(12, 'Fakultas Ilmu Keperawatan', '2015-08-22 10:52:57', '0000-00-00 00:00:00'),
(13, 'Fakultas Farmasi', '2015-08-22 10:52:57', '0000-00-00 00:00:00'),
(14, 'Fakultas Ilmu Administrasi', '2015-08-22 10:52:57', '0000-00-00 00:00:00'),
(15, 'Vokasi', '2015-08-22 10:53:46', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pkm`
--

CREATE TABLE IF NOT EXISTS `pkm` (
`id` int(11) NOT NULL,
  `title` text,
  `category` int(11) NOT NULL,
  `leader` text,
  `year` text,
  `status` int(11) NOT NULL,
  `file` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `uploader` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pkm`
--

INSERT INTO `pkm` (`id`, `title`, `category`, `leader`, `year`, `status`, `file`, `updated_at`, `created_at`, `uploader`) VALUES
(3, 'judul', 1, 'leader', '2012', 1, 0, '2015-08-20 03:11:26', '2015-08-20 03:11:26', 0),
(4, 'judul', 1, 'leader', '2012', 1, 0, '2015-08-20 03:13:04', '2015-08-20 03:13:04', 0),
(5, 'judul', 1, 'leader', '2012', 1, 0, '2015-08-20 03:14:55', '2015-08-20 03:14:55', 0),
(6, 'judul', 1, 'leader', '2012', 1, 0, '2015-08-20 03:15:23', '2015-08-20 03:15:23', 0),
(7, 'judul', 1, 'leader', '2012', 1, 0, '2015-08-20 03:15:42', '2015-08-20 03:15:42', 0),
(8, 'aa', 2, 'ss', '1992', 2, 0, '2015-08-21 21:22:11', '2015-08-21 21:22:11', 0),
(9, 'ww', 1, 'dd', '4545', 2, 0, '2015-08-21 23:26:58', '2015-08-21 23:26:58', 0),
(10, 'qwert', 2, 'ss', '1992', 1, 0, '2015-08-26 23:36:48', '2015-08-26 23:36:48', 1),
(11, '141213', 4, '242423', '4589', 2, 0, '2015-08-28 23:15:16', '2015-08-28 23:15:16', 2),
(12, '333', 3, '555', '331', 3, 0, '2015-08-29 20:29:38', '2015-08-29 20:29:38', 2),
(13, 'seseorang', 3, 'seseorang', '2015', 1, 0, '2015-08-31 01:01:01', '2015-08-31 01:01:01', 3),
(14, 'tes tes 123', 7, 'bukan siapa siapa', '01', 3, 0, '2015-09-05 23:56:33', '2015-09-05 23:56:33', 2),
(15, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 3, 'ddddddddddddd', 'qqqqqqqqqqqqqqqqq', 3, 0, '2015-09-06 06:20:39', '2015-09-06 06:20:39', 2),
(16, 'a', 7, 's', 'd', 0, 0, '2015-09-09 02:23:05', '2015-09-09 02:23:05', 4),
(17, 'test17', 5, 'nobody', '2014', 1, 0, '2015-09-09 09:38:30', '2015-09-09 09:38:30', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` text NOT NULL,
  `npm` text NOT NULL,
  `faculty` int(11) NOT NULL,
  `phone_num` text NOT NULL,
  `role` int(11) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `npm`, `faculty`, `phone_num`, `role`, `updated_at`, `created_at`) VALUES
(2, 'galuh.estya', '', 12, '1312123', 2, '2015-09-06 07:16:13', '2015-08-28 23:14:07'),
(3, 'ekanaradhipa.d', '', 0, '212345678', 1, '2015-08-31 00:59:58', '2015-08-31 00:59:58'),
(4, 'luthfi.abdurrahim', '1406557535', 0, '087884187967', 1, '2015-09-09 02:23:04', '2015-09-08 23:46:39'),
(5, 'luthfi.abdurrahim', '1406557535', 0, 'ajsdkasdlkjasd', 0, '2015-09-08 23:46:45', '2015-09-08 23:46:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pkm`
--
ALTER TABLE `pkm`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `pkm`
--
ALTER TABLE `pkm`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
