-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2021 at 07:45 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `PRN` varchar(15) NOT NULL,
  `NAME` varchar(40) NOT NULL,
  `STREAM` varchar(5) NOT NULL,
  `YEAR` varchar(2) NOT NULL,
  `DIVISION` varchar(1) NOT NULL,
  `COUNT` int(200) DEFAULT NULL,
  `picture` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`PRN`, `NAME`, `STREAM`, `YEAR`, `DIVISION`, `COUNT`, `picture`) VALUES
('123413', 'POOJA', 'BCOM', 'FY', 'A', 0, 'LOGO.jpg'),
('123441', 'ABHISHEK VASUDEV SAWANT', 'BSCIT', 'TY', 'A', 1, 'anil.jpg'),
('123445', 'BHAVESH BHIKAJI GORULE', 'BSCIT', 'TY', 'A', 1, 'ro.jpg'),
('123458', 'ONKAR', 'BCOM', 'FY', 'A', 1, 'LOGO.jpg'),
('123475', 'TANMAY SA RAUT', 'BSCIT', 'TY', 'A', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `PRN` varchar(15) NOT NULL,
  `NAME` varchar(40) NOT NULL,
  `RNO` int(4) NOT NULL,
  `STREAM` varchar(5) NOT NULL,
  `YEAR` varchar(2) NOT NULL,
  `DIVISION` varchar(1) NOT NULL,
  `vote` int(1) NOT NULL,
  `roomid` varchar(15) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`PRN`, `NAME`, `RNO`, `STREAM`, `YEAR`, `DIVISION`, `vote`, `roomid`, `password`) VALUES
('111221', 'ONKAR', 3, 'BCOM', 'FY', 'B', 0, '', ''),
('111222', 'VIVEK', 2, 'BCOM', 'FY', 'B', 0, '', ''),
('111223', 'AKASH', 4, 'BCOM', 'FY', 'B', 0, '', ''),
('111224', 'VINAY', 5, 'BCOM', 'FY', 'B', 0, '', ''),
('111225', 'OMKAR', 6, 'BCOM', 'FY', 'B', 0, '', ''),
('111226', 'SAMIDHA', 7, 'BCOM', 'FY', 'B', 0, '', ''),
('111227', 'MIHIKA', 9, 'BCOM', 'FY', 'B', 0, '', ''),
('111228', 'POOJA', 8, 'BCOM', 'FY', 'B', 0, '', ''),
('111229', 'ABHI', 1, 'BCOM', 'FY', 'A', 0, 'MLDC43326581', '12345Aa6'),
('123410', 'VINAY', 5, 'BCOM', 'FY', 'A', 1, 'MLDC43326581', '12345Aa6'),
('123411', 'OMKAR', 6, 'BCOM', 'FY', 'A', 0, 'MLDC43326581', '12345Aa6'),
('123412', 'SAMIDHA', 7, 'BCOM', 'FY', 'A', 0, 'MLDC43326581', '12345Aa6'),
('123413', 'POOJA', 8, 'BCOM', 'FY', 'A', 0, 'MLDC43326581', '12345Aa6'),
('123414', 'MIHIKA', 9, 'BCOM', 'FY', 'A', 0, 'MLDC43326581', '12345Aa6'),
('123456', 'ABHI', 1, 'BCOM', 'FY', 'A', 0, 'MLDC43326581', '12345Aa6'),
('123457', 'VIVEK', 2, 'BCOM', 'FY', 'A', 0, 'MLDC43326581', '12345Aa6'),
('123458', 'ONKAR', 3, 'BCOM', 'FY', 'A', 0, 'MLDC43326581', '12345Aa6'),
('123459', 'AKASH', 4, 'BCOM', 'FY', 'A', 0, 'MLDC43326581', '12345Aa6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`PRN`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`PRN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
