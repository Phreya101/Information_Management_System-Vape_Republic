-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2024 at 12:40 PM
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
(1, 'deducted', '4', '5', '2024-05-19'),
(2, 'deducted', '8', '2', '2024-05-19'),
(3, 'deducted', '5', '3', '2024-05-19'),
(4, 'deducted', '4', '4', '2024-05-19'),
(5, 'deducted', '1', '6', '2024-05-19'),
(6, 'deducted', '2', '2', '2024-05-19'),
(7, 'deducted', '3', '4', '2024-05-19'),
(8, 'deducted', '6', '2', '2024-05-19'),
(9, 'deducted', '10', '1', '2024-05-19'),
(10, 'added', '', 'add-add', '2024-05-19'),
(11, 'deducted', '14', '2', '2024-05-19'),
(12, 'added', '', 'adda-add', '2024-05-19'),
(13, 'added', '', 'add-add', '2024-05-19'),
(14, 'deducted', '16', '3', '2024-05-19'),
(15, 'deducted', '6', '3', '2024-05-19');

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
(1, 2, '4', '15', '9', '4950', '2024-05-19'),
(2, 1, '8', '48', '2', '1100', '2024-05-19'),
(3, 1, '5', '13', '3', '1650', '2024-05-19'),
(4, 5, '1', '20', '6', '3300', '2024-05-19'),
(5, 5, '2', '8', '2', '1100', '2024-05-19'),
(6, 6, '3', '10', '4', '2200', '2024-05-19'),
(8, 2, '10', '20', '1', '55', '2024-05-19'),
(9, 1, '14', '45', '2', '1100', '2024-05-19'),
(10, 2, '16', '20', '3', '1650', '2024-05-19'),
(11, 6, '6', '8', '3', '1650', '2024-05-19');

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
(1, 2, 4, '5', '2750', NULL, '2024-05-19', '11:05:46'),
(2, 1, 8, '2', '1100', NULL, '2024-05-19', '11:06:02'),
(3, 1, 5, '3', '1650', NULL, '2024-05-19', '11:06:11'),
(4, 2, 4, '4', '2200', NULL, '2024-05-19', '11:06:26'),
(5, 5, 1, '6', '3300', NULL, '2024-05-19', '11:06:37'),
(6, 5, 2, '2', '1100', NULL, '2024-05-19', '11:06:47'),
(7, 6, 3, '4', '2200', NULL, '2024-05-19', '11:06:58'),
(8, 6, 6, '2', '1100', NULL, '2024-05-19', '11:07:09'),
(9, 2, 10, '1', '55', NULL, '2024-05-19', '11:38:20'),
(10, 1, 14, '2', '1100', NULL, '2024-05-19', '18:34:14'),
(11, 2, 16, '3', '1650', NULL, '2024-05-19', '18:36:32'),
(12, 6, 6, '3', '1650', NULL, '2024-05-19', '18:39:25');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `branchID` int(11) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `product` varchar(100) NOT NULL,
  `stock` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `branchID`, `brand`, `product`, `stock`, `price`, `created_at`) VALUES
(1, 5, 'Geek Bar', 'Pro 15000', '14', '550', '2024-05-12'),
(2, 5, 'Flava Oxbar', 'Maze Pro', '6', '550', '2024-05-13'),
(3, 6, 'Flava', 'Romio', '6', '550', '2024-05-13'),
(4, 2, 'Flava', 'Hyper Bar', '6', '550', '2024-05-13'),
(5, 1, 'Romio', 'A2', '10', '550', '2024-05-18'),
(6, 6, 'relx', 'pod', '5', '550', '2024-05-18'),
(7, 5, 'add', 'add', '30', '55', '2024-05-19'),
(8, 1, 'Shift', 'chillax', '46', '550', '2024-05-19'),
(9, 1, 'try', 'try', '55', '11', '2024-05-19'),
(10, 2, 'try1', 'try1', '19', '55', '2024-05-19'),
(11, 5, 'try2', 'try2', '60', '99', '2024-05-19'),
(12, 6, 'try3', 'try3', '66', '505', '2024-05-19'),
(13, 2, 'Shift', 'chillax', '28', '550', '2024-05-19'),
(14, 1, 'add', 'add', '43', '550', '2024-05-19'),
(15, 5, 'adda', 'add', '20', '550', '2024-05-19'),
(16, 2, 'add', 'add', '17', '550', '2024-05-19');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
