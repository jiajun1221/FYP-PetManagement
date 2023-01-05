-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2022 at 11:27 AM
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
-- Database: `petcare`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointmentID` int(11) NOT NULL,
  `petID` varchar(255) NOT NULL,
  `appointmentDate` varchar(45) DEFAULT NULL,
  `appointmentTime` varchar(45) DEFAULT NULL,
  `serviceType` varchar(45) DEFAULT NULL,
  `appointmentDesc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointmentID`, `petID`, `appointmentDate`, `appointmentTime`, `serviceType`, `appointmentDesc`) VALUES
(14, '1', '2023-01-07', '10:00AM', 'Grooming', ''),
(15, '1', '2023-01-07', '12:00PM', 'Grooming', '');

-- --------------------------------------------------------


CREATE TABLE `category` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryID`, `categoryName`) VALUES
(30, 'Pet Food'),
(31, 'Pet Shampoo');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerID` int(11) NOT NULL,
  `customerName` varchar(45) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `contact` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `customerName`, `gender`, `email`, `contact`, `address`) VALUES
(1, 'Chng Jia Jun', 'Male', 'kevenchng1221@gmail.com', '0123456789', 'No 11, Jalan Baldu 4'),
(3, 'Chua Chee Long', 'Male', 'chuacl1224@gmail.com', '0123456789', 'No 22, Jalan Tombak 6'),
(6, 'Elaine Hui', 'Female', 'elainehui0616@gmail.com', '012345678', 'Jalan Dedap 3'),
(7, 'Lim Yu Seng', 'Male', 'limyuseng123@gmail.com', '012345678', 'No 23, Jalan Temak');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_order`
--

