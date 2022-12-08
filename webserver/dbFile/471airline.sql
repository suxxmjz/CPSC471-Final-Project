-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2022 at 04:09 AM
-- Server version: 8.0.28
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `471airline`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminEmail` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `AdminName` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `AdminPassword` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminEmail`, `AdminName`, `AdminPassword`) VALUES
('admin@gmail.com', 'admin', 'cpsc471');

-- --------------------------------------------------------

--
-- Table structure for table `airport`
--

CREATE TABLE `airport` (
  `AirportName` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `Zones` int NOT NULL,
  `Province` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `City` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `ZIP` varchar(6) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `airport`
--

INSERT INTO `airport` (`AirportName`, `Zones`, `Province`, `City`, `ZIP`) VALUES
('Calgary Airport', 1, 'Alberta', 'Calgary', 'T2E6W5'),
('Montreal Airport', 1, 'Quebec', 'Montreal', 'H4Y1H1'),
('Toronto Airport', 2, 'Ontario', 'Toronto', 'L5P1B2'),
('Vancouver Airport', 2, 'British Columbia', 'Vancouver', 'V7B0A4');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerEmail` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `PhoneNumber` bigint NOT NULL,
  `Province` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `City` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `BuildingNum` int NOT NULL,
  `Community` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerEmail`, `PhoneNumber`, `Province`, `City`, `BuildingNum`, `Community`) VALUES
('jason.wu1@ucalgary.ca', 4034445555, 'Alberta', 'Calgary', 2222, 'Some Street'),
('jason.wu4325@gmail.com', 4035541892, 'Alberta', 'Calgary', 3000, 'Somewhere');

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE `flight` (
  `FlightNumber` int NOT NULL,
  `DepTime` date NOT NULL,
  `StartTime` time NOT NULL,
  `EndTime` time NOT NULL,
  `Destination` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `Source` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `GateNumber` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flight`
--

INSERT INTO `flight` (`FlightNumber`, `DepTime`, `StartTime`, `EndTime`, `Destination`, `Source`, `GateNumber`) VALUES
(1239, '2022-12-09', '07:50:00', '21:50:00', 'Vancouver Airport', 'Calgary Airport', 2),
(1240, '2022-12-09', '22:50:00', '12:50:00', 'Vancouver Airport', 'Calgary Airport', 2),
(1241, '2022-12-09', '15:50:00', '05:51:00', 'Vancouver Airport', 'Calgary Airport', 2),
(1242, '2022-12-09', '07:51:00', '09:51:00', 'Vancouver Airport', 'Calgary Airport', 1),
(1243, '2022-12-09', '21:51:00', '23:51:00', 'Vancouver Airport', 'Calgary Airport', 1),
(1244, '2022-12-09', '15:51:00', '17:51:00', 'Vancouver Airport', 'Calgary Airport', 1),
(1245, '2022-12-09', '20:52:00', '23:52:00', 'Toronto Airport', 'Calgary Airport', 2),
(1246, '2022-12-09', '15:52:00', '19:52:00', 'Toronto Airport', 'Calgary Airport', 2),
(1247, '2022-12-09', '07:52:00', '11:52:00', 'Toronto Airport', 'Calgary Airport', 2),
(1248, '2022-12-09', '16:53:00', '20:53:00', 'Toronto Airport', 'Calgary Airport', 2),
(1249, '2022-12-09', '19:54:00', '00:54:00', 'Calgary Airport', 'Montreal Airport', 2),
(1250, '2022-12-09', '08:55:00', '01:55:00', 'Calgary Airport', 'Montreal Airport', 2),
(1251, '2022-12-09', '15:55:00', '20:55:00', 'Calgary Airport', 'Montreal Airport', 2),
(1252, '2022-12-09', '10:55:00', '15:55:00', 'Calgary Airport', 'Montreal Airport', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gate`
--

CREATE TABLE `gate` (
  `GateNumber` int NOT NULL,
  `AirportName` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `Zone` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gate`
--

INSERT INTO `gate` (`GateNumber`, `AirportName`, `Zone`) VALUES
(1, 'Calgary Airport', 1),
(2, 'Calgary Airport', 1),
(1, 'Montreal Airport', 1),
(2, 'Montreal Airport', 1),
(1, 'Toronto Airport', 1),
(2, 'Toronto Airport', 1),
(3, 'Toronto Airport', 2),
(4, 'Toronto Airport', 2),
(1, 'Vancouver Airport', 1),
(2, 'Vancouver Airport', 1),
(3, 'Vancouver Airport', 2),
(4, 'Vancouver Airport', 2);

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `PackageID` int NOT NULL,
  `Weight` int NOT NULL,
  `ReceiverName` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `SenderName` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`PackageID`, `Weight`, `ReceiverName`, `SenderName`) VALUES
(9, 50, 'Someone', 'Jason'),
(10, 50, 'Cool', 'Someone'),
(11, 60, 'Else', 'Someone');

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `PassengerID` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `PassengerName` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `PassengerAge` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`PassengerID`, `PassengerName`, `PassengerAge`) VALUES
('123', 'Brother', 24),
('12345', 'Jason', 21),
('123456', 'Sukriti', 20),
('1234567', 'Caroline', 20),
('1345', 'Someone', 22),
('2342354', 'Jay', 21),
('4325', 'Jason', 21),
('5435', 'Someone2', 20);

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE `seat` (
  `SeatNumber` int NOT NULL,
  `FlightNumber` int NOT NULL,
  `PassengerID` varchar(10) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seat`
--

INSERT INTO `seat` (`SeatNumber`, `FlightNumber`, `PassengerID`) VALUES
(4, 1239, '123'),
(1, 1239, '12345'),
(2, 1239, '123456'),
(3, 1239, '1234567'),
(8, 1239, '1345'),
(13, 1239, '2342354'),
(9, 1239, '5435');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `TicketID` int NOT NULL,
  `FlightNumber` int NOT NULL,
  `CustomerEmail` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`TicketID`, `FlightNumber`, `CustomerEmail`) VALUES
(50, 1239, 'jason.wu4325@gmail.com'),
(51, 1239, 'jason.wu4325@gmail.com'),
(52, 1239, 'jason.wu4325@gmail.com'),
(53, 1245, 'jason.wu4325@gmail.com'),
(54, 1239, 'jason.wu4325@gmail.com'),
(55, 1239, 'jason.wu4325@gmail.com'),
(56, 1239, 'jason.wu4325@gmail.com'),
(57, 1239, 'jason.wu1@ucalgary.ca'),
(58, 1246, 'jason.wu1@ucalgary.ca'),
(59, 1245, 'jason.wu1@ucalgary.ca');

-- --------------------------------------------------------

--
-- Table structure for table `tickettype`
--

CREATE TABLE `tickettype` (
  `PackageID` int DEFAULT NULL,
  `TicketID` int NOT NULL,
  `PassengerID` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tickettype`
--

INSERT INTO `tickettype` (`PackageID`, `TicketID`, `PassengerID`) VALUES
(NULL, 50, '12345'),
(NULL, 51, '123456'),
(NULL, 52, '1234567'),
(9, 53, NULL),
(NULL, 54, '123'),
(NULL, 55, '1345'),
(NULL, 56, '5435'),
(NULL, 57, '2342354'),
(10, 58, NULL),
(11, 59, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserEmail` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `UserName` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `UserPassword` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserEmail`, `UserName`, `UserPassword`) VALUES
('jason.wu1@ucalgary.ca', 'Jason2', 'Password'),
('jason.wu4325@gmail.com', 'Jason', 'Password');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminEmail`);

--
-- Indexes for table `airport`
--
ALTER TABLE `airport`
  ADD PRIMARY KEY (`AirportName`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerEmail`);

--
-- Indexes for table `flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`FlightNumber`),
  ADD KEY `Destination` (`Destination`),
  ADD KEY `Source` (`Source`),
  ADD KEY `GateNumber` (`GateNumber`);

--
-- Indexes for table `gate`
--
ALTER TABLE `gate`
  ADD PRIMARY KEY (`GateNumber`,`AirportName`,`Zone`),
  ADD KEY `gate_ibfk_1` (`AirportName`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`PackageID`);

--
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`PassengerID`);

