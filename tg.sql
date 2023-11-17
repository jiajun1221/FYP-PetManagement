-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2023 at 01:00 PM
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
-- Database: `tg`
--

-- --------------------------------------------------------

--
-- Table structure for table `freelancer`
--

CREATE TABLE `freelancer` (
  `freelancerID` int(255) NOT NULL,
  `userID` int(255) NOT NULL,
  `freelancerName` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `hobby` varchar(255) NOT NULL,
  `skillset` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `freelancer`
--

INSERT INTO `freelancer` (`freelancerID`, `userID`, `freelancerName`, `gender`, `email`, `contact`, `hobby`, `skillset`) VALUES
(3, 119, 'JiaJun', 'Male', 'kevenchng1221@gmail.com', '0182929952', 'Swimming', 'Customer service skills'),
(7, 123, 'Joyce', 'Female', 'joyce123@gmail.com', '012345678', 'Hiking', 'Interpersonal skills'),
(16, 132, 'Dave', 'Male', 'dave@gmail.com', '0123456789', 'Hiking', 'Leadership skills');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `userName` varchar(45) NOT NULL,
  `userEmail` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `userGroup` varchar(255) NOT NULL,
  `verification` int(255) NOT NULL,
  `publish` int(255) NOT NULL,
  `image` varbinary(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `userName`, `userEmail`, `password`, `userGroup`, `verification`, `publish`, `image`) VALUES
(1, 'JiaJun', 'admin@gmail.com', 'MTIzNDU=', 'admin', 1, 1, ''),
(123, 'Joyce', 'joyce123@gmail.com', 'MTIzNDU=', 'freelancer', 0, 0, ''),
(132, 'Dave', 'dave@gmail.com', 'MTIzNDU2Nzg5', 'freelancer', 0, 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `freelancer`
--
ALTER TABLE `freelancer`
  ADD PRIMARY KEY (`freelancerID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `freelancer`
--
ALTER TABLE `freelancer`
  MODIFY `freelancerID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
