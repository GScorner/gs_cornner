-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2016 at 05:30 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.5.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gs_corner`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `idcategory` varchar(4) NOT NULL,
  `nameCategory` varchar(50) NOT NULL,
  `activeflag` varchar(1) NOT NULL DEFAULT '1',
  `idtype` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`idcategory`, `nameCategory`, `activeflag`, `idtype`) VALUES
('c001', 'Operating Systems', '1', 't01'),
('c002', 'Developer Tools', '1', 't01'),
('c003', 'Servers', '1', 't01'),
('c004', 'Applications', '1', 't01'),
('c005', 'FPS', '1', 't02'),
('c006', 'Horror', '1', 't02'),
('c007', 'MOBA', '1', 't02');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `idorderdetail` int(11) NOT NULL,
  `idOrder` int(11) NOT NULL,
  `idProduct` varchar(4) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `activeflag` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`idorderdetail`, `idOrder`, `idProduct`, `quantity`, `amount`, `activeflag`) VALUES
(11, 6, '001', 1, 315, '1'),
(12, 6, '002', 1, 1599, '1'),
(13, 6, '003', 1, 399, '1'),
(14, 6, '001', 3, 315, '1'),
(15, 6, '002', 4, 1599, '1'),
(16, 6, '004', 1, 859, '1'),
(17, 6, '005', 1, 459, '1'),
(18, 6, '006', 1, 799, '1'),
(19, 6, '001', 3, 315, '1'),
(20, 6, '002', 4, 1599, '1'),
(21, 6, '004', 1, 859, '1'),
(22, 6, '005', 1, 459, '1'),
(23, 6, '006', 1, 799, '1'),
(24, 9, '002', 1, 1599, '1'),
(25, 9, '003', 1, 399, '1'),
(26, 9, '001', 1, 315, '1'),
(27, 9, '005', 2, 459, '1'),
(28, 10, '001', 3, 315, '1'),
(29, 11, '001', 2, 315, '1'),
(30, 11, '003', 1, 399, '1'),
(31, 11, '006', 3, 799, '1'),
(32, 12, '001', 1, 315, '1'),
(33, 12, '005', 2, 459, '1'),
(34, 12, '006', 1, 799, '1'),
(35, 13, '001', 1, 315, '1'),
(36, 13, '005', 2, 459, '1'),
(37, 13, '006', 1, 799, '1'),
(38, 14, '001', 1, 315, '1'),
(39, 14, '005', 2, 459, '1'),
(40, 14, '006', 1, 799, '1'),
(41, 15, '001', 1, 315, '1'),
(42, 15, '005', 2, 459, '1'),
(43, 15, '006', 1, 799, '1'),
(44, 16, '001', 1, 315, '1'),
(45, 16, '005', 2, 459, '1'),
(46, 16, '006', 1, 799, '1');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `idOrder` int(11) NOT NULL,
  `dateOrdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `quantity` int(7) NOT NULL,
  `activeflag` varchar(1) NOT NULL,
  `amountTotal` int(7) NOT NULL,
  `user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`idOrder`, `dateOrdate`, `quantity`, `activeflag`, `amountTotal`, `user`) VALUES
(6, '2016-07-09 03:50:24', 3, '1', 2313, 'fokkofasd'),
(7, '2016-07-09 03:50:45', 12, '1', 11372, 'fokkofasd'),
(8, '2016-07-09 04:08:40', 10, '1', 9458, 'admin'),
(9, '2016-07-28 21:19:55', 5, '1', 3231, 'fokkofasd'),
(10, '2016-10-30 02:16:28', 3, '1', 945, 'admin'),
(11, '2016-11-14 21:15:48', 6, '1', 3426, 'fokkofasd'),
(12, '2016-11-14 21:26:50', 4, '1', 2032, 'fokkofasd'),
(13, '2016-11-14 21:27:40', 4, '1', 2032, 'fokkofasd'),
(14, '2016-11-14 21:36:56', 4, '1', 2032, 'fokkofasd'),
(15, '2016-11-14 21:38:39', 4, '1', 2032, 'fokkofasd'),
(16, '2016-11-14 21:39:20', 4, '1', 2032, 'fokkofasd');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `idProduct` varchar(4) NOT NULL,
  `nameProduct` varchar(80) NOT NULL,
  `descripProduct` varchar(600) NOT NULL,
  `quantityProduct` int(3) NOT NULL,
  `activeflag` varchar(1) NOT NULL,
  `picture_list` varchar(200) NOT NULL,
  `picture_box` varchar(200) NOT NULL,
  `picture_detail` varchar(200) NOT NULL,
  `picture_spec` varchar(200) NOT NULL,
  `video` varchar(200) NOT NULL,
  `price` int(7) NOT NULL,
  `idcategory` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`idProduct`, `nameProduct`, `descripProduct`, `quantityProduct`, `activeflag`, `picture_list`, `picture_box`, `picture_detail`, `picture_spec`, `video`, `price`, `idcategory`) VALUES
('001', 'Counter-Strike: Global Offensive', 'Counter-Strike: Global Offensive (CS: GO) will expand upon the team-based action gameplay that it pioneered when it was launched 14 years ago. CS: GO features new maps, characters, and weapons and delivers updated versions of the classic CS content (de_dust, etc.).', 3, '1', '/img/4.jpg', '/img/b4.jpg', '/img/d4.jpg', '/img/s4.jpg', 'https://www.youtube.com/embed/fkFML2buRqQ', 315, 'c005'),
('002', 'Overwatch', 'In a time of global crisis, an international task force of heroes banded together to restore peace to a war-torn world: OVERWATCH. It ended the crisis and helped to maintain peace in the decades that followed, inspiring an era of exploration, innovation, and discovery. But after many years, Overwatch''s influence waned, and it was eventually disbanded.', 4, '1', '/img/7.jpg', '/img/b7.jpg', '/img/d7.jpg', '/img/s7.jpg', 'https://www.youtube.com/embed/fT-HvMPJvhA', 1599, 'c007'),
('003', 'Out Last', 'Hell is an experiment you can''t survive in Outlast, a first-person survival horror game developed by veterans of some of the biggest game franchises in history. As investigative journalist Miles Upshur, explore Mount Massive Asylum and try to survive long enough to discover its terrible secret... if you ', 2, '1', '/img/2.jpg', '/img/b2.jpg', '/img/d2.jpg', '/img/s2.jpg', 'https://www.youtube.com/embed/0l1_jJDZ9Ts', 399, 'c006'),
('004', 'Microsoft Access 2016', 'Create your own database apps easily in formats that serve your business best.', 1, '1', '/img/5.jpg', '/img/b5.jpg', '/img/d5.jpg', '/img/s4.jpg', 'https://www.youtube.com/embed/qaQflNwD4hc', 859, 'c004'),
('005', 'Microsoft SQL Server 2016', 'SQL Server 2016 delivers breakthrough mission-critical capabilities with in-memory performance and operational analytics built-in. Comprehensive security features like new Always Encrypted technology helps protect your data at rest and in motion, and a world class high availability and disaster recovery solution adds new enhancements to AlwaysOn technology.', 3, '1', '/img/6.jpg', '/img/b6.jpg', '/img/d6.jpg', '/img/s2.jpg', 'https://www.youtube.com/embed/u2huSNXLYUg', 459, 'c003'),
('006', 'Microsoft Visual Studio Community 2015', 'Microsoft Visual Studio Community 2015 is a new full-featured edition that enables you to unleash the power of Visual Studio to develop cross-platform solutions.', 5, '1', '/img/3.jpg', '/img/b3.jpg', '/img/d3.jpg', '/img/s7.jpg', 'https://www.youtube.com/embed/ECJ-sug1jbo', 799, 'c004');

-- --------------------------------------------------------

--
-- Table structure for table `type_gs`
--

CREATE TABLE `type_gs` (
  `idtype` varchar(3) NOT NULL,
  `nameType` varchar(50) NOT NULL,
  `activeflag` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type_gs`
