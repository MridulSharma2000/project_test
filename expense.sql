-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2023 at 01:19 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `expense`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Id` int(11) NOT NULL,
  `Category_Name` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Id`, `Category_Name`, `user_id`) VALUES
(1, 'Entertainment', 5),
(2, 'Grocery', 5),
(3, 'shoping', 5),
(4, 'Entertainment', 1),
(5, 'shopping', 1),
(6, 'Grocery', 1),
(7, 'Services', 1),
(8, 'Insurance', 1),
(9, 'Education', 1),
(10, 'Entertainment', 8),
(11, 'Health', 1),
(12, 'Entertainment', 7);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `item_name` varchar(200) NOT NULL,
  `user_id` int(100) NOT NULL,
  `category_id` int(100) NOT NULL,
  `expense_date` date NOT NULL,
  `expense_cost` varchar(200) NOT NULL,
  `expense_bill` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `item_name`, `user_id`, `category_id`, `expense_date`, `expense_cost`, `expense_bill`) VALUES
(27, 'Milk', 1, 5, '2023-02-23', '500', './Views/upload/310images.png'),
(28, 'Recharge', 1, 4, '2023-06-14', '2000', '/../Views/upload/800istockphoto-483321293-612x612.jpg'),
(29, 'Milk', 7, 12, '2023-06-23', '1500', '/../Views/upload/567'),
(30, 'Medicines', 1, 11, '2023-03-23', '2000', '/../Views/upload/796');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `Name`, `Email`, `Password`) VALUES
(1, 'Mridul Sharma', 'Mridul@gmail.com', '123'),
(4, 'Viney Sharma', 'viney@gmail.com', '123'),
(5, 'Ritik Saini', 'ritik@gmail.com', '123'),
(6, 'Shivam', 'shivam@gmail.com', '123'),
(7, 'Mridul Sharma', 'mridulsharma@gmail.com', '123'),
(8, 'service', 'sourav@gmail.com', '321'),
(9, 'virat', 'virat@gmail.com', '123'),
(10, '', '', ''),
(11, '', '', ''),
(12, '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
