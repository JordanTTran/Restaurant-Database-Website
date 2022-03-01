-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 14, 2021 at 03:51 AM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `Branch_No` int(2) NOT NULL,
  `Street_No` int(10) NOT NULL,
  `City` varchar(20) NOT NULL,
  `Postal_Code` varchar(6) NOT NULL,
  `Province` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`Branch_No`, `Street_No`, `City`, `Postal_Code`, `Province`) VALUES
(1, 11, 'Calgary', 'T6H9J2', 'Alberta'),
(2, 12, 'Calgary', 'T7J8G2', 'Alberta'),
(3, 13, 'Calgary', 'T6H8J9', 'Alberta');

-- --------------------------------------------------------

--
-- Table structure for table `bartender`
--

CREATE TABLE `bartender` (
  `Employee_ID` int(10) NOT NULL,
  `Liquor_License _Number` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bartender`
--

INSERT INTO `bartender` (`Employee_ID`, `Liquor_License _Number`) VALUES
(200000003, 999999990),
(200000004, 999999991),
(200000005, 999999992);

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `Branch_No` int(2) NOT NULL,
  `Owner_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`Branch_No`, `Owner_ID`) VALUES
(10, 1234567890),
(11, 1234567890),
(12, 1234567890);

-- --------------------------------------------------------

--
-- Table structure for table `cook`
--

CREATE TABLE `cook` (
  `Employee_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cook`
--

INSERT INTO `cook` (`Employee_ID`) VALUES
(2000000006),
(2000000007),
(2000000008);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Customer_ID` int(10) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Phone_No` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Customer_ID`, `Name`, `Phone_No`) VALUES
(1000000000, 'Angelina Jolie', '4032113111'),
(1000000001, 'Brad Pitt', '4033114111'),
(1000000002, 'Harry Potter', '4034115111');

-- --------------------------------------------------------

--
-- Table structure for table `drink`
--

CREATE TABLE `drink` (
  `Menu_Name` varchar(30) NOT NULL,
  `Volume` int(5) NOT NULL,
  `Alcohol_Content` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `drink`
--

INSERT INTO `drink` (`Menu_Name`, `Volume`, `Alcohol_Content`) VALUES
('bahama_mama', 500, '5'),
('dirtymonkey', 500, '5'),
('superman', 700, '0'),
('pepsi', 355, '0');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Employee_ID` int(10) NOT NULL,
  `SIN` int(9) NOT NULL,
  `Name` text NOT NULL,
  `Wage` decimal(6,2) NOT NULL,
  `Branch_No` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Employee_ID`, `SIN`, `Name`, `Wage`, `Branch_No`) VALUES
(2000000000, 100000000, 'Harry Styles', '18.00', 1),
(2000000001, 100000001, 'Zayn Malik', '18.00', 2),
(2000000002, 100000002, 'Nial Horan', '18.00', 3),
(2000000003, 100000003, 'Namjoon Kim', '17.50', 1),
(2000000004, 100000004, 'Taehyung Kim', '17.50', 2),
(2000000005, 100000005, 'Seokjin Kim', '17.50', 3),
(2000000006, 100000006, 'Yoongi Min', '17.00', 1),
(2000000007, 100000007, 'Hoseok Jung', '17.00', 2),
(2000000008, 100000008, 'Jungkook Jeon', '17.00', 3),
(2000000009, 100000009, 'Jimin Park', '16.50', 1),
(2000000010, 100000010, 'Minho Choi', '16.50', 2),
(2000000011, 100000011, 'Felix Lee', '16.50', 3),
(2000000012, 100000012, 'Tanuj Sharma', '17.50', 1),
(2000000013, 100000013, 'Jasmine Nguyen', '17.50', 2),
(2000000014, 100000014, 'Jordan Tran', '17.50', 3);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `Event_No` int(10) NOT NULL,
  `Event_Date` date NOT NULL,
  `Event_Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`Event_No`, `Event_Date`, `Event_Name`) VALUES
(1000000000, '2021-12-10', 'party_like_a_monkey'),
(1000000001, '2021-12-11', 'eat_all_you_can');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `Menu_Name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`Menu_Name`) VALUES
('apple'),
('banana'),
('chicken_wings'),
('noodles'),
('rice'),
('spring_roll');

-- --------------------------------------------------------

--
-- Table structure for table `froms`
--

CREATE TABLE `froms` (
  `Order_No` int(10) NOT NULL,
  `Menu_Name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `froms`
--

