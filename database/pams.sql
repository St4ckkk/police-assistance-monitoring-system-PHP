-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2023 at 05:03 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

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
(5, '22', '22'),
(6, 'keyan', '123');

-- --------------------------------------------------------

--
-- Table structure for table `police`
--

CREATE TABLE `police` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `rank` varchar(50) NOT NULL,
  `policebadge` varchar(50) NOT NULL,
  `status` varchar(255) DEFAULT 'Not Assigned',
  `specialty` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `police`
--

INSERT INTO `police` (`id`, `fullname`, `contact`, `rank`, `policebadge`, `status`, `specialty`) VALUES
(1, 'Keyan Andy Delgado', '09262408442', 'PO3', '2468', 'Not Assign', 'Special Weapons and Tactics (SWAT)'),
(2, 'Abdul Azis Marot', '09262408442', 'PO2', '1234', 'Not Assign', 'Drug Enforcement'),
(3, 'Lynch Nico Futolan', '09262408442', 'PO1', '7890', 'Not Assign', 'Criminal Investigation'),
(5, 'Jener Kevin Ogatis', '09262408442', 'SPO1', '928495', 'Assigned', 'Community Relations'),
(6, 'Ali Jimbo', '09262408442', 'General', '13283', 'Not Assigned', 'K9 Unit');

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
  `status` varchar(225) NOT NULL,
  `evidence` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`id`, `location`, `contact`, `date`, `incident_type`, `instruction`, `status`, `evidence`) VALUES
(32, 'Sto. Niño, Cebu City, Cebu, Philippines', '09262408442', '2023-12-20', 'Drugs', 'omg help', 'Done', 'uploads/stephen-picilaidis-XjDYFRBciTo-unsplash.jpg'),
(33, 'Ambalgan, South Cotabato, Philippines', '09262408442', '2023-12-20', 'Drugs', 'omg help', 'Done', 'uploads/stephen-picilaidis-XjDYFRBciTo-unsplash.jpg'),
(34, 'Sto. Niño, South Cotabato, Philippines', '09262408442', '2023-12-20', 'Motorcycle Incident', 'omg help', 'Done', 'uploads/stephen-picilaidis-XjDYFRBciTo-unsplash.jpg'),
(35, 'Dakbayan sa General Santos, South Cotabato, Philippines', '09262408442', '2023-12-20', 'Drugs', 'omg help', 'Done', 'uploads/stephen-picilaidis-XjDYFRBciTo-unsplash.jpg'),
(36, 'Sto. Niño, South Cotabato, Philippines', '09262408442', '2023-12-20', 'Others', 'ahh nagmaoyyy', 'Done', 'uploads/black-man.png'),
(37, 'Sto. Niño, South Cotabato, Philippines', '09262408442', '2023-12-20', 'Others', 'ahh nagmaoyyy', 'Done', 'uploads/black-man.png'),
(38, 'Gensac-sur-Garonne, France', '09262408442', '2023-12-20', 'Drugs', 'omg help', 'Done', 'uploads/stephen-picilaidis-XjDYFRBciTo-unsplash.jpg'),
(39, 'Gensac-sur-Garonne, France', '09262408442', '2023-12-20', 'Drugs', 'omg help', 'Done', 'uploads/stephen-picilaidis-XjDYFRBciTo-unsplash.jpg'),
(40, 'Sto. Niño, South Cotabato, Philippines', '09262408442', '2023-12-20', 'Others', 'ahh nagmaoyyy', 'Done', 'uploads/black-man.png');

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
  `status` varchar(225) NOT NULL DEFAULT 'OnGoing' COMMENT '1 Done = 0 Onproccess',
  `evidence` varchar(255) DEFAULT NULL,
  `assignedpolice` varchar(255) DEFAULT 'None'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `location`, `contact`, `date`, `incident_type`, `instruction`, `status`, `evidence`, `assignedpolice`) VALUES
(50, 'Gensac-sur-Garonne, France', '09262408442', '2023-12-20', 'Drugs', 'omg help', 'Done', 'uploads/stephen-picilaidis-XjDYFRBciTo-unsplash.jpg', 'None'),
(53, 'Sto. Niño, South Cotabato, Philippines', '09262408442', '2023-12-20', 'Unsafe Acts', 'oh omg help', 'OnGoing', 'uploads/maxresdefault (1).jpg', '5'),
(54, 'Ambalgan, South Cotabato, Philippines', '09262408442', '2023-12-20', 'Assault', 'ahh help betch', 'OnGoing', 'uploads/t-junction.png', 'None');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `police`
--
ALTER TABLE `police`
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `police`
--
ALTER TABLE `police`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
