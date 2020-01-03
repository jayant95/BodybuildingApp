-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2020 at 11:45 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `physique`
--

-- --------------------------------------------------------

--
-- Table structure for table `bodybuilders`
--

CREATE TABLE `bodybuilders` (
  `bodybuilderID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `height` varchar(255) NOT NULL,
  `contestWeight` varchar(255) NOT NULL,
  `offseasonWeight` varchar(255) NOT NULL,
  `arms` varchar(255) NOT NULL,
  `chest` varchar(255) NOT NULL,
  `waist` varchar(255) NOT NULL,
  `thighs` varchar(255) NOT NULL,
  `calves` varchar(255) NOT NULL,
  `nameCode` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bodybuilders`
--

INSERT INTO `bodybuilders` (`bodybuilderID`, `name`, `height`, `contestWeight`, `offseasonWeight`, `arms`, `chest`, `waist`, `thighs`, `calves`, `nameCode`) VALUES
(1, 'Arnold Schwarzenegger', '74', '235', '260', '22', '57', '34', '28.5', '20', 'schwarzenegger_a'),
(2, 'Frank Zane', '69', '185', '200', '18', '51', '29', '26', '17', 'zane_f'),
(3, 'Franco Columbo', '65', '185', '', '19', '50', '30', '26', '17.5', 'columbo_f'),
(4, 'Lou Ferrigno', '77', '285', '', '22.5', '59', '34', '29', '20', 'ferrigno_l'),
(5, 'Serge Nubret', '72', '215', '', '21.5', '57', '27.5', '27', '19', 'nubret_s'),
(6, 'Lee Haney', '71.5', '230', '260', '21.5', '56', '31.5', '30', '20', 'haney_l');

-- --------------------------------------------------------

--
-- Table structure for table `goals`
--

CREATE TABLE `goals` (
  `memberID` int(11) NOT NULL,
  `goalID` int(11) NOT NULL,
  `bodybuilderID` int(11) NOT NULL,
  `bodybuilderName` varchar(255) NOT NULL,
  `featureName` varchar(255) NOT NULL,
  `currentGoal` tinyint(1) NOT NULL,
  `date` varchar(255) NOT NULL,
  `arms` float NOT NULL,
  `chest` float NOT NULL,
  `waist` float NOT NULL,
  `thighs` float NOT NULL,
  `calves` float NOT NULL,
  `shoulders` float NOT NULL,
  `neck` float NOT NULL,
  `weight` float NOT NULL,
  `bodyFat` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `memberdetails`
--

CREATE TABLE `memberdetails` (
  `memberID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `leftArm` float NOT NULL,
  `rightArm` float NOT NULL,
  `chest` float NOT NULL,
  `wrist` float NOT NULL,
  `waist` float NOT NULL,
  `leftThigh` float NOT NULL,
  `rightThigh` float NOT NULL,
  `neck` float NOT NULL,
  `leftCalf` float NOT NULL,
  `rightCalf` float NOT NULL,
  `knee` float NOT NULL,
  `shoulders` float NOT NULL,
  `ankles` float NOT NULL,
  `weight` float NOT NULL,
  `bodyFat` float NOT NULL,
  `height` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `memberlog`
--

CREATE TABLE `memberlog` (
  `measurementID` int(11) NOT NULL,
  `memberID` int(11) NOT NULL,
  `timestamp` varchar(255) NOT NULL,
  `leftArm` float NOT NULL,
  `rightArm` float NOT NULL,
  `chest` float NOT NULL,
  `waist` float NOT NULL,
  `leftThigh` float NOT NULL,
  `rightThigh` float NOT NULL,
  `leftCalf` float NOT NULL,
  `rightCalf` float NOT NULL,
  `shoulders` float NOT NULL,
  `weight` float NOT NULL,
  `bodyFat` float NOT NULL,
  `neck` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `memberID` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `leftArm` float NOT NULL,
  `rightArm` float NOT NULL,
  `chest` float NOT NULL,
  `waist` float NOT NULL,
  `leftThigh` float NOT NULL,
  `rightThigh` float NOT NULL,
  `leftCalf` float NOT NULL,
  `rightCalf` float NOT NULL,
  `shoulders` float NOT NULL,
  `wrists` float NOT NULL,
  `ankles` float NOT NULL,
  `bodyFat` float NOT NULL,
  `weight` float NOT NULL,
  `neck` float NOT NULL,
  `knee` float NOT NULL,
  `height` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pwdreset`
--

CREATE TABLE `pwdreset` (
  `resetId` int(11) NOT NULL,
  `resetEmail` text NOT NULL,
  `resetSelector` varchar(255) NOT NULL,
  `resetToken` longtext NOT NULL,
  `resetExpires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `memberID` int(11) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `privacy` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `memberID`, `unit`, `privacy`) VALUES
(2, 34, 'Inches', 'Private'),
(3, 35, 'Inches', 'Private'),
(4, 36, 'Inches', 'Private'),
(5, 37, 'Inches', 'Private'),
(6, 38, 'Inches', 'Private'),
(7, 39, 'Inches', 'Private'),
(8, 40, 'Inches', 'Private'),
(9, 41, 'Inches', 'Private');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bodybuilders`
--
ALTER TABLE `bodybuilders`
  ADD PRIMARY KEY (`bodybuilderID`);

--
-- Indexes for table `goals`
--
ALTER TABLE `goals`
  ADD PRIMARY KEY (`goalID`);

--
-- Indexes for table `memberdetails`
--
ALTER TABLE `memberdetails`
  ADD PRIMARY KEY (`memberID`);

--
-- Indexes for table `memberlog`
--
ALTER TABLE `memberlog`
  ADD PRIMARY KEY (`measurementID`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`memberID`);

--
-- Indexes for table `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`resetId`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bodybuilders`
--
ALTER TABLE `bodybuilders`
  MODIFY `bodybuilderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `goals`
--
ALTER TABLE `goals`
  MODIFY `goalID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `memberdetails`
--
ALTER TABLE `memberdetails`
  MODIFY `memberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `memberlog`
--
ALTER TABLE `memberlog`
  MODIFY `measurementID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `memberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `resetId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
