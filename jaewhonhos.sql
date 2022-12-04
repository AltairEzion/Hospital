-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 04, 2022 at 10:11 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jaewhonhos`
--

-- --------------------------------------------------------

--
-- Table structure for table `acc`
--

CREATE TABLE `acc` (
  `usern` text NOT NULL,
  `passwd` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `acc`
--

INSERT INTO `acc` (`usern`, `passwd`) VALUES
('admin', 'admin123'),
('user', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`username`, `password`) VALUES
('admin', 'admin123'),
('user', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patientId` int(10) NOT NULL,
  `patientName` text NOT NULL,
  `symptom` text NOT NULL,
  `address` text NOT NULL,
  `dateOfBirth` date NOT NULL,
  `teleNo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patientId`, `patientName`, `symptom`, `address`, `dateOfBirth`, `teleNo`) VALUES
(111, 'jakkapat', 'bored', 'sun', '2003-03-03', 800000000),
(222, 'chanitchaya', 'too hot', 'mercury', '2004-04-04', 900000000),
(333, 'nopparat', 'muscle pain', 'mars', '2005-05-05', 999999999),
(444, 'chutirat', 'sneezing', 'jupiter', '2006-06-06', 9090909),
(555, 'nutnicha', 'sore throat', 'saturn', '2007-07-07', 80099),
(666, 'phawin', 'fever', 'neptune', '2008-08-08', 8009009),
(1007, 'heart', 'Disease Type', 'body', '2022-11-28', 234);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `roomNo` int(10) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`roomNo`, `address`) VALUES
(101, 'earth 616'),
(102, 'earth 161'),
(103, 'earth 295'),
(104, 'earth 2149'),
(105, 'earth 807128'),
(106, 'earth 811'),
(107, 'earth 911'),
(108, 'earth 982'),
(109, 'earth 58163'),
(110, 'earth 15513');

-- --------------------------------------------------------

--
-- Table structure for table `track`
--

CREATE TABLE `track` (
  `trackId` int(10) NOT NULL,
  `patientId` int(10) NOT NULL,
  `roomNo` int(10) NOT NULL,
  `checkIn` date NOT NULL,
  `checkOut` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `track`
--

INSERT INTO `track` (`trackId`, `patientId`, `roomNo`, `checkIn`, `checkOut`) VALUES
(1, 111, 101, '2022-12-23', '2022-12-25'),
(2, 333, 105, '2022-12-20', '2022-12-21'),
(3, 444, 110, '2023-01-01', '2023-01-10'),
(4, 111, 101, '2022-12-04', '2022-12-05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patientId`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`roomNo`);

--
-- Indexes for table `track`
--
ALTER TABLE `track`
  ADD PRIMARY KEY (`trackId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
