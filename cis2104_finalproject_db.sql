-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2023 at 07:39 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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
-- Table structure for table `cosumer_chart`
--

CREATE TABLE `cosumer_chart` (
  `ID` int(8) NOT NULL,
  `CUSTOMER_ID_FK` int(11) NOT NULL,
  `PRODUCT_ID_FK` int(11) NOT NULL,
  `REQUEST_ID_FK` int(11) NOT NULL,
  `TYPE` varchar(50) NOT NULL,
  `ORDER_QUANTITY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `ID` int(8) NOT NULL,
  `USER_IMG` varchar(100) NOT NULL,
  `USER_TYPE` enum('CUSTOMER','ADMIN') NOT NULL DEFAULT 'CUSTOMER',
  `USER_FIRST_NAME` varchar(100) NOT NULL,
  `USER_LAST_NAME` varchar(100) NOT NULL,
  `USER_CONTACT_NUMBER` bigint(11) NOT NULL,
  `USER_EMAIL` varchar(100) NOT NULL,
  `USER_PASSWORD` varchar(100) NOT NULL,
  `USER_ADDRESS` varchar(100) NOT NULL,
  `USER_STATUS` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`ID`, `USER_IMG`, `USER_TYPE`, `USER_FIRST_NAME`, `USER_LAST_NAME`, `USER_CONTACT_NUMBER`, `USER_EMAIL`, `USER_PASSWORD`, `USER_ADDRESS`, `USER_STATUS`) VALUES
(1, '', 'CUSTOMER', 'Justin', 'Oport', 9123456789, 'justin@gmail.com', 'justin', 'Mandaue City, Guizo', 'ACTIVE'),
(2, '', 'CUSTOMER', 'Mary Rascel', 'Mayol', 9987456321, 'mary@gmail.com', 'mary', 'Canduman, Mandaue City', 'ACTIVE'),
(3, '', 'CUSTOMER', 'Lianne Raine', 'Badinas', 9369852147, 'lianne@gmail.com ', 'lianne', 'Talisay City, Cebu', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `orderslip`
--

CREATE TABLE `orderslip` (
  `ID` int(8) NOT NULL,
  `CUSTOMER_ID_FK` int(11) NOT NULL,
  `PRODUCT_ID_FK` int(11) NOT NULL,
  `REQUEST_ID_FK` int(11) NOT NULL,
  `ORDER_TYPE` varchar(50) NOT NULL,
  `ORDER_QUANTITY` int(11) NOT NULL,
  `ORDER_STATUS` enum('PENDING','COMPLETE') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ID` int(8) NOT NULL,
  `PROD_IMG` varchar(25) NOT NULL,
  `PROD_NAME` varchar(100) NOT NULL,
  `PROD_DESC` text NOT NULL,
  `PROD_PRICE` bigint(20) NOT NULL,
  `PROD_QUANTITY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ID`, `PROD_IMG`, `PROD_NAME`, `PROD_DESC`, `PROD_PRICE`, `PROD_QUANTITY`) VALUES
(1, 'type1.jpg', 'Chair', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam modi magni iure minus id sint odit quaerat explicabo voluptatibus animi sit, corporis consequatur nisi nemo non fugiat odio alias sunt ', 500, 15),
(2, 'chair.png', 'Table', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam modi magni iure minus id sint odit quaerat explicabo voluptatibus animi sit, corporis consequatur nisi nemo non fugiat odio alias sunt ', 300, 10);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `request_order`
--

CREATE TABLE `request_order` (
  `ID` int(8) NOT NULL,
  `CUSTOMER_ID_FK` int(11) NOT NULL,
  `PRODUCT_ID_FK` int(11) NOT NULL,
  `REQUEST_DESCRIPTION` longtext NOT NULL,
  `REQUEST_STATUS` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cosumer_chart`
--
ALTER TABLE `cosumer_chart`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CUSTOMER_ID_FK` (`CUSTOMER_ID_FK`),
  ADD KEY `PRODUCT_ID_FK` (`PRODUCT_ID_FK`),
  ADD KEY `REQUEST_ID_FK` (`REQUEST_ID_FK`);

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
  ADD KEY `REQUEST_ID_FK` (`REQUEST_ID_FK`),
  ADD KEY `REQUEST_ID_FK_2` (`REQUEST_ID_FK`);

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
-- AUTO_INCREMENT for table `cosumer_chart`
--
ALTER TABLE `cosumer_chart`
  MODIFY `ID` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orderslip`
--
ALTER TABLE `orderslip`
  MODIFY `ID` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
