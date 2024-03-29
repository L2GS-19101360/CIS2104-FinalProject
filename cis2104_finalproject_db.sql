-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2023 at 02:31 PM
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
  `C_TYPE` varchar(50) NOT NULL,
  `C_QUANTITY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cosumer_chart`
--

INSERT INTO `cosumer_chart` (`ID`, `CUSTOMER_ID_FK`, `PRODUCT_ID_FK`, `REQUEST_ID_FK`, `C_TYPE`, `C_QUANTITY`) VALUES
(1, 4, 1, 0, 'READY-MADE', 1);

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
(1, 'UserProfile.png', 'CUSTOMER', 'Justin', 'Oport', 9123456789, 'justin@gmail.com', 'justin', 'Mandaue City, Guizo', 'ACTIVE'),
(2, 'UserProfile.png', 'CUSTOMER', 'Mary Rascel', 'Mayol', 9987456321, 'mary@gmail.com', 'mary', 'Canduman, Mandaue City', 'ACTIVE'),
(3, 'UserProfile.png', 'CUSTOMER', 'Lianne Raine', 'Badinas', 9369852147, 'lianne@gmail.com ', 'lianne', 'Talisay City, Cebu', 'ACTIVE'),
(4, 'user2.jpg', 'CUSTOMER', 'Jaruzelski', 'Matero', 9698412587, 'jaruz@gmail.com', 'jaruz', 'Talisay', 'ACTIVE'),
(5, '', 'ADMIN', 'Lorenz', 'Suico', 9336345126, 'suico@gmail.com', 'suico', 'Mandaue City', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `orderslip`
--

CREATE TABLE `orderslip` (
  `ID` int(8) NOT NULL,
  `CUSTOMER_ID_FK` int(11) NOT NULL,
  `PRODUCT_ID_FK` int(11) NOT NULL,
  `REQUEST_ID_FK` int(11) NOT NULL,
  `ORDER_PRICE` int(11) NOT NULL,
  `ORDER_TYPE` enum('READY-MADE','CUSTOM-MADE') NOT NULL DEFAULT 'READY-MADE',
  `ORDER_QUANTITY` int(11) NOT NULL,
  `ORDER_STATUS` enum('PENDING','COMPLETE') NOT NULL DEFAULT 'PENDING'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderslip`
--

INSERT INTO `orderslip` (`ID`, `CUSTOMER_ID_FK`, `PRODUCT_ID_FK`, `REQUEST_ID_FK`, `ORDER_PRICE`, `ORDER_TYPE`, `ORDER_QUANTITY`, `ORDER_STATUS`) VALUES
(1, 4, 2, 0, 300, 'READY-MADE', 1, 'COMPLETE'),
(2, 4, 1, 0, 500, 'READY-MADE', 5, 'COMPLETE'),
(3, 3, 1, 0, 500, 'READY-MADE', 5, 'PENDING'),
(4, 2, 1, 0, 500, 'READY-MADE', 4, 'PENDING'),
(5, 3, 2, 0, 300, 'READY-MADE', 5, 'PENDING'),
(6, 4, 0, 3, 600, 'CUSTOM-MADE', 3, 'COMPLETE'),
(7, 4, 0, 4, 400, 'CUSTOM-MADE', 4, 'COMPLETE'),
(8, 4, 2, 0, 300, 'READY-MADE', 1, 'PENDING');

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
(2, 'chair.png', 'Table', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam modi magni iure minus id sint odit quaerat explicabo voluptatibus animi sit, corporis consequatur nisi nemo non fugiat odio alias sunt ', 300, 10),
(3, 'cabinet (1).png', 'Cabinet', 'jndjifwhvnueriveuaiw erhwuehrveuru weruywervqeunbrihue ', 600, 10),
(4, 'dining (1).png', 'Dining Set', 'dfnat,tusbrntaretbat', 800, 15),
(5, 'bed.png', 'Bed', 'befebmi9r eimvtwmefo ervreth t atb', 1200, 15),
(6, 'couch (1).png', 'Couch', 'dbtgre tusnjrtrc srhsrysbt', 1300, 20);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_records`
--

CREATE TABLE `purchase_records` (
  `ID` int(8) NOT NULL,
  `CUSTOMER_ID_FK` int(11) NOT NULL,
  `ORDER_ID_FK` int(11) NOT NULL,
  `PURCHASE_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_records`
--

INSERT INTO `purchase_records` (`ID`, `CUSTOMER_ID_FK`, `ORDER_ID_FK`, `PURCHASE_DATE`) VALUES
(1, 4, 1, '2023-05-09'),
(2, 4, 2, '2023-05-08'),
(3, 4, 6, '2023-05-08'),
(4, 4, 7, '2023-05-07');

-- --------------------------------------------------------

--
-- Table structure for table `request_order`
--

CREATE TABLE `request_order` (
  `ID` int(8) NOT NULL,
  `CUSTOMER_ID_FK` int(11) NOT NULL,
  `PRODUCT_ID_FK` int(11) NOT NULL,
  `REQUEST_DESCRIPTION` longtext NOT NULL,
  `REQUEST_QUANTITY` int(11) NOT NULL,
  `REQUEST_STATUS` enum('PENDING','ACCEPTED') NOT NULL DEFAULT 'PENDING'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request_order`
--

INSERT INTO `request_order` (`ID`, `CUSTOMER_ID_FK`, `PRODUCT_ID_FK`, `REQUEST_DESCRIPTION`, `REQUEST_QUANTITY`, `REQUEST_STATUS`) VALUES
(1, 1, 1, 'dsfdfvfewa', 1, 'PENDING'),
(2, 2, 2, 'asdascasvwewbretraa', 3, 'PENDING'),
(3, 4, 1, 'gdbgret', 3, 'PENDING'),
(4, 4, 2, 'gsfsregretbaefavweta', 4, 'PENDING'),
(5, 4, 1, 'eaeadfvewtbrt', 4, 'PENDING'),
(6, 4, 2, 'ervawerbawt4', 3, 'PENDING');

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
  ADD KEY `ORDER_ID_FK` (`ORDER_ID_FK`);

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
  MODIFY `ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orderslip`
--
ALTER TABLE `orderslip`
  MODIFY `ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `purchase_records`
--
ALTER TABLE `purchase_records`
  MODIFY `ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `request_order`
--
ALTER TABLE `request_order`
  MODIFY `ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `purchase_records`
--
ALTER TABLE `purchase_records`
  ADD CONSTRAINT `purchase_records_ibfk_2` FOREIGN KEY (`CUSTOMER_ID_FK`) REFERENCES `customers` (`ID`),
  ADD CONSTRAINT `purchase_records_ibfk_3` FOREIGN KEY (`ORDER_ID_FK`) REFERENCES `orderslip` (`ID`);

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