INSERT INTO `froms` (`Order_No`, `Menu_Name`) VALUES
(1234567890, 'rice'),
(1112223330, 'noodles'),
(2147483647, 'spring_roll'),
(2147483647, 'banana'),
(2147483647, 'apple'),
(2147483647, 'chicken_wings'),
(2147483647, 'rice'),
(2147483647, 'noodles');

-- --------------------------------------------------------

--
-- Table structure for table `holds`
--

CREATE TABLE `holds` (
  `Event_No` int(10) NOT NULL,
  `Branch_No` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `holds`
--

INSERT INTO `holds` (`Event_No`, `Branch_No`) VALUES
(1000000000, 1),
(1000000001, 1);

-- --------------------------------------------------------

--
-- Table structure for table `host`
--

CREATE TABLE `host` (
  `Employee_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `host`
--

INSERT INTO `host` (`Employee_ID`) VALUES
(2000000012),
(2000000013),
(2000000014);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `Item_Name` varchar(20) NOT NULL,
  `Item_Quantity` int(4) NOT NULL,
  `Branch_No` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`Item_Name`, `Item_Quantity`, `Branch_No`) VALUES
('banana', 23, 2),
('bread', 45, 2),
('cocoa', 100, 3),
('kidney beans', 3, 1),
('oat milk', 23, 1),
('oil', 98, 3),
('pasta', 12, 2),
('potatoes', 16, 3),
('pumkin seeds', 12, 2),
('rice', 45, 1),
('tofu', 100, 1),
('tomato', 11, 2),
('zucchini', 11, 3);

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `Employee_ID` int(10) NOT NULL,
  `Event_No` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`Employee_ID`, `Event_No`) VALUES
(2000000000, 1000000001),
(2000000011, 1000000000),
(2000000013, 1000000000);

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `manager` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`manager`) VALUES
(2000000000),
(2000000001),
(2000000002);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `Name` varchar(30) NOT NULL,
  `Price` decimal(8,0) NOT NULL,
  `Inventory_Item_Name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`Name`, `Price`, `Inventory_Item_Name`) VALUES
('apple', '1', 0),
('bahama_mama', '8', 0),
('banana', '5', 0),
('chicken_wings', '12', 0),
('dirtymonkey', '8', 0),
('noodles', '9', 0),
('pepsi', '3', 0),
('rice', '10', 0),
('spring_roll', '6', 0),
('superman', '8', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_No` int(10) NOT NULL,
  `Order_Type` varchar(20) NOT NULL,
  `Order_Date` date NOT NULL,
  `Employee_ID` int(10) NOT NULL,
  `Customer_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Order_No`, `Order_Type`, `Order_Date`, `Employee_ID`, `Customer_ID`) VALUES
(1000000000, 'online', '2021-12-10', 2000000000, 2000000000),
(1000000001, 'in_person', '2021-12-10', 2000000000, 2000000000),
(1000000002, 'online', '2021-12-10', 2000000000, 2000000000),
(1000000003, 'online', '2021-12-10', 2000000000, 2000000000),
(1000000004, 'online', '2021-12-10', 2000000000, 2000000000),
(1000000005, 'online', '2021-12-10', 2000000000, 2000000000),
(1000000006, 'online', '2021-12-09', 2147483647, 2000000000),
(1000000007, 'in_person', '2021-12-08', 2147483647, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `Owner_ID` int(10) NOT NULL,
  `SIN` int(9) NOT NULL,
  `Name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`Owner_ID`, `SIN`, `Name`) VALUES
(1234567890, 987654321, 'Ronald McDonald');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `Customer_ID` int(10) NOT NULL,
  `Branch_No` int(2) NOT NULL,
  `Score` decimal(3,0) NOT NULL,
  `Comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`Customer_ID`, `Branch_No`, `Score`, `Comment`) VALUES
(1100000000, 1, '5', 'Very good food'),
(1200000000, 2, '5', 'Food was yummy');

-- --------------------------------------------------------

--
-- Table structure for table `server`
--

CREATE TABLE `server` (
  `Employee_ID` int(10) NOT NULL,
  `Liquor_License _Number` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `server`
--

INSERT INTO `server` (`Employee_ID`, `Liquor_License _Number`) VALUES
(2000000009, 999999993),
(2000000010, 999999994),
(2000000011, 999999995);

-- --------------------------------------------------------

--
-- Table structure for table `sign_in`
--

CREATE TABLE `sign_in` (
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `ID` int(10) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sign_in`
--

INSERT INTO `sign_in` (`username`, `password`, `ID`, `role`) VALUES
('Harry_Styl', 'ilovefight', 2000000000, 'manager'),
('Nial_Horan', 'ilikegold', 2000000002, 'manager'),
('ronald_my_', 'oatmilkarm', 1234567890, 'owner'),
('Zayn_Malik', 'voldysux', 2000000001, 'manager');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `Supplier_No` int(10) NOT NULL,
  `Location` varchar(30) NOT NULL,
  `Distributer_Name` varchar(30) NOT NULL,
  `Phone_Number` varchar(10) NOT NULL,
  `Branch_No` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`Supplier_No`, `Location`, `Distributer_Name`, `Phone_Number`, `Branch_No`) VALUES
