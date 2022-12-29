-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 18, 2022 at 11:27 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinecake`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `uemail` varchar(20) NOT NULL,
  `iid` int(11) NOT NULL,
  `iname` varchar(20) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `totalprice` int(11) NOT NULL,
  `bookingdate` date NOT NULL,
  `orderdate` date NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bid`, `uemail`, `iid`, `iname`, `price`, `quantity`, `totalprice`, `bookingdate`, `orderdate`, `status`) VALUES
(23, 'ammu@gmail.com', 39, 'chocotruffle', 800, 1, 800, '2022-01-18', '2022-01-13', 1),
(22, 'ammu@gmail.com', 39, 'chocotruffle', 800, 1, 800, '2022-01-18', '2022-01-19', 4),
(20, 'ammu@gmail.com', 39, 'chocotruffle', 800, 1, 800, '2022-01-18', '2022-01-19', 2),
(21, 'ammu@gmail.com', 39, 'chocotruffle', 800, 2, 1600, '2022-01-18', '2022-01-21', 3),
(24, 'ammu@gmail.com', 39, 'chocotruffle', 800, 2, 1600, '2022-01-18', '2022-01-29', 1),
(25, 'achu@gmail.com', 41, 'classicred', 800, 1, 800, '2022-01-18', '2022-01-20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `cname` varchar(20) NOT NULL,
  `cimage` varchar(200) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `cname`, `cimage`) VALUES
(24, 'buttercake', 'b383660495a3d044e5027c18eb7884cb_aa048ed57c1.jpg'),
(18, 'chocolatecake', '4a234e689908e21f203138773d31fa72_64d465c0ab5.png'),
(20, 'redvelvet', 'd568fbbeefcb55a9e5f987e69e3a8bef_efec7010d69.png'),
(21, 'fruitcake', '560afb631103353ab7d59b624790818c_f2bd3c23181ddbe0.jpg'),
(22, 'carrotcake', '2109d5fd6297d0ab18bcfa3c3258b3b9_a921e3247d.jpg'),
(23, 'poundcake', '0189b64e155ecdfec01041a5cca87be2_499fceb945081.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `iid` int(11) NOT NULL AUTO_INCREMENT,
  `iname` varchar(20) NOT NULL,
  `iimage` varchar(200) NOT NULL,
  `offerprice` int(11) NOT NULL,
  `sellingprice` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  PRIMARY KEY (`iid`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`iid`, `iname`, `iimage`, `offerprice`, `sellingprice`, `cid`) VALUES
(40, 'redlove', '23556a0d095854b93e681ae5cb2f6813_6c03f67bb005.jpg', 750, 950, 20),
(41, 'classicred', '006579b28d6466f4f551d699bed5a480_0f65e1a0aa1.jpg', 800, 1000, 20),
(38, 'meltonchoco', '2d8adc344a64ab0cc450738d729b3ced_88a8bd5dd0f38.jpg', 900, 1050, 18),
(39, 'chocotruffle', '0770cbb1f638fd193a16ef6199381180_70c33928ee9a.jpg', 800, 1000, 18),
(42, 'walnutbutter', 'd344596e00b1ec5937763b4501aa329c_250bd356c77.jpg', 600, 800, 24),
(43, 'funfettypound', 'd5b885704533409204ac3c3c8161a6be_ee8995264eea2.jpg', 700, 900, 23),
(44, 'caramelcarrot', 'ba191ed7dfeadeec524fa485c80ed68d_35ed81beb2.jpg', 700, 950, 22),
(45, 'forestfruit', 'd055119b02466101837c3dc24e1fde42_fa8fe30d73c7f.jpg', 800, 900, 21);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

DROP TABLE IF EXISTS `register`;
CREATE TABLE IF NOT EXISTS `register` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `uemail` varchar(20) NOT NULL,
  `phone` char(10) NOT NULL,
  `upassword` varchar(20) NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`uid`, `fname`, `lname`, `uemail`, `phone`, `upassword`, `status`) VALUES
(14, 'ani', 'k', 'ani@gmail.com', '3456789012', '1212', NULL),
(13, 'achu', 'g', 'achu@gmail.com', '2345678903', '12345', NULL),
(12, 'ammu', 'c', 'ammu@gmail.com', '2345678901', '123', NULL),
(11, 'anju', 'm', 'anju@gmail.com', '1234567890', '12', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
