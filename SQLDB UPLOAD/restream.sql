-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 02, 2021 at 11:26 AM
-- Server version: 10.3.29-MariaDB-0ubuntu0.20.04.1
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restream`
--

-- --------------------------------------------------------

--
-- Table structure for table `coupon_code`
--

CREATE TABLE `coupon_code` (
  `id` int(11) NOT NULL,
  `coupon_code` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `item` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `userid` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `item_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `txn_id` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `payment_gross` float(10,2) NOT NULL,
  `crypto_payment` double(20,8) DEFAULT NULL,
  `currency_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `walletAddress` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `tag` varchar(10) DEFAULT NULL,
  `twitchusername` varchar(255) DEFAULT NULL,
  `twitchuserid` varchar(255) DEFAULT NULL,
  `avatar` varchar(800) DEFAULT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user',
  `isDonator` int(11) NOT NULL DEFAULT 0,
  `isPremium` int(11) NOT NULL DEFAULT 0,
  `isLegend` int(11) NOT NULL DEFAULT 0,
  `isMega` int(11) NOT NULL DEFAULT 0,
  `isNitro` int(11) NOT NULL DEFAULT 0,
  `isTwitchSub` int(11) NOT NULL DEFAULT 0,
  `isMonthSupporter` int(11) NOT NULL DEFAULT 0,
  `isADRemover` int(11) NOT NULL DEFAULT 0,
  `isBetaTesters` int(11) NOT NULL DEFAULT 0,
  `monthlytime` varchar(255) NOT NULL DEFAULT '00-00-0000-00:00',
  `monthlytimemc` varchar(255) NOT NULL DEFAULT '00-00-0000-00:00',
  `isDevAdmin` int(11) NOT NULL DEFAULT 0,
  `banned` int(11) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `autoupuser` int(11) DEFAULT 1,
  `streamkey` varchar(65) DEFAULT NULL,
  `google_auth_code` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `redeemkeys`
--

CREATE TABLE `redeemkeys` (
  `id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `inuse` int(11) NOT NULL DEFAULT 0,
  `minerPoints` varchar(10000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stream_profiles`
--

CREATE TABLE `stream_profiles` (
  `id` int(11) NOT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `streamkey` varchar(700) DEFAULT NULL,
  `enabled` int(11) NOT NULL DEFAULT 1,
  `provider` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coupon_code`
--
ALTER TABLE `coupon_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `redeemkeys`
--
ALTER TABLE `redeemkeys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stream_profiles`
--
ALTER TABLE `stream_profiles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coupon_code`
--
ALTER TABLE `coupon_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `redeemkeys`
--
ALTER TABLE `redeemkeys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stream_profiles`
--
ALTER TABLE `stream_profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