--
-- Indexes for table `seat`
--
ALTER TABLE `seat`
  ADD PRIMARY KEY (`SeatNumber`,`FlightNumber`),
  ADD KEY `FlightNumber` (`FlightNumber`),
  ADD KEY `PassengerID` (`PassengerID`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`TicketID`),
  ADD KEY `CustomerEmail` (`CustomerEmail`),
  ADD KEY `FlightNumber` (`FlightNumber`);

--
-- Indexes for table `tickettype`
--
ALTER TABLE `tickettype`
  ADD PRIMARY KEY (`TicketID`),
  ADD KEY `PackageID` (`PackageID`),
  ADD KEY `PassengerID` (`PassengerID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `flight`
--
ALTER TABLE `flight`
  MODIFY `FlightNumber` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1253;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `PackageID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `TicketID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`CustomerEmail`) REFERENCES `user` (`UserEmail`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `flight`
--
ALTER TABLE `flight`
  ADD CONSTRAINT `flight_ibfk_1` FOREIGN KEY (`Destination`) REFERENCES `gate` (`AirportName`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `flight_ibfk_2` FOREIGN KEY (`Source`) REFERENCES `gate` (`AirportName`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `flight_ibfk_3` FOREIGN KEY (`GateNumber`) REFERENCES `gate` (`GateNumber`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gate`
--
ALTER TABLE `gate`
  ADD CONSTRAINT `gate_ibfk_1` FOREIGN KEY (`AirportName`) REFERENCES `airport` (`AirportName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `seat`
--
ALTER TABLE `seat`
  ADD CONSTRAINT `seat_ibfk_2` FOREIGN KEY (`FlightNumber`) REFERENCES `flight` (`FlightNumber`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `seat_ibfk_3` FOREIGN KEY (`PassengerID`) REFERENCES `passenger` (`PassengerID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`CustomerEmail`) REFERENCES `user` (`UserEmail`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`FlightNumber`) REFERENCES `flight` (`FlightNumber`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tickettype`
--
ALTER TABLE `tickettype`
  ADD CONSTRAINT `tickettype_ibfk_1` FOREIGN KEY (`TicketID`) REFERENCES `ticket` (`TicketID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tickettype_ibfk_2` FOREIGN KEY (`PackageID`) REFERENCES `package` (`PackageID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tickettype_ibfk_3` FOREIGN KEY (`PassengerID`) REFERENCES `passenger` (`PassengerID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
