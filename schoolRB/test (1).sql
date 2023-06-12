-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2023 at 12:58 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `ClassesID` int(100) NOT NULL,
  `Year_Group` int(100) NOT NULL,
  `ClassName` varchar(100) NOT NULL,
  `Capacity` varchar(100) NOT NULL,
  `TeachersID` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `ParentsID` int(200) NOT NULL,
  `ParentName` varchar(250) NOT NULL,
  `Par_Address` varchar(250) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `Telephone` varchar(250) NOT NULL,
  `PupilsID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`ParentsID`, `ParentName`, `Par_Address`, `Email`, `Telephone`, `PupilsID`) VALUES
(1, 'Bob Smith\r\n', '6 Selworthy Rd, M16 7AT', 'bosmith@gmail.com', '0792850379', 5),
(2, 'Jennifer Stevens', '80 Nairne St, BB11 4PE', 'jennyjoo@gmail.com', '07792313457', 7),
(3, 'Cameron Davies', '\r\n59 Farfield Terrace, BD9 5AN\r\n', 'camedave@gmail.com', '07756788223', 8);

-- --------------------------------------------------------

--
-- Table structure for table `pupils`
--

CREATE TABLE `pupils` (
  `PupilsID` int(11) NOT NULL,
  `StudentName` varchar(250) NOT NULL,
  `Stu_Address` varchar(250) NOT NULL,
  `Medical_Info` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pupils`
--

INSERT INTO `pupils` (`PupilsID`, `StudentName`, `Stu_Address`, `Medical_Info`) VALUES
(5, 'Jackson Amith', '6 Selworthy Rd, Moss Side,M16 7AT', 'N/A'),
(7, 'Holly Stevens', '80 Nairne St, BB11 4PE', 'diabetic'),
(8, 'David Davies', '59 Farfield Terrace, BD9 5AN\n', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `TeachersID` int(250) NOT NULL,
  `TeachersName` varchar(250) NOT NULL,
  `Teach_Address` varchar(250) NOT NULL,
  `Teach_MedInfo` varchar(250) NOT NULL,
  `Teach_Phone` int(250) NOT NULL,
  `AnnualSalary` varchar(250) NOT NULL,
  `BackgroundCheck` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`ClassesID`),
  ADD KEY `Classes_ibfk_1` (`TeachersID`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`ParentsID`),
  ADD KEY `PupilsID` (`PupilsID`);

--
-- Indexes for table `pupils`
--
ALTER TABLE `pupils`
  ADD PRIMARY KEY (`PupilsID`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`TeachersID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `ClassesID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `ParentsID` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pupils`
--
ALTER TABLE `pupils`
  MODIFY `PupilsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `TeachersID` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `Classes_ibfk_1` FOREIGN KEY (`TeachersID`) REFERENCES `teachers` (`TeachersID`) ON DELETE SET NULL;

--
-- Constraints for table `parents`
--
ALTER TABLE `parents`
  ADD CONSTRAINT `Parents_ibfk_1` FOREIGN KEY (`PupilsID`) REFERENCES `pupils` (`PupilsID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