--

INSERT INTO `type_gs` (`idtype`, `nameType`, `activeflag`) VALUES
('t01', 'Software', '1'),
('t02', 'Game', '1');

-- --------------------------------------------------------

--
-- Table structure for table `type_user`
--

CREATE TABLE `type_user` (
  `idtype_user` varchar(4) NOT NULL,
  `nameUser` varchar(45) DEFAULT NULL,
  `activeflag` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type_user`
--

INSERT INTO `type_user` (`idtype_user`, `nameUser`, `activeflag`) VALUES
('u001', 'admin', '1'),
('u002', 'customer', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `fname` varchar(45) NOT NULL,
  `lname` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `activeflag` varchar(1) NOT NULL,
  `idtype_user` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `fname`, `lname`, `Email`, `activeflag`, `idtype_user`) VALUES
('admin', 'admin', 'Visitsak', 'Chukiln', 'nonggif@gmail.com', '1', 'u001'),
('fokkofasd', 'visitsak789', 'Visitsak', 'Visitsak', 'visitsak_99@hotmail.com', '1', 'u002'),
('root', 'root', 'Kanchit', 'Chukiln', 'kanjang@outlook.com', '1', 'u002');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idcategory`),
  ADD KEY `fk_category_type_gs1_idx` (`idtype`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`idorderdetail`),
  ADD KEY `fk_orderdetail_product1_idx` (`idProduct`),
  ADD KEY `fk_orderdetail_orders1_idx` (`idOrder`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`idOrder`),
  ADD KEY `fk_orders_customer1_idx` (`user`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`idProduct`),
  ADD KEY `fk_product_category_idx` (`idcategory`);

--
-- Indexes for table `type_gs`
--
ALTER TABLE `type_gs`
  ADD PRIMARY KEY (`idtype`);

--
-- Indexes for table `type_user`
--
ALTER TABLE `type_user`
  ADD PRIMARY KEY (`idtype_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD KEY `fk_user_type_user1_idx1` (`idtype_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `idorderdetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `idOrder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `fk_category_type_gs1` FOREIGN KEY (`idtype`) REFERENCES `type_gs` (`idtype`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `fk_orderdetail_orders1` FOREIGN KEY (`idOrder`) REFERENCES `orders` (`idOrder`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_orderdetail_product1` FOREIGN KEY (`idProduct`) REFERENCES `product` (`idProduct`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_customer1` FOREIGN KEY (`user`) REFERENCES `user` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_category` FOREIGN KEY (`idcategory`) REFERENCES `category` (`idcategory`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