(10, 'Calgary', 'Gordon_Food', '4032113117', 1),
(11, 'Edmonton', 'Best_Food_Service', '4032113119', 2),
(12, 'Lethbridge', 'Food_Is_1', '4032113118', 3);

-- --------------------------------------------------------

--
-- Table structure for table `supplies`
--

CREATE TABLE `supplies` (
  `Item_Name` varchar(20) NOT NULL,
  `Supplier_No` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `supplies`
--

INSERT INTO `supplies` (`Item_Name`, `Supplier_No`) VALUES
('tofu', 10),
('rice', 10),
('kidney beans', 10),
('oat milk', 10),
('banana', 11),
('pumpkin seeds', 11),
('bread', 11),
('pasta', 11),
('tomato', 11),
('zucchini', 11),
('potatoes', 12),
('oil', 12),
('cocoa', 12);

-- --------------------------------------------------------

--
-- Table structure for table `weekly_delivery_date`
--

CREATE TABLE `weekly_delivery_date` (
  `Item_Name` varchar(20) NOT NULL,
  `Supplier_No` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `weekly_delivery_date`
--

INSERT INTO `weekly_delivery_date` (`Item_Name`, `Supplier_No`) VALUES
('tofu', 10),
('rice', 11),
('kidney beans', 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD KEY `FOREIGN` (`Branch_No`);

--
-- Indexes for table `bartender`
--
ALTER TABLE `bartender`
  ADD KEY `FOREIGN` (`Employee_ID`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`Branch_No`),
  ADD KEY `FOREIGN` (`Owner_ID`);

--
-- Indexes for table `cook`
--
ALTER TABLE `cook`
  ADD KEY `FOREIGN` (`Employee_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Customer_ID`);

--
-- Indexes for table `drink`
--
ALTER TABLE `drink`
  ADD KEY `FOREIGN` (`Menu_Name`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Employee_ID`),
  ADD KEY `FOREIGN` (`Branch_No`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`Event_No`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD KEY `FOREIGN` (`Menu_Name`);

--
-- Indexes for table `froms`
--
ALTER TABLE `froms`
  ADD KEY `FOREIGN` (`Order_No`),
  ADD KEY `FOREIGN2` (`Menu_Name`);

--
-- Indexes for table `holds`
--
ALTER TABLE `holds`
  ADD KEY `FOREIGN` (`Event_No`),
  ADD KEY `FOREIGN2` (`Branch_No`);

--
-- Indexes for table `host`
--
ALTER TABLE `host`
  ADD KEY `FOREIGN` (`Employee_ID`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`Item_Name`),
  ADD KEY `FOREIGN` (`Branch_No`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD KEY `FOREIGN` (`Employee_ID`),
  ADD KEY `FOREIGN2` (`Event_No`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD KEY `FOREIGN` (`manager`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`Name`),
  ADD KEY `FOREIGN` (`Inventory_Item_Name`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_No`),
  ADD KEY `FOREIGN` (`Employee_ID`),
  ADD KEY `FOREIGN2` (`Customer_ID`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`Owner_ID`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD KEY `FOREIGN` (`Customer_ID`),
  ADD KEY `FOREIGN2` (`Branch_No`);

--
-- Indexes for table `server`
--
ALTER TABLE `server`
  ADD KEY `FOREIGN` (`Employee_ID`);

--
-- Indexes for table `sign_in`
--
ALTER TABLE `sign_in`
  ADD PRIMARY KEY (`username`),
  ADD KEY `FOREIGN` (`ID`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`Supplier_No`),
  ADD KEY `FOREIGN` (`Branch_No`);

--
-- Indexes for table `supplies`
--
ALTER TABLE `supplies`
  ADD KEY `FOREIGN` (`Item_Name`),
  ADD KEY `FOREIGN2` (`Supplier_No`);

--
-- Indexes for table `weekly_delivery_date`
--
ALTER TABLE `weekly_delivery_date`
  ADD KEY `FOREIGN` (`Item_Name`),
  ADD KEY `FOREIGN2` (`Supplier_No`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `Branch_No` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Customer_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483647;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `Employee_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2000000015;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `Event_No` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000000002;

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `Owner_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1234567891;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `Supplier_No` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
