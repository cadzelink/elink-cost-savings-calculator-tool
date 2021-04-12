-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2021 at 07:41 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `rm_sales`
--

-- --------------------------------------------------------

--
-- Table structure for table `calculator`
--

CREATE TABLE `calculator` (
  `id` int(10) UNSIGNED NOT NULL,
  `product` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `gross` decimal(7,2) NOT NULL DEFAULT 0.00,
  `net` decimal(7,2) NOT NULL DEFAULT 0.00,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `calculator`
--

INSERT INTO `calculator` (`id`, `product`, `gross`, `net`, `status`) VALUES
(1, '2021 Virtual Book Tour', '4247.00', '1499.00', 1),
(2, 'TFOS', '650.00', '650.00', 1),
(3, 'LATFOB', '650.00', '650.00', 1),
(4, 'NYLA', '650.00', '650.00', 1),
(5, 'WTO (3 months)', '1197.00', '1197.00', 1),
(6, 'Indie Book Trio', '4297.00', '2799.00', 1),
(7, 'BlueInk Review', '1299.00', '1299.00', 1),
(8, 'Foreword Review', '1299.00', '1299.00', 1),
(9, 'Kirkus Review', '1699.00', '1699.00', 1),
(10, '2021 TFOS - Starter', '1750.00', '499.00', 1),
(11, 'London Book Fair', '1100.00', '1100.00', 1),
(12, 'DW - Basic', '999.00', '999.00', 1),
(13, 'WTO - Bronze', '2394.00', '2394.00', 1),
(14, 'WTO - Platinum', '7194.00', '7194.00', 1),
(15, 'Radio Interview w Kate D', '1599.00', '1599.00', 1),
(16, 'PW - Half Page', '9899.00', '9899.00', 1),
(17, 'Book Trailer - Cinematic Deluxe', '4999.00', '4999.00', 1),
(18, 'Youtube Ad - 3 mos.', '2997.00', '2997.00', 1),
(19, 'BW - Iron', '899.00', '899.00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calculator`
--
ALTER TABLE `calculator`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `prod_key` (`product`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calculator`
--
ALTER TABLE `calculator`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;
