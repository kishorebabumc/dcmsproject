-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2017 at 09:58 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dcms`
--

-- --------------------------------------------------------

--
-- Table structure for table `allot`
--

CREATE TABLE `allot` (
  `ID` int(11) NOT NULL,
  `EmpID` varchar(25) NOT NULL,
  `OffID` varchar(25) NOT NULL,
  `EntryBy` varchar(25) NOT NULL,
  `DOE` date NOT NULL,
  `DOC` date NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allot`
--

INSERT INTO `allot` (`ID`, `EmpID`, `OffID`, `EntryBy`, `DOE`, `DOC`, `Status`) VALUES
(1, 'DCMS6', 'Office2', 'admin', '2017-05-21', '2017-05-21', 0),
(2, 'DCMS1', 'Office2', 'admin', '2017-05-18', '0000-00-00', 1),
(3, 'DCMS2', 'Office4', 'admin', '2017-05-18', '0000-00-00', 1),
(4, 'DCMS3', 'Office4', 'admin', '2017-05-18', '2017-05-21', 0),
(5, 'DCMS4', '', 'admin', '2017-05-18', '0000-00-00', 0),
(6, 'DCMS5', 'Office1', 'admin', '2017-05-18', '0000-00-00', 1),
(7, 'DCMS6', '', 'admin', '2017-05-21', '0000-00-00', 0),
(8, 'DCMS3', 'Office2', 'admin', '2017-05-22', '2017-05-22', 0),
(9, 'DCMS3', '', 'admin', '2017-05-22', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `ID` int(11) NOT NULL,
  `Desig` varchar(50) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`ID`, `Desig`, `Status`) VALUES
(1, 'Business Manager', 1),
(2, 'Assistant Business Manager', 1),
(3, 'Accountant', 1),
(4, 'Sales Person', 1),
(5, 'Office Subordinate', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `EmpID` varchar(15) NOT NULL,
  `Fname` varchar(15) NOT NULL,
  `Lname` varchar(15) NOT NULL,
  `Sname` varchar(15) NOT NULL,
  `DOB` date NOT NULL,
  `EntryBy` varchar(15) NOT NULL,
  `DOE` date NOT NULL,
  `DOC` date NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`EmpID`, `Fname`, `Lname`, `Sname`, `DOB`, `EntryBy`, `DOE`, `DOC`, `Status`) VALUES
