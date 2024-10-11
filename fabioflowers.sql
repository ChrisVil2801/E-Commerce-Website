-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2022 at 06:00 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fabioflowers`
--

-- --------------------------------------------------------

--
-- Table structure for table `admindetails`
--

CREATE TABLE `admindetails` (
  `AdminID` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admindetails`
--

INSERT INTO `admindetails` (`AdminID`, `Name`, `Username`, `Password`) VALUES
(1, 'Christopher', 'cvil', 'Password');

-- --------------------------------------------------------

--
-- Table structure for table `flowers`
--

CREATE TABLE `flowers` (
  `FlowerID` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Height` varchar(30) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Price` int(11) NOT NULL,
  `Image` varchar(30) NOT NULL,
  `AdminAddID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flowers`
--

INSERT INTO `flowers` (`FlowerID`, `Name`, `Height`, `Description`, `Price`, `Image`, `AdminAddID`) VALUES
(1, 'Malva', '60cm - 1.2m', 'Malva is a vigorous plant that contains purple and pink blooms with stripes that spread outwards.', 75, 'Malva.jpg', 1),
(2, 'Tithonia', '60cm - 1.2m', 'Similar appearance and characteristics to the sunflower, yet can thrive in poorer soil conditions.', 325, 'Tithonia.jpg', 1),
(3, 'Windflower', '10cm - 15cm', 'Blooms in early spring. Comes in white, blue, violet, pink and indigo colours.', 30, 'Windflower.jpg', 1),
(4, 'Cosmos', '30cm - 2m', 'Cosmos is a type of sunflower that can grow up to 2 meters. Can bloom in shades of white, red and pink.', 60, 'Cosmos.jpg', 1),
(5, 'Heliotrope', '30cm - 75cm', 'Consists of a tiny cluster, white, violet or blue blooms. Performs best when put in partial shade.', 80, 'Heliotrope.jpg', 1),
(6, 'Lantana', '60cm - 1.8m', 'Popular for an outdoor plant. Blooms in combination of yellow, orange, white, pink and red.', 150, 'Lantana.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `UserID` int(11) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `EmailAddress` varchar(30) NOT NULL,
  `CellNumber` int(11) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`UserID`, `FirstName`, `LastName`, `EmailAddress`, `CellNumber`, `Username`, `Password`) VALUES
(1, 'Chris', 'Viljoen', 'cvil@gmail.com', 846789453, 'cvilUser', 'Password'),
(2, 'Kyle', 'Viljoen', 'chris@viljoen.com', 2147483647, 'chris', 'Password');

-- --------------------------------------------------------

--
-- Table structure for table `userorder`
--

CREATE TABLE `userorder` (
  `OrderID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `CustomerAddress` varchar(100) NOT NULL,
  `OrderAmount` int(11) NOT NULL,
  `CreditCardNum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userorder`
--

INSERT INTO `userorder` (`OrderID`, `UserID`, `ProductID`, `CustomerAddress`, `OrderAmount`, `CreditCardNum`) VALUES
(11, 1, 1, '22 Main Street Cape Town', 424, 2147483647),
(12, 2, 4, '44 Main Street', 220, 567894567);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admindetails`
--
ALTER TABLE `admindetails`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `flowers`
--
ALTER TABLE `flowers`
  ADD PRIMARY KEY (`FlowerID`),
  ADD KEY `AdminAddID` (`AdminAddID`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `userorder`
--
ALTER TABLE `userorder`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admindetails`
--
ALTER TABLE `admindetails`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `flowers`
--
ALTER TABLE `flowers`
  MODIFY `FlowerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `userorder`
--
ALTER TABLE `userorder`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `flowers`
--
ALTER TABLE `flowers`
  ADD CONSTRAINT `flowers_ibfk_1` FOREIGN KEY (`AdminAddID`) REFERENCES `admindetails` (`AdminID`);

--
-- Constraints for table `userorder`
--
ALTER TABLE `userorder`
  ADD CONSTRAINT `userorder_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `userdetails` (`UserID`),
  ADD CONSTRAINT `userorder_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `flowers` (`FlowerID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
