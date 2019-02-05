-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2019 at 12:10 AM
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
  `memberID` varchar(255) NOT NULL,
  `goalID` varchar(255) NOT NULL,
  `bodyBuilderID` varchar(255) NOT NULL,
  `featureName` varchar(255) NOT NULL,
  `currentGoal` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `leftArm` varchar(255) NOT NULL,
  `rightArm` varchar(255) NOT NULL,
  `chest` varchar(255) NOT NULL,
  `waist` varchar(255) NOT NULL,
  `leftThigh` varchar(255) NOT NULL,
  `rightThigh` varchar(255) NOT NULL,
  `leftCalf` varchar(255) NOT NULL,
  `rightCalf` varchar(255) NOT NULL,
  `shoulders` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `bodyFat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `goals`
--

INSERT INTO `goals` (`memberID`, `goalID`, `bodyBuilderID`, `featureName`, `currentGoal`, `date`, `leftArm`, `rightArm`, `chest`, `waist`, `leftThigh`, `rightThigh`, `leftCalf`, `rightCalf`, `shoulders`, `weight`, `bodyFat`) VALUES
('11', '11', 'Frank Zane', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('11', '11', 'Franco Columbo', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

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
  `knee` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`memberID`, `firstName`, `lastName`, `email`, `username`, `password`, `leftArm`, `rightArm`, `chest`, `waist`, `leftThigh`, `rightThigh`, `leftCalf`, `rightCalf`, `shoulders`, `wrists`, `ankles`, `bodyFat`, `weight`, `neck`, `knee`) VALUES
(26, 'Jayant', 'Tailor', 'jayantt@sfu.ca', 'jayant95', '$2y$10$P96sqPD5z5IusgVb/Daj2uMa.3EyGpR56EZvT8zRhPhGyaWXIfL1S', 16, 16.5, 41, 34, 23, 23, 16, 16, 51, 6, 7, 15, 185, 16, 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bodybuilders`
--
ALTER TABLE `bodybuilders`
  ADD PRIMARY KEY (`bodybuilderID`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bodybuilders`
--
ALTER TABLE `bodybuilders`
  MODIFY `bodybuilderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `memberlog`
--
ALTER TABLE `memberlog`
  MODIFY `measurementID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `memberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
