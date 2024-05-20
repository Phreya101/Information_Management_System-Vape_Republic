-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2024 at 04:44 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vp_ims`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', 'admin123', '2024-05-12');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(11) NOT NULL,
  `branch_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `branch_name`) VALUES
(1, 'Main branch'),
(2, 'Macanaya'),
(5, 'camalaniugan'),
(6, 'gonzaga');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `action` varchar(100) NOT NULL,
  `stock_id` varchar(100) NOT NULL,
  `changes` varchar(100) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `action`, `stock_id`, `changes`, `created_at`) VALUES
(1, 'added', '', 'Romio-A2', '2024-05-20'),
(2, 'added', '', 'Romio-A2', '2024-05-20'),
(3, 'added', '', 'Flava-Maze Pro', '2024-05-20'),
(4, 'added', '', 'yhdgfhsgdjsdfjgsfvhshfsdhfsdhfd-dhfhsgdkhdsgsghasdasdf', '2024-05-20'),
(5, 'added', '', 'sample-sample', '2024-05-20'),
(6, 'added', '', 'Romio-1', '2024-05-20'),
(7, 'added', '', 'Lanyard-black', '2024-05-20'),
(8, 'added', '', 'Tang-Orange', '2024-05-20'),
(9, 'added', '', 'Nestea-Lemon', '2024-05-20'),
(10, 'added', '', 'Geekbar-1', '2024-05-20'),
(11, 'added', '', 'Flava-Apok', '2024-05-20'),
(12, 'added', '', 'Tang-Mango', '2024-05-20'),
(13, 'added', '', 'Geekbar-2', '2024-05-20'),
(14, 'added', '', 'Lace-3', '2024-05-20'),
(15, 'added', '', 'flava-mazepro', '2024-05-20'),
(16, 'added', '', 'boss-Nevoks', '2024-05-20'),
(17, 'added', '', 'Madmaster-1', '2024-05-20'),
(18, 'added', '', 'shift-1', '2024-05-20'),
(19, 'added', '', 'Bearbrand-Choco', '2024-05-20'),
(20, 'added', '', 'Tang-Grapes', '2024-05-20'),
(21, 'added', '', 'Tang-Kalamansi', '2024-05-20'),
(22, 'added', '', 'Sample-x', '2024-05-20'),
(23, 'added', '', 'Ex-Y', '2024-05-20'),
(24, 'added', '', 'Samp-z', '2024-05-20'),
(25, 'added', '', 'Example-X', '2024-05-20'),
(26, 'added', '', 'S1-blue', '2024-05-20'),
(27, 'added', '', 'S2-black', '2024-05-20'),
(28, 'added', '', 'S3-Pink', '2024-05-20'),
(29, 'added', '', 'S4-Violet', '2024-05-20'),
(30, 'added', '', 'Flava-Maze Pro', '2024-05-20'),
(31, 'added', '', 'flava-new', '2024-05-20'),
(32, 'added', '', 'Romio-1', '2024-05-20'),
(33, 'added', '', 'Blck-MM', '2024-05-20'),
(34, 'added', '', 'Tang-Orange', '2024-05-20'),
(35, 'added', '', 'Tang-Kalamansi', '2024-05-20'),
(36, 'added', '', 'Nestea-Lemon', '2024-05-20'),
(37, 'added', '', 'Nestea-Apple', '2024-05-20'),
(38, 'added', '', 'new-d', '2024-05-20'),
(39, 'added', '', 'new-a', '2024-05-20'),
(40, 'added', '', 'new-b', '2024-05-20'),
(41, 'added', '', 'new-c', '2024-05-20'),
(42, 'added', '', 'rubber-a', '2024-05-20'),
(43, 'added', '', 'rubber-b', '2024-05-20'),
(44, 'added', '', 'rubber-c', '2024-05-20'),
(45, 'added', '', 'rubber-d', '2024-05-20'),
(46, 'added', '', 'Flava-Maze Pro', '2024-05-20'),
(47, 'added', '', 'Flava-Apok', '2024-05-20'),
(48, 'added', '', 'Boss-Nevoks', '2024-05-20'),
(49, 'added', '', 'Romio-new', '2024-05-20'),
(50, 'added', '', 'Shift-1', '2024-05-20'),
(51, 'added', '', 'Tang-Mango', '2024-05-20'),
(52, 'added', '', 'Tang-Orange', '2024-05-20'),
(53, 'added', '', 'Tang-Grapes', '2024-05-20'),
(54, 'added', '', 'Tang-Kalamansi', '2024-05-20'),
(55, 'added', '', 'Nestea-Apple', '2024-05-20'),
(56, 'added', '', 'Ex-a', '2024-05-20'),
(57, 'added', '', 'Ex-b', '2024-05-20'),
(58, 'added', '', 'Ex-c', '2024-05-20'),
(59, 'added', '', 'Ex-d', '2024-05-20'),
(60, 'added', '', 'Ex-e', '2024-05-20'),
(61, 'added', '', 'Sample-a', '2024-05-20'),
(62, 'added', '', 'Sample-B', '2024-05-20'),
(63, 'added', '', 'Sample-C', '2024-05-20'),
(64, 'added', '', 'Sample-D', '2024-05-20'),
(65, 'added', '', 'Sample-E', '2024-05-20'),
(66, 'added', '', 'Shift-1', '2024-05-20'),
(67, 'added', '', 'Flava-Apok', '2024-05-20'),
(68, 'added', '', 'Flava-Maze Pro', '2024-05-20'),
(69, 'added', '', 'Boss-Nevoks', '2024-05-20'),
(70, 'added', '', 'Romio-1', '2024-05-20'),
(71, 'added', '', 'Tang-Orange', '2024-05-20'),
(72, 'added', '', 'Tang-Mango', '2024-05-20'),
(73, 'added', '', 'Tang-Grapes', '2024-05-20'),
(74, 'added', '', 'Nestea-Apple', '2024-05-20'),
(75, 'added', '', 'Nestea-Lemon', '2024-05-20'),
(76, 'added', '', 'Ex-A', '2024-05-20'),
(77, 'added', '', 'Ex-B', '2024-05-20'),
(78, 'added', '', 'Ex-C', '2024-05-20'),
(79, 'added', '', 'Ex-D', '2024-05-20'),
(80, 'added', '', 'Ex-D', '2024-05-20'),
(81, 'added', '', 'Sample-A', '2024-05-20'),
(82, 'added', '', 'Sample-B', '2024-05-20'),
(83, 'added', '', 'Sample-C', '2024-05-20'),
(84, 'added', '', 'Sam-D', '2024-05-20'),
(85, 'added', '', 'Sample-E', '2024-05-20'),
(86, 'deducted', '1', '5', '2024-05-20'),
(87, 'deducted', '1', '5', '2024-05-20');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `branchID` int(11) NOT NULL,
  `stock_id` varchar(100) NOT NULL,
  `stock` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `total_price` varchar(100) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `branchID`, `stock_id`, `stock`, `quantity`, `total_price`, `created_at`) VALUES
