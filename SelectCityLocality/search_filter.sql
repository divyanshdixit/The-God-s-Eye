-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2019 at 02:24 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `search_filter`
--

-- --------------------------------------------------------

--
-- Table structure for table `btm_page`
--

CREATE TABLE `btm_page` (
  `btm_id` int(100) NOT NULL,
  `btm_content` varchar(500) NOT NULL,
  `locality_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT 'BTM'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `btm_page`
--

INSERT INTO `btm_page` (`btm_id`, `btm_content`, `locality_id`, `name`) VALUES
(1, 'http://localhost/search_php/index1.php', 3, 'BTM');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `city_id` int(100) NOT NULL,
  `city_name` varchar(100) NOT NULL,
  `state_id` int(100) NOT NULL,
  `status` tinyint(4) DEFAULT '1' COMMENT '0:Blocked, 1:Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city_id`, `city_name`, `state_id`, `status`) VALUES
(1, 'Delhi', 2, 1),
(2, 'Bangalore', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `country_id` int(100) NOT NULL,
  `country_name` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0:Blocked, 1:Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`country_id`, `country_name`, `status`) VALUES
(1, 'India', 1),
(2, 'America', 1);

-- --------------------------------------------------------

--
-- Table structure for table `locality`
--

CREATE TABLE `locality` (
  `locality_id` int(100) NOT NULL,
  `city_id` int(100) NOT NULL,
  `locality_name` varchar(100) NOT NULL,
  `locality_path` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locality`
--

INSERT INTO `locality` (`locality_id`, `city_id`, `locality_name`, `locality_path`) VALUES
(1, 1, 'SouthDelhi', 'http://localhost/search_php/db.php'),
(2, 1, 'Mayur Vihar', 'https://www.google.com/'),
(3, 2, 'BTM', 'https://www.facebook.com/'),
(4, 2, 'Banerghatta', 'http://localhost/search_php/livesearch.php'),
(5, 2, 'Jp nagar', 'http://localhost/search_php/getCity.php');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `state_id` int(100) NOT NULL,
  `state_name` varchar(50) NOT NULL,
  `country_id` int(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0:Blocked, 1:Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`state_id`, `state_name`, `country_id`, `status`) VALUES
(1, 'Uttar Pradesh', 1, 1),
(2, 'Delhi', 1, 1),
(3, 'Karnataka', 1, 1),
(4, 'Arizona', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_details` varchar(100) NOT NULL,
  `locality_id` int(100) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `user_name`, `user_details`, `locality_id`) VALUES
(1, 'Shivam Rakesh', 'I''m from UP, Lucknow. Mobile No.: 9260901320', 1),
(2, 'Shanky', 'I''m from Karnatka, Bangalore. Mobile No.: 7406510913', 1),
(3, 'Priyank Tyagi', 'I''m from Delhi, Mayur Vihar. Mobile No.: 08587919412', 1),
(4, 'Anuj Srivastav', 'I''m from Shahjhanpur, lives in Mayur Vihar. Mobile No.: 8887816535', 2),
(5, 'Divyansh Dixit', 'I''m from UP, Kanpur. Mobile No: 8743012199', 1),
(6, 'Aditya yadav', 'I''m from UP, Varanasi. Mobile No: 8743012199', 3),
(7, 'Aditya Verma', 'Jhansi', 1),
(8, 'Abhinav Singh', 'I''m from up, Allahabad. Mobile No.: 9582323897', 4),
(9, 'Abhishek Umrao', 'I''m from UP, kanpur. Mobile No.: 8009127791', 1),
(10, 'Aditi', 'I''m from UP, Lucknow. Mobile No.: 8923475826', 1),
(11, 'Ajit Kumar', 'I''m from UP, Bijnaur. Mobile No.: 8892437484', 1),
(12, 'Akhil Goel', 'I''m from Haryana, Gurugram. Mobile No.: 8791018411', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `btm_page`
--
ALTER TABLE `btm_page`
  ADD PRIMARY KEY (`btm_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `locality`
--
ALTER TABLE `locality`
  ADD PRIMARY KEY (`locality_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `btm_page`
--
ALTER TABLE `btm_page`
  MODIFY `btm_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `city_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `locality`
--
ALTER TABLE `locality`
  MODIFY `locality_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `state_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
