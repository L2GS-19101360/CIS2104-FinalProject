-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2023 at 05:58 PM
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
-- Database: `im2_data-modeling_team3_tth1230-300`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `Customer_ID` int(11) NOT NULL,
  `CustomerName` varchar(100) NOT NULL,
  `CustomerContactNumber` bigint(20) NOT NULL,
  `CustomerEmail` varchar(100) NOT NULL,
  `CustomerAddress` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`Customer_ID`, `CustomerName`, `CustomerContactNumber`, `CustomerEmail`, `CustomerAddress`) VALUES
(1, 'Marie Tanilon 	', 9285555829, 'MarieTanilon@gmail.com', 'Consolacion, Cebu'),
(2, 'Julian James Dajao', 9835558043, 'JulianDajao@gmail.com', 'Matlang, Isabel, Leyte'),
(3, 'Alyssa Jean Gesmondo', 9325558865, 'AlyssaGesmondo@gmail.com', 'Mandaue City, Cebu'),
(4, 'Adira Largo', 9332458458, 'AdiraLargo@gmail.com', 'Guadalupe, Cebu City'),
(5, 'Rodric Hones', 9285557148, 'RodricHones@gmail.com', 'Libertad, Kolambugan, Lanao del Norte, Mindanao'),
(6, 'Jazmine Luym', 9335553921, 'JazmineLuym@gmail.com', '4023-F Banawa Forest Hills, Cebu City'),
(7, 'Rhazel Solar', 9105558128, 'RhazelSolar@gmail.com', 'Upper Combado, Bantayan, Cebu'),
(8, 'Mary Rascel A. Mayol', 9325555810, 'MaryMayol@gmail.com', 'Lourdes, Bogo City, Cebu'),
(9, 'Marian Claire Oporto', 9325558865, 'MarianOporto@gmail.com', 'Saint Matthew Street Hermag Village Pagsabungan, Mandaue City, Cebu'),
(10, 'Mishann Cadavero', 9335556611, 'MishannCadavero@gmail.com', 'Talisay City, Cebu'),
(11, 'Lianne Raine E. Badinas', 9835559228, 'LianneBadinas@gmail.com', 'DECA Homes, Jagobiao, Mandaue City Cebu'),
(12, 'Khyle Ople', 9235553813, 'KhyleOple@gmail.com', 'Upper Combado, Bantayan, Cebu'),
(13, 'Caberte, Kris Joseph P.', 9225554312, 'JosephCaberte@gmail.com', 'Dauis, Bohol'),
(14, 'Justin Oport', 9215559632, 'JustinOport@gmail.com', 'Guizo, Mandaue City'),
(15, 'Rios, Dhon Kenrick T.', 9075556798, 'DhonRios@gmail.com', 'Lahug, Cebu City'),
(16, 'Aaron Daniel Richard S. Cabilin', 9105556920, 'AaronCabilin@gmail.com', 'Mandaue City, Cebu'),
(17, 'Raisa Huan', 9285550640, 'RaisaHuan@gmail.com', 'Dauis, Bohol'),
(18, 'Keana Tegio', 9325554339, 'KeanaTegio@gmail.com', 'Canduman, Mandaue City'),
(19, 'Drexlyn Martha Sinanggote', 9095553946, 'DrexlynSinanggote@@gmail.com', 'Talisay City, Cebu'),
(20, 'Shaine Mendoza', 9805558290, 'ShaineMendoza@gmail.com', 'Ramos, Cebu City');

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `MaterialID` int(50) NOT NULL,
  `MaterialName` varchar(50) NOT NULL,
  `MaterialType` varchar(50) NOT NULL,
  `Size` decimal(65,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`MaterialID`, `MaterialName`, `MaterialType`, `Size`) VALUES
(1, 'maple wood', 'raw material', '20'),
(2, 'metal', 'raw material', '15'),
(3, 'cotton', 'raw material', '13'),
(4, 'oak wood', 'raw material', '13'),
(5, 'pine wood', 'raw material', '13'),
(6, 'red wood', 'raw material', '22'),
(7, 'stainless steel', 'raw material', '10'),
(8, 'aluminum', 'raw material', '14'),
(9, 'enamelware', 'raw material', '14'),
(10, 'platics', 'raw material', '16'),
(11, 'Iron', 'raw material', '21'),
(12, 'copper', 'raw material', '16'),
(13, 'leather', 'raw material', '14'),
(14, 'fabric', 'raw material', '19'),
(15, 'nylon', 'raw material', '30'),
(16, 'velvet', 'raw material', '12'),
(17, 'plywood', 'raw material', '15'),
(18, 'wood veneers', 'raw material', '13'),
(19, 'fiberboard', 'raw material', '12'),
(20, 'thermofoil', 'raw material', '11');

