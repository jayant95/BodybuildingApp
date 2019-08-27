-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2019 at 10:18 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

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
(4, 'Lou Ferrigno', '77', '285', '', '22.5', '59', '34', '29', '', 'ferrigno_l'),
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

--
-- Dumping data for table `goals`
--

INSERT INTO `goals` (`memberID`, `goalID`, `bodybuilderID`, `bodybuilderName`, `featureName`, `currentGoal`, `date`, `arms`, `chest`, `waist`, `thighs`, `calves`, `shoulders`, `neck`, `weight`, `bodyFat`) VALUES
(4, 1, 2, 'name', 'custom', 1, '123', 1, 2, 3, 4, 5, 6, 7, 8, 9),
(29, 2, 29, 'custom', 'custom', 0, '1550006815', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(29, 3, 29, 'custom', 'custom', 0, '1550006818', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(29, 4, -1, '', 'custom', 0, '1550006913', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(29, 5, -1, '', 'custom', 0, '1550007447', 16, 45, 32, 25, 16, 53, 16, 180, 10),
(29, 6, -1, '', 'custom', 0, '1550007497', 16, 45, 32, 25, 16, 53, 16, 180, 10),
(29, 7, -1, '', 'custom', 0, '1550025131', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(29, 8, -1, '', 'custom', 0, '1551223500', 16, 45, 32, 25, 16, 52, 16, 180, 12),
(29, 9, -1, '', 'custom', 0, '1551223591', 16, 45, 32, 25, 16, 52, 16, 180, 12),
(29, 10, 0, 'Frank Zane', 'Pin by height', 0, '1551228569', 18.5217, 52.4783, 29.8406, 26.7536, 17.4928, 0, 0, 0, 0),
(29, 11, -1, '', 'custom', 0, '1551229703', 16, 45, 32, 25, 16, 51, 16, 180, 12),
(29, 12, 0, '', 'Golden Ratio', 0, '1551230865', 17.5, 45.5, 34, 26.25, 17.5, 55.01, 17.5, 0, 0),
(29, 13, 0, '', 'Golden Ratio', 0, '1551308877', 17.5, 45.5, 34, 26.25, 17.5, 55.01, 17.5, 0, 0),
(29, 14, 0, 'Arnold Schwarzenegger', 'Pin by height', 0, '1551309270', 21.1081, 54.6892, 32.6216, 27.3446, 19.1892, 0, 0, 0, 0),
(29, 15, 0, 'Serge Nubret', 'Pin by leftArm', 0, '1551309367', 15, 39.7674, 19.186, 18.8372, 13.2558, 0, 0, 0, 0),
(29, 16, 0, 'Lee Haney', 'Pin by height', 0, '1551309391', 21.3496, 55.6084, 31.2797, 29.7902, 19.8601, 0, 0, 0, 0),
(29, 17, 0, '', 'Golden Ratio', 0, '1551309409', 17.5, 45.5, 34, 26.25, 17.5, 55.01, 17.5, 0, 0),
(29, 18, 0, 'Arnold Schwarzenegger', 'Pin by leftArm', 1, '1552110590', 15, 38.8636, 23.1818, 19.4318, 13.6364, 0, 0, 0, 0),
(33, 19, 0, 'Serge Nubret', 'Pin by leftArm', 0, '1558123808', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(33, 20, 0, 'Frank Zane', 'Pin by height', 0, '1558124055', 18.5217, 52.4783, 29.8406, 26.7536, 17.4928, 0, 0, 0, 0),
(33, 21, -1, '', 'custom', 0, '1558124311', 18.5217, 52.4783, 29.8406, 26.7536, 17.4928, 50, 16, 180, 12),
(33, 22, 0, 'Franco Columbo', 'Pin by height', 0, '1558124344', 20.7538, 54.6154, 32.7692, 28.4, 19.1154, 0, 0, 0, 0),
(33, 23, -1, '', 'custom', 1, '1558124381', 17, 44, 32, 24, 16, 50, 16, 180, 12);

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

--
-- Dumping data for table `memberlog`
--

INSERT INTO `memberlog` (`measurementID`, `memberID`, `timestamp`, `leftArm`, `rightArm`, `chest`, `waist`, `leftThigh`, `rightThigh`, `leftCalf`, `rightCalf`, `shoulders`, `weight`, `bodyFat`, `neck`) VALUES
(36, 30, '1548891223', 15, 15, 4, 88, 4, 9, 9, 9, 9, 0, 0, 2),
(37, 30, '1548891260', 15, 15, 4, 88, 4, 9, 9, 9, 9, 0, 0, 2),
(38, 30, '1548892231', 15, 15, 42, 34, 23, 23, 15, 15, 51, 185, 15, 14),
(39, 29, '1549323236', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(40, 29, '1549323273', 15, 15, 42.25, 34, 23, 23, 15, 15, 51, 185, 15, 16),
(41, 29, '1551309991', 15, 15, 42.25, 32, 23, 23, 15, 15, 51, 185, 15, 16),
(42, 33, '1558124035', 15, 15, 42, 34, 23, 23, 15, 15, 50, 190, 15, 16);

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

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`memberID`, `firstName`, `lastName`, `email`, `username`, `password`, `leftArm`, `rightArm`, `chest`, `waist`, `leftThigh`, `rightThigh`, `leftCalf`, `rightCalf`, `shoulders`, `wrists`, `ankles`, `bodyFat`, `weight`, `neck`, `knee`, `height`) VALUES
(28, 'rick', 'morty', 'rock@r.com', 'rick01', '$2y$10$4j3fQxrcxAWNoFmsC6hbiuJtGLWMO1fIZl02aRb3jL/CEAYL2t4Z.', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(29, 'Jayant', 'Tailor', 'jayantt@sfu.ca', 'jayant95', '$2y$10$J8C30PSkL3LRQ5E8e5Kvgu.X9Z2RTvhMK8A8IUa0s5uDHhtgiq0I2', 15, 15, 42.25, 32, 23, 23, 15, 15, 51, 7, 8, 15, 185, 16, 15, 71),
(30, 'Bob', 'Smith', 'bob@smith.com', 'bobby01', '$2y$10$sNGH1Ynn.0G12UDQPq3aGO4j3G0e3nRpXjOdxdG2NuD6KDTIVPTTe', 15, 15, 42, 34, 23, 23, 15, 15, 51, 6.5, 6.5, 15, 185, 14, 15, 0),
(33, 'chef', 'boy', 'chefboy@hotmail.com', 'chefboy', '$2y$10$qEPcPkqq2RR0PXInNJwwR.0xYMQBzoKJvTdn0fHuhm2AnZ8YVZm6a', 15, 15, 42, 34, 23, 23, 15, 15, 50, 7, 7, 15, 190, 16, 7, 71),
(34, 'bob', 'joe', 'bob@j.com', 'bobbyJ', '$2y$10$qH/ipesh1Ud6EreSHmk2Fe6cB8KHRmzCBZdx3TTuJK9Kr5eErCfwC', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

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
(2, 34, 'Inches', 'Private');

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
  MODIFY `goalID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `memberlog`
--
ALTER TABLE `memberlog`
  MODIFY `measurementID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `memberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
