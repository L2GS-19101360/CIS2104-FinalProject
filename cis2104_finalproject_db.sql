-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2023 at 07:39 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cis2104_finalproject_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `ID` int(8) NOT NULL,
  `FIRST_NAME` varchar(100) NOT NULL,
  `LAST_NAME` varchar(100) NOT NULL,
  `CONTACT_NUMBER` bigint(11) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `ADDRESS` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orderslip`
--

CREATE TABLE `orderslip` (
  `ID` int(8) NOT NULL,
  `CUSTOMER_ID_FK` int(11) NOT NULL,
  `PRODUCT_ID_FK` int(11) NOT NULL,
  `REQUEST_ID_FK` int(11) NOT NULL,
  `TYPE` int(11) NOT NULL,
  `QUANTITY` int(11) NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ID` int(8) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `PRICE` bigint(20) NOT NULL,
  `QUANTITY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_records`
--

CREATE TABLE `purchase_records` (
  `ID` int(8) NOT NULL,
  `CUSTOMER_ID_FK` int(11) NOT NULL,
  `PRODUCT_ID_FK` int(11) NOT NULL,
  `REQUEST_ID_FK` int(11) NOT NULL,
  `DATE_RECORDED` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `request_order`
--

CREATE TABLE `request_order` (
  `ID` int(8) NOT NULL,
  `CUSTOMER_ID_FK` int(11) NOT NULL,
  `PRODUCT_ID_FK` int(11) NOT NULL,
  `DESCRIPTION` longtext NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `orderslip`
--
ALTER TABLE `orderslip`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CUSTOMER_ID_FK` (`CUSTOMER_ID_FK`),
  ADD KEY `PRODUCT_ID_FK` (`PRODUCT_ID_FK`),
  ADD KEY `REQUEST_ID_FK` (`REQUEST_ID_FK`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `purchase_records`
--
ALTER TABLE `purchase_records`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CUSTOMER_ID_FK` (`CUSTOMER_ID_FK`),
  ADD KEY `PRODUCT_ID_FK` (`PRODUCT_ID_FK`),
  ADD KEY `REQUEST_ID_FK` (`REQUEST_ID_FK`);

--
-- Indexes for table `request_order`
--
ALTER TABLE `request_order`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CUSTOMER_ID_FK` (`CUSTOMER_ID_FK`),
  ADD KEY `PRODUCT_ID_FK` (`PRODUCT_ID_FK`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `ID` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orderslip`
--
ALTER TABLE `orderslip`
  MODIFY `ID` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_records`
--
ALTER TABLE `purchase_records`
  MODIFY `ID` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request_order`
--
ALTER TABLE `request_order`
  MODIFY `ID` int(8) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderslip`
--
ALTER TABLE `orderslip`
  ADD CONSTRAINT `orderslip_ibfk_1` FOREIGN KEY (`CUSTOMER_ID_FK`) REFERENCES `customers` (`ID`),
  ADD CONSTRAINT `orderslip_ibfk_2` FOREIGN KEY (`PRODUCT_ID_FK`) REFERENCES `product` (`ID`),
  ADD CONSTRAINT `orderslip_ibfk_3` FOREIGN KEY (`REQUEST_ID_FK`) REFERENCES `request_order` (`ID`);

--
-- Constraints for table `purchase_records`
--
ALTER TABLE `purchase_records`
  ADD CONSTRAINT `purchase_records_ibfk_1` FOREIGN KEY (`CUSTOMER_ID_FK`) REFERENCES `customers` (`ID`),
  ADD CONSTRAINT `purchase_records_ibfk_2` FOREIGN KEY (`PRODUCT_ID_FK`) REFERENCES `product` (`ID`),
  ADD CONSTRAINT `purchase_records_ibfk_3` FOREIGN KEY (`REQUEST_ID_FK`) REFERENCES `request_order` (`ID`);

--
-- Constraints for table `request_order`
--
ALTER TABLE `request_order`
  ADD CONSTRAINT `request_order_ibfk_1` FOREIGN KEY (`CUSTOMER_ID_FK`) REFERENCES `customers` (`ID`),
  ADD CONSTRAINT `request_order_ibfk_2` FOREIGN KEY (`PRODUCT_ID_FK`) REFERENCES `product` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