CREATE TABLE `delivery_order` (
  `ID` int(11) NOT NULL,
  `supplier` varchar(30) NOT NULL,
  `do_date` date NOT NULL,
  `recieved_date` date DEFAULT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery_order`
--

INSERT INTO `delivery_order` (`ID`, `supplier`, `do_date`, `recieved_date`, `status`) VALUES
(1, 'Coco&Joe Sdn Bhd', '2022-12-26', NULL, '1'),
(2, 'Coco&Joe Sdn Bhd', '2022-12-26', '2022-12-26', '2'),
(3, 'Coco&Joe Sdn Bhd', '2022-12-26', '2022-12-26', '2');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_order_detail`
--

CREATE TABLE `delivery_order_detail` (
  `ID` int(30) NOT NULL,
  `DO_ID` int(30) NOT NULL,
  `product` varchar(30) NOT NULL,
  `quantity` varchar(30) NOT NULL,
  `item_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery_order_detail`
--

INSERT INTO `delivery_order_detail` (`ID`, `DO_ID`, `product`, `quantity`, `item_status`) VALUES
(1, 1, 'JJ Cat Food', '3', ''),
(2, 1, 'CL Dog Food', '2', ''),
(3, 2, 'JJ Cat Food', '23', '1'),
(4, 2, 'CL Dog Food', '1', '1'),
(5, 3, 'JJ Cat Food', '23', '1'),
(6, 3, 'CL Dog Food', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `grooming`
--

CREATE TABLE `grooming` (
  `groomingID` int(255) NOT NULL,
  `GserviceID` int(11) NOT NULL,
  `groomingInfo` varchar(255) NOT NULL,
  `groomingDesc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grooming`
--

INSERT INTO `grooming` (`groomingID`, `GserviceID`, `groomingInfo`, `groomingDesc`) VALUES
(9, 63, 'basic', 'dwqq'),
(10, 66, 'advanced', 'Nails is long'),
(11, 91, 'advanced', 'efqefeq'),
(12, 92, 'advanced', '');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `hotelID` int(255) NOT NULL,
  `HserviceID` int(11) NOT NULL,
  `hotelDesc` varchar(255) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `duration` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotelID`, `HserviceID`, `hotelDesc`, `startDate`, `endDate`, `duration`) VALUES
(1, 84, 'wttw', '2022-12-01', '2022-12-09', 8);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `itemID` int(255) NOT NULL,
  `itemName` varchar(255) NOT NULL,
  `itemType` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `expiryDate` date NOT NULL,
  `label` varchar(255) NOT NULL,
  `sellingprice` double(8,2) NOT NULL,
  `unitprice` double(8,2) NOT NULL,
  `image` varbinary(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`itemID`, `itemName`, `itemType`, `quantity`, `expiryDate`, `label`, `sellingprice`, `unitprice`, `image`) VALUES
(15, 'JJ Cat Food', '30', 65, '2022-12-24', 'Food', 25.00, 25.00, ''),
(16, 'CL Dog Food', '30', 7, '2022-12-31', '', 20.00, 25.00, '');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `orderID` int(255) NOT NULL,
  `orderItem` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` int(255) NOT NULL,
  `orderDate` date NOT NULL,
  `supplier` varchar(255) NOT NULL,
  `invoiceID` varchar(233) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`orderID`, `orderItem`, `qty`, `status`, `orderDate`, `supplier`, `invoiceID`) VALUES
(1, 'JJ Cat Food', 50, 0, '2022-12-20', 'Coco&Joe Sdn Bhd', '23456'),
(11134, '', 0, 0, '0000-00-00', '1', ''),
(11135, '', 0, 0, '2022-12-23', '1', ''),
(11136, '', 0, 0, '2022-12-23', '1', ''),
(11137, '', 0, 0, '0000-00-00', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `pet`
--

CREATE TABLE `pet` (
  `petID` int(11) NOT NULL,
  `petName` varchar(45) DEFAULT NULL,
  `petType` varchar(255) NOT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `species` varchar(45) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `color` varchar(45) DEFAULT NULL,
  `weight` double DEFAULT NULL,
  `owner` varchar(255) NOT NULL,
  `status` varchar(45) DEFAULT NULL,
  `remark` varchar(45) DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pet`
--

INSERT INTO `pet` (`petID`, `petName`, `petType`, `gender`, `species`, `birthdate`, `color`, `weight`, `owner`, `status`, `remark`, `image`) VALUES
(1, 'Lucky', 'Dog', 'Male', 'Shephard', '2022-08-02', 'Brown', 15, '1', 'Healthy', 'Overweight', '12.jpg'),
(2, 'Poppy', 'Dog', 'Male', 'Chihuahua', '2022-11-02', 'Brown', 10, '1', 'Injured', 'Leg Injury', '2.jpg'),
(3, 'Cotton', 'Cat', 'Female', 'Bobtail', '2018-01-10', 'White', 4, '6', 'Slightly Sick', 'Fever', '3.jpg'),
(4, 'DouHua', 'Cat', 'Female', 'Siamese', '2020-01-09', 'B&W', 3, '6', NULL, NULL, '。.jpg'),
(7, 'Joel', 'Dog', 'Male', 'Husky', '2022-12-01', 'B&W', 23, '3', NULL, NULL, 'photo-1617895153857-82fe79adfcd4.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE `purchase_order` (
  `ID` int(11) NOT NULL,
  `po_date` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `supplier` varchar(50) NOT NULL,
  `sub_total` varchar(20) NOT NULL,
  `tax` varchar(50) NOT NULL,
  `tax_total` varchar(20) NOT NULL,
  `total` varchar(20) NOT NULL,
  `completation_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase_order`
--

INSERT INTO `purchase_order` (`ID`, `po_date`, `status`, `supplier`, `sub_total`, `tax`, `tax_total`, `total`, `completation_date`) VALUES
(9, '2022-12-26', '1', 'Coco&Joe Sdn Bhd', '120.00', '6', '7.20', '127.20', NULL),
(10, '2022-12-26', '1', 'Coco&Joe Sdn Bhd', '88.00', '6', '5.28', '93.28', NULL),
(11, '2022-12-26', '1', 'Coco&Joe Sdn Bhd', '88.00', '6', '5.28', '93.28', NULL),
(12, '2022-12-26', '1', 'Coco&Joe Sdn Bhd', '', '', '', '', NULL),
(13, '2022-12-26', '2', 'Coco&Joe Sdn Bhd', '43.00', '6', '2.58', '45.58', '2022-12-26'),
(14, '2022-12-26', '1', 'Coco&Joe Sdn Bhd', '375.00', '6', '22.50', '397.50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_detail`
--

CREATE TABLE `purchase_order_detail` (
  `ID` int(55) NOT NULL,
  `po_ID` int(50) NOT NULL,
  `product` varchar(50) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `price` varchar(20) NOT NULL,
  `total` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase_order_detail`
--

INSERT INTO `purchase_order_detail` (`ID`, `po_ID`, `product`, `quantity`, `price`, `total`) VALUES
(3, 9, 'JJ Cat Food', '12', '2', '24'),
(4, 9, 'CL Dog Food', '32', '3', '96'),
(5, 10, 'JJ Cat Food', '3', '2', '6'),
(6, 10, 'CL Dog Food', '12', '3', '36'),
(7, 10, 'JJ Cat Food', '23', '2', '46'),
(8, 11, 'JJ Cat Food', '3', '2', '6'),
(9, 11, 'CL Dog Food', '12', '3', '36'),
(10, 11, 'JJ Cat Food', '23', '2', '46'),
(11, 12, 'JJ Cat Food', '123', '', ''),
(12, 12, 'CL Dog Food', '213', '', ''),
(13, 13, 'CL Dog Food', '20', '2', '40'),
(14, 13, 'JJ Cat Food', '3', '1', '3'),
(15, 14, 'JJ Cat Food', '2', '3', '6'),
(16, 14, 'JJ Cat Food', '123', '3', '369');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `serviceID` int(255) UNSIGNED NOT NULL,
  `servicePETID` int(255) NOT NULL,
  `serviceType` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `time` time NOT NULL DEFAULT current_timestamp(),
  `price` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`serviceID`, `servicePETID`, `serviceType`, `date`, `time`, `price`) VALUES
(63, 1, 'Grooming', '2022-10-25', '13:35:00', 70.00),
(66, 3, 'Grooming', '2022-11-22', '15:40:00', 210.00),
(84, 2, 'Hotel', '2022-12-01', '10:16:00', 120.00),
(88, 3, 'Vet', '2022-12-06', '09:41:00', 200.00),
(91, 4, 'Grooming', '2022-12-02', '15:19:00', 200.00),
(94, 1, 'Vet', '2022-12-02', '17:07:00', 200.00),
(95, 1, 'Hotel', '2022-12-02', '16:58:00', 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffID` int(255) NOT NULL,
  `userID` int(255) NOT NULL,
  `staffName` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `speciality` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffID`, `userID`, `staffName`, `gender`, `email`, `contact`, `speciality`) VALUES
(4, 116, 'Lim Yu Seng', 'Male', 'yuseng123@gmail.com', '0123456789', 'Pet Grooming Servicing');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplierID` int(255) NOT NULL,
  `supplierName` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contactName` varchar(255) NOT NULL,
  `contactNo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplierID`, `supplierName`, `address`, `contactName`, `contactNo`) VALUES
(1, 'Coco&Joe Sdn Bhd', 'No 79 jalan perindustrian, Jalan Kasban 4/Ku8, kawasan perindustrian meru selatan, 41050 Klang, Selangor', 'John', '012-3456789');

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
(1, 'JiaJun', 'kevenchng1221@gmail.com', 'MTIzNDU=', 'admin', 1, 1, ''),
(2, 'Sengzi', 'staff123@gmail.com', 'MTIzNDU=', 'staff', 0, 0, ''),
(3, 'zhongqing187', 'zhongqing0824@gmail.com', '12345', 'customer', 1, 0, ''),
(116, 'YuSeng', 'yuseng123@gmail.com', 'MTIzNDU=', 'staff', 0, 0, ''),
(118, 'turttle', 'fidopa9798@subdito.com', 'dHVydHRsZTE=', 'customer', 1, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `vet`
--

CREATE TABLE `vet` (
  `vetID` int(11) NOT NULL,
  `VserviceID` int(11) NOT NULL,
  `vetInfo` varchar(255) NOT NULL,
  `vetDesc` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vet`
--

INSERT INTO `vet` (`vetID`, `VserviceID`, `vetInfo`, `vetDesc`, `status`, `remark`) VALUES
(1, 86, 'Injuries Threatment', 'fsfsg', 'Slightly Injured', 'ebfebet'),
(2, 88, 'Diseases Threatment', '4t4t34t', 'Injured', '32rr23'),
(3, 94, 'Injuries Threatment', 'eqfef', 'Slightly Injured', 'sfbfs');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointmentID`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `delivery_order`
--
ALTER TABLE `delivery_order`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `delivery_order_detail`
--
ALTER TABLE `delivery_order_detail`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `grooming`
--
ALTER TABLE `grooming`
  ADD PRIMARY KEY (`groomingID`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotelID`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`itemID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`petID`);

--
-- Indexes for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `purchase_order_detail`
--
ALTER TABLE `purchase_order_detail`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`serviceID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffID`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplierID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `vet`
--
ALTER TABLE `vet`
  ADD PRIMARY KEY (`vetID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `delivery_order`
--
ALTER TABLE `delivery_order`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `delivery_order_detail`
--
ALTER TABLE `delivery_order_detail`
  MODIFY `ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `grooming`
--
ALTER TABLE `grooming`
  MODIFY `groomingID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `hotelID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `itemID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `orderID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11138;

--
-- AUTO_INCREMENT for table `pet`
--
ALTER TABLE `pet`
  MODIFY `petID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `purchase_order_detail`
--
ALTER TABLE `purchase_order_detail`
  MODIFY `ID` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `serviceID` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staffID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplierID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `vet`
--
ALTER TABLE `vet`
  MODIFY `vetID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
