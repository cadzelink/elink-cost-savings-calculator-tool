-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 14, 2021 at 03:19 PM
-- Server version: 5.7.33-0ubuntu0.16.04.1
-- PHP Version: 7.2.34-18+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `gross` decimal(7,2) NOT NULL DEFAULT '0.00',
  `net` decimal(7,2) NOT NULL DEFAULT '0.00',
  `status` tinyint(4) NOT NULL DEFAULT '1'
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
(16, 'PW - Half Page', '12998.00', '9899.00', 1),
(17, 'Book Trailer - Cinematic Deluxe', '4999.00', '4999.00', 1),
(18, 'Youtube Ad - 3 mos.', '2997.00', '2997.00', 1),
(19, 'BW - Iron', '899.00', '899.00', 1),
(20, 'DW - Deluxe', '1699.00', '1699.00', 1),
(21, 'DW - Premium', '2599.00', '2599.00', 1),
(22, 'WTO - Silver', '4194.00', '4194.00', 1),
(23, 'WTO - Gold', '5994.00', '5994.00', 1),
(24, 'PW - Single Slot', '2499.00', '2499.00', 1),
(25, 'PW - Double Slot', '6237.60', '4699.00', 1),
(26, 'PW - Full Page', '18093.00', '13999.00', 1),
(27, 'BW - Bronze', '1499.00', '1499.00', 1),
(28, 'BW - Silver', '4698.00', '3499.00', 1),
(29, 'BW - Gold', '9048.00', '6499.00', 1),
(30, 'BW - Platinum', '15998.00', '12499.00', 1),
(31, 'FC - Iron', '999.00', '999.00', 1),
(32, 'FC - Bronze', '1999.00', '1999.00', 1),
(33, 'FC - Silver', '5198.00', '3999.00', 1),
(34, 'FC - Gold', '9548.00', '6999.00', 1),
(35, 'FC - Platinum', '16498.00', '12999.00', 1),
(36, 'CB - Folklore', '1999.00', '1999.00', 1),
(37, 'CB - Fairytale', '2999.00', '2999.00', 1),
(38, 'CB - Fantasy', '3999.00', '3999.00', 1),
(39, 'eBook - Basic', '669.00', '400.00', 1),
(40, 'eBook - Conversion Basic', '300.00', '300.00', 1),
(41, 'eBook - Conversion Advanced', '350.00', '350.00', 1),
(42, 'OBP - Silver', '1699.00', '1699.00', 1),
(43, 'OBP - Gold', '2944.00', '2599.00', 1),
(44, 'OBP - Platinum', '5893.00', '5499.00', 1),
(45, 'BT - Teaser', '1999.00', '1999.00', 1),
(46, 'BT - with YouTube Advertising', '3999.00', '3999.00', 1),
(47, 'BT - Cinematic Standard', '3499.00', '3499.00', 1),
(48, 'YouTube Advertising', '999.00', '999.00', 1),
(49, 'WebPress Release - WPR', '200.00', '200.00', 1),
(50, 'INDIE BOOK REVIEW BUNDLE', '9093.00', '3499.00', 1),
(51, 'Marketing Kit 100', '359.00', '359.00', 1),
(52, 'Marketing Kit 250', '897.50', '599.00', 1),
(53, 'Marketing Kit 500', '1795.00', '999.00', 1),
(54, 'Marketing Kit Starter', '379.00', '379.00', 1),
(55, 'Marketing Kit Pro', '499.00', '499.00', 1),
(56, 'Radio Interview w Ric Bratton', '699.00', '699.00', 1),
(57, 'Radio Interview w Benjie Cole', '1599.00', '1599.00', 1),
(58, 'Combo Radio Int - Ric + Kate', '2298.00', '1999.00', 1),
(59, 'Trio Radio Int - Ric + Kate + Benjie', '3897.00', '3398.00', 1),
(60, 'US Copyright Registration - Add On Service', '190.00', '190.00', 1),
(61, 'Hardcover Availability w/ ISBN - Add On Service', '269.00', '269.00', 1),
(62, 'Resubmission w/ ISBN (per version) - Add On Service', '249.00', '249.00', 1),
(63, 'Paper Gallery Service - Add On Service', '100.00', '100.00', 1),
(64, 'Illustration - Artistic - Add On Service', '199.00', '199.00', 1),
(65, 'Illustration x 10 - Artistic - Add On Service', '1990.00', '1779.00', 1),
(66, 'Illustration x 15 - Artistic - Add On Service', '2985.00', '2389.00', 1),
(67, 'Illustration - Vivid - Add On Service', '239.00', '239.00', 1),
(68, 'Illustration x 10 - Vivid - Add On Service', '2390.00', '2199.00', 1),
(69, 'Illustration x 15 - Vivid- Add On Service', '3585.00', '2899.00', 1),
(70, 'Illustration - Intricate - Add On Service', '279.00', '279.00', 1),
(71, 'Illustration x 10 - Intricate - Add On Service', '2790.00', '2699.00', 1),
(72, 'Illustration x 15 - Intricate - Add On Service', '4185.00', '3899.00', 1),
(73, 'Basic Cover Design - Add On Service', '150.00', '150.00', 1),
(74, 'Standard Cover Design - Add On Service', '250.00', '250.00', 1),
(75, 'Advanced Cover Design - Add On Service', '130.00', '300.00', 1),
(76, 'Image Enhancement (per image) - Add On Service', '35.00', '35.00', 1),
(77, 'Additional Interior Image (per item)- Add On Service', '15.00', '15.00', 1),
(78, 'Additional Interior Graphics & Tables (per item) - Add On Service', '25.00', '25.00', 1),
(79, 'Basic Interior Text and Layout - Add On Service', '150.00', '150.00', 1),
(80, 'Standard  Interior Text and Layout - Add On Service', '250.00', '250.00', 1),
(81, 'Advanced Interior Text and Layout - Add On Service', '300.00', '300.00', 1),
(82, 'Audiobook - First 5000 Words', '1399.00', '1399.00', 1),
(83, 'Audiobook - Excess Words', '0.10', '0.10', 1),
(84, 'Revision - Interior Text (per word) - Add On Service', '0.13', '0.13', 1);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;