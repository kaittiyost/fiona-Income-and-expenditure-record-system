-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2022 at 11:10 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fiona`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_in_default`
--

CREATE TABLE `category_in_default` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `time_reg` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category_in_default`
--

INSERT INTO `category_in_default` (`id`, `category_name`, `time_reg`) VALUES
(1, 'เงินเดือน', '2020-10-18 05:24:15'),
(2, 'รายได้พิเศษ', '2020-10-18 05:24:32'),
(3, 'งานพาร์ทไทม์', '2020-10-18 05:24:42'),
(4, 'รับจ้าง', '2020-10-18 05:24:57'),
(5, 'รับทุน', '2020-10-18 05:27:04');

-- --------------------------------------------------------

--
-- Table structure for table `category_out_default`
--

CREATE TABLE `category_out_default` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `time_reg` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category_out_default`
--

INSERT INTO `category_out_default` (`id`, `category_name`, `time_reg`) VALUES
(1, 'ค่าอาหารเช้า', '2020-10-18 05:27:43'),
(2, 'ค่าอาหารเที่ยง', '2020-10-18 05:27:56'),
(3, 'ค่าอาหารเย็น', '2020-10-18 05:29:51'),
(4, 'ค่าหอพักรายวัน', '2020-10-18 05:29:51'),
(5, 'ค่าหอพักรายเดือน', '2020-10-18 05:29:51'),
(6, 'ค่าหมูกระทะ', '2020-10-18 05:29:52'),
(7, 'ค่าชานมไข่มุก', '2020-10-18 05:29:52'),
(8, 'ค่าอาหารว่าง', '2020-10-18 05:29:52'),
(9, 'ค่ารถโดยสาร', '2020-10-18 05:29:52'),
(10, 'ค่าโทรศัพท์', '2020-10-18 05:29:52'),
(11, 'ค่าน้ำมันรถ', '2020-10-18 05:29:52');

-- --------------------------------------------------------

--
-- Table structure for table `money_in`
--

