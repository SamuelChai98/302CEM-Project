-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 23, 2019 at 06:15 AM
-- Server version: 5.6.35
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `invoice_sys`
--

-- --------------------------------------------------------

--
-- Table structure for table `client_customer`
--

CREATE TABLE `client_customer` (
  `customer_ID` int(11) NOT NULL,
  `customer_Name` varchar(100) NOT NULL,
  `customer_Email` varchar(100) NOT NULL,
  `customer_Contact` varchar(20) NOT NULL,
  `customer_Address_Line` varchar(1000) DEFAULT NULL,
  `customer_Address_City` varchar(1000) DEFAULT NULL,
  `customer_Address_Country` varchar(1000) DEFAULT NULL,
  `customer_Address_State` varchar(1000) DEFAULT NULL,
  `customer_Address_ZIP` varchar(1000) DEFAULT NULL,
  `customer_Register_Date` date NOT NULL,
  `client_ID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client_customer`
--

INSERT INTO `client_customer` (`customer_ID`, `customer_Name`, `customer_Email`, `customer_Contact`, `customer_Address_Line`, `customer_Address_City`, `customer_Address_Country`, `customer_Address_State`, `customer_Address_ZIP`, `customer_Register_Date`, `client_ID`) VALUES
(4, 'Heng That', 'ht@corp.com', '0125558549', '11, Jalan 32 Timur,', 'quantine', 'Kuala Lumpur', 'Petaling ', '11992', '2018-05-26', '2'),
(5, 'Heng That', 'ht@corp.com', '0125558549', NULL, NULL, NULL, NULL, NULL, '2018-05-26', '2'),
(6, 'tyler sdn bhd', 'tyler@corp.com', '0123456', NULL, NULL, NULL, NULL, NULL, '2018-05-30', '9'),
(7, 'sim chicken trading ', 'sim@trade.come', '01922240123', NULL, NULL, NULL, NULL, NULL, '2018-05-30', '9'),
(8, 'yalo', 'yalo@jeep.com', '0123334455', NULL, NULL, NULL, NULL, NULL, '2018-07-18', '2'),
(9, 'Alex', 'Alex@xing.com', '01254758845', '11,Street CountYard', 'Asteron', 'Luminos', 'Pentin', '000190', '2018-07-18', '2'),
(10, 'gotoshop', 'gts@shop.com', '01211234', '123,lorong selamat', 'gelugor', 'malaysia', 'pulau pinang', '11310', '2018-09-04', '2');

-- --------------------------------------------------------

--
-- Table structure for table `client_invoice`
--

CREATE TABLE `client_invoice` (
  `invoice_ID` bigint(20) NOT NULL,
  `invoice_Date` date DEFAULT NULL,
  `invoice_No` int(11) DEFAULT NULL,
  `quotation_ID` bigint(11) DEFAULT NULL,
  `customer_ID` int(11) NOT NULL,
  `client_ID` bigint(20) NOT NULL,
  `invoice_Amount` bigint(20) DEFAULT NULL,
  `invoice_Balance` bigint(20) DEFAULT NULL,
  `payment_Due` date DEFAULT NULL,
  `status` enum('draft','paid','partial','overdue') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client_invoice`
--

INSERT INTO `client_invoice` (`invoice_ID`, `invoice_Date`, `invoice_No`, `quotation_ID`, `customer_ID`, `client_ID`, `invoice_Amount`, `invoice_Balance`, `payment_Due`, `status`) VALUES
(1, '2018-07-02', 1, 0, 9, 2, 1334, 1334, '2018-07-17', 'draft');

-- --------------------------------------------------------

--
-- Table structure for table `client_invoice_item`
--

CREATE TABLE `client_invoice_item` (
  `iList_ID` bigint(20) NOT NULL,
  `invoice_No` bigint(20) NOT NULL,
  `product_ID` int(11) NOT NULL,
  `client_ID` bigint(20) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` bigint(20) DEFAULT NULL,
  `tax` varchar(100) DEFAULT NULL,
  `amount` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client_invoice_item`
--

INSERT INTO `client_invoice_item` (`iList_ID`, `invoice_No`, `product_ID`, `client_ID`, `quantity`, `price`, `tax`, `amount`) VALUES
(3, 1, 10, 2, 1, NULL, 'GST included', 1334);

-- --------------------------------------------------------

--
-- Table structure for table `client_invoice_payment`
--

CREATE TABLE `client_invoice_payment` (
  `payment_ID` int(11) NOT NULL,
  `invoice_ID` int(11) NOT NULL,
  `payment_Method` varchar(100) NOT NULL,
  `payment_Date` date NOT NULL
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

--
-- Dumping data for table `client_product`
--

INSERT INTO `client_product` (`product_ID`, `product_Name`, `product_Price`, `product_Description`, `client_ID`) VALUES
(1, 'Asus i3 Laptop', 2000, '', 0),
(2, 'Asus i5 Laptop', 3000, '', 0),
(3, 'Alienware 17 i7', 6000, '', 0),
(4, 'i7 Processor 6th Gen', 1440, '', 0),
(5, '8GB Ram', 300, '', 0),
(6, 'Acer 24 Monitor', 0, '', 0),
(8, 'AMD Ryzen 7', 1400, '', 2),
(9, 'AMD Ryzen 7', 1400, 'AMD processor', 2),
(10, 'i7 Processor', 555, 'Intel Processor', 2),
(11, 'Pentium G1123', 199, 'Intel pentium processor ', 2),
(12, '33\"inch FHD TV', 3440, 'Something', 2),
(13, '22 inch tv', 3560, '22 inch dell', 2);

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
  `quotation_Amount` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client_quotation`
--

INSERT INTO `client_quotation` (`quotation_ID`, `quotation_No`, `quotation_Date`, `customer_ID`, `client_ID`, `quotation_Start_Date`, `quotation_End_Date`, `quotation_Amount`) VALUES
(1, 1, '2018-05-25', 4, 2, '2018-07-26', '2018-07-27', 1200),
(2, 2, '0000-00-00', 9, 2, '2018-06-25', '2018-07-16', NULL),
(3, 3, '0000-00-00', 9, 2, '2018-07-23', '2018-07-26', NULL),
(4, 4, '0000-00-00', 9, 2, '2018-09-04', '2018-09-07', 1200);

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

--
-- Dumping data for table `client_quotation_item`
--

INSERT INTO `client_quotation_item` (`list_ID`, `quotation_No`, `product_ID`, `client_ID`, `quantity`, `price`, `tax`, `amount`) VALUES
(3, 2, 0, 0, 0, 0, NULL, NULL),
(4, 2, 0, 0, 0, 0, NULL, NULL),
(5, 2, 0, 0, 0, 0, NULL, NULL),
(6, 2, 0, 0, 0, 0, NULL, NULL),
(7, 2, 0, 0, 0, 0, NULL, NULL),
(8, 2, 0, 0, 0, 0, NULL, NULL),
(9, 2, 0, 0, 0, 0, NULL, NULL),
(10, 2, 0, 0, 0, 0, NULL, NULL),
(11, 2, 0, 0, 0, 0, NULL, NULL),
(14, 1, 8, 2, 1, 1200, 'GST included', 1200),
(15, 4, 10, 2, 1, 1200, 'SST', 1200);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_ID` int(11) NOT NULL,
  `client_ID` int(11) DEFAULT NULL,
  `userName` varchar(100) NOT NULL,
  `passWord` varchar(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` enum('admin','client') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_ID`, `client_ID`, `userName`, `passWord`, `name`, `status`) VALUES
(1, NULL, 'admin', 'admin123', 'admin', 'admin'),
(2, 2, 'nikki', 'nikki123', 'nikki_company', 'client'),
(3, 9, 'phengtat323', '0123456', 'pheng tat sdn bhd', 'client'),
(5, 17, 'fkc4', 'fkc4', 'Frenko coop', 'client'),
(6, 18, 'sinkrom', 'sk123', 'Sinkrom coorp', 'client'),
(8, 20, 'ch011', 'Ch123', 'Chin Hong', 'client'),
(9, 21, 'khlim01', 'khlim01', 'Kim Ho', 'client'),
(10, 22, '', '', '', 'client'),
(12, 24, 'shtcorp', 'shtcorp123', 'singha top', 'client'),
(13, 25, 'tant', 'tantt123', 'Tan', 'client'),
(14, 26, '123123', '123123', 'alex', 'client'),
(15, 26, '123123', '123123', 'alex', 'client'),
(16, 28, 'asdasd', 'asdasd', 'asda', 'client'),
(17, 29, '123', '123', 'haha', 'client'),
(18, 30, '123123', '123123', 'Esther Tee', 'client');

-- --------------------------------------------------------

--
-- Table structure for table `manage_client`
--

CREATE TABLE `manage_client` (
  `client_ID` int(11) NOT NULL,
  `client_Name` varchar(100) NOT NULL,
  `client_Address_Line` text,
  `client_Address_City` varchar(100) DEFAULT NULL,
  `client_Address_Country` varchar(100) DEFAULT NULL,
  `client_Address_State` varchar(100) DEFAULT NULL,
  `client_Address_ZIP` int(11) DEFAULT NULL,
  `client_Contact` varchar(20) DEFAULT NULL,
  `client_Email` varchar(100) DEFAULT NULL,
  `client_Register_Date` date NOT NULL,
  `client_Remark` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manage_client`
--

INSERT INTO `manage_client` (`client_ID`, `client_Name`, `client_Address_Line`, `client_Address_City`, `client_Address_Country`, `client_Address_State`, `client_Address_ZIP`, `client_Contact`, `client_Email`, `client_Register_Date`, `client_Remark`) VALUES
(2, 'nikki', '123, Liken Park 4A', 'Likening', 'Norland', 'Kentuky', 122520, '0123336958', 'nikki@nikki-corp.com', '2018-05-11', 'some remark done'),
(9, 'pheng tat sdn bhd', '323-1-D, Ceneter Street, 42-A , 22250 , Stander', '', '', '', 0, '0102595852', '', '2018-06-30', ''),
(17, 'Frenko coop', '13331', '', '', '', 0, '010232313', '', '2018-07-01', ''),
(18, 'Sinkrom coorp', '123123123123123123 ababbabababababababab cccccccccc, 99123', '', '', '', 0, '0125485574', 'sinkrom.cop@email.com', '2018-07-12', ''),
(20, 'Chin Hong', '** WAITING CLIENT TO ENTER **', NULL, NULL, NULL, NULL, '0112255125', 'ch@yahoo.com', '2018-07-12', NULL),
(21, 'Kim Ho', '** WAITING CLIENT TO ENTER **', NULL, NULL, NULL, NULL, '0158885426', 'kh@limkh.corp', '2018-07-23', NULL),
(24, 'singha top', '** WAITING CLIENT TO ENTER **', NULL, NULL, NULL, NULL, '012559546', 'singha.top@sht.corp', '2018-09-07', NULL),
(25, 'Tan', '** WAITING CLIENT TO ENTER **', NULL, NULL, NULL, NULL, '01312331129', 'tan@gmail.com', '2018-09-07', NULL),
(26, 'alex', '** WAITING CLIENT TO ENTER **', NULL, NULL, NULL, NULL, '01234567890', 'alexq23123@gmail.com', '2018-09-11', NULL),
(27, 'alex', '** WAITING CLIENT TO ENTER **', NULL, NULL, NULL, NULL, '123123123', 'alexq23123@gmail.com', '2018-09-11', NULL),
(28, 'asda', '** WAITING CLIENT TO ENTER **', NULL, NULL, NULL, NULL, 'asdasdas', 'asda@okdoas.copm', '2018-09-11', NULL),
(29, 'haha', '** WAITING CLIENT TO ENTER **', NULL, NULL, NULL, NULL, 'haah', 'hahah@goami.com', '2018-09-15', NULL);

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
  ADD PRIMARY KEY (`iList_ID`);

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
  MODIFY `customer_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `client_invoice`
--
ALTER TABLE `client_invoice`
  MODIFY `invoice_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `client_invoice_item`
--
ALTER TABLE `client_invoice_item`
  MODIFY `iList_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `client_product`
--
ALTER TABLE `client_product`
  MODIFY `product_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `client_quotation`
--
ALTER TABLE `client_quotation`
  MODIFY `quotation_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `client_quotation_item`
--
ALTER TABLE `client_quotation_item`
  MODIFY `list_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `manage_client`
--
ALTER TABLE `manage_client`
  MODIFY `client_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
