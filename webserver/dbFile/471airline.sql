-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2022 at 10:27 PM
-- Server version: 10.4.27-MariaDB
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
  `AdminEmail` varchar(20) NOT NULL,
  `AdminName` varchar(20) NOT NULL,
  `AdminPassword` varchar(20) NOT NULL
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
  `AirportName` varchar(20) NOT NULL,
  `Zones` int(1) NOT NULL,
  `Province` varchar(20) NOT NULL,
  `City` varchar(20) NOT NULL,
  `ZIP` varchar(6) NOT NULL
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
  `CustomerEmail` varchar(20) NOT NULL,
  `PhoneNumber` int(10) NOT NULL,
  `Province` varchar(20) NOT NULL,
  `City` varchar(20) NOT NULL,
  `BuildingNum` int(4) NOT NULL,
  `Community` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE `flight` (
  `FlightNumber` int(10) NOT NULL,
  `DepTime` date NOT NULL,
  `StartTime` time NOT NULL,
  `EndTime` time NOT NULL,
  `Destination` varchar(20) NOT NULL,
  `Source` varchar(20) NOT NULL,
  `GateNumber` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flight`
--

INSERT INTO `flight` (`FlightNumber`, `DepTime`, `StartTime`, `EndTime`, `Destination`, `Source`, `GateNumber`) VALUES
(765, '2022-12-13', '05:00:00', '13:00:00', 'Vancouver Airport', 'Calgary Airport', 3);

-- --------------------------------------------------------

--
-- Table structure for table `gate`
--

CREATE TABLE `gate` (
  `GateNumber` int(1) NOT NULL,
  `AirportName` varchar(20) NOT NULL,
  `Zone` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gate`
--

INSERT INTO `gate` (`GateNumber`, `AirportName`, `Zone`) VALUES
(1, 'Calgary Airport', 1),
(1, 'Montreal Airport', 1),
(1, 'Toronto Airport', 1),
(1, 'Vancouver Airport', 1),
(2, 'Calgary Airport', 1),
(2, 'Montreal Airport', 1),
(2, 'Toronto Airport', 1),
(2, 'Vancouver Airport', 1),
(3, 'Toronto Airport', 2),
(3, 'Vancouver Airport', 2),
(4, 'Toronto Airport', 2),
(4, 'Vancouver Airport', 2);

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `PackageID` int(10) NOT NULL,
  `Weight` int(2) NOT NULL,
  `ReceiverName` varchar(20) NOT NULL,
  `SenderName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `PassengerID` int(10) NOT NULL,
  `PassengerName` varchar(20) NOT NULL,
  `PassengerAge` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE `seat` (
  `SeatColumn` int(1) NOT NULL,
  `SeatRow` int(1) NOT NULL,
  `FlightNumber` int(10) NOT NULL,
  `PassengerID` int(10) NOT NULL,
  `SeatType` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `TicketID` int(10) NOT NULL,
  `FlightNumber` int(10) NOT NULL,
  `CustomerEmail` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tickettype`
--

CREATE TABLE `tickettype` (
  `PackageID` int(10) DEFAULT NULL,
  `TicketID` int(10) NOT NULL,
  `PassengerID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserEmail` varchar(20) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `UserPassword` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  ADD PRIMARY KEY (`SeatColumn`,`SeatRow`),
  ADD UNIQUE KEY `SeatColumn` (`SeatColumn`,`SeatRow`,`FlightNumber`),
  ADD KEY `PassengerID` (`PassengerID`),
  ADD KEY `FlightNumber` (`FlightNumber`);

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
  MODIFY `FlightNumber` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1238;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `PackageID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `passenger`
--
ALTER TABLE `passenger`
  MODIFY `PassengerID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8637621;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `TicketID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  ADD CONSTRAINT `flight_ibfk_1` FOREIGN KEY (`Destination`) REFERENCES `airport` (`AirportName`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `flight_ibfk_2` FOREIGN KEY (`Source`) REFERENCES `airport` (`AirportName`) ON DELETE CASCADE ON UPDATE CASCADE,
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
  ADD CONSTRAINT `seat_ibfk_1` FOREIGN KEY (`PassengerID`) REFERENCES `passenger` (`PassengerID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `seat_ibfk_2` FOREIGN KEY (`FlightNumber`) REFERENCES `flight` (`FlightNumber`) ON DELETE CASCADE ON UPDATE CASCADE;

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
