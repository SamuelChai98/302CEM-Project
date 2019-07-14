-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 05, 2019 at 06:20 AM
-- Server version: 5.6.35
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testagile`
--

-- --------------------------------------------------------

--
-- Table structure for table `client_customer`
--

CREATE TABLE `client_customer` (
  `customer_ID` int(11) NOT NULL,
  `customer_Verify` int(11) NOT NULL DEFAULT '0',
  `customer_Name` varchar(100) NOT NULL,
  `customer_Email` varchar(100) NOT NULL,
  `customer_Contact` varchar(20) NOT NULL,
  `customer_Address` text,
  `customer_Register_Date` date NOT NULL,
  `client_ID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `client_invoice`
--

CREATE TABLE `client_invoice` (
  `invoice_ID` bigint(20) NOT NULL,
  `invoice_Date` date DEFAULT NULL,
  `invoice_No` int(11) DEFAULT NULL,
  `customer_ID` int(11) NOT NULL,
  `client_ID` bigint(20) NOT NULL,
  `invoice_Amount` bigint(20) DEFAULT NULL,
  `payment_Due` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `client_invoice_item`
--

CREATE TABLE `client_invoice_item` (
  `list_ID` bigint(20) NOT NULL,
  `invoice_No` bigint(20) NOT NULL,
  `product_ID` int(11) NOT NULL,
  `client_ID` bigint(20) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` bigint(20) DEFAULT NULL,
  `tax` varchar(100) DEFAULT NULL,
  `amount` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `client_product`
--

CREATE TABLE `client_product` (
  `product_ID` bigint(20) NOT NULL,
  `product_Name` varchar(100) NOT NULL,
  `product_Price` double NOT NULL,
  `product_Description` varchar(1000) NOT NULL,
  `client_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `client_quotation`
--

CREATE TABLE `client_quotation` (
  `quotation_ID` bigint(20) NOT NULL,
  `quotation_No` int(11) NOT NULL,
  `quotation_Date` date DEFAULT NULL,
  `customer_ID` int(11) DEFAULT NULL,
  `client_ID` bigint(20) DEFAULT NULL,
  `quotation_Start_Date` date NOT NULL,
  `quotation_End_Date` date NOT NULL,
  `quotation_Remark` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `client_quotation_item`
--

CREATE TABLE `client_quotation_item` (
  `list_ID` bigint(20) NOT NULL,
  `quotation_No` bigint(20) NOT NULL,
  `product_ID` int(11) NOT NULL,
  `client_ID` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` bigint(20) DEFAULT NULL,
  `tax` varchar(100) DEFAULT NULL,
  `amount` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_ID` int(11) NOT NULL,
  `client_ID` int(11) DEFAULT NULL,
  `userName` varchar(100) NOT NULL,
  `passWord` varchar(30) NOT NULL,
  `status` enum('admin','client','customer') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_ID`, `client_ID`, `userName`, `passWord`, `status`) VALUES
(1, NULL, 'admin', 'admin123', 'admin'),
(2, 2, 'nikki', 'nikki123', 'client');

-- --------------------------------------------------------

--
-- Table structure for table `manage_client`
--

CREATE TABLE `manage_client` (
  `client_ID` int(11) NOT NULL,
  `client_Status` enum('request','online','offline','') NOT NULL DEFAULT 'request',
  `client_Name` varchar(100) NOT NULL,
  `client_Contact` varchar(20) NOT NULL,
  `client_Email` varchar(255) NOT NULL,
  `client_Register_Date` date NOT NULL,
  `client_Register_Reason` varchar(255) NOT NULL,
  `client_Company` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manage_client`
--

INSERT INTO `manage_client` (`client_ID`, `client_Status`, `client_Name`, `client_Contact`, `client_Email`, `client_Register_Date`, `client_Register_Reason`, `client_Company`) VALUES
(2, 'online', 'nikki', '0123336958', 'nikki@nikki-corp.com.my', '2018-05-11', 'Company Usage', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client_customer`
--
ALTER TABLE `client_customer`
  ADD PRIMARY KEY (`customer_ID`);

--
-- Indexes for table `client_invoice`
--
ALTER TABLE `client_invoice`
  ADD PRIMARY KEY (`invoice_ID`);

--
-- Indexes for table `client_invoice_item`
--
ALTER TABLE `client_invoice_item`
  ADD PRIMARY KEY (`list_ID`);

--
-- Indexes for table `client_product`
--
ALTER TABLE `client_product`
  ADD PRIMARY KEY (`product_ID`);

--
-- Indexes for table `client_quotation`
--
ALTER TABLE `client_quotation`
  ADD PRIMARY KEY (`quotation_ID`);

--
-- Indexes for table `client_quotation_item`
--
ALTER TABLE `client_quotation_item`
  ADD PRIMARY KEY (`list_ID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_ID`);

--
-- Indexes for table `manage_client`
--
ALTER TABLE `manage_client`
  ADD PRIMARY KEY (`client_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client_customer`
--
ALTER TABLE `client_customer`
  MODIFY `customer_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `client_invoice`
--
ALTER TABLE `client_invoice`
  MODIFY `invoice_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `client_invoice_item`
--
ALTER TABLE `client_invoice_item`
  MODIFY `list_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `client_product`
--
ALTER TABLE `client_product`
  MODIFY `product_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `client_quotation`
--
ALTER TABLE `client_quotation`
  MODIFY `quotation_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `client_quotation_item`
--
ALTER TABLE `client_quotation_item`
  MODIFY `list_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `manage_client`
--
ALTER TABLE `manage_client`
  MODIFY `client_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
