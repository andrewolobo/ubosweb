-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2017 at 07:39 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cpi_capi_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `item_name` varchar(35) NOT NULL,
  `outlet_code` int(2) NOT NULL,
  `username` varchar(25) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `item_name`, `outlet_code`, `username`, `status`) VALUES
(1, 'item1', 1, 'webapp@ubos.org', 0),
(2, 'item2', 1, 'webapp@ubos.org', 0),
(3, 'item3', 1, 'webapp@ubos.org', 0),
(4, 'item4', 2, 'cisuser@ubos.org', 0),
(5, 'item5', 2, 'cisuser@ubos.org', 0),
(6, 'item6', 2, 'cisuser@ubos.org', 0),
(7, 'item7', 1, 'webapp@ubos.org', 1),
(8, 'item8', 1, 'webapp@ubos.org', 1);

-- --------------------------------------------------------

--
-- Table structure for table `outlets`
--

CREATE TABLE `outlets` (
  `id` int(11) NOT NULL,
  `outlet_name` varchar(25) NOT NULL,
  `region` int(2) NOT NULL,
  `username` varchar(35) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `outlets`
--

INSERT INTO `outlets` (`id`, `outlet_name`, `region`, `username`, `status`) VALUES
(1, 'outlet1', 1, 'webapp@ubos.org', 0),
(2, 'outlet1', 2, 'cisuser@ubos.org', 0),
(3, 'outlet3', 3, 'webapp@ubos.org', 1),
(4, 'outlet4', 4, 'username4', 0),
(5, 'outlet5', 5, 'username5', 0),
(6, 'outlet6', 6, 'username6', 0);

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `ID` int(11) NOT NULL,
  `COLUMN_OUTLET_ID` int(5) NOT NULL,
  `COLUMN_PRICE` int(7) NOT NULL,
  `COLUMN_QUANTITY` int(4) NOT NULL,
  `COLUMN_UNIT` int(2) NOT NULL,
  `COLUMN_LONGITUDE` double NOT NULL,
  `COLUMN_LATITUDE` double NOT NULL,
  `COLUMN_DATE` varchar(35) NOT NULL,
  `COLUMN_REMARKS` text NOT NULL,
  `ITEM_ID` text NOT NULL,
  `audit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`ID`, `COLUMN_OUTLET_ID`, `COLUMN_PRICE`, `COLUMN_QUANTITY`, `COLUMN_UNIT`, `COLUMN_LONGITUDE`, `COLUMN_LATITUDE`, `COLUMN_DATE`, `COLUMN_REMARKS`, `ITEM_ID`, `audit`) VALUES
(1, 0, 2000, 0, 0, 0, 0, '', '', 'xx1', '2017-03-27 14:34:34'),
(12, 1, 3800, 50, 0, -122.084, 37.422, '27-3-2017', 'enter remarks', 'c9cdd17b-cf94-4c73-9ed8-a8bcdae32458', '2017-03-27 15:39:47'),
(13, 1, 3800, 50, 0, -122.084, 37.422, '27-3-2017', 'enter remarks', 'c9cdd17b-cf94-4c73-9ed8-a8bcdae32458', '2017-03-27 15:48:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL COMMENT 'auto incrementing user_id of each user, unique index',
  `user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name, unique',
  `user_password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s password in salted and hashed format',
  `user_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s email, unique'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password_hash`, `user_email`) VALUES
(1, 'rjotyek', '$2y$10$BIDfZG8nFZkbBUaYCNZspeq08ynqEGakewK8d2O/9qPy8Ft5Q4bdS', 'rjotyek@gmail.com'),
(2, 'webapp@ubos.org\r\n', '$2y$10$0CV3sgEAAoFFnaSoFDgS/uOSZE13/50ngHVNch9TBCSFNsziOylHm', 'webapp@ubos.org'),
(3, 'cisuser', '$2y$10$u3znuAniA8FplH0aQgn6O.J5jJ5E1kbXPSNFKwY3gNJ7Q2UX/1F2i', 'cisuser@ubos.org');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outlets`
--
ALTER TABLE `outlets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `outlets`
--
ALTER TABLE `outlets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index', AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