('DCMS1', 'Kishore', 'Babu', 'Vantari', '1985-06-26', 'admin', '2017-05-18', '0000-00-00', 1),
('DCMS2', 'Meena', '', 'Vantari', '1985-06-26', 'admin', '2017-05-18', '2017-05-20', 1),
('DCMS3', 'Rithwin', 'Babu', 'Vantari', '1985-02-02', 'admin', '2017-05-18', '2017-05-19', 1),
('DCMS4', 'Sujatha', '', 'Sujatha', '1988-01-01', 'admin', '2017-05-18', '2017-05-21', 1),
('DCMS5', 'Sujatha', 'Babu', 'Sujatha', '1990-01-01', 'admin', '2017-05-18', '2017-05-21', 1),
('DCMS6', 'Haseena', '', 'Mohammad', '1990-09-19', 'admin', '2017-05-21', '2017-05-21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employeespersonal`
--

CREATE TABLE `employeespersonal` (
  `ID` int(11) NOT NULL,
  `EmpID` varchar(15) NOT NULL,
  `Education` varchar(15) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `City` varchar(50) NOT NULL,
  `Mobile` varchar(13) NOT NULL,
  `EntryBy` varchar(15) NOT NULL,
  `DOE` date NOT NULL,
  `DOC` date NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employeespersonal`
--

INSERT INTO `employeespersonal` (`ID`, `EmpID`, `Education`, `Address`, `City`, `Mobile`, `EntryBy`, `DOE`, `DOC`, `Status`) VALUES
(1, 'DCMS1', 'B.Tech', '43-128-9, K.L.Rao Road,\r\nSingh Nagar', 'Vijayawada', '7396662009', 'admin', '2017-05-18', '0000-00-00', 1),
(2, 'DCMS2', 'B.Tech', 'Singh Nagar', 'Vijayawada', '9248612622', 'admin', '2017-05-18', '2017-05-19', 0),
(3, 'DCMS3', 'B.Tech', 'Singh Nagar', 'Vijayawada', '08662401528', 'admin', '2017-05-18', '2017-05-19', 1),
(4, 'DCMS4', 'No', 'Sanagapadu', 'Nandigama', '12345678', 'admin', '2017-05-18', '2017-05-19', 0),
(5, 'DCMS5', 'No', 'Surampalli', 'Nandigama', '12345678', 'admin', '2017-05-18', '2017-05-21', 1),
(6, 'DCMS4', 'No', 'Sanagapadu', 'Sanagapadu', '876454321', 'admin', '2017-05-19', '2017-05-21', 1),
(7, 'DCMS2', 'B.Tech', '43-128-9, Singh Nagar', 'Vijayawada', '9248612622', 'admin', '2017-05-19', '2017-05-20', 1),
(8, 'DCMS6', 'MBA', 'Guntuaplli', 'Guntupalli', '888581325', 'admin', '2017-05-21', '2017-05-21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employeesprof`
--

CREATE TABLE `employeesprof` (
  `ID` int(11) NOT NULL,
  `EmpID` varchar(15) NOT NULL,
  `Desig` int(11) NOT NULL,
  `EntryBy` varchar(15) NOT NULL,
  `DOE` date NOT NULL,
  `DOC` date NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employeesprof`
--

INSERT INTO `employeesprof` (`ID`, `EmpID`, `Desig`, `EntryBy`, `DOE`, `DOC`, `Status`) VALUES
(1, 'DCMS1', 4, 'admin', '2017-05-18', '2017-05-22', 0),
(2, 'DCMS2', 4, 'admin', '2017-05-18', '2017-05-19', 0),
(3, 'DCMS3', 3, 'admin', '2017-05-18', '2017-05-19', 1),
(4, 'DCMS4', 5, 'admin', '2017-05-18', '2017-05-21', 1),
(5, 'DCMS5', 4, 'admin', '2017-05-18', '2017-05-21', 1),
(7, 'DCMS2', 3, 'admin', '2017-05-19', '2017-05-19', 0),
(8, 'DCMS2', 3, 'admin', '2017-05-19', '2017-05-19', 0),
(9, 'DCMS2', 5, 'admin', '2017-05-19', '2017-05-19', 0),
(10, 'DCMS2', 1, 'admin', '2017-05-19', '2017-05-19', 0),
(11, 'DCMS2', 5, 'admin', '2017-05-19', '2017-05-20', 0),
(12, 'DCMS2', 1, 'admin', '2017-05-20', '2017-05-20', 0),
(13, 'DCMS2', 1, 'admin', '2017-05-20', '2017-05-20', 0),
(14, 'DCMS2', 3, 'admin', '2017-05-20', '2017-05-20', 1),
(15, 'DCMS6', 3, 'admin', '2017-05-21', '2017-05-21', 1),
(16, 'DCMS1', 4, 'admin', '2017-05-22', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mainheads`
--

CREATE TABLE `mainheads` (
  `MainID` int(11) NOT NULL,
  `MainHead` varchar(25) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mainheads`
--

INSERT INTO `mainheads` (`MainID`, `MainHead`, `Status`) VALUES
(1, 'Liabilities', 1),
(2, 'Assets', 1),
(3, 'Income', 1),
(4, 'Expenditure', 1);

-- --------------------------------------------------------

--
-- Table structure for table `majorhead`
--

CREATE TABLE `majorhead` (
  `MajorID` int(11) NOT NULL,
  `MajorHead` varchar(50) NOT NULL,
  `MainHeadID` int(11) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `officemonitor`
--

CREATE TABLE `officemonitor` (
  `ID` int(11) NOT NULL,
  `OffID` varchar(25) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `City` varchar(25) NOT NULL,
  `Phone` varchar(13) NOT NULL,
  `EmpID` varchar(25) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `officemonitor`
--

INSERT INTO `officemonitor` (`ID`, `OffID`, `Address`, `City`, `Phone`, `EmpID`, `Status`) VALUES
(1, 'Office1', 'Near NTR Statue, Patamata', 'Vijayawada', '7396662009', 'admin', 0),
(2, 'Office2', 'Patamata', 'Vijayawada', '924861262', 'admin', 0),
(3, 'Office3', 'Singh Nagar', 'Vijayawada', '948612622', 'admin', 0),
(4, 'Office4', 'Gandhi Nagar', 'Vijayawada', '0866401546', 'admin', 0),
(5, 'Office2', 'Patamata', 'Vijayawada', '08662401528', 'admin', 1),
(6, 'Office3', 'Singh Nagar', 'Vijayawada', '123456789', 'admin', 0),
(7, 'Office4', 'Gandhi Nagar', 'Singh Nagar', '0866401546', 'admin', 1),
(8, 'Office1', 'Pantakaluva Road, Near NTR Statue, Patamata', 'Vijayawada', '7396662009', 'admin', 1),
(9, 'Office5', 'Gollapudi', 'Vijayawada Rural', '08662412345', 'admin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

CREATE TABLE `offices` (
  `OffID` varchar(25) NOT NULL,
  `OfficeName` varchar(50) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`OffID`, `OfficeName`, `Status`) VALUES
('Office1', 'Head Office', 1),
('Office2', 'Patamata DMCS', 1),
('Office3', 'Singh Nagar DCMS', 0),
('Office4', 'Gandhi Nagar', 1),
('Office5', 'Gollapudi DCMS', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `user` varchar(25) NOT NULL,
  `pwd` varchar(25) NOT NULL,
  `Desig` int(11) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `user`, `pwd`, `Desig`, `Status`) VALUES
(1, 'admin', 'kishore', 1, 1),
(2, 'DCMS1', '123456', 4, 1),
(3, 'DCMS2', '123456', 3, 1),
(4, 'DCMS3', '123456', 3, 1),
(5, 'DCMS4', '123456', 5, 1),
(6, 'DCMS5', '123456', 4, 1),
(7, 'DCMS6', '123456', 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allot`
--
ALTER TABLE `allot`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`EmpID`);

--
-- Indexes for table `employeespersonal`
--
ALTER TABLE `employeespersonal`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `EmpID` (`EmpID`);

--
-- Indexes for table `employeesprof`
--
ALTER TABLE `employeesprof`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `EmpID` (`EmpID`),
  ADD KEY `Desig` (`Desig`);

--
-- Indexes for table `mainheads`
--
ALTER TABLE `mainheads`
  ADD PRIMARY KEY (`MainID`);

--
-- Indexes for table `majorhead`
--
ALTER TABLE `majorhead`
  ADD PRIMARY KEY (`MajorID`),
  ADD KEY `MainHeadID` (`MainHeadID`);

--
-- Indexes for table `officemonitor`
--
ALTER TABLE `officemonitor`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `OffID` (`OffID`),
  ADD KEY `EmpID` (`EmpID`);

--
-- Indexes for table `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`OffID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allot`
--
ALTER TABLE `allot`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `employeespersonal`
--
ALTER TABLE `employeespersonal`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `employeesprof`
--
ALTER TABLE `employeesprof`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `mainheads`
--
ALTER TABLE `mainheads`
  MODIFY `MainID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `majorhead`
--
ALTER TABLE `majorhead`
  MODIFY `MajorID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `officemonitor`
--
ALTER TABLE `officemonitor`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
