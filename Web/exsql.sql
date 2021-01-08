-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2020 at 06:08 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `checktechno_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `admin_email` varchar(80) NOT NULL,
  `admin_pwd` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `admin_email`, `admin_pwd`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$89uX3LBy4mlU/DcBveQ1l.32nSianDP/E1MfUh.Z.6B4Z0ql3y7PK'),
(2, 'test', 'test@gmail.com', '098f6bcd4621d373cade4e832627b4f6');

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `id` int(11) NOT NULL,
  `device_name` varchar(50) NOT NULL,
  `device_dep` varchar(20) NOT NULL,
  `device_uid` text NOT NULL,
  `device_date` date NOT NULL,
  `device_mode` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`id`, `device_name`, `device_dep`, `device_uid`, `device_date`, `device_mode`) VALUES
(2, 'TechnoComScanner01', 'สอบจบ(ช่วงบ่าย2)', '78bcc16e', '2020-10-04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(10) NOT NULL,
  `event_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `event_name`) VALUES
(1, 'eventnametest01'),
(2, 'Susd');

-- --------------------------------------------------------

--
-- Table structure for table `pwd_reset`
--

CREATE TABLE `pwd_reset` (
  `pwd_reset_id` int(11) NOT NULL,
  `pwd_reset_email` varchar(50) NOT NULL,
  `pwd_reset_selector` text NOT NULL,
  `pwd_reset_token` longtext NOT NULL,
  `pwd_reset_expires` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL DEFAULT 'None',
  `serialnumber` double NOT NULL DEFAULT 0,
  `gender` varchar(10) NOT NULL DEFAULT 'None',
  `email` varchar(50) NOT NULL DEFAULT 'None',
  `fingerprint_id` int(11) NOT NULL,
  `fingerprint_select` tinyint(1) NOT NULL DEFAULT 0,
  `user_date` date NOT NULL,
  `device_uid` varchar(20) NOT NULL DEFAULT '0',
  `device_dep` varchar(20) NOT NULL DEFAULT '0',
  `del_fingerid` tinyint(1) NOT NULL DEFAULT 0,
  `add_fingerid` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `serialnumber`, `gender`, `email`, `fingerprint_id`, `fingerprint_select`, `user_date`, `device_uid`, `device_dep`, `del_fingerid`, `add_fingerid`) VALUES
(1, 'Auttawit', 605720102, 'Male', 'None', 1, 0, '2020-11-11', '78bcc16e', 'testเย็น', 0, 0),
(2, 'ajjoke', 6000000, 'Male', 'None', 2, 0, '2020-11-11', '78bcc16e', 'สอบจบ(ช่วงบ่าย)', 0, 0),
(3, 'ajjoke02', 60000003, 'Male', 'None', 3, 0, '2020-11-11', '78bcc16e', 'สอบจบ(ช่วงบ่าย)', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_logs`
--

CREATE TABLE `users_logs` (
  `id` int(11) NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 NOT NULL,
  `serialnumber` double NOT NULL,
  `fingerprint_id` int(5) NOT NULL,
  `device_uid` varchar(20) CHARACTER SET utf8 NOT NULL,
  `device_dep` varchar(20) CHARACTER SET utf8 NOT NULL,
  `checkindate` date NOT NULL,
  `timein` time NOT NULL,
  `timeout` time NOT NULL,
  `fingerout` tinyint(1) NOT NULL DEFAULT 0,
  `event` char(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users_logs`
--

INSERT INTO `users_logs` (`id`, `username`, `serialnumber`, `fingerprint_id`, `device_uid`, `device_dep`, `checkindate`, `timein`, `timeout`, `fingerout`, `event`) VALUES
(1, 'Auttawit', 605720102, 1, '78bcc16e', 'สอบจบ(ช่วงเช้า)', '2020-11-11', '08:32:47', '08:32:53', 1, NULL),
(2, 'ajjoke', 6000000, 2, '78bcc16e', 'สอบจบ(ช่วงบ่าย)', '2020-11-11', '13:50:20', '13:50:41', 1, NULL),
(3, 'ajjoke', 6000000, 2, '78bcc16e', 'สอบจบ(ช่วงบ่าย)', '2020-11-11', '13:50:44', '13:51:33', 1, NULL),
(4, 'ajjoke02', 60000003, 3, '78bcc16e', 'สอบจบ(ช่วงบ่าย)', '2020-11-11', '13:51:10', '13:51:23', 1, NULL),
(5, 'ajjoke', 6000000, 2, '78bcc16e', 'สอบจบ(ช่วงบ่าย)', '2020-11-11', '13:51:51', '13:52:01', 1, NULL),
(6, 'ajjoke', 6000000, 2, '78bcc16e', 'สอบจบ(ช่วงบ่าย)', '2020-11-11', '13:52:14', '13:52:31', 1, NULL),
(7, 'ajjoke', 6000000, 2, '78bcc16e', 'สอบจบ(ช่วงบ่าย2)', '2020-11-11', '13:53:50', '13:54:02', 1, NULL),
(8, 'ajjoke', 6000000, 2, '78bcc16e', 'สอบจบ(ช่วงบ่าย2)', '2020-11-11', '13:59:29', '00:00:00', 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `pwd_reset`
--
ALTER TABLE `pwd_reset`
  ADD PRIMARY KEY (`pwd_reset_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_logs`
--
ALTER TABLE `users_logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pwd_reset`
--
ALTER TABLE `pwd_reset`
  MODIFY `pwd_reset_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users_logs`
--
ALTER TABLE `users_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