(1, 1, '1', '10', '10', '5500', '2024-05-20');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `branchID` int(11) NOT NULL,
  `stock_id` int(50) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `total_price` varchar(100) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `time_created` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `branchID`, `stock_id`, `quantity`, `total_price`, `status`, `created_at`, `time_created`) VALUES
(1, 1, 1, '5', '2750', NULL, '2024-05-20', '22:39:58'),
(2, 1, 1, '5', '2750', NULL, '2024-05-20', '22:40:25');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `branchID` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `product` varchar(100) NOT NULL,
  `stock` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `branchID`, `category`, `brand`, `product`, `stock`, `price`, `created_at`) VALUES
(1, 1, 'Disposable', 'Romio', '1', '0', '550', '2024-05-20'),
(2, 1, 'Accessories', 'Lanyard', 'black', '10', '50', '2024-05-20'),
(3, 1, 'Juice', 'Tang', 'Orange', '10', '250', '2024-05-20'),
(4, 1, 'Juice', 'Nestea', 'Lemon', '10', '250', '2024-05-20'),
(5, 1, 'Device', 'Geekbar', '1', '10', '2000', '2024-05-20'),
(6, 2, 'Disposable', 'Flava', 'Apok', '10', '550', '2024-05-20'),
(7, 2, 'Juice', 'Tang', 'Mango', '10', '250', '2024-05-20'),
(8, 2, 'Device', 'Geekbar', '2', '10', '3000', '2024-05-20'),
(9, 2, 'Accessories', 'Lace', '3', '10', '20', '2024-05-20'),
(10, 1, 'Disposable', 'flava', 'mazepro', '10', '550', '2024-05-20'),
(11, 1, 'Disposable', 'boss', 'Nevoks', '10', '550', '2024-05-20'),
(12, 1, 'Disposable', 'Madmaster', '1', '10', '550', '2024-05-20'),
(13, 1, 'Disposable', 'shift', '1', '10', '550', '2024-05-20'),
(14, 1, 'Juice', 'Bearbrand', 'Choco', '10', '250', '2024-05-20'),
(15, 1, 'Juice', 'Tang', 'Grapes', '10', '250', '2024-05-20'),
(16, 1, 'Juice', 'Tang', 'Kalamansi', '10', '250', '2024-05-20'),
(17, 1, 'Device', 'Sample', 'x', '10', '2000', '2024-05-20'),
(18, 1, 'Device', 'Ex', 'Y', '10', '2000', '2024-05-20'),
(19, 1, 'Device', 'Samp', 'z', '10', '2000', '2024-05-20'),
(20, 1, 'Device', 'Example', 'X', '10', '2000', '2024-05-20'),
(21, 1, 'Accessories', 'S1', 'blue', '10', '50', '2024-05-20'),
(22, 1, 'Accessories', 'S2', 'black', '10', '50', '2024-05-20'),
(23, 1, 'Accessories', 'S3', 'Pink', '10', '50', '2024-05-20'),
(24, 1, 'Accessories', 'S4', 'Violet', '10', '50', '2024-05-20'),
(25, 2, 'Disposable', 'Flava', 'Maze Pro', '10', '550', '2024-05-20'),
(26, 2, 'Disposable', 'flava', 'new', '10', '550', '2024-05-20'),
(27, 2, 'Disposable', 'Romio', '1', '10', '550', '2024-05-20'),
(28, 2, 'Disposable', 'Blck', 'MM', '10', '550', '2024-05-20'),
(29, 2, 'Juice', 'Tang', 'Orange', '10', '250', '2024-05-20'),
(30, 2, 'Juice', 'Tang', 'Kalamansi', '10', '250', '2024-05-20'),
(31, 2, 'Juice', 'Nestea', 'Lemon', '10', '250', '2024-05-20'),
(32, 2, 'Juice', 'Nestea', 'Apple', '10', '250', '2024-05-20'),
(33, 2, 'Device', 'new', 'd', '10', '2000', '2024-05-20'),
(34, 2, 'Device', 'new', 'a', '10', '2000', '2024-05-20'),
(35, 2, 'Device', 'new', 'b', '10', '2000', '2024-05-20'),
(36, 2, 'Device', 'new', 'c', '10', '2000', '2024-05-20'),
(37, 2, 'Accessories', 'rubber', 'a', '10', '50', '2024-05-20'),
(38, 2, 'Accessories', 'rubber', 'b', '10', '50', '2024-05-20'),
(39, 2, 'Accessories', 'rubber', 'c', '10', '50', '2024-05-20'),
(40, 2, 'Accessories', 'rubber', 'd', '10', '50', '2024-05-20'),
(41, 5, 'Disposable', 'Flava', 'Maze Pro', '10', '550', '2024-05-20'),
(42, 5, 'Disposable', 'Flava', 'Apok', '10', '550', '2024-05-20'),
(43, 5, 'Disposable', 'Boss', 'Nevoks', '10', '550', '2024-05-20'),
(44, 5, 'Disposable', 'Romio', 'new', '10', '550', '2024-05-20'),
(45, 5, 'Disposable', 'Shift', '1', '10', '550', '2024-05-20'),
(46, 5, 'Juice', 'Tang', 'Mango', '10', '250', '2024-05-20'),
(47, 5, 'Juice', 'Tang', 'Orange', '10', '250', '2024-05-20'),
(48, 5, 'Juice', 'Tang', 'Grapes', '10', '250', '2024-05-20'),
(49, 5, 'Juice', 'Tang', 'Kalamansi', '10', '250', '2024-05-20'),
(50, 5, 'Juice', 'Nestea', 'Apple', '10', '250', '2024-05-20'),
(51, 5, 'Device', 'Ex', 'a', '10', '2000', '2024-05-20'),
(52, 5, 'Device', 'Ex', 'b', '10', '2000', '2024-05-20'),
(53, 5, 'Device', 'Ex', 'c', '10', '2000', '2024-05-20'),
(54, 5, 'Device', 'Ex', 'd', '10', '2000', '2024-05-20'),
(55, 5, 'Device', 'Ex', 'e', '10', '2000', '2024-05-20'),
(56, 5, 'Accessories', 'Sample', 'a', '10', '50', '2024-05-20'),
(57, 5, 'Accessories', 'Sample', 'B', '10', '50', '2024-05-20'),
(58, 5, 'Accessories', 'Sample', 'C', '10', '50', '2024-05-20'),
(59, 5, 'Accessories', 'Sample', 'D', '10', '50', '2024-05-20'),
(60, 5, 'Accessories', 'Sample', 'E', '10', '50', '2024-05-20'),
(61, 6, 'Disposable', 'Shift', '1', '10', '550', '2024-05-20'),
(62, 6, 'Disposable', 'Flava', 'Apok', '10', '550', '2024-05-20'),
(63, 6, 'Disposable', 'Flava', 'Maze Pro', '10', '550', '2024-05-20'),
(64, 6, 'Disposable', 'Boss', 'Nevoks', '10', '550', '2024-05-20'),
(65, 6, 'Disposable', 'Romio', '1', '10', '550', '2024-05-20'),
(66, 6, 'Juice', 'Tang', 'Orange', '10', '250', '2024-05-20'),
(67, 6, 'Juice', 'Tang', 'Mango', '10', '250', '2024-05-20'),
(68, 6, 'Juice', 'Tang', 'Grapes', '10', '250', '2024-05-20'),
(69, 6, 'Juice', 'Nestea', 'Apple', '10', '250', '2024-05-20'),
(70, 6, 'Juice', 'Nestea', 'Lemon', '10', '250', '2024-05-20'),
(71, 6, 'Device', 'Ex', 'A', '10', '2000', '2024-05-20'),
(72, 6, 'Device', 'Ex', 'B', '10', '2000', '2024-05-20'),
(73, 6, 'Device', 'Ex', 'C', '10', '2000', '2024-05-20'),
(74, 6, 'Device', 'Ex', 'D', '10', '2000', '2024-05-20'),
(75, 6, 'Device', 'Ex', 'E', '10', '2000', '2024-05-20'),
(76, 6, 'Accessories', 'Sample', 'A', '10', '50', '2024-05-20'),
(77, 6, 'Accessories', 'Sample', 'B', '10', '50', '2024-05-20'),
(78, 6, 'Accessories', 'Sample', 'C', '10', '50', '2024-05-20'),
(79, 6, 'Accessories', 'Sam', 'D', '10', '50', '2024-05-20'),
(80, 6, 'Accessories', 'Sample', 'E', '10', '50', '2024-05-20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