CREATE TABLE `money_in` (
  `id` int(11) NOT NULL,
  `detail` varchar(255) DEFAULT NULL,
  `amount` decimal(9,2) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time_reg` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `money_in`
--

INSERT INTO `money_in` (`id`, `detail`, `amount`, `user_id`, `time_reg`) VALUES
(15, 'ขโมยตังพ่อ', '650.00', 1, '2020-11-14 16:18:24'),
(17, 'งานพาร์ทไทม์', '80.00', 1, '2020-11-14 16:21:53'),
(18, 'รับจ้าง', '500.00', 1, '2020-11-14 16:22:04'),
(19, 'รายได้พิเศษ', '20000.00', 1, '2020-11-14 16:41:00'),
(20, 'งานพาร์ทไทม์', '80.00', 1, '2020-11-14 16:58:33'),
(21, 'รายได้พิเศษ', '100.00', 1, '2020-11-14 17:06:44'),
(22, 'งานพาร์ทไทม์', '80.00', 1, '2020-11-14 20:39:28'),
(23, 'ขอแม่', '3500.00', 1, '2020-11-14 20:48:28'),
(24, 'งานพาร์ทไทม์', '900.00', 1, '2020-11-14 21:06:52'),
(25, 'งานพาร์ทไทม์', '100.00', 2, '2020-11-14 21:19:43'),
(26, 'รับทุน', '8000.00', 2, '2020-11-14 21:20:08'),
(27, 'ขโมยตังแม่', '8000.00', 3, '2020-11-14 21:27:48'),
(29, 'ขโมย', '50.00', 1, '2020-11-20 04:19:18'),
(30, 'ขโมยตังค์แม่', '100.00', 2, '2020-11-20 05:04:49'),
(31, 'รายได้พิเศษ', '100.00', 1, '2020-11-20 05:24:29'),
(32, 'รับจ้าง', '15.00', 1, '2020-11-21 05:41:43'),
(33, 'งานพาร์ทไทม์', '500.00', 1, '2020-11-21 05:45:56'),
(34, 'ปล้น7', '5000.00', 2, '2020-11-21 09:06:33'),
(35, 'รับจ้าง', '300.00', 1, '2020-11-21 09:16:40'),
(36, 'รายได้พิเศษ', '38.00', 1, '2020-11-21 09:17:08'),
(37, 'งานพาร์ทไทม์', '1000.00', 1, '2020-11-21 09:17:50'),
(38, 'รับจ้าง', '33.00', 1, '2020-11-21 09:18:16'),
(39, 'รายได้พิเศษ', '24.00', 1, '2020-11-21 09:18:38'),
(40, 'รายได้พิเศษ', '20.00', 1, '2020-11-21 09:18:52'),
(41, 'ไม่บอก', '30.00', 1, '2020-11-21 09:20:03'),
(42, 'รายได้พิเศษ', '40.00', 1, '2020-11-21 09:21:57'),
(43, 'รายได้พิเศษ', '500.00', 1, '2020-11-21 19:36:00'),
(44, 'ไม่บอก', '100.00', 1, '2020-11-21 19:37:25'),
(45, 'รับจ้าง', '77.00', 2, '2020-11-21 20:31:04'),
(46, 'งานพาร์ทไทม์', '300.00', 4, '2020-11-22 06:52:50'),
(47, 'รายได้พิเศษ', '500.00', 5, '2020-11-22 07:19:34'),
(48, 'รับจ้าง', '300.00', 5, '2020-11-22 07:22:03'),
(49, 'ไม่บอก', '20.00', 5, '2020-11-22 07:22:10'),
(50, 'รับทุน', '8000.00', 6, '2020-11-22 10:24:13'),
(51, 'ปล้นธนาคาร', '5000.00', 1, '2020-11-22 12:55:39'),
(53, 'รายได้พิเศษ', '9000000.00', 18, '2020-11-22 14:41:55'),
(54, 'รายได้พิเศษ', '400.00', 1, '2020-11-23 02:58:45'),
(55, 'งานพาร์ทไทม์', '100.00', 1, '2021-04-08 13:23:39'),
(56, 'งานพาร์ทไทม์', '100.00', 1, '2021-04-08 13:23:44'),
(57, 'งานพาร์ทไทม์', '300.00', 1, '2022-05-18 09:06:31');

-- --------------------------------------------------------

--
-- Table structure for table `money_out`
--

CREATE TABLE `money_out` (
  `id` int(11) NOT NULL,
  `detail` varchar(255) DEFAULT NULL,
  `amount` decimal(9,2) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time_reg` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `money_out`
--

INSERT INTO `money_out` (`id`, `detail`, `amount`, `user_id`, `time_reg`) VALUES
(5, 'ค่าอาหารเย็น', '80.00', 1, '2020-11-11 18:17:12'),
(9, 'ค่าอาหารเที่ยง', '8998.00', 1, '2020-11-11 18:39:47'),
(11, 'ค่าหมูกระทะ', '259.00', 1, '2020-11-14 16:20:54'),
(13, 'ค่าอาหารว่าง', '88.00', 1, '2020-11-14 17:02:38'),
(14, 'มาม่า', '45.00', 1, '2020-11-14 18:54:33'),
(15, 'ค่าอาหารว่าง', '50.00', 1, '2020-11-14 19:37:33'),
(16, 'ค่าอาหารว่าง', '5000.00', 1, '2020-11-14 20:33:11'),
(17, 'ค่าน้ำมันรถ', '100.00', 1, '2020-11-14 21:06:03'),
(18, 'ค่าหมูกระทะ', '259.00', 2, '2020-11-14 21:19:54'),
(19, 'ค่าอาหารว่าง', '19.00', 2, '2020-11-14 21:21:43'),
(20, 'ค่าอาหารเย็น', '50.00', 3, '2020-11-14 21:28:20'),
(21, 'ค่าโทรศัพท์', '199.00', 3, '2020-11-14 21:29:06'),
(22, 'ลงอ่าง', '1590.00', 3, '2020-11-14 21:31:14'),
(23, 'ค่าอาหารเที่ยง', '100.00', 1, '2020-11-19 19:12:15'),
(28, 'เปย์ผช', '7000.00', 2, '2020-11-20 05:04:07'),
(29, 'ค่าอาหารเที่ยง', '35.00', 2, '2020-11-20 05:04:29'),
(30, 'ค่าหอพักรายเดือน', '9000.00', 1, '2020-11-20 05:05:35'),
(31, 'ไม่บอก', '88.00', 1, '2020-11-21 05:40:18'),
(34, 'ค่าชานมไข่มุก', '19.00', 1, '2020-11-21 05:46:33'),
(35, 'ค่าอาหารเที่ยง', '35.00', 1, '2020-11-21 06:53:17'),
(36, 'ค่าโทรศัพท์', '999.00', 1, '2020-11-21 07:07:12'),
(37, 'ค่าชานมไข่มุก', '35.00', 1, '2020-11-21 07:31:50'),
(38, 'ลงอ่าง', '1500.00', 1, '2020-11-21 08:33:23'),
(39, 'ค่ารถโดยสาร', '290.00', 2, '2020-11-21 08:57:52'),
(40, 'ค่าชานมไข่มุก', '35.00', 2, '2020-11-21 08:58:03'),
(41, 'ค่าอาหารว่าง', '25.00', 1, '2020-11-21 19:35:30'),
(42, 'ค่าอาหารเที่ยง', '50.00', 1, '2020-11-21 19:36:30'),
(43, 'ค่าอาหารเย็น', '25.00', 1, '2020-11-21 19:36:59'),
(44, 'ค่ารถโดยสาร', '23.00', 1, '2020-11-21 20:24:10'),
(45, 'ค่าหมูกระทะ', '259.00', 2, '2020-11-21 20:30:47'),
(46, 'ค่าอาหารว่าง', '120.00', 2, '2020-11-21 20:44:41'),
(47, 'ค่าน้ำมันรถ', '100.00', 2, '2020-11-21 20:53:39'),
(48, 'ค่าอาหารว่าง', '80.00', 2, '2020-11-21 20:53:52'),
(49, 'ค่าอาหารเที่ยง', '50.00', 5, '2020-11-22 07:20:18'),
(50, 'ค่าหอพักรายวัน', '300.00', 5, '2020-11-22 07:21:25'),
(51, 'ค่าโทรศัพท์', '99.00', 5, '2020-11-22 07:21:35'),
(52, 'ค่าน้ำมันรถ', '100.00', 5, '2020-11-22 07:21:43'),
(53, 'ค่าหอพักรายเดือน', '3500.00', 6, '2020-11-22 10:24:29'),
(54, 'ค่าชานมไข่มุก', '29.00', 1, '2020-11-22 10:25:28'),
(55, 'ค่ารถโดยสาร', '16.00', 1, '2020-11-22 10:25:41'),
(56, 'ตั๋วรถ', '208.00', 1, '2020-11-22 10:25:58'),
(57, 'ค่าอาหารว่าง', '50.00', 1, '2020-11-22 12:55:05'),
(59, 'ค่าหมูกระทะ', '80000.00', 18, '2020-11-22 14:42:07'),
(60, 'ค่าน้ำมันรถ', '999999.00', 18, '2020-11-22 14:42:22'),
(61, 'ค่าอาหารเที่ยง', '50.00', 18, '2020-11-22 14:42:38'),
(62, 'ค่าหอพักรายเดือน', '50.00', 18, '2020-11-22 14:42:43'),
(63, 'ค่าอาหารว่าง', '50.00', 18, '2020-11-22 14:42:47'),
(64, 'ค่าโทรศัพท์', '40404.00', 18, '2020-11-22 14:42:51'),
(65, 'ค่ารถโดยสาร', '45345.00', 18, '2020-11-22 14:42:59'),
(66, 'ค่าโทรศัพท์', '4454542.00', 18, '2020-11-22 14:43:05'),
(67, 'ค่าอาหารเย็น', '50.00', 1, '2020-11-23 03:04:09'),
(68, 'ค่าอาหารเย็น', '80.00', 1, '2021-04-08 13:24:13'),
(69, 'ค่าอาหารเที่ยง', '60.00', 1, '2022-05-18 09:05:29'),
(70, 'ค่าอาหารเย็น', '80.00', 1, '2022-05-18 09:05:47');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `sex` varchar(1) NOT NULL,
  `time_reg` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `username`, `password`, `sex`, `time_reg`) VALUES
