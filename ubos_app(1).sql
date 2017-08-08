-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2017 at 02:30 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ubos_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `audit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `audit`) VALUES
(1, 'key_indicators', '2017-07-15 16:19:56'),
(2, 'population', '2017-07-15 16:19:56'),
(3, 'surveys', '2017-07-15 16:20:12'),
(4, 'energy', '2017-07-15 16:20:12'),
(5, 'census_2014', '2017-07-16 14:06:59');

-- --------------------------------------------------------

--
-- Table structure for table `indicators`
--

CREATE TABLE `indicators` (
  `indicatorId` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `headline` varchar(100) NOT NULL,
  `summary` varchar(100) NOT NULL,
  `unit` varchar(15) NOT NULL,
  `description` text NOT NULL,
  `data` text NOT NULL,
  `period` varchar(35) NOT NULL,
  `url` varchar(50) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `change_type` varchar(50) NOT NULL,
  `change_value` varchar(25) NOT NULL,
  `change_desc` varchar(20) NOT NULL,
  `index_value` varchar(25) NOT NULL,
  `cat_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `indicators`
--

INSERT INTO `indicators` (`indicatorId`, `title`, `headline`, `summary`, `unit`, `description`, `data`, `period`, `url`, `updated_on`, `change_type`, `change_value`, `change_desc`, `index_value`, `cat_id`) VALUES
(1, 'CPI', 'rose', 'The Annual Headline Inflation for the year ending December 2016 rose to 5.7 percent compared to the', 'UGX', 'The Annual Headline Inflation for the year ending December 2016 rose to 5.7 percent compared to theThe Annual Headline Inflation for the year ending December 2016 rose to 5.7 percent compared to theThe Annual Headline Inflation for the year ending December 2016 rose to 5.7 percent compared to the', 'The Annual Headline Inflation for the year ending December 2016 rose to 5.7 percent compared to theThe Annual Headline Inflation for the year ending December 2016 rose to 5.7 percent compared to theThe Annual Headline Inflation for the year ending December 2016 rose to 5.7 percent compared to the', 'Dec-2016', 'http://www.ubos.org', '2017-07-15 16:20:57', 'Monthly Change', '1.8 %', 'index no', '154', 1),
(2, 'QGDP', 'down', 'declined by 0.2 percentdeclined by 0.2 percent', '$', 'The Annual Headline Inflation for the year ending December 2016 rose to 5.7 percent compared to theThe Annual Headline Inflation for the year ending December 2016 rose to 5.7 percent compared to theThe Annual Headline Inflation for the year ending December 2016 rose to 5.7 percent compared to the', 'The Annual Headline Inflation for the year ending December 2016 rose to 5.7 percent compared to theThe Annual Headline Inflation for the year ending December 2016 rose to 5.7 percent compared to the', 'Jan-2017', 'http://www.ubos.org', '2017-07-16 13:40:14', 'Quarterly Change', '1 %', '$', '25', 2),
(3, 'PPI, H&R', 'down', 'average fell by -2.2%average fell by -2.2%', '$', 'The Annual Producer Prices for Hotels and Restaurants sector on average fell by -2.2% in quarter 1 for FY2016\\/17 compared to a 1.9% rise in quarter 4 The Annual Producer Prices for Hotels and Restaurants sector on average fell by -2.2% in quarter 1 for FY2016\\/17 compared to a 1.9% rise in quarter 4 ', 'The Annual Producer Prices for Hotels and Restaurants sector on average fell by -2.2% in quarter 1 for FY2016\\/17 compared to a 1.9% rise in quarter 4 The Annual Producer Prices for Hotels and Restaurants sector on average fell by -2.2% in quarter 1 for FY2016\\/17 compared to a 1.9% rise in quarter 4 ', 'Feb-2017', 'http://www.ubos.org', '2017-07-16 13:40:39', 'Quarterly Change', '4 %', '%', '4', 3),
(4, 'People usually present', '6897', 'na', 'na', 'na', 'na', 'na', 'na', '2017-07-16 14:13:49', 'na', 'na', 'na', 'na', 5),
(5, 'Males usually resident', '3241', 'na', 'na', 'na', 'na', 'na', 'na', '2017-07-16 14:13:49', 'na', 'na', 'na', 'na', 5),
(6, 'IoP', 'rose', 'Dummy text is also used to demonstrateDummy text is also used to demonstrate', 'UGX', 'Dummy text is also used to demonstrateDummy text is also used to demonstrateDummy text is also used to demonstrateDummy text is also used to demonstrateDummy text is also used to demonstrateDummy text is also used to demonstrateDummy text is also used to demonstrate', 'Dummy text is also used to demonstrateDummy text is also used to demonstrateDummy text is also used to demonstrateDummy text is also used to demonstrate', '2017', 'http://www.ubos.org', '2017-07-26 15:37:09', 'Monthly Change', '2', 'index', '2000', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indicators`
--
ALTER TABLE `indicators`
  ADD PRIMARY KEY (`indicatorId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `indicators`
--
ALTER TABLE `indicators`
  MODIFY `indicatorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
