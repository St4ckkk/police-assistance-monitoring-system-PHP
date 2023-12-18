-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2023 at 04:43 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pams`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `password`) VALUES
(1, 'admin', '123'),
(5, '22', '22');

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `id` int(225) NOT NULL,
  `location` varchar(225) NOT NULL,
  `contact` varchar(225) NOT NULL,
  `date` varchar(225) NOT NULL,
  `incident_type` varchar(225) NOT NULL,
  `instruction` varchar(225) NOT NULL,
  `status` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`id`, `location`, `contact`, `date`, `incident_type`, `instruction`, `status`) VALUES
(28, 'Polomolok, South Cotabato, Philippines', '3213123123', '2023-11-23', 'ac', 'asdasd', 'OnGoing'),
(30, 'Azucena Street, Polomolok, South Cotabato, Philippines', '3213123123', '2023-12-08', 'Fire Incident', 'asdasd', 'OnGoing');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(225) NOT NULL,
  `location` varchar(225) NOT NULL,
  `contact` varchar(225) NOT NULL,
  `date` varchar(225) NOT NULL,
  `incident_type` varchar(225) NOT NULL,
  `instruction` varchar(225) NOT NULL,
  `status` varchar(225) NOT NULL COMMENT '1 Done = 0 Onproccess'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `location`, `contact`, `date`, `incident_type`, `instruction`, `status`) VALUES
(28, 'Polomolok, South Cotabato, Philippines', '3213123123', '2023-11-23', 'ac', 'asdasd', 'Done'),
(30, 'Azucena Street, Polomolok, South Cotabato, Philippines', '3213123123', '2023-12-08', 'Fire Incident', 'asdasd', 'Done');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(225) NOT NULL,
  `location` varchar(225) NOT NULL,
  `contact` varchar(225) NOT NULL,
  `date` varchar(225) NOT NULL,
  `incident_type` varchar(225) NOT NULL,
  `instruction` varchar(225) NOT NULL,
  `status` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `location`, `contact`, `date`, `incident_type`, `instruction`, `status`) VALUES
(28, 'Polomolok, South Cotabato, Philippines', '3213123123', '2023-11-23', 'ac', 'asdasd', 'Done'),
(30, 'Azucena Street, Polomolok, South Cotabato, Philippines', '3213123123', '2023-12-08', 'Fire Incident', 'asdasd', 'Done');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