(1, 'kiattiyot', 'sihawong', 'admin', 'cfa1150f1787186742a9a884b73a43d8cf219f9b', 'M', '2022-05-18 09:03:46'),
(2, 'nichapat', 'daragorn', 'eing', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'F', '2020-11-14 21:18:57'),
(3, 'natcha', 'singhara', 'natcha', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'F', '2020-11-14 21:26:47'),
(4, 'somchai', 'jaidee', 'somchai', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'F', '2020-11-22 06:51:41'),
(5, 'test', 'test', 'test', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'M', '2020-11-22 07:18:22'),
(6, 'kitti', 'eiei', 'kitti', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'M', '2020-11-22 10:23:15'),
(7, 'test', 'eee', 'test', 'b8880583d5407faa9e0fe196489444cd34504594', 'M', '2020-11-22 12:38:18'),
(8, 'test999', 'eee', 'test', '228bf8cc11958bfbebaf85e8ff6e11ea5ee3a701', 'M', '2020-11-22 12:39:11'),
(9, 'rrt', '456', 'erty', '788f1b367367e8445115bde5bcac85079bb52526', 'M', '2020-11-22 12:52:28'),
(10, 'rrt', '456', 'erty', '788f1b367367e8445115bde5bcac85079bb52526', 'M', '2020-11-22 12:52:28'),
(11, 'ooo', 'ooo', 'ooo', 'be3dca45682b6952c46933b4ebdf57f9100532e8', 'M', '2020-11-22 13:20:23'),
(12, 'testtest', '555', '5555', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'M', '2020-11-22 13:20:58'),
(13, 'test', 'eee', 'erty', '25c20a02310c0cfdcd9b8d3d6085eb32adbefa0d', 'M', '2020-11-22 13:21:44'),
(14, 'xxx', 'xxx', 'xxx', '97944f678c8638e3230681298af8e4792c723b06', 'M', '2020-11-22 13:22:26'),
(15, 'kiatti', 'siha', 'oakkk', '0d467c11c1f788a43266782aac388b66b0f22551', 'M', '2020-11-22 13:31:03'),
(16, 'test', 'eee', 'test', '072a7ea84059c8b64ffb28aa3a9bac4a32614d53', 'M', '2020-11-22 13:32:07'),
(17, 'test', 'test', 'test', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', 'M', '2020-11-22 13:33:11'),
(18, 'Sakkarin', 'teplhan', 'sakkarin24', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'M', '2020-11-22 14:41:38'),
(19, 'alan', 'super', 'alan', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'm', '2022-05-18 09:00:13'),
(20, 'alan', 'aa', 'alan', 'sha1(555)', 'm', '2022-05-18 09:01:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_in_default`
--
ALTER TABLE `category_in_default`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_out_default`
--
ALTER TABLE `category_out_default`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `money_in`
--
ALTER TABLE `money_in`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id_default` (`detail`);

--
-- Indexes for table `money_out`
--
ALTER TABLE `money_out`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `money_out_ibfk_4` (`detail`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_in_default`
--
ALTER TABLE `category_in_default`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category_out_default`
--
ALTER TABLE `category_out_default`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `money_in`
--
ALTER TABLE `money_in`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `money_out`
--
ALTER TABLE `money_out`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `money_in`
--
ALTER TABLE `money_in`
  ADD CONSTRAINT `money_in_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `money_out`
--
ALTER TABLE `money_out`
  ADD CONSTRAINT `money_out_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