-- --------------------------------------------------------

--
-- Table structure for table `orderslip`
--

CREATE TABLE `orderslip` (
  `OrderID` int(11) NOT NULL,
  `CustomerID_FK` int(11) NOT NULL,
  `ProductID_FK` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderslip`
--

INSERT INTO `orderslip` (`OrderID`, `CustomerID_FK`, `ProductID_FK`, `Quantity`) VALUES
(1, 10, 10, 5),
(2, 19, 14, 2),
(3, 13, 9, 4),
(4, 2, 4, 8),
(5, 5, 13, 11),
(6, 1, 11, 11),
(7, 1, 12, 11),
(8, 8, 10, 4),
(9, 9, 5, 7),
(10, 13, 14, 1),
(11, 6, 14, 1),
(12, 15, 3, 3),
(13, 14, 16, 8),
(14, 17, 2, 5),
(15, 17, 16, 9),
(16, 6, 13, 10),
(17, 6, 2, 5),
(18, 13, 13, 5),
(19, 19, 10, 4),
(20, 17, 20, 5);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_type` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `Customer_ID_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_type`, `price`, `quantity`, `Customer_ID_FK`) VALUES
(1, 'Chair', 'Ready-Made', 240, 20, 1),
(2, 'Table w/ glass surface', 'Ready-Made', 750, 25, 9),
(3, 'Metal Table', 'Ready-Made', 1500, 15, 15),
(4, 'Chair w/ arm rest', 'Ready-Made', 450, 10, 9),
(5, 'Metal chair', 'Ready-Made', 1200, 10, 13),
(6, 'Gaming Chair', 'Ready-Made', 3500, 15, 20),
(7, 'Office Chair', 'Ready-Made', 1700, 25, 14),
(8, 'Extendable Table', 'Ready-Made', 4200, 15, 17),
(9, 'Gameing Table', 'Ready-Made', 3400, 10, 6),
(10, 'Office Table', 'Ready-Made', 2700, 20, 17),
(11, 'Mini Table', 'Ready-Made', 600, 25, 18),
(12, 'Mini Chair', 'Ready-Made', 300, 25, 10),
(13, 'Table Lamp', 'Ready-Made', 699, 30, 14),
(14, 'Hanging Cabinet', 'Ready-Made', 799, 30, 9),
(15, 'Cabinet', 'Ready-Made', 499, 30, 12),
(16, 'Plastic Cabinet(s)', 'Ready-Made', 200, 30, 10),
(17, 'Plastic Cabinet(m)', 'Ready-Made', 500, 30, 6),
(18, 'Plastic Cabinet(l)', 'Ready-Made', 699, 30, 16),
(19, 'Bathroom Door', 'Ready-Made', 699, 10, 16),
(20, 'Screen Door', 'Ready-Made', 1200, 15, 17);

-- --------------------------------------------------------

--
-- Table structure for table `purchased_records`
--

CREATE TABLE `purchased_records` (
  `id` int(11) NOT NULL,
  `stored_customer_name` varchar(100) NOT NULL,
  `stored_customer_phone` bigint(11) NOT NULL,
  `stored_customer_email` varchar(100) NOT NULL,
  `stored_product_name` varchar(100) NOT NULL,
  `stored_product_type` varchar(100) NOT NULL,
  `stored_product_oriPrice` int(11) NOT NULL,
  `stored_quantity` int(11) NOT NULL,
  `total_payment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`Customer_ID`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`MaterialID`);

--
-- Indexes for table `orderslip`
--
ALTER TABLE `orderslip`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `Customer` (`CustomerID_FK`),
  ADD KEY `Product` (`ProductID_FK`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `Customer_ID_FK` (`Customer_ID_FK`);

--
-- Indexes for table `purchased_records`
--
ALTER TABLE `purchased_records`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `Customer_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orderslip`
--
ALTER TABLE `orderslip`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `purchased_records`
--
ALTER TABLE `purchased_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderslip`
--
ALTER TABLE `orderslip`
  ADD CONSTRAINT `orderslip_ibfk_1` FOREIGN KEY (`CustomerID_FK`) REFERENCES `customers` (`Customer_ID`),
  ADD CONSTRAINT `orderslip_ibfk_2` FOREIGN KEY (`ProductID_FK`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`Customer_ID_FK`) REFERENCES `customers` (`Customer_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
